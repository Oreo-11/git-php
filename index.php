<?php



header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Credentials: true');
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
        if (isset($id)) {
            getPost($connect, $id);
        } else {
            getPosts($connect);
        }
    }
} elseif ($method === 'POST') {
    if ($type === 'posts') {
        addPost($connect, $_POST);
    }
} elseif ($method === 'PATCH') {
    if ($type === 'posts') {
        if (isset($id)) {
            $data = file_get_contents('php://input');
            $data = json_decode($data, true);
            updatePost($connect, $id, $data);
        }
    }
} elseif ($method === 'DELETE') {
    if ($type === 'posts') {
        if (isset($id)) {
            deletePost($connect, $id);
        }
    }
}
