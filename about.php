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
<style>
    img {
        position: fixed;
        width: 100%;
        object-fit: cover;
        backdrop-filter: blur(2px);
    }
    .container {
        margin: 1%;
    }
    #info {
        position: relative;
        width: 50%;
        background-color: #3f86b58c;
        opacity: 0.5;
        border-radius: 12px;
        text-align: center;
        font-weight: bolder;
        color: black;
    }
    span {
        color: darkblue;
    }
</style>

<body>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php include 'partials/_header.php'; ?>
    
    <img src="./img/Camero.jpg" alt="">
    <div class="container my-5">
        <div class="heading" style="position: relative; display: flex; flex-direction: row;">
            <h1 class="text-light">About <span>Us</span></h1>
        </div>
        <div class="paragraph mt-5" id="info">
            <p style="font-family: 'Times New Roman', Times, serif; font-size: 25px;">U.V Talks, another of Ultraviolet's creation. This website will help establish a community for our Company.</p>
            <p style="font-family: 'Times New Roman', Times, serif; font-size: 25px;">This community will house our most experienced developers as well as the developers from our <span style="font-weight: bolder;">R&D</span> team. Hence, the members of Ultraviolet family will get all the queries answered. Join our community and become a new member and help Ultraviolet grow. 😉</p>
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