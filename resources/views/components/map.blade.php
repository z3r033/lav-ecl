<script src="{{ mix('js/map.js') }}"></script>
<link rel="stylesheet" href="{{mix("css/map.css")}}" />
{{-- <div id="map-container"></div>
<div x-data="openlayersMap()" x-init="init()" class="h-screen">
    <div ref="map" class="h-full"></div>
</div>
--}}
<div>
   {{--  <div class="map h-[600px] border border-slate-300 rounded-md shadow-lg"> --}}
    <div class="map border border-secondary rounded-md shadow-lg" style="height: 600px;">
        <div x-data="map1()"  {{-- x-init="init"  --}}>

        {{--     <div x-ref="map1" class="map h-[600px] border border-slate-300 rounded-md shadow-lg"> --}}
            <div x-ref="map1" class="map border border-secondary rounded shadow-lg" style="height: 600px;"></div>
            </div>
        </div>