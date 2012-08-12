<h1>AreaOfConcern List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Job</th>
      <th>Name</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($area_of_concern_list as $area_of_concern): ?>
    <tr>
      <td><a href="<?php echo url_for('areaOfConcern/edit?id='.$area_of_concern->getId()) ?>"><?php echo $area_of_concern->getId() ?></a></td>
      <td><?php echo $area_of_concern->getJobId() ?></td>
      <td><?php echo $area_of_concern->getName() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('areaOfConcern/new') ?>">New</a>
