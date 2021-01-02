
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>made by shubham </title>
</head>

<body>
    <?php
   require("partials/_dbconnect.php");
   require("partials/_header.php");

?>
    <?php
      $showalert = false;
     $ids = $_GET['catid']; 
      $sql=  "SELECT * FROM `categories` WHERE category_sno = $ids ";
      $result = mysqli_query($conn,$sql);
     
      while($row = mysqli_fetch_assoc($result)) {
      $catname = $row['category_name'];
      $catdescription = $row["category_description"];





      }
?>
    <?php
      if($_SERVER["REQUEST_METHOD"]=="POST"){
        $ids = $_GET['catid']; 
         $posttitle =$_POST['title'];
         $posttitle = str_replace("<","&lt;",$posttitle);
         $posttitle = str_replace(">","&gt;",$posttitle);
         $postdesc = $_POST['desc'];
         $postdesc = str_replace("<","&lt;",$postdesc);
         $postdesc = str_replace("<","&gt;",$postdesc);
        //  echo var_dump($_SESSION["useremail"]);
         $authorname = $_SESSION["useremail"];
        //  require("partials/_dbconnect.php");
         $sql = "INSERT INTO `threads` ( `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ( '$posttitle', '$postdesc', '$ids','$authorname' , current_timestamp())";
         $result = mysqli_query($conn,$sql);
         if ($result) {
            $showalert = true;
          } else {
            echo ": " . mysqli_error($conn);
          }
         
      }
     
?>
    <?php
    if($showalert){
      echo  '<div class="alert alert-warning sucess-dismissible fade show" role="alert">
  <strong>congo !</strong> You have succesfully submiteed your question on .
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';}
?>
    
    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to <?php echo $catname;   ?></h1>
            <p class="lead"><?php echo $catdescription;   ?></p>
            <hr class="my-4">
            <p>No Spam / Advertising / Self-promote in the forums. ...
                Do not post copyright-infringing material. ...
                Do not post “offensive” posts, links or images. ...
                Do not cross post questions. ...
                Do not PM users asking for help. ...
                Remain respectful of other members at all times.</p>

        </div>

    </div>
    <?php
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]==true ){
        $startadiscussion = true;
        }
        ?>
      <?php  
        if($startadiscussion){
       echo '<div class="conatiner">
        <h1 class="py-4 text-center">Start a Discussion</h1>
        <form class="p-5 container" action="'. $_SERVER["REQUEST_URI"]. '" method="POST">
            <div class="form-group">
                <label for="title">Problem Title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">Keep your title as short and crisp as
                    possible</small>
            </div>


            <div class="form-group">
                <label for="desc">Elaborate your problem</label>
                <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-success">publish</button>
        </form>

    </div>';

        }else{
            echo '<h1 class="py-4 text-center">Start a Discussion</h1><div class="container"><h1 class="text-center" > You have to login first to ask questions </h1> </div>';
            echo '<div class="container text-center"><button class="btn btn-outline-success mx-2 row-xl  " data-toggle="modal" data-target="#loginmodal">Log in</button></div>';
        }
    ?>

    <div class="container py-4">
        <h1 class="py-4 text-center">Browse Question</h1>

    </div>
    <?php
    $sql= "SELECT * FROM `threads` WHERE thread_cat_id = $ids ";
    $result = mysqli_query($conn,$sql);
     $num = mysqli_num_rows($result);
    
     if($num>0){
        while($row = mysqli_fetch_assoc($result)) {
    $threadtitle = $row['thread_title'];
    $threadid = $row['thread_id'];
    $threaddesc = $row["thread_desc"];
    $threaduserid = $row["thread_user_id"];
    $tarikh = $row["timestamp"];
    // echo date("h", strtotime($tarikh));
    
    echo '<div class="container pb-5 ">
        
        <div class="media ">
            <img src="photes/user.png" width="40px" height="40px" class="mr-3" style="border-radius: 50%" alt="...">
            
            <div class="media-body">
            <p class="font-weight-bold my-0"">'.$threaduserid.' at  '.$tarikh.'</p>
                <h4 class="mt-0"><a href="thread.php?thrid='.$threadid.'">'.$threadtitle.'</a></h4>
                <h6 class="mt-0">'.$threaddesc.'</h6>
            </div>
            
        </div>

       </div>';


        }
}else{
   
    echo '<div class="jumbotron jumbotron-fluid container">
    <div class="container">
      <h1 class="display-4">No questions</h1>
      <p class="lead">Be the first one to ask something about '.  $catname.'</p>
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