@component('mail::message')
# {{ $data['title'] }}

{{ $data['content'] }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
