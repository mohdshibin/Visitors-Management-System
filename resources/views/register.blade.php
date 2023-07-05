@extends('layouts.base')

@section('title', 'Regitser')

@section('content')

    <div class="container">
        <form id="register-form" class="mx-auto mt-2" style="width: 600px; height: 100%">
            @csrf
            <!-- {{ csrf_field() }} -->
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control" aria-describedby="emailHelp" name="email" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>

    <script>
        document.getElementById('register-form').addEventListener('submit', function(event) {
            event.preventDefault();
            var xhr = new XMLHttpRequest();
            xhr.open('POST',"{{ route('registerPost') }}", true);
            xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');

            xhr.onload = function() {
                if (xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    window.location.href = "{{ route('login') }}";
                } else {
                    console.log('Error: ' + xhr.responseText);
                }
            };

            var formData = new FormData(this);
            xhr.send(formData);
        });
    </script>
@stop
