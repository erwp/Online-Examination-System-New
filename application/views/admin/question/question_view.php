<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url('vendor/almasaeed2010/adminlte/'); ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url('vendor/almasaeed2010/adminlte/'); ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url('vendor/almasaeed2010/adminlte/'); ?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<?php
// echo "<pre>"; 
// //$data['questions']
// print_r($questions);
// echo "</pre>"
?>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
        <!-- general form elements -->
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">Filter By Exam</h3>
          </div>

          <div class="card-body">
            <form action="<?php echo base_url('admin/question/index'); ?>" method="post">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="q_e_id">Select exam</label>
                  <?php echo form_dropdown('q_e_id', $exam_list, $input->q_e_id, 'class="form-control" id="q_e_id" '); ?>
                  <?php echo form_error('q_e_id', '<span class="badge bg-danger p-1 text-center text-xs"> ', '</span>'); ?>
                </div>
              </div>
              <button type="submit" class="col-sm-12 btn btn-info" name="search_question" value="1">Search</button>
            </form>
          </div>
          <!-- /.card-header -->

        </div>

        <!-- If exam is selected then show the form  -->
        <?php if (isset($input->q_e_id) && !empty($input->q_e_id)) { ?>
          <form action="<?php echo base_url('admin/question/index'); ?>" method="post">
            <div class="card card-warning card-outline">
              <div class="card-header">
                <h3 class="card-title">Add Question to <strong><?php echo $exam_list[$input->q_e_id]; ?></strong></h3>
              </div>

              <div class="card-body">
                <input type="hidden" name="q_id" value="<?php echo $input->q_id; ?>">
                <input type="hidden" name="q_e_id" value="<?php echo $input->q_e_id; ?>">
                <!-- Exam Name -->
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="q_question">Question</label>
                    <textarea class="form-control" rows="3" id="q_question" name="q_question" placeholder="Enter question here..."><?php echo $input->q_question; ?></textarea>

                    <?php echo form_error('q_question', '<span class="badge bg-danger p-1">', '</span>'); ?>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn <?php echo ($this->uri->segment(3) == "edit") ? "btn-warning" : "btn-success"; ?> float-right" name="add_question" value="1"><?php echo ($this->uri->segment(3) == "edit") ? "Update" : "Add"; ?></button>
              </div>
              <!-- /.card-header -->

            </div>
          </form>
        <?php } ?>
      </div>

      <!-- left column -->
      <div class="col-md-9">
        <!-- general form elements -->
        <div class="card card-danger card-outline">
          <div class="card-header">
            <h3 class="card-title">Question List</h3>

            <!-- <a href="<?php echo base_url('admin/question/create'); ?>" class="col-sm-2 btn btn-info float-right">Add Question</a> -->

          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="datatable1 table table-bordered table-striped">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Question</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($questions)) {
                  $sl = 0;
                  foreach ($questions as $question) {
                    $sl++; ?>
                    <tr>
                      <td><?php echo $sl ?></td>
                      <td><?php echo $question->q_question ?></td>
                      <td><?php echo $question->q_status ?></td>
                      <td class="text-center" width="100">
                        <!-- Add option model -->
                        <a href="#addModel" class="btn btn-xs btn-warning" data-toggle="tooltip" data-placement="top" title="Add options" data-toggle="modal" data-target="#add_option_model" data-question_id="<?php echo $question->q_id; ?>"><i class="fa fa-plus"></i></a>
                        <!-- <?php echo base_url("admin/question/view_options/$question->q_id") ?> -->

                        <!-- View option modal -->
                        <a href="#Model" class="btn btn-xs btn-info" data-toggle="tooltip" data-placement="top" title="View options" data-toggle="modal" data-target="#view_option_model" data-question_id="<?php echo $question->q_id; ?>">
                          <i class="fa fa-eye"></i>
                        </a>

                        <a href="<?php echo base_url("admin/question/edit/$question->q_id") ?>" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="Edit Question"><i class="fa fa-edit"></i></a>
                        <a href="<?php echo base_url("admin/question/delete/$question->q_id/") ?>" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Delete Question with options" onclick="return confirm('Are You Sure') "><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                <?php  }
                } ?>

              </tbody>
              <tfoot>
                <tr>
                  <th>S.No</th>
                  <th>Question</th>
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
    <!-- Button trigger modal -->
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>

<!-- View Option Modal -->
<div class="modal fade" id="view_option_model" tabindex="-1" role="dialog" aria-labelledby="view_option_modelTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="view_option_modelTitle">Question options</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>

<!-- Add Option modal -->
<div class="modal fade" id="add_option_model">
  <div class="modal-dialog modal-xl">
    <form action="#" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Option</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="card-body">
            <div id="aditional_details">
              <input type="hidden" id="row_count" value="1" />
              <div class="row">
                <!-- Option -->
                <div class="col-sm-5">
                  <div class="form-group">
                    <label><?php echo 'Option'; ?></label>
                    <input name="option[]" class="form-control " type="text" placeholder="<?php echo ('Option') ?>" id="option" value="<?php echo isset($input->option) ? $input->option : null;; ?>" requiredd>
                    <?php echo form_error('option', '<span class="error text-danger text-xs">', '</span>'); ?>
                  </div>
                </div>
                <!-- value -->
                <div class="col-sm-5">
                  <div class="form-group">
                    <label>Check the correct option</label>

                    <input name="correct[]" type="checkbox" class="form-check-input" value="1" id="correct_option">
                    <!-- <label class="form-check-label" for="exampleCheck1">Check me out</label> -->
                  </div>
                </div>

                <div class="col-sm-1">
                  <div class="form-group">
                    <label><?php echo ('add'); ?></label>

                    <button type="button" class="btn btn-block btn-default btn-sm" onclick="add_more()" style="height: 38px;"><i class="fas fa-plus"></i></button>
                  </div>
                </div>

                <div class="col-sm-1">
                  <div class="form-group">
                    <label><?php echo ('remove'); ?></label>

                    <button type="button" class="btn btn-block btn-default btn-sm" onclick="remove_more(this)" style="height: 38px;"><i class="fas fa-times"></i></button>
                  </div>
                </div>
              </div>

            </div>

            <div class="ccard-footer">
              <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
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

    // Handle the model and its contents
    $('a[href$="#Model"]').on("click", function(e) {
      //console.log($(this).data('question_id'));
      $('.modal-body').load('<?php echo base_url('admin/question/fetch_questio_options?q_id='); ?>' + $(this).data('question_id'), function() {
        $('#view_option_model').modal({
          show: true
        });
      });
      // $('#view_option_model').modal('show');
    });

    $('a[href$="#addModel"]').on("click", function(e) {
      console.log($(this).data());
      // $('.modal-body').load('<?php echo base_url('admin/question/fetch_questio_options?q_id='); ?>' + $(this).data('question_id'), function() {
      $('#add_option_model').modal({
        show: true
      });
      // });
      // $('#view_option_model').modal('show');
    });



    $(function() {
      $('[data-toggle="tooltip"]').tooltip()
    })
    $.noConflict();

    $(".datatable1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": [{
          extend: "copy",
          className: "btn btn-sm"
        },
        {
          extend: "csv",
          className: "btn btn-sm"
        },
        {
          extend: "excel",
          className: "btn btn-sm"
        },
        {
          extend: "pdf",
          className: "btn btn-sm"
        },
        {
          extend: "print",
          className: "btn btn-sm"
        },
        {
          extend: "colvis",
          className: "btn btn-sm"
        }
      ]
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


<script>
  // Add multiple option 
  function add_more() {
    var row_count = $("#row_count").val();
    row_count++;
    $("#row_count").val(row_count);
    var new_row = $("#aditional_details > div:last").clone();
    $(new_row[0]).find('[name^="correct"]').val(row_count);
    // console.log(new_row);
    debugger;
    $("#aditional_details").append(new_row);

    //$("#aditional_details").append('');
  }

  function remove_more(current) {
    if ($("#aditional_details > div").length > 1) {
      $(current.closest(".row")).remove();
      var row_count = $("#row_count").val();
      row_count--;
      $("#row_count").val(row_count);
    }
  }
</script>