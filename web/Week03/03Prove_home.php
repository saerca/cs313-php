<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Week 3 Prove Shopping Cart</title>
    <link rel="stylesheet" href="03Prove_styles.css">
  </head>
  <body>
    <h1>Space Adventuring Gear</h1>

    <table>
      <thead>
        <tr>
          <th>Item</th>
          <th>Price</th>
          <th>Quantity</th>
        </tr>
      </thead>
      <tbody>
        <?php
          for ($row=0; $row < 4; $row++) {
            echo <tr>;
              echo <td> $items[$row][0] </td>;
              echo <td> $items[$row][1] </td>;
              echo <input type="number" min="0" max="5">;
            echo </tr>;
            echo <tr>;
          }
        ?>
      </tbody>
    </table>
    <label for="cartAdd">Add to Cart</label>
    <input type="submit" value="Add to Cart" name="cartAdd">

  </body>