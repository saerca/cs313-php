<?php

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

  <h1>Look Up Songs From Artist</h1>
  <form action="home.php" method="GET">
    <label for="artist">Choose Artist/Band:</label>
    <select name="artist" id="cars">

      <?php
        $stmt = $db->query('SELECT display_name FROM artist');
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
          echo '<option>' . $row[display_name] . '</option>';
        }
      ?>
    </select>
    <br>
    <input type="submit" value="Find Songs">
  </form>


  </body>



  <?php include('templates/footer.php') ?>

</html>
