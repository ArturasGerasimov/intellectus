<?php include('db_query.php');
//tikrina ar yra useris, jei yra tada leidzia uzeiti i si puslapi
    if (empty($_SESSION['email'])) {
        header('location: login.php');
    }

    //pagal sesijos useri gaunu informacija is db
    $sql = "SELECT * FROM user WHERE email='".$_SESSION['email']."'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
           $emailrow = $row["email"];
           $namerow = $row["name"];
           $last_namerow = $row["last_name"];
           $phonerow = $row["phone"];
           $registered_atrow = $row["registered_at"];
          }
        } else {
            echo "0 results";
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
       <nav class="navbar navbar-expand-lg bg-dark justify-content-between">
            <div class="navbar-nav d-flex justify-content-between w-100">
                <h4 class="nav-item nav-link pt-3">Welcome to home page <span class="username"><?php echo $namerow  ?></span></h4>
                <!-- jei yra sesija tai rodo logout -->
                <?php if(isset($_SESSION['email'])): ?>
                    <a class=" nav-link pt-3" href="index.php?logout='1'">Logout</a>
                <?php endif ?>
                </a>
            </div>
        </nav>

        <!-- rodo zinute vienkartine zinute, kad pasijunge -->
        <?php if(isset($_SESSION['success'])): ?>
            <div>
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </div>
        <?php endif ?>
       
        <!-- viskas rodoma kas paimti is duombazes -->
        <ul class="list-group">
            <li class="list-group-item">Email<span class="float-right"> <?php echo $emailrow  ?></span></li>
            <li class="list-group-item">Name  <span class="float-right"><?php echo $namerow  ?></span></li>
            <li class="list-group-item">Lastname  <span class="float-right"><?php echo $last_namerow  ?></span></li>
            <li class="list-group-item">Phone number  <span class="float-right"><?php echo $phonerow  ?></span></li>
            <li class="list-group-item">Registered at <span class="float-right"><?php echo $registered_atrow  ?></span> </li>
        </ul>

    </div>

</body>
</html>
