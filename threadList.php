<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Uv Talks!</title>
</head>

<body>
    <?php include 'partials/_header.php'; ?>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `category` WHERE `category_id` = $id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $catname = $row['category_name'];
        $catdesc = $row['category_description'];
    }
    ?>

    <?php
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST') {
        // insert into thread DB
        $th_title = $_POST['title'];
        $th_desc = $_POST['desc'];
        $sql = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('$th_title', '$th_desc', '$id', '0', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        $showAlert = true;
        if($showAlert) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your question was posted. Please wait until the community responds.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
    }
    ?>

    <!-- Category container starts here -->

    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4"><?php echo $catname; ?> Talks</h1>
            <p class="lead"><?php echo $catdesc; ?> </p>
            <hr class="my-4">
            <p>This section is made to share knowledge. Please follow the rules responsively:</p>
            <ul class="list-group my-2">
                <li class="list-group-item">Please do not share your personal information.</li>
                <li class="list-group-item">Do not self-promote</li>
                <li class="list-group-item">Do not spam</li>
                <li class="list-group-item">Do not post offensive materials</li>
                <li class="list-group-item">Respect your fellow mates</li>
            </ul>
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        </div>
<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
       echo '<div class="container">
            <h1 class="py-2">Start a Discussion</h1>
            <form action=" '. $_SERVER["REQUEST_URI"] .' " method="post">
                <div class="form-group">
                    <label for="title">Problem Title</label>
                    <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text text-muted">Keep your title short and crisp</small>
                </div>
                <div class="form-group">
                    <label for="desc">Elaborate your concern</label>
                    <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>';
}
else {
    echo '
    <div class="container">
        <h1 class="py-2">Start a Discussion</h1>
        <p class="lead">Please Login to be able to start a discussion.</p>
    </div>
    ';
}
?>
        <div class="container">
            <h1 class="py-2">Browse questions</h1>
            <?php
            $id = $_GET['catid'];
            $sql = "SELECT * FROM `threads` WHERE `thread_cat_id` = $id";
            $result = mysqli_query($conn, $sql);
            $noResult = true;
            while ($row = mysqli_fetch_assoc($result)) {

                $noResult = false;
                $id = $row['thread_id'];
                $title = $row['thread_title'];
                $desc = $row['thread_desc'];
                $thread_time = $row['timestamp'];


                echo '<div class="media my-3">
                    <img src="img/user.png" width="55" class="mr-3" alt="...">
                    <div class="media-body">
                    <p class="font-weight-bold my-0">Anonymous User at ' . $thread_time . '</p>
                        <h5 class="mt-0"><a href="thread.php?threadid=' . $id . '">' . $title . '</a></h5>
                        ' . $desc . '
                    </div>
                </div>';
            }
            // echo var_dump($noResult);
            if ($noResult) {
                echo '<div class="jumbotron jumbotron-fluid">
                <div class="container">
                  <h1 class="display-4">No questions yet !</h1>
                  <p class="lead">Be the first one to start !!</p>
                </div>
              </div>';
            }
            ?>



        </div>

        <div class="row">
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