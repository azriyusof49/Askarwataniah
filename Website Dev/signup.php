<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup.css">
    <title>SIGNUP</title>
    
</head>
<body>
            <div class="card">
            <div class="card-header">
                <div class="text-header">SIGN UP</div>
            </div>
            <div class="card-body">
                <form method="POST">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input autocomplete="off" required="" class="form-control" name="Nama" id="Nama" type="text">
                </div>
                <div class="form-group">
                    <label for="username">IC/Mykid:</label>
                    <input autocomplete="off" required="" class="form-control" name="KP" id="KP" type="text">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input required="" class="form-control" name="email" id="email" type="email">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input required="" class="form-control" name="password" id="password" type="password">
                </div>
                <div class="form-group">
                    <label for="confirm-password">Confirm Password:</label>
                    <input required="" class="form-control" name="confirm-password" id="confirm-password" type="password">
                </div>
                <input onclick="return validatePasswords()" type="submit" class="btn" value="submit">    </form>
            </div>
            </div>
            <?php
                // Handle form submission
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Retrieve form data
                $name = $_POST['Nama'];
                $kp = $_POST['KP'];
                $email = $_POST['email'];
                $pass = $_POST['password'];

                // Connect to database
                include "conn.php";

                $sql = "INSERT INTO log_masuk (NAMA, no_kp, EMAIL, PASS_WORD) VALUES ('$name', '$kp', '$email', '$pass')";


                if (mysqli_query($conn, $sql)) {
                    header('Location: reg.html');
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }

                mysqli_close($conn);
                }
            ?>
</body>
</html>
<script>
                function validatePasswords(){
                var password = document.getElementById("password");
                var confirm_password = document.getElementById("confirm-password");

                if (password.value != confirm_password.value) {
                    alert("Passwords do not match.");
                    return false;
                }
                return true;
                }
</script>