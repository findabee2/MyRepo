<!DOCTYPE html>
<html lang="en">

<head>
    <title>Event Maintenance</title>
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
		<a href="">Schedule |</a>
		<a href="">Scores</a>
		<!-- link to other pages. updates for next version -->
	</p>
    </nav>
</header>

<body>
    <main>
        <section class="form_page">
            <h2 >Event Maintenance</h2>	<!-- brief description and title of this page-->
        </section>
		
        <?php
            $mysqli = new mysqli("127.0.0.1", "root", "root", "membersdb", 3306);	/* connect to the mysql database*/
            if ($mysqli->connect_errno) {
                echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            }
            $res = $mysqli->query("SELECT * FROM schedule");
            echo "<table width=\"100%\">";
            echo "<tr> <th>Event ID</th> <th>Venue</th> <th>Start</th> <th>End</th> <th>Description</th> <th>Capacity</th></tr>";
			
            while ($row = mysqli_fetch_array($res)) {		/* fetch the rows in the table for displaying*/
                echo "<tr>";
                for ($column = 0; $column < count($row); $column++) {
                    echo "<td>" . $row[$column] . "</td>";
                }
                echo "</tr>";
            }
            echo "</table> <hr>";
			
			/* user selects an event to delete. program passes the eventID */
            echo "<h4>Delete an Event</h4>		
            <form action='.\scheduledelete.php' method='post' id='delete'> 
            <select name='todelete'>";
			
            $players = $mysqli->query("SELECT EventID FROM schedule");
            
			while($rows = mysqli_fetch_array($players)) { 
                echo "<option value=\"" . $rows[0] . "\">" . $rows[0] . "</option>"; 
            }
            echo "</select>"; 
            echo "<input type='submit' value='Delete'/>";
            echo "</form>";
        ?>

        <h4>Update an Event</h4>						<!-- allows the user to update an event. program passes values using post method -->
        <form action="\scheduleupdate.php" method='post'>
            <label for="eventid">Event ID:</label>
				<input name="eventid" type="number" style="width: 4em" pattern="[0-9]{1,}">
            <br>
			<label for="venue">Venue:</label>
				<input name="venue" size="12" type="text" pattern="[A-Za-z0-9-: ]{1,100}">
            <br>
			<label for="start">Start:</label>
				<input name="start" size="12" type="text" pattern="[A-Za-z0-9 ]{1,50}">
            <br>
			<label for="end">End:</label>
				<input name="end" size="12" type="text" pattern="[A-Za-z0-9.-:() ]{1,254}">
            <br>
            <label for="desc">Description:</label>
				<input name="desc" size="12" type="text" style="width: 25.6em" pattern="[A-Za-z0-9.-:() ]{1,254}">
            <br>
			<label for="capacity">Capacity:</label>
				<input name="capacity" size="12" type="text" pattern="[A-Za-z0-9.-:() ]{1,254}">
            <br>
			<input type="submit" value="Update">
        </form>
    </main>
    <footer>
        <p>©BGA 2018</p>
    </footer>
</body>

</html>