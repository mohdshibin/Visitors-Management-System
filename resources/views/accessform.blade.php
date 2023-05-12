@extends('layouts.base')

@section('title', 'Request Form')

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Fill Access Request Form</h1>

    <div class= "container">
        <form  method="POST" action={{route('postAccessForm')}}  class="mx-auto mt-2" style="width: 600px; height: 100%">
            @csrf
            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" class="form-control" name="fname">
            </div>
            <div class="mb-3">
                <label class="form-label">Contact NO</label>
                <input type="tel" class="form-control" name="contactNo">
            </div>
            <div class="mb-3">
                <label class="form-label">email</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="mb-3">
                <label class="form-label">address</label>
                <input type="text" class="form-control" name="address">
            </div>
            <div class="mb-3">
                <label class="form-label">Purpose</label>
                <input type="text" class="form-control" name="purpose">
            </div>
            <div class="mb-3">
                <label class="form-label">No of People</label>
                <input type="number" class="form-control" name="noOfPeople">
            </div>
            <div class="mb-3">
                <label class="form-label">Parking Slot </label>&nbsp;&nbsp;&nbsp;
                <input type="radio" id="parking" name="parkingSlot" value=1>
                <label >Needed</label>
                <input type="radio" id="parking" name="parkingSlot" value=0>
                <label >Not Needed</label><br> 
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-unstyled">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session()->has('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
            @endif

            @if(session()->has('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
            @endif
        </div>
     </div>
</div>

@stop