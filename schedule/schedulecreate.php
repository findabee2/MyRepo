<!DOCTYPE html>
<html lang="en-GB">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Create an Event</title>
    <meta name="viewport" content="" />
    <meta name="description" content="width=device-width, initial-scale=1.0" />
    <link href="..\style.css" rel="stylesheet" type="text/css" />

</head>
<header>
    <h1>Board Games Aficionados</h1>
    <nav id="follow_me">
    <p>
		<a href="">Home |</a>
		<a href="">Players |</a>
		<a href="">Board Games |</a>
		<a href="">Events |</a>
		<a href="">Schedule |</a>
		<a href="">Scoring</a>
	</p>
    </nav>
</header>

<body>
    <main>
        <section class="form_page">
        <h2>Create an Event</h2>
        </section>
        <table>
            <form action='scheduleadd.php' method="post">
                <tr>
                    <td>Venue</td>
                    <td>
                        <input name="venue" type="text" tabindex="2" title= required placeholder = "layout: 99 Sample St., Suburb, City" pattern="[A-Za-z0-9-: ]{1,100}">
                    </td>
                </tr>
                <tr>
                    <td>Start date and time</td>
                    <td>
                        <input name="start" type="text" tabindex="3" required placeholder = "layout: '01-12-2000 at 4pm'" pattern="[A-Za-z0-9:- ]{1,50}">
                    </td>
                </tr>
                <tr>
                    <td>End date and time</td>
                    <td>
                        <input name="end" type="text" tabindex="4" required placeholder = "layout: '01-12-2000 at 8pm'" = pattern="[A-Za-z0-9:- ]{1,50}">
                    </td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>
                        <input name="eventdesc" type="text" tabindex="5" required placeholder = "Please describe the event." pattern="[A-Za-z0-9.-:(), ]{1,254}">
                    </td>
                </tr>
                <tr>
                    <td>Capacity</td>
                    <td>
                        <input name="capacity" type="number" tabindex="6" required placeholder = "Please enter seat capacity." pattern="[0-9]{1,}">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="reset" value="Reset">
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