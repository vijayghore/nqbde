<?php date_default_timezone_set("Asia/Kolkata"); ?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <link rel="stylesheet" href="./css/style.css">

  <title>Deaths Today - Nqbde | Who left us with tears in eyes</title>
</head>

<body>
  <?php require './modules/navbar.php' ?>

  <main class="container-fluid">

    <div class="row justify-content-center align-items-center p-2">
      <div class="container text-center font-title my-3">
        <h1>Today's Deaths Aniversaries</h1>
      </div>
      <?php
      require './db/dbconnect.php';
      date_default_timezone_set("Asia/Kolkata");
      $todaysdate = date("Y-m-d");

      $sql = "SELECT * FROM person WHERE DATE_FORMAT(dod, '%m %d') = DATE_FORMAT('$todaysdate', '%m %d')";
      $result = mysqli_query($conn, $sql);
      $num = mysqli_num_rows($result);

      if ($num > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
          $imglink = $row['imglink'];
          $name = $row['name'];
          $profession = $row['profession'];
          $dob = date_format(date_create($row['dob']), "d F Y");
          $dod = date_format(date_create($row['dod']), "d F Y");

          echo '<div class="card col-lg-3 col-md-6 text-white bg-dark m-1 px-0 ">
            <img src=" ' . $imglink . '" class="card-img-top" alt="' . $name . '">
            <div class="card-body text-center">
              <h5 class="card-title">' . $name . '</h5>
              <h6 class="card-text">' . $profession . '</h6>
              <hr>';

          if ($row['dod'] == '0000-00-00') {
            echo '<p class="card-text">' . $dob . '</p>';
          } else {
            echo '<p class="card-text">' . $dob . ' — ' . $dod . '</p>';
          }
          echo '</div>
          </div>';
        }
      } else {
        echo '<div class="text-center py-3">
          <h3>Yay! No Death Aniversaries Today</h3>
          <p class="text-muted">You can help us by suggesting deaths to add into our database. Thank You!</p>
        </div>';
      }

      ?>
    </div>
  </main>

  <?php require './modules/footer.php' ?>
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <script>
    let navDeaths = document.getElementById('navDeaths');
    let deathsChild = navDeaths.childNodes[1];
    deathsChild.classList.add("active");
  </script>
</body>

</html>