<x-mail::message>
    # Introduction

    Congratulation you are now a premium user
    Your purchese details :
    plan : {{$plan}}
    your plan will end in : {{$billing_ends}}

    <x-mail::button : url="">
        Post a Jop
    </x-mail::button>

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>
