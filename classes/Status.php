<?php
require_once __DIR__ . "/Database.php";
require_once __DIR__ . "/Main.php";


use Main as Response;

class Status extends Database
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

    // Create a new request
    public function create(int $req_id, string $remark)
    {
		$req_id = $this->filter($req_id);
        $remark = $this->filter($remark);

        try {
			$sql = "INSERT INTO `borrow_table` (`req_id`, `remark`) VALUES (:req_id, :remark)";
			$stmt = $this->DB->prepare($sql);

			$stmt->bindParam(":req_id", $req_id, PDO::PARAM_STR);
			$stmt->bindParam(":remark", $remark, PDO::PARAM_STR);

			$stmt->execute();

			$last_id = $this->DB->lastInsertId();
			Response::json(1, 201, "Request has been created successfully", "borr_id", $last_id);

		} catch (PDOException $e) {
			Response::json(0, 500, $e->getMessage());
		}
	}

    // Fetch all requests or Get a single request through the req_id
    public function read($borr_id = false, $return = false)
    {
        try {
            $sql = "SELECT * FROM `borrow_table``";
            // If req_id is provided
            if ($borr_id !== false) {
                // req_id must be a number
                if (is_numeric($borr_id)) {
                    $sql = "SELECT * FROM `borrow_table` WHERE `borr_id`='$borr_id'";
                } else {
                    Response::_404();
                }
            }
            $query = $this->DB->query($sql);
            if ($query->rowCount() > 0) {
                $allRequests = $query->fetchAll(PDO::FETCH_ASSOC);
                // If req_id is Provided, send a single request.
                if ($borr_id !== false) {
                    // IF $return is true then return the single request
                    if ($return) return $allRequests[0];
                    Response::json(1, 200, null, "request", $allRequests[0]);
                }
                Response::json(1, 200, null, "requests", $allRequests);
            }
            // If the req_id does not exist in the database
            if ($borr_id !== false) {
                Response::_404();
            }
            // If there are no requests in the database.
            Response::json(1, 200, "No requests found.", "requests", []);
        } catch (PDOException $e) {
            Response::json(0, 500, $e->getMessage());
        }
    }
	
	public function readByRemarks($remarks)
{
    try {
        // Create a placeholder for each remark
        $placeholders = implode(', ', array_fill(0, count($remarks), '?'));

        $sql = "SELECT
            bt.borr_id,
            pt.pat_id AS patron_no,
            CONCAT(pt.fname, ' ', pt.lname) AS borrower_name,
            bk.book_id AS reference_no,
            bk.title AS reading_material_title,
			rt.req_id AS req_id,
            rt.date_req AS checked_out_date,
            rt.due_req AS due_date,
            bt.remark
        FROM
            borrow_table bt
            JOIN request_table rt ON bt.req_id = rt.req_id
            JOIN patron_table pt ON rt.pat_id = pt.pat_id
            JOIN book_table bk ON rt.book_id = bk.book_id
        WHERE
            bt.remark IN ($placeholders)";

        $query = $this->DB->prepare($sql);

        // Bind each remark value to placeholders
        foreach ($remarks as $index => $remark) {
            $query->bindValue($index + 1, $remark, PDO::PARAM_STR);
        }

        $query->execute();

        if ($query->rowCount() > 0) {
            $filteredRequests = $query->fetchAll(PDO::FETCH_ASSOC);
            return ["posts" => $filteredRequests]; // Return an associative array
        }

        return ["posts" => []]; // Return an associative array
    } catch (PDOException $e) {
        Response::json(0, 500, $e->getMessage());
    }
}





	

    // Update an existing request
    public function update(int $borr_id, Object $data)
{
    try {
        $sql = "SELECT * FROM `borrow_table` WHERE `borr_id`='$borr_id'";
        $query = $this->DB->query($sql);
        if ($query->rowCount() > 0) {
            $the_post = $query->fetch(PDO::FETCH_OBJ);

            $remark = (isset($data->remark) && !empty(trim($data->remark))) ? $this->filter($data->remark) : $the_post->remark;
            $req_id = (isset($data->req_id) && is_numeric($data->req_id)) ? $data->req_id : $the_post->req_id;

            $update_sql = "UPDATE `borrow_table` SET `req_id`=:req_id, `remark`=:remark WHERE `borr_id`='$borr_id'";

            $stmt = $this->DB->prepare($update_sql);
            $stmt->bindParam(":remark", $remark, PDO::PARAM_STR);
            $stmt->bindParam(":req_id", $req_id, PDO::PARAM_INT);

            $stmt->execute();

            Response::json(1, 200, "Post Updated Successfully", "post", $this->read($borr_id, true));
        }

        Response::json(0, 404, "Invalid Post ID.");

    } catch (PDOException $e) {
        Response::json(0, 500, $e->getMessage());
    }
}



    // Delete a Request
    public function delete(int $borr_id)
    {
        try {
            $sql =  "DELETE FROM `borrow_table` WHERE `borr_id`='$borr_id'";
            $query = $this->DB->query($sql);
            if ($query->rowCount() > 0) {
                Response::json(1, 200, "Request has been deleted successfully.");
            }
            Response::json(0, 404, "Invalid Request ID.");
        } catch (PDOException $e) {
            Response::json(0, 500, $e->getMessage());
        }
    }
}
