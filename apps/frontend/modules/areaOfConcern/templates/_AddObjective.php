<div class="objectiveContainer" id="objectiveContainer_<?php echo $num ?>">
  <div id="objective_<?php echo $num ?>" class="objectiveRow">
    <a class="deleteObjective" style="float:right;height:1.5em;line-height:1.5em;padding:0;" href="#objectiveContainer_<?php echo $num ?>"><img src="/images/icons/delete.png" alt="delete" /></a>
  </div>
  <div>
    <ul class="normal_list">
      <li class="form_row<?php echo ($form['objectives'][$num]['short_name']->hasError())?' form_row_error':'' ?>">
        <?php echo $form['objectives'][$num]['short_name']->renderLabel() ?>
        <?php echo $form['objectives'][$num]['short_name']->renderError() ?>
        <?php echo $form['objectives'][$num]['short_name']->render() ?>
      </li>
      <li class="form_row<?php echo ($form['objectives'][$num]['long_name']->hasError())?' form_row_error':'' ?>">
        <?php echo $form['objectives'][$num]['long_name']->renderLabel() ?>
        <?php echo $form['objectives'][$num]['long_name']->renderError() ?>
        <?php echo $form['objectives'][$num]['long_name']->render() ?>
      </li>
    </ul>
    <?php echo $form['objectives'][$num]['delete']->render(array('class' => 'deleteField')) ?>
    <?php echo $form['objectives'][$num]['id'] ?>
  </div>
</div>