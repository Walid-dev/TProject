// Progress Scrolling Bar

$(window).scroll(function() {
    let scroll = $(window).scrollTop(),
        dh = $(document).height(),
        wh = $(window).height(),
        scrollPercent = (scroll / (dh - wh)) * 100;
    $("#progressBar").css("height", scrollPercent + "%");
});

// Background Fading On Scroll

//let headerBg = document.getElementById("bg");
//window.addEventListener("scroll", function() {
//  headerBg.style.opacity = 1 - +window.pageYOffset / 550 + "";
//headerBg.style.top = +window.pageYOffset + "px";
//headerBg.style.backgroundPositionY = -+window.pageYOffset / 4 + "px";
//});

// Alert message Show and Hide

$("#infoText")
    .delay(1000)
    .fadeOut(2000);

$("#save").click(function() {
    let image_name = $("#image").val();
    let imageHeight = $("#image").naturalHeight;
    if (image_name == "") {
        //   alert("Veuilez selectionner une image");
        //  return false;
    } else {
        let extension = $("#image")
            .val()
            .split(".")
            .pop()
            .toLowerCase();
        if (jQuery.inArray(extension, ["gif", "png", "jpg", "jpeg"]) == -1) {
            alert("Format image invalid");
            $("#image").val("");
            return false;
        }
    }
});

// Display the navBar on page loading

// Do things while scrolling

$(window).scroll(function() {
    let wScroll = $(this).scrollTop();
    //  console.log(wScroll);
    if (wScroll > 100) {
    } else {
    }
    // $("#navHeader").css("top", "-10vh");
});

// Banner Title on mouseMove

$(".recipient").mousemove(function(event) {
    let moveX = ($(window).width() / 10 - event.pageX) * 0.4;
    let moveY = ($(window).height() / 10 - event.pageY) * 0.2;

    $(".div_to_move").css("margin-left", moveX * 1.3 + "px");
    $(".div_to_move").css("margin-top", moveY * 1.1 + "px");
});

// Hide navBar scrolling down and shot it scrolling up

var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
    let dropdownSmallScreen = document.getElementById("dropdownSmallScreen");

    var currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
        document.getElementById("navHeader").style.top = "0";
        document.getElementById("navHeader").style.backgroundImage =
            "linear-gradient(to bottom, #0d0d0d 50%, #1c1b1b 100%)";
        if (dropdownSmallScreen) {
            dropdownSmallScreen.style.left = "20px";
        }
    } else {
        document.getElementById("navHeader").style.top = "-10vh";
        if (dropdownSmallScreen) {
            dropdownSmallScreen.style.left = "-320px";
        }
    }
    prevScrollpos = currentScrollPos;
};

// Message Help

$(".meteo_wrapper div").click(function(e) {
    e.preventDefault();
});

//$(".dropdown-item").mouseover(function() {
//   $(".dropdown-menu").css(
//       "box-shadow",
//       "rgb(0, 216, 255) 0px 0px 5px, rgb(0, 216, 255) 0px 0px 10px, rgb(0, 216, 255) 0px 0px 20px"
//    );
//});

//$(".dropdown-item").mouseout(function() {
//   $(".dropdown-item").css("box-shadow", "none");
//});

// Show navbar setTimout

$(".pagination_hide_article").click(function() {
    $(this).toggleClass("pagination_show");
    $(".pagination_slide_article").html() == "Lire Plus"
        ? $(".pagination_slide_article").html("Fermer")
        : $(".pagination_slide_article").html("Lire Plus");
});

$(".pagination_hide_add").click(function() {
    $(this).toggleClass("pagination_show");
    $(".pagination_slide_add").html() == "Lire Plus"
        ? $(".pagination_slide_add").html("Fermer")
        : $(".pagination_slide_add").html("Lire Plus");
});

function runIt() {
    $(".cyberTruck_alert_box")
        .animate({ right: "+=400" }, 800)
        .animate({ right: "+=00" }, 1000000)
        .animate({ right: "-=400" }, 800);
}

