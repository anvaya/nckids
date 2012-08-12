<table width="100%">
	<thead>
	 <tr>
	   <th class="capt" colspan="6">Current Workload For <?php echo $employee ?></th>
	 </tr>
		<tr>
			<th>Client</th>
			<th>Service</th>
			<th>Service Type</th>
			<th>Start Date</th>
			<th>End Date</th>
			<th>Frequency</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($current_services as $service): ?>
	  <tr>
	    <td><a href="<?php echo url_for('@client_edit?id='.$service->getClient()->getId()) ?>" title="<?php echo $service->getClient() ?>"><?php echo $service->getClient() ?></a></td>
	    <td><?php echo $service->getService() ?></td>
	    <td class="row_<?php echo $service->getServiceType() ?>"><?php echo $service->getServiceType() ?></td>
	    <td><?php echo $service->getStartDate(sfConfig::get('app_settings_date_format', 'm/d/Y')) ?></td>
	    <td><?php echo $service->getEndDate(sfConfig::get('app_settings_date_format', 'm/d/Y')) ?></td>
	    <td><?php echo $service->getFrequency() ?></td>
	  </tr>
	<?php endforeach; ?>
	</tbody>
</table>
<br />
<table width="100%">
  <thead>
   <tr>
     <th class="capt" colspan="6">Future Workload For <?php echo $employee ?></th>
   </tr>
    <tr>
      <th>Client</th>
      <th>Service</th>
      <th>Service Type</th>
      <th>Start Date</th>
      <th>End Date</th>
      <th>Frequency</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($future_services as $service): ?>
    <tr>
      <td><a href="<?php echo url_for('@client_edit?id='.$service->getClient()->getId()) ?>" title="<?php echo $service->getClient() ?>"><?php echo $service->getClient() ?></a></td>
      <td><?php echo $service->getService() ?></td>
      <td class="row_<?php echo $service->getServiceType() ?>"><?php echo $service->getServiceType() ?></td>
      <td><?php echo $service->getStartDate(sfConfig::get('app_settings_date_format', 'm/d/Y')) ?></td>
      <td><?php echo $service->getEndDate(sfConfig::get('app_settings_date_format', 'm/d/Y')) ?></td>
      <td><?php echo $service->getFrequency() ?></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
<br />