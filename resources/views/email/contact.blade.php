@component('mail::message')
# New Contactssage
{{$subject}}
@component('mail::panel')
{{$message}}
@endcomponent

@component('mail::button', ['url' => route('contact')])
Repondre a cette Email
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
