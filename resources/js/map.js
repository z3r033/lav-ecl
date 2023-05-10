/* import 'alpinejs'; 
 */
import Map from "ol/Map.js";
import View from "ol/View.js";
import TileLayer from "ol/layer/Tile.js";
import OSM from "ol/source/OSM.js";

document.addEventListener("alpine:init", () => {
    Alpine.data("map1", function () {
        return {
            map: {},
            init() {
                console.log('Alpine.js map component initialized');
                this.map = new ol.Map({
                    target: this.$refs.map1,
                    layers: [
                        new TileLayer({
                            source: new OSM(),
                        }),
                    ],
             /*        view: new Promise((resolve) => {
                        resolve(new View({
                            projection: "EPSG:4326",
                            center: [0, 0],
                            zoom: 2,
                        }));
                    }), */
                        view: new ol.View({
                        projection: "EPSG:4326",
                        center: [0, 0],
                        zoom: 2,
                    }), 
                });
            },
        };
    });
});