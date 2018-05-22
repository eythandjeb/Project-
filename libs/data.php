<?php



$get_controller = isset($_GET['data']) ? $_GET['data'] : 'employee';
$pos = strpos($get_controller, "/"); //check if came from an edit button
if ($pos !== false) {
    $get_controller = explode("/", $get_controller);
    $this->data = $get_controller;
} else {
    $data = [];
    $get_action = isset($_POST['action']) ? $_POST['action'] : 'index';
    $data = build_data($data, $get_controller, $get_action);
    $this->data = $data;
}

function build_data($array, $get_1, $get_2) {
    if ($get_1) {
        array_push($array, $get_1);
    }
    if ($get_2) {
        array_push($array, $get_2);
    }

    return $array;
}
//function test_input($data) {
//  $data = trim($data);
//  $data = htmlspecialchars($data);
//  return $data;
//}
//
