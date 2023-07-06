<div class="max-h-screen ">
    @if ($movie)
        <div class="relative h-screen w-full">
            <img src="{{ 'https://image.tmdb.org/t/p/original' . $movie['backdrop_path'] }}" alt="poster"
                class="h-full w-full object-cover">
            <div class="absolute bottom-0 left-0 right-0 w-full bg-gradient-to-t from-slate-900 h-3/4">
            </div>

        </div>
        <div class="px-4 text-white bottom-0 left-0 right-0  h-1/2 absolute  w-full grid grid-cols-2 gap-2 grid-rows-2">


            <div class="row-span-2">
                <h1 class="pb-2  font-bold text-white text-4xl">{{ $movie['title'] }}</h1>
                <div class="flex flex-row items-center">

                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                        <path fill-rule="evenodd" class="text-white"
                            d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                            clip-rule="evenodd" />

                    </svg>
                    <p class="font-bold text-sm">{{ round($movie['vote_average'], 2) }}</p>
                    <p class="mx-2">I</p>
                    <p class="text-[#a9a8ad]">{{ number_format($movie['vote_count'], 2) }}</p>
                </div>
                <div class="">

                    <p class="text-sm">
                        @if ($showFullOverview)
                            {{ $movie['overview'] }}
                        @else
                            {{ Str::substr($movie['overview'], 0, 150) }}...
                        @endif
                    </p>
                    <button wire:click="$toggle('showFullOverview')"
                        class="hover:text-blue-400 text-white font-bold text-sm">
                        @if ($showFullOverview)
                            Read Less
                        @else
                            Read More
                        @endif
                    </button>
                </div>
                <p>{{ $movie['release_date'] }}</p>
                <div class="flex items-center justify-center mt-8">
                    <button wire:click="openModal"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 hover:scale-105 rounded">

                        Watch Trailer
                    </button>


                    @livewire('modal', ['videoData' => $videoData])

                </div>
            </div>
            <div class="flex items-center justify-center p-2" wire:ignore>
                @if ($movies)
                    <div id="movies-list" class="flex flex-nowrap overflow-x-auto">
                        @foreach ($movies as $movie)
                            <a href="{{ route('movie-detail', ['id' => $movie['id']]) }}">
                                <div class="mr-4 flex flex-col items-center hover:scale-105 pt-2">
                                    <img src="{{ 'https://image.tmdb.org/t/p/w500' . $movie['backdrop_path'] }}"
                                        alt="poster" class="max-h-[110px] max-w-[170px] object-contain rounded-md " />
                                    <h2 class="text-center">{{ $movie['title'] }}</h2>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @else
                    <p>No movies found.</p>
                @endif
            </div>




            <div class="flex items-center justify-center">
                @if ($cast)
                    <div class="flex flex-nowrap overflow-x-auto">
                        @foreach ($cast as $actor)
                            <div class="mr-4 flex flex-col items-center hover:scale-105 pt-2 cursor-pointer">
                                <div class="w-16 h-16 rounded-full bg-cover bg-center"
                                    style="background-image: url({{ $actor['profile_path'] == null ? 'https://i.stack.imgur.com/l60Hf.png' : 'https://image.tmdb.org/t/p/w500' . $actor['profile_path'] }})">
                                </div>
                                <h2 class="text-center">{{ $actor['name'] }}</h2>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>





        </div>
        <!-- ...other fields... -->
    @else
        <p>No movie data available.</p>
    @endif
</div>
