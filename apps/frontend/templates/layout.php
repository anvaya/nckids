<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
  </head>
  <body>
<div id="wrapper">
<!-- Header -->
<div id="header"> <span style="float:right;"> Welcome [<?php echo $sf_user->getUsername() ?>] / <a href="<?php echo url_for('@sf_guard_signout') ?>">Logout</a> / <a href="http://kbscomputer.com/trac/nckids" target="_blank">Help</a><br />
        <small>Last logged in at <strong><?php echo $sf_user->getGuardUser()->getLastLogin("g:i A \o\\n D M jS") ?> </strong> </small> </span>
        <div> <img src="/images/logo.jpg" class="logo" alt="NCKids Inc DB Manager" /> </div>
</div>
<!-- Header -->

<!-- Menu -->
<div id="menu">
  <?php if($sf_user->hasCredential('admin')): ?>
    <?php include_partial('client/quickSearch') ?>
  <?php endif; ?>
  <ul id="navmenu">
    <li><a href="/" class="first top">Dashboard</a></li>
    <?php if($sf_user->hasCredential('admin')): ?>
    <li><a href="/client">Clients</a></li>
    <li><a href="/employee">Employees</a></li>
    <li><a href="/report">Reports</a></li>
    <li><a href="/system">Settings</a></li>
    <?php endif; ?>
  </ul>
</div>
<!-- Menu -->
<!-- 
<div id="submenu">
<ul>
<li><a href="#">Submenu 1</a></li>
<li><a href="#">Submenu 2</a></li>
<li><a href="#">Submenu 3</a></li>
<li><a href="#" class="activesub">Submenu 4</a></li>
</ul>
</div>
 -->
<!-- settings block -->
<div class="settingsblock">
<?php include_partial('sfBreadNav/breadcrumb',array('menu' => 'default')) ?>
<!-- <div><a href="#">DB Home</a> <a href="#">Employee Management</a> <a href="#">Add New User</a></div> -->
<?php include_component_slot('editbar') ?>
</div>
<!-- settings Block -->

<div style="clear:both"></div>
<!-- Content Area -->
<div id="middlepart">




<!-- Left column -->
<div id="leftcolumn">
<?php echo $sf_content ?>
</div>
<!-- Right Column -->
<div id="rightcolumn">

<div class="notes">
<?php include_component_slot('sidebar') ?>
</div>


<?php if (has_slot('filters')): ?>
  <?php include_slot('filters') ?>
<?php else: ?>
	<!-- Notes / Articles Box 
	<div class="notes"><h2>This is a Notice!</h2>
	
	<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Duis dignissim vulputate leo. </p>
	<ul>
	<li>Donec mauris. Suspendisse potenti. </li>
	<li>Class aptent taciti sociosqu ad litora </li>
	<li>torquent per conubia nostra, per inceptos himenaeos. </li>
	<li>Aliquam molestie, erat non ultricies elementum, </li>
	<li>ante nulla hendrerit erat, sed laoreet </li>
	<li>augue pede eget leo. Nunc iaculis, </li>
	</ul>
	</div>
	 <div class="notes">
	 <h2>To Do List</h2>
	Pending Photos <b>(24)</b><br />
	Accept New Users <b>(15)</b> <br />
	Band IP Addresses <b>(10)</b><br />
	<a href="#">Comments Added <b>(0)</b></a><br />
	</div>
	 Notes / Articles Box -->
<?php endif; ?>
 
</div>
<!-- Content -->
</div>
</div>

<!-- Wrapper -->
<div id="footer">
        <p class="copyright">
    &copy; Copyright 2009 All rights reserved <br />
                North Country Kids, Inc.</p>
</div>
<div id="not_done" style="display:none;">
  <p>This feature is coming <i>very</i> soon.</p>
</div> 
<script type="text/javascript">
//<![CDATA[
  jQuery(document).ready(function() {

    jQuery('a[rel*=facebox]').facebox({speed: 'fast' }); 

    $(document).bind('reveal.facebox', function(){
    	$('#facebox').draggable();
    });
    
    $('tbody input.sf_admin_batch_checkbox:checked').closest('tr').addClass('selected');
    $('div.sf_admin_list table tbody tr .sf_admin_batch_checkbox').click(function(){
        $(this).closest('tr').toggleClass('selected');
        });
    $('div.sf_admin_list table tbody tr').click(function(event) {
    	    if (event.target.type !== 'checkbox') {
    	      $(':checkbox', this).trigger('click');
    	    }
    	  });
        
    // $('a.hasNotes').qtip({delay: 0, effect: {type: 'show', length: 0}});
  });
  
function checkAll( )
{
	if($('#sf_admin_list_batch_checkbox').is(':checked'))
		$("input.sf_admin_batch_checkbox:not(:checked)").trigger('click');
	else
		$("input.sf_admin_batch_checkbox:checked").trigger('click');
  return true;
}

function prefillDate(date_field, month, day, year){
  $('#'+date_field+'_month').val(month);
  $('#'+date_field+'_day').val(day);
  $('#'+date_field+'_year').val(year);
  return false;
}
//]]>
</script>
  </body>
</html>
