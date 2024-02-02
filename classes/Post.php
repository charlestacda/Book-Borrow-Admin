<?php
require_once __DIR__ . "/Database.php";
require_once __DIR__ . "/Main.php";

use Main as Response;

class Post extends Database
{
    private $DB;

    function __construct()
    {
        parent::__construct();
	    $this->DB = $this->getConnection();
    }

    private function filter($data)
    {
        return htmlspecialchars(trim(htmlspecialchars_decode($data)), ENT_NOQUOTES);
    }

    // Create a new book
   public function create(string $book_id, string $title, string $category, string $author, string $created_at, string $content, string $pub_date, string $publisher)
{
    $book_id = $this->filter($book_id);
    $title = $this->filter($title);
    $category = $this->filter($category);
    $author = $this->filter($author);
    $created_at = $this->filter($created_at);
    $content = $this->filter($content);
    $pub_date = $this->filter($pub_date);
    $publisher = $this->filter($publisher);

    try {
        $sql = "INSERT INTO `book_table` (`book_id`,`title`,`category`,`author`,`created_at`, `content`, `pub_date`, `publisher`) VALUES (:book_id,:title,:category,:author,:created_at,:content,:pub_date,:publisher)";
        $stmt = $this->DB->prepare($sql);

        $stmt->bindParam(":book_id", $book_id, PDO::PARAM_STR);
        $stmt->bindParam(":title", $title, PDO::PARAM_STR);
        $stmt->bindParam(":category", $category, PDO::PARAM_STR);
        $stmt->bindParam(":author", $author, PDO::PARAM_STR);
        $stmt->bindParam(":created_at", $created_at, PDO::PARAM_STR);
        $stmt->bindParam(":content", $content, PDO::PARAM_STR);
        $stmt->bindParam(":pub_date", $pub_date, PDO::PARAM_STR);
        $stmt->bindParam(":publisher", $publisher, PDO::PARAM_STR);

        $stmt->execute();

        // Redirect back to reading_mat.php
        header("Location: reading_mat.php");
        exit;

    } catch (PDOException $e) {
        // Handle error here if needed
        // You can display an error message or perform other actions
        Response::json(0, 500, $e->getMessage());
    }
}


    // Fetch all books or Get a single book through the post ID
    public function read($book_id = false, $return = false)
    {
        try {
            $sql = "SELECT * FROM `book_table` WHERE `book_status` != 'Archived'";
            // If post id is provided
            if ($book_id !== false) {
                // Post id must be a number
                if (is_numeric($book_id)) {
                    $sql = "SELECT * FROM `book_table` WHERE `book_id`='$book_id' AND `book_status` != 'Archived'";
                } else {
                    Response::_404();
                }
            }
            $query = $this->DB->query($sql);
            if ($query->rowCount() > 0) {
                $allPosts = $query->fetchAll(PDO::FETCH_ASSOC);
                // If ID is Provided, send a single post.
                if ($book_id !== false) {
                    // IF $return is true then return the single post
                    if ($return) return $allPosts[0];
                    Response::json(1, 200, null, "post", $allPosts[0]);
                }
                Response::json(1, 200, null, "posts", $allPosts);
            }
            // If the post id does not exist in the database
            if ($book_id !== false) {
                Response::_404();
            }
            // If there are no posts in the database.
            Response::json(1, 200, "Please Insert Some posts...", "posts", []);
        } catch (PDOException $e) {
            Response::json(0, 500, $e->getMessage());
        }
    }

