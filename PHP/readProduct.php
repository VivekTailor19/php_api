<?php 

include("connection.php");

$query = "SELECT * FROM `product`";
$response = mysqli_query($checkConnection,$query);

// if(mysqli_num_rows($response)>0)
// {
//     while($row = mysqli_fetch_assoc($response))
//     {
//         echo $row['id'];
//         echo $row['name'];
//         echo $row['price'];
//         echo $row['description'];

//         echo "</br>";

//     }
// }
// else{
//     echo "Data is not founded....";
// }

// ============     DELETE ITEM          =======================

if(isset($_GET['delete']))
{
    $id = $_GET['delete'];
    $deleteQuery = "DELETE FROM `product` WHERE `id` = '$id' ";
    mysqli_query($checkConnection,$deleteQuery);
    header('location:readProduct.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <div style = "padding:50px" align = "center"> <a href="insertProduct.php" class="btn btn-primary">Insert</a> <a href="readProduct.php" class="btn btn-outline-warning">Read</a> </div>
    <div style = "padding:50px">

        <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Product Name</th>
            <th scope="col">Price</th>
            <th scope="col">Description</th>
            <th scope="col">Delete</th>
            <th scope="col">Update</th>
            
            </tr>
        </thead>
        <tbody>

            <?php while($row = mysqli_fetch_assoc($response))  { ?>
                <tr>
                <th scope="row"> <?php echo $row['id']; ?> </th>
                <td> <?php echo $row['name']; ?>  </td>
                <td> <?php echo $row['price']; ?>  </td>
                <td> <?php echo $row['description']; ?>  </td>
                <td> <a href="readProduct.php?delete=<?php echo $row['id'];?>">Delete</a> </td>
                <td> <a href="updateProduct.php?update=<?php echo $row['id'];?>">Update</a> </td>

                </tr>
            <?php } ?>
        </tbody>
        </table>




    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>