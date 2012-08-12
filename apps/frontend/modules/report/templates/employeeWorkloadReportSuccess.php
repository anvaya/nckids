<table width="100%">
  <thead>
   <tr>
     <th class="capt" colspan="8">Current Workload For <?php echo $employee ?></th>
   </tr>
    <tr>
      <th>Client</th>
      <th>DOB</th>
      <th>Service</th>
      <th>Service Coord.</th>
      <th>Service Type</th>
      <th>Start Date</th>
      <th>End Date</th>
      <th>Frequency</th>
    </tr>
  </thead>
  <tfoot>
    <tr>
      <td colspan="7">&nbsp;</td>
      <td>Total: <?php echo $current_services_total ?></td>
  </tfoot>
  <tbody>
  <?php foreach($current_services as $service): ?>
    <tr>
      <td><a href="<?php if($service->getClient()) echo url_for('@client_edit?id='.$service->getClient()->getId()) ?>" title="<?php echo $service->getClient() ?>"><?php echo $service->getClient() ?></a></td>
      <td><?php echo $service->getClient()->getDob(sfConfig::get('app_settings_date_format', 'm/d/Y')) ?></td>
      <td><?php echo $service->getService() ?></td>
      <td><?php echo ($service->getClient()) ? $service->getClient()->getServiceCoordinator():'n/a' ?></td>
      <td class="row_<?php echo $service->getObjectType() ?>"><?php echo $service->getServiceType() ?></td>
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
     <th class="capt" colspan="8">Future Workload For <?php echo $employee ?></th>
   </tr>
    <tr>
      <th>Client</th>
      <th>DOB</th>
      <th>Service</th>
      <th>Service Coord.</th>
      <th>Service Type</th>
      <th>Start Date</th>
      <th>End Date</th>
      <th>Frequency</th>
    </tr>
  </thead>
  <tfoot>
    <tr>
      <td colspan="7">&nbsp;</td>
      <td>Total: <?php echo $future_services_total ?></td>
  </tfoot>
  <tbody>
  <?php foreach($future_services as $service): ?>
    <tr>
      <td><a href="<?php echo url_for('@client_edit?id='.$service->getClient()->getId()) ?>" title="<?php echo $service->getClient() ?>"><?php echo $service->getClient() ?></a></td>
      <td><?php echo $service->getClient()->getDob(sfConfig::get('app_settings_date_format', 'm/d/Y')) ?></td>
      <td><?php echo $service->getService() ?></td>
      <td><?php echo ($service->getClient()) ? $service->getClient()->getServiceCoordinator():'n/a' ?></td>
      <td class="row_<?php echo $service->getObjectType() ?>"><?php echo $service->getServiceType() ?></td>
      <td><?php echo $service->getStartDate(sfConfig::get('app_settings_date_format', 'm/d/Y')) ?></td>
      <td><?php echo $service->getEndDate(sfConfig::get('app_settings_date_format', 'm/d/Y')) ?></td>
      <td><?php echo $service->getFrequency() ?></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>