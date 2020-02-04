<?php
    require_once('functions.php');
    $post = array();

    foreach($_GET as $k => $v){
        $post[$k] = $v;
    }



    $class = new Exom(
        $post
    );


    $data = $class->get($post);

    
 

        // print_r(json_encode($data));

    // print_r($_POST);


    // print_r($data);



?>