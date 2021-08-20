@component('mail::message')
# Message from {{ config('app.name') }}

**Name:** {{ $contactData->name }}<br>

**Email:** {{ $contactData->email }}<br>

**Subject:** {{ $contactData->subject }}<br>

**Body:** <br>
{{ $contactData->body }}
@endcomponent
