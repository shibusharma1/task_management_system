@component('mail::message')
# {{ $title }}

<p>{{ $message }}</p>

@if(!empty($extraData) && is_array($extraData))
### Additional Details:
@foreach($extraData as $key => $value)
- <strong>{{ ucfirst($key) }}:</strong> {{ is_array($value) ? json_encode($value) : $value }}
@endforeach
@endif

@if(!empty($actionUrl) && !empty($actionText))
@component('mail::button', ['url' => $actionUrl, 'color' => 'primary'])
{{ $actionText }}
@endcomponent
@endif

Thanks,<br>
{{ config('app.name') }}
@endcomponent
