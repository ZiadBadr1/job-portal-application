<x-mail::message>
# Introduction

Hi, <b>{{$name}}</b>
yout trial has been ended today. to continue using our service, please click the button below to
reactive your membership
<x-mail::button :url="{{route('subscribe')}}">
    Reactive membership
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
