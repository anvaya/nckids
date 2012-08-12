<h1>Vouchers:</h1>

<table>
<tr>
<th>Therapist</th>
<th>Client</th>
<th>Service</th>
<th>Start</th>
<th>End</th>
<th>Change</th>
<th>Auth #</th>
</tr>
<?php foreach($services as $service): ?>
<tr>
<td><?php echo $service->getEmployee() ?></td>
<td><?php echo $service->getClient() ?></td>
<td><?php echo $service->getService() ?></td>
<td><?php echo $service->getStartDate() ?></td>
<td><?php echo $service->getEndDate() ?></td>
<td><?php echo $service->getChangeDate() ?></td>
<td><?php echo $service->getAuthorization() ?></td>
</tr>
<?php endforeach; ?>
</table>