class CreateMap {
    constructor(mapId, longitude, latitude, zoom, accessToken) {
        this.myDataPromise = myDataPromise;
        this.publicArtPromise = publicArtPromise;
        this.mapId = mapId;
        this.longitude = longitude;
        this.latitude = latitude;
        this.zoom = zoom;
        this.accessToken = accessToken;
        this.event = event;

        var mymap = L.map(`${this.mapId}`).setView([`${this.longitude}`, `${this.latitude}`], `${this.zoom}`);

        this.displayMap = function() {
            L.tileLayer("https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}", {
                attribution:
                    'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                maxZoom: 18,
                id: "mapbox.streets",
                accessToken
            }).addTo(mymap);
        };

        this.addClusters = function() {
            let placeToVisit = L.markerClusterGroup();
            let firstStep = L.markerClusterGroup();
            let funnyPlaces = L.markerClusterGroup();
            let events = L.markerClusterGroup();

            var greenIcon = L.icon({
                iconUrl: "public/images/email.png",

                iconSize: [38, 38], // size of the icon
                iconAnchor: [22, 94], // point of the icon which will correspond to marker's location
                shadowAnchor: [4, 62], // the same for the shadow
                popupAnchor: [-3, -76] // point from which the popup should open relative to the iconAnchor
            });

            publicArtPromise.then(
                function(data) {
                    console.log(data[0]);
                }.bind(this)
            );

            this.myDataPromise.then(
                function(data) {
                    for (const ville of data) {
                        console.log(ville);
                        console.log(ville.ville);
                    }
                }.bind(this)
            );

            console.log("yaayyyy", this.event);

            for (const user of event) {
                console.log(user[0]);
                console.log(user[1]);
                console.log(user["eventDate"]);
            }

            let cityCenter = L.marker([43.653226, -79.3831843], { icon: greenIcon }).addTo(firstStep);
            let test = L.marker([43.642621, -79.386015]).addTo(firstStep);

            let bar = L.marker([43.6733, -79.3831873]).addTo(funnyPlaces);

            let go = L.marker([43.6733, -79.3831873]).addTo(placeToVisit);

            let concert = L.marker([43.642621, -79.386015]).addTo(events);

            placeToVisit.bindPopup(
                "<p class=" +
                    "stations_status>" +
                    "Hello" +
                    "</p><p class=" +
                    "stations_name>Station : " +
                    "Bye" +
                    "</p><p class=" +
                    "stations_adress>Adresse: " +
                    "Good" +
                    "</p><p class=" +
                    "bike_stands" +
                    ">Places: " +
                    "Ok" +
                    "</p><p class=" +
                    "bike_stands" +
                    ">Disponibles:" +
                    "Gehage" +
                    "</p>"
            ),
                document.getElementById("buttons").addEventListener("mouseover", function(evt) {
                    var target = evt.target;
                    if (target.id === "placeToVisitBtn") {
                        mymap.removeLayer(firstStep);
                        mymap.removeLayer(funnyPlaces);
                        mymap.removeLayer(event);

                        mymap.addLayer(placeToVisit);
                    } else if (target.id === "firstStepsBtn") {
                        mymap.removeLayer(placeToVisit);
                        mymap.removeLayer(funnyPlaces);
                        mymap.removeLayer(events);

                        mymap.addLayer(firstStep);
                    } else if (target.id === "funnyBars") {
                        mymap.removeLayer(placeToVisit);
                        mymap.removeLayer(firstStep);
                        mymap.removeLayer(events);

                        mymap.addLayer(funnyPlaces);
                    } else if (target.id === "frenchRdv") {
                        mymap.removeLayer(placeToVisit);
                        mymap.removeLayer(firstStep);
                        mymap.removeLayer(funnyPlaces);

                        mymap.addLayer(events);
                    } else if (target.id === "displayAll") {
                        mymap.addLayer(placeToVisit);
                        mymap.addLayer(firstStep);
                        mymap.addLayer(funnyPlaces);
                        mymap.addLayer(events);
                    } else {
                    }
                });
        };

        this.disableEnableZoomMap = function() {
            // Disable Map Zoom
            mymap.scrollWheelZoom.disable();

            // Togglr if Map clicked activate ZOOM..
            mymap.on("click", function() {
                if (mymap.scrollWheelZoom.enabled()) {
                    mymap.scrollWheelZoom.disable();
                } else {
                    mymap.scrollWheelZoom.enable();
                }
            });
        };
    }
}

// Display TorontoMap

const torontoMap = new CreateMap(
    "mapid",
    "43.653226",
    "-79.3831843",
    "13",
    "pk.eyJ1Ijoid2xhZDM0IiwiYSI6ImNqeHA5N25qYTBhZnozbmwzMmdmczBtcGoifQ.hYSWIqrFTCmtKzfE56Y4iw"
);

torontoMap.displayMap();
torontoMap.addClusters();
torontoMap.disableEnableZoomMap();

let longAqua = 43.642621;
let latAqua = -79.386015;
