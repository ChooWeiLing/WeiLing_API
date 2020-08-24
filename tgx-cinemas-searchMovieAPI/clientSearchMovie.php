<!DOCTYPE html>
<!--
    @author: Venessa Choo Wei Ling
-->
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- JavaScript -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <title>Client Search Movie</title>
    </head>
    <body>
        <br />

        <div class='container'>
            <form id="searchForm" name="searchForm" action="" method="POST">
                <div class="form-group">
                    <div class="input-group mb-3">
                        <input id="movieName" name="movieName" class="form-control" type="text" placeholder="Search Release Date of Movie Name" required=""/>
                        <div class="input-group-append">
                            <button id="btnSearch" name="btnSearch" class="btn btn-primary" type="submit">Search</button>
                        </div>
                    </div>
                </div>
            </form>

            <br />

            <div class = "row">
                <?php
                if (filter_input(INPUT_POST, 'movieName')) {
                    $movieName = filter_input(INPUT_POST, 'movieName');

                    try {
                        $url = "http://localhost/tgx-cinemas/Venessa/WebService/MovieAPI.php?movieName=" . urlencode($movieName);

                        $client = curl_init($url);
                        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
                        $response = curl_exec($client);

                        $result = json_decode($response);

                        if ($result->data != null || $result->data != '') {

                            echo 'Release Date of ' . $movieName . ' is ' . $result->data;
                        } else {
                            echo 'No movie found for ' . $movieName;
                        }
                    } catch (Exception $ex) {
                        echo 'No movie found for ' . $movieName;
                    }
                }
                ?>
            </div>
        </div>
    </body>
</html>
