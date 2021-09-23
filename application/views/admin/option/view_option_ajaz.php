<?php
// echo "<pre>";
//  $data['questions']
// print_r($options);
// echo "</pre>"
?>

<table id="example1" class="datatable1 table table-bordered table-striped">
  <thead>
    <tr>
      <th>S.No</th>
      <th>Option</th>
      <th>Correct</th>
      <!-- <th>Action</th> -->
    </tr>
  </thead>
  <tbody>
    <?php if (!empty($options)) {
      $sl = 0;
      foreach ($options as $option) {
        $sl++; ?>
        <tr>
          <td><?php echo $sl ?></td>
          <td><?php echo $option->o_value ?></td>
          <td><?php echo $option->o_correct ?></td>
        </tr>
    <?php  }
    } else {
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              No options defined yet!, Please add the some options
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
    } ?>

  </tbody>
  <tfoot>
    <tr>
      <th>S.No</th>
      <th>Option</th>
      <th>Correct</th>
      <!-- <th>Action</th> -->
    </tr>
  </tfoot>
</table>