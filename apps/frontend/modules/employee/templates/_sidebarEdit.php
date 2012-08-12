  <h2>Employee Menu</h2>
  <div id="sidebarmenu">
  
  <ul>
  <li><a href="<?php echo url_for('@employee_edit?id='.$employee->getId()) ?>">Edit Employee</a></li>
  <li><a href="<?php echo url_for('report/employeeWorkload?employee_id='.$employee->getId()) ?>">View Workload</a></li>
  <li><a href="<?php echo url_for('employee/printBadge?id='.$employee->getId()) ?>">Print Badge</a></li>
  <li><a rel="facebox" href="<?php echo url_for('report/voucher?employee_id='.$employee->getId()) ?>">Monthly Vouchers</a></li>
  <li><a rel="facebox" href="#not_done" class="activesub">Deactivate User</a></li>
  </ul>
  
  </div>