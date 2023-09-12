<?php
    include("../connection.php");

    @$email = $_POST['email'];
    @$password = $_POST['password'];

    if($email != null && $password != null)
    {
        $query = " SELECT * FROM `user` WHERE `email` = '$email' " ;
        $res = mysqli_query($checkConnection,$query);

        if(mysqli_num_rows($res)>0)
        {

            $row = mysqli_fetch_assoc($res);
            // $row['password'] ; 
            if(password_verify($password , $row['password']))
            {
                $jsonMsg = array('status'=> 'Ok' , 'msg'=> 'You Succesfully Login..');
                http_response_code(200);
            }
            else
            {
                $jsonMsg = array('status'=> 'Ok' , 'msg'=> 'Password is Wrong......');
                http_response_code(400);
            }

             
        }
        else
        {
            $jsonMsg = array('status'=> 'Failed' , 'msg'=> 'Email is invalid...');
            http_response_code(400); 
        }
    }
    else
    {
        $jsonMsg = array('status'=> 'Failed' , 'msg'=> 'Email or Password  or both are Empty.....');
        http_response_code(400);
    }

    $json = json_encode($jsonMsg,JSON_PRETTY_PRINT);
    echo $json;
?>