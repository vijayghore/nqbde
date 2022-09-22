<?php date_default_timezone_set("Asia/Kolkata");

function displayQuote($bgColor, $textColor, $json_data, $todaysquote, $i)
{
    echo '<div class="container p-2 font-quote">
    <figure class="p-3 shadow bg-' . $bgColor . '">
        <blockquote class="blockquote fs-3">
            <p class="text-' . $textColor . '">
                <i class="fas fa-quote-left fa-xs"></i>
                <span>' . $json_data[$todaysquote][$i]["quote"] . '</span>
                <i class="fas fa-quote-right fa-xs"></i>
            </p>
        </blockquote>
        <figcaption class="blockquote-footer text-' . $textColor . ' fs-5">
            <cite title="Source Title">' . $json_data[$todaysquote][$i]["author"] . '</cite>
        </figcaption>
    </figure>
    </div>';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/3545a826e2.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./css/style.css">

    <title>Nqbde - Quotes | Get Inspired and Motivate Yourself</title>
</head>

<body>
    <header>
        <?php require './modules/navbar.php' ?>
    </header>

    <main>
        <div class="container py-3">
            <h1 class="text-center font-title">Today's Quotes</h1>
            <?php
            //Read the json file where quotes are saved
            $url = "./data_quotes.json";

            //Fetching quotes from file
            $json = @file_get_contents($url);

            //Check whether File is Empty or not
            if ($json !== false) {
                $json_data = json_decode($json, true);

                $todaysquote = date("dm");

                for ($i = 0; $i < count($json_data[$todaysquote]); $i++) {
                    //Display Each Quote in different color
                    if ($i == 0) {
                        displayQuote("primary", "light", $json_data, $todaysquote, $i);
                    } elseif ($i == 1) {
                        displayQuote("danger", "light", $json_data, $todaysquote, $i);
                    } elseif ($i == 2) {
                        displayQuote("warning", "dark", $json_data, $todaysquote, $i);
                    } elseif ($i == 3) {
                        displayQuote("dark", "light", $json_data, $todaysquote, $i);
                    } elseif ($i == 4) {
                        displayQuote("success", "light", $json_data, $todaysquote, $i);
                    } elseif ($i == 5) {
                        displayQuote("info", "dark", $json_data, $todaysquote, $i);
                    } elseif ($i == 6) {
                        displayQuote("secondary", "light", $json_data, $todaysquote, $i);
                    }
                }
            }
            ?>
        </div>
    </main>

    <?php require './modules/footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        let navQuotes = document.getElementById('navQuotes');
        let quotesChild = navQuotes.childNodes[1];
        quotesChild.classList.add("active");
    </script>
</body>

</html>