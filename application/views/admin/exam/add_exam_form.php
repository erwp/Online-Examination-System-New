<!-- daterange picker -->
<link rel="stylesheet" href="<?php echo base_url('vendor/almasaeed2010/adminlte/');?>plugins/daterangepicker/daterangepicker.css">

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- Horizontal form elements -->
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Add Exam</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <div class="card-body">
            <!-- alert message -->
            <?php if ($this->session->flashdata('message') != null) {  ?>
              <div class="alert alert-info alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php echo $this->session->flashdata('message'); $this->session->unset_userdata('message');?>
              </div> 
            <?php } ?>
	
	          <?php if ($this->session->flashdata('exception') != null) {  ?>
	            <div class="alert alert-danger alert-dismissable">
		            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		            <?php echo $this->session->flashdata('exception'); $this->session->unset_userdata('exception');?>
	            </div>
	          <?php } ?>
            <?php if( validation_errors() ) { ?> 
              <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-ban"></i>Alert</h5>
                <?php echo validation_errors();?>
              </div>
            <?php } ?>
            <form class="form-horizontal" action="<?php echo base_url('admin/exam/create')?>" method="post">
              <div class="card-body">
                <div class="form-group row">
                  <label for="exam_name" class="col-sm-2 col-form-label">Exam Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="exam_name" name="exam_name" placeholder="Exam Name" value="<?php echo $input->e_name;?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Reg. start date</label>
                  <!-- data-date="<?php// echo date('Y-m-d H:m:s A')?>" data-date-format="YYYY-DD-mm H:mm:ss A" -->
                    <div class="col-sm-10 input-group date" id="reg_start_date" data-target-input="nearest" >
                        <input type="text" placeholder="Registration start date" value="<?php echo $input->e_reg_start;?>" class="form-control datetimepicker-input" name="reg_start_date" data-target="#reg_start_date">
                        <div class="input-group-append" data-target="#reg_start_date" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Reg. end date</label>
                    <div class="col-sm-10 input-group date" id="reg_end_date" data-target-input="nearest">
                        <input type="text" placeholder="Registration end date" value="<?php echo $input->e_reg_end;?>" class="form-control datetimepicker-input" name="reg_end_date" data-target="#reg_end_date">
                        <div class="input-group-append" data-target="#reg_end_date" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Exam start date</label>
                    <div class="col-sm-10 input-group date" id="exam_start_date" data-target-input="nearest">
                        <input type="text" placeholder="Examination start date" value="<?php echo $input->e_exam_start;?>" class="form-control datetimepicker-input" name="exam_start_date" data-target="#exam_start_date">
                        <div class="input-group-append" data-target="#exam_start_date" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Exam Date End</label>
                    <div class="col-sm-10 input-group date" id="exam_end_date" data-target-input="nearest">
                        <input type="text" placeholder="Examination end date" value="<?php echo $input->e_exam_end;?>" class="form-control datetimepicker-input" name="exam_end_date" data-target="#exam_end_date">
                        <div class="input-group-append" data-target="#exam_end_date" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
              </div>

              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-info float-right">Save</button>
              </div>
              <!-- /.card-footer -->
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>

<!-- jQuery -->
<script src="<?php echo base_url('vendor/almasaeed2010/adminlte/');?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('vendor/almasaeed2010/adminlte/');?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- date-range-picker -->
<script src="<?php echo base_url('vendor/almasaeed2010/adminlte/');?>plugins/daterangepicker/daterangepicker.js"></script>

<script>
  $(function () {
    //$.noConflict();
  //Date and time picker
    $('#reg_start_date ').datetimepicker({ icons: { time: 'far fa-clock' } });
    $('#reg_end_date ').datetimepicker({ icons: { time: 'far fa-clock' } });
    $('#exam_start_date ').datetimepicker({ icons: { time: 'far fa-clock' } });
    $('#exam_end_date ').datetimepicker({ icons: { time: 'far fa-clock' } });

  });
  </script>