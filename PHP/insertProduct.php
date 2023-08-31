<?php


include("connection.php");

if(isset($_POST['insert']))
{
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $query =  "INSERT INTO `product` ( `name`, `price`, `description`) VALUES ('$name','$price','$description')";
    $result = mysqli_query($checkConnection,$query);

    if($result)
    {
        //echo "<br>"."Insert data Succesfull.......";
        header('location:readProduct.php');

    }
    else
    {
        echo "<br>"."!!!!!!!!!!!!!   Failed to Enter   !!!!!!!!!!!!";
    }


}


?>



 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
 </head>
 <body>
    <div style = "padding:50px">
    <form method="post">
        
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Enter Name : </label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name = "name">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Price : </label>
                <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="price">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Description : </label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name = "description">
            </div>
    
    
    <input type ="submit" name="insert">

    </form>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

 </body>
 </html>

 