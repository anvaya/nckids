<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>
<?php
if ($form->hasErrors())
{
        $errors = $form->getGlobalErrors();
        if ($form->hasGlobalErrors())
        {
                $msg = '';
                $msg .= 'You forgot to include some information:<br />';
                foreach ($errors as $name => $error)
                {
                        $msg .= sprintf('&#149; %s: %s<br />', $name, $error);
                }
                echo $msg;
        }
        else
        {
                $msg = 'You forgot to include some information:';
                foreach ($form->getWidgetSchema()->getPositions() as $widget_name)
                {
                        if ($form[$widget_name]->hasError())
                        {
                                $msg .= "<br />&nbsp;&nbsp;&nbsp;&#149; <strong>".$form->getWidget($widget_name)->getLabel().":</strong> ".$form[$widget_name]->getError();
                        }
                }

                echo $msg;
        }
}
?>

<?php echo $form->renderGlobalErrors() ?>

<form action="<?php echo url_for('entry/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table width="100%" class="entry_form">
    <tbody>
      <tr>
        <td>
          <?php echo $form['client_service_id']->renderLabel() ?>
          <?php echo $form['client_service_id']->renderError() ?>
          <?php echo $form['client_service_id'] ?>
        </td>        
        <td>
          <?php echo $form['office_id']->renderLabel() ?>
          <span id="entry_location"><?php echo $form->getObject()->getOffice() ?>&nbsp;</span>
        </td>        
        <td>
          <?php echo $form['frequency_id']->renderLabel() ?>
          <span id="entry_frequency"><?php echo $form->getObject()->getFrequency() ?>&nbsp;</span>
        </td>
      </tr>
      <tr>
        <td>
          <?php echo $form['service_date']->renderLabel() ?>
            <span style="color:#A0A0A0;">mm/dd/yyyy</span>
          <?php echo $form['service_date']->renderError() ?>
          <?php echo $form['service_date']->render(array('style' => 'width:100px')) ?>
        </td>

        <td>
          <?php echo $form['time_in']->renderLabel() ?>
            <span style="color:#A0A0A0;">hh:mm</span>
          <?php echo $form['time_in']->renderError() ?>
          <?php echo $form['time_in']->render(array('style' => 'width:70px')) ?>
        </td>
        <td>
          <?php echo $form['time_out']->renderLabel() ?>
            <span style="color:#A0A0A0;">hh:mm</span>
          <?php echo $form['time_out']->renderError() ?>
          <?php echo $form['time_out']->render(array('style' => 'width:70px')) ?>
        </td>
      </tr>
      <tr>
        <td><?php echo $form['cpt_code']->renderLabel() ?>
          <?php echo $form['cpt_code']->renderError() ?>
          <?php echo $form['cpt_code'] ?>
        </td>

        <td><?php echo $form['units']->renderLabel() ?>
          <?php echo $form['units']->renderError() ?>
          <?php echo $form['units']->render(array('style' => 'width:100px')) ?>
        </td>

        <td><?php echo $form['absent']->renderLabel() ?>
          <?php echo $form['absent']->renderError() ?>
          <?php echo $form['absent'] ?>
        </td>
      </tr>
      <tr>
        <td width="400px"><?php echo $form['comments']->renderLabel() ?>
          <?php echo $form['comments']->renderError() ?>
          <?php echo $form['comments'] ?>
        </td>
        <td colspan="2"><?php echo $form['note_entry_kids_list']->renderLabel() ?>
          <?php echo $form['note_entry_kids_list']->renderError() ?>
          <?php echo $form['note_entry_kids_list'] ?>
        </td>
      </tr>
    </tbody>
  </table>




  <div id="aoc_section">
    <h2>Areas of Concern</h2>
    <div id="addButton">
      <a href="#" id="add_concern"><img src="/images/icons/plus.png" alt="Add Area of Concern" /> Add Area of Concern</a>
    </div>
    <div id="concerns">
    <?php foreach($form['entry_concerns'] as $key=>$concern_form): ?>
      <?php include_partial('AddConcern', array('form' => $form, 'num' => $key)) ?>
    <?php endforeach; ?>
    </div>
  </div>

<br /><br /><br /><br /><br />
          <?php echo $form->renderHiddenFields() ?>
          &nbsp;<a href="<?php echo url_for('entry/index') ?>">Cancel</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'entry/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
</form>

<script type="text/javascript">
var contacts = <?php print_r($form['entry_concerns']->count())?>;

function addConcern(num) {
  var r = $.ajax({
    type: 'GET',
    url: '<?php echo url_for('entry/addConcernForm')?><?php echo   ($form->getObject()->isNew()?'':'?id='.$form->getObject()->getId()).($form->getObject()->isNew()?'?num=':'&num=')?>'+num,
    async: false
  }).responseText;
  return r;
}

$(document).ready(function() {
  $('a#add_concern').click(function() {
    block = addConcern(contacts);
    $("#concerns").prepend(block);
    contacts = contacts + 1;
    return false;
  });


  $('.deleteConcern').live('click', function(){
    container = $($(this).attr('href'));
    $('.deleteField',container).val('1');
    container.fadeOut();
    return false;
  });


  // fetch client service details when selecting client service
  $('#note_entry_client_service_id').change(function(){
    // do ajax request to get orgs under this program
    $.getJSON("<?php echo url_for('entry/ajaxFillClient')?>",{id: $(this).val(), ajax: 'true'}, function(j){
      for (var i = 0; i < j.length; i++) {
        $('#'+j[i].id).html(j[i].value);
      }
    });
  });

  // fetch objectives for aoc selection
  $('body').delegate(".concernSelector","change", function() {
    $.getJSON("<?php echo url_for('entry/ajaxGetObjectives')?>",{id: $(this).val(), target: $(this).attr('rel'), ajax: 'true'}, function(j){

      var select = $('#'+j.target);
      var options = select.attr('options');
      $('option', select).remove();

      $.each(j.options, function(index, val) {
          options[options.length] = new Option(val.short_name, val.id);
      });


    });
  });

});

</script>