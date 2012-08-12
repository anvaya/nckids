<?php foreach($offices as $office => $clients): ?>
  <table width="100%">
    <thead>
     <tr>
       <th class="capt" colspan="<?php echo 2+(int)$sf_data->getRaw('check_bluecard')+(int)$sf_data->getRaw('check_immunizations') ?>"><?php echo $office ?> - Expired Clients as of <?php echo $date ?></th>
     </tr>
      <tr>
        <th>Client</th>
        <th>Physical Expiration</th>
        <?php if($check_bluecard): ?><th>Blue Card</th><?php endif; ?>
        <?php if($check_immunizations): ?><th>Immunizations</th><?php endif; ?>
      </tr>
    </thead>
    <tbody>
    <?php foreach($clients as $client): ?>
      <tr class="<?php echo ($client->getIsIep())? ' is_iep':'' ?>">
        <td><a href="<?php echo url_for('@client_edit?id='.$client->getId()) ?>"><?php echo $client->getFullName() ?></a></td>
        <td><?php echo $client->getPhysicalExp(sfConfig::get('app_settings_date_format', 'm/d/Y')) ?></td>
        <?php if($check_bluecard): ?><td><img src="<?php echo ($client->getBlueCard())? '/sf/sf_admin/images/tick.png':'/images/icons/cross.png' ?>" alt="<?php echo $client->getBlueCard() ?>" /></td><?php endif; ?>
        <?php if($check_immunizations): ?><td><img src="<?php echo ($client->getImmunizations())? '/sf/sf_admin/images/tick.png':'/images/icons/cross.png' ?>" alt="<?php echo $client->getImmunizations() ?>" /></td><?php endif; ?>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
<?php endforeach; ?>