/*
 ***
 Author: CodersMag Team
 Author URI: http://codersmag.com
 File Name : ajax.js
 *** 
 */
 
jQuery(document).ready(function() {
	jQuery(document).on('click', '#add-student', function() {
		jQuery('#create-student').modal('show');
		jQuery('#student-frm')[0].reset();
		jQuery('.modal-title').html(" Add Student");
		jQuery('#action').val('create');
		jQuery('#student_id').val('');
		jQuery('#student-btn').text('Add');
	});		

	jQuery(document).on('click', '.edit-student', function(){
		var student_id = jQuery(this).data("studentid");
		var action = 'fetch_student';
		jQuery.ajax({
			url:'action.php',
			method:"POST",
			data:{student_id:student_id, action:action},
			dataType:"json",
			success:function(json) {
				jQuery('#create-student').modal('show');
				jQuery('#action').val('update');
				jQuery('#student_id').val(json.id);
				jQuery('#rollno').val(json.roll_no);
				jQuery('#name').val(json.name);
				jQuery('#email').val(json.email);
				jQuery('#gender').val(json.gender);				
				jQuery('#class-name').val(json.class_name);
				jQuery('#birthday').val(json.birthday);
				jQuery('#address').val(json.address);	
				jQuery('.modal-title').html(" Edit Student");
				jQuery('#student-btn').text('Update');
			}
		})
	});

	jQuery(document).on('click', '.display-student', function(){
		var student_id = jQuery(this).data("studentid");
		var action = 'fetch_student';
		jQuery.ajax({
			url:'action.php',
			method:"POST",
			data:{student_id:student_id, action:action},
			dataType:"json",
			success:function(json){
				jQuery('#view-student').modal('show');
				jQuery('#vs-rollno').text(json.roll_no);
				jQuery('#vs-name').text(json.name);
				jQuery('#vs-email').text(json.email);
				jQuery('#vs-gender').text(json.gender);				
				jQuery('#vs-class-name').text(json.class_name);
				jQuery('#vs-birthday').text(json.birthday);
				jQuery('#vs-address').text(json.address);
			}
		})
	});

	// create/update 
	jQuery(document).on('click','button#student-btn', function(e){
		e.preventDefault();
		var formData = jQuery('form#student-frm').serialize();
		var student_id = jQuery('input#student_id').val();
		if(student_id){
			var action = 'update';
		} else {
			var action = 'create';
		}
		jQuery.ajax({
			url:"action.php",
			method:"POST",
			data:formData,
			dataType:"html",
			 beforeSend: function () {
	            jQuery('button#student-btn').button('loading');
	        },
	        complete: function () {
	            jQuery('button#student-btn').button('reset');
	            jQuery('#student-frm')[0].reset();
	            jQuery('#create-student').modal('hide');
	        }, 
			success:function(html) {		
				if(student_id) {
					jQuery("#record-"+student_id).html(html).fadeIn('slow');
				} else {
					jQuery("#render-student").prepend(html).fadeIn('slow');
				}
			}
		})
	});	

	jQuery(document).on('click', '.remove-student', function(){
		var student_id = jQuery(this).data("studentid");	
		var action = "delete";
		if(confirm("Are you sure you want to delete this student?")) {
			jQuery.ajax({
				url:"action.php",
				method:"POST",
				dataType:"json",
				data:{student_id:student_id, action:action},
				success:function(data) {					
					jQuery("#record-"+student_id).empty('');
				}
			})
		} else {
			return false;
		}
	});	
});