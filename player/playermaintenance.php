<!DOCTYPE html>
<html lang="en">

<head>
    <title>Player Maintenance</title>
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
    </p>
	</nav>
</header>

<body>
    <main>
        <section class="form_page">
            <h2 >Player Maintenance</h2>
        </section>
		
        <?php
            $mysqli = new mysqli("127.0.0.1", "root", "root", "membersdb", 3306);
            if ($mysqli->connect_errno) {
                echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            }
            $res = $mysqli->query("SELECT * FROM players");
			
            echo "<table width=\"100%\">";
            echo "<tr> <th>Member ID</th> <th>First Name</th> <th>Last Name</th> <th>Email</th> <th>Phone No.</th> </tr>";
			
            while ($row = mysqli_fetch_array($res)) {
                echo "<tr>";
                for ($column = 0; $column < count($row); $column++) {
                    echo "<td>" . $row[$column] . "</td>";
                }
                echo "</tr>";
            }
            echo "</table> <hr>";
			
            echo "<h4>Delete a Player</h4>
            <form action='.\playerdelete.php' method='post' id='delete'> 
            <select name='todelete'>";
			
            $players = $mysqli->query("SELECT MemberID FROM players");
			
            while($rows = mysqli_fetch_array($players)) { 
                echo "<option value=\"" . $rows[0] . "\">" . $rows[0] . "</option>"; 
            }
            echo "</select>"; 
            echo "<input type='submit' value='Delete'/>";
            echo "</form>";
            
        ?>

        <h4>Update a player's details</h4>
        <form action=".\playerupdate.php" method='post'>
				<tr>
                    <td>First Name</td>
                    <td>
                        <input name="fName" type="text" required pattern="[A-Z a-z]{1,}">
                    </td>
                </tr>
                <tr>
                    <td>Last Name</td>
                    <td>
                        <input name="lName" type="text" required pattern="[A-Z a-z]{1,}">
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <input name="email" type="email" required pattern="^[a-z 0-9]+@[a-z 0-9]+\.[a-z]{2,4}">
                    </td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>
                        <input name="phone" type="phone" required pattern="[0-9 -()]+">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Submit">
		</form>
    </main>
    <footer>
        <p>©BGA 2018</p>
    </footer>
</body>

</html>
