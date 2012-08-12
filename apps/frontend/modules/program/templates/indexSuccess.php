<h1>Program List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Client</th>
      <th>Employee</th>
      <th>Service</th>
      <th>Frequency</th>
      <th>Start date</th>
      <th>End date</th>
      <th>Change date</th>
      <th>Notes</th>
      <th>Icd9</th>
      <th>Authorization</th>
      <th>Physicians order</th>
      <th>Office</th>
      <th>Object type</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($client_service_list as $client_service): ?>
    <tr>
      <td><a href="<?php echo url_for('program/edit?id='.$client_service->getId()) ?>"><?php echo $client_service->getId() ?></a></td>
      <td><?php echo $client_service->getClientId() ?></td>
      <td><?php echo $client_service->getEmployeeId() ?></td>
      <td><?php echo $client_service->getServiceId() ?></td>
      <td><?php echo $client_service->getFrequencyId() ?></td>
      <td><?php echo $client_service->getStartDate() ?></td>
      <td><?php echo $client_service->getEndDate() ?></td>
      <td><?php echo $client_service->getChangeDate() ?></td>
      <td><?php echo $client_service->getNotes() ?></td>
      <td><?php echo $client_service->getIcd9Id() ?></td>
      <td><?php echo $client_service->getAuthorization() ?></td>
      <td><?php echo $client_service->getPhysiciansOrder() ?></td>
      <td><?php echo $client_service->getOfficeId() ?></td>
      <td><?php echo $client_service->getObjectType() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('program/new') ?>">New</a>
