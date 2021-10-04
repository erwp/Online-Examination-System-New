<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url('vendor/almasaeed2010/adminlte/'); ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url('vendor/almasaeed2010/adminlte/'); ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url('vendor/almasaeed2010/adminlte/'); ?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<?php
// echo "<pre>";
//$data['questions']
//print_r($questions);
// echo "</pre>"
?>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- Filter and Add Question form  -->
      <div class="col-md-12">
        <div class="rrow">
          <div class="ccol-md-4">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Filter By Exam</h3>
              </div>

              <div class="card-body">
                <form action="<?php echo base_url('admin/response/index'); ?>" method="post">
                  <div class="row">

                    <div class="col-sm-5">
                      <div class="form-group">
                        <label for="r_e_id">Select exam</label>
                        <?php echo form_dropdown('r_e_id', $exam_list, $exam_id, 'class="form-control" id="r_e_id" '); ?>
                        <?php echo form_error('r_e_id', '<span class="badge bg-danger p-1 text-center text-xs"> ', '</span>'); ?>
                      </div>
                    </div>
                    <div class="col-sm-5">
                      <div class="form-group">
                        <label for="r_u_id">Select Student</label>
                        <?php echo form_dropdown('r_u_id', $student_list, $student_id, 'class="form-control" id="r_u_id" '); ?>
                        <?php echo form_error('r_u_id', '<span class="badge bg-danger p-1 text-center text-xs"> ', '</span>'); ?>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label for="search_question">Filter</label>
                        <button type="submit" class="d-block col-sm-12 btn btn-info" name="search_question" value="1">Search</button>
                      </div>
                    </div>
                  </div>

                </form>
              </div>
              <!-- /.card-header -->

            </div>
          </div>

        </div>
        <!-- </div> -->
      </div>
      <!-- Right Column Question List -->
    </div>
    <?php if (isset($input->r_e_id) && !empty($input->r_e_id)) { ?>
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-danger card-outline">
            <div class="card-header">
              <h3 class="card-title">Response Chart</h3>

              <!-- <a href="< ?php echo base_url('admin/question/create'); ?>" class="col-sm-2 btn btn-info float-right">Add Question</a> -->

            </div>
            <div class="card-body">
              <table id="example1" class="datatable1 table table-bordered table-striped">

                <?php include_once('response_body_view1.php'); ?>

              </table>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
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
    var new_row = $("#options_div > div:last").clone();
    $(new_row[0]).find('[name^="options[o_value]"]').val('');
    $(new_row[0]).find('[name^="options[o_correct]"]').val(row_count - 1);
    $(new_row[0]).find('[name^="options[o_correct]"]').prop("checked", false)
    // console.log(new_row);

    $("#options_div").append(new_row);

    //$("#options_div").append('');
  }

  function remove_more(current) {

    if ($("#options_div > div").length > 2) {
      $(current.closest(".row")).remove();
      var row_count = $("#row_count").val();
      row_count--;
      $("#row_count").val(row_count);
    }
  }
</script>