<?php date_default_timezone_set("Asia/Kolkata"); ?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Nqbed | The Official Website</title>
    <style>
        main {
            min-height: 85vh;
        }
    </style>
</head>

<body>
    <?php require './modules/navbar.php' ?>

    <main>
        <div class="container">
            <div class="container text-center my-3">
                <h1>Select category for reading News</h1>
            </div>

            <form action="./" method="post" class="container fs-4">
                <div class="row justify-content-center">
                    <div class="col-lg-3 col-md-4 col-sm-12 mx-3">
                        <input class="form-check-input" type="radio" name="categoryNews" id="all" value="all" checked>
                        <label class="form-check-label" for="all">All</label>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-12 mx-3">
                        <input class="form-check-input" type="radio" name="categoryNews" id="national" value="national">
                        <label class="form-check-label" for="national">
                            National
                        </label>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-12 mx-3">
                        <input class="form-check-input" type="radio" name="categoryNews" id="business" value="business">
                        <label class="form-check-label" for="business">
                            Business
                        </label>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-12 mx-3">
                        <input class="form-check-input" type="radio" name="categoryNews" id="sports" value="sports">
                        <label class="form-check-label" for="sports">
                            Sports
                        </label>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-12 mx-3">
                        <input class="form-check-input" type="radio" name="categoryNews" id="world" value="world">
                        <label class="form-check-label" for="world">
                            World
                        </label>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-12 mx-3">
                        <input class="form-check-input" type="radio" name="categoryNews" id="politics" value="politics">
                        <label class="form-check-label" for="politics">
                            Politics
                        </label>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-12 mx-3">
                        <input class="form-check-input" type="radio" name="categoryNews" id="technology" value="technology">
                        <label class="form-check-label" for="technology">
                            Technology
                        </label>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-12 mx-3">
                        <input class="form-check-input" type="radio" name="categoryNews" id="startup" value="startup">
                        <label class="form-check-label" for="startup">
                            Startup
                        </label>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-12 mx-3">
                        <input class="form-check-input" type="radio" name="categoryNews" id="entertainment" value="entertainment">
                        <label class="form-check-label" for="entertainment">
                            Entertainment
                        </label>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-12 mx-3">
                        <input class="form-check-input" type="radio" name="categoryNews" id="hatke" value="hatke">
                        <label class="form-check-label" for="hatke">
                            Hatke
                        </label>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-12 mx-3">
                        <input class="form-check-input" type="radio" name="categoryNews" id="science" value="science">
                        <label class="form-check-label" for="science">
                            Science
                        </label>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-12 mx-3">
                        <input class="form-check-input" type="radio" name="categoryNews" id="automobile" value="automobile">
                        <label class="form-check-label" for="automobile">
                            Automobile
                        </label>
                    </div>
                </div>
                <div class="container text-center py-3">
                    <input type="submit" name="submit" class="btn btn-dark btn-lg" value="Read News" />
                </div>
            </form>
        </div>

        <?php
        $category = "all";
        if (isset($_POST['submit'])) {
            if (!empty($_POST['categoryNews'])) {
                $category = $_POST['categoryNews'];
            }
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