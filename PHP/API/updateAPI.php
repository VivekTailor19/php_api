<?php 

include("../connection.php");

@$id = $_POST['id'];
@$name = $_POST['name'];
@$price = $_POST['price'];
@$desc = $_POST['desc'];


if($id!=null && $name!=null && $price!=null && $desc!=null)
{
    $query = "UPDATE `product` SET  `name`='$name' , `price`='$price' , `description` = '$desc' WHERE `id` = '$id' ";
    $response = mysqli_query($checkConnection,$query);

    if($response)
    {
        $jsonMsg = array('status'=>'Ok' , 'msg'=>'Data Updated......');
        http_response_code(200);    
    }
    else{
        $jsonMsg = array('status'=>'Failed' , 'msg'=>'Failed to Update...'); 
        http_response_code(400);
    }
}
else{
    $jsonMsg = array('status'=>'Failed' , 'msg'=>'Key is Missing.....');
    http_response_code(400);
}

$json = json_encode($jsonMsg , JSON_PRETTY_PRINT);
echo $json;

?>