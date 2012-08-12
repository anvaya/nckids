<?php use_helper('jQuery'); ?>
<?php echo jq_form_remote_tag(array(
 'url'      => 'employee/emailExpirationNotice',
 'update'   => 'send_result'
)) ?>
  <div id="send_result" style="text-align:right;padding: 10px 0;">
    <a href="" id="select_all" style="margin-right:30px">Select All</a>
    <input type="submit" value="Send Notices" />
  </div>
  <table width="100%" id="report_table">
    <thead>
     <tr>
       <th class="capt" colspan="<?php echo count($columns)+1 ?>">Expired Employees</th>
     </tr>
      <tr>
        <th style="text-align:left;padding-left:30px;">Employee</th>
        <?php foreach($columns as $column): ?>
          <th><?php echo ReportExpirationForm::$choices[$column] ?></th>
        <?php endforeach; ?>
      </tr>
    </thead>
    <tbody>
    <?php foreach($employees as $employee): ?>
      <tr>
        <td style="text-align:left;padding-left:30px;"><?php echo $employee->getFullName() ?></td>
        <?php foreach($columns as $column): ?>
          <?php $column_getter = 'get'.sfInflector::camelize($column);
                $note_getter = str_replace('Date', 'Notes', $column_getter);
          ?>
          <td><?php echo $employee->$column_getter(sfConfig::get('app_settings_date_format', 'm/d/Y')) ?>
          <?php if($column_getter != $note_getter && method_exists('Employee', $note_getter) && $employee->$note_getter() != "") echo '<a title="'.$employee->$note_getter().'" class="hasNotes">&nbsp;</a>'; ?>
          <?php if($employee->$column_getter('U') && $date > $employee->$column_getter('U') && ($column == 'tb_date' || $column == 'physical_date')): ?>
            <input class="selectable" type="checkbox" name="expired[<?php echo $employee->getId() ?>][<?php echo $column ?>]" value="<?php echo $employee->$column_getter(sfConfig::get('app_settings_date_format', 'm/d/Y')) ?>" />
          <?php endif; ?>
          </td>
        <?php endforeach; ?>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</form>

<script type="text/javascript">
  $(document).ready(function(){
    $('#select_all').click(function(){
      $('#report_table .selectable').click();
      return false;
    });
  });
</script>