@extends('layouts.base')

@section('title', 'Request Form')

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Fill Access Request Form</h1>

    <div class= "container">
        <form  method="POST" class="mx-auto mt-2" style="width: 600px; height: 100%">
            @csrf
            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" class="form-control" aria-describedby="emailHelp" name="fullname">
            </div>
            <div class="mb-3">
                <label class="form-label">Contact NO</label>
                <input type="tel" class="form-control" name="contactno">
            </div>
            <div class="mb-3">
                <label class="form-label">email</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="mb-3">
                <label class="form-label">address</label>
                <input type="text" class="form-control" name="contactno">
            </div>
            <div class="mb-3">
                <label class="form-label">Purpose</label>
                <input type="text" class="form-control" name="contactno">
            </div>
            <div class="mb-3">
                <label class="form-label">No of People</label>
                <input type="number" class="form-control" name="contactno">
            </div>
            <div class="mb-3">
                <label class="form-label">Parking Slot </label>&nbsp;&nbsp;&nbsp;
                <input type="radio" id="parking" name="parking" value="Yes">
                <label >Needed</label>
                <input type="radio" id="parking" name="parking" value="No">
                <label >Not Needed</label><br> 
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
     </div>
</div>

@stop