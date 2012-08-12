<h1>Inactive Employees</h1>

<table style="width:100%;">
  <thead>
    <th>Employee Name</th>
    <th>Termination Date</th>
  </thead>
  <tbody>
<?php foreach($employees as $employee): ?>
  <tr>
    <td><a href="<?php echo url_for('@employee_edit?id='.$employee->getId()) ?>"><?php echo $employee->getFullName() ?></a></td>
    <td><?php echo $employee->getDof(sfConfig::get('app_settings_date_format', 'm/d/Y')) ?></td>
  </tr>
<?php endforeach; ?>
  </tbody>
</table>