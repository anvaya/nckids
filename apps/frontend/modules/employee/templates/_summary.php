<?php use_helper('Global') ?>
<div id="employee_summary" class="span-18">
	<?php echo employeePictureTag($employee) ?>
	
	<ul class="circles">
		<li>Name: <strong><?php echo $employee->getFullName() ?></strong></li>
		<li>Job: <?php echo $employee->getJob() ?></li>
		<li>Address: <?php echo $employee->getAddress() ?></li>
		<li>Address: <?php echo $employee->getAddress2() ?></li>
		<li>Home: <?php echo $employee->getHomePhone() ?></li>
		<li>Cell: <?php echo $employee->getCellPhone() ?></li>
		<li>Email: <a href="https://webmail.nckidsinc.com/zimbra?app=mail&view=compose&to=<?php echo $employee->getCompanyEmail() ?>" target="_blank"><?php echo $employee->getCompanyEmail() ?></a></li>
	</ul>
</div>
<div style="clear:both;"></div>