<div class="px-2">
    @if (empty($posts))
    <div class="grid grid-cols-1 w-full  gap-8 md:gap-12 max-w-[42rem] mb-16">
        {{-- Placeholder --}}
        {!! $this->placeholder() !!}
    </div>

    @else
        <div class="grid grid-cols-1  gap-8 md:gap-12 max-w-[42rem] mb-16 card-container">
            @foreach ($posts as $post)
                <div
                    class="transition-all duration-500 rounded-lg relative group grid grid-cols-1 md:grid-cols-2 object-cover shadow-md">
                    <div class="cursor-pointer overflow-hidden rounded-t-lg md:rounded-r-none md:rounded-l-lg">
                        <Image src="{{ $post['cover_image'] }}" alt=""
                            class="group-hover:scale-110 transition-all duration-500 h-full object-cover" />
                    </div>

                    <div class="m-3 sm:p-3 flex flex-col">
                        <div class="flex justify-between items-center text-sm">
                            <p>{{ \Carbon\Carbon::parse($post['published_at'])->diffForHumans() }}</p>

                            <div class="flex items-center gap-3">
                                <p class="flex items-center gap-1">
                                    <x-icon name="s-heart" class="text-gray-400" />
                                    <span>{{ $post['public_reactions_count'] }}</span>
                                </p>

                                <p class="flex items-center gap-1">
                                    <x-icon name="s-chat-bubble-left" class="text-gray-400" />
                                    <span>{{ $post['comments_count'] }}</span>
                                </p>
                            </div>
                        </div>

                        <a href="{{ $post['url'] }}" target="_blank"
                            class="transition duration-500 hover:text-pink-500">
                            <p class="my-2 lg:my-3 cursor-pointer  sm:text-lg font-medium">
                                {{ $post['title'] }}
                            </p>
                        </a>

                        <p class="text-sm pb-6 line-clamp-3">
                            {{ $post['description'] }}
                        </p>

                        <div class="py-2">
                            <p class="mb-2 text-sm absolute right-5 bottom-2 text-right text-gray-600">
                                {{ $post['reading_time_minutes'] }} Min Read</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
