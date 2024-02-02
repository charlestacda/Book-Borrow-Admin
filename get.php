<?php
require_once __DIR__ . "/config.php";

use Main as Request;

if (Request::check("GET")) {
    $Post = new Post();

    if (isset($_GET['id'])) {
        $postId = trim($_GET['id']);
        $post = $Post->read($postId, true);
        if ($post) {
            // Get the image file path from the post data
            $imageFilePath = $post['book_cover'];

            // Construct the img tag with the image file path
            $imageHtml = '<img src="' . $imageFilePath . '" alt="Image" style="width: 100px; height: 100px;">';

            // Append the image HTML to the post data
            $post['book_cover_html'] = $imageHtml;
        } else {
            Response::_404();
        }
    } else {
        // Fetch all posts
        $posts = $Post->read();
        foreach ($posts as &$post) {
            // Get the image file path from the post data
            $imageFilePath = $post['book_cover'];

            // Construct the img tag with the image file path
            $imageHtml = '<img src="' . $imageFilePath . '" alt="Image" style="width: 100px; height: 100px;">';

            // Append the image HTML to the post data
            $post['book_cover_html'] = $imageHtml;
        }

        // Return all posts with the book_cover data
        Response::json(1, 200, null, "posts", $posts);
    }

    // Display the post data along with the image HTML
    if (isset($post)) {
        // Assuming you have other post information
        echo "<h2>{$post['title']}</h2>";
        echo "<p>{$post['content']}</p>";
        echo $post['book_cover_html']; // This will display the image
    } else {
        // Handle the case when the post is not found
        echo "Post not found.";
    }
}