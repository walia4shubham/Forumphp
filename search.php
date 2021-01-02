<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="c.css">
    <style>
    .container {
        min-height: 100px;
    }
    </style>
    <title>made by shubham </title>
</head>

<body>
    <?php
   require "partials/_dbconnect.php" ;
   require "partials/_header.php" ;
   
?>

<div class="container my-4">
<h1 class="py-3 text-center" >Search result for <?php  echo $_GET["search"]    ?> </h1>
<?php
$query = $_GET["search"];
$sql= "SELECT * FROM `threads` WHERE match (thread_title,thread_desc) against ('$query')";
$result2 = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result2);
// echo var_dump($num);

while($row = mysqli_fetch_assoc($result2)){
$thrname = $row["thread_title"];
$thrdes = $row["thread_desc"];
$thrdid = $row["thread_id"];



}
if($num>0){
    echo  '<div class="container">
   <h3><a href="thread.php?thrid='.$thrdid.'">'.$thrname.'</a></h3>
   <p>'.$thrdes.'</p>

</div>';
}else{
 echo  '<div class="jumbotron jumbotron-fluid">
 <div class="container">
    <h1> Your search - '.$_GET["search"].' - did not match any documents. </h1>

Suggestions:
<ul>
<li>Make sure that all words are spelled correctly.</li>
<li>Try different keywords.</li>
<li>Try more general keywords.</li>
</ul>
 </div>
</div>
';


}
















?>

</div>
    
          
     
            
       

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