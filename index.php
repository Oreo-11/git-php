<?php

header('content-type: json/aplication');
require 'connect.php';
require 'function.php';

$method = $_SERVER['REQUEST_METHOD'];

$qa = $_GET['qa'];
$params = explode('/', $qa);

$type = $params[0];
$id = $params[1];

if ($method === 'GET') {
    if ($type === 'posts') {
        if ($id) {
            getPost($connect, $id);
        } else {
            getPosts($connect);
        }
    }
} elseif ($method === 'POST') {
    if ($type === 'posts') {
        addPost($connect, $_POST);
    }
}
