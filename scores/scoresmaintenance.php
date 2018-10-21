<!DOCTYPE html>
<html lang="en-GB">

<head>
    <title>Scores Maintenance</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="..\style.css" rel="stylesheet" type="text/css" />
	
</head>
<header>
    <h1>Board Games Aficionados</h1>
	<nav id="follow_me">
        <p>
		<a href="">Home |</a>
		<a href="">Players |</a>
		<a href="">Board Games |</a>
		<a href="">Assignments |</a>
		<a href="">Events |</a>
		<a href="">Scores</a>
    </nav>
</header>

<body>
    <main>
        <section class="form_page">
            <h2>Scores Maintenance</h2>
        </section>
        
		<?php
            $mysqli = new mysqli("127.0.0.1", "root", "root", "membersdb", 3306);
            if ($mysqli->connect_errno) {
                echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            }
            $res = $mysqli->query("SELECT * FROM player_score");
            echo "<table width=\"100%\">";
            echo "<tr> <th>Game ID</th> <th>Title</th> <th>Position</th> </tr>";
            while ($row = mysqli_fetch_array($res)) {
                echo "<tr>";
                for ($column = 0; $column < count($row); $column++) {
                    echo "<td>" . $row[$column] . "</td>";
                }
                echo "</tr>";
            }
            echo "</table> <hr>";
            echo "<h4>Record a player's score</h4>
            <form action='.\scoreadd.php' method='post' id='add'>
            <label for='member'>Member:</label> 
            <select name='member'>";
            $players = $mysqli->query("SELECT MemberID, Fname, Lname FROM players");
            while($rows = mysqli_fetch_array($players)) { 
                echo "<option value=\"" . $rows[0] . "\">" . $rows[1] .' ' . $rows[2] ."</option>"; 
            }
            echo "</select>
            <label for='game'>Game:</label>";
            echo "<select name='game'>";
            $games = $mysqli->query("SELECT GameID, boardgame FROM board_games");
            while($rows = mysqli_fetch_array($games)) { 
                echo "<option value=\"" . $rows[0] . "\">" . $rows[1] . "</option>"; 
            }
            echo "</select>
            <label for='score'>Score:</label>
            <input name='score' type='number' style='width: 3em' pattern='[0-9]{1,}'>
            <input type='submit' value='Add'>
            </form>";
            echo "<h4>Delete a player's score</h4>
            
            <form action='.\scoredelete.php' method='post' id='delete'> 
            <select name='game'>";
            $deletegames = $mysqli->query("SELECT player_score.GameID, board_games.boardgame FROM player_score JOIN board_games on player_score.gameID = board_games.gameID");
            while($rows = mysqli_fetch_array($deletegames)) { 
                echo "<option value=\"" . $rows[0] . "\">" . $rows[1] . "</option>"; 
            }
            echo "</select>";
            echo "<select name='member'>";
            $deletemembers = $mysqli->query("SELECT player_score.memberid, concat(fname,' ', lname) AS name FROM player_score JOIN players ON players.memberID = player_score.memberID");
            while($rows = mysqli_fetch_array($deletemembers)) { 
                echo "<option value=\"" . $rows[0] . "\">" . $rows[1] . "</option>"; 
            }
            echo "</select>";  
            echo "<input type='submit' value='Delete'/>";
            echo "</form>";
        ?>

        <h4>Update a player's score</h4>
        <form action="\scoreupdate.php" method='post'>
            <label for="MemberID">Member ID:</label>
				<input name="MemberID" type="number" style="width: 4em" pattern="[0-9]{1,}">
            <label for="MemberScore">Score:</label>
				<input name="MemberScore" size="12" type="text" pattern="[A-Za-z0-9-: ]{1,100}">
            <label for="GameID">Board game:</label>
				<input name="GameID" size="12" type="text" pattern="[A-Za-z0-9 ]{1,50}">
            <input type="submit" value="Update">
        </form>
    </main>
    <footer>
		<p>©BGA 2018</p>
    </footer>
</body>

</html>
