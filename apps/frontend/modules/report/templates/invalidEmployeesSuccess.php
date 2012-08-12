<h1>Invalid Employees</h1>

<table style="width:100%;">
  <thead>
    <th></th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Job Title</th>
  </thead>
  <tbody>
<?php foreach($employees as $employee): ?>
  <tr>
    <td><a href="<?php echo url_for('@employee_edit?id='.$employee->getId()) ?>">Edit (<?php echo $employee->getId() ?>)</a></td>
    <td><?php echo $employee->getFirstName() ?></td>
    <td><?php echo $employee->getLastName() ?></td>
    <td><?php echo $employee->getJob() ?></td>
  </tr>
<?php endforeach; ?>
  </tbody>
</table>