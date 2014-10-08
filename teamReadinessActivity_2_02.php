<?php

// variables
$firstName = null;
$lastName = null;
$email = null;
$major = null;
$northAmerica = null;
$southAmerica = null;
$europe = null;
$asia = null;
$australia = null;
$africa = null;
$antarctica = null;
$comments = null;

// all vars in $_POST[""];
if (isset($_POST['submit']) )
{
    if (isset($_POST['firstName'])) { $firstName = $_POST['firstName']; }
    if (isset($_POST['lastName'])) { $lastName = $_POST['lastName']; }
    if (isset($_POST['email'])) { $email = $_POST['email']; }
    if (isset($_POST['major'])) { $major = $_POST['major']; }
    if (isset($_POST['northAmerica'])) { $northAmerica = $_POST['northAmerica']; }
    if (isset($_POST['southAmerica'])) { $southAmerica = $_POST['southAmerica']; }
    if (isset($_POST['europe'])) { $europe = $_POST['europe']; }
    if (isset($_POST['asia'])) { $asia = $_POST['asia']; }
    if (isset($_POST['australia'])) { $australia = $_POST['australia']; }
    if (isset($_POST['africa'])) { $africa = $_POST['africa']; }
    if (isset($_POST['antarctica'])) { $antarctica = $_POST['antarctica']; }
    if (isset($_POST['comments'])) { $comments = $_POST['comments']; }
}
?>


<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Team Readiness Activity 2.02</title>
        <link rel="stylesheet" type="text/css" href="teamReadinessActivity_2_02.css">
    </head>


    <body>

        <?php
if (!isset($_POST['submit']) ) {
    // form not submitted
        ?>
        <form method="POST">

            <h3>Contact Info</h3>
            <label>First Name</label><input type="text" id="firstName" name="firstName" required><br>
            <label>Last Name</label><input type="text" id="lastName" name="lastName" required><br>
            <label>E-mail</label><input type="email" id="email" name="email" required>

            <h3>Major</h3>
            <input type="radio" id="cs" name="major" value= "Computer Science">Computer Sceince<br/>
            <input type="radio" id="web" name="major" value="Web Devlopment and Design">Web Development and Design<br/>
            <input type="radio" id="cit" name="major" value="Computer Information Technology">Computer Information Technology<br/>
            <input type="radio" id="ce" name="major" value="Computer Engineering">Computer Engineering

            <h3>Places Visited</h3>
            <input type ="checkbox" id="northAmerica" name="northAmerica" value="North America">North America<br/>
            <input type ="checkbox" id="southAmerica" name="southAmerica" value="South America">South America<br/>
            <input type ="checkbox" id="europe" name="europe" value="Europe">Europe<br/>
            <input type ="checkbox" id="asia" name="asia" value="Asia">Asia<br/>
            <input type ="checkbox" id="australia" name="australia" value="Australia">Australia<br/>
            <input type ="checkbox" id="africa" name="africa" value="Africa">Africa<br/>
            <input type ="checkbox" id="antarctica" name="antarctica" value="Antarctica">Antarctica

            <h3>Comments</h3>
            <textarea name="comments" rows="7" cols="50"></textarea><br /><br/>    
            <input name="submit" type="submit" value="Submit" />

        </form> 
        <?php
} else {
    // form submitted show results

    echo '<h3>Contact Info</h3>';
    echo "First Name: $firstName <br>";
    echo "Last Name: $lastName <br>";
    echo "Email: <a href=\"mailto:$email\">$email</a>";

    if ($major != null) { echo "<h3>Major</h3>Major: $major"; }
    if ($northAmerica != null || $southAmerica != null || $europe != null || $asia != null || $australia != null || $africa != null || $antarctica != null)
    {
        echo '<h3>Places Visited</h3>';
        if ($northAmerica != null) { echo 'North America <br>'; }
        if ($southAmerica != null) { echo 'South America <br>'; }
        if ($europe != null) { echo 'Europe <br>'; }
        if ($asia != null) { echo 'Asia <br>'; }
        if ($australia != null) { echo 'Australia <br>'; }
        if ($africa != null) { echo 'Africa <br>'; }
        if ($antarctica != null) { echo 'Antarctica <br>'; }
    }
    if ($comments != null) { echo "<h3>Comments</h3> $comments <br>"; }

    echo '<br><br><a href="teamReadinessActivity_2_02.php">Reset Form</a>';
        ?>


        <?php
}
        ?>

    </body>
</html>

