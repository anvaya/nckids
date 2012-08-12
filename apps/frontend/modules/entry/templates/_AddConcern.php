<div class="concernContainer" id="concernContainer_<?php echo $num ?>">
  <div id="concern_<?php echo $num ?>" class="concernRow">
    <a class="deleteConcern" style="float:right;height:1.5em;line-height:1.5em;padding:0;" href="#concernContainer_<?php echo $num ?>"><img src="/images/icons/delete.png" alt="delete" /></a>
    <?php echo $form['entry_concerns'][$num]['delete']->render(array('class' => 'deleteField')) ?>
    <?php echo $form['entry_concerns'][$num]['id'] ?>

    <div class="aoc">
      <div class="col">
        <div>
          <?php echo $form['entry_concerns'][$num]['area_of_concern_id']->renderLabel() ?>
          <div class="content">
            <?php echo $form['entry_concerns'][$num]['area_of_concern_id']->renderError() ?>
            <?php echo $form['entry_concerns'][$num]['area_of_concern_id']->render(array('class' => 'concernSelector', 'rel' => 'note_entry_entry_concerns_' . $num . '_objective_id')) ?>
          </div>
        </div>
      </div>

      <div class="col">
        <div>
          <?php echo $form['entry_concerns'][$num]['objective_id']->renderLabel() ?>
            <div class="content">
            <?php echo $form['entry_concerns'][$num]['objective_id']->renderError() ?>
            <?php echo $form['entry_concerns'][$num]['objective_id']->render(array('class' => 'objectiveSelector')) ?>
          </div>
        </div>
      </div>
      <br style="clear:both" />

      <div class="col">
        <div>
          <?php echo $form['entry_concerns'][$num]['prompt_id']->renderLabel() ?>
            <div class="content">
            <?php echo $form['entry_concerns'][$num]['prompt_id']->renderError() ?>
            <?php echo $form['entry_concerns'][$num]['prompt_id']->render() ?>
          </div>
        </div>
      </div>

      <div class="col">
        <div>
          <?php echo $form['entry_concerns'][$num]['level_id']->renderLabel() ?>
            <div class="content">
            <?php echo $form['entry_concerns'][$num]['level_id']->renderError() ?>
            <?php echo $form['entry_concerns'][$num]['level_id']->render() ?>
          </div>
        </div>
      </div>

      <div class="col">
        <div>
          <?php echo $form['entry_concerns'][$num]['accuracy']->renderLabel() ?>
            <div class="content">
            <?php echo $form['entry_concerns'][$num]['accuracy']->renderError() ?>
            <?php echo $form['entry_concerns'][$num]['accuracy']->render() ?>
          </div>
        </div>
      </div>
      <br style="clear:both" />
    </div>
  </div>
</div>