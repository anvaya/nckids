<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<form action="<?php echo url_for('program/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields() ?>
          &nbsp;<a href="<?php echo url_for('program/index') ?>">Cancel</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'program/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['client_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['client_id']->renderError() ?>
          <?php if($title == 'ClientServiceForm'): ?>
            <?php echo $form['client_id'] ?>
          <?php else: ?>
            <input type="hidden" id="client_service_client_id" value="<?php echo $form->getObject()->getClientId() ?>" name="client_service[client_id]" />
          <?php endif; ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['employee_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['employee_id']->renderError() ?>
          <?php echo $form['employee_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['service_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['service_id']->renderError() ?>
          <?php echo $form['service_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['frequency_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['frequency_id']->renderError() ?>
          <?php echo $form['frequency_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['start_date']->renderLabel() ?></th>
        <td>
          <?php echo $form['start_date']->renderError() ?>
          <?php echo $form['start_date'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['end_date']->renderLabel() ?></th>
        <td>
          <?php echo $form['end_date']->renderError() ?>
          <?php echo $form['end_date'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['change_date']->renderLabel() ?></th>
        <td>
          <?php echo $form['change_date']->renderError() ?>
          <?php echo $form['change_date'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['notes']->renderLabel() ?></th>
        <td>
          <?php echo $form['notes']->renderError() ?>
          <?php echo $form['notes'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['icd9_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['icd9_id']->renderError() ?>
          <?php echo $form['icd9_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['authorization']->renderLabel() ?></th>
        <td>
          <?php echo $form['authorization']->renderError() ?>
          <?php echo $form['authorization'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['physicians_order']->renderLabel() ?></th>
        <td>
          <?php echo $form['physicians_order']->renderError() ?>
          <?php echo $form['physicians_order'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['office_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['office_id']->renderError() ?>
          <?php echo $form['office_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['object_type']->renderLabel() ?></th>
        <td>
          <?php echo $form['object_type']->renderError() ?>
          <?php echo $form['object_type'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
