<?php
require_once "db_connection.php";

function getCats(){
    global $con;
    $getCatsQuery = "select * from categories";
    $getCatsResult = mysqli_query($con,$getCatsQuery);
    while($row = mysqli_fetch_assoc($getCatsResult)){
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        echo "<li><a class='nav-link'  href='index.php?cat=$cat_id'>$cat_title</a></li>";//we made dynamic url using 'index.php?cat=$cat_id
    }
}
function getBrands(){
    global $con;
    $getBrandsQuery = "select * from brands";
    $getBrandsResult = mysqli_query($con,$getBrandsQuery);
    while($row = mysqli_fetch_assoc($getBrandsResult)){
        $brand_id = $row['brand_id'];
        $brand_title = $row['brand_title'];
        echo "<li><a class='nav-link'  href='index.php?cat=$brand_id'>$brand_title</a></li>";
    }
}

function getpro()
{
    global $con;

    if(isset($_GET['cat']))
    {
        $cat_id=$_GET['cat'];
        $getproquery="select * from products where pro_cat='$cat_id'";


    }
    elseif (isset($_GET['brand']))
    {
        $brand_id=$_GET['brand'];
        $getproquery="select * from products where pro_brand='$brand_id'";

    }
    elseif (isset($_GET['search']))
    {
        $q=$_GET['search'];
        $getproquery="select * from products where pro_keywords like '$q'";

    }
    else{

        $getproquery="select * from products order by RAND()";
    }



    $getProResult=mysqli_query($con,$getproquery);
    //$getproquery="select * from products";
    $getBrandsResult = mysqli_query($con,$getproquery);

    while($row = mysqli_fetch_assoc($getBrandsResult)){

        $title=$row['pro_title'];
        $price=$row['pro_price'];
        $image=$row['pro_image'];




        echo"<div class='col-sm-6 col-md-4 col-lg-3 text-center product-summary'>
                <h5 class='text-capitalize'> $title </h5>
                <img src=$image>
                <p> <b>$price  </b> </p>
                <a href='#' class='btn btn-info btn-sm'>Details</a>
                <a href='#'>
                    <button class='btn btn-primary btn-sm'>
                        <i class='fas fa-cart-plus'></i> Add to Cart
                    </button>
                </a>
            </div>   ";

    }





}



