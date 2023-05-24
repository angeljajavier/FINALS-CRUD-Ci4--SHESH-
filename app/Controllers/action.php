<?php
// include class 
include_once 'class/Student.php';
// object
$studentObj = new Student();
// post method
$_post = $_POST;
$json = array();	
$studentInfo = array();
// create student record in database
if(!empty($_post['action']) && $_post['action']=="create") {
  $studentObj->setRollNo($_post['roll_no']);
	$studentObj->setName($_post['name']);
	$studentObj->setEmail($_post['email']);
	$studentObj->setAddress($_post['address']);
  $studentObj->setGender($_post['gender']);
  $studentObj->setClass($_post['class_name']);
	$student_id = $studentObj->create();
	if(!empty($student_id)){
		$json['msg'] = 'success';
		$json['student_id'] = $student_id;
	} else {
		$json['msg'] = 'failed';
		$json['student_id'] = '';
	}

  $studentObj->setStudentID($student_id);
  $element = $studentObj->getStudent();
	header('Content-Type: application/json');
  echo '<tr id="record-'.$element['id'].'">
    <td>'.$element['roll_no'].'</td>
    <td>'.$element['name'].'</td>
    <td>'.$element['email'].'</td>
    <td>'.$element['address'].'</td>
    <td>'.$element['gender'].'</td>
    <td>'.$element['class_name'].'</td>
    <td>
      <a data-studentid="'.$element['id'].'" class="btn btn-outline-secondary btn-sm display-student"> View </a>  
      <a data-studentid="'.$element['id'].'" class="btn btn-outline-info btn-sm edit-student"> Edit </a>  
      <a data-studentid="'.$element['id'].'" class="btn btn-outline-danger btn-sm remove-student"> Delete</a>
    </td>
  </tr>';
}

// get all student records in database
if(!empty($_post['action']) && $_post['action']=="fetch_all_student") {
  // get student information
  $studentData = $studentObj->getList();
  header('Content-Type: application/json');
  echo json_encode($json['studentData']); 
}

// get student record in database
if(!empty($_post['action']) && $_post['action']=="fetch_student") {
	$studentObj->setStudentID($_post['student_id']);
	$json['fetchStudent'] = $studentObj->getStudent();
	header('Content-Type: application/json');
	echo json_encode($json['fetchStudent']); 
}

// update student record in database
if(!empty($_post['action']) && $_post['action']=="update") {
	$studentObj->setStudentID($_post['student_id']);
  $studentObj->setRollNo($_post['roll_no']);
	$studentObj->setName($_post['name']);
  $studentObj->setEmail($_post['email']);
  $studentObj->setAddress($_post['address']);
  $studentObj->setGender($_post['gender']);
  $studentObj->setClass($_post['class_name']);
	$status = $studentObj->update();
	if(!empty($status)){
		$json['msg'] = 'success';
	} else {
		$json['msg'] = 'failed';
	}
  $studentObj->setStudentID($_post['student_id']);
  $element = $studentObj->getStudent();

	header('Content-Type: application/json');	
  echo '<td>'.$element['roll_no'].'</td>
  <td>'.$element['name'].'</td>
  <td>'.$element['email'].'</td>
  <td>'.$element['address'].'</td>
  <td>'.$element['gender'].'</td>
  <td>'.$element['class_name'].'</td>
  <td>
    <a data-studentid="'.$element['id'].'" class="btn btn-outline-secondary btn-sm display-student"> View </a>  
    <a data-studentid="'.$element['id'].'" class="btn btn-outline-info btn-sm edit-student"> Edit </a>  
    <a data-studentid="'.$element['id'].'" class="btn btn-outline-danger btn-sm remove-student"> Delete</a>
  </td>';
}

// delete student record from database
if(!empty($_post['action']) && $_post['action']=="delete") {
	$studentObj->setStudentID($_post['student_id']);
	$status = $studentObj->delete();
	if(!empty($status)){
		$json['msg'] = 'success';
	} else {
		$json['msg'] = 'failed';
	}
	header('Content-Type: application/json');	
	echo json_encode($json);	
}
?>