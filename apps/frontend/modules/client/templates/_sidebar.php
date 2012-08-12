  <h2>Client Menu</h2>
  <div id="sidebarmenu">
  
  <ul>
  <li><a href="<?php echo url_for('client/new') ?>">New Client</a></li>
  <li><a href="#" onclick="batchAction('batchAddressLabels'); return false;">Address Labels</a></li>
  <li><a href="#" onclick="addAttendanceFields();batchAction('batchAttendance'); return false;">Attendance Sheets</a></li>
  <li><a href="#" onclick="addClassroomFields();batchAction('batchClassroomTimesheet'); return false;">Classroom Timesheet</a></li>
  <li><a href="#" onclick="batchAction('batchMedicaidVoucher'); return false;">Medicaid Voucher</a></li>
  <li><a href="/uploads/teacher_attendance_sheet.pdf">Teacher Attendance Sheet</a></li>
  <li><a href="#" onclick="batchAction('batchAideVoucher'); return false;">1:1 Aide Voucher</a></li>
  </ul>
  
  </div>
  
<script type="text/javascript">
//<![CDATA[
  function addAttendanceFields(){
    $('ul.sf_admin_actions').append('<input type="hidden" name="office" value="'+ $("input[@name='client_filters[office_id]']:checked").parent().text().replace(/\n/g, '') +'">');
  }
  function addClassroomFields(){
	  
    var d_start = $('#client_filters_start_date_from_year').val();
    var d_end = $('#client_filters_end_date_to_year').val();
    
    $('ul.sf_admin_actions').append('<input type="hidden" name="office" value="'+ $('#client_filters_office_id :selected').text() +'">');
    $('ul.sf_admin_actions').append('<input type="hidden" name="service" value="'+ $('#client_filters_service_id :selected').text() +'">');
    $('ul.sf_admin_actions').append('<input type="hidden" name="date" value="'+ d_start + '-' + d_end +'">');
  }
  function batchAction(type) {
    $("select[name=batch_action] option[value="+ type +"]").attr("selected",true);
    $("ul.sf_admin_actions input").click();
    return false;
  }
//]]>
</script>