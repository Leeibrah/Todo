@extends('emails/layouts/default')

@section('content')
<p>Hello {{ $user->first_name }},</p>

<p>Welcome to Mafundis! Please click on the link below to confirm your Mafundis account. 
	If the link is not clickable copy and paste it on your web browser:</p>

<p><a href="{{ $activationUrl }}">{{ $activationUrl }}</a></p>

<p>Best regards,</p>

<p>Mafundis Team</p>
@stop
