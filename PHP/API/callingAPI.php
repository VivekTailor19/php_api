<?php 

    $data = file_get_contents("https://jsonplaceholder.typicode.com/comments");
    $data = json_decode($data);

    echo $data[0]->id;
    echo "\r";
    echo $data[0]->postId;
    echo "\r";
    echo $data[0]->email;
    
?>