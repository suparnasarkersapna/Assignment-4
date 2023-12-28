<?php
$city = $_GET['city'];
$url = "https://api.openweathermap.org/data/2.5/forecast?q=$city&appid=0faf346972ab061589375d2f01890994&units=metric";

$apiData = file_get_contents($url);
$cli = json_decode($apiData);

$temperature = $cli->list[0]->main->temp;
if ($temperature < 10) {
    $sin = "./img/pic.jpg";
} else if ($temperature > 20) {
    $sin = "./img/nature.jpg";
} else {
    $sin = "./img/nature2.jpg";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment-4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            background-color: #f0f0f0;
            background-image: url(<?php echo $sin ?>);
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 feature" style="background-color: rgba(255, 255, 255, 0.8);">
                <?php
                $j = 0;
                for ($i = 0; $i < 40; $i += 8) {
                    $j++;
                    echo "Day " . $j . ": " . $cli->list[$i]->dt_txt . "<br>";
                    echo "Temperature: " . $cli->list[$i]->main->temp . "&#8451;<br>";
                    echo "Maximum Temperature: " . $cli->list[$i]->main->temp_max . "&#8451;<br>";
                    echo "Minimum Temperature: " . $cli->list[$i]->main->temp_min . "&#8451;<br>";
                    echo "Wind Speed: " . $cli->list[$i]->wind->speed . "<br>";
                    echo "Wind Degree: " . $cli->list[$i]->wind->deg . "<br>";
                    echo "Pressure: " . $cli->list[$i]->main->pressure . "<br>";
                    echo "Humidity: " . $cli->list[$i]->main->humidity . "<hr>";
                }
                ?>
            </div>
            <div class="col-md-4"></div>
        </div>
        <div class="row">
            <div class="col-md-5"></div>
            <div class="col-md-6">
                <a class="btn btn-primary" href="index.php" role="button">Back</a>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
