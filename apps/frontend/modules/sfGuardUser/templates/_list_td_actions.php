<td>
    <?php echo $helper->linkToEdit($sf_guard_user, array(  'params' =>   array( 'class' => 'edit' ),  'class_suffix' => 'edit',  'label' => 'Edit',)) ?>
    <?php echo $helper->linkToDelete($sf_guard_user, array(  'params' =>   array( 'class' => 'delete' ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
</td>
