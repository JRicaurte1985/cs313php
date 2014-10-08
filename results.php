<?php
session_start();

if (!isset($_SESSION['voted']))
{
	echo "THANK YOU FOR VOTING\n";
	$_SESSION['voted'] = 1;
}
else
	echo "ALREADY VOTED\n";

error_reporting(0);
if(($myFile = fopen("votingResults.txt", "r")) == FALSE)
{
	file_put_contents("votingResults.txt", 
		"0 0 0 0 0 0 0 0 0 0 0 0 0 0");
}

$string = file_get_contents("votingResults.txt");
$counts = array_map('intval', explode(' ', $string));

if (isset($_POST['submit']))
{
	$myFile = fopen("votingResults.txt", "w");
	
	if ($_POST['genre'] == 'poprock')
		$counts[0]++;
	if ($_POST['genre'] == 'jazz')
		$counts[1]++;
	if ($_POST['genre'] == 'gospel')
		$counts[2]++;
	if ($_POST['genre'] == 'country')
		$counts[3]++;
	if ($_POST['instrument'] == 'guitar')
		$counts[4]++;
	if ($_POST['instrument'] == 'violin')
		$counts[5]++;
	if ($_POST['instrument'] == 'trumpet')
		$counts[6]++;
	if ($_POST['instrument'] == 'piano')
		$counts[7]++;
	if ($_POST['exercise'] == '0')
		$counts[8]++;
	if ($_POST['exercise'] == '1')
		$counts[9]++;
	if ($_POST['exercise'] == '2')
		$counts[10]++;
	if ($_POST['exercise'] == '3')
		$counts[11]++;
	if ($_POST['movies'] == '0')	
		$counts[12]++;
	if ($_POST['movies'] == '1')
		$counts[13]++;
	
	for ($i = 0; $i < 14; $i++)
	{
		fwrite($myFile, $counts[$i]);
		fwrite($myFile, " ");
	}
	fclose($myFile);
}

echo "

<html>
<head>
  <title>Jose Ricaurte PHP Survey Results</title> 
</head>

<body>

  <h1 Survey Results></h1>

  <h3>What is your favorite genre of music?</h3>
  Pop/Rock: $counts[0] <br/>
  Jazz: $counts[1] <br/>
  Gospel: $counts[2] <br/>
  Country: $counts[3] <br/><br/>

  <h3>What is your favorite instrument?</h3>
  Guitar: $counts[4] <br/>
  Violin: $counts[5] <br/>
  Piano: $counts[6] <br/>
  Trumpet: $counts[7] <br/><br/>

  <h3>How many times a week do you exercise?</h3>
  Zero times a week: $counts[8] <br/>
  Once a week:   $counts[9] <br/>
  Twice a week:  $counts[10] <br/>
  Three or more times a week: $counts[11] <br/><br/>

  <h3>Do you like going to the movies?</h3>
  Yes: $counts[12] <br/>
  No: $counts[13] <br/><br/>


</body>
</html>"

?>
