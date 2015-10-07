<?php use_helper('Form', 'jQuery') ?>
<div class="searchbar">
<label for="name_search">Client Search:</label>
<input type="text" value="" id="name_search" name="name_search" autocomplete="off" class="ac_input">

<script type="text/javascript">
  $("#name_search").autocomplete("<?php echo url_for('client/autocompleteName') ?>", {
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
        }).result(function(event, data, formatted) {
          location.href='<?php echo url_for('@client') ?>/'+data[1]+'/edit';
  });

</script>
</div>