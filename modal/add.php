<div class="modal" id="create-student" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <form class="form-horizontal" id="student-frm">
    <input type="hidden" name="action" id="action">    
    <input type="hidden" name="student_id" id="student_id">    
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"> Add Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <input type="text" name="roll_no" class="form-control input-roll-no" id="rollno" aria-describedby="rollnoHelp" placeholder="Roll No" required="required">
        </div>
        <div class="form-group">
            <input type="text" name="name" class="form-control input-name" id="name" aria-describedby="nameHelp" placeholder="Name" required="required">
        </div>
        <div class="form-group">
            <input type="email" name="email" class="form-control input-email" id="email" aria-describedby="emailHelp" placeholder="Email" required="required">
        </div>
        <div class="form-group">
            <div class="form-group">
            <input type="text" name="gender" class="form-control input-gender" id="gender" aria-describedby="genderHelp" placeholder="Gender" required="required">
        </div>
        </div>
        <div class="form-group">
            <input type="text" name="address" class="form-control input-address" id="address" aria-describedby="addressHelp" placeholder="Address" required="required">
        </div>
        <div class="form-group">
            <div class="form-group">
            <input type="text" name="class_name" class="form-control input-class" id="class-name" aria-describedby="classHelp" placeholder="Class" required="required">
        </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="student-btn">Add</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
    </form>
  </div>
</div>