<?php use_helper('I18N', 'Date') ?>
<?php include_partial('employee/assets') ?>

<div id="sf_admin_container" class="span-24 last">
  <h1><?php echo __('Editing - <img src="/images/user.png" alt="User" /> %%first_name%% %%last_name%% (%%id%%)', array('%%first_name%%' => $employee->getFirstName(), '%%last_name%%' => $employee->getLastName(), '%%id%%' => link_to($employee->getId(), 'employee_edit', $employee)), 'messages') ?></h1>

  <?php include_partial('employee/flashes') ?>

  <div id="sf_admin_header" class="span-24 last">
    <?php include_partial('employee/form_header', array('employee' => $employee, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content" class="span-24 last">
    <?php include_partial('employee/form', array('employee' => $employee, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer" class="span-24 last">
    <?php include_partial('employee/form_footer', array('employee' => $employee, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>