<?php echo $employee->getFullName() ?> has been terminated.<br />
<br />
<br />
Date of Termination: <?php echo $employee->getDof(sfConfig::get('app_settings_date_format', 'm/d/Y')) ?><br />
<br />
Has Keys: <?php if($employee->getHasKeys()): ?> yes <?php else: ?> no (returned <?php echo $employee->getKeysReturned(sfConfig::get('app_settings_date_format', 'm/d/Y')) ?>)<?php endif; ?><br />
<br />
Has Email: <?php if($employee->getHasEmail()): ?> yes <?php else: ?> no (removed <?php echo $employee->getEmailRemoved(sfConfig::get('app_settings_date_format', 'm/d/Y')) ?>)<?php endif; ?><br />
<br />
On Distribution List: <?php if($employee->getHasDistList()): ?> yes <?php else: ?> no (removed <?php echo $employee->getDistListRemoved(sfConfig::get('app_settings_date_format', 'm/d/Y')) ?>)<?php endif; ?><br />
<br />
Has Server Access: <?php if($employee->getHasServerAccess()): ?> yes <?php else: ?> no (removed <?php echo $employee->getServerRemoved(sfConfig::get('app_settings_date_format', 'm/d/Y')) ?>)<?php endif; ?><br />