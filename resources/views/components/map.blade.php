<script src="{{ mix('js/map.js') }}"></script>
<link rel="stylesheet" href="{{mix("css/map.css")}}" />
<!--<input type="text" x-model="searchQuery">-->
{{-- <div id="map-container"></div>
<div x-data="openlayersMap()" x-init="init()" class="h-screen">
    <div ref="map" class="h-full"></div>
</div>
--}}
<div>
    {{--  @props(['tures'])--}}
    {{-- <div class="map h-[600px] border border-slate-300 rounded-md shadow-lg"> --}}
        <div class="map border border-secondary rounded-md shadow-lg" style="height: 600px;">
             {{-- <div x-data="map1()" {{-- x-init="init" --}}>
             {{--    <div x-data="map1()" x-init="initComponent({{ json_encode($tures) }})">  --}}
                    <div x-data="map1()" x-init="initComponent()">
                {{-- <div x-ref="map1" class="map h-[600px] border border-slate-300 rounded-md shadow-lg"> --}}
                 {{--   <div x-ref="map1" class="map border border-secondary rounded shadow-lg" style="height: 600px;">--}}
                        <div x-ref="map1" class="relative h-[600px] overflow-clip rounded-md border border-slate-300 shadow-lg">

                        <div id="modal" x-show="openModal" x-ref="modal" class="modal fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                            <div class="bg-white w-96 p-6 rounded-lg">
                              <div class="flex justify-end">
                                <button   class="close text-gray-500 hover:text-gray-700" @click="openModal = false">
                                  <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6 18L18 6M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                  </svg>
                                </button>
                              </div>
                              <h2 class="text-xl font-bold mb-4">Clicked Point Coordinates</h2>
                              <p>
                                Latitude: <span x-text="clickedCoordinates.latitude"></span><br>
                                Longitude: <span x-text="clickedCoordinates.longitude"></span>
                              </p>
                            </div>
                          </div>

                    </div>


                    <div class="absolute top-2 right-8 z-10 rounded-md bg-white bg-opacity-75">
                        <div class="ol-unselectable ol-control">
                            <button x-on:click.prevent="legendOpened = !legendOpened" title="Open/Close legend" class="absolute inset-0 flex justify-center items-center">
                                <!-- Heroicon name: outline/globe -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 pl-0.5" viewBox="0 0 24 24" fill="green">
                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                              </button>
                        </div>
                      </div>
                      <div class="absolute top-2 right-8 z-10 rounded-md bg-white bg-opacity-75">
                        <div class="ol-unselectable ol-control">
                            <button x-on:click.prevent="legendOpened = !legendOpened" title="Open/Close legend" class="absolute inset-0 flex justify-center items-center">
                                <!-- Heroicon name: outline/globe -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 pl-0.5" viewBox="0 0 24 24" fill="green">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>



<!-- Create an absolute panel relative to the map dom element to contain our legend -->
<div x-show="legendOpened" x-transition:enter="transition-opacity duration-300"
     x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
     x-transition:leave="transition-opacity duration-300" x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     class="absolute right-0 top-16 left-2 bottom-2 z-10 max-w-sm rounded-md bg-emerald-300 bg-opacity-50 shadow-sm" style="overflow: scroll;">
    <div class="absolute inset-1 rounded-md bg-emerald-50 bg-opacity-75 p-2">
        <div class="flex items-start justify-between">
            <h3 class="text-lg font-medium text-slate-700">Menu</h3>
            <button x-on:click.prevent="legendOpened = false"
                    class="text-2xl font-black text-slate-400 transition hover:text-[#3369A1] focus:text-[#3369A1] focus:outline-none">&times;</button>
        </div>
        <h3 class="text-lg font-semibold mb-2">Search Results:</h3>
        <div x-if="searchResults.length > 0">
            <h3>Search Results:</h3>
            <ul>
              <template x-for="result in searchResults">

                <a href="#" :title="'Go to ' +  result.name"
                x-text="result.name" x-on:click.prevent="gotoResult(result)"
                class="block transition hover:text-slate-800 hover:underline focus:text-slate-800 focus:underline focus:outline-none">
              </template>



          </a>
            </ul>
            <button id="addsector" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                Ajouter sector
              </button>
            <button id="addsupport" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                Ajouter support
              </button>




<div>
<ul class="mt-2 space-y-1 rounded-md border border-slate-300 bg-white p-2">
                        <template x-for="(layer, index) in map.getAllLayers().reverse()" :key="index">
                            <li class="flex items-center px-2 py-1">

                                <div x-id="['legend-checkbox']">
                                    <label x-bind:for="$id('legend-checkbox')" class="flex items-center">
                                        <input type="checkbox" x-bind:checked="layer.getVisible()"
                                               x-bind:id="$id('legend-checkbox')"
                                               x-on:change="layer.setVisible(!layer.getVisible())"
                                               class="rounded border-slate-300 text-[#3369A1] shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        <span class="ml-2 text-sm text-slate-600" x-text="layer.get('label')"></span>
                                    </label>

                                    <template x-if="layer.get('label') === 'support' && layer.getVisible()">
                                        <div class="mt-2 ml-6 text-sm text-slate-600">

                                       {{--  <template x-for="(feature, index) in layer.getSource().getFeatures()" :key="index">
                                            <a href="#"
                                                :title="'Go to ' +  feature.get('name')"
                                                x-text="feature.get('name')"
                                                x-on:click.prevent="gotoFeature(feature)"
                                                class="block hover:underline hover:text-slate-800 focus:outline-none focus:underline focus:text-slate-800 transition">
                                            </a>
                                        </template> --}}

                                        <template x-for="(feature, index) in supportFeatures" :key="index">
                                            <a href="#" :title="'Go to ' +  feature.get('type_support')+ ' '+ feature.get('id')"
                                                x-text="feature.get('type_support')+' ' +feature.get('id')" x-on:click.prevent="gotoFeature(feature)"
                                                class="block transition hover:text-slate-800 hover:underline focus:text-slate-800 focus:underline focus:outline-none">
                                            </a>
                                        </template>


                                        </div>
                                    </template>


                                    <template x-if="layer.get('label') === 'secteurs' && layer.getVisible()">
                                        <div class="mt-2 ml-6 text-sm text-slate-600">
                                            <template x-for="(feature, index) in secteurFeatures" :key="index">
                                                <a href="#" :title="'Go to ' +  feature.get('ville')"
                                                    x-text="feature.get('ville')" x-on:click.prevent="gotoFeaturegeometry(feature)"
                                                    class="block transition hover:text-slate-800 hover:underline focus:text-slate-800 focus:underline focus:outline-none">
                                                </a>
                                            </template>


                                        </div>
                                    </template>



                                </div>

                            </li>
                        </template>
                    </ul>
          </div>

    </div>
       <!--      <ul>
            <template x-for="feature in filteredFeatures" :key="feature.id">
                <li x-text="feature.name"></li>
            </template>
       <template x-if="filteredFeatures.length === 0">
                <li>No results found.</li>
            </template>-->
        </ul>
    </div>
</div>






<!-- Support modal -->
<div tabindex="-1" id="supportModal" x-show="opensupportModal" x-ref="supportModal" class="modal fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->

        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" @click="opensupportModal = false" class="close absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="support-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>

            <div class="px-6 py-6 lg:px-8">

                <template x-if="activeDraw === 'default'">
                    <div>
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">default</h3>
                <p>
                    Latitude: <span x-text="clickedCoordinates.latitude"></span><br>
                    Longitude: <span x-text="clickedCoordinates.longitude"></span>
                  </p>
                    </div>
                </template>
                  <template x-if="activeDraw === 'support'">

                <div class="">
                    <div class="col-span-1">
                        <p>
                            Latitude: <span x-text="clickedCoordinates.latitude"></span><br>
                            Longitude: <span x-text="clickedCoordinates.longitude"></span>
                          </p>
                        <div class="bg-blue-500 text-white p-4">
                            <h3 class="text-2xl"><i class="fas fa-user-plus"></i> Formulaire de création d'un nouvel support</h3>
                        </div>

                        <div class="bg-white p-4 mt-4">
                            <form wire:submit.prevent="save">

                                    </form>
                                </div>
                            </div>

                  </template>
                  <div x-show="activeDraw === 'sector'">
                    <div>
                    <h2>Clicked Polygon Coordinates:</h2>


                    <ul>


                          <livewire:secteur-live />

                    </ul>
                    </div>
                  </div>


            </div>
        </div>
    </div>
</div>


                </div>
            </div>
