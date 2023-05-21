import Map from 'ol/Map.js';
import View from 'ol/View.js';
import TileLayer from 'ol/layer/Tile.js';
import Feature from 'ol/Feature';
import VectorSource from 'ol/source/Vector';
import VectorLayer from 'ol/layer/Vector';
import OSM from 'ol/source/OSM.js';
import Point from 'ol/geom/Point';
import Polygon from 'ol/geom/Polygon';
import { Style, Fill, Stroke, Circle, Text, Icon } from 'ol/style.js';
import GeoJSON from 'ol/format/GeoJSON';

import XYZ from 'ol/source/XYZ.js';

document.addEventListener('alpine:init', () => {
    //const geocodingAPI = 'https://nominatim.openstreetmap.org/search';
    Alpine.data('map1', function () {
        return {
            openModal: false,
            opensupportModal: false,
            supportModal: null,
            clickedCoordinates: {},
            clickedPolygonCoordinates: [],
            finpolygon: false,
            clickCount :0,
            previousClickCoordinate : null,
            searchQuery: '',
            searchResults: [],
            supportLayer: [],
            sectorLayer: [],
            vectorSource: new VectorSource({
                features: [], // Initialize with empty features array
              }),
            legendOpened: true,
            activeDraw :'default',
            map: {},
            // a vector source is composed of features, which are basically objects with a geometry (point in
            // our case) and attributes (name in this example), we initialize our component variable to an
            // array of 3 features:
          /*  features : [
                    new Feature({
                        geometry: new Point([-6.4166, 32.3333]),
                        name: 'Beni mellal',
                    }),
                    new Feature({
                        geometry: new Point([-74.04455265662958, 40.68928126997774]),
                        name: 'Statue of Liberty',
                    }),
                    new Feature({
                        geometry: new Point([12.492283213388305, 41.890266877448695]),
                        name: 'Rome Colosseum',
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
                ],*/
                features: [],
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
                    //https://nominatim.openstreetmap.org/search?q=<your_query>&&format=json


                    const query = this.searchQuery.toLowerCase().trim();
                    if (query === '') {
                        console.log("this.features: ",this.features);
                      return this.features;
                    } else {
                      const searchURL = `${geocodingAPI}?q=${encodeURIComponent(query)}&city=Beni%20Mellal&format=json`;
                      //const searchURL = `${geocodingAPI}?q=${encodeURIComponent(query)}&format=json`;
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

                  searchButtonClicked() {
                    const geocodingAPI = 'https://nominatim.openstreetmap.org/search';
                    this.searchQuery = document.getElementById('searchInput').value;
                    const query = this.searchQuery.toLowerCase().trim();

                    if (query === '') {
                      console.log('Empty search query');
                      return;
                    }

                    const searchURL = `${geocodingAPI}?q=${encodeURIComponent(query)}&format=json`;
                    console.log('Search URL:', searchURL);

                    fetch(searchURL)
                      .then(response => response.json())
                      .then(data => {
                        const coordinates = data.map(result => ({
                          latitude: parseFloat(result.lat),
                          longitude: parseFloat(result.lon),
                          name: result.display_name
                        }));

                        console.log('Coordinates:', coordinates);
                        this.searchResults = coordinates;
                        // Perform your desired actions with the coordinates, such as updating the map or displaying search results
                        // Example:
                        // - Update the map markers
                        // - Display search results on the page

                        // - Center the map on the first coordinate

                        // Clear previous search results
                        this.vectorSource.clear();

                        // Add new search results to the vector source
                        const pointFeatures = coordinates.map(coord => new Feature({
                          geometry: new Point([coord.longitude, coord.latitude]),
                          name: coord.name,
                        }));
                        this.vectorSource.addFeatures(pointFeatures);
                        console.log(this.vectorSource);

                        // Center the map on the first coordinate
                        if (coordinates.length > 0) {
                          const [firstCoordinate] = coordinates;
                          this.map.getView().setCenter([firstCoordinate.longitude, firstCoordinate.latitude]);
                          this.map.getView().setZoom(10);
                          this.legendOpened = true;
                        }
                      })
                      .catch(error => {
                        console.error('Error fetching geocoding data:', error);
                        // Handle any errors that occur during the request, such as displaying an error message to the user
                      });
                  },

                  handleKeyPress(event) {
                    if (event.key === 'Enter') {
                      this.searchButtonClicked();
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
        /*    init() {

                console.log('Alpine.js map component initialized');
                this.supportModal = this.$refs.supportModal;
               // const vectorSource = new VectorSource({
                      //  features: this.features,
                      //features: this.filteredFeatures(),
              //  });


                this.map = new Map({
                    target: this.$refs.map1,
                    layers: [
                         new TileLayer({
                            source: new OSM(),
                            label: 'OpenStreetMap',
                        }),
                      /*   new TileLayer({
                            source: new XYZ({
                              url: 'https://map1.vis.earthdata.nasa.gov/wmts-webmerc/VIIRS_CityLights_2012/default//GoogleMapsCompatible_Level8/{z}/{y}/{x}.jpg',
                              maxZoom: 8,
                              crossOrigin: 'anonymous',
                            }),
                            opacity: 0.7,
                          }), */
                   /*     new VectorLayer({
                           // source: vectorSource,
                           source: new VectorSource({
                            features: this.features,

                        }),
                            style: this.styleFunction,
                            label:'sec',
                        })
                    ],
                    view: new View({
                        /* projection: 'EPSG:3857', */
                  /*      projection: 'EPSG:4326',
                        center: [-6.4166, 32.3333],
                        zoom: 6,
                    })
                });
                  // Add click event listener to the map


                  const draw = new ol.interaction.Draw({
                    source: this.vectorSource,
                    type: 'Point',
                    style: (feature) => {
                        return new Style({
                            image: new Icon({
                                src: 'https://maps.google.com/mapfiles/ms/icons/red-dot.png', // Example Google Maps icon URL
                                scale: 1, // Adjust the scale of the icon
                                anchor: [0.5, 1], // Set the anchor point of the icon (optional)
                              }),
                        });
                      },
                  });
                  this.map.addInteraction(draw);

                  draw.on('drawend', (event) => {
                    const feature = event.feature;
                    const geometry = feature.getGeometry();
                    const coordinates = geometry.getCoordinates();
                    console.log('Point coordinates:', coordinates);
                  });
                  this.map.on('click', (event) => {
                    console.log("clicke");
                    const clickedCoordinate = this.map.getCoordinateFromPixel(event.pixel);
                    const [longitude, latitude] = clickedCoordinate;
                    this.clickedCoordinates = {
                      latitude,
                      longitude
                    };
                    //this.openModal = true;
                    this.opensupportModal = true;
                  });
                  const closeModal = () => {
                    this.openModal = false;
                    this.opensupportModal = false;
                  };

                  const closeButton = document.querySelector('.close');
                  closeButton.addEventListener('click', closeModal);

                  window.addEventListener('click', (event) => {
                    if (event.target === this.$refs.modal || event.target === this.$refs.supportModal ) {
                      closeModal();
                    }
                  });
                /*  this.map.on('click', (event) => {
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
                });*/
              /*  const searchButton = document.getElementById('searchButton');
                //searchButton.addEventListener('click', this.searchButtonClicked);
                searchButton.addEventListener('click', () => this.searchButtonClicked());


             /*  this.$watch('searchQuery', () => {
                    vectorSource.clear();
                    vectorSource.addFeatures(this.filteredFeatures());
                });

                const searchInput = document.getElementById('searchInput');
                searchInput.addEventListener('input', (event) => {
                    this.searchQuery = event.target.value;
                });*/



           // },
            initComponent() {

                const paramsObjsupport = {
                    servive: 'WFS',
                    version: '2.0.0',
                    request: 'GetFeature',
                    typeName: 'lav_ecl:support',
                    outputFormat: 'application/json',
                    crs: 'EPSG:4326',
                    srsName: 'EPSG:4326',
                }

                const paramsObjsecteur = {
                    servive: 'WFS',
                    version: '2.0.0',
                    request: 'GetFeature',
                    typeName: 'lav_ecl:secteur',
                    outputFormat: 'application/json',
                    crs: 'EPSG:4326',
                    srsName: 'EPSG:4326',
                }

                const urlParamssupport = new URLSearchParams(paramsObjsupport)


                const urlParamssecteur = new URLSearchParams(paramsObjsecteur)
                const supportsUrl = 'http://51.161.34.161:8080/geoserver/wfs?' +  urlParamssupport.toString()
                const secteurUrl = 'http://51.161.34.161:8080/geoserver/wfs?' +  urlParamssecteur.toString()
                //console.log(supportsUrl);
                console.log(secteurUrl);

                this.supportLayer = new VectorLayer({
                    source: new VectorSource({
                        format: new GeoJSON(),
                        url: supportsUrl,
                    }),
                    style: this.styleFunction,
                    label: "support",
                })
                this.secteurLayer = new VectorLayer({
                    source: new VectorSource({
                        format: new GeoJSON(),
                        url: secteurUrl,
                    }),
                    style: this.styleFunction,
                    label: "secteurs",
                })
               // this.features = new GeoJSON().readFeatures(monuments)
                console.log('Alpine.js map component initialized');
                this.supportModal = this.$refs.supportModal;

                this.map = new Map({
                    target: this.$refs.map1,
                    layers: [
                         new TileLayer({
                            source: new OSM(),
                            label: 'OpenStreetMap',
                        }),

                    /*    new VectorLayer({
                           // source: vectorSource,
                           source: new VectorSource({
                            features: this.features,

                        }),
                            style: this.styleFunction,
                            label:'sec',
                        })*/
                        this.secteurLayer,
                        this.supportLayer,

                    ],
                    view: new View({
                        /* projection: 'EPSG:3857', */
                        projection: 'EPSG:4326',
                        center: [-6.4166, 32.3333],
                        zoom: 6,
                    })
                });



                const button1 = document.getElementById('addsupport');
                const button2 = document.getElementById('addsector');


               /*   const draw = new ol.interaction.Draw({
                    source: this.vectorSource,
                    type: 'Point',
                    style: (feature) => {
                        return new Style({
                            image: new Icon({
                                src: 'https://maps.google.com/mapfiles/ms/icons/red-dot.png', // Example Google Maps icon URL
                                scale: 1, // Adjust the scale of the icon
                                anchor: [0.5, 1], // Set the anchor point of the icon (optional)
                              }),
                              text: new ol.style.Text({
                                text: 'ajouter support', // Specify the text to display
                                offsetY: -12, // Adjust the vertical position of the label (optional)
                                textAlign: 'center', // Set the alignment of the text within the label (optional)
                                fill: new ol.style.Fill({ color: 'black' }), // Specify the text color
                              }),
                        });

                      },
                  });*/


                  const draw = new ol.interaction.Draw({
                    source: this.vectorSource,
                    type: 'Point',
                  });



// Define the default draw interaction
const defaultDraw = new ol.interaction.Draw({
    source: this.vectorSource,
    type: 'Point',
  });

  // Define the draw interaction for button1
  const drawButtonsuppoort1 = new ol.interaction.Draw({
    source: this.vectorSource,
                    type: 'Point',
                    style: (feature) => {
                        return new Style({
                            image: new Icon({
                                src: 'https://maps.google.com/mapfiles/ms/icons/red-dot.png', // Example Google Maps icon URL
                                scale: 1, // Adjust the scale of the icon
                                anchor: [0.5, 1], // Set the anchor point of the icon (optional)
                              }),
                              text: new ol.style.Text({
                                text: 'ajouter support', // Specify the text to display
                                offsetY: -12, // Adjust the vertical position of the label (optional)
                                textAlign: 'center', // Set the alignment of the text within the label (optional)
                                fill: new ol.style.Fill({ color: 'black' }), // Specify the text color
                              }),
                        });

                      },
  });

  // Define the draw interaction for button2
  /* const drawButtonsecotr2 = new ol.interaction.Draw({
    source: this.vectorSource,
    type: 'Point',
    style: (feature) => {
        return new Style({
            image: new Icon({
                src: 'https://maps.google.com/mapfiles/ms/icons/red-dot.png', // Example Google Maps icon URL
                scale: 1, // Adjust the scale of the icon
                anchor: [0.5, 1], // Set the anchor point of the icon (optional)
              }),
              text: new ol.style.Text({
                text: 'ajouter sector', // Specify the text to display
                offsetY: -12, // Adjust the vertical position of the label (optional)
                textAlign: 'center', // Set the alignment of the text within the label (optional)
                fill: new ol.style.Fill({ color: 'black' }), // Specify the text color
              }),
        });

      },
  });*/

  // Create a new Draw interaction for drawing a polygon
// Create a new Draw interaction for drawing a polygon
const drawButtonsecotr2 = new ol.interaction.Draw({
    source: this.vectorSource,
    type: 'Polygon',
    style: function(feature) {
      // Style for the polygon
      var polygonStyle = new ol.style.Style({
        stroke: new ol.style.Stroke({
          color: 'red',
          width: 2,
        }),
        fill: new ol.style.Fill({
          color: 'rgba(0, 0, 255, 0.3)',
        }),


      });

      // Style for the text
      var textStyle = new ol.style.Text({
        text: 'Ajouter un secteur', // Replace with your desired text
        offsetY: -12, // Adjust the vertical position of the text
        textAlign: 'center',
        fill: new ol.style.Fill({
          color: 'black',
        }),
      });

      // Apply the text style to the polygon feature
      polygonStyle.setText(textStyle);

      return polygonStyle;
    },
  });

  // Set the default draw interaction as active
  defaultDraw.setActive(true);
  this.activeDraw = "default";
  this.map.addInteraction(defaultDraw);

  // Event listener for button1 click
  button1.addEventListener('click', () => {
    // Deactivate other draw interactions
    drawButtonsecotr2.setActive(false);
    this.legendOpened=false;

    // Activate draw interaction for button1
    drawButtonsuppoort1.setActive(true);
    this.map.addInteraction(drawButtonsuppoort1);
    this.activeDraw="support";
    console.log(this.activeDraw === "sector");
    console.log(this.activeDraw === "support");
    console.log(this.activeDraw === "default");
  });

  // Event listener for button2 click
  button2.addEventListener('click', () => {
    // Deactivate other draw interactions
    drawButtonsuppoort1.setActive(false);
    this.legendOpened=false;

    // Activate draw interaction for button2
    drawButtonsecotr2.setActive(true);
    this.map.addInteraction(drawButtonsecotr2);

    this.activeDraw="sector";
    console.log(this.activeDraw === "sector");
    console.log(this.activeDraw === "support");
    console.log(this.activeDraw === "default");

  });
  var self = this;

drawButtonsecotr2.on('drawend', function(event) {
  // Get the drawn feature
  var feature = event.feature;

  // Get the geometry of the feature
  var geometry = feature.getGeometry();

  // Get the coordinates of the polygon
  var coordinates = geometry.getCoordinates();
  self.clickedPolygonCoordinates=coordinates;
  // Do something with the coordinates, such as storing or displaying them
console.log('cordinate polygon',this.clickedPolygonCoordinates);

  // Disable the Draw interaction for drawing a polygon
//  console.log(this.opensupportModal);
  this.finpolygon = true;

 // this.map.removeInteraction(drawButtonsecotr2);
});













                  draw.on('drawend', (event) => {
                    const feature = event.feature;
                    const geometry = feature.getGeometry();
                    const coordinates = geometry.getCoordinates();
                    console.log('Point coordinates:', coordinates);
                  });
                  this.map.on('click', (event) => {
                    const clp= this.clickedPolygonCoordinates;
                    const clickedCoordinate = this.map.getCoordinateFromPixel(event.pixel);
                    if (this.previousClickCoordinate && ol.coordinate.equals(this.previousClickCoordinate, clickedCoordinate)) {
                        // Action for the second click in the same point
                        console.log("Second click in the same point",clp);
                        // Perform your desired action here
                        // Reset the previous click coordinate
                         // Action for the second click

                      if (this.activeDraw === 'sector') {
                        this.opensupportModal = true;
                      }

                        this.previousClickCoordinate = null;
                      } else {
                        // Action for the first click or a new point
                        console.log("First click or a new point");
                        console.log("clicke");

                        const [longitude, latitude] = clickedCoordinate;
                        this.clickedCoordinates = {
                          latitude,
                          longitude
                        }
                        if (this.activeDraw === 'support' || this.activeDraw === 'default') {
                            this.opensupportModal = true;
                          }

                        this.previousClickCoordinate = clickedCoordinate;

                      }




                      // Perform your desired action here
                      // Reset the click count for future clicks



                 //   this.opensupportModal = true;
                  });
                  const closeModal = () => {
                    this.openModal = false;
                    this.opensupportModal = false;
                  };

                  const closeButton = document.querySelector('.close');
                  closeButton.addEventListener('click', closeModal);

                  window.addEventListener('click', (event) => {
                    if (event.target === this.$refs.modal || event.target === this.$refs.supportModal ) {
                      closeModal();
                    }
                  });

                const searchButton = document.getElementById('searchButton');
                //searchButton.addEventListener('click', this.searchButtonClicked);
                searchButton.addEventListener('click', () => this.searchButtonClicked());

            },


            // The styleFunction defines how each feature will look on the map, it receives
            // each individual feature, we will use this later to conditionaly style them.
            // The styleFunction also defines labels for our features, based on their name
            // attributes in our example. The style will represent a circle with a 4px radius
            // with fill and stroke colors, for the label, we get a little fancy and make it
            // offset with a transparent background, this example is a first demonstration
            // on how to symbolize a layer of points.

            get supportFeatures() {
                return this.supportLayer.getSource().getFeatures()
            },
            get secteurFeatures() {
                return this.secteurLayer.getSource().getFeatures()
            },
            get clickedpolygonFeatures() {
                return this.clickedPolygonCoordinates;
            },
            styleFunction(feature) {
                const geometry = feature.getGeometry();
                const type = geometry.getType();

                let style;

                if (type === 'Point') {
                    // style for point features
                    style = new Style({
                       /* image: new Circle({
                            radius: 6,
                            fill: new Fill({
                                color: 'red',
                            }),
                            stroke: new Stroke({
                                color: 'rgba(192, 192, 192, 1)',
                                width: 2
                            }),
                        }),*/
                        image: new Icon({
                            src: 'https://maps.google.com/mapfiles/ms/icons/red-dot.png', // Example Google Maps icon URL
                            scale: 1, // Adjust the scale of the icon
                            anchor: [0.5, 1], // Set the anchor point of the icon (optional)
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
            },
            gotoFeature(feature) {
                console.log("clicked in this",feature.getGeometry().getCoordinates());
                this.map.getView().animate({

                    center: feature.getGeometry().getCoordinates(),
                    zoom: 20,
                    duration: 2000,
                });
            },
            gotoResult(result) {

                this.map.getView().animate({

                    center: [result.longitude,result.latitude],
                    zoom: 20,
                    duration: 2000,
                });
            },

            gotoFeaturegeometry(polygon) {
                var geometry = polygon.getGeometry();

                // Get the coordinates of the polygon
                var coordinates = geometry.getCoordinates()[0];
                console.log(coordinates);
                // Calculate the extent of the polygon
                var extent = ol.extent.boundingExtent(coordinates);

                // Calculate the center of the extent
                var center = ol.extent.getCenter(extent);
this.map.getView().animate({

    center:center,
    zoom: 20,
    duration: 2000,
});
            },
        };
    });
});
