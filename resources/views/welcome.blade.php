@extends('layouts.welcomeapp')

@section('content')
    <body>
        <div class="container col-6 mt-5">
            <div class="card text-center mb-3">
                <div class="card-body">
                    <h1 class="card-title">Welcome to Laravel Bank</h1>
                    @if (Route::has('login'))
                    <div class="mt-5 mb-5">
                        @auth
                            <a href="{{ url('/home') }}" class="button pastel-purple">Home</a>
                        @else
                            <a href="{{ route('login') }}" class="button pastel-purple mt-5">Login here</a>
                        @endauth
                    </div>
                    @endif
                </div>        
            </div>
        </div>
    </body>
@endsection