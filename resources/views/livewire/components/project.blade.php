@foreach ($projects as $project)
    <div class="group mb-3 sm:mb-8">
        @php
            $image = json_decode($project->library, true)[0]
        @endphp
        <a href="/project/{{$project->slug}}">
            <section
                class="bg-white max-w-[42rem] border-base-200 border-2 rounded-lg overflow-hidden sm:pr-8 relative sm:h-[20rem] hover:bg-gray-200 transition sm:group-even:pl-8 dark:bg-base-100 dark:hover:bg-white/10">
                <div
                    class="pt-4 pb-7 px-5 sm:pl-10 sm:pr-2 sm:pt-10 sm:max-w-[60%] flex flex-col h-full sm:group-even:ml-[15rem]">
                    <h3 class="text-2xl font-semibold">{{ $project->title }}</h3>
                    <p class="mt-2 leading-relaxed">
                        {!! $project->desc !!}
                    </p>
                    <div class="flex flex-wrap gap-2 justify-items-start items-start justify-start">
                        @foreach ($project->techStack as $tech)
                            <div class="flex gap-2 py-1 px-4 rounded-sm items-center cursor-default hover:motion-preset-seesaw click:motion-preset-seesaw "  style="background-color: {{ $tech->bg_color }}; width: fit-content;">
                                {!! $tech->svg !!}
                                <span style="color: {{ $tech->text_color }}">{{ $tech->name }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <img src="{{ $image['url'] }}" alt="" width="400" height="100"
                    class="absolute hidden sm:block top-8 -right-40 rounded-t-lg shadow-2xl transition group-hover:scale-[1.04] group-hover:-translate-x-3 group-hover:translate-y-3 group-hover:-rotate-2 group-even:group-hover:translate-x-3 group-even:group-hover:translate-y-3 group-even:group-hover:rotate-2 group-even:right-[initial] group-even:-left-40" />
            </section>
        </a>
    </div>
@endforeach


