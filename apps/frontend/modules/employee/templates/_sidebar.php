  <h2>Employee Menu</h2>
  <div id="sidebarmenu">
  
  <ul>
  <li><a href="<?php echo url_for('employee/new') ?>">New Employee</a></li>
  <li><a rel="facebox" href="#not_done">Employee Hiring Report</a></li>
  </ul>
  
  </div>

<script type="text/javascript">
//<![CDATA[
  function batchAction(type) {
    $("select[name=batch_action] option[value="+ type +"]").attr("selected",true);
    $("ul.sf_admin_actions input").click();
    return false;
  }
//]]>
</script>