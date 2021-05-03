<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\ViewModels\MoviesViewModel;
use App\ViewModels\MovieViewModel;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $popularMovies = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/popular?api_key=72b6d4013c0948c5b0d3c6480a1ee5f8&language=en-US&page=1')
        ->json()['results'];

        

        $nowPlayingMovies = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/now_playing?api_key=72b6d4013c0948c5b0d3c6480a1ee5f8&language=en-US&page=1')
        ->json()['results'];

        $genres = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/genre/movie/list?api_key=72b6d4013c0948c5b0d3c6480a1ee5f8&language=en-US&page=1')
        ->json()['genres'];
        
       // $genres = collect($genresArray)->mapWithKeys(function ($genre){
         //   return [$genre['id'] => $genre['name']];
       // });
       

        

      //  return view('index',[
        //    'popularMovies' => $popularMovies ,
          //  'nowPlayingMovies' => $nowPlayingMovies,
            //'genres' => $genres ,
        //]);
        $ViewModel = new MoviesViewModel(
            $popularMovies,
            $nowPlayingMovies,
            $genres,
        );
        return view('index', $ViewModel);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/'.$id.'?api_key=72b6d4013c0948c5b0d3c6480a1ee5f8&language=en-US&page=1&append_to_response=credits,videos,images')
        ->json();

        $ViewModel = new MovieViewModel($movie);       
 
        return view('show', $ViewModel);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
