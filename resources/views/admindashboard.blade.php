@extends('layouts.base')

@section('title', 'Admin Dashboard')

@section('content')

    <div class="container-fluid px-4">
        <nav class="navbar navbar-light bg-light justify-content-between">
            <a class="navbar-brand">Admin Dashboard</a>
            <form action="{{ route('logout') }}" class="form-inline">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Logout</button>
            </form>
        </nav>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">New Request</li>
        </ol>
        <div class="row">
            <div style="display:grid; grid-template-columns: 1fr 1fr 1fr; grid-gap:15px">

                @foreach ($visitors as $visitor)
                    @if ($visitor['request_status'] == 'null')
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $visitor['fname'] }}</h5>
                                <p class="card-text">Purpose : {{ $visitor['purpose'] }}</p>
                                <p class="card-text">No of Peoples : {{ $visitor['noOfPeople'] }}</p>
                                <p class="card-text"></p>
                                <a href="{{ route('admin.request.approve', ['id' => $visitor->id]) }}"
                                    class="btn btn-primary">Approve</a>
                                <a href="{{ route('admin.request.reject', ['id' => $visitor->id]) }}"
                                    class="btn btn-primary">Reject</a>
                            </div>
                        </div>
                    @endif
                @endforeach

            </div>
        </div>

        @if (session()->has('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if (session()->has('success'))
            <div class="alert alert-success">{{ session()->get('success') }}</div>
        @endif
    </div>
    </div>

@stop
