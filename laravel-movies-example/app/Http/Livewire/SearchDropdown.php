<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class SearchDropdown extends Component
{
    public $search = '';
    public function render()
    {
        $searchResults = [''];

        if (strlen($this->search) > 2){
        
        $searchResults = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/search/movie?api_key={72b6d4013c0948c5b0d3c6480a1ee5f8}&query='.$this->search)
        ->json()['results'];
        }
        //dump($searchResults);

        return view('livewire.search-dropdown',[
            'searchResults' => collect($searchResults)->take(7) ,
        ]);
    }
}
