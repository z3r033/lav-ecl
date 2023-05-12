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
    const geocodingAPI = 'https://nominatim.openstreetmap.org/search';
    Alpine.data('map1', function () {
        return {
            searchQuery: '',

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
               /* filteredFeatures: function() {
                    const query = this.searchQuery.toLowerCase().trim();
                    if (query === '') {
                      return this.features;
                    } else {
                      return this.features.filter(feature => feature.get('name').toLowerCase().includes(query));
                    }
                  },*/
               /*   here search for points
               filteredFeatures() {
                    const geocodingAPI = 'https://nominatim.openstreetmap.org/search';
                    const query = this.searchQuery.toLowerCase().trim();
                    if (query === '') {
                      return this.features;
                    } else {
                      // Perform place search using Nominatim API
                      const searchURL = `${geocodingAPI}?q=${encodeURIComponent(query)}&format=json`;
                      console.log(searchURL);
                      return fetch(searchURL)
                        .then(response => response.json())
                        .then(data => {
                          const coordinates = data.map(result => ({
                            latitude: parseFloat(result.lat),
                            longitude: parseFloat(result.lon)

                          }));
                          console.log(coordinates);
                          return this.features
                          .filter(feature => {
                            const geometry = feature.getGeometry();
                            if (geometry.getType() === 'Point') {
                              const [featureLon, featureLat] = geometry.getCoordinates();
                              return coordinates.some(coord => coord.latitude === featureLat && coord.longitude === featureLon);
                            }
                            return false;
                          });
                        });
                    }
                  },*/

                /*  filteredFeatures() {
                    const geocodingAPI = 'https://nominatim.openstreetmap.org/search';
                    const query = this.searchQuery.toLowerCase().trim();
                    if (query === '') {
                      return this.features;
                    } else {
                      const searchURL = `${geocodingAPI}?q=${encodeURIComponent(query)}&format=json`;
                      console.log(searchURL);

                      return fetch(searchURL)
                        .then(response => response.json())
                        .then(data => {
                          const coordinates = data.map(result => ({
                            latitude: parseFloat(result.lat),
                            longitude: parseFloat(result.lon)
                          }));
                         // console.log(coordinates);

                          const pointFeatures = coordinates.map(coord => new Feature({
                            geometry: new Point([coord.longitude, coord.latitude])
                          }));
                        console.log(this.features);
                          return this.features.concat(pointFeatures);

                        })
                        .catch(error => {
                          console.error('Error fetching geocoding data:', error);
                          // Handle any errors that occur during the request
                        });
                    }
                  },*/
                  filteredFeatures() {
                    const geocodingAPI = 'https://nominatim.openstreetmap.org/search';
                    const query = this.searchQuery.toLowerCase().trim();
                    if (query === '') {
                        console.log("this.features: ",this.features);
                      return this.features;
                    } else {
                      const searchURL = `${geocodingAPI}?q=${encodeURIComponent(query)}&format=json`;
                      console.log(searchURL);

                      return fetch(searchURL)
                        .then(response => response.json())
                        .then(data => {
                          const coordinates = data.map(result => ({
                            latitude: parseFloat(result.lat),
                            longitude: parseFloat(result.lon),
                            name: result.display_name
                          }));
                          console.log(coordinates);

                          const pointFeatures = coordinates.map(coord => new Feature({
                            geometry: new Point([coord.longitude, coord.latitude]),
                            name: coord.name,
                          }));
                        console.log("pointFeatures ",pointFeatures);
                          return pointFeatures;
                        })
                        .catch(error => {
                          console.error('Error fetching geocoding data:', error);
                          // Handle any errors that occur during the request
                        });
                    }
                  },


                  /*filteredFeatures() {
    const geocodingAPI = 'https://api.opencagedata.com/geocode/v1/json';
    const query = this.searchQuery.toLowerCase().trim();
    if (query === '') {
      return this.features;
    } else {
      const apiKey = 'YOUR_API_KEY'; // Replace with your OpenCage Geocoder API key

      const searchURL = `${geocodingAPI}?q=${encodeURIComponent(query)}&key=${apiKey}`;

      const requestOptions = {
        method: 'GET',
        mode: 'cors' // Enable CORS
      };

      return fetch(searchURL, requestOptions)
        .then(response => response.json())
        .then(data => {
          // Process the response data and extract the relevant information
          const results = data.results;
          const coordinates = results.map(result => ({
            latitude: result.geometry.lat,
            longitude: result.geometry.lng
          }));

          return this.features.filter(feature => {
            const geometry = feature.getGeometry();
            if (geometry.getType() === 'Point') {
              const [featureLon, featureLat] = geometry.getCoordinates();
              return coordinates.some(coord => coord.latitude === featureLat && coord.longitude === featureLon);
            }
            return false;
          });
        })
        .catch(error => {
          console.error('Error fetching geocoding data:', error);
          // Handle any errors that occur during the request
        });
    }
  },
*/
            init() {

                console.log('Alpine.js map component initialized');
                const vectorSource = new VectorSource({
               /*     features: this.features,*/
                      features: this.filteredFeatures(),
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
                    const clickedFeature = this.map.forEachFeatureAtPixel(event.pixel, (feature) => feature);
                    if (clickedFeature) {
                        const type = clickedFeature.getGeometry().getType();
                        if (type === 'Point') {
                            this.map.getView().setCenter(clickedFeature.getGeometry().getCoordinates());
                            const polygonFeature = vectorSource.getFeatures().find(
                                (feature) => feature.get('name') === 'Beni Mellal sector'
                            );
                            this.map.getView().fit(polygonFeature.getGeometry().getExtent());
                        }
                    }
                });

                this.$watch('searchQuery', () => {
                    vectorSource.clear();
                    vectorSource.addFeatures(this.filteredFeatures());
                });

                const searchInput = document.getElementById('searchInput');
                searchInput.addEventListener('input', (event) => {
                    this.searchQuery = event.target.value;
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
