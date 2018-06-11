  <?php
    defined('BASEPATH') OR exit('No direct script access allowed');
  ?>

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        
        <div class="input-group">

          <input type="text" name="q" class="form-control" placeholder="Search...">

          <span class="input-group-btn">

                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>

                </button>

              </span>

        </div>

      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">

        <li><a href="<?php echo base_url('index.php/Welcome'); ?>"><i class="fa fa-circle-o text-red"></i> <span>Home</span></a></li>
        
        <li><a href="<?php echo base_url('index.php/course_list'); ?>"><i class="fa fa-circle-o text-yellow"></i> <span>Course</span></a></li>
      </ul>

    </section>
    <!-- /.sidebar -->
  </aside>