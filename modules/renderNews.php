<?php
function renderNews($category)
{
    $url = "https://inshorts.deta.dev/news?category=".$category;

    //Use file_get_contents to GET the URL in question.
    $json = @file_get_contents($url);

    // Read the JSON file
    // $json = file_get_contents('./data.json');

    //If $contents is not a boolean FALSE value.
    if ($json !== false) {

        // Decode the JSON file
        $json_data = json_decode($json, true);

        //(strlen($string) > 13) ? substr($string,0,10).'...' : $string;
        // (strlen($string) > 13) ? substr($string,0,10).'...' : $string;

        
        echo "<div class='container font-news'>
            <br>
            <h2 class='text-center py-3 fw-bold'>" . strtoupper($category) . " — News</h2>
        
             <div class='row'>";
        for ($i = 0; $i < count($json_data["data"]); $i++) {

            $newsTitle = $json_data['data'][$i]['title'];
            $title = (strlen($newsTitle) > 65) ? substr($newsTitle,0,65).'...' : $newsTitle;
            
            $newsContent = $json_data['data'][$i]['content'];
            $content = (strlen($newsContent) > 335) ? substr($newsContent,0,335).'...' : $newsContent;
            echo "<div class='col-sm-12 col-lg-4 col-md-6 p-2'>
                <div class='card border-dark'>
                    <img src=" . $json_data['data'][$i]['imageUrl'] . " class='card-img-top' style='aspect-ratio: 16/9; width: 100%;'>
                    <div class='card-body'>
                        <h5 class='card-title fw-bold'> " . $title . "</h5>
                        <p class='card-text' style='text-align: justify;' >" . $content . "</p>
                        <p class='text-muted small'> News by — " . $json_data['data'][$i]['author']  . " at ". $json_data['data'][$i]['time'] ." on ". $json_data['data'][$i]['date'] . "</p>
                        <a href=" . $json_data['data'][$i]['readMoreUrl']. "target='_blank' class='btn btn-dark'>Read More..</a>
                    </div>
                </div>
            </div>";
        }
        echo "</div>
        </div>";

    } else {
        throw new Exception("Please Connect to a WiFi or LAN network", 1);
    }
}
