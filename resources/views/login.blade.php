@extends('layouts.base')

@section('title', 'Login')

@section('content')

    <div class="container">
        <form id="login-form" class="mx-auto mt-2" style="width: 600px; height: 100%">
            @csrf <!-- {{ csrf_field() }} -->
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control" aria-describedby="emailHelp" name="email" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
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

            @if (session()->has('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
        </div>
    </div>

    <script>
        document.getElementById('login-form').addEventListener('submit', function(event) {
            event.preventDefault();
            var xhr = new XMLHttpRequest();
            xhr.open('POST',"{{ route('loginPost') }}", true);
            xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');

            xhr.onload = function() {
                if (xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    window.location.href = response.redirect;
                } else {
                    console.log('Error: ' + xhr.responseText);
                }
            };

            var formData = new FormData(this);
            xhr.send(formData);
        });
    </script>

@stop
