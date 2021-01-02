<?php
session_start();
$startadiscussion = false;
 $userlogin = false;
// echo var_dump($_SESSION);
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]==true ){
  $userlogin = true;
}

echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="indx.php">shubham forum</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="indx.php">Home <span class="sr-only">(current)</span></a>
      </li>
    
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Top Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
      // require("partials/_dbconnect.php");
      $sql=  "SELECT * FROM `categories`LIMIT 2";
      $result = mysqli_query($conn,$sql);
      while($row = mysqli_fetch_assoc($result)) {
        $id = $row['category_sno'];
      $catname = $row['category_name'];
      echo'<a class="dropdown-item" href="threadlist.php?catid='.$id.'">'.$catname.'</a>';
      }
      

      echo '</div>
      </li>
      
          <li class="nav-item active">
        <a class="nav-link" href="contact.php">Contact us</a>
      </li>
    </ul>
    <div class="row mx-2 ">
       <form class="form-inline my-2 my-lg-0" action="search.php" method="GET" >
      <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
      </form>';
       if($userlogin == false){
        echo '<button class="btn btn-outline-success mx-2 row-xl" data-toggle="modal" data-target="#loginmodal">Log in</button>
        <button class="btn btn-outline-success sm-4 row-xl"data-toggle="modal" data-target="#signupmodal">Sign up</button>';
  
       }
       if($userlogin){
        echo '<h4 class="text-light  mt-2 mx-1" >Welcome &nbsp'. $_SESSION["useremail"]. '&nbsp <h4>
        <button type="button" class="btn btn-outline-success"  ><a href="partials/_logout.php">Log out</a></button>
        
       ';
       }
   echo' </div>
    
  </div>
</nav>';

require("partials/_signup.php");
require("partials/_loginmodal.php");

// echo var_dump($_GET);
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
  echo '<div class="alert alert-warning alert-dismissible fade show m-0" role="alert">
  <strong>succesfully !</strong> You have succesfully created an account.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="false"){
  echo '<div class="alert alert-warning alert-dismissible fade show m-0" role="alert">
  <strong>fail !</strong> some problem
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
?>