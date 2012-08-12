  <h2>Database Menu</h2>
  <div id="sidebarmenu">
  
  <ul>
    <?php if($sf_user->hasCredential('admin')): ?>
      <li><a href="<?php echo url_for('sfGuardUser/index') ?>">Database Users</a></li>
    <?php endif; ?>
  <li><a href="<?php echo url_for('@sf_guard_signout') ?>">Log Out</a></li>
  </ul>
  
  </div>