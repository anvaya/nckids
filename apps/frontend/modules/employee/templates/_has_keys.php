  <div class="sf_admin_form_row sf_admin_date sf_admin_form_field_has_keys<?php $form['has_keys']->hasError() and print ' errors' ?>">
    <?php echo $form['has_keys']->renderError() ?>
    <div>
      <?php echo $form['has_keys']->renderLabel() ?>

      <div class="content"><?php echo $form['has_keys']->render($attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes) ?>
      <?php if($form->getObject()->getKeysReturned()): ?>
        <div class="help">Returned on <?php echo $form->getObject()->getKeysReturned(sfConfig::get('app_settings_date_format', 'm/d/Y')) ?></div>
      <?php endif; ?>
      </div>

    </div>
  </div>