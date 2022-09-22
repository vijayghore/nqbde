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
    <title>Nqbde | The Official Website</title>

</head>

<body>
    <?php require './modules/navbar.php' ?>

    <main>
        <div class="container">
            <div class="container text-center my-3 font-title">
                <h1>Select category of News</h1>
            </div>

            <form action="" method="post" class="container">

                <div class="row">

                    <div class="d-grid gap-2 col-4 mx-auto mr-1">
                        <input class="btn btn-outline-dark" type="submit" name="categoryNews" value="All" />
                        <input class="btn btn-outline-dark" type="submit" name="categoryNews" value="National" />
                        <input class="btn btn-outline-dark" type="submit" name="categoryNews" value="Business" />
                        <input class="btn btn-outline-dark" type="submit" name="categoryNews" value="Sports" />
                    </div>

                    <div class="d-grid gap-2 col-4 mx-auto mr-1">
                        <input class="btn btn-outline-dark" type="submit" name="categoryNews" value="World" />
                        <input class="btn btn-outline-dark" type="submit" name="categoryNews" value="Politics" />
                        <input class="btn btn-outline-dark" type="submit" name="categoryNews" value="Technology" />
                        <input class="btn btn-outline-dark" type="submit" name="categoryNews" value="Startup" />
                    </div>

                    <div class="d-grid gap-2 col-4 mx-auto mr-1">
                        <input class="btn btn-outline-dark" type="submit" name="categoryNews" value="Entertainment" />
                        <input class="btn btn-outline-dark" type="submit" name="categoryNews" value="Hatke" />
                        <input class="btn btn-outline-dark" type="submit" name="categoryNews" value="Science" />
                        <input class="btn btn-outline-dark" type="submit" name="categoryNews" value="Automobile" />
                    </div>
                </div>
            </form>
        </div>

        <?php


        if (isset($_POST['categoryNews'])) {
            $categoryNews = $_POST['categoryNews'];
            $category = strtolower($categoryNews);
        } else {
            $category = "all";
        }

        try {
            require './modules/renderNews.php';
            renderNews($category);
        } catch (Exception $e) {
            $errmsg = $e->getMessage();
            echo '<div class="container py-3">
                <h3 class="text-center">' . $errmsg . '</h3>
            </div>';
        }
        ?>
    </main>

    <?php require './modules/footer.php' ?>

    <!-- Option 1: Bootstrap Bundle with Popper -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        let navHome = document.getElementById('navHome');
        let homeChild = navHome.childNodes[1];
        homeChild.classList.add("active");
    </script>

</body>

</html>