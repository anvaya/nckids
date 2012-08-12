    <tr>
      <td><a href="<?php echo url_for('program/edit?id='.$service->getId()) ?>">Edit (<?php echo $service->getId() ?>)</a></td>
      <td><a href="<?php echo url_for('@client_edit?id='. (($client = $service->getClient())? $client->getId() : '1')) ?>"><?php echo $service->getClient() ?></a></td>
      <td><a href="<?php echo url_for('@employee_edit?id='. (($emp = $service->getEmployee())? $emp->getId() : '1')) ?>"><?php echo $service->getEmployee() ?></a></td>
      <td><?php echo $service->getService() ?></td>
      <td class="row_<?php echo $service->getObjectType() ?>"><?php echo $service->getServiceType() ?></td>
      <td><?php echo $service->getStartDate(sfConfig::get('app_settings_date_format', 'm/d/Y')) ?></td>
      <td><?php echo $service->getEndDate(sfConfig::get('app_settings_date_format', 'm/d/Y')) ?></td>
      <td><?php echo $service->getFrequency() ?></td>
      <td><?php if($service->getNotes() != "") echo '<a title="'.$service->getNotes().'" class="hasNotes">&nbsp;</a>'; ?></td>
    </tr>