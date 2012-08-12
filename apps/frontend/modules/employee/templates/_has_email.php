  <div class="sf_admin_form_row sf_admin_date sf_admin_form_field_has_email<?php $form['has_email']->hasError() and print ' errors' ?>">
    <?php echo $form['has_email']->renderError() ?>
    <div>
      <?php echo $form['has_email']->renderLabel() ?>

      <div class="content"><?php echo $form['has_email']->render($attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes) ?>
      <?php if($form->getObject()->getEmailRemoved()): ?>
        <div class="help">Returned on <?php echo $form->getObject()->getEmailRemoved(sfConfig::get('app_settings_date_format', 'm/d/Y')) ?></div>
      <?php endif; ?>
      </div>

    </div>
  </div>