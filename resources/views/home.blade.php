@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                <form method="POST" action="/store">
                    @csrf
                    <input type="text" name="title" placeholder="title"/>
                    <input type="text" name="description" placeholder="entrer the description"/><br>
                    <input type="url" name="mudia_url" placeholder="entrer the url"/>
                    <button type="submit">submit</button>
                </form>
            </div>
        </div>
    </div>
    <hr>
    <hr>
                    <a class="nav-link" href="{{ url('/auth/instagram') }}">Login instagram</a>
                    <a class="nav-link" href="{{ url('/reels') }}">Reels</a>

                
</div>
@endsection
