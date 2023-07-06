<div class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto"
    style="display: @if ($show) flex @else none @endif; align-items: center; justify-content: center">
    <div class="fixed inset-0 bg-gray-500 opacity-75" wire:click="$set('show', false)"></div>
    <div
        class="relative bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all mx-2 max-w-lg w-full m-auto">
        <div class="bg-white p-2 flex flex-col h-full">
            <div class="sm:flex sm:items-start flex-grow">
                <div class="text-center sm:text-left flex-grow">
                    <div class=" flex-grow relative">
                        @if ($videoData && $videoData['type'] == 'Trailer')
                            <div style="height: 0; padding-bottom: 56.25%;">
                                <iframe class="absolute top-0 left-0 w-full h-full"
                                    src="{{ $show ? 'https://www.youtube.com/embed/' . $videoData['key'] : '' }}"
                                    frameborder="0"
                                    allow="accelerometer; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            </div>
                        @else
                            <p class="text-sm text-center items-center flex justify-center leading-5 text-gray-500">No
                                trailer
                                available.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
