@extends('layouts.base')

@section('title', 'Login')

@section('content')

  <div class= "container">
    <form class="mx-auto mt-2" style="width: 600px; height: 100%">
        <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" class="form-control" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
  </div>

@stop