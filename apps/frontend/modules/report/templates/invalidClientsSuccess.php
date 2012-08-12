<h1>Invalid Clients</h1>

<table style="width:100%;">
  <thead>
    <th></th>
    <th>First Name</th>
    <th>Last Name</th>
  </thead>
  <tbody>
<?php foreach($clients as $client): ?>
  <tr>
    <td><a href="<?php echo url_for('@client_edit?id='.$client->getId()) ?>">Edit (<?php echo $client->getId() ?>)</a></td>
    <td><?php echo $client->getFirstName() ?></td>
    <td><?php echo $client->getLastName() ?></td>
  </tr>
<?php endforeach; ?>
  </tbody>
</table>