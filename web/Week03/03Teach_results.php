<?php

  $name = $_POST["name"];
  $email = $_POST["email"];
  $major = $_POST["major"];
  $comments = $_POST["comments"];
  $continents = $_POST["continents"];

  $continent_names = array('NA' => 'North America', 'SA' => 'South America', 'Eu' => 'Europe', 'As' => 'Asia', 'Au' => 'Australia', 'Af' => 'Africa', 'An' => 'Antarctica');


?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Week 3 Team Activity</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>

    <p><b>Name:</b> <?= $name ?></p>
    <p><b>Email:</b> <a href="mailto:<?= $email ?>"><?= $email ?></a></p>
    <p><b>Major:</b> <?= $major ?></p>
    <p><b>Comments:</b> <?= $comments ?></p>

    <ul>
      <?php
        foreach ($continents as $continent) {
          $the_continent = $continent_names[$continent];
          echo "<li>$the_continent</li>";
        }
      ?>
    </ul>

  </body>
</html>