    // Update an existing book
    public function update(string $book_id, Object $data)
    {
        try {
            $sql = "SELECT * FROM `book_table` WHERE `book_id`='$book_id'";
            $query = $this->DB->query($sql);
            if ($query->rowCount() > 0) {
                $the_post = $query->fetch(PDO::FETCH_OBJ);

                $title = (isset($data->title) && !empty(trim($data->title))) ? $this->filter($data->title) : $the_post->title;
                $category = (isset($data->category) && !empty(trim($data->category))) ? $this->filter($data->category) : $the_post->category;
                $author = (isset($data->author) && !empty(trim($data->author))) ? $this->filter($data->author) : $the_post->author;
                $content = (isset($data->content) && !empty(trim($data->content))) ? $this->filter($data->content) : $the_post->content;
                $pub_date = (isset($data->pub_date) && !empty(trim($data->pub_date))) ? $this->filter($data->pub_date) : $the_post->pub_date;
                $book_status = (isset($data->book_status) && !empty(trim($data->book_status))) ? $this->filter($data->book_status) : $the_post->book_status;
				$publisher = (isset($data->publisher) && !empty(trim($data->publisher))) ? $this->filter($data->publisher) : $the_post->publisher;

               $update_sql = "UPDATE `book_table` SET `title`=:title, `category`=:category, `author`=:author, `content`=:content, `pub_date`=:pub_date, `book_status`=:book_status, `publisher`=:publisher, `updated_at`=NOW() WHERE `book_id`='$book_id'";

                $stmt = $this->DB->prepare($update_sql);
                $stmt->bindParam(":title", $title, PDO::PARAM_STR);
                $stmt->bindParam(":category", $category, PDO::PARAM_STR);
                $stmt->bindParam(":author", $author, PDO::PARAM_STR);
                $stmt->bindParam(":content", $content, PDO::PARAM_STR);
                $stmt->bindParam(":pub_date", $pub_date, PDO::PARAM_STR);
                $stmt->bindParam(":book_status", $book_status, PDO::PARAM_STR);
				$stmt->bindParam(":publisher", $publisher, PDO::PARAM_STR);


                $stmt->execute();

                header("Location: reading_mat.php");
        exit;
            }

            Response::json(0, 404, "Invalid Post ID.");

        } catch (PDOException $e) {
            Response::json(0, 500, $e->getMessage());
        }
    }
	
	public function edit(string $book_id, Object $data)
    {
        try {
            $sql = "SELECT * FROM `book_table` WHERE `book_id`='$book_id'";
            $query = $this->DB->query($sql);
            if ($query->rowCount() > 0) {
                $the_post = $query->fetch(PDO::FETCH_OBJ);

                $title = (isset($data->title) && !empty(trim($data->title))) ? $this->filter($data->title) : $the_post->title;
                $category = (isset($data->category) && !empty(trim($data->category))) ? $this->filter($data->category) : $the_post->category;
                $author = (isset($data->author) && !empty(trim($data->author))) ? $this->filter($data->author) : $the_post->author;
				$created_at = (isset($data->created_at) && !empty(trim($data->created_at))) ? $this->filter($data->created_at) : $the_post->created_at;
                $content = (isset($data->content) && !empty(trim($data->content))) ? $this->filter($data->content) : $the_post->content;
                $pub_date = (isset($data->pub_date) && !empty(trim($data->pub_date))) ? $this->filter($data->pub_date) : $the_post->pub_date;
				$publisher = (isset($data->publisher) && !empty(trim($data->publisher))) ? $this->filter($data->publisher) : $the_post->publisher;

               $update_sql = "UPDATE `book_table` SET `title`=:title, `category`=:category, `author`=:author, `created_at`=:created_at, `content`=:content, `pub_date`=:pub_date, `publisher`=:publisher, `updated_at`=NOW() WHERE `book_id`='$book_id'";

                $stmt = $this->DB->prepare($update_sql);
                $stmt->bindParam(":title", $title, PDO::PARAM_STR);
                $stmt->bindParam(":category", $category, PDO::PARAM_STR);
                $stmt->bindParam(":author", $author, PDO::PARAM_STR);
				$stmt->bindParam(":created_at", $created_at, PDO::PARAM_STR);
                $stmt->bindParam(":content", $content, PDO::PARAM_STR);
                $stmt->bindParam(":pub_date", $pub_date, PDO::PARAM_STR);
				$stmt->bindParam(":publisher", $publisher, PDO::PARAM_STR);


                $stmt->execute();

                // Redirect back to reading_mat.php
        header("Location: reading_mat.php");
        exit;
            }

            Response::json(0, 404, "Invalid Post ID.");

        } catch (PDOException $e) {
            Response::json(0, 500, $e->getMessage());
        }
    }

    // Delete a Book
    public function delete(string $book_id)
    {
        try {
            $sql =  "DELETE FROM `book_table` WHERE `book_id`='$book_id'";
            $query = $this->DB->query($sql);
            if ($query->rowCount() > 0) {
                Response::json(1, 200, "Post has been deleted successfully.");
            }
            Response::json(0, 404, "Invalid Post ID.");
        } catch (PDOException $e) {
            Response::json(0, 500, $e->getMessage());
        }
    }
}