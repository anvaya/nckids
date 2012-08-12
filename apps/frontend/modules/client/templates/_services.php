<a href="" id="client_services_button"><img src="/images/application_view_list.png" alt="Show/Hide Past Services" align="left" /> Show/Hide Past Services</a>
<div id="client_services">
	<table width="100%">
	<thead>
	  <tr>
	    <th colspan="7" class="capt">Client Services</th>
	  </tr>
	<tr>
	  <th>Provider</th>
	  <th>Service</th>
	  <th>Type</th>
	  <th>Start Date</th>
	  <th>End Date</th>
	  <th>Frequency</th>
	  <th>!</th>
	</tr>
	</thead>
  <?php foreach($client_services as $service): ?>
    <tr class="<?php echo ($service->isComplete())? 'notActive':'' ?>">
      <td><a href="<?php echo url_for('@employee_edit?id='. (($emp = $service->getEmployee())? $emp->getId() : '1')) ?>"><?php echo $service->getEmployee() ?></a></td>
      <td><?php echo $service->getService() ?></td>
      <td class="row_<?php echo $service->getObjectType() ?>"><?php echo $service->getServiceType() ?></td>
      <td><?php echo $service->getStartDate(sfConfig::get('app_settings_date_format', 'm/d/Y')) ?><?php echo ($service->getWaitingList())? '<img src="/images/icons/waiting.png" alt="on waiting list" />':''  ?></td>
      <td><?php echo $service->getEndDate(sfConfig::get('app_settings_date_format', 'm/d/Y')) ?></td>
      <td><?php echo $service->getFrequency() ?></td>
      <td><a class="serviceEdit" rel="facebox" href="<?php echo url_for('program/edit?id='.$service->getId()) ?>">e</a><?php if($service->getNotes() != "") echo '<a title="'.$service->getNotes().'" class="hasNotes">&nbsp;</a>'; ?></td>
    </tr>
  <?php endforeach; ?>
  </table>
</div>
  <script type="text/javascript">
  $(document).ready(function(){
    $("#client_services_button").click(function () {
    	$("#client_services .notActive").toggle();
    	return false;
    });

  });
  </script>
