<!doctype html>
<html lang="en">
  <head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
      <div class="container">
        <div class="w-25 mx-auto mt-4">
            <?php
                if(isset($_GET[success]) && isset($_GET["message"]))
                {
                    $success = $_GET["success"];
                    $message = $_GET["message"];
                    $class = ($success == 1)?"success":"danger";

                    echo "<div class='alert alert-$class' role='alert'>";
                    echo $message;
                    echo "</div>";
                }
            ?>
        </div>
        <div class="card w-25 mx-auto">
            <div class="card-header">
                <h1 class="card-title">Login</h1>
            </div>
            <div class="card-body">
                <form action="datafile.php" method="POST">
                    <div class="mt-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" id="username" required>
                    </div>
                    <div class="my-3">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <input type="submit" value="Login" class="btn btn-primary w-100" name="login">
                </form>
            </div>
        </div>
        <div class="w-25 mx-auto text-end mt-3">
            <a href="signup.php" class="text-decoration-none">Sign up here</a>
        </div>
      </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  </body>
</html>