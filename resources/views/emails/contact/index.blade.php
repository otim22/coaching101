@component('mail::message')
# New message from website

**Name:** {{ $contactData->name }}<br>
**Email:** {{ $contactData->email }}<br>
**Subject:** {{ $contactData->subject }}<br>
**Body:** <br>
{{ $contactData->body }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
