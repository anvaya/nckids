<table width="100%" class="rowstylehover-rowHover rowselect-selected">
<thead>
  <tr>
    <th colspan="5" class="capt">Core Evaluation <?php echo date(sfConfig::get('app_settings_date_format', 'm/d/Y'), $start_date) ?> - <?php echo date(sfConfig::get('app_settings_date_format', 'm/d/Y'), $end_date) ?></th>
  </tr>
<tr>
  <th>Name</th>
  <th>Created</th>
  <th>Serviced</th>
  <th>Service Type</th>
  <th>Late?</th>
</tr>
</thead>
  <?php foreach($clients as $client): ?>
    <tr<?php echo (!$client->getFirstServiceDate('U') || $client->getFirstServiceDate('U') > strtotime('+30 days', $client->getCreatedAt('U'))) ? ' class="late"' : '' ?>>
      <td><a href="<?php echo url_for('@client_edit?id='.$client->getId()) ?>"><?php echo $client ?></a></td>
      <td><?php echo $client->getCreatedAt(sfConfig::get('app_settings_date_format', 'm/d/Y')) ?></td>
      <td><?php echo $client->getFirstServiceDate(sfConfig::get('app_settings_date_format', 'm/d/Y')) ?></td>
      <td><?php echo ($fs = $client->getFirstService())? $fs->getServiceType(): ''; ?> <?php echo ($client->getServiceCoord())? '- '.$client->getServiceCoord():'' ?></td>
      <td><?php echo (!$client->getFirstServiceDate('U') || $client->getFirstServiceDate('U') > strtotime('+30 days', $client->getCreatedAt('U'))) ? 'yes' : 'no' ?></td>
    </tr>
  <?php endforeach; ?>
</table>
