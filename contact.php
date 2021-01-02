<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>made by shubham </title>
    <style>
    .no{
      /* text-decorayion:none; */
      color:red;
    }
    </style>
  </head>
  <body>
 <?php
   require "partials/_dbconnect.php";
   require "partials/_header.php";
?>
  <!-- connecting to databse to check post request -->
<?php
   $showalert = false;
   $nameErr = $emailErr = $genderErr = $websiteErr = "";
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    if (empty($_POST["contactname"])) {
      $nameErr = "Name is required";
    }
     $contactname = $_POST["contactname"];
     $contactmail = $_POST["contactmail"];
     $contactmessage = $_POST["contactmessage"];
     $sql = "INSERT INTO `contactinfo` ( `contact_name`, `contact_email`, `contact_message`, `contact_datetime`) VALUES ( '$contactname', '$contactmail', '$contactmessage', current_timestamp())";
    $result = mysqli_query($conn,$sql);
    if(!$result){
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
   <strong>Error </strong>  sorry some error is occured try again  
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
 </div>';
    }else{
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>cong0!</strong>  you have successfully submitted your query 
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    }
     
  }






?>
<!-- <?php
  if($showalert){
   

  }




?> -->








<div class="container-fluid my-2 ">
   <h2 class="text-center">Contact me</h2>
   <div class="container-fluid d-flex justify-content-around mt-5 ">
     <div ><iframe class="rounded" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3443.0747193152724!2d76.41909531445131!3d30.348826311085407!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39102866013a03e9%3A0x7dfa32e209831855!2sWALIA%20COACHING%20CENTRE!5e0!3m2!1sen!2sin!4v1600447738425!5m2!1sen!2sin" width="800" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></div>
     <div class=" w-25 mt-0 "  >
       <form action="contact.php" method="post">
         <h3 class="text-muted text-center">Let's chat</h3>
         <h6 class="text-dark">Have something to say ?</h6>
         <!-- <div class="form-group">
    <label for="contactname">Name</label>
    <input type="text" class="form-control" id="contactname" name="contactname" aria-describedby="emailHelp">
    <span class="error"> <?php echo $nameErr;?></span>
    
  </div>
  <div class="form-group ">
    <label for="contactmail">Email</label>
    <input type="email" class="form-control" id="contactmail" name="contactmail">
  </div>
  <div class="form-group">
    <label for="contactmessage">Message</label>
    <textarea class="form-control" id="contactmessage" name="contactmessage" rows="3"></textarea>
  </div> -->
  <button type="submit" class="btn btn-primary btn-block my-5"><a href="mailto:walia5rakesh@gmail.com" class="text-decoration-none no text-light"> Mail me</a></button>



     </form>
    </div>



   </div>






</div>












 <?php
 echo '<script>
 if ( window.history.replaceState ) {
     window.history.replaceState( null, null, window.location.href );
 }
 </script>';
   require("partials/_footer.php");

?>


















    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>