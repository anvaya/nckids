<?php foreach($wait_lists as $wait_list): ?>
  <table width="100%" class="rowstylehover-rowHover rowselect-selected">
  <thead>
    <tr>
      <th colspan="5" class="capt"><?php echo $wait_list['location'] ?> Waiting List</th>
    </tr>
  <tr>
    <th>Client</th>
    <th>Service</th>
    <th>Service Type</th>
    <th>Start Date</th>
  </tr>
  </thead>
    <?php foreach($wait_list['clientservices'] as $clientservice): ?>
      <tr>
        <td><a href="<?php echo url_for('@client_edit?id='.(($clientservice->getClient())?$clientservice->getClient()->getId():'')) ?>"><?php echo $clientservice->getClient() ?></a></td>
        <td><?php echo $clientservice->getService() ?></td>
        <td class="row_<?php echo $clientservice->getServiceType() ?>"><?php echo $clientservice->getServiceType() ?></td>
        <td><?php echo $clientservice->getStartDate(sfConfig::get('app_settings_date_format', 'm/d/Y')) ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
<br />
<?php endforeach; ?>