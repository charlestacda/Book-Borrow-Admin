<?php
require_once __DIR__ . "/Database.php";
require_once __DIR__ . "/Main.php";

use Main as Response;

class Account extends Database
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
    public function create(string $pat_id, string $fname, string $mname, string $lname, string $email, string $patron_type, string $course, string $reg_date)
{
    $pat_id = $this->filter($pat_id);
    $fname = $this->filter($fname);
    $mname = $this->filter($mname);
    $lname = $this->filter($lname);
    $email = $this->filter($email);
    $patron_type = $this->filter($patron_type);
    $course = $this->filter($course);
    $reg_date = $this->filter($reg_date);

    try {
        $sql = "INSERT INTO `patron_table` (`pat_id`, `fname`, `mname`, `lname`, `email`, `patron_type`, `course`, `reg_date`) VALUES (:pat_id, :fname, :mname, :lname, :email, :patron_type, :course, :reg_date)";
        $stmt = $this->DB->prepare($sql);

        $stmt->bindParam(":pat_id", $pat_id, PDO::PARAM_STR);
        $stmt->bindParam(":fname", $fname, PDO::PARAM_STR);
        $stmt->bindParam(":mname", $mname, PDO::PARAM_STR);
        $stmt->bindParam(":lname", $lname, PDO::PARAM_STR);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->bindParam(":patron_type", $patron_type, PDO::PARAM_STR);
        $stmt->bindParam(":course", $course, PDO::PARAM_STR);
        $stmt->bindParam(":reg_date", $reg_date, PDO::PARAM_STR);

        $stmt->execute();

        // Redirect back to reading_mat.php
        header("Location: reg_acc.php");
        exit;

    } catch (PDOException $e) {
		
		
		 Response::json(0, 500, $e->getMessage());
    }
}


    // Fetch all books or Get a single book through the post ID
    public function read($pat_id = false, $return = false)
    {
        try {
            $sql = "SELECT * FROM `patron_table`";
            // If post id is provided
            if ($pat_id !== false) {
                // Post id must be a number
                if (is_numeric($pat_id)) {
                    $sql = "SELECT * FROM `patron_table`` WHERE `pat_id`='$pat_id'";
                } else {
                    Response::_404();
                }
            }
            $query = $this->DB->query($sql);
            if ($query->rowCount() > 0) {
                $allPosts = $query->fetchAll(PDO::FETCH_ASSOC);
                // If ID is Provided, send a single post.
                if ($pat_id !== false) {
                    // IF $return is true then return the single post
                    if ($return) return $allPosts[0];
                    Response::json(1, 200, null, "post", $allPosts[0]);
                }
                Response::json(1, 200, null, "posts", $allPosts);
            }
            // If the post id does not exist in the database
            if ($pat_id !== false) {
                Response::_404();
            }
            // If there are no posts in the database.
            Response::json(1, 200, "Please Insert Some posts...", "posts", []);
        } catch (PDOException $e) {
            Response::json(0, 500, $e->getMessage());
        }
    }

    // Update an existing book
    public function update(int $pat_id, Object $data)
    {
        try {
            $sql = "SELECT * FROM `patron_table`` WHERE `pat_id`='$pat_id'";
            $query = $this->DB->query($sql);
            if ($query->rowCount() > 0) {
                $the_post = $query->fetch(PDO::FETCH_OBJ);

                $fname = (isset($data->fname) && !empty(trim($data->fname))) ? $this->filter($data->fname) : $the_post->fname;
                $mname = (isset($data->mname) && !empty(trim($data->mname))) ? $this->filter($data->mname) : $the_post->mname;
				$lname = (isset($data->lname) && !empty(trim($data->lname))) ? $this->filter($data->lname) : $the_post->lname;
				$email = (isset($data->email) && !empty(trim($data->email))) ? $this->filter($data->email) : $the_post->email;
				$fname = (isset($data->barcode) && !empty(trim($data->barcode))) ? $this->filter($data->barcode) : $the_post->barcode;
				$fname = (isset($data->patron_type) && !empty(trim($data->patron_type))) ? $this->filter($data->patron_type) : $the_post->patron_type;
				$fname = (isset($data->course) && !empty(trim($data->course))) ? $this->filter($data->course) : $the_post->course;
				$fname = (isset($data->dept) && !empty(trim($data->dept))) ? $this->filter($data->dept) : $the_post->dept;
				$fname = (isset($data->reg_date) && !empty(trim($data->reg_date))) ? $this->filter($data->reg_date) : $the_post->reg_date;

                $update_sql = "UPDATE `patron_table`` SET `fname`=:fname,`mname`=:mname,`lname`=:lname,`email`=:email,`barcode`=:barcode,`patron_type`=:patron_type,`course`=:course,`dept`=:dept,`reg_date`=:reg_date,`updated_at`=NOW() WHERE `pat_id`='$pat_id'";

                $stmt = $this->DB->prepare($update_sql);
                $stmt->bindParam(":fname", $fname, PDO::PARAM_STR);
				$stmt->bindParam(":mname", $mname, PDO::PARAM_STR);
				$stmt->bindParam(":lname", $lname, PDO::PARAM_STR);
				$stmt->bindParam(":email", $email, PDO::PARAM_STR);
				$stmt->bindParam(":barcode", $barcode, PDO::PARAM_STR);
				$stmt->bindParam(":patron_type", $patron_type, PDO::PARAM_STR);
				$stmt->bindParam(":course", $course, PDO::PARAM_STR);
				$stmt->bindParam(":dept", $dept, PDO::PARAM_STR);
				$stmt->bindParam(":reg_date", $reg_date, PDO::PARAM_STR);


                $stmt->execute();

                Response::json(1, 200, "Post Updated Successfully", "post", $this->read($pat_id, true));
            }

            Response::json(0, 404, "Invalid Post ID.");

        } catch (PDOException $e) {
            Response::json(0, 500, $e->getMessage());
        }
    }

    // Delete a Book
    public function delete(int $pat_id)
    {
        try {
            $sql =  "DELETE FROM `patron_table` WHERE `pat_id`='$pat_id'";
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