@extends('layouts.base')

@section('title', 'Regitser')

@section('content')

  <div class= "container">
    <form action={{route('registerPost')}} method="POST" class="mx-auto mt-2" style="width: 600px; height: 100%">
        @csrf
        <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" class="form-control" aria-describedby="emailHelp" name="email">
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
  </div>

@stop