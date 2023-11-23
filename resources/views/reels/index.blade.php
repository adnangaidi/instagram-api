@extends('layouts.app')

@section('content')
    <h1>My Reels</h1>

    <div class="reels">
        @if (isset($reels['data']))
        @foreach ($reels['data'] as $reel)
        <div class="reel">
            @if ($reel['media_type'] === 'VIDEO')
            <h2>{{ $reel['caption'] ?? 'No caption' }}</h2>            
                <video src="{{ $reel['media_url'] }}" controls></video>
            <a href="{{ $reel[' '] }}" target="_blank">View on Instagram</a>
            @endif
        </div>  
    @endforeach
    @else {{ 'Erreur' }}
        @endif
        
        
    </div>
@endsection
 