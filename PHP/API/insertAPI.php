<?php 

include("../connection.php");

@$name = $_POST['name'];
@$price = $_POST['price'];
@$description = $_POST['description'];
@$image = $_FILES['image'];
@$cate_id = $_POST['cate_id'];

$path="../upload";

$img_name = $image['name'];
$tmp_name = $image['tmp_name'];



if($name!=null && $price!=null && $description!=null && $image!=null && $cate_id!=null  )
{
    $isUpload = move_uploaded_file($tmp_name,"$path/$img_name");

    if($isUpload)
        {
        $query = " INSERT INTO `product` ( `name`, `price` , `description` , `image` , `cate_id` ) VALUES ('$name', '$price', '$description', '$img_name' , '$cate_id') ";

        $response = mysqli_query($checkConnection, $query);

        if($response)
        {
            $jsonMSG = array('status' => 'OK' , 'msg' => 'Succesfully INSERTED');
            http_response_code(200);
        }
        else
        {
            $jsonMSG = array('status' => 'OOPS !' , 'msg' => 'Failed to insert');
            http_response_code(400);
        }
        }
        else
        {
        $jsonMSG = array("status" => "OOPS !" , "msg" => "Image is can't uploaded. Failed to insert");
        http_response_code(400);
        }
}
else
{
    $jsonMSG = array("status" => "OOPS !" , "msg" => "Please add all data...");
    http_response_code(400);
}




// print_r($jsonMSG);

$json = json_encode($jsonMSG,JSON_PRETTY_PRINT);
echo $json;

?>
