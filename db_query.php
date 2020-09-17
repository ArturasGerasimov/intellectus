<?php
// prasidede sesija kurio laikinai saugojasi userio duomenys
session_start();

// duombazes nuomenys
$servername = "localhost";
$username = "root";
$password = "Upoksnis_159";
$dbname = "intellectus";

//prisijungia prie db
$conn = new mysqli($servername, $username, $password, $dbname);
//tikrina ar pasijunge prie db
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//cia dedami visi errorai i masyva
$errors = [];

//tikrina ar paspaustas migtukas registracijos puslapyje 'register'
if (isset($_POST['register'])){
  //visa info atejusi is registracijos formos
  $email = $_POST["email"];
  $name = $_POST["name"];
  $last_name = $_POST["last_name"];
  $phone_number = $_POST["phone"];
  $password = $_POST["password"];
  $password_confirm = $_POST["confirm_password"];
  $created_at = date("Y-m-d h:i");
  //tikrinama ar visi formos kriterijai atitinka
  if (empty($email)) {
    array_push($errors, "Email is required");
  }
  if (empty($name)) {
    array_push($errors, "Username is required");
  }
  if (empty($last_name)) {
    array_push($errors, "Last name is required");
  }
  if (empty($phone_number)) {
    array_push($errors, "Phone number is required");
  }
  
  if ($password != $_POST["confirm_password"]) {
    array_push($errors, "Passwords should match");
  }

  if ($password == ""){
    array_push($errors, "Password field cannot be empty");
  }
  if (preg_match('/[0-9]/', $password) == 0){
    array_push($errors, "Password must contain atleast one number");
  }

  if (preg_match('/[A-Z]/', $password) == 0){
    array_push($errors, "Password must contain atleast one uppercase letter");
  }

  //jei 0 erroru tai visa formos informacijas siunciama i duombaze
  if(count($errors) == 0){
    $hashed_pass = md5($password);
    $sql = "INSERT INTO user (email, name, last_name, phone, password, registered_at)
    VALUES ('$email', '$name', '$last_name', '$phone_number', '$hashed_pass', '$created_at')";
  
  //tikrina ar viskas gerai siunciasi i db
    if ($conn->query($sql) === TRUE) {
      $success = "<div class='alert alert-success mt-2' role='alert'>You have registered successfully</div>";
    } else {
      array_push($errors, "Email already exist");
    }
  }

};

//tikrina ar paspaustas migtukas login puslapyje 'login'
if(isset($_POST['login'])) {

//informacija is login formos
  $email = $_POST["email"];
  $password = $_POST["password"];

  //prisijungus updatina duombaze last_login_at lauka
  $last_login = date("Y-m-d h:i");
  $sql = "UPDATE user  SET last_login_at='$last_login' WHERE email='$email'";
  $conn->query($sql);

  //tikrinama ar visi formos kriterijai atitinka
  if (empty($email)) {
    array_push($errors, "Email is required");
  }

  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  //jei viskas ok prisijungia
  if (count($errors) == 0) {
    //uzslaptina passworda
    $password = md5($password);
    //tikrina useri
    $query = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $query);
    //jei randa useri siuncia i index.php
    if (mysqli_num_rows($result) == 1) {
      $_SESSION['email'] = $email;
      $_SESSION['success'] = "<div class='alert alert-success' role='alert'>You are now loged in!</div>";
      header('location: index.php');
    } else {
      array_push($errors, "You entered wrong email or password!");
    }
  }
}

//logoutina ir sunaikina sesija
if(isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user']);
    header('location: login.php');
}
