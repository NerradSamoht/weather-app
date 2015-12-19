<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Weather APP</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <?php
    for($i=0; $i<=6; $i++) {
  		$date = new DateTime($i.' day');
  		$day = $date->format('l');
  		$week[] = $day;
  	}
  ?>
  <div class="container">
    <div class="row">

      <div class="col-md-4 col-md-offset-4 center">
        <h2 class="header">Weather Forecaster</h2>
        <p class="description">Enter your location to get the forecast for your area.</p>
        <form>
          <div class="form-group">
            <input id="location" class="form-control center" type="text" placeholder="Enter a town, city or postcode">
          </div>
          <p class="error">No results found!</p>
          <input id="submit" class="btn btn-success" type="submit" value="Get Forecast!">
        </form>
      </div>
      </div>

    <div class="row">
      <div class="col-md-6 col-md-offset-3 center">
        <div id="forecast_future">
          <!-- Tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#Day1" role="tab" data-toggle="tab">Today</a></li>
            <li><a href="#Day2" role="tab" data-toggle="tab"><?php echo $week[1]; ?></a></li>
            <li><a href="#Day3" role="tab" data-toggle="tab"><?php echo $week[2]; ?></a></li>
            <li><a href="#Day4" role="tab" data-toggle="tab"><?php echo $week[3]; ?></a></li>
            <li><a href="#Day5" role="tab" data-toggle="tab"><?php echo $week[4]; ?></a></li>
          </ul>

          <!-- Tab Content-->
          <div class="tab-content">
            <div class="active tab-pane fade in" id="Day1">
              <h2 class="hidden"><?php echo $week[0]; ?></h2>
            </div>
            <div class="tab-pane fade" id="Day2">
              <h2 class="hidden"><?php echo $week[1]; ?></h2>
            </div>
            <div class="tab-pane fade" id="Day3">
              <h2 class="hidden"><?php echo $week[2]; ?></h2>
            </div>
            <div class="tab-pane fade" id="Day4">
              <h2 class="hidden"><?php echo $week[3]; ?></h2>
            </div>
            <div class="tab-pane fade" id="Day5">
              <h2 class="hidden"><?php echo $week[4]; ?></h2>
            </div>
          </div>

        </div>

        <button class="new-search btn btn-success">New Search</button>

      </div>

    </div> <!-- End row -->
  </div> <!-- End container -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="js/scripts.js"></script>

</body>
</html>
