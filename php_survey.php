<?php
session_start();
if (isset($_SESSION['voted']))
{
	header('Location: results.php');
}

?>

<html>
<head>
  <title>Jose Ricaurte PHP Survey</title>
</head>


<body>

  <form method="POST" action="results.php" name="survey">
    What is your favorite genre of music?<br/>
    <input type="radio" name="genre" value="poprock"/>Pop/Rock<br/>
    <input type="radio" name="genre" value="jazz"/>Jazz<br/>
    <input type="radio" name="genre" value="gospel"/>Gospel<br/>
    <input type="radio" name="genre" value="country"/>Country<br/><br/>
    What is your favorite instrument?<br/>
    <input type="radio" name="instrument" value="guitar"/>Guitar<br/>
    <input type="radio" name="instrument" value="violin"/>Violin<br/>
    <input type="radio" name="instrument" value="trumpet"/>Trumpet<br/>
    <input type="radio" name="instrument" value="piano"/>Piano<br/><br/>
    How many times a week do you exercise?<br/>
    <input type="radio" name="exercise" value="0"/>0<br/>
    <input type="radio" name="exercise" value="1"/>1<br/>
    <input type="radio" name="exercise" value="2"/>2<br/>
    <input type="radio" name="exercise" value="3"/>3+<br/><br/>
    Do you like going to the movies?<br/>
    <input type="radio" name="movies" value="0"/>Yes<br/>
    <input type="radio" name="movies" value="1"/>No<br/><br/>
    <input type="submit" name="submit" value="Submit">
  </form>

  <a href="results.php">View Results</a>

</body>
</html>
