<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Movies extends Component
{
    public $movies;
    public $firstMovieId;
    public function mount()
{
    $response = Http::get('https://api.themoviedb.org/3/movie/popular?api_key=a24edf480d427f5cb8cb54efb9ee9007');

    if ($response->successful() && isset($response->json()['results'])) {
        $this->movies = $response->json()['results'];
        $this->firstMovieId = $this->movies[0]['id'] ?? null;
    } else {
        $this->movies = null;
        $this->firstMovieId = null;
    }
}

    public function render()
    {
        return view('movie-detail',[ 'movies' => $this->movies]);
    }
}