// Home Page Video Control

let vid = document.getElementById("headerVideo");

$("#pauseHeaderVideo").click(function() {
    vid.pause();

    $(this).hide();
    $("#playHeaderVideo").show();
});

$("#playHeaderVideo").click(function() {
    vid.play();

    $(this).hide();
    $("#pauseHeaderVideo").show();
});

//Auto refresh div php

$(".refresh").click(function() {
    $("#commentHeader").load("refresh.php");
});

$("#savePpBtn").css("display", "none");

$(".ppImg").click(function() {
    $("#savePpBtn").css("display", "block");
});

$("#savePpBtn").click(function() {
    let image_name = $("#image").val();
    if (image_name == "") {
        //  alert("Veuilez selectionner une image");
        //  return false;
    } else {
        let extension = $("#image")
            .val()
            .split(".")
            .pop()
            .toLowerCase();
        if (jQuery.inArray(extension, ["gif", "png", "jpg", "jpeg"]) == -1) {
            alert("Format image invalid");
            $("#image").val("");
            return false;
        }
    }
});

$("#save").click(function() {
    let image_name = $("#image").val();
    let imageHeight = $("#image").height;
    let imageWidth = $("#image").width;
    if (image_name == "") {
        alert("Veuilez selectionner une image");
        return false;
    } else {
        let extension = $("#image")
            .val()
            .split(".")
            .pop()
            .toLowerCase();
        if (jQuery.inArray(extension, ["jpg", "jpeg"]) == -1) {
            alert("Format image invalid. Veuillez ajouter une image au format jpg ou jpeg");
            $("#image").val("");
            return false;
        }
    }
});

// Add Events Functions

let address = $("#address").val();

$("#addEventBtn").click(function(e) {
    e.preventDefault();
    $("#mainMapSection").load("refresh.php");
});

// Event Functions

class getLatLngWithAddress {
    constructor(address) {
        this.address = address;
        //  this.addressLat = addressLat;
        $.get(location.protocol + "//nominatim.openstreetmap.org/search?format=json&q=" + this.address, function(data) {
            if (typeof data[0] !== "undefined") {
                let addressFound = data[0].display_name;
                let addressField = document.querySelector(".address_field");
                let validateAddressBtn = document.getElementById("validateAddressBtn");
                $("#validateAddressBtn").addClass("btn-blue");
                $("#validateAddressBtn").addClass("ml-2");

                // Set variables in Cookies to might use in Php

                let eventLatitude = data[0].lat;
                let eventLongitude = data[0].lon;
                let eventPlace = data[0].display_name;
                let eventDate = "";
                let eventTime = "";
                let eventName = "";

                //  document.cookie = "myJavascriptVar = " + myJavascriptVar;
                document.cookie = "eventLatitude = " + eventLatitude;
                document.cookie = "eventLongitude = " + eventLongitude;
                document.cookie = "eventPlace = " + eventPlace;
                document.cookie = "eventDate = " + eventDate;
                document.cookie = "eventTime = " + eventTime;
                document.cookie = "eventName = " + eventName;

                $("#eventLat").val(eventLatitude);
                $("#eventLon").val(eventLongitude);
                $("#eventPlace").val(eventPlace);
                $("#eventDate").val(eventDate);
                $("#eventName").val(eventName);

                validateAddressBtn.innerText = "";
                validateAddressBtn.innerText += "Confirmez vous l'addresse ?";

                $("#validateAddressBtn").click(function() {
                    $("#eventBookingBox").fadeOut(200);
                    $("#getLatLngForm").fadeOut(200);
                    $("#eventForm").fadeIn(400);
                });

                addressField.innerText = "";
                addressField.innerText += addressFound;
            } else {
                alert("L'adresse n'est pas reconnue");
            }
        });
    }
}

