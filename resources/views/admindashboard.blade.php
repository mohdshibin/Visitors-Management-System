@extends('layouts.base')

@section('title', 'Admin Panel')

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Admin Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">New Request</li>
    </ol>
    <div class="row">
        <div style = "display:grid; grid-template-columns: 1fr 1fr 1fr; grid-gap:15px">

            @foreach($visitors as $visitor)
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">{{$visitor['fname']}}</h5>
                  <p class="card-text">Purpose : {{$visitor['purpose']}}</p>
                  <p class="card-text">No of Peoples : {{$visitor['noOfPeople']}}</p>
                  <p class="card-text"></p>
                  <a href="#" class="btn btn-primary">Permit</a>
                  <a href="#" class="btn btn-primary">Deny</a>
                </div>
              </div>
            @endforeach

          </div>
        </div>
    </div>
</div>

@stop