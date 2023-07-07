<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;

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

    public $trailers = [];
public function getFirstMovieId()
{

    $moviesResponse = Http::get('https://api.themoviedb.org/3/movie/popular?api_key=' . env('TMDB_API_KEY') . '&language=en-US&page=1');
    if ($moviesResponse->successful() && isset($moviesResponse->json()['results'])) {
        $this->movies = $moviesResponse->json()['results'];
        $this->firstMovieId = $this->movies[0]['id'] ?? null;
    } else {
        $this->movies = null;
        $this->firstMovieId = null;
    }

    return $this->firstMovieId;
}
    public function mount($id)
    {

        $movieResponse = Http::get('https://api.themoviedb.org/3/movie/' . $id . '?api_key=' . env('TMDB_API_KEY') . '&language=en-US');
        $this->movie = $movieResponse->successful() && isset($movieResponse->json()['title']) ? $movieResponse->json() : null;


        $moviesResponse = Http::get('https://api.themoviedb.org/3/movie/popular?api_key=' . env('TMDB_API_KEY') . '&language=en-US&page=1');
        if ($moviesResponse->successful() && isset($moviesResponse->json()['results'])) {
            $this->movies = $moviesResponse->json()['results'];
            $this->firstMovieId = $this->movies[0]['id'] ?? null;
        } else {
            $this->movies = null;
            $this->firstMovieId = null;
        }


        $creditsResponse = Http::get('https://api.themoviedb.org/3/movie/' . $id . '/credits?api_key=' . env('TMDB_API_KEY') . '&languages=en-US');
        if ($creditsResponse->successful()) {
            $this->cast = $creditsResponse->json()['cast'];
        } else {
            $this->cast = null;
        }
     $videoResponse = Http::get('https://api.themoviedb.org/3/movie/' . $id . '/videos?api_key='. env('TMDB_API_KEY') . '&language=en-US');
        if ($videoResponse->successful()) {
            $videoData = $videoResponse->json()['results'];

            foreach ($videoData as $video) {
                if ($video['type'] === 'Trailer') {
                    $this->trailers[] = $video;
                    break; 
                }
            }

        }








        

    }

    public function render()
    {
        return view('movie-detail', ['movie' => $this->movie, 'movies' => $this->movies, 'cast' => $this->cast, 'trailers'=>$this->trailers]);
    }
}
