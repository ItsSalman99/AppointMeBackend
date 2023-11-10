@component('mail::message')
# {{ $data['title'] }}

{{ $data['body'] }}

@component('mail::button', ['url' => ''])
{{ $data['otp'] }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
