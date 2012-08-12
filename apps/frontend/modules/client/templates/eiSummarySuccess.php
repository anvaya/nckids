<form action="<?php echo url_for('client/eiSummary') ?>" method="post">
  <ul>
<?php echo $form ?>
  </ul>
  <input type="hidden" value="<?php echo $client->getId() ?>" name="id">
  <input type="submit" value="Submit" class="button">
</form>