function addEventAjaxCall() {
    $.ajax({
        type: "POST",
        url: "index.php",
        data: {
            action: "display-event-div"
        },
        success: function(data) {
            $("#mainMapSection").html(data);

            $("#getLatLngBtn").click(function() {
                //  $("#getLatLngForm").fadeOut(200);
                //  getLatLngWithAddress("Toronto");
                const getAddressForEvents = new getLatLngWithAddress($("#address").val());
            });
        }
    });
}

$(".add_event").click(function() {
    addEventAjaxCall();
    // $("#page > main").css("box-shadow", "rgb(0, 217, 255) 0px 0px 4px, rgb(19, 212, 242) 0px 0px 8px");
});

function sendEventFormAjax() {
    let ajaxMethod = "send-event";
    let eventLat = document.getElementById("eventLat").value;
    let eventLon = document.getElementById("eventLon").value;
    let eventPlace = document.getElementById("eventPlace").value;
    let eventDate = document.getElementById("eventDate").value;
    let eventDesc = document.getElementById("eventDesc").value;
    let eventTime = document.getElementById("eventTime").value;
    let eventName = document.getElementById("eventName").value;

    let warningFormText = document.getElementById("warningFormText");

    if (
        eventPlace.length > 0 &&
        eventDate.length > 9 &&
        eventDesc.length > 9 &&
        eventTime.length > 4 &&
        eventName.length > 2
    ) {
        let dataString =
            "ajaxMethod=" +
            ajaxMethod +
            "&eventLat=" +
            eventLat +
            "&eventLon=" +
            eventLon +
            "&eventPlace=" +
            eventPlace +
            "&eventDate=" +
            eventDate +
            "&eventDesc=" +
            eventDesc +
            "&eventTime=" +
            eventTime +
            "&eventName=" +
            eventName;
        let successText = "Evénèment ajouté avec succès !";

        $.ajax({
            type: "post",
            url: "index.php",
            data: dataString,
            cache: false,
            error: function() {
                $("#msgAjax2").html("Error");
            },
            success: function(html) {
                $("#eventForm").css("display", "none");
                $("#msgAjax").html(html);
                $("#msgAjax2").html(successText);
                warningFormText.innerText = successText;
                warningFormText.style.color = "#5ef550";
                warningFormText.style.fontSize = "24px";
            }
        });
    } else {
        warningFormText.innerText = "Veuillez remplir tous les champs correctement svp";
    }

    return false;
}

// Convert date to Format hh:mm:ss

let date = new Date();
date.setSeconds(45); // specify value for SECONDS here
let timeString = date.toISOString().substr(11, 8);
//console.log(timeString);

// Check Password

function CheckPassword(inputtxt) {
    let passw = /^[A-Za-z]\w{7,14}$/;
    if (inputtxt.value.match(passw)) {
        alert("Correct, try another...");
        return true;
    } else {
        alert("Wrong...!");
        inputtxt.value = "";
        return false;
    }
}

function checkValue() {
    var value = "This is a string";
    var string_length = value.length;

    if (string_length > 20) {
        // console.log("Good Value");
    } else {
        //  console.log("Bad Value");
        return false;
    }
}

// Check Time Format hh:mm

function validateHhMm(inputField) {
    let isValid = /^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$/.test(inputField.value);
    let warningText = document.getElementById("checkTimeFormat");

    if (isValid || inputField.value.length > 0) {
        // console.log("good");
    } else {
        inputField.style.border = "1px solid red";
        warningText.innerText = "L'heure doit être au format HH:MM";
        // console.log("bad");
    }

    return isValid;
}

function signupPwdLengthCheck() {
    let inputSignValid1 = document.getElementById("inpPwd").value.length;
    let inputSignValid2 = document.getElementById("inpPwd2").value.length;

    if (inputSignValid1 < 8 || inputSignValid2 < 8) {
        $("#warningLenghtPwdTxt").html("Requiert au moins 8 caractères.");
        return false;
    } else {
        return true;
    }
}
