<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<h1>Birthday Report</h1>

<form action="<?php echo url_for('report/birthday') ?>" method="post">
<ul class="report_form">
<?php echo $form ?>
</ul>
<a href="<?php echo url_for('report/birthday') ?>">Cancel</a>
<input type="submit" value="Generate Report" />
</form>
