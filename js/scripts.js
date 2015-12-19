$(function() {
  var days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thurs', 'Fri', 'Sat'];
  var icon = "http://openweathermap.org/img/w/";
  var api_key = "566239d88d9403aacbbb9dc5b0e2fec2";
  var imageUrl = "assets/bg_rain.jpg";

  $('form').submit(function(e) {
    e.preventDefault();

    var location = $('#location').val();

    if (location != "") {

      // Get current weather
      $.getJSON("http://api.openweathermap.org/data/2.5/weather?q=" + location + "&units=metric&APPID=" + api_key, function(data) {

        if (data.cod == 404) {

          $('.error').show();

        } else {

          $('form').hide();

          var time = new Date(data.sys.sunrise * 1000);
          var sunrise = ("Sunrise: " +
            ("0" + time.getHours()).slice(-2) + ":" +
            ("0" + time.getMinutes()).slice(-2));

          var time = new Date(data.sys.sunset * 1000);
          var sunset = ("Sunset: " +
            ("0" + time.getHours()).slice(-2) + ":" +
            ("0" + time.getMinutes()).slice(-2));

          var temperature = Math.round(data.main.temp) + "&deg;C";
          var description = data.weather[0].description;

          var forecast_now = description + "<br /><span class='sunrise'>" + sunrise + "</span> " + "<span class='sunset'>" + sunset + "</span>";

          $('.header').html(data.name + " " + temperature);
          $('.description').html(forecast_now);

          // Get future forecast
          $.getJSON("http://api.openweathermap.org/data/2.5/forecast?q=" + location + "&units=metric&APPID=" + api_key, function(data) {

            $.each(data.list, function(i, item) {

              var datetime = new Date(item.dt * 1000);
              var day = days[datetime.getDay()];
              var time = (("0" + datetime.getHours()).slice(-2) + ":00");
              var temp = Math.round(item.main.temp) + "&deg;C";
              var icon_path = "<img src='" + icon + item.weather[0].icon + ".png'></img>";
              var description = item.weather[0].description;

              var $weather = "<div class='forecast'><ul><li class='icon'>" + icon_path + "</li><li class='time'>" + time + "</li><li class='temperature'>" + temp + "</li><li class='description'>" + description +
                "</li></ul></div>";

              switch (day) {
                case 'Sun':
                  $("h2:contains('Sunday')").before($weather);
                  break;
                case 'Mon':
                  $("h2:contains('Monday')").before($weather);
                  break;
                case 'Tue':
                  $("h2:contains('Tuesday')").before($weather);
                  break;
                case 'Wed':
                  $("h2:contains('Wednesday')").before($weather);
                  break;
                case 'Thurs':
                  $("h2:contains('Thursday')").before($weather);
                  break;
                case 'Fri':
                  $("h2:contains('Friday')").before($weather);
                  break;
                case 'Sat':
                  $("h2:contains('Saturday')").before($weather);
                  break;
              }

              $('#forecast_future, .new-search').show();

            });
          });
        };
      });
    };
  });
});

$(".new-search").click(function() {
  location.reload();
});
