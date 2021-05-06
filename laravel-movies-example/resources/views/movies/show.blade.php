@extends('layouts.main')

@section('content')
<div class="movie-info border-b border-gray-800">
    <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
        <img src="<?=$movie['poster_path']?>" alt="skrillex" class="w-64 lg:w-96">
        <div class="md:ml-24">
            <h2 class="text-4xl font-semibold"><?=$movie['title']?></h2>
            
            <div class="flex flex-wrap items center text-gray-400 text-sm ">
                <svg height="21px" style="background:gray" version="1.1" viewBox="0 0 20 21" width="20px" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" xmlns:xlink="http://www.w3.org/1999/xlink"><title/><desc/><defs/><g fill="none" fill-rule="evenodd" id="Page-1" stroke="none" stroke-width="1"><g fill="#000000" id="Core" transform="translate(-296.000000, -422.000000)"><g id="star" transform="translate(296.000000, 422.500000)"><path d="M10,15.273 L16.18,19 L14.545,11.971 L20,7.244 L12.809,6.627 L10,0 L7.191,6.627 L0,7.244 L5.455,11.971 L3.82,19 L10,15.273 Z" id="Shape"/></g></g></g></svg>
                <samp class="mr-1"><?=$movie['vote_average']?></samp>
                <samp class="mx-2">|</samp>
                <span><?=$movie['release_date']?></span>
                <samp class="mx-2">|</samp>
                <samp>
                <?=$movie['genres']?>
                </samp>
            </div>

            <p class="text-gray-300 mt-8">
                <?=$movie['overview']?>
            </p>

            <div class="mt-12">
                <h4 class="text-white font-samibold">Featured Cast</h4>
                <div class="flex mt-4">
                    
                    @foreach ($movie['crew'] as $crew)
                   
                       <div class="mr-8">
                        <div><?=$crew['name']?></div>
                        <div class="text-sm text-gray-400"><?=$crew['job']?></div> 
                    </div> 
                    @endforeach
                   
                  
                </div>
            </div>

            <div x-data="{ isOpen: false }">
                @if (count($movie['videos']['results']) > 0)
                    <div class="mt-12">
                        <button
                            @click="isOpen = true"
                            class="flex inline-flex items-center bg-orange-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-orange-600 transition ease-in-out duration-150 "
                            style="background: orange"
                        >
                            <svg class="w-6 fill-current" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
                            <span class="ml-2">Play Trailer</span>
                        </button>
                    </div>

                    <template x-if="isOpen">
                        <div
                            style="background-color: rgba(0, 0, 0, .5);"
                            class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                        >
                            <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                                <div class="bg-gray-900 rounded">
                                    <div class="flex justify-end pr-4 pt-2">
                                        <button
                                            @click="isOpen = false"
                                            @keydown.escape.window="isOpen = false"
                                            class="text-3xl leading-none hover:text-gray-300">&times;
                                        </button>
                                    </div>
                                    <div class="modal-body px-8 py-8">
                                        <div class="responsive-container overflow-hidden relative" style="padding-top: 56.25%">
                                            <iframe class="responsive-iframe absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/{{ $movie['videos']['results'][0]['key'] }}" style="border:0;" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                @endif
        </div>
    </div>
</div> <!-- end movie-info -->

          <div class="movie-cast border-b border-gray-800">

            <div class="container mx-auto px-4 py-16">
                <h2 class="text-4xl font-semibold">cast</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-16" >
                    @foreach ($movie['cast'] as $cast)
                     
                       <div class="mt-8">
                        <a href="<?=route('actors.show', $cast['id'])?>">
                            <img src="<?='https://image.tmdb.org/t/p/w300/'.$cast['profile_path']?>" alt="actorl" class="hover:opacity-75 transition ease-in-out duration-150 ">
                        </a>
                        <div class="mt-2">
                            <a href="<?=route('actors.show', $cast['id'])?>" class="text-lg mt-2 " ><?=$cast['name']?></a>
                            <div class="flex items center text-gray-400 text-sm mt-1">
                            </div>
                            <div class="text-sm" style="color: gray">
                                <?=$cast['character']?>
                            </div>
                        </div>
                    </div> 
                    
                     @endforeach
                    </div>
                </div>
            </div>
            

            <div class="movie-cast border-b border-gray-800">
                <div class="container mx-auto px-4 py-16">
                    <h2 class="text-4xl font-semibold">Image</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-16" > 
                        @foreach ($movie['images'] as $image)
                         
                           <div class="mt-8">
                            <a href="#">
                                <img src="<?='https://image.tmdb.org/t/p/w500/'.$image['file_path']?>" 
                                alt="image1" class="hover:opacity-75 transition ease-in-out duration-150 ">
                            </a> 
                        </div> 
                       
                         @endforeach
                    </div> 
                    
                         
                </div>  
            </div>    
    
@endsection