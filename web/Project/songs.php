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
      $artistid = $db->prepare('SELECT artist_id FROM artist WHERE display_name = :name');
      $artistid->bindValue(':name', $artist, PDO::PARAM_STR);
      $artistid->execute();
      $stmt = $db->prepare('SELECT title FROM song WHERE artist_id = :id');
      $stmt->bindValue(':id', $artistid, PDO::PARAM_STR);
      $stmt->execute();
      while ($row = $stmt->fetchAll(PDO::FETCH_ASSOC))
      {
        echo '<li>' . $row[title] . '</li>';
      }
  ?>
</ul>


  </body>

  <?php include('templates/footer.php') ?>

</html>
