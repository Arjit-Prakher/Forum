<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Uv Talks!</title>
    <script src="https://kit.fontawesome.com/a7aaa625ce.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./partials/_contactStyle.css">
</head>

<style>
    .image-area {
        position: relative;
    }

    .image-area img {
        position: relative;
        height: 200px;
        border-radius: 50px;
    }

    #image_container {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
    }
</style>

<body>
    <?php include 'partials/_dbconnect.php'; ?>

    <?php include 'partials/_header.php'; ?>

    <!-- User Profile Photo Updater -->
    <?php
    $sno = $_SESSION['sno'];
    if (isset($_POST['upload'])) {
        $filename = $_FILES["uploadFile"]["name"];
        $tempname = $_FILES["uploadFile"]["tmp_name"];
        $folder = "./img/" . $filename;

        $sql = "UPDATE `profile` SET `image` = '$filename' WHERE `sno` = $sno";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            if (move_uploaded_file($tempname, $folder))
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Done! 👍</strong>.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>That was not Done 🤔</strong>.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';
        }
    }
    ?>

    <!-- User Status Updater -->
    <?php
    if (isset($_POST['status'])) {
        $newStatus = $_POST['status'];
        $sql = "UPDATE `profile` SET `status` = '$newStatus' WHERE `sno` = $sno";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Status updated! 👍</strong>.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>That was not Done 🤔</strong>.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';
        }
    }
    ?>

    <!-- User Login credential updater -->
    <?php
            $update_login = false;
            if (isset($_POST['newPass'])) {
                $username = $_POST['user'];
                $oldpass = $_POST['oldPass'];
                $newpass = $_POST['newPass'];

                $sql = "SELECT * FROM `users` WHERE `sno` = $sno";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);

                // check for similar passwords
                if (password_verify($oldpass, $row['user_pass'])) {
                    $newHash = password_hash($newpass, PASSWORD_DEFAULT);
                    // $sql = "UPDATE `users` SET `user_pass` = '$newHash' WHERE `sno` = $sno";
                    $sql = "UPDATE `users` SET `user_email` = '$username', `user_pass` = '$newHash' WHERE `sno` = $sno";
                    $result = mysqli_query($conn, $sql);
                    $update_login = true;
                }
            }
            if ($update_login) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>That was Done 😉</strong>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>';
                // include 'partials/_logout.php';
                // exit("Login again");
                // session_start();

                // header("location: /forum");
                session_unset();
                session_destroy();
                echo "<script>window.location.href = '/forum';</script>";

            }
            ?>
    <div class="container my-5">
        <div class="row">
            <div class="col-sm-6">
                <?php
                // session_start();

                $sql = "SELECT * FROM `profile` WHERE `sno` = $sno";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $profile_id = $row['profile_id'];
                    $status = $row['status'];
                    $image = $row['image'];
                }

                echo '<div class="jumbotron">
                                <h1 class="display-4">Hi! ' . $_SESSION['useremail'] . '</h1>
                                <p class="lead">Welcome to your Profile.</p>
                                <hr class="my-4">
                                <p><strong>Status:</strong> ' . $status . ' </p>
                            </div>';

                ?>
            </div>
            <div class="col-sm-6">
                <div class="row">
                    <!-- <p>Profile image</p> -->
                    <div class="container" id="image_container">
                        <div class="image-area">
                            <!-- DISPLAY IMAGE -->
                            <?php
                            $sql = "SELECT * FROM `profile` WHERE `sno` = $sno";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            $image = $row['image'];
                            // echo var_dump($row);
                            ?>
                            <img src="./img/<?php echo $image; ?>" alt="PIC">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- <p>Edit image</p> -->
                    <div class="container">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="uploadFile">Change Profile Photo</label>
                                <input type="file" class="form-control-file" id="uploadFile" name="uploadFile">
                            </div>
                            <button type="submit" class="btn btn-primary" name="upload">Uplaod</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <p>Edit Profile</p>
                <hr class="my-2">
                <div class="container">
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="user">New Username</label>
                            <input type="text" class="form-control" id="user" name="user" aria-describedby="emailHelp" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <label for="oldPass">Old Password</label>
                            <input type="password" class="form-control" id="oldPass" name="oldPass" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <label for="newPass">New Password</label>
                            <input type="password" class="form-control" id="newPass" name="newPass" placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <div class="col-sm-6">
                <p>Your page</p>
                <hr class="my-2">
                <div class="container">
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="status">Your Status:</label>
                            <input type="text" class="form-control" id="status" name="status" aria-describedby="emailHelp" placeholder="max: 150">
                        </div>
                        <button type="submit" class="btn btn-primary">Add Status</button>
                    </form>
                </div>
                <hr class="my-3">
                <div class="row">
                    <div class="container border border-primary rounded-lg">
                        <p>Your Quesstions</p>
                        <?php
                        $sql = "SELECT * FROM `threads` WHERE `thread_user_id` = $sno";
                        $result = mysqli_query($conn, $sql);
                        $count = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $questions = $row['thread_title'];
                            if ($questions == null) {
                                echo 'No Questions asked';
                                break;
                            }
                            $count++;
                            echo '<div class="media">
                                    <div class="media-body">
                                    <h5 class="mt-0">' . $count . ')' . $questions . '</h5>
                                    </div>
                                </div>';
                        }

                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>






    <?php include 'partials/_footer.php'; ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>