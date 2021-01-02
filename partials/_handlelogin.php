<?php
if($_SERVER["REQUEST_METHOD"] =="POST"){
    require "_dbconnect.php";


  $existemailalready= false;
  $loginmail = $_POST['loginemail'];
  $loginpassword = $_POST['loginpassword'];


  $sql = "SELECT * FROM `users` WHERE `user_email`= '$loginmail'";
  $result = mysqli_query($conn,$sql);

  $num = mysqli_num_rows($result);
   if($num==1){
      $row= mysqli_fetch_assoc($result);
      if(password_verify($loginpassword,$row['user_pass'])){
          session_start();
          $_SESSION['loggedin']=true;
          $_SESSION['useremail']=$loginmail;
          echo "logged in". $loginmail;
          header("Location: /FORUMPROJECT/indx.php?login=true");
      }else{
          echo "password doesnot match ";
          header("Location: /FORUMPROJECT/indx.php?login=false");
      }
      
   }else{
       echo "first make an account";
   }



}
   


?>