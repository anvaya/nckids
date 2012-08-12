<style type="text/css">

  .colHolder {
    overflow: hidden;
    margin: 0 0 5px 0;
    clear: both;
  }
  .twoCol {
    overflow: hidden;
  }
  .col {
    float: left;
    display: inline;
  }
  .col > div {
    margin: 5px;
    padding: 5px;
    overflow:hidden;
  }

  .twoCol .col {
    width: 50%;
  }
  .threeCol .col {
    width: 33.33%;
  }
  form .form label { display: block; float: none; text-align: left; }

  form .form input[type="text"], form .form textarea, form .form select {
    width: 250px;
  }


  .aoc {
    background-color: #DEDEDE;
    border-bottom: solid 2px #414141;
  }

  #area_of_concern_id { width:600px; }
form .form .multiSelectOptions label {
display:block;
float:none;
font-weight:bold;
text-align:left;
width: 90%;
}

#addButton {
  text-align: right;
  padding: 10px;
}
#addAOC {
  font-weight: bold;
  font-size: 1.4em;

}

</style>
<h2>Daily Note Entry</h2>
<form>
  <div class="form">



    <div class="colHolder threeCol">

      <div class="col">
        <div>
          <label for="client_id">Client</label>
          <div class="content">
            <select id="client_id" name="client_id">
              <option>Select...</option>
              <option value="1">Matt Drollette</option>
              <option value="2">Brian Kinney</option>
            </select>
          </div>
        </div>
      </div>

      <div class="col">
        <div>
          <label>Service Location</label>
          <div class="content">
            <input type="text" />
          </div>
        </div>
      </div>

      <div class="col">
        <div>
          <label>IEP Frequency</label>
          <div class="content">
            <input type="text" />
          </div>
        </div>
      </div>

    </div>


    <div class="colHolder threeCol">

      <div class="col">
        <div>
          <label>Service Date</label>
          <div class="content">
            <input class="date" type="text" />
          </div>
        </div>
      </div>

      <div class="col">
        <div>
          <label>Time In</label>
          <div class="content">
            <input class="time" type="text" />
          </div>
        </div>
      </div>

      <div class="col">
        <div>
          <label>Time Out</label>
          <div class="content">
            <input class="time" type="text" />
          </div>
        </div>
      </div>

    </div>

    <div class="colHolder threeCol">

      <div class="col">
        <div>
          <label>CPT Code</label>
          <div class="content">
            <input type="text" />
          </div>
        </div>
      </div>

      <div class="col">
        <div>
          <label>Missed Service</label>
          <div class="content">
            <input id="missed_service" type="checkbox" />
          </div>
        </div>
      </div>

      <div class="col">
        <div>
          <label>Units</label>
          <div class="content">
            <input type="text" />
          </div>
        </div>
      </div>

    </div>



    <div class="colHolder twoCol">

      <div class="col leftCol">
        <div>
          <label>Comments/Notes</label>
          <div class="content">
            <textarea></textarea>
          </div>
        </div>
      </div>

      <div class="col rightCol">
        <div>
          <label>Group</label>
          <div class="content">
            <select id="group_kid_ids" name="group_kid_ids">
              <option></option>
              <option value="1">Matt Drollette</option>
              <option value="2">Brian Kinney</option>
            </select>
          </div>
        </div>
      </div>

    </div>

  <div id="aoc_section">
    <h2>Areas of Concern</h2>

    <div id="aocHolder">
      <div class="aoc">
        <div class="col">
          <div>
            <label for="area_of_concern_id">Area of Concern</label>
            <div class="content">
              <select id="area_of_concern_id" name="area_of_concern_id">
                <option>Select...</option>
                <option value="1">Some area</option>
                <option value="2">Another area</option>
              </select>
            </div>
          </div>
        </div>
        <br style="clear:both" />

        <div class="col">
          <div>
            <label for="objective_id">Objective</label>
            <div class="content">
              <select id="objective_id" name="objective_id">
                <option>Select...</option>
                <option value="1">Group 1 objective 1</option>
                <option value="2">Group 1 objective 2</option>
              </select>
            </div>
          </div>
        </div>

        <div class="col">
          <div>
            <label for="prompt_id">Prompt</label>
            <div class="content">
              <select id="prompt_id" name="prompt_id">
                <option>Select...</option>
                <option value="1">Prompt 1</option>
                <option value="2">Prompt 2</option>
              </select>
            </div>
          </div>
        </div>

        <div class="col">
          <div>
            <label for="accuracy_id">Accuracy %</label>
            <div class="content">
              <select id="accuracy_id" name="accuracy_id">
                <option>Select...</option>
                <option value="1">10%</option>
                <option value="2">20%</option>
              </select>
            </div>
          </div>
        </div>
        <br style="clear:both" />
      </div>
    </div>

    <div id="addButton">
      <a href="#" id="addAOC"><img src="/images/icons/plus.png" alt="Add Area of Concern" /> Add Area of Concern</a>
    </div>

  </div>



  </div>
</form>

<script type="text/javascript">
  $(document).ready(function(){

    //select client
    $('#client_id').change(function(){
      // do ajax request and get clients settings (district, filtered info, etc)
      if($(this).val() == 1) {
        district = 'Sample District 1';
      } else {
        district = 'Sample District 2';
      }
      $('#school_district').val(district);
    });


    // missed service
    $('#missed_service').click(function(){
      if($(this).attr('checked')) {
        // blind all service details
        $('#aoc_section').hide();
      } else {
        // unblind all service details
        $('#aoc_section').show();
      }
    });



    $('#addAOC').click(function(){
      // do ajax call to get a new form with additional entry
      $('.aoc:first').clone().appendTo('#aocHolder');
      return false;
    });

    // masked inputs
    $(".time").mask("99:99");
    $(".date").mask("99-99-9999");



    $('#group_kid_ids').multiSelect({ oneOrMoreSelected: '*' });


  });
</script>