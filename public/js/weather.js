class GetWeather {
    constructor(apiKey, city, country, weathField, weathIcon) {
        this.displayWeather = function() {
            this.apiKey = apiKey;
            this.city = city;
            this.country = country;
            this.tempeField = weathField;
            this.weathIcon = weathIcon;
            // Api Calling with fetch method and get the promise
            this.getPromise = fetch(
                `https://api.openweathermap.org/data/2.5/weather?q=${city},${country}&APPID=${apiKey}&units=metric&lang=Fr`
            ).then((response) => response.json());

            this.getPromise.then(function(data) {
                // console.log(data.weather[0].description);
                let description = data.weather[0].description;
                let icon = data.weather[0].icon;
                let temperature = Math.round(data.main.temp);
                //  document.getElementById(`${weathField}`).innerHTML = `${temperature}` + "°" + " -> " + `${description}`;
                document.getElementById(`${weathField}`).innerHTML = `${temperature}`;

                document.getElementById(`${weathIcon}`).innerHTML =
                    "<img class=" +
                    " image-fluid " +
                    "src=" +
                    "https://openweathermap.org/img/wn/" +
                    `${icon}` +
                    "@2x.png" +
                    " " +
                    `"alt=""` +
                    ">";
            });
            // Ready to use the data from the promise
        };
    }
}

// Display Cities Weather

const torontoWeather = new GetWeather(
    "360cccc6e22db8194872d3b393f23d91",
    "toronto",
    "canada",
    "torontoWeath",
    "torontoIcon"
);

const montrealWeather = new GetWeather(
    "360cccc6e22db8194872d3b393f23d91",
    "montreal",
    "canada",
    "montrealWeath",
    "montrealIcon"
);

const ottawaWeather = new GetWeather(
    "360cccc6e22db8194872d3b393f23d91",
    "ottawa",
    "canada",
    "ottawaWeath",
    "ottawaIcon"
);

const vancouverWeather = new GetWeather(
    "360cccc6e22db8194872d3b393f23d91",
    "vancouver",
    "canada",
    "vancouverWeath",
    "vancouverIcon"
);

const parisWeather = new GetWeather("360cccc6e22db8194872d3b393f23d91", "paris", "france", "parisWeath", "parisIcon");

torontoWeather.displayWeather();
montrealWeather.displayWeather();
vancouverWeather.displayWeather();
ottawaWeather.displayWeather();
parisWeather.displayWeather();

const openWeatherPromise = torontoWeather.getPromise;

// console.log(openWeatherPromise);

// Get Data from a JSON file in the project folder
class getDataFromJson {
    constructor(jsonFile) {
        this.jsonFile = jsonFile;
        this.getData = function() {
            this.getPromise = fetch(`${this.jsonFile}`)
                .then((response) => response.json())
                .catch((err) => console.warn(err.message));
        };
    }
}

const publicArtDataCall = new getDataFromJson("public/data/public-art-toronto19.json");
publicArtDataCall.getData();
const publicArtPromise = publicArtDataCall.getPromise;
// console.log("Art public Toronto", publicArtPromise);

const myDataCall = new getDataFromJson("public/data/mydata.json");
myDataCall.getData();
const myDataPromise = myDataCall.getPromise;
// console.log("My Own Data", myDataPromise);
