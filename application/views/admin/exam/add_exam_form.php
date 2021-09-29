<!-- daterange picker -->
<link rel="stylesheet" href="<?php echo base_url('vendor/almasaeed2010/adminlte/'); ?>plugins/daterangepicker/daterangepicker.css">

<style>
  div>span.badge.bg-danger.p-1 {
    width: 100%;
  }
</style>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- Horizontal form elements -->
        <div class="card card-outline card-primary">
          <div class="card-header">
            <h3 class="card-title">Add Exam</h3>
            <a href="<?php echo base_url('admin/exam/index'); ?>" class="col-sm-2 btn btn-info btn-sm float-right">View Exam</a>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form class="form-horizontal" action="<?php echo base_url('admin/exam/create') ?>" method="post">
            <div class="card-body">
              <?php echo form_hidden('e_id', $input->e_id) ?>
              <div class="row">
                <!-- Exam Name -->
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="exam_name">Exam Name</label>
                    <input type="text" class="form-control" id="exam_name" name="exam_name" placeholder="Exam Name" value="<?php echo $input->e_name; ?>">
                    <?php echo form_error('exam_name', '<span class="badge bg-danger p-1">', '</span>'); ?>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Reg Date Start:</label>
                    <div class="input-group date initdatetime" id="reg_start_date" data-target-input="nearest">
                      <input type="text" class="form-control datetimepicker-input " data-target="#reg_start_date" name="reg_start_date" value="<?php echo $input->e_reg_start ?>" readonly>
                      <div class="input-group-append" data-target="#reg_start_date" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>
                    <?php echo form_error('reg_start_date', '<span class="badge bg-danger p-1">', '</span>'); ?>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Reg End Date:</label>
                    <div class="input-group date initdatetime" id="reg_end_date" data-target-input="nearest">
                      <input type="text" class="form-control datetimepicker-input" data-target="#reg_end_date" name="reg_end_date" value="<?php $input->e_reg_end ?>">
                      <div class="input-group-append" data-target="#reg_end_date" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>
                    <?php echo form_error('reg_end_date', '<span class="badge bg-danger p-1">', '</span>'); ?>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Examination Start Date:</label>
                    <div class="input-group date initdatetime" id="exam_start_date" data-target-input="nearest">
                      <input type="text" class="form-control datetimepicker-input" data-target="#exam_start_date" name="exam_start_date" value="<?php echo isset($input->e_exam_start) ? $input->e_exam_start : date('Y-m-d H:m A'); ?>">
                      <div class="input-group-append" data-target="#exam_start_date" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>
                    <?php echo form_error('exam_start_date', '<span class="badge bg-danger p-1">', '</span>'); ?>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Examination End Date:</label>
                    <div class="input-group date initdatetime" id="exam_end_date" data-target-input="nearest">
                      <input type="text" class="form-control datetimepicker-input" data-target="#exam_end_date" name="exam_end_date" value="<?php echo isset($input->e_exam_end) ? $input->e_exam_end : date('Y-m-d H:m A'); ?>">
                      <div class="input-group-append" data-target="#exam_end_date" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>
                    <?php echo form_error('exam_end_date', '<span class="badge bg-danger p-1">', '</span>'); ?>
                  </div>
                </div>
              </div>
            </div>

            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="col-sm-3 btn btn-info float-right">Save</button>
            </div>
            <!-- /.card-footer -->
          </form>
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

<!-- date-range-picker -->
<script src="<?php echo base_url('vendor/almasaeed2010/adminlte/'); ?>plugins/daterangepicker/daterangepicker.js"></script>

<script>
  $(function() {

    //Date and time picker
    $('.initdatetime').datetimepicker({
      icons: {
        time: 'far fa-clock'
      },
      format: 'YYYY-MM-DD HH:mm'
    });

    //$('.initdatetime').data('datetimepicker').date(new Date())
    //$.noConflict();
    //Date and time picker
    //$('#reg_start_date').datetimepicker(
    //   {
    //   icons: {
    //     time: 'far fa-clock'
    //   }
    // }
    //  );
    //  $('#reg_start_date ').datetimepicker({
    //   icons: {
    //     time: 'far fa-clock'
    //   },
    //   format: 'YYYY-MM-DD HH:mm A'
    // });
    // $('#reg_end_date ').datetimepicker({
    //   icons: {
    //     time: 'far fa-clock'
    //   }
    // });
    // $('#exam_start_date ').datetimepicker({
    //   icons: {
    //     time: 'far fa-clock'
    //   }
    // });
    // $('#exam_end_date ').datetimepicker({
    //   icons: {
    //     time: 'far fa-clock'
    //   }
    // });

  });
</script>