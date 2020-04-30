<html>
<head>
</head>
<body>
<div class="container">
@component('mail::message')
Welcome {{$name}} to Covid-19 Call center

@component('mail::panel')
This is password for you to login.<strong>{{$password}}</strong>
@endcomponent

@component('mail::button', ['url' => $loginUrl, 'color' => 'success'])
Click To Login
@endcomponent

@lang(
"If you’re having trouble clicking the button, copy and paste the URL below\n".
'into your web browser: [:actionURL](:actionURL)',
[
'actionText' => "Click to login",
'actionURL' => $loginUrl,
]
)

Thanks,<br>
{{ config('app.name') }}
@endcomponent

</div>
</body>
</html>

