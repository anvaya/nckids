<h1>Note Entries: <?php echo $client->getFullName() ?></h1>


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
          <th>Modified</th>
        </tr>
      </thead>
      <tbody>

          <?php foreach($entries as $note_entry): ?>
            <tr<?php echo (($note_entry->getAbsent())? ' class="absent_note"': '') ?>>
              <td><a href="<?php echo url_for('entry/edit?id='.$note_entry->getId()) ?>"><?php echo $note_entry->getClientService()->getService() ?></a></td>
              <td><?php echo $note_entry->getOffice() ?></td>
              <td><?php echo $note_entry->getFrequency() ?></td>
              <td><?php echo $note_entry->getServiceDate('m/d/Y') ?></td>
              <td><?php echo $note_entry->getTimeIn('h:i A') ?></td>
              <td><?php echo $note_entry->getTimeOut('h:i A') ?></td>
              <td><?php echo $note_entry->getUnits() ?>
                <?php if($note_entry->getAbsent()): ?>
                (<?php echo NoteEntryPeer::getAbsentName($note_entry->getAbsent()) ?>)
                <?php endif; ?>
              </td>
              <td><?php echo $note_entry->getUpdatedAt('m/d/Y') ?></td>
            </tr>
          <?php endforeach; ?>
      </tbody>
    </table>

