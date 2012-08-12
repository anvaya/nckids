  <div class="sf_admin_form_row sf_admin_date sf_admin_form_field_has_dist_list<?php $form['has_dist_list']->hasError() and print ' errors' ?>">
    <?php echo $form['has_dist_list']->renderError() ?>
    <div>
      <?php echo $form['has_dist_list']->renderLabel() ?>

      <div class="content"><?php echo $form['has_dist_list']->render($attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes) ?>
      <?php if($form->getObject()->getDistListRemoved()): ?>
        <div class="help">Returned on <?php echo $form->getObject()->getDistListRemoved(sfConfig::get('app_settings_date_format', 'm/d/Y')) ?></div>
      <?php endif; ?>
      </div>

    </div>
  </div>