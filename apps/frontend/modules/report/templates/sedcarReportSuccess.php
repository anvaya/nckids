<input class="noprint" type="button"
  onClick="window.print()"
  value="Print This Report"/>
<?php foreach($districts as $dname => $a_district): 
$row = 1;
?>
<h3>SEDCAR (<?php echo $dname ?>) <?php echo date(sfConfig::get('app_settings_date_format', 'm/d/Y'), $date) ?></h3>
<table class="report sedcar">
<tr>
  <th>Row</th>
  <th>Client Name</th>
  <th>District</th>
  <th>Employee Name</th>
  <th>Start Date</th>
  <th>End Date</th>
</tr>
  <?php foreach($a_district as $seit): ?>
    <?php 
    $client = $seit->getClient();
    $employee = $seit->getEmployee();
    ?>
  <tr<?php echo (is_object($client) && $client->getExternalService())? ' class="external_service"':'' ?>>
    <td><?php echo $row++ ?></td>
    <td><?php echo (is_object($client))? $client->getFullName() : '' ?></td>
    <td><?php echo (is_object($client))? $client->getDistrict() : '' ?></td>
    <td><?php echo (is_object($employee))? $employee->getFullName() : '' ?></td>
    <td><?php echo $seit->getstartDate(sfConfig::get('app_settings_date_format', 'm/d/Y')) ?></td>
    <td><?php echo $seit->getEndDate(sfConfig::get('app_settings_date_format', 'm/d/Y')) ?></td>
  </tr>
  
  <?php endforeach; ?>
</table>
<hr> 
<div class="page-break"></div> 
<?php endforeach; ?>