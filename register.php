<?php include 'db_query.php'; 

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
  <link rel="stylesheet" href="styles.css">
  
</head>
<body>


<div class="container">
  <!-- errorai -->
<?php include('errors.php');
  echo $success;
?>

<form action="register.php" method="POST">
    <div class="row">
        <div class="col-6">
            <label for="email"></label>
            <input class="form-control" type="email" name="email" placeholder="Email" value="<?php echo $email ?>">
        </div>
        <div class="col-6">
            <label for="name"></label>
            <input class="form-control" type="text" name="name"  placeholder="Name" value="<?php echo $name ?>">
        </div>
        <div class="col-6">
            <label for="last_name"></label>
            <input class="form-control" type="text" name="last_name"  placeholder="Last name" value="<?php echo $last_name ?>">
        </div>
        <div class="col-6">
            <label for="phone"></label>
            <input class="form-control" type="number" name="phone" placeholder="Phone number" value="<?php echo $phone_number ?>">
        </div>
        <div class="col-6 ">
            <label for="password"></label>
            <input class="form-control" type="password" id="password" name="password" placeholder="Password" minlength="8" maxlength="12" onkeyup='check();'>
        </div>
        <div class="col-6">
            <label for="confirm_password"></label>
            <input class="form-control" type="password" id="confirm_password" name="confirm_password" placeholder="Confirm password" minlength="8" maxlength="12" onkeyup='check();'>
        </div>
    </div>
    <div class="text-center my-5">
      <button class="btn btn-outline-dark mx-2" type="submit" name="register" >Register</button>
      <a class="btn btn-outline-dark mx-2" href="login.php">Have account? Login here!</a>
    </div>
</form>


<div class="p-5 text-center">
    <h3>Password must follow these rules:</h3>
    <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
    <p id="number" class="invalid">A <b>number</b></p>
    <p id="length" class="invalid">Minimum <b>8 characters</b></p>
    <p id='passwords-match' class="invalid">Mached</span>
    
</div>


</div>

<!-- scriptas kuris tikrina fronta, kurioje vietoje neatitinka kriterijai formoje -->
<script>
var input = document.getElementById("password");
var inoput2 = document.getElementById("confirm_password");
var length = document.getElementById("length");
var mached = document.getElementById("passwords-match");
var number = document.getElementById("number");

input.onkeyup = function() {
  
var upperCaseLetters = /[A-Z]/;
if(input.value.match(upperCaseLetters)) {  
      capital.classList.remove("invalid");
      capital.classList.add("valid");
  } else {
      capital.classList.remove("valid");
      capital.classList.add("invalid");
  }

  var numbers = /[0-9]/g;
  if(input.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }

  if(input.value.length >= 8) {
      length.classList.remove("invalid");
      length.classList.add("valid");
  } else {
      length.classList.remove("valid");
      length.classList.add("invalid");
  }
}

var check = function() {
  if (input.value == inoput2.value) {
    mached.classList.remove("invalid");
    mached.classList.add("valid");
  } else {
    mached.classList.remove("valid");
    mached.classList.add("invalid");
  }
}


</script>


</body>
</html>