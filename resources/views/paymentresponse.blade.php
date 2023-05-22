@extends('layouts.base')

@section('title', 'Payment Response')

@section('content')

    <p>Status: {{ $status }}</p>
    <a href="{{ route('get.PaymentPage') }}" class="btn btn-primary">Back</a>
@stop
