$(document).ready(function () {
  let town = localStorage.getItem("town");
  let cardSelector = $("#carte");

  function showForecast() {
    if (town == null) {
      cardSelector.append("<p>You did not enter a town!</p>");
    } else {
      $("#carte *:not(div)").remove();

      let myAPPID = "b9474c57ce20e1720a6f00538e2f38b8";

      $.getJSON(
        "http://api.openweathermap.org/data/2.5/weather?q=" +
          town +
          "&appid=" +
          myAPPID,
        function (result) {
          let townName = result.name;
          let forecast = result.weather[0].main;
          let icon = result.weather[0].icon;
          let temp = result.main.temp;
          let tempInCelsius = (temp - 273.15).toFixed(1);

          cardSelector.append(
            "<ul><li> Town: " +
              townName +
              "</li><li>Forecast: " +
              forecast +
              "</li><li>Temperature: " +
              tempInCelsius +
              " &deg;C</li></ul>"
          );
          cardSelector.append(
            "<img src='http://openweathermap.org/img/wn/" +
              icon +
              "@2x.png' alt='forecast icon' width='80px' height='80px'>"
          );
        }
      );
    }
  }

  function submitForm() {
    let myTown = $("input").val();
    if (myTown.length >= 3) {
      localStorage.setItem("town", myTown);
      town = myTown;

      showForecast();
    } else {
      alert("Empty input field!");
    }
  }

  $("form").submit(function (event) {
    event.preventDefault();
    submitForm();
  });

  showForecast();
});
