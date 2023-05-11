@extends('layouts.base')

@section('title', 'Admin Panel')

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Admin Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">New Request</li>
    </ol>
    <div class="row">
        <div class="col-sm-3">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Access Request</h5>
                <p class="card-text">name and details</p>
                <a href="#" class="btn btn-primary">Permit</a>
                <a href="#" class="btn btn-primary">Deny</a>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>

@stop