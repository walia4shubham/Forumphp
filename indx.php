<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="c.css">
    <title>made by shubham </title>
</head>

<body>
    <?php
   require "partials/_dbconnect.php" ;
   require "partials/_header.php" ;

?>


    <!-- sliders starts here-- -->


    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="photes/1.jpg">
            </div>
            <div class="carousel-item">
                <img src="photes/2.jpg">
            </div>
            <div class="carousel-item">
                <img src="photes/3.jpg">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- categories starts here--- -->

    <div class="container my-4">

        <h1 class="text-center mb-4">iDiscuss Browse -Categories</h1>
        <div class="row">
           <!-- run the sql to fetch categories  -->
           <?php
             $sql = 'SELECT * FROM `categories`';
             $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($result)) {

              $name = $row['category_name'];
              $id = $row['category_sno'];
              $desc = substr($row["category_description"],0,50);
              echo  '<div class="col-md-4 text-center mb-5">
                <div class="card" style="width: 18rem;">
                    <img src="photes/ca-'.$id.'.jpg" class="card-img-top" alt="...">
                    <div class="card-body text-center ">
                        <h5 class="card-title text-dark"><a class="text-dark" href="threadlist.php?catid='.$id.'">'.$row["category_name"].'<a/></h5>
                        <p class="card-text">'.$desc.'.........</p>
                        <a href="threadlist.php?catid='.$id.'" class="btn btn-primary mt-3">view Threads</a>
                    </div>
                </div>
            </div>';
             

            }

            
            
            ?>



            <!-- inserting by while loop -->
             
            
        </div>
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