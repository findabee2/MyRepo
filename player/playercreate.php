<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Registration Form</title>
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
			<h2 >Membership Form</h2>
        </section>
        <table>
            <form action='playeradd.php' method="post">
                <tr>
                    <td>First Name</td>
                    <td>
                        <input name="fName" type="text" tabindex="2" title= required pattern="[A-Z a-z]{1,}" placeholder="Please enter your first name">
                    </td>
                </tr>
                <tr>
                    <td>Last Name</td>
                    <td>
                        <input name="lName" type="text" tabindex="3" required pattern="[A-Z a-z]{1,}" placeholder="Please enter your last name">
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <input name="email" type="email" tabindex="4" required pattern="^[a-z 0-9]+@[a-z 0-9]+\.[a-z]{2,4}" placeholder="example@example.com">
                    </td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>
                        <input name="phone" type="phone" tabindex="5" required pattern="[0-9 -()]+" placeholder="(64) 123456789">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Submit">
						<input type="reset">
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