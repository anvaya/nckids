  <div class="sf_admin_form_row sf_admin_date sf_admin_form_field_has_server_access<?php $form['has_server_access']->hasError() and print ' errors' ?>">
    <?php echo $form['has_server_access']->renderError() ?>
    <div>
      <?php echo $form['has_server_access']->renderLabel() ?>

      <div class="content"><?php echo $form['has_server_access']->render($attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes) ?>
      <?php if($form->getObject()->getServerRemoved()): ?>
        <div class="help">Returned on <?php echo $form->getObject()->getServerRemoved(sfConfig::get('app_settings_date_format', 'm/d/Y')) ?></div>
      <?php endif; ?>      
      </div>

    </div>
  </div>