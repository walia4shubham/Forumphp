<?php
if($_SERVER["REQUEST_METHOD"] =="POST"){
    require "_dbconnect.php";


  $existemailalready= false;
  $signupmail = $_POST['signupemail'];
  $signuppassword = $_POST['signuppassword'];
  $signupcpassword = $_POST['signupcpassword'];

  $sql = "SELECT * FROM `users` WHERE `user_email`= '$signupmail'";
  $result = mysqli_query($conn,$sql);

  $num = mysqli_num_rows($result);
   if($num>0){
      $existemailalready = true;
      echo "email already exist";
   }else{
       if($signuppassword==$signupcpassword){
           $hash = password_hash($signuppassword,PASSWORD_DEFAULT);
          $sqla = "INSERT INTO `users` ( `user_email`, `user_pass`, `timestamp`) VALUES ( '$signupmail', '$hash', current_timestamp())";
          $resulta = mysqli_query($conn,$sqla);
          if($resulta){
               echo "updated on database";
               header("Location: /FORUMPROJECT/indx.php?signupsuccess=true");
               exit();
            }  
        }else{
            echo "password and confirm password must be same";
            
       }
    }
    header("Location: /FORUMPROJECT/indx.php?signupsuccess=false&error='e'");




}
   


?>