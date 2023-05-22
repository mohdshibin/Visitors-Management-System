@extends('layouts.base')

@section('title', 'Payment')

@section('content')
    <form action={{ route('generate.payment') }} method="POST" style="width: 600px; height: 100%">
        @csrf
        <!-- {{ csrf_field() }} -->
        <button type="submit" class="btn btn-primary">Pay Now</button>
    </form>
@stop
