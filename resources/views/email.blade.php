@extends('layouts.base')

@section('title', 'email-test')

@section('content')
    <h3>Hello {{ $fname }}</h3>

    <p>{{ $body }}</p>

    @if (isset($password))
        <p>You can use the below credential:</p>
        <p>Email : {{ $email }}</p>
        <p>Password : {{ $password }}</p>
    @endif

    <p>Best regards,<br>Technical Team</p>

@stop
