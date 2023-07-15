<x-mail::message>
# Introduction

    Congratulation you are now a premium user
    <p>Your purchese details : </p>
    <p>plan : {{$plan}} </p>
    <p>your plan will end in : {{$billing_ends}} </p>

<x-mail::button : url="">
Post a Jop
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
