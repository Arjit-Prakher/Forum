<?php
    $showError = "false";
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        include '_dbconnect.php';
        $user_email = $_POST['signupEmail'];
        $pass = $_POST['password'];
        $cpass = $_POST['cpassword'];

        // Check if this email already exists

        $existSql = "SELECT * FROM `users` WHERE `user_email` = '$user_email'";
        $result = mysqli_query($conn, $existSql);
        $numRows = mysqli_num_rows($result);

        if($numRows > 0) {
            $showError = "Email already in use";
        }
        else {
            if($pass == $cpass) {
                $hash = password_hash($pass, PASSWORD_DEFAULT);
                $sql = "INSERT INTO `users` (`user_email`, `user_pass`, `timestamp`) VALUES ('$user_email', '$hash', current_timestamp())";
                $result = mysqli_query($conn, $sql);
                
                $sql = "SELECT `sno`FROM `users` ORDER BY sno DESC LIMIT 1";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $sno = $row['sno'];
                if($result) {
                    // $showError = true;
                    $sql = "INSERT INTO `profile` (`sno`) VALUES ('$sno')";
                    $result = mysqli_query($conn, $sql);
                    header("Location: /forum/index.php?signupsuccess=true");
                    exit();
                }
            } else {
                $showError = "Passwords do not match, re-enter passwords";
            }
        }
        header("Location: /forum/index.php?signupsuccess=false&error=$showError");
    }


?>