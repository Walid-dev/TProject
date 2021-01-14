<div id="eventsAddressFinderWrapper">
    <form id="getLatLngForm" class="form" method="post">
        <div class="form-group">
            <input id="address" class="form-control" type="text" name="" placeholder="Veillez indiquez l'adresse de l'événement">
        </div>
        <a id="getLatLngBtn" class="btn btn-blue mt-2 ml-2" name="">Chercher</a>
        <div class="messageNoData"></div>
    </form>

    <div id="eventBookingBox">
        <div class="address_field mt-4 mb-2"></div>
        <a id="validateAddressBtn" class="btn mt-3"></a>
        <div id="refreshDiv">
        </div>
        <div id="messageToEventAuthor"></div>
    </div>
    <form id="eventForm" name="eventform" method="post">
        <input type="hidden" id="eventLat" name="eventLat" />
        <input type="hidden" id="eventLon" name="eventLon" />

        <div class="form-group">
            <input class="form-control" type="text" id="eventName" name="eventName" placeholder="Titre de l'évenèment" required />
        </div>

        <div class="form-group">
            <input class="form-control" type="hidden" id="eventPlace" name="eventPlace" required />
        </div>
        <div class="form-group">
            <input class="form-control" type="date" min="2020-01-01" max="2022-01-01" id="eventDate" name="eventDate" required />
        </div>

        <div class="form-group">
            <input class="form-control" type="text" id="eventTime" name="eventTime" placeholder="Heure au format HH:MM" required />
            <p id="checkTimeFormat"></p>
        </div>

        <div class="form-group">
            <textarea class="form-control" type="text" id="eventDesc" name="eventDesc" placeholder="Descrition" required></textarea>
        </div>

        <div class="form-group">
            <p id="warningFormText"></p>
        </div>

        <div class="form-group">
            <input id="confirmEventBtn" type="submit" value="Ajouter" onclick="validateHhMm(document.eventform.eventTime); return sendEventFormAjax(); " class="btn btn-blue ml-2">
        </div>
    </form>
    <p id="msgAjax"></p>
    <p id="msgAjax2"></p>
</div>