<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<form action="<?php echo url_for('areaOfConcern/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields() ?>
          &nbsp;<a href="<?php echo url_for('areaOfConcern/index') ?>">Cancel</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'areaOfConcern/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['job_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['job_id']->renderError() ?>
          <?php echo $form['job_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['name']->renderLabel() ?></th>
        <td>
          <?php echo $form['name']->renderError() ?>
          <?php echo $form['name'] ?>
        </td>
      </tr>
    </tbody>
  </table>

 <ul>
    <li>
      <button id="add_objective" type="button">Add Objective</button>
    </li>
  </ul>
  <div id="objectives">
    <?php foreach($form['objectives'] as $key=>$objective_form): ?>
      <?php include_partial('AddObjective', array('form' => $form, 'num' => $key)) ?>
    <?php endforeach; ?>
  </div>
</form>

<script type="text/javascript">
var objectives = <?php print_r($form['objectives']->count())?>;

function addObjective(num) {
  var r = $.ajax({
    type: 'GET',
    url: '<?php echo url_for('areaOfConcern/addObjectiveForm')?>'+'<?php echo   ($form->getObject()->isNew()?'':'?id='.$form->getObject()->getId()).($form->getObject()->isNew()?'?num=':'&num=')?>'+num,
    async: false
  }).responseText;
  return r;
}

$(document).ready(function() {
  $('button#add_objective').click(function() {
    block = addObjective(objectives);
    $("#objectives").prepend(block);
    objectives = objectives + 1;
    return false;
  });


  $('.deleteObjective').live('click', function(){
    container = $($(this).attr('href'));
    $('.deleteField',container).val('1');
    container.fadeOut();
    return false;
  });


});

</script>