<h1>Employee List</h1>

<table border="0" width="100%" cellspacing="0" cellpadding="0" class="rowstylehover-rowHover">
  <thead>
    <tr>
      <th></th>
      <th>First name</th>
      <th>Last name</th>
      <th>Job</th>
      <th>Home phone</th>
      <th>Cell phone</th>
      <th>Company email</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($employee_list as $employee): ?>
    <tr>
      <td><input type="checkbox" name="employee[]" value="<?php echo $employee->getId() ?>" id="employee_<?php echo $employee->getId() ?>"></td>
      <td><a href="<?php echo url_for('provider/edit?id='.$employee->getId()) ?>"><?php echo $employee->getFirstName() ?></a></td>
      <td><a href="<?php echo url_for('provider/edit?id='.$employee->getId()) ?>"><?php echo $employee->getLastName() ?></a></td>
      <td><?php echo $employee->getJob() ?></td>
      <td><?php echo $employee->getHomePhone() ?></td>
      <td><?php echo $employee->getCellPhone() ?></td>
      <td><?php echo $employee->getCompanyEmail() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('provider/new') ?>">New</a>
