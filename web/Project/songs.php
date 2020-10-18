<?php

$artist = $_GET['artist'];

try
{
  $dbUrl = getenv('DATABASE_URL');

  $dbOpts = parse_url($dbUrl);

  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"],'/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

  <?php include('templates/header.php') ?>

  <h1>Songs by <?php echo $artist; ?></h1>
  <ul>
    <?php
      $stmt1 = $db->prepare('SELECT artist_id FROM artist WHERE display_name = :name');
      $stmt1->bindValue(':name', $artist, PDO::PARAM_STR);
      $stmt1->execute();
      $artistid = $stmt1->fetch(PDO::FETCH_ASSOC);
      $stmt2 = $db->prepare('SELECT title FROM song WHERE artist_id = :id');
      $stmt2->bindValue(':id', $artistid[artist_id], PDO::PARAM_INT);
      $stmt2->execute();
      while ($row = $stmt2->fetch(PDO::FETCH_ASSOC))
      {
        echo '<li>' . $row[title] . '</li>';
      }
  ?>
</ul>


  </body>

  <?php include('templates/footer.php') ?>

</html>
