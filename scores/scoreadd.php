<?php
$Member = $_POST['member'];
$Score = $_POST['score'];
$GameID = $_POST['game'];
$mysqli = new mysqli("127.0.0.1", "root", "root", "membersdb", 3306);

if ($mysqli->connect_errno) 
{
    echo "Failed to connect to the database: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    die();
}
    $sql = "INSERT INTO player_score (MemberID, MemberScore, GameID)
    VALUES ('$Member', '$Score', '$GameID')";

if ($mysqli->query($sql) === true) 
{
    echo "\nScore recorded successfully! ";
}
else
{
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}
echo "<br><a href='scoremaintenance.php'>Back</a>";
?>