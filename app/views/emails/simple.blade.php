@extends('emails/layouts/default')

@section('content')
<p>{{ $body }}</p>
<p>From "{{ $name }}" , {{ $email }}</p>
@stop
