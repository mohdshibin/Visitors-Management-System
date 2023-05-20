@extends('layouts.base')

@section('title', 'Visitor Dashboard')

@section('content')

    <div class="container-fluid px-4">
        <nav class="navbar navbar-light bg-light justify-content-between">
            <a class="navbar-brand">Visitor Dashboard</a>
            <form action="{{ route('logout') }}" class="form-inline">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Logout</button>
            </form>
        </nav>
        <a href="{{ route('checkin') }}" class="btn btn-primary">Check-IN</a>
        <a href="{{ route('checkout') }}" class="btn btn-primary">Check_Out</a>
    </div>

@stop
