<?php

namespace App\Http\Controllers;

use App\Mail\PurchaseMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class SubscriptionController extends Controller
{

    const WEEKLY_AMOUNT = 20 ;
    const MONTHLY_AMOUNT = 80 ;
    const YEARLY_AMOUNT = 200 ;
    const CURRENCY  = 'USD' ;

    public function __construct()
    {
        $this->middleware(['isSubscribe'])->except('index');
    }

    public function index()
    {
        return view('Subscription.index');
    }
    public function initiatePayment(Request $request)
    {
        $plans = [
            'weekly' => [
                'name' => 'weekly',
                'description' => 'weekly payment',
                'amount' => self::WEEKLY_AMOUNT,
                'currency' => self::CURRENCY,
                'quantity' => 1,
            ],
            'monthly' => [
                'name' => 'monthly',
                'description' => 'monthly payment',
                'amount' => self::MONTHLY_AMOUNT,
                'currency' => self::CURRENCY,
                'quantity' => 1,
            ],
            'yearly' => [
                'name' => 'yearly',
                'description' => 'yearly payment',
                'amount' => self::YEARLY_AMOUNT,
                'currency' => self::CURRENCY,
                'quantity' => 1,
            ],
        ];
        Stripe::setApiKey(config('services.stripe.secret'));
        try {
            $selectPlan = null;
            if($request->is('pay/weekly')) {
                $selectPlan = $plans['weekly'];
                $billingEnds = now()->addWeek()->startOfDay()->toDateString();
            }elseif($request->is('pay/monthly')) {
                $selectPlan = $plans['monthly'];
                $billingEnds = now()->addMonth()->startOfDay()->toDateString();
            }elseif($request->is('pay/yearly')) {
                $selectPlan = $plans['yearly'];
                $billingEnds = now()->addYear()->startOfDay()->toDateString();
            }
            if($selectPlan) {
                $successURl = URL::signedRoute('payment.success', [
                    'plan' => $selectPlan['name'],
                    'billing_ends' => $billingEnds
                ]);
                $session = Session::create([
                    'payment_method_types' => ['card'],
                    'line_items' => [
                        [
                            'price_data' => [
                                'currency' => $selectPlan['currency'],
                                'unit_amount' => $selectPlan['amount']*100,
                                'product_data' => [
                                    'name' => $selectPlan['name'],
                                    'description' => $selectPlan['description'],
                                ],
                            ],
                            'quantity' => $selectPlan['quantity'],
                        ],
                    ],
                    'mode' => 'payment',
                    'success_url' => $successURl,
                    'cancel_url' => route('payment.cancel')
                ]);

                return redirect($session->url);
            }
        }catch (\Exception $e){
            return $e->getMessage();
        }
    }

    public function paymentSuccess(Request $request)
    {
        $plan = $request->plan ;
        $billing_ends = $request->billing_ends;

        User::where('id',auth()->user()->id)->update([
            'plan' =>$plan,
            'billing_ends' => $billing_ends,
            'status' => 'paid'
        ]);
        try {
            Mail::to(auth()->user())->queue(new PurchaseMail($plan , $billing_ends));
        }catch (\Exception $e)
        {
            return  $e->getMessage();
        }
        return redirect()->route('dashboard')->with('success','payment was successfully processed');
    }
    public function cancel()
    {
        return redirect()->route('dashboard')->with('error','payment was unsuccessful !');
    }


}
