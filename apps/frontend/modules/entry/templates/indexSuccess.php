<h1>Note Entries</h1>
<?php if($sf_request->getParameter('show_all', false)): ?>
  <a href="<?php echo url_for('entry/index') ?>">Show current month's note entries</a>
<?php else: ?>
  <a href="<?php echo url_for('entry/index?show_all=true') ?>">Show last months note entries</a>
<?php endif; ?>

<?php foreach ($client_entries as $client): ?>

    <h2><a href="<?php echo url_for('entry/showClient?id='.$client['client']->getId()) ?>"><?php echo $client['client'] ?></a></h2>
    <table width="100%">
      <thead>
        <tr>
          <th>Service</th>
          <th>Location</th>
          <th>Frequency</th>
          <th>Service date</th>
          <th>Time in</th>
          <th>Time out</th>
          <th>Units</th>
        </tr>
      </thead>
      <tbody>

          <?php foreach($client['entries'] as $note_entry): ?>
          <?php $overlaps = $note_entry->getOverlaps(); ?>
            <tr class="<?php echo (($note_entry->getAbsent())? 'absent_note ': '') ?><?php echo ((count($overlaps))? 'overlap ': '') ?>"">
              <td><a href="<?php echo url_for('entry/edit?id='.$note_entry->getId()) ?>"><?php echo ($note_entry->getClientService())? $note_entry->getClientService()->getService():'none' ?></a></td>
              <td><?php echo $note_entry->getLocation() ?></td>
              <td><?php echo $note_entry->getFrequency() ?></td>
              <td><?php echo $note_entry->getServiceDate('m/d/Y') ?></td>
              <td><?php echo $note_entry->getTimeIn('h:i A') ?></td>
              <td><?php echo $note_entry->getTimeOut('h:i A') ?></td>
              <td><?php echo $note_entry->getUnits() ?>
                <?php if($note_entry->getAbsent()): ?>
                (<?php echo NoteEntryPeer::getAbsentName($note_entry->getAbsent()) ?>)
                <?php endif; ?>
              </td>
            </tr>

            <?php foreach($overlaps as $overlap): ?>
            <tr class="overlap">
              <td></td>
              <td><?php echo $overlap->getEmployee()->getFullName() ?></td>
              <td><?php echo $overlap->getClientService()->getService() ?></td>
              <td><?php echo $overlap->getServiceDate('m/d/Y') ?></td>
              <td><strong><?php echo $overlap->getTimeIn('h:i A') ?></strong></td>
              <td><strong><?php echo $overlap->getTimeOut('h:i A') ?></strong></td>
              <td></td>
            </tr>
            <?php endforeach; ?>


          <?php endforeach; ?>
      </tbody>
    </table>
<?php endforeach; ?>

  
