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

<body>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php include 'partials/_header.php'; ?>

    <img class="shape" src="./img/Geometrics2.jpg" alt="geometric shapes" style="position: absolute;width: 100%;height: 90vh;">
    <div class="container mt-5">
        <div class="leftside" style="position: relative;">
            <p class="h1 mb-0 text-light">Reach us</p>
            <div class="reach">
                <div class="icon"><i class="fa-brands fa-github" style="font-size: 3rem;"></i>
                    <div class="tag">Github</div>
                </div>
                <div class="icon"><i class="fa-brands fa-whatsapp" style="font-size: 3rem;"></i>
                    <div class="tag">Whatsapp</div>
                </div>
                <div class="icon"><i class="fa-brands fa-telegram" style="font-size: 3rem;"></i>
                    <div class="tag">Telegram</div>
                </div>
                <div class="icon"><i class="fa-regular fa-envelope" style="font-size: 3rem;"></i>
                    <div class="tag">Email</div>
                </div>
            </div>
        </div>

        <div class="rightside my-5" style="position: relative;">
            <form>
                <div class="form-group text-light">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control bg-dark text-light" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group text-light">
                    <label for="exampleFormControlTextarea1">Write your text here</label>
                    <textarea class="form-control bg-dark text-light" id="exampleFormControlTextarea1" rows="8"></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
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