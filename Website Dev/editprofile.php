<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="editprofile.css">
    <title>Edit</title>
    <?php
    session_start(); // start the session
    if (!isset($_SESSION['userkp'])) { // check if user is logged in
        header("Location: index.php"); // redirect to login page
        exit(); // make sure to exit the script
    }

    // prevent caching of the page
    header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
    header("Pragma: no-cache"); // HTTP 1.0.
    header("Expires: 0"); // Proxies.
    ?>

</head>                        
<body>  
    <div class="header finisher-header" style="width: 1536px; height: 100px;">
        <header>
        <h1>Edit</h1>
        <nav>
            <ul>
            <li><a href="profile.php">Home</a></li>
            <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
        </header>
        <div class="container">
		<div class="left-panel">
			<ul>
				<li><a href="#profile-details">Profile Details</a></li>
				<li><a href="#education-details">Education Details</a></li>
				<!-- Add more navigation items here -->
			</ul>
		</div>
		<div class="right-panel">
			<form action="edit-user.php" method="POST">
				<fieldset id="profile-details">
					<legend>Profile Details</legend>
					<label for="username">Username:</label>
					<input type="text" id="username" name="username"><br>
					<label for="email">Email:</label>
					<input type="email" id="email" name="email"><br>
					<!-- Add more input fields here for profile details -->
				</fieldset>
				<fieldset id="education-details">
					<legend>Education Details</legend>
					<label for="school-name">School Name:</label>
					<input type="text" id="school-name" name="school_name"><br>
					<label for="degree">Degree:</label>
					<input type="text" id="degree" name="degree"><br>
          <legend>Education Details</legend>
					<label for="school-name">School Name:</label>
					<input type="text" id="school-name" name="school_name"><br>
					<label for="degree">Degree:</label>
					<input type="text" id="degree" name="degree"><br>
					<!-- Add more input fields here for education details -->
				</fieldset>
				<!-- Add more fieldsets here for other sections -->
				<input type="submit" value="Save Changes">
			</form>
		</div>
	</div>
    </div>




    <script src="finisher-header.es5.min.js" type="text/javascript"></script>
  <script type="text/javascript">
    new FinisherHeader({
      "count": 12,
      "size": {
        "min": 1300,
        "max": 1500,
        "pulse": 0
      },
      "speed": {
        "x": {
          "min": 0.6,
          "max": 3
        },
        "y": {
          "min": 0.6,
          "max": 3
        }
      },
      "colors": {
        "background": "#000000",
        "particles": [
          "#ff681c",
          "#231efe"
        ]
      },
      "blending": "lighten",
      "opacity": {
        "center": 0.6,
        "edge": 0
      },
      "skew": -1,
      "shapes": [
        "c"
      ]
    });
  </script>
</body>
</html>