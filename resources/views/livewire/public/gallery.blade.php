<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;

new
#[Layout('components.layouts.public')]
class extends Component {
    //
}; ?>

<div>
    <div class="min-h-screen">
        <div class="max-w-5xl mx-auto pt-2">
            <div class="w-full px-2 mx-auto mb-4 md:mb-8">
                <x-header title="🍁 Gallery" size="text-xl md:text-4xl" class="mb-2" >
                    <x-slot:actions>
                        <x-theme-toggle class="btn btn-sm md:hidden btn-circle" />
                    </x-slot:actions>
                </x-header>
                <hr>
            </div>
          <div class="p-2 md:p-4 columns-2 md:columns-3 gap-4">
            <div class="break-inside-avoid rounded-lg shadow-md hover:shadow-lg">
              <div class="flex flex-col">
                <div class="w-full">
                  <iframe class="w-full h-auto" src="//www.youtube.com/embed/lCYvN7Z2l3E" allowfullscreen="allowfullscreen"></iframe>
                </div>
                <div class="p-2 basis-14">
                  <div class="flex justify-between">
                    <p class="text-xs md:text-md font-bold leading-6 ">A lion with Dan</p>
                    <div class="flex items-center justify-between text-sm text-gray-500 space-x-1">
                      <div class="flex gap-1 mt-1">
                        <span>10</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                           <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"></path>
                        </svg>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="break-inside-avoid mt-4 rounded-lg shadow-md hover:shadow-lg">
             <div class="flex flex-col">
                <img class="w-full overflow-hidden rounded-lg" src="https://images.unsplash.com/photo-1454496522488-7a8e488e8606?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=2952&amp;q=80">
                <div class="p-2 basis-14">
                  <div class="flex justify-between">
                    <p class="text-xs md:text-md font-bold leading-6 ">Mountain summit</p>
                    <div class="flex items-center justify-between text-sm text-gray-500 space-x-1">
                      <div class="flex gap-1 mt-1">
                        <span>10</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                           <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"></path>
                        </svg>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="break-inside-avoid mt-4 rounded-lg shadow-md hover:shadow-lg">
              <div class="flex flex-col">
                <img class="w-full overflow-hidden rounded-lg" src="https://cdn.pixabay.com/photo/2015/11/16/16/28/bird-1045954_960_720.jpg">
                <div class="p-2 basis-14">
                  <div class="flex justify-between">
                    <p class="text-xs md:text-md font-bold leading-6 ">The bird</p>
                    <div class="flex items-center justify-between text-sm text-gray-500 space-x-1">
                      <div class="flex gap-1 mt-1">
                        <span>10</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                           <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"></path>
                        </svg>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="break-inside-avoid mt-4 rounded-lg shadow-md hover:shadow-lg">
              <div class="flex flex-col">
                <img class="w-full overflow-hidden rounded-lg" src="https://images.unsplash.com/photo-1463288889890-a56b2853c40f?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=3132&amp;q=80">
                <div class="p-2 basis-14">
                  <div class="flex justify-between">
                    <p class="text-xs md:text-md font-bold leading-6 ">Mountain an lake</p>
                    <div class="flex items-center justify-between text-sm text-gray-500 space-x-1">
                      <div class="flex gap-1 mt-1">
                        <span>10</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                           <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"></path>
                        </svg>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="break-inside-avoid mt-4 rounded-lg shadow-md hover:shadow-lg">
              <div class="flex flex-col">
                <img class="w-full overflow-hidden rounded-lg" src="https://images.unsplash.com/photo-1498603993951-8a027a8a8f84?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=2936&amp;q=80">
                <div class="p-2 basis-14">
                  <div class="flex justify-between">
                    <p class="text-xs md:text-md font-bold leading-6 ">Beautiful landscape</p>
                    <div class="flex items-center justify-between text-sm text-gray-500 space-x-1">
                      <div class="flex gap-1 mt-1">
                        <span>4</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                           <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"></path>
                        </svg>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="break-inside-avoid mt-4 rounded-lg shadow-md hover:shadow-lg">
              <div class="flex flex-col">
                <img class="w-full overflow-hidden rounded-lg" src="https://images.unsplash.com/photo-1526400473556-aac12354f3db?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=2940&amp;q=80">
                <div class="p-2 basis-14">
                  <div class="flex justify-between">
                    <p class="text-xs md:text-md font-bold leading-6 ">Mountain and sea</p>
                    <div class="flex items-center justify-between text-sm text-gray-500 space-x-1">
                      <div class="flex gap-1 mt-1">
                        <span>6</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                           <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"></path>
                        </svg>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="break-inside-avoid mt-4 rounded-lg shadow-md hover:shadow-lg">
              <div class="flex flex-col">
                <div class="w-full overflow-hidden">
                  <img class="w-full overflow-hidden rounded-lg" src="https://cdn.pixabay.com/photo/2021/11/30/17/06/tree-6835828_960_720.jpg">
                </div>
                <div class="p-2 basis-14">
                  <div class="flex justify-between">
                    <p class="text-xs md:text-md font-bold leading-6 ">The snow and tree</p>
                    <div class="flex items-center justify-between text-sm text-gray-500 space-x-1">
                      <div class="flex gap-1 mt-1">
                        <span>10</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                           <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"></path>
                        </svg>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="break-inside-avoid mt-4 rounded-lg shadow-md hover:shadow-lg">
              <div class="flex flex-col">
                <div class="w-full overflow-hidden">
                  <img class="w-full overflow-hidden rounded-lg" src="https://images.unsplash.com/photo-1617369120004-4fc70312c5e6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1587&q=80">
                </div>
                <div class="p-2 basis-14">
                  <div class="flex justify-between">
                    <p class="text-xs md:text-md font-bold leading-6 ">Mountain and fog</p>
                    <div class="flex items-center justify-between text-sm text-gray-500 space-x-1">
                      <div class="flex gap-1 mt-1">
                        <span>10</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                           <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"></path>
                        </svg>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="break-inside-avoid mt-4 rounded-lg shadow-md hover:shadow-lg">
                <div class="flex flex-col">
                  <div class="w-full overflow-hidden">
                    <img class="w-full overflow-hidden rounded-lg" src="https://cdn.pixabay.com/photo/2021/11/30/17/06/tree-6835828_960_720.jpg">
                  </div>
                  <div class="p-2 basis-14">
                    <div class="flex justify-between">
                      <p class="text-xs md:text-md font-bold leading-6 ">The snow and tree</p>
                      <div class="flex items-center justify-between text-sm text-gray-500 space-x-1">
                        <div class="flex gap-1 mt-1">
                          <span>10</span>
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                             <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"></path>
                          </svg>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
</div>
