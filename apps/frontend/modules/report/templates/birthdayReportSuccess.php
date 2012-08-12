<table width="100%" class="rowstylehover-rowHover rowselect-selected">
<thead>
  <tr>
    <th colspan="5" class="capt">Birthdays in <?php echo $month_name ?></th>
  </tr>
<tr>
  <th>Employee</th>
  <th>Address</th>
  <th>Birthday</th>
</tr>
</thead>
  <?php foreach($employees as $employee): ?>
    <tr>
      <td><a href="<?php echo url_for('@employee_edit?id='.$employee->getId()) ?>"><?php echo $employee->getFullName() ?></a></td>
      <td><?php echo nl2br($employee->getMailingAddress()) ?></td>
      <td><?php echo $employee->getDob(sfConfig::get('app_settings_date_format', 'm/d/Y')) ?></td>
    </tr>
  <?php endforeach; ?>
</table>
