<?php 

include("../connection.php");

@$name = $_POST['name'];
@$email = $_POST['email'];
@$password = $_POST['pass'];

if( $name != null && $email != null && $password != null)
{
   $readQuery = " SELECT email FROM `user` WHERE `email` = '$email' " ;
   $res = mysqli_query($checkConnection, $readQuery);
    

   if( mysqli_num_rows($res)>0 )
   {
        $jsonMSG = array('status' => 'OK' , 'msg' => 'You are already User.........');
        http_response_code(400);
   }
   else
   {
        $pass = password_hash($password,PASSWORD_DEFAULT);
        
        $query = "INSERT INTO `user` (`name` , `email` , `password`) VALUES ('$name', '$email' , '$pass')";
        $response = mysqli_query($checkConnection, $query);

        if($response)
        {
            $jsonMSG = array('status' => 'OK' , 'msg' => 'Registration is Succesful...');
            http_response_code(200);
        }
        else
        {
            $jsonMSG = array('status' => 'Failed' , 'msg' => 'Failed to Register.....');
            http_response_code(400);
        }

   }

}
else
{
    $jsonMSG = array('status' => 'Failed' , 'msg' => 'Missing Key.........');
    http_response_code(400);
}


$json = json_encode($jsonMSG,JSON_PRETTY_PRINT);
echo $json;

?>
