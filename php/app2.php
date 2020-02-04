<?php
    require_once('functions.php');
    $post = array();

    foreach($_POST as $k => $v){
        $post[$k] = $v;
    }




    $class = new Exom(
        $post
    );


    $data = $class->get2($post);


 

        // print_r(json_encode($data));

    // print_r($_POST);


    // print_r($data);



?>