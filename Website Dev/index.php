<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Askar Wataniah</title>
</head>
<body>
  <div class="head">
  <div class="icon">
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/18/Crest_of_the_Territorial_Army_Regiment.svg/1200px-Crest_of_the_Territorial_Army_Regiment.svg.png" class="logo">
  </div>
    <div class="navbar">
            <div class="menu">
                <ul>
                    <li><a href="#">HOME</a></li>
                    <li><a href="http://aw.army.mil.my/index.php">ABOUT</a></li>
                    <li><a href="#">SERVICE</a></li>
                    <li><a href="reg.html">REGISTER</a></li>
                    <li><a href="#">CONTACT</a></li>
                </ul>
            </div>
    </div>
  </div>
  
        
        
    <div class="about">
    <h1>Pendaftaran Askar Wataniah</h1>
      <p>
      Askar Wataniah (AW) adalah badan Sukarela yang berlainan dari 
      adan-badan Sukarela yang lain. AW merupakan Angkatan Simpanan Tentera 
      Darat Malaysia dan bersama-sama dengannya untuk mempertahankan negara kita yang 
      tercinta ini. Penyertaan saudara-saudari di dalam Askar Wataniah merupakan satu sumbangan 
      murni di dalam menyahut seruan ibu pertiwi sesuai dengan konsep HANRUH (Pertahanan Menyeluruh) 
      yang ditetapkan di dalam dasar pertahanan negara. HANRUH antaranya menetapkan bantuan nasional 
      termasuk pengemblengan semua sumber negara di samping penglibatan angkatan tentera. Sebagai sebuah 
      negara yang berkembang untuk mencapai matlamat sebuah negara yang maju, setiap pihak dan rakyat perlu
       memainkan peranan di dalam pembangunan dan pertahanan negara dan hendaklah menjadikannya sebagai
        sebahagian dari aktiviti masyarakat.
      </p>

    </div>
    <div class="login-box">
        <p>Login</p>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <div class="user-box">
            <input required="" name="txtemail" id="txtemail" type="email">
            <label>Email</label>
          </div>
          <div class="user-box">
            <input required="" name="txtpassword" id="txtpassword" type="password">
            <label>Password</label>
            
          </div>
          <button type="submit" name="cmdLogin" class="btn">
          <a>
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              Submit
          </a>
          </button>
            
        </form>
        <p>Don't have an account? <a href="signup.php" class="a2">Sign up!</a></p>
    </div>
 
    <?php
    if(isset($_POST['cmdLogin'])){
        //session Start
        session_start();
      
        //Open Connection
        include "conn.php";
        $email = mysqli_real_escape_string($conn, $_POST['txtemail']);
        $password = mysqli_real_escape_string($conn, $_POST['txtpassword']);
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
      }
      
      // Prepare the SQL query to select the user with the email and password provided
      //$sql = "SELECT * FROM log_masuk WHERE EMAIL = '$email' AND PASS_WORD = '$password'";
      // Prepare the SQL query to select the user with the email and password provided
      $check_kp= "SELECT log_masuk.*, user.no_kp FROM log_masuk
        JOIN user ON log_masuk.no_kp = user.no_kp
        WHERE log_masuk.EMAIL = ? AND log_masuk.PASS_WORD = ?";
      $stmt = mysqli_prepare($conn, $check_kp);
      mysqli_stmt_bind_param($stmt, "ss", $email, $password);
       // Execute the prepared statement
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      if (mysqli_num_rows($result) > 0) {
        // If there is a user, redirect to the HOMEPAGE
        $get_kp = "SELECT no_kp FROM log_masuk WHERE EMAIL = '$email'";
        $result = mysqli_query($conn, $get_kp);
        $user_kp = mysqli_fetch_assoc($result);
        $no_kp = $user_kp['no_kp'];
        $_SESSION['userkp'] = $no_kp;
        header("Location: profile.php");
    } else {
        // If there is no user, show an error message
        $nonuser = "SELECT * FROM log_masuk WHERE EMAIL = ? OR PASS_WORD = ?";
        $stmt = mysqli_prepare($conn, $nonuser);
        mysqli_stmt_bind_param($stmt, "ss", $email, $password);
        mysqli_stmt_execute($stmt);
        $nonresult = mysqli_stmt_get_result($stmt);
        if(mysqli_num_rows($nonresult) > 0){
            echo "<script> alert('Incorrect Password Or Email, Try Again');</script>";
        }else{
            echo "<script> alert('Login Failed, Please Sign up First');</script>";
        }
    }
      
      
        //close connection
        mysqli_close($conn);
    }
    ?>  
</body>
</html>
