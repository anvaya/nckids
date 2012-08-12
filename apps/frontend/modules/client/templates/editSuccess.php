<?php use_helper('I18N', 'Date') ?>
<?php include_partial('client/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Editing - <img src="/images/user.png" alt="User" /> %%first_name%% %%last_name%% (%%id%%)', array('%%first_name%%' => $client->getFirstName(), '%%last_name%%' => $client->getLastName(), '%%id%%' => link_to($client->getId(), 'client_edit', $client)), 'messages') ?></h1>

  <?php include_partial('client/flashes') ?>
  
  <?php include_partial('client/services', array('client_services' => $client_services, 'client' => $client, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>

  <div id="sf_admin_header">
    <?php include_partial('client/form_header', array('client' => $client, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('client/form', array('client' => $client, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('client/form_footer', array('client' => $client, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>