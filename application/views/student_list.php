
  
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

      <h1>

        Student List
        <small>Students view</small>

      </h1>

    </section>

    <!-- Main content -->
    <section class="content">

      <?php
        if ($fetch_course_data->num_rows()>0) {
         foreach ($fetch_course_data->result() as $semester_row) {
           // $course_id = $semester_row->course_id;
      ?>
      <div class="row text-center">
        <div class="col-lg-4">
          <div class="box">

            <div class="box-body">
              <h2><strong>Semester</strong>:<?php echo $semester_row->semester; ?></h2>
            </div>

          </div>
          
        </div>
        <div class="col-lg-4">
          <div class="box">

            <div class="box-body">
              <h2><strong>Year</strong>:<?php echo $semester_row->year; ?></h2>
            </div>

          </div>
          
        </div>
        <div class="col-lg-4">
          <div class="box">

            <div class="box-body">
              <h2><strong>Section</strong>:<?php echo $semester_row->section; ?></h2>
            </div>

          </div>
          
        </div>
      </div>

      <?php
          # code...
         }
        }else{?>

          <div class="col-lg-4">
            <div class="box">
              <div class="box-body">

                <h2>There Should Be An Error Occured.Please contact with Administrator.</h2>
              </div>

            </div>
        </div> 
        <?php  }
      ?>

      <div class="box-body">
            <?php
              if ($this->session->flashdata('success')) {
            ?>
            <div class="callout callout-success" id="deletemessage">
                <h4>Success Message</h4>

                <p>Courses are successfully added</p>
            </div>
            <?php }if ($this->session->flashdata('error')) {
              
            ?>
            <div class="callout callout-danger" id="deletemessage">
                <h4>Error Message</h4>

                <p>Any Field Must not be Empty</p>
            </div>
            <?php }?> 
      </div>
      <div class="row">
        <div class="col-lg-3 col-lg-offset-1">

          <div class="box-body">
            <a type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                Take Attendance
            </a>
          </div>

        </div>
        <div class="col-lg-3 col-lg-offset-1">

          <div class="box-body">
            <a  type="button" class="btn btn-primary"  data-toggle="modal" data-target="#modal-add-student">
                Add Student
            </a>
          </div>

        </div>

        <?php
        if ($fetch_course_data->num_rows()>0) {
         foreach ($fetch_course_data->result() as $semester_row) {
           $course_id = $semester_row->course_id;
            }
           }

      ?>
        <div class="col-lg-3 col-lg-offset-1">

          <div class="box-body">
            <a href="<?php echo base_url(); ?>index.php/attendance/show_attendance/<?php echo $course_id; ?>" type="button" class="btn btn-info">
                Show Attendance
            </a>
          </div>

        </div>
      </div>
      <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
          
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Student Name</th>
                  <th>Student Id</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                <?php
                if ($fetch_student_data->num_rows()>0) {
                 foreach ($fetch_student_data->result() as $row) {
                   
                ?>
                <tr>
                  <td><?php echo $row->student_name; ?></td>
                  <td><?php echo $row->student_id; ?></td>
                  <td><?php echo $row->student_email; ?></td>
                  <td><?php echo $row->student_mobile; ?></td>
                  <td><a href="#" type="button" class="btn btn-danger">Delete</a></td>
                </tr>

                <?php
                    # code...
                   }
                  }else{?>

                    <tr>  
                      <td colspan="5"><h2>No Students Are Enrolled Till Now.</h2></td> 

                    </tr> 
                  <?php  }
                ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Student Name</th>
                  <th>Student Id</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
          <!-- /.box -->
      </div>
      <!-- /.row (main row) -->




       <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Fill Up Course Form</h4>
              </div>
              <div class="modal-body">
                <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Given Course Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="attendance_form" role="form" method="post" action="<?php echo base_url(); ?>index.php/student_list/insert_attendance">
              <div class="box-body">
                <div class="form-group">
                <label>Date:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input name="selected_date" type="text" class="form-control pull-right" id="datepicker" required="">
                </div>
                <!-- /.input group -->
              </div>
                <table class="table table-striped">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Student Name</th>
                  <th>Student Id</th>
                  <th>Attendance</th>
                  <th></th>
                  
                </tr>
                
                <?php
                if ($fetch_student_data->num_rows()>0) {
                  $i= 0;
                 foreach ($fetch_student_data->result() as $row) {
                      $i++;
                ?>

                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $row->student_name; ?></td>
                  <td><?php echo $row->student_id; ?></td>
                  <td>
                    <label>
                      <input type="hidden" name="stu_track_id[<?php echo $row->student_id; ?>]" value="<?php echo $row->stu_track_id; ?>">
                      <input type="radio" name="attend[<?php echo $row->student_id; ?>]" value="present" class="flat-red">Present
                      <input name="course_id" type="hidden" value="<?php 
                    if ($fetch_course_data->num_rows()>0) {
                      foreach ($fetch_course_data->result() as $semester_row) {
                          echo $semester_row->course_id;
                        }
                      }  
                  ?>">
                    </label>
                  </td>
                  <td>
                    <label>
                      <input type="radio" name="attend[<?php echo $row->student_id; ?>]" value="absent" class="flat-red">Absent
                    </label>
                  </td>
                  
                  
                </tr> 
                <?php
                    
                   }
                  }else{?>

                    <tr>  
                      <td colspan="5"><h2>No Students Are Enrolled Till Now.</h2></td> 

                    </tr> 
                  <?php  }
                ?>
              </table>
              </div>
              <!-- /.box-body -->

            
          </div>
          <!-- /.box -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>



      <!-- /.row (main row) -->
       <div class="modal fade" id="modal-add-student">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Fill Up Course Form</h4>
              </div>
              <div class="modal-body">
                <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Given Course Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="<?php echo base_url(); ?>index.php/student_list/form_validation">
              <div class="box-body">
                <div class="form-group">
                  <label>Student Name</label>
                  <input name="student_name" type="text" class="form-control" placeholder="Enter Student Name ...">
                </div>
                <div class="form-group">
                  <label>Student Id</label>
                  <input name="student_id" type="text" class="form-control" placeholder="Enter Student Id ...">
                  <input name="course_id" type="hidden" value="<?php 
                    if ($fetch_course_data->num_rows()>0) {
                      foreach ($fetch_course_data->result() as $semester_row) {
                          echo $semester_row->course_id;
                        }
                      }  
                  ?>">
                </div>
                <div class="form-group">
                <label>Student Mobile:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input name="student_mobile" type="text" class="form-control"
                         data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask>
                </div>
                <!-- /.input group -->
              </div>
                <div class="form-group">
                  <label>Student Email</label>
                  <input name="student_email" type="email" class="form-control" placeholder="Enter Student email ...">
                </div>
              </div>
              <!-- /.box-body -->

            
          </div>
          <!-- /.box -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <input name="insert" value="Submit" type="submit" class="btn btn-primary"/>
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
    </section>
    <!-- /.content -->
  </div>
  