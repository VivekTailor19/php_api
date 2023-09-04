<?php 

include("../connection.php");

@$name = $_POST['name'];
@$price = $_POST['price'];
@$description = $_POST['description'];

$query = " INSERT INTO `product` ( `name`, `price` , `description` ) VALUES ('$name', '$price', '$description')";

$response = mysqli_query($checkConnection, $query);

if($response)
{
    $jsonMSG = array('status' => 'OK' , 'msg' => 'Succesfully INSERTED');
 }
else
{
    $jsonMSG = array('status' => 'OOPS !' , 'msg' => 'Failed to insert');
}
// print_r($jsonMSG);

$json = json_encode($jsonMSG,JSON_PRETTY_PRINT);
echo $json;

?>
