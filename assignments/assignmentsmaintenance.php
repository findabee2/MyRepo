<!DOCTYPE html>
<html lang="en-GB">

<head>
    <title>Board game assignments maintenance</title>
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
		<a href="">Schedule |</a>
		<a href="">Scoring</a>
	</p>
    </nav>
</header>

<body>
    <main>
        <section class="form_page">
        <h2>Board Games Assignments Maintenance</h2>
        </section>
        <?php
            $mysqli = new mysqli("127.0.0.1", "root", "root", "membersdb", 3306);
            if ($mysqli->connect_errno) {
                echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            }
            $res = $mysqli->query("Select GameID, board_game_owners.MemberID, boardgame, name from board_game_owners 
            JOIN (Select Boardgame FROM board_games) AS BG 
            JOIN (Select concat(Fname,' ', Lname)  AS name, memberid FROM players) as player ON player.memberid = board_game_owners.memberid
            ");
            echo "<table width=\"100%\">";
            echo "<tr> <th>Game ID</th> <th>Member ID</th> <th>Board game</th> <th>Full Name</th></tr>";
            while ($row = mysqli_fetch_array($res)) {
                echo "<tr>";
                for ($column = 0; $column < count($row); $column++) {
                    echo "<td>" . $row[$column] . "</td>";
                }
                echo "</tr>";
            }
            echo "</table> <hr>";
            echo "<h4>Assign a board game to a member</h4>
            <form action='.\assignmentsadd.php' method='post' id='add'>
            <label for='member'>Member:</label> 
            <select name='member'>";
            $players = $mysqli->query("SELECT MemberID, Fname, Lname FROM players");
			
            while($rows = mysqli_fetch_array($players)) 
			{ 
                echo "<option value=\"" . $rows[0] . "\">" . $rows[1] .' ' . $rows[2] ."</option>"; 
            }
            echo "</select>
            <label for='game'>Game:</label>";
            echo "<select name='game'>";
            $games = $mysqli->query("SELECT GameID, boardgame FROM board_games");
            while($rows = mysqli_fetch_array($games)) { 
                echo "<option value=\"" . $rows[0] . "\">" . $rows[1] . "</option>"; 
            }
            echo "</select>"; 
            
            echo "<input type='submit' value='Add'/>";
            echo "</form>";
            echo "<h4>Remove board game assignment</h4>
            <form action='.\assignmentdelete.php' method='post' id='delete'>
             
            <label for='todelete'>Member:</label>
            <select name='member'>";
            $deletemember = $mysqli->query("SELECT MemberID FROM board_game_owners");
            while($rows = mysqli_fetch_array($deletemember)) { 
                echo "<option value=\"" . $rows[0] . "\">" . $rows[0] . "</option>"; 
            }
            echo "</select><label for='todeletegame'>Game:</label>"; 
            echo "<select name='game'>";
            $deletegame = $mysqli->query("SELECT GameID FROM board_game_owners");
            while($rows = mysqli_fetch_array($deletegame)) { 
                echo "<option value=\"" . $rows[0] . "\">" . $rows[0] . "</option>"; 
            }
            echo "</select>"; 
            echo "<input type='submit' value='Delete'/>";
            echo "</form>";
            
        ?>


    </main>
    <footer>
		<p>©BGA 2018</p>
    </footer>
</body>

</html>