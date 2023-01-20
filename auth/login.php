<?php require "../config/config.php";?>
<?php require "../includes/header.php";?>



<?php

if(isset($_POST['submit'])){
  //server validation requiring all fields from the user before posting
  if(empty($_POST['studentId']) OR empty($_POST['password'])){
    echo "<script>alert('one or more fields are missing')</script>";
    } else {


        $studentId = $_POST['studentId'];
        $password = $_POST['password'];

        //query the database
        $login = $conn->query("SELECT * FROM voters WHERE studentId = '$studentId'");
        $login->execute();

        $fetch = $login->fetch(PDO::FETCH_ASSOC);


        //validate studentId
        if($login->rowCount() > 0){
           

            //validate password
            if(password_verify($password, $fetch['password'])){

                $_SESSION['username'] = $fetch['firstname'];

                echo "<script>window.location.href='http://localhost/online-voting/vote.php'</script>";
            }else{
                echo "<script>alert('one or more fields are wrong')</script>";

            }
        }else{
            echo "<script>alert('one or more fields are wrong')</script>";

            echo "<script>window.location.href='http://localhost/online-voting/login.php'</script>";
        }
    }
  }

  ?>