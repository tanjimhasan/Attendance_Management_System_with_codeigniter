
  
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

      <h1>

        Course List
        <small>Courses view</small>

      </h1>

      

    </section>

    <!-- Main content -->
    <section class="content">
      
          <div class="row">

            <div class="col-lg-10 col-lg-offset-1">

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
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">

                    Add Course

                </button>
                
              </div>
              
            </div>

          </div>

          <div class="row">

            <div class="col-lg-10 col-lg-offset-1">
              
              <div class="box">

                <div class="box-header">

                  <h3 class="box-title">Course List</h3>

                </div>


                            <!-- /.box-header -->
                <div class="box-body no-padding">

                  <table id="course_list" class="table table-striped">

                    <tr>

                      <th style="width: 10px">#</th>

                      <th>Course Name</th>

                      <th>Course Code</th>

                      <th>Semester</th>

                      <th>Year</th>

                      <th>Section</th>

                      <th>Action</th>
                      
                    </tr>

                    <?php
                      if ($fetch_data->num_rows()>0) {
                       foreach ($fetch_data->result() as $row) {
                       
                    ?>

                    <tr>

                      <td><?php echo $row->course_id; ?></td>

                      <td><?php echo $row->course_title; ?></td>

                      <td><?php echo $row->course_code; ?></td>

                      <td><?php echo $row->semester; ?></td>

                      <td><?php echo $row->year; ?></td>

                      <td><?php echo $row->section; ?></td>
                      <td>

                        <a href="<?php echo base_url(); ?>index.php/student_list/view_data/<?php echo $row->course_id; ?>" type="button" class="btn btn-block btn-primary">View Students</a>

                        <a href="<?php echo base_url(); ?>index.php/course_list/delete_data/<?php echo $row->course_id; ?>" type="button" class="btn btn-block btn-danger">Delete Course</a>

                      </td>

                    </tr>

                    <?php
                        # code...
                       }
                      }else{?>

                        <tr> 

                          <td colspan="5">No Data Found</td> 

                        </tr> 
                      <?php  
                          }
                      ?>
                  </table>

                </div>
                <!-- /.box-body -->
              </div>

            </div>

          </div>



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
                    <form role="form" method="post" action="<?php echo base_url(); ?>index.php/course_list/form_validation">

                      <div class="box-body">

                        <div class="form-group">

                          <label>Course Title</label>

                          <input name="course_title" type="text" class="form-control" placeholder="Enter Course Title ...">

                        </div>
                        <div class="form-group">

                          <label>Course Code</label>
                          <input name="course_code" type="text" class="form-control" placeholder="Enter Course Code ...">

                        </div>
                        <div class="form-group">

                          <select name="semester" class="form-control select2" style="width: 100%;">
                            <option selected="selected">Select Semester</option>
                            <option>Spring</option>
                            <option>Summer</option>
                            <option>Fall</option>
                          </select>

                        </div>
                        <div class="form-group">

                          <select name="year" class="form-control select2" style="width: 100%;">
                            <option selected="selected">Select Year</option>
                            <option>2018</option>
                            <option>2017</option>
                            <option>2016</option>
                            <option>2015</option>
                            <option>2014</option>
                          </select>

                        </div>
                        <div class="form-group">

                          <select name="section" class="form-control select2" style="width: 100%;">
                            <option selected="selected">Select Section</option>
                            <option>A</option>
                            <option>B</option>
                            <option>C</option>
                            <option>D</option>
                            <option>E</option>
                            <option>F</option>
                            <option>G</option>
                          </select>

                        </div>
                      </div>

                      <div class="modal-footer">

                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <input name="insert" type="submit" class="btn btn-primary" value="Submit"/>
                      </div>

                    </form>
                      <!-- /.box-body -->

                    
                  </div>
                  <!-- /.box -->
                </div>
              


            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
          <!-- /.box -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
