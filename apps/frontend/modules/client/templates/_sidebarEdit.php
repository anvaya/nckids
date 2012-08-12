<?php use_helper('jQuery') ?>
  <h2>Client Menu</h2>
  <div id="sidebarmenu">
  
  <ul>
  <li><a rel="facebox" href="<?php echo url_for('program/newClassroom?client_id='. $client->getId()) ?>">Add Classroom</a></li>
  <li><a rel="facebox" href="<?php echo url_for('program/newPreschool?client_id='. $client->getId()) ?>">Add Preschool</a></li>
  <li><a rel="facebox" href="<?php echo url_for('program/newSeit?client_id='. $client->getId()) ?>">Add SEIT</a></li>
  <li><a rel="facebox" href="<?php echo url_for('program/newEi?client_id='. $client->getId()) ?>">Add EI</a></li>
  <li><a rel="facebox" href="<?php echo url_for('program/newSchoolAge?client_id='. $client->getId()) ?>">Add School Age</a></li>
  <li>---</li>
  <li><a rel="facebox" href="<?php echo url_for('client/eiSummary?id='. $client->getId()) ?>">Core Eval Summary Form</a></li>
  <li><a href="<?php echo url_for('client/eiMulti?id='. $client->getId()) ?>">Multi Eval Form</a></li>
  <li><a href="<?php echo url_for('client/billingVoucher?id='. $client->getId()) ?>">Billing Voucher</a></li>
  </ul>
  
  </div>