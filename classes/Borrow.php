<?php
require_once __DIR__ . "/Database.php";
require_once __DIR__ . "/Main.php";


use Main as Response;

class Borrow extends Database
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
    public function create(string $pat_id, string $book_id, string $req_status, string $date_req, string $due_req)
    {
        $pat_id = $this->filter($pat_id);
        $book_id = $this->filter($book_id);
		$req_status = $this->filter($req_status);
		$date_req = $this->filter($date_req);
		$due_req = $this->filter($due_req);

        try {
			$sql = "INSERT INTO `request_table` (`pat_id`, `book_id`, `req_status`, `date_req`, `due_req`) VALUES (:pat_id, :book_id, :req_status, :date_req, :due_req)";
			$stmt = $this->DB->prepare($sql);

			$stmt->bindParam(":pat_id", $pat_id, PDO::PARAM_STR);
			$stmt->bindParam(":book_id", $book_id, PDO::PARAM_STR);
			$stmt->bindParam(":req_status", $req_status, PDO::PARAM_STR);
			$stmt->bindParam(":date_req", $date_req, PDO::PARAM_STR);
			$stmt->bindParam(":due_req", $due_req, PDO::PARAM_STR);

			$stmt->execute();

			$last_id = $this->DB->lastInsertId();
			Response::json(1, 201, "Request has been created successfully", "req_id", $last_id);

		} catch (PDOException $e) {
			Response::json(0, 500, $e->getMessage());
		}
	}

    // Fetch all requests or Get a single request through the req_id
    public function read($req_id = false, $return = false)
    {
        try {
            $sql = "SELECT * FROM `request_table`";
            // If req_id is provided
            if ($req_id !== false) {
                // req_id must be a number
                if (is_numeric($req_id)) {
                    $sql = "SELECT * FROM `request_table` WHERE `req_id`='$req_id'";
                } else {
                    Response::_404();
                }
            }
            $query = $this->DB->query($sql);
            if ($query->rowCount() > 0) {
                $allRequests = $query->fetchAll(PDO::FETCH_ASSOC);
                // If req_id is Provided, send a single request.
                if ($req_id !== false) {
                    // IF $return is true then return the single request
                    if ($return) return $allRequests[0];
                    Response::json(1, 200, null, "request", $allRequests[0]);
                }
                Response::json(1, 200, null, "requests", $allRequests);
            }
            // If the req_id does not exist in the database
            if ($req_id !== false) {
                Response::_404();
            }
            // If there are no requests in the database.
            Response::json(1, 200, "No requests found.", "requests", []);
        } catch (PDOException $e) {
            Response::json(0, 500, $e->getMessage());
        }
    }
	
	public function getMostRecentReqStatusByBookId($book_id)
    {
        try {
            $sql = "SELECT `req_status` FROM `request_table` WHERE `book_id` = :book_id ORDER BY `req_id` DESC LIMIT 1";
            $stmt = $this->DB->prepare($sql);
            $stmt->bindParam(":book_id", $book_id, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                return $result['req_status'];
            } else {
                return null;
            }
        } catch (PDOException $e) {
            return null;
        }
    }

    // Update an existing request
    public function update(int $req_id, Object $data)
{
    try {
        $sql = "SELECT * FROM `request_table` WHERE `req_id`=:req_id";
        $stmt = $this->DB->prepare($sql);
        $stmt->bindParam(":req_id", $req_id, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $the_post = $stmt->fetch(PDO::FETCH_OBJ);

            $req_status = (isset($data->req_status) && !empty(trim($data->req_status))) ? $this->filter($data->req_status) : $the_post->req_status;

            $update_sql = "UPDATE `request_table` SET `req_status`=:req_status WHERE `req_id`=:req_id";

            $update_stmt = $this->DB->prepare($update_sql);
            $update_stmt->bindParam(":req_status", $req_status, PDO::PARAM_STR);
            $update_stmt->bindParam(":req_id", $req_id, PDO::PARAM_INT);

            $update_stmt->execute();

            Response::json(1, 200, "Request Updated Successfully", "request", $this->read($req_id, true));
        }

        Response::json(0, 404, "Invalid Request ID.");

    } catch (PDOException $e) {
        Response::json(0, 500, $e->getMessage());
    }
}

public function updateDates(int $req_id, ?string $date_req, ?string $due_req)
{
    try {
        $sql = "SELECT * FROM `request_table` WHERE `req_id`=:req_id";
        $stmt = $this->DB->prepare($sql);
        $stmt->bindParam(":req_id", $req_id, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $the_request = $stmt->fetch(PDO::FETCH_OBJ);

            $update_sql = "UPDATE `request_table` SET `date_req`=:date_req, `due_req`=:due_req WHERE `req_id`=:req_id";

            $update_stmt = $this->DB->prepare($update_sql);
            $update_stmt->bindParam(":date_req", $date_req, PDO::PARAM_STR);
            $update_stmt->bindParam(":due_req", $due_req, PDO::PARAM_STR);
            $update_stmt->bindParam(":req_id", $req_id, PDO::PARAM_INT);

            $update_stmt->execute();

            Response::json(1, 200, "Dates Updated Successfully", "request", $this->read($req_id, true));
        } else {
            Response::json(0, 404, "Invalid Request ID.");
        }
    } catch (PDOException $e) {
        Response::json(0, 500, $e->getMessage());
    }
}



    // Delete a Request
    public function delete(int $req_id)
    {
        try {
            $sql =  "DELETE FROM `request_table` WHERE `req_id`='$req_id'";
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
