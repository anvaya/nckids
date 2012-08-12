<div id="mainbox">
  <?php if($sf_user->hasCredential('admin')): ?>
        <div class="boxcontainer"> <a href="<?php echo url_for('client/index') ?>" title="Client Functions"><img src="/images/icons/users.jpg" alt="Clients" width="71" height="71" class="box_thumb" /></a>
                <h4><a href="<?php echo url_for('client/index') ?>" title="Client Functions">Clients</a></h4>
                All client functions</div>
        <div class="boxcontainer"> <a href="<?php echo url_for('employee/index') ?>" title="Employee Functions"><img src="/images/icons/home.jpg" alt="Employee Functions" width="71" height="71" class="box_thumb" /></a>
                <h4><a href="<?php echo url_for('employee/index') ?>" title="Employee Functions">Employees</a></h4>
                Manage employee functions, print badges</div>
        <div class="boxcontainer"> <a href="<?php echo url_for('report/index') ?>" title="Office Reports"><img src="/images/icons/cart.jpg" width="71" alt="Office Reports"  height="71" class="box_thumb" /></a>
                <h4><a href="<?php echo url_for('report/index') ?>" title="Office Reports">Reports</a></h4>
                Reports for various service providers</div>
        <div class="boxcontainer"> <a href="<?php echo url_for('system/index') ?>" title="System Settings"><img src="/images/icons/email.jpg" alt="System Settings" width="71" height="71" class="box_thumb" /></a>
                <h4><a href="<?php echo url_for('system/index') ?>" title="System Settings">Settings</a></h4>
                Database system settings</div>
        <div style="clear:both"></div>
  <?php endif; ?>

  <?php if($sf_user->hasCredential('noteEntry')): ?>
        <div class="boxcontainer"> <a href="<?php echo url_for('entry/index') ?>" title="Note Entries"><img src="/images/icons/folders.jpg" alt="Note Entries" width="71" height="71" class="box_thumb" /></a>
                <h4><a href="<?php echo url_for('entry/index') ?>" title="Note Entries">Note Entries</a></h4>
                Manage note entries</div>
  <?php endif; ?>
</div>