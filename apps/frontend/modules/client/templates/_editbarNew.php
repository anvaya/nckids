<a href="<?php echo url_for('client/index') ?>"><img src="/images/icons/cancel.gif" width="48" height="48" alt="Save" /><br />CANCEL</a>
<a id="save_link" href="<?php echo url_for('client/edit?id='. $client_id) ?>"><img src="/images/icons/save.gif" width="48" height="48" alt="Save" /><br />SAVE</a>

<script type="text/javascript">
//<![CDATA[
$(document).ready(function() {
  
  $("#save_link").click(function(){
   $('#employee_form').submit();
   return false;
  });
});
//]]>
</script>