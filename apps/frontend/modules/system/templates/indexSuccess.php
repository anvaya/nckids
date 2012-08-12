<h2>System Settings</h2>
<div id="mainbox">
        <div class="boxcontainer"> <a href="<?php echo url_for('service/index') ?>" title="Manage Services"><img src="/images/icons/home.jpg" alt="Services" width="71" height="71" class="box_thumb" /></a>
                <h4><a href="<?php echo url_for('service/index') ?>" title="Manage Services">Services</a></h4>
                Manage service names</div>
        <div class="boxcontainer"> <a href="<?php echo url_for('frequency/index') ?>" title="Manage Frequencies"><img src="/images/icons/cart.jpg" width="71" alt="Frequencies"  height="71" class="box_thumb" /></a>
                <h4><a href="<?php echo url_for('frequency/index') ?>" title="Manage Frequencies">Frequencies</a></h4>
                Manage frequency names</div>
        <div class="boxcontainer"> <a href="<?php echo url_for('job/index') ?>" title="Manage Job Titles"><img src="/images/icons/folders.jpg" alt="Jobs" width="71" height="71" class="box_thumb" /></a>
                <h4><a href="<?php echo url_for('job/index') ?>" title="Manage Job Titles">Job Titles</a></h4>
                Manage job titles</div>
        <div class="boxcontainer"> <a href="<?php echo url_for('service_coordinator/index') ?>" title="Manage Service Coordinators"><img src="/images/icons/folders.jpg" alt="Jobs" width="71" height="71" class="box_thumb" /></a>
                <h4><a href="<?php echo url_for('service_coordinator/index') ?>" title="Manage Service Coordinators">Service Coordinators</a></h4>
                Manage service coordinators</div>
        <div class="boxcontainer"> <a href="<?php echo url_for('areaOfConcern/index') ?>" title="Manage Objectives"><img src="/images/icons/folders.jpg" alt="Jobs" width="71" height="71" class="box_thumb" /></a>
                <h4><a href="<?php echo url_for('areaOfConcern/index') ?>" title="Manage Objectives">Manage Objectives</a></h4>
                Manage service coordinators</div>
  <div style="clear:both"></div>
</div>

<p>Documents:</p>
<ul>
    <li><a href="/uploads/aide_voucher.pdf">Blank Aide Voucher Form</a></li>
      <li><a href="/uploads/ID_back.pdf">Print Badge Backs</a></li>
</ul>
<p>Currently the following settings are configurable:</p>
<ul>
	<li><strong>Date format</strong>: <?php echo sfConfig::get('app_settings_date_format') ?></li>
	<li><strong>Hide inactive employees</strong>: <?php echo sfConfig::get('app_employee_hide_inactive') ?></li>
	<li><strong>Employee image directory</strong>: <?php echo sfConfig::get('app_employee_images_dir') ?></li>
	<li><strong>Related Service IDs</strong>: <?php echo implode(sfConfig::get('app_settings_related_service_ids'), ', ') ?></li>
	<li><strong>Classroom Service ID</strong>: <?php echo sfConfig::get('app_settings_classroom_service_id') ?></li>
</ul>
<br />
<h2>Stats</h2>
<?php stOfc::createChart('49%', 250, 'program/chartServices', false); ?>
<?php stOfc::createChart('49%', 250, 'program/chartOffices', false); ?>
<br /><br /><br />
<?php stOfc::createChart('100%', 400, 'program/chartEmployees', false); ?>