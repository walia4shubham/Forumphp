<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>comment pages </title>
</head>

<body>
<?php
   require "partials/_dbconnect.php";
   require "partials/_header.php";

?>
    <?php
     
     $ids = $_GET['thrid']; 
      $sql=  "SELECT * FROM `threads` WHERE thread_id = $ids ";
      $result = mysqli_query($conn,$sql);
     
      while($row = mysqli_fetch_assoc($result)) {
      $thrname = $row['thread_title'];
      $thrdes = $row["thread_desc"];
      $thrduserid = $row["thread_user_id"];





      }
?>

<?php
   if($_SERVER["REQUEST_METHOD"]=="POST"){
       require("partials/_dbconnect.php");
       $authornamecomment = $_SESSION["useremail"];
       $comment= $_POST["comment"];
       $comment = str_replace("<","&lt;",$comment);
       $comment = str_replace(">","&gt;",$comment);
       $sql = "INSERT INTO `comments` ( `comment_by`, `comment_content`, `threads_id`, `comment_time`) VALUES ( '$authornamecomment', '$comment', '$ids', current_timestamp())";
       $result = mysqli_query($conn, $sql);
       if($result){
        
            echo  '<div class="alert alert-warning sucess-dismissible fade show" role="alert">
        <strong>congo !</strong> You have succesfully submitted your comment  .
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
       }else{
           echo "failed". mysqli_error($conn);
       }
   }
?>
    
    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4"><?php echo $thrname;   ?></h1>
            <p class="lead"><?php echo $thrdes;   ?></p>
            <hr class="my-4">

            <a class="btn btn-primary btn-lg" href="#" role="button">Posted by <?php echo $thrduserid ;  ?> </a>
        </div>

    </div>


  <?php
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]==true ){
        echo ' <div class="conatiner">
        <h1 class="py-4 container"> Post a Comments</h1>
        <form class="p-5 container" action="'. $_SERVER["REQUEST_URI"].'" method="POST">
            <div class="form-group">
                <label for="comment">Type your comment</label>
                <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-success">Post comment</button>
        </form>

    </div>';
   
    }else{
        echo '<h1 class="py-4 container text-center "> Post a Comments</h1><h1 class="text-center" > You have to login first to ask questions </h1> </div>';
        echo '<div class="container text-center my-5"><button class="btn btn-outline-success mx-2 row-xl  " data-toggle="modal" data-target="#loginmodal">Log in</button></div>';
    }
  ?>

  <?php
    $sql = "SELECT * FROM `comments` WHERE  threads_id = $ids";
    $result = mysqli_query($conn,$sql);
     $num = mysqli_num_rows($result);
     if($num>0){
        while($row = mysqli_fetch_assoc($result)) {
    $commendcontent = $row['comment_content'];
    $commentId = $row['comment_id'];
    $commentby = $row['comment_by'];
    $commenttime = $row['comment_time'];
    $tarikh = date("r", strtotime($commenttime));
    echo '<div class="container pb-5 ">
        
        <div class="media ">
            <img src="photes/user.png" width="40px" height="40px" class="mr-3" style="border-radius: 50%" alt="...">
            
            <div class="media-body">
                <p class="font-weight-bold my-0"">'.$commentby.' at  '.$tarikh.'</p>
                <p>'.$commendcontent.' </p>
                
            </div>
            
        </div>

       </div>';
        }
    }else{
        echo '<div class="jumbotron jumbotron-fluid container">
        <div class="container">
          <h1 class="display-4">No Comments Yet</h1>
          <p class="lead">Be the first one to ask something </p>
        </div>';
     
    }
     
    echo '<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>';


?>


































    <?php
   require("partials/_footer.php");

?>


















    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
</body>

</html>