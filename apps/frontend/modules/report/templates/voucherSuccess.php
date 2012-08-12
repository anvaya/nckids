<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<h1>Vouchers</h1>

<form target="_blank" action="<?php echo url_for('report/voucher') ?>" method="post">
<ul class="report_form">
<?php echo $form ?>
</ul>
<a href="<?php echo url_for('report/index') ?>">Cancel</a>
<input type="submit" value="Generate Report" />
</form>
