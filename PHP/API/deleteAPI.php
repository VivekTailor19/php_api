<?php 

    include('../connection.php');

    @$id = $_POST['id'];

    if($id!=null)
    {

        $readQuery = "SELECT * FROM `product` WHERE `id` = '$id'";
        $res = mysqli_query($checkConnection,$readQuery);
        $row = mysqli_fetch_assoc($res);
        $image = $row['image'];
    
        if(mysqli_num_rows($res)>0)
        {
            unlink("../upload/$image");
            $query = "DELETE FROM `product` WHERE `id` = '$id' ";
            $response = mysqli_query($checkConnection, $query);
    
            if($response)
            {
                $msg = array('status' => 'OK' , 'msg' => 'Data DELETED Succesfully...');
                http_response_code(200);
            }
            else
            {
                $msg = array('status' => 'Failed' , 'msg' => 'Failed to delete...');
                http_response_code(400);
            }
        
            
        }

        else
        {
            $msg = array('status' => 'Invalid' , 'msg' => 'Id is not found...'); 
            http_response_code(400);
        }

       
    }
    else
    {
        $msg = array('status' => 'Invalid' , 'msg' => 'Invaild data input...');
        http_response_code(400);
    }

    $json = json_encode($msg,JSON_PRETTY_PRINT);
    echo $json;
?>
