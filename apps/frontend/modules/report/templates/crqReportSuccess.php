<input class="noprint" type="button"
  onClick="window.print()"
  value="Print This Report"/>
<h3>Classroom Annual Review and Quarterly <?php echo date(sfConfig::get('app_settings_date_format', 'm/d/Y'), $quarter_start) ?> - <?php echo date(sfConfig::get('app_settings_date_format', 'm/d/Y'), $quarter_end) ?></h3>
<table class="report arq">
<tr>
  <th>Client Name</th>
  <th>Program</th>
  <th>Service Type</th>
  <th>Therapist</th>
  <th>Start Date</th>
  <th>End Date</th>
  <th>Change Date</th>
  <th>Out For Correction</th>
  <th>Due Later</th>
  <th>Completed</th>
  <th>Notes</th>
</tr>
  <?php $last_district = new Office();
  foreach($services as $service): ?>
  <?php 
  // if this service district is not the same as the previous district, put a new row title
  $client = $service->getClient();
  if($last_district->getId() != $service->getOfficeId()){
    $last_district = $service->getOffice();
    echo '<tr><th colspan="11">'.$last_district->getName().'<hr><div class="page-break"></div></th></tr>';
  }
  ?>
    <tr<?php echo (is_object($client) && $client->getExternalService())? ' class="external_service"':'' ?>>
      <td><a href="<?php echo url_for('@client_edit?id='.$service->getClientId()) ?>"><?php echo $client ?></a> </td>
      <td><?php echo $service->getServiceType() ?></td>
      <td><?php echo $service->getService() ?></td>
      <td><?php echo $service->getEmployee() ?></td>
      <td><?php echo $service->getStartDate(sfConfig::get('app_settings_date_format', 'm/d/Y')) ?>&nbsp;</td>
      <td><?php echo $service->getEndDate(sfConfig::get('app_settings_date_format', 'm/d/Y')) ?>&nbsp;</td>
      <td><?php echo $service->getChangeDate(sfConfig::get('app_settings_date_format', 'm/d/Y')) ?>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  <?php endforeach; ?>
</table>