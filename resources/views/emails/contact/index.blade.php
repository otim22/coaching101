@component('mail::message')
# Message from {{ config('app.name') }}

**Name:** {{ $contactData->name }}<br>
**Email:** {{ $contactData->email }}<br><br>
**Subject:** {{ $contactData->subject }}<br><br>
**Body:** <br>
{{ $contactData->body }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
