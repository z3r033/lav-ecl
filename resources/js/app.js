
import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
window.Alpine = Alpine;
Alpine.plugin(focus);
Alpine.start()
import './bootstrap';
import "admin-lte/plugins/jquery/jquery";
import "admin-lte/plugins/bootstrap/js/bootstrap.bundle";
import "admin-lte/dist/js/adminlte";
import "sweetalert2/dist/sweetalert2";
import Map from "ol/Map.js";
import View from "ol/View.js";
import TileLayer from "ol/layer/Tile.js";
import OSM from "ol/source/OSM.js";

document.addEventListener("alpine:init", () => {
    Alpine.data("map", function () {
        return {
            map: {},
            init() {
                this.map = new Map({
                    target: this.$refs.map,
                    layers: [
                        new TileLayer({
                            source: new OSM(),
                        }),
                    ],
                    view: new View({
                        projection: "EPSG:4326",
                        center: [0, 0],
                        zoom: 2,
                    }),
                });
            },
        };
    });
});
