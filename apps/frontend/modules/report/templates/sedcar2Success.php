<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<h1>SEDCAR2 Report</h1>

<form target="_blank" action="<?php echo url_for('report/sedcar2') ?>" method="post">
<ul class="report_form">
<?php echo $form ?>
</ul>
<a href="<?php echo url_for('report/index') ?>">Cancel</a>
<input type="submit" value="Generate Report" />
</form>
