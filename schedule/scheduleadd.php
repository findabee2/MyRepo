<?php
$Venue = $_POST['venue'];
$Start = $_POST['start'];
$End = $_POST['End'];
$Desc = $_POST['eventdesc'];
$Capacity = $_POST['capacity'];

$mysqli = new mysqli("127.0.0.1", "root", "root", "membersdb", 3306);	/* connect to the database */

if ($mysqli->connect_errno)	/* display the error message if connection failed */
{
    echo "Failed to connect to the database: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    die();
}
/*	load the sql insert statement with data */
    $sql = "INSERT INTO Schedule (EventVenue, EventStart, EventEnd, EventDesc, EventCapacity)
    VALUES ('$Venue', '$Start', '$End', '$Desc', '$Capacity')";

if ($mysqli->query($sql) === true) 
{
    echo "\nNew event created successfully ";	/* successful addition */
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;	/* there was an error in the process */
}
echo "<br><a href='schedulecreate.html'>Back</a>";
?>