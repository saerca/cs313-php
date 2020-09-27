<?php


?>

<!DOCTYPE html>
<html>

  <?php include('templates/header.php') ?>

  <?php include('templates/footer.php') ?>

  <h2 class="main">Welcome!</h2>

  <script>
  function play(){
       var audio = document.getElementById("audio");
       audio.play();
  }
  </script>
  <img src="ukuleles.jpg" alt="ukuleles" value="PLAY" onmouseover="play()">
  <audio id="audio" source src="ukulele.mp3" type="audio/mpeg"></audio>

  <div>My name is Sam. I'm a software engineering student. I love playing the ukulele.</div>

</html>
