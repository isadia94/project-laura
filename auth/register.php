<?php require "../config/config.php";?>


<?php

if(isset($_POST['submit'])){
  //server validation requiring all fields from the user before posting
  if(empty($_POST['firstname']) OR empty($_POST['lastname']) OR empty($_POST['studentId']) OR empty($_POST['gender']) OR empty($_POST['password'])){
    echo "<script>alert('one or more fields are missing')</script>";
  }
else{
  if($_POST['password']==$_POST['confirm_password']){
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $studentId = $_POST['studentId'];
      $gender = $_POST['gender'];
      $password = $_POST['password'];

      $insert = $conn->prepare("INSERT INTO voters(firstname, lastname, studentId, gender, password)VALUES(:firstname, :lastname, :studentId, :gender, :password)");

      $insert->execute([
        ":firstname" => $firstname,
        ":lastname" => $lastname,
        ":studentId" => $studentId,
        ":gender" => $gender,


        //hashed password
        ":password" => password_hash($password, PASSWORD_DEFAULT)
      ]);

      //inform user that they have been registered successfully

      echo "<script>alert('You have been registered succesfully')</script>";

      echo "<script>window.location.href='http://localhost/online-voting/login.php'</script>";
  }
  else {
      echo "<script>alert('passwords do not match')</script>";
  }
}
}

?>