<thead>
  <tr>
    <th>Student Name</th>
    <th>Question Title</th>
    <th colspan="6">Options</th>
  </tr>
</thead>

<tbody>
  <?php if (!empty($responses)) {
    $st = 0;
    foreach ($responses as $student_id => $response) {
      $st++;
      $sl = 0;
      foreach ($response as $question_id => $question) {
        if ($question_id == 'options_total_count') continue;
        $sl++;
        $slc = 0;
        foreach ($question['options'] as $option) {
          $slc++; ?>
          <tr>
            <!-- Student Name-->
            <td><?php echo $student_list[$student_id] ?></td>
            <!-- Question -->
            <td> <?php echo $question['q_question'] ?></td>
            <!--  -->
            <td><?php echo $slc ?></td>
            <td><?php echo $option['o_value'] ?></td>
            <?php if ($option['o_correct']) { ?>
              <td class="bg-info text-center" width="10px"><i class="fa fa-check"></i></td>
            <?php } else { ?>
              <td class="bg-warning text-center" width="10px"><i class="fa fa-times"></i></td>
            <?php } ?>

            <?php if ($option['o_id'] == $question['chosen']['r_o_id'] && $option['o_correct']) { ?>
              <td class="bg-success text-center" width="10px"><i class="fa  fa-check "></i></td>
            <?php } else { ?>
              <td></td>
            <?php } ?>


            <td class="text-center"><?php echo ($question['attempted']) ? '<i class="fa  fa-check"></i>' : '<i class="fa  fa-times"></i> '; ?></td>
            <td class="text-center"><?php echo ($question['correct']) ? '<i class="fa  fa-check"></i>' : '<i class="fa  fa-times"></i> '; ?></td>
          </tr>
  <?php }
      }
    }
  }
  ?>

</tbody>