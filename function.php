<?php


function getPosts($connect)
{
    $posts = mysqli_query($connect, "SELECT * FROM `posts`");
    while ($post = mysqli_fetch_assoc($posts)) {
        $postList[] = $post;
    }
    echo json_encode($postList);
};



function getPost($connect, $id)
{
    $post = mysqli_query($connect, "SELECT * FROM `posts` Where `id` = $id");

    if (mysqli_num_rows($post) === 0) {
        http_response_code(404);
        $res = [
            "status" => false,
            "message" => "Post Not Found"
        ];
        echo json_encode($res);
    } {
        while ($posta = mysqli_fetch_assoc($post)) {
            echo json_encode($posta);
        }
    }
};



function addPost($connect, $data)
{
    $title = $data['title'];
    $body = $data['body'];
    mysqli_query($connect, "INSERT INTO `posts` (`id`, `title`, `body`) VALUES (NULL, '$title', '$body')");
    http_response_code(201);
    $res = [
        "status" => true,
        "post_id" => mysqli_insert_id($connect)
    ];

    echo json_encode($res);
}



function updatePost($connect, $id, $data)
{
    $title = $data['title'];
    $body = $data['body'];
    mysqli_query($connect, "UPDATE `posts` SET `title` = '$title', `body` = '$body' WHERE `posts`.`id` = $id");

    http_response_code(200);
    $res = [
        "status" => true,
        "message" => "post is updated"
    ];

    echo json_encode($res);
}



function deletePost($connect, $id)
{
    mysqli_query($connect, "DELETE FROM `posts` WHERE `posts`.`id` = $id");

    http_response_code(200);
    $res = [
        "status" => true,
        "message" => "post is deleted"
    ];

    echo json_encode($res);
}
