@extends('layouts.main')

@section('content')

    <div class="container mx-auto px-4 pt-16">
        <div class="populr-tv">
            <h2 class="uppercase tracking-wider  text-lg font-semibold" style="color: orange">Popular Shows</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-16" >
                @foreach ($popularTv as $tvshow)
                  <x-tv-card :tvshow="$tvshow" />    
                @endforeach  
            </div>
        </div>

         

        <div class="now-playing-movies py-24">
            <h2 class="uppercase tracking-wider  text-lg font-semibold" style="color: orange">Top Rated Shows</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-16" >
                 @foreach ($topRatedTv as $tvshow)
                <x-tv-card :tvshow="$tvshow" />          
                @endforeach   
            </div>
        </div>
    </div>
    
@endsection
