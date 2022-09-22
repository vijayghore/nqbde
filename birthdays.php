<?php date_default_timezone_set("Asia/Kolkata"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Birthdays Today - Nqbde | Wish Birthday to Star You Love</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <link rel="stylesheet" href="./css/style.css">
</head>

<body>
  <header>
    <?php require './modules/navbar.php' ?>
  </header>

  <main class="container-fluid">

    <div class="container text-center font-title my-3">
      <h1>Today's Birthdays</h1>
    </div>

    <div class="row justify-content-center align-items-center p-2">

      <?php
      require './db/dbconnect.php';
      date_default_timezone_set("Asia/Kolkata");
      $todaysdate = date("Y-m-d");

      $sql = "SELECT * FROM person WHERE DATE_FORMAT(dob, '%m %d') = DATE_FORMAT('$todaysdate', '%m %d')";
      $result = mysqli_query($conn, $sql);
      $num = mysqli_num_rows($result);

      if ($num > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
          $imglink = $row['imglink'];
          $name = $row['name'];
          $profession = $row['profession'];
          $dob = date_format(date_create($row['dob']), "d F Y");
          $dod = date_format(date_create($row['dod']), "d F Y");

          echo '<div class="card col-lg-3 col-md-6 text-white bg-dark m-1 px-0">
            <img src=" ' . $imglink . '" class="card-img-top" alt="...">
            <div class="card-body text-center">
            <h5 class="card-title">' . $name . '</h5>
            <h6 class="card-text">' . $profession . '</h6>
            <hr>';

          if ($row['dod'] == '0000-00-00') {
            echo '<p class="card-text text-center">' . $dob . '</p>';
          } else {
            echo '<p class="card-text text-center">' . $dob . ' — ' . $dod . '</p>';
          }

          echo '</div>
            </div>';
        }
      } else {
        echo '<div class="text-center py-3">
          <h3>No Birthdays Today</h3>
          <p class="text-muted">You can help us by suggesting birthdays to add into our database. Thank You!</p>
        </div>';
      }

      ?>
    </div>
  </main>

  <?php require './modules/footer.php' ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script>
    let navBirthdays = document.getElementById('navBirthdays');
    let birthdaysChild = navBirthdays.childNodes[1];
    birthdaysChild.classList.add("active");
  </script>
</body>

</html>