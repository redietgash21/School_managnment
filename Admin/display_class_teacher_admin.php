<?php
session_start();
include "isauth.php";
 include "connection.php";
 
 ?>
<!DOCTYPE html>
<html lang="en">


<!-- advance-table.html  21 Nov 2019 03:55:20 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>School Management System</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/bundles/datatables/datatables.min.css">
  <link rel="stylesheet" href="assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>

<body>
  

   <!-----------------------------new one ----------------------------------->
   <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <?php include "navbar_admin.php";?>
        <?php include "sidebar_admin.php";?>
    
      </div>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Display Class Teacher</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                        <thead>
                          <tr>
                          <th>Sr No</th>
                          <th>Full Name</th>
                          <th>Class Teacher</th>
                          <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                             
                              $displayquery="SELECT t1.*,t2.*,t3.* from class_teacher as t1 LEFT join class as t2 on t1.class_id=t2.class_id left join teacher as t3 on t1.teacher_id=t3.teacher_id";
                              $result = mysqli_query($conn,$displayquery);
                              if(mysqli_num_rows($result) > 0){
                               $number=1;
                                 while ($row=mysqli_fetch_array($result)) {
                                  
            
                          ?>
                          <tr>
                          <td><?php echo $number;?></td>
                          <td><?php echo $row['t_f_name']." ".$row['t_l_name'];?></td>
                          <td><?php echo $row['class']?></td>
                          <td><?php echo "<a href='update_class_teacher_admin.php?id=".$row['class_teacher_id']."'><i class='fas fa-edit'></i></a>"?>
                         
                          </tr>
                        
                          <?php $number++; }  }?>
                     
                  
                         
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      
    </div>
  </div>

    <!-----------------------------new one ----------------------------------->
  <?php include "footer_admin.php";?>