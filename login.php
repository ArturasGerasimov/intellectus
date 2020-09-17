<?php include('db_query.php');

if (isset($_SESSION['email'])) {
    header('location: index.php');
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <title>Intellectus</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>

<!-- paprasta login forma kuri siuncia duomenys i db_quory.php -->

<div class="container">
    <!-- rodo errurus -->
    <?php include('errors.php');?>
    <form action="login.php" method="POST" class="my-5">
        <div class="row">
            <div class="col-6">
                <label for="email"></label>
                <input class="form-control" type="email" name="email" placeholder="Email" value="<?php echo $email ?>">
            </div>
            <div class="col-6">
                <label for="password"></label>
                <input class="form-control" type="password" name="password" placeholder="Password">
            </div>
        </div>
        <div class="text-center my-5">
            <button class="btn btn-outline-dark mx-2" type="submit" name="login" >Login</button>
            <a class="btn btn-outline-dark mx-2" href="register.php">Don't have account? Register here</a>
        </div>
        
    </form>
</div>

</body>
</html>
