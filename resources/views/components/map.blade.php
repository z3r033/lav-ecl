<script src="{{ mix('js/map.js') }}"></script>
<link rel="stylesheet" href="{{mix("css/map.css")}}" />
<input type="text" x-model="searchQuery">
{{-- <div id="map-container"></div>
<div x-data="openlayersMap()" x-init="init()" class="h-screen">
    <div ref="map" class="h-full"></div>
</div>
--}}
<div>
    {{-- <div class="map h-[600px] border border-slate-300 rounded-md shadow-lg"> --}}
        <div class="map border border-secondary rounded-md shadow-lg" style="height: 600px;">
            <div x-data="map1()" {{-- x-init="init" --}}>

                {{-- <div x-ref="map1" class="map h-[600px] border border-slate-300 rounded-md shadow-lg"> --}}
                    <div x-ref="map1" class="map border border-secondary rounded shadow-lg" style="height: 600px;">
                    </div>

                  <!-- Create an absolute panel relative to the map dom element to contain our trigger button -->
         <div class="absolute top-2 right-8 z-10 rounded-md bg-white bg-opacity-75">
            <div class="ol-unselectable ol-control">
                <button x-on:click.prevent="legendOpened = ! legendOpened"
                    title="Open/Close legend"
                    class="absolute inset-0 flex justify-center items-center">
                    <!-- Heroicon name: outline/globe -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 pl-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>
                </button>
            </div>
        </div>
   <!-- Create an absolute panel relative to the map dom element to contain our legend -->
        <div x-show="legendOpened" x-transition:enter="transition-opacity duration-300"
             x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity duration-300" x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="absolute right-0 top-16 left-2 bottom-2 z-10 max-w-sm rounded-md bg-white bg-opacity-50 shadow-sm">
            <div class="absolute inset-1 rounded-md bg-white bg-opacity-75 p-2">
                Legend panel content
            </div>
        </div>
   </div>


                </div>
            </div>
