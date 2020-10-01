<?php

  $majors = (object) array('CS' => 'Computer Science', 'WDD' => 'Web Design and Development', 'CIT' => 'Computer Information Technology', 'CE' => 'Computer Engineering');

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Week 3 Team Activity</title>
    <link rel="stylesheet" href="03Teach_styles.css">
  </head>
  <body>
    <h1>Week 3 Team Activity</h1>

    <form action="03Teach_results.php" method="POST">
      <label>Name:
        <input type="text" name="name">
      </label>

      <label>Email:
        <input type="text" name="email">
      </label>

      <p>Major:</p>
      <?php
        foreach ($majors as $abbreviation => $name) {
          echo "<label><input type='radio' name='major' value='$abbreviation'> $name</label>";
        }
      ?>

      <label>Comments:
        <textarea name="comments"></textarea>
      </label>

      <p>Continents visited:</p>
      <label>
        <input type="checkbox" name="continents[]" value="NA">
        North America
      </label>
      <label>
        <input type="checkbox" name="continents[]" value="SA">
        South America
      </label>
      <label>
        <input type="checkbox" name="continents[]" value="Eu">
        Europe
      </label>
      <label>
        <input type="checkbox" name="continents[]" value="As">
        Asia
      </label>
      <label>
        <input type="checkbox" name="continents[]" value="Au">
        Australia
      </label>
      <label>
        <input type="checkbox" name="continents[]" value="Af">
        Africa
      </label>
      <label>
        <input type="checkbox" name="continents[]" value="An">
        Antarctica
      </label>


      <button type="submit">Submit</button>
    </form>

  </body>
</html>
