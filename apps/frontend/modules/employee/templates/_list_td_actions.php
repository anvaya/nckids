<td class="noprint">

    <?php echo $helper->linkToEdit($employee, array(  'params' =>   array( 'class' => 'edit' ),  'class_suffix' => 'edit',  'label' => 'Edit',)) ?>
    <?php echo $helper->linkToDelete($employee, array(  'params' =>   array( 'class' => 'delete' ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
    <?php echo link_to(__('Badge', array(), 'messages'), 'employee/printBadge?id='.$employee->getId(), array( 'class' => 'publish')) ?>

</td>
