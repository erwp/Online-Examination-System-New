<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url('vendor/almasaeed2010/adminlte/'); ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url('vendor/almasaeed2010/adminlte/'); ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url('vendor/almasaeed2010/adminlte/'); ?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<?php
// echo "<pre>"; 
// //$data['exams']
// print_r($exams);
// echo "</pre>"
?>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Examination List</h3>
            <a href="<?php echo base_url('admin/exam/create'); ?>" class="col-sm-2 btn btn-info float-right">Add Exam</a>

          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="datatable1 table table-bordered table-striped">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Exam Name</th>
                  <th>Reg Start</th>
                  <th>Reg End</th>
                  <th>Exam Start</th>
                  <th>Exam End</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($exams)) {
                  $sl = 0;
                  foreach ($exams as $exam) {
                    $sl++; ?>
                    <tr>
                      <td><?php echo $sl ?></td>
                      <td><?php echo $exam->e_name ?></td>
                      <td><?php echo date("Y-M-d h:m:sa", strtotime($exam->e_reg_start)); ?></td>
                      <td><?php echo date("Y-M-d h:m:sa", strtotime($exam->e_reg_end)); ?></td>
                      <td><?php echo date("Y-M-d h:m:sa", strtotime($exam->e_exam_start)); ?></td>
                      <td><?php echo date("Y-M-d h:m:sa", strtotime($exam->e_exam_end)); ?></td>
                      <td><?php echo $exam->e_status ?></td>
                      <td class="text-center" width="100">
                        <a href="<?php echo base_url("admin/exam/edit/$exam->e_id") ?>" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
                        <a href="<?php echo base_url("admin/exam/delete/$exam->e_id/") ?>" class="btn btn-xs btn-danger" onclick="return confirm('Are You Sure') "><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                <?php  }
                } ?>

              </tbody>
              <tfoot>
                <tr>
                  <th>S.No</th>
                  <th>Exam Name</th>
                  <th>Reg Start</th>
                  <th>Reg End</th>
                  <th>Exam Start</th>
                  <th>Exam End</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>


<!-- jQuery -->
<script src="<?php echo base_url('vendor/almasaeed2010/adminlte/'); ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('vendor/almasaeed2010/adminlte/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url('vendor/almasaeed2010/adminlte/'); ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('vendor/almasaeed2010/adminlte/'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url('vendor/almasaeed2010/adminlte/'); ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url('vendor/almasaeed2010/adminlte/'); ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url('vendor/almasaeed2010/adminlte/'); ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url('vendor/almasaeed2010/adminlte/'); ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url('vendor/almasaeed2010/adminlte/'); ?>plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url('vendor/almasaeed2010/adminlte/'); ?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url('vendor/almasaeed2010/adminlte/'); ?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url('vendor/almasaeed2010/adminlte/'); ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url('vendor/almasaeed2010/adminlte/'); ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url('vendor/almasaeed2010/adminlte/'); ?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
  $(function() {
    $.noConflict();

    $(".datatable1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>