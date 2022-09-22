<?php
function displayEvent($event)
{
  date_default_timezone_set("Asia/Kolkata");
  $todaysdate = date("d.m.Y");

  echo '<div class="card text-center shadow position-relative mb-5 py-3" style="min-height: 25vh;">
        <div class="card-body position-absolute top-50 start-50 translate-middle font-event">
          <h2 class="card-title fs-1 text-danger fw-bold">' . $event . '</h2>
          <hr>
          <p class="card-text fw-bold text-muted text-center">' . $todaysdate . '</p>
        </div>
      </div>';
}
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/style.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Macondo&display=swap" rel="stylesheet">
  <title>Events - Nqbde | The day special events of today</title>
</head>

<body>
  <?php require './modules/navbar.php' ?>
  <main class="container my-3">

    <div class="container text-center my-3 font-title">
      <h1>Day Special Today</h1>
    </div>
    <div class="container">
      <?php

      $url = "./data_events.json";

      //Fetching Events from file
      $json = @file_get_contents($url);

      //Check whether File is Empty or not
      if ($json !== false) {
        $json_data = json_decode($json, true);

        $todaysevent = date("dm");
        // $todaysevent = date("dm", strtotime("+1 day")); For Fetching Next Days Event
        try{
          if(@$json_data[$todaysevent]){
            for ($i = 0; $i < count($json_data[$todaysevent]); $i++) {
              $event = $json_data[$todaysevent][$i];
              displayEvent($event);
            }
          }else{
            throw new Exception("No DaySpecial Today", 1);
          }
        }
        catch(Exception $e){
          $errmsg = $e->getMessage();
          echo '<div class="container py-3">
              <h3 class="text-center">' . $errmsg . '</h3>
          </div>';
        }
      }else{
        echo "Sorry for the Interruption";
      }


      ?>
    </div>
  </main>


  <?php require './modules/footer.php' ?>
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


  <script>
    let navEvents = document.getElementById('navEvents');
    let eventsChild = navEvents.childNodes[1];
    eventsChild.classList.add("active");
  </script>
</body>

</html>