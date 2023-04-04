<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <link rel="stylesheet" href="profile.css"> 
    <?php
        session_start();
        // too check if login or not
            if (!isset($_SESSION['userkp'])) { // check if user is logged in
              header("Location: index.php"); // redirect to login page
              exit(); // make sure to exit the script
          }
      
          // prevent caching of the page
          header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
          header("Pragma: no-cache"); // HTTP 1.0.
          header("Expires: 0"); // Proxies.
        include "conn.php";
        $user_kp = $_SESSION['userkp'];
        // execute the query and fetch the result
        $userdata = "SELECT * FROM user WHERE no_kp = '$user_kp'";
        $result = mysqli_query($conn, $userdata);
        $user = mysqli_fetch_assoc($result);
        $email = "SELECT * FROM log_masuk WHERE no_kp = '$user_kp'";
        $result = mysqli_query($conn, $email);
        $log_masuk = mysqli_fetch_assoc($result);
    
    ?>
  </head>
  <body>
  <div class="header finisher-header" style="width: 1536px; height: 100px;">
  <header>
      <h1>PROFILE</h1>
      <nav>
        <ul>
          <li><a href="editprofile.php">Edit Profile</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </nav>
    </header>
    <section class="container_p">
      <div class="profile">
        <h2><u>ASKAR WATANIAH</u></h2>
        <img src="profile.jpg" alt="User Avatar">
        <div class="details">
          <p>Name: <?php echo $user['nama'] ?> </p>
          <p>Email: <?php echo $log_masuk['EMAIL'] ?></p>
          <p>No.KP: <?php echo $user['no_kp'] ?></p>
          <p>No.Tentera:  <?php echo $user['no_tentera'] ?></p>
          <p>Pangkat:  <?php echo $user['pangkat'] ?></p>
          <p>Agama:  <?php echo $user['agama'] ?></p>
          <p>Bangsa:  <?php echo $user['bangsa'] ?></p>
        </div>
      </div>
      <div class="table">
          <div class="container">
            <h2><u>ANGGOTA</u></h2>
              <div>
                <ul class="responsive-table">
                <ul>
                <li class="table-header">
                  <div class="col col-1">No. Tentera</div>
                  <div class="col col-2">Name</div>
                </li>
                <?php
                  $sql = "SELECT * FROM user";
                  $result = mysqli_query($conn, $sql);
                  while($row = mysqli_fetch_assoc($result)){
                    // escape double quotes and output table row
                    echo "<li class=\"table-row\">
                            <div class=\"col col-1\" data-label=\"No. Tentera\">" . htmlspecialchars($row['no_tentera']) . "</div>
                            <div class=\"col col-2\" data-label=\\\"Name\">" . htmlspecialchars($row['nama']) . "</div>
                          </li>";
                  }    
                ?>
                </ul>
                </ul>
              </div>
            
          </div>
      </div>
    </section>
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


