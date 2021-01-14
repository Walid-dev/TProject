class CreateMap {
    constructor(mapId, longitude, latitude, zoom, accessToken, eventId) {
        this.myDataPromise = myDataPromise;
        this.publicArtPromise = publicArtPromise;
        this.mapId = mapId;
        this.longitude = longitude;
        this.latitude = latitude;
        this.zoom = zoom;
        this.accessToken = accessToken;
        this.eventsArr = eventsArr;
        this.eventId = eventId;

        var mymap = L.map(`${this.mapId}`).setView([`${this.longitude}`, `${this.latitude}`], `${this.zoom}`);

        // Call to display MapBox Map

        this.displayMap = function() {
            L.tileLayer("https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}", {
                attribution:
                    'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                maxZoom: 18,
                id: "mapbox/streets-v11",
                tileSize: 512,
                zoomOffset: -1,
                accessToken
            }).addTo(mymap);
        };

        this.addCluster3 = function() {
            console.log("yaayyyy", this.eventsArr);

            let cluster = L.markerClusterGroup();

            // Add Layers on Map using JS variable converted from Php Array

            for (const event of eventsArr) {
                let eventAuthor = event["userUid"];
                let eventId = event["id"];
                let eventDate = event["eventDate"];
                let eventName = event["eventName"];
                let eventPlace = event["eventPlace"];
                let eventLat = event["eventLat"];
                let eventLon = event["eventLon"];
                let eventTime = event["eventTime"];
                let eventDesc = event["eventDesc"];
                let eventCreationDate = event["creation_date"];

                //  console.log("Auteur", eventAuthor);
                //  console.log("Date,", eventDate);
                //  console.log("Nom", eventName);
                //  console.log("Latitude", eventLat);
                //  console.log("Longitude", eventLon);
                //  console.log("Heure", eventTime);
                //  console.log("Date Creation", eventCreationDate);

                let eventMarkers = L.marker([eventLat, eventLon]).addTo(cluster);
                mymap.addLayer(cluster);

                eventMarkers.bindPopup(
                    "<p class=" +
                        "event_title>" +
                        eventName +
                        "</p><p class=" +
                        "event_popup_text><div class=" +
                        "event_popup_title>Addresse : </div>" +
                        eventPlace +
                        "</p><p class=" +
                        "event_popup_text><div class=" +
                        "event_popup_title>Heure : </div>" +
                        eventTime +
                        "</p><p class=" +
                        "event_popup_text><div class=" +
                        "event_popup_title>Auteur : </div>" +
                        eventAuthor +
                        "</p><p class=" +
                        "event_popup_text><div class=" +
                        "event_popup_title>Ajouté le : </div>" +
                        eventCreationDate +
                        "</p>" +
                        "</p><p class=" +
                        "event_popup_text><div class=" +
                        "event_popup_title>Description : </div>" +
                        eventDesc +
                        "</p>"
                ),
                    eventMarkers.addEventListener("click", () => {
                        document.getElementById("mainMapSection").innerHTML =
                            "<div class=" +
                            "pl-2" +
                            "><div class=" +
                            "event_title" +
                            ">Informations</div><div id=" +
                            "msgAjax><ul id=" +
                            "eventRecInfoList" +
                            "><li class=" +
                            "station_field >Evénement : " +
                            eventName +
                            "</li><li class=" +
                            "adress_field >Adresse : " +
                            eventPlace +
                            "</li><li class=" +
                            "place_field >Heure : " +
                            eventTime +
                            "</li><li class=" +
                            "available_field >Auteur: " +
                            eventAuthor +
                            "</li></ul><div><a id=" +
                            "displayEventSuscrView" +
                            " class=" +
                            "btn" +
                            ">S'inscrire</a></div></div>";

                        function suscribePageAjaxCall() {
                            $.ajax({
                                type: "POST",
                                url: "index.php",
                                data: {
                                    action: "save-suscribe-event-div"
                                },
                                success: function(data) {
                                    $("#mainMapSection").html(data);
                                    $("#eventSuscribeBox a").addClass("eventSuscribeBtn");

                                    function sussex() {
                                        let ajaxSuscribeMethod = "suscribe-event";
                                        let dataString =
                                            "ajaxSuscribeMethod=" + ajaxSuscribeMethod + "&eventId=" + eventId;
                                        let successImg =
                                            "<img class=" + "img_done" + " src=" + "public/images/done.gif" + " />";
                                        $.ajax({
                                            type: "post",
                                            url: "index.php",
                                            data: dataString,
                                            cache: false,
                                            error: function() {
                                                $("##eventSuscribeBox").html("Error");
                                            },
                                            success: function(html) {
                                                console.log(dataString);
                                                $("#eventSuscribeBox")
                                                    .html(successImg)
                                                    .fadeOut(4000);
                                                $("#messageToEventAuthor").css("display", "block");
                                            }
                                        });
                                    }

                                    $(".eventSuscribeBtn").click(function() {
                                        return sussex();
                                    });
                                }
                            });
                        }

                        displayEventSuscrView.addEventListener("click", () => {
                            suscribePageAjaxCall();
                        });
                    });
            }
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
    "12",
    "pk.eyJ1Ijoid2xhZDM0IiwiYSI6ImNqeHA5N25qYTBhZnozbmwzMmdmczBtcGoifQ.hYSWIqrFTCmtKzfE56Y4iw"
);

torontoMap.displayMap();

torontoMap.addClusters();
torontoMap.disableEnableZoomMap();

torontoMap.addCluster3();

let longAqua = 43.642621;
let latAqua = -79.386015;

// Video in Home Page stop if screen width lower than 870px

if (document.body.clientWidth >= 870) {
    $("video").attr("autoplay", true);
} else {
    $("video").attr("autoplay", false);
}
