<?php
include('templates/header.php');
// include class 
include_once 'class/Student.php';
// object
$studentObj = new Student();
$studentInfo = $studentObj->getList();
?>
<section class="showcase">
  <div class="container">
    <div class="pb-2 mt-4 mb-2 border-bottom">
      <h2>Final Project</h2>
    </div>
      <div class="row align-items-center">
        <div class="col-md-12">
        	<a id="add-student" class="text-white btn btn-primary btn-sm float-right" style="margin-bottom: 5px;"> Add Student </a>
            <table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="10%">Student ID</th>
						<th width="10%">Name</th>					
						<th width="10%">Email</th>
						<th width="25%">Address</th>
						<th width="10%">Gender</th>
						<th width="15%">Course</th>					
						<th width="20%">&nbsp;</th>						
					</tr>
				</thead>
				<tbody id="render-student">

				<?php foreach($studentInfo as $key=>$element) { ?>
			      <tr id="record-<?php print $element['id']; ?>">
			        <td><?php print $element['roll_no'] ?></td>
			        <td><?php print $element['name'] ?></td>
			        <td><?php print $element['email'] ?></td>
			        <td><?php print $element['address'] ?></td>
			        <td><?php print $element['gender'] ?></td>
			        <td><?php print $element['class_name'] ?></td>
			        <td><a data-studentid="<?php print $element['id'] ?>" class="btn btn-outline-secondary btn-sm display-student"> View </a>  
			        	<a data-studentid="<?php print $element['id'] ?>" class="btn btn-outline-info btn-sm edit-student"> Edit </a>  
			        	<a data-studentid="<?php print $element['id'] ?>" class="btn btn-outline-danger btn-sm remove-student"> Delete</a>
			        </td>
			      </tr> 
			  	<?php } ?>
			    </tbody>
			</table>
        </div>
      </div>
  </div>
</section>
<?php 
include('templates/footer.php');
include('modal/add.php');
include('modal/view.php');
?>