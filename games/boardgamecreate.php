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
		<a href="">Scoring</a>
    </nav>
</header>

<body>
    <main>
        <section class="form_page">
            <h2>Board Games Maintenance</h2>
        </section>
        <table id="addition">
            <form action='boardgameadd.php' method="post">
                <tr>
                    <td>Board game name</td>
                    <td>
                        <input name="Name" type="text" tabindex="2" title= required placeholder="Enter the name of the game" pattern="[A-Za-z0-9-: ]{1,100}">
                    </td>
                </tr>
                <tr>
                    <td>Position</td>
                    <td>
                        <input name="Position" type="text" tabindex="3" pattern="[A-Za-z0-9 ]{0,50}">
                    </td>
                </tr>
                <tr>
                    <td>Notes</td>
                    <td>
                        <input name="Notes" type="text" tabindex="4" placeholder ="Board game notes" pattern="[A-Za-z0-9.-:() ]{0,254}">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Submit">
                    </td>
                </tr>
            </form>
        </table>
    </main>
    <footer>
		<p>©BGA 2018</p>
    </footer>
</body>

</html>