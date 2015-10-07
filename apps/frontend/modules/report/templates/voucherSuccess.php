<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<h1>Vouchers</h1>

<form target="_blank" action="<?php echo url_for('report/voucher') ?>" method="post">
<ul class="report_form">
<?php 
    echo $form 
?>
</ul>
<a href="<?php echo url_for('report/index') ?>">Cancel</a>
<input type="submit" value="Generate Report" />
</form>
<script type="text/javascript">
  $("#voucher_client_name").autocomplete("<?php echo url_for('client/autocompleteName') ?>", {
    minChars: 2,
    matchSubset: 0,
    matchContains: 0,
    cacheLength: 1,
    autoFill: 1,
    max: 20,
    formatItem: function(row, i, max) {
     return row[0] + " [" + row[1] + "]";
    },
    formatMatch: function(row, i, max) {
      return row[0];
    },
    formatResult: function(row) {
      return row[0];
    }
        }).result(function(event, data, formatted) 
  {
          //location.href='<?php echo url_for('@client') ?>/'+data[1]+'/edit';
          $('#voucher_client_id').val(data[1]);
  });

</script>