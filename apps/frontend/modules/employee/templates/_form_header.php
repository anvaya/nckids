<?php if(!$employee->isNew()): ?>
<?php include_partial('employee/summary', array('employee'=>$employee)) ?>
<?php endif; ?>
