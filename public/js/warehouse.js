for (const artPlace of data) {
    console.log(artPlace);

    let address = "Address Here";

    $.get(location.protocol + "//nominatim.openstreetmap.org/search?format=json&q=" + address, function(data) {
        console.log(data);

        console.log(data[0].lat, data[0].lon);
        let test = L.marker([data[0].lat, data[0].lon]).addTo(mymap);
    });

    //  L.marker([artPlace.X_COORDI, artPlace.Y_COORDI]).addTo(firstStep);
    // console.log(ville.ville);
}

publicArtPromise.then(function(data) {
    for (const artPlace of data) {
        let address = artPlace.ADDRESS;

        $.get(location.protocol + "//nominatim.openstreetmap.org/search?format=json&q=" + address, function(data) {
            console.log(data[0].lat, data[0].lon);
            let go = L.marker([data[0].lat, data[0].lon]).addTo(placeToVisit);
        });
    }
});

function test() {
    console.log("yaayyyy", this.eventsArr);

    let cluster = L.markerClusterGroup();

    for (const event of eventsArr) {
        let eventAuthor = event["userUid"];
        let eventId = event["id"];
        let eventDate = event["eventDate"];
        let eventName = event["eventName"];
        let eventPlace = event["eventPlace"];
        let eventLat = event["eventLat"];
        let eventLon = event["eventLon"];
        let eventTime = event["eventTime"];
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
                "event_place>Addresse : " +
                eventPlace +
                "</p><p class=" +
                "event_time>Heure: " +
                eventTime +
                "</p><p class=" +
                "event_author" +
                ">Auteur: " +
                eventAuthor +
                "</p><p class=" +
                "event_creation_date" +
                ">Crée le:" +
                eventCreationDate +
                "</p>"
        ),
            eventMarkers.addEventListener("click", () => {
                console.log("Hello");
            });
    }
}
