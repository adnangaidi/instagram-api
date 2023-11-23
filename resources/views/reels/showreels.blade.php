@extends('layouts.app')

@section('content')
    <h1>My Reels</h1>
                <form method="POST" action="/store">
                    @csrf
                    <input type="text" name="title" placeholder="title"/>
                    <input type="text" name="description" placeholder="entrer the description"/><br>
                    <input type="url" name="mudia_url" placeholder="entrer the url"/>
                    <button type="submit">submit</button>
                </form>
   
        </div>
    
        
        
    </div>
@endsection