<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Livewire\Component;


class MovieDetail extends Component
{
    public function openModal()
    {
        $this->emit('openModal');
    }
    
    public $movie;
    public $showFullOverview = false;
    public $movies;
    public $firstMovieId;
    public $cast;
    public $videoData;


    public function mount($id)
    {
        // Get detailed movie info
        $movieResponse = Http::get('https://api.themoviedb.org/3/movie/' . $id . '?api_key=a24edf480d427f5cb8cb54efb9ee9007');
        $this->movie = $movieResponse->successful() && isset($movieResponse->json()['title']) ? $movieResponse->json() : null;

        // Get list of popular movies
        $moviesResponse = Http::get('https://api.themoviedb.org/3/movie/popular?api_key=a24edf480d427f5cb8cb54efb9ee9007');
        if ($moviesResponse->successful() && isset($moviesResponse->json()['results'])) {
            $this->movies = $moviesResponse->json()['results'];
            $this->firstMovieId = $this->movies[0]['id'] ?? null;
        } else {
            $this->movies = null;
            $this->firstMovieId = null;
        }

        // Get movie credits
        $creditsResponse = Http::get('https://api.themoviedb.org/3/movie/' . $id . '/credits?api_key=a24edf480d427f5cb8cb54efb9ee9007&languages=en-US');
        if ($creditsResponse->successful()) {
            $this->cast = $creditsResponse->json()['cast'];
        } else {
            $this->cast = null;
        }
        $videoResponse = Http::get('https://api.themoviedb.org/3/movie/' . $id . '/videos?api_key=a24edf480d427f5cb8cb54efb9ee9007&language=en-US');
        $video = $videoResponse->successful() && isset($videoResponse->json()['results']) ? $videoResponse->json()['results'] : null;
        $this->videoData = count($video) > 0 ? $video[0] : null;
        Log::info('Video Response:', ['response' => $this->videoData]);

        

    }

    public function render()
    {
        return view('movie-detail', ['movie' => $this->movie, 'movies' => $this->movies, 'cast' => $this->cast,'videoData' => $this->videoData]);
    }
}
