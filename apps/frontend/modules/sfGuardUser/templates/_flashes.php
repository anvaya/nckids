<?php if ($sf_user->hasFlash('notice')): ?>
<!-- Success Box -->
<div class="success"><span>Congratulations!</span>
        <p><?php echo __($sf_user->getFlash('notice'), array(), 'sf_admin') ?></p>
</div>
<!-- Success Box -->
<?php endif; ?>

<?php if ($sf_user->hasFlash('error')): ?>
<!-- Error Box -->
<div class="error"><span>Error!</span>
        <p> <?php echo __($sf_user->getFlash('error'), array(), 'sf_admin') ?></p>
</div>
<!-- Error Box -->
<?php endif; ?>