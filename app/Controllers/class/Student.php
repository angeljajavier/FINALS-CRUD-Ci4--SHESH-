<?php
/**
 * @package Student class
 *
 * @author CodersMag Team
 *
 * @email  info@codersmag.com
 *   
 */
include("DBConnection.php");
// Student
class Student 
{
    // here variables    
    protected $_db;
    private $_studentID;
    private $_rollNo;
    private $_name;
    private $_email;
    private $_address;
    private $_gender;
    private $_className;
    private $_searchVal;
    private $_orderBy;
    private $_start;
    private $_length;

    // functions
    public function setStudentID($studentID) {
        $this->_studentID = $studentID;
    }
    public function setName($name) {
        $this->_name = $name;
    }
    public function setRollNo($rollNo) {
        $this->_rollNo = $rollNo;
    }
    public function setEmail($email) {
        $this->_email = $email;
    }
    public function setAddress($address) {
        $this->_address = $address;
    }
    public function setGender($gender) {
        $this->_gender = $gender;
    }
    public function setClass($className) {
        $this->_className = $className;
    }
    public function setSearchVal($searchVal) {
        $this->_searchVal = $searchVal;
    }
    public function setOrderBy($orderBy) {
        $this->_orderBy = $orderBy;
    }
    public function setStart($start) {
        $this->_start = $start;
    }
    public function setLength($length) {
        $this->_length = $length;
    }

    
    // __construct
    public function __construct() {
        $this->_db = new DBConnection();
        $this->_db = $this->_db->returnPDOConnection();
    }

    // add student record in database
    public function create() {
		try {
    		$sql = 'INSERT INTO student (roll_no, name, email, address, class_name, gender)  VALUES (:roll_no, :name, :email, :address, :class_name, :gender)';
    		$data = [
			    'roll_no' => $this->_rollNo,
                'name' => $this->_name,
			    'email' => $this->_email,
                'address' => $this->_address,
                'class_name' => $this->_className,
                'gender' => $this->_gender,
			];
	    	$stmt = $this->_db->prepare($sql);
	    	$stmt->execute($data);
			$status = $this->_db->lastInsertId();
            return $status;

		} catch (Exception $e) {
    		die("Exception Caught!: ".$ee->getMessage());
		}

    }

    // edit student record in database
    public function update() {
        try {
		    $sql = "UPDATE student SET roll_no=:roll_no, name=:name, email=:email, address=:address, class_name=:class_name, gender=:gender WHERE id=:student_id";
		     $data = [
			    'roll_no' => $this->_rollNo,
                'name' => $this->_name,
                'email' => $this->_email,
                'address' => $this->_address,
                'class_name' => $this->_className,
                'gender' => $this->_gender,
                'student_id' => $this->_studentID,
			];
			$stmt = $this->_db->prepare($sql);
			$stmt->execute($data);
			$status = $stmt->rowCount();
            return $status;
		} catch (Exception $e) {
			die("Exception Caught!: " . $e->getMessage());
		}
    }

    // get all student records from database
    public function getList() {
    	try {

            $sql = "SELECT id, roll_no, name, email, address, class_name, gender, created_date FROM student ORDER BY `id` DESC";
		    $stmt = $this->_db->prepare($sql);
		    $stmt->execute();
		    $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
		} catch (Exception $e) {
		    die("Exception Caught!: " . $e->getMessage());
		}
    }

    // get student record from database
    public function getStudent() {
        try {
            $sql = "SELECT id, roll_no, name, email, address, class_name, gender, created_date FROM student WHERE id=:student_id";
            $stmt = $this->_db->prepare($sql);
            $data = [
                'student_id' => $this->_studentID
            ];
            $stmt->execute($data);
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            die("Exception Caught!: " . $e->getMessage());
        }
    }

    // delete student record from database
    public function delete() {
    	try {
	    	$sql = "DELETE FROM student WHERE id=:student_id";
		    $stmt = $this->_db->prepare($sql);
		    $data = [
		    	'student_id' => $this->_studentID
			];
	    	$stmt->execute($data);
            $status = $stmt->rowCount();
            return $status;
	    } catch (Exception $e) {
		    die("Exception Caught!: " . $e->getMessage());
		}
    }

}
?>