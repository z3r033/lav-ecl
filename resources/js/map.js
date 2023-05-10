import Map from 'ol/Map.js';
import View from 'ol/View.js';
import TileLayer from 'ol/layer/Tile.js';
import Feature from 'ol/Feature';
import VectorSource from 'ol/source/Vector';
import VectorLayer from 'ol/layer/Vector';
import OSM from 'ol/source/OSM.js';
import Point from 'ol/geom/Point';
import Polygon from 'ol/geom/Polygon';
import { Style, Fill, Stroke, Circle, Text } from 'ol/style.js';
import XYZ from 'ol/source/XYZ.js';

document.addEventListener('alpine:init', () => {
    Alpine.data('map1', function () {
        return {
            
            legendOpened: false,
            map: {},
            // a vector source is composed of features, which are basically objects with a geometry (point in
            // our case) and attributes (name in this example), we initialize our component variable to an
            // array of 3 features:
            features : [
                    new Feature({
                        geometry: new Point([-6.4166, 32.3333]),
                        name: 'Beni mellal',
                    }),

                    new Feature({
                        geometry: new Polygon([[
                            [-6.407, 32.369],
                            [-6.435, 32.332],
                            [-6.374, 32.311],
                            [-6.369, 32.344],
                            [-6.407, 32.369]
                        ]]),
                        name: 'Beni Mellal sector'
                    })
                ],
            init() {       
                  
                console.log('Alpine.js map component initialized');
                const vectorSource = new VectorSource({
                    features: this.features,
                });
                this.map = new Map({
                    target: this.$refs.map1,
                    layers: [
                         new TileLayer({
                            source: new OSM(),
                        }), 
                      /*   new TileLayer({
                            source: new XYZ({
                              url: 'https://map1.vis.earthdata.nasa.gov/wmts-webmerc/VIIRS_CityLights_2012/default//GoogleMapsCompatible_Level8/{z}/{y}/{x}.jpg',
                              maxZoom: 8,
                              crossOrigin: 'anonymous',
                            }),
                            opacity: 0.7,
                          }), */
                        new VectorLayer({
                            source: vectorSource,
                            style: this.styleFunction,
                        })
                    ],
                    view: new View({
                        /* projection: 'EPSG:3857', */
                        projection: 'EPSG:4326', 
                        center: [-6.4166, 32.3333],
                        zoom: 6,
                    })
                });
                  // Add click event listener to the map
        
        this.map.on('click', (event) => {
            // Get the clicked feature
            const clickedFeature = this.map.forEachFeatureAtPixel(event.pixel, (feature) => feature);
  
            if (clickedFeature) {
              const type = clickedFeature.getGeometry().getType();
  
              if (type === 'Point') {
                // Find the corresponding polygon feature by name
                const polygonFeature = vectorSource.getFeatures().find(
                  (feature) => feature.get('name') === 'Beni Mellal sector'
                );
  
                // Zoom the map to the extent of the polygon feature
                this.map.getView().fit(polygonFeature.getGeometry().getExtent());
              }
            }
          });


            },
            // The styleFunction defines how each feature will look on the map, it receives 
            // each individual feature, we will use this later to conditionaly style them. 
            // The styleFunction also defines labels for our features, based on their name 
            // attributes in our example. The style will represent a circle with a 4px radius 
            // with fill and stroke colors, for the label, we get a little fancy and make it 
            // offset with a transparent background, this example is a first demonstration 
            // on how to symbolize a layer of points.
            styleFunction(feature) {
                const geometry = feature.getGeometry();
                const type = geometry.getType();

                let style;

                if (type === 'Point') {
                    // style for point features
                    style = new Style({
                        image: new Circle({
                            radius: 6,
                            fill: new Fill({
                                color: 'red',
                            }),
                            stroke: new Stroke({
                                color: 'rgba(192, 192, 192, 1)',
                                width: 2
                            }),
                        }),
                        text: new Text({
                            font: '12px sans-serif',
                            textAlign: 'left',
                            text: feature.get('name'),
                            offsetY: -15,
                            offsetX: 5,
                            backgroundFill: new Fill({
                                color: 'rgba(255, 255, 255, 0.5)',
                            }),
                            backgroundStroke: new Stroke({
                                color: 'rgba(227, 227, 227, 1)',
                            }),
                            padding: [5, 2, 2, 5]
                        })
                    });
                } else if (type === 'Polygon') {
                    // style for polygon features
                    style = new Style({
                        fill: new Fill({
                            color: 'rgba(0, 255, 0, 0.1)'
                        }),
                        stroke: new Stroke({
                            color: 'green',
                            width: 2
                        })
                    });
                }

                return style;
            }
        };
    });
});