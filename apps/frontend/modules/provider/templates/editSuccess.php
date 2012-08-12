<h1>Editing - <img src="/images/user.png" alt="User" /><?php echo $employee->getFirstName() ?> <?php echo $employee->getLastName() ?> (<?php echo $employee->getId()?>)</h1>

<div id="employee_summary" class="span-18">
	<img alt="Headshot" style="float:left;padding:0 15px;" hspace="5" src="<?php echo 'uploads/'.sfConfig::get('app_employee_images_dir', 'employee').'/'.$employee->getPicture() ?>" />

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
<?php include_partial('form', array('form' => $form)) ?>
