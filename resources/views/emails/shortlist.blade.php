<x-mail::message>


Congratulations, <strong>{{ $user_name }}</strong>!
You have been shortlisted for a job titled "{{ $listing_title }}". Please be ready for the interview.


Best regards,<br>
{{ config('app.name') }}
</x-mail::message>
