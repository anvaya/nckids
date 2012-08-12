<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<form action="<?php echo url_for('provider/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>




<form enctype="multipart/form-data" action="/employee/132" method="post" id="employee_form"><input type="hidden" value="put" name="sf_method">    <input type="hidden" id="employee_id" value="132" name="employee[id]">

          <fieldset id="sf_fieldset_contact">
      <legend>Contact</legend>

            <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_first_name">
        <div>
      <label for="employee_first_name">First Name</label>
      <div class="content"><input type="text" id="employee_first_name" value="Shannon" name="employee[first_name]"></div>

          </div>
  </div>
            <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_last_name">
        <div>
      <label for="employee_last_name">Last Name</label>
      <div class="content"><input type="text" id="employee_last_name" value="Bartlett" name="employee[last_name]"></div>

          </div>
  </div>
            <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_middle">
        <div>
      <label for="employee_middle">Middle</label>
      <div class="content"><input type="text" id="employee_middle" value="" name="employee[middle]"></div>

          </div>
  </div>
            <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_home_phone">
        <div>
      <label for="employee_home_phone">Home Phone</label>
      <div class="content"><input type="text" id="employee_home_phone" value="(518) 420-4371" name="employee[home_phone]"></div>

          </div>
  </div>
            <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_cell_phone">
        <div>
      <label for="employee_cell_phone">Cell Phone</label>
      <div class="content"><input type="text" id="employee_cell_phone" value="" name="employee[cell_phone]"></div>

          </div>
  </div>
            <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_company_email">
        <div>
      <label for="employee_company_email">Company Email</label>
      <div class="content"><input type="text" id="employee_company_email" value="" name="employee[company_email]"></div>

          </div>
  </div>
            <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_personal_email">
        <div>
      <label for="employee_personal_email">Personal Email</label>
      <div class="content"><input type="text" id="employee_personal_email" value="" name="employee[personal_email]"></div>

          </div>
  </div>
            <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_address">
        <div>
      <label for="employee_address">Address</label>
      <div class="content"><input type="text" id="employee_address" value="32 Maine Road" name="employee[address]"></div>

          </div>
  </div>
            <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_address_2">
        <div>
      <label for="employee_address_2">Address 2</label>
      <div class="content"><input type="text" id="employee_address_2" value="" name="employee[address_2]"></div>

          </div>
  </div>
            <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_city">
        <div>
      <label for="employee_city">City</label>
      <div class="content"><input type="text" id="employee_city" value="Plattsburgh" name="employee[city]"></div>

          </div>
  </div>
            <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_state">
        <div>
      <label for="employee_state">State</label>
      <div class="content"><input type="text" id="employee_state" value="New York" name="employee[state]"></div>

          </div>
  </div>
            <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_zip">
        <div>
      <label for="employee_zip">ZIP</label>
      <div class="content"><input type="text" id="employee_zip" value="12901" name="employee[zip]"></div>

          </div>
  </div>
            <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_county">
        <div>
      <label for="employee_county">County</label>
      <div class="content"><input type="text" id="employee_county" value="" name="employee[county]"></div>

          </div>
  </div>
  </fieldset>          <fieldset id="sf_fieldset_personal">
      <legend>Personal</legend>

            <div class="sf_admin_form_row sf_admin_date sf_admin_form_field_dob">
        <div>
      <label for="employee_dob">DOB</label>
      <div class="content"><select id="employee_dob_month" name="employee[dob][month]" class="date">
<option value=""></option>
<option value="1">01</option>
<option selected="selected" value="2">02</option>
<option value="3">03</option>
<option value="4">04</option>
<option value="5">05</option>
<option value="6">06</option>
<option value="7">07</option>
<option value="8">08</option>
<option value="9">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
</select>/<select id="employee_dob_day" name="employee[dob][day]" class="date">
<option value=""></option>
<option value="1">01</option>
<option value="2">02</option>
<option value="3">03</option>
<option value="4">04</option>
<option value="5">05</option>
<option value="6">06</option>
<option value="7">07</option>
<option value="8">08</option>
<option value="9">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option selected="selected" value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>/<select id="employee_dob_year" name="employee[dob][year]" class="date">
<option value=""></option>
<option value="2015">2015</option>
<option value="2014">2014</option>
<option value="2013">2013</option>
<option value="2012">2012</option>
<option value="2011">2011</option>
<option value="2010">2010</option>
<option value="2009">2009</option>
<option value="2008">2008</option>
<option value="2007">2007</option>
<option value="2006">2006</option>
<option value="2005">2005</option>
<option value="2004">2004</option>
<option value="2003">2003</option>
<option value="2002">2002</option>
<option value="2001">2001</option>
<option value="2000">2000</option>
<option value="1999">1999</option>
<option value="1998">1998</option>
<option value="1997">1997</option>
<option value="1996">1996</option>
<option value="1995">1995</option>
<option value="1994">1994</option>
<option value="1993">1993</option>
<option value="1992">1992</option>
<option value="1991">1991</option>
<option value="1990">1990</option>
<option value="1989">1989</option>
<option value="1988">1988</option>
<option value="1987">1987</option>
<option value="1986">1986</option>
<option value="1985">1985</option>
<option value="1984">1984</option>
<option value="1983">1983</option>
<option value="1982">1982</option>
<option value="1981">1981</option>
<option value="1980">1980</option>
<option value="1979">1979</option>
<option selected="selected" value="1978">1978</option>
<option value="1977">1977</option>
<option value="1976">1976</option>
<option value="1975">1975</option>
<option value="1974">1974</option>
<option value="1973">1973</option>
<option value="1972">1972</option>
<option value="1971">1971</option>
<option value="1970">1970</option>
<option value="1969">1969</option>
<option value="1968">1968</option>
<option value="1967">1967</option>
<option value="1966">1966</option>
<option value="1965">1965</option>
<option value="1964">1964</option>
<option value="1963">1963</option>
<option value="1962">1962</option>
<option value="1961">1961</option>
<option value="1960">1960</option>
<option value="1959">1959</option>
<option value="1958">1958</option>
<option value="1957">1957</option>
<option value="1956">1956</option>
<option value="1955">1955</option>
<option value="1954">1954</option>
<option value="1953">1953</option>
<option value="1952">1952</option>
<option value="1951">1951</option>
<option value="1950">1950</option>
<option value="1949">1949</option>
<option value="1948">1948</option>
<option value="1947">1947</option>
<option value="1946">1946</option>
<option value="1945">1945</option>
<option value="1944">1944</option>
<option value="1943">1943</option>
<option value="1942">1942</option>
<option value="1941">1941</option>
<option value="1940">1940</option>
<option value="1939">1939</option>
<option value="1938">1938</option>
<option value="1937">1937</option>
<option value="1936">1936</option>
<option value="1935">1935</option>
<option value="1934">1934</option>
<option value="1933">1933</option>
<option value="1932">1932</option>
<option value="1931">1931</option>
<option value="1930">1930</option>
<option value="1929">1929</option>
<option value="1928">1928</option>
<option value="1927">1927</option>
<option value="1926">1926</option>
<option value="1925">1925</option>
<option value="1924">1924</option>
<option value="1923">1923</option>
<option value="1922">1922</option>
<option value="1921">1921</option>
<option value="1920">1920</option>
<option value="1919">1919</option>
<option value="1918">1918</option>
<option value="1917">1917</option>
<option value="1916">1916</option>
<option value="1915">1915</option>
<option value="1914">1914</option>
<option value="1913">1913</option>
<option value="1912">1912</option>
<option value="1911">1911</option>
<option value="1910">1910</option>
</select><input type="hidden" disabled="disabled" id="employee_dob_jquery_control" size="10" class="date hasDatepicker"><img class="ui-datepicker-trigger" src="/images/calendar.png" alt="..." title="..."><script type="text/javascript">
  function wfd_employee_dob_read_linked()
  {
    jQuery("#employee_dob_jquery_control").val(jQuery("#employee_dob_year").val() + "-" + jQuery("#employee_dob_month").val() + "-" + jQuery("#employee_dob_day").val());

    return {};
  }

  function wfd_employee_dob_update_linked(date)
  {
    jQuery("#employee_dob_year").val(date.substring(0, 4));
    jQuery("#employee_dob_month").val(date.substring(5, 7));
    jQuery("#employee_dob_day").val(date.substring(8));
  }

  function wfd_employee_dob_check_linked_days()
  {
    var daysInMonth = 32 - new Date(jQuery("#employee_dob_year").val(), jQuery("#employee_dob_month").val() - 1, 32).getDate();
    jQuery("#employee_dob_day option").attr("disabled", "");
    jQuery("#employee_dob_day option:gt(" + (daysInMonth) +")").attr("disabled", "disabled");

    if (jQuery("#employee_dob_day").val() &gt; daysInMonth)
    {
      jQuery("#employee_dob_day").val(daysInMonth);
    }
  }

  jQuery(document).ready(function() {
    jQuery("#employee_dob_jquery_control").datepicker(jQuery.extend({}, {
      minDate:    new Date(1910, 1 - 1, 1),
      maxDate:    new Date(2015, 12 - 1, 31),
      beforeShow: wfd_employee_dob_read_linked,
      onSelect:   wfd_employee_dob_update_linked,
      showOn:     "button"
      , buttonImage: "/images/calendar.png", buttonImageOnly: true
    }, jQuery.datepicker.regional[""], {changeYear:true, yearRange: '1920:2009'}, {dateFormat: "yy-mm-dd"}));
  });

  jQuery("#employee_dob_day, #employee_dob_month, #employee_dob_year").change(wfd_employee_dob_check_linked_days);
</script></div>

          </div>
  </div>
            <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_ssn">
        <div>
      <label for="employee_ssn">SSN</label>
      <div class="content"><input type="text" id="employee_ssn" value="008-76-0129" name="employee[ssn]"></div>

          </div>
  </div>
            <div class="sf_admin_form_row sf_admin_date sf_admin_form_field_doh">
        <div>
      <label for="employee_doh">Date of Hire</label>
      <div class="content"><select id="employee_doh_month" name="employee[doh][month]" class="date">
<option value=""></option>
<option value="1">01</option>
<option value="2">02</option>
<option value="3">03</option>
<option selected="selected" value="4">04</option>
<option value="5">05</option>
<option value="6">06</option>
<option value="7">07</option>
<option value="8">08</option>
<option value="9">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
</select>/<select id="employee_doh_day" name="employee[doh][day]" class="date">
<option value=""></option>
<option value="1">01</option>
<option value="2">02</option>
<option value="3">03</option>
<option value="4">04</option>
<option selected="selected" value="5">05</option>
<option value="6">06</option>
<option value="7">07</option>
<option value="8">08</option>
<option value="9">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>/<select id="employee_doh_year" name="employee[doh][year]" class="date">
<option value=""></option>
<option value="2015">2015</option>
<option value="2014">2014</option>
<option value="2013">2013</option>
<option value="2012">2012</option>
<option value="2011">2011</option>
<option selected="selected" value="2010">2010</option>
<option value="2009">2009</option>
<option value="2008">2008</option>
<option value="2007">2007</option>
<option value="2006">2006</option>
<option value="2005">2005</option>
<option value="2004">2004</option>
<option value="2003">2003</option>
<option value="2002">2002</option>
<option value="2001">2001</option>
<option value="2000">2000</option>
<option value="1999">1999</option>
<option value="1998">1998</option>
<option value="1997">1997</option>
<option value="1996">1996</option>
<option value="1995">1995</option>
<option value="1994">1994</option>
<option value="1993">1993</option>
<option value="1992">1992</option>
<option value="1991">1991</option>
<option value="1990">1990</option>
<option value="1989">1989</option>
<option value="1988">1988</option>
<option value="1987">1987</option>
<option value="1986">1986</option>
<option value="1985">1985</option>
<option value="1984">1984</option>
<option value="1983">1983</option>
<option value="1982">1982</option>
<option value="1981">1981</option>
<option value="1980">1980</option>
<option value="1979">1979</option>
<option value="1978">1978</option>
<option value="1977">1977</option>
<option value="1976">1976</option>
<option value="1975">1975</option>
<option value="1974">1974</option>
<option value="1973">1973</option>
<option value="1972">1972</option>
<option value="1971">1971</option>
<option value="1970">1970</option>
<option value="1969">1969</option>
<option value="1968">1968</option>
<option value="1967">1967</option>
<option value="1966">1966</option>
<option value="1965">1965</option>
<option value="1964">1964</option>
<option value="1963">1963</option>
<option value="1962">1962</option>
<option value="1961">1961</option>
<option value="1960">1960</option>
<option value="1959">1959</option>
<option value="1958">1958</option>
<option value="1957">1957</option>
<option value="1956">1956</option>
<option value="1955">1955</option>
<option value="1954">1954</option>
<option value="1953">1953</option>
<option value="1952">1952</option>
<option value="1951">1951</option>
<option value="1950">1950</option>
<option value="1949">1949</option>
<option value="1948">1948</option>
<option value="1947">1947</option>
<option value="1946">1946</option>
<option value="1945">1945</option>
<option value="1944">1944</option>
<option value="1943">1943</option>
<option value="1942">1942</option>
<option value="1941">1941</option>
<option value="1940">1940</option>
<option value="1939">1939</option>
<option value="1938">1938</option>
<option value="1937">1937</option>
<option value="1936">1936</option>
<option value="1935">1935</option>
<option value="1934">1934</option>
<option value="1933">1933</option>
<option value="1932">1932</option>
<option value="1931">1931</option>
<option value="1930">1930</option>
<option value="1929">1929</option>
<option value="1928">1928</option>
<option value="1927">1927</option>
<option value="1926">1926</option>
<option value="1925">1925</option>
<option value="1924">1924</option>
<option value="1923">1923</option>
<option value="1922">1922</option>
<option value="1921">1921</option>
<option value="1920">1920</option>
<option value="1919">1919</option>
<option value="1918">1918</option>
<option value="1917">1917</option>
<option value="1916">1916</option>
<option value="1915">1915</option>
<option value="1914">1914</option>
<option value="1913">1913</option>
<option value="1912">1912</option>
<option value="1911">1911</option>
<option value="1910">1910</option>
</select><input type="hidden" disabled="disabled" id="employee_doh_jquery_control" size="10" class="date hasDatepicker"><img class="ui-datepicker-trigger" src="/images/calendar.png" alt="..." title="..."><script type="text/javascript">
  function wfd_employee_doh_read_linked()
  {
    jQuery("#employee_doh_jquery_control").val(jQuery("#employee_doh_year").val() + "-" + jQuery("#employee_doh_month").val() + "-" + jQuery("#employee_doh_day").val());

    return {};
  }

  function wfd_employee_doh_update_linked(date)
  {
    jQuery("#employee_doh_year").val(date.substring(0, 4));
    jQuery("#employee_doh_month").val(date.substring(5, 7));
    jQuery("#employee_doh_day").val(date.substring(8));
  }

  function wfd_employee_doh_check_linked_days()
  {
    var daysInMonth = 32 - new Date(jQuery("#employee_doh_year").val(), jQuery("#employee_doh_month").val() - 1, 32).getDate();
    jQuery("#employee_doh_day option").attr("disabled", "");
    jQuery("#employee_doh_day option:gt(" + (daysInMonth) +")").attr("disabled", "disabled");

    if (jQuery("#employee_doh_day").val() &gt; daysInMonth)
    {
      jQuery("#employee_doh_day").val(daysInMonth);
    }
  }

  jQuery(document).ready(function() {
    jQuery("#employee_doh_jquery_control").datepicker(jQuery.extend({}, {
      minDate:    new Date(1910, 1 - 1, 1),
      maxDate:    new Date(2015, 12 - 1, 31),
      beforeShow: wfd_employee_doh_read_linked,
      onSelect:   wfd_employee_doh_update_linked,
      showOn:     "button"
      , buttonImage: "/images/calendar.png", buttonImageOnly: true
    }, jQuery.datepicker.regional[""], {}, {dateFormat: "yy-mm-dd"}));
  });

  jQuery("#employee_doh_day, #employee_doh_month, #employee_doh_year").change(wfd_employee_doh_check_linked_days);
</script></div>

          </div>
  </div>
            <div class="sf_admin_form_row sf_admin_foreignkey sf_admin_form_field_job_id">
        <div>
      <label for="employee_job_id">Job Title</label>
      <div class="content"><select id="employee_job_id" name="employee[job_id]">
<option value=""></option>
<option value="1">Network Administrator</option>
<option value="2">Transcriber</option>
<option selected="selected" value="3">Classroom Teacher Assistant</option>
<option value="4">Psychologist</option>
<option value="5">Occupational Therapist</option>
<option value="6">Classroom Teacher</option>
<option value="7">Special Instruction</option>
<option value="8">Speech Language Pathologist</option>
<option value="9">Physical Therapist</option>
<option value="10">Office Support</option>
<option value="11">Administrator</option>
<option value="12">Accountant</option>
<option value="13">EI Paraprofessional</option>
<option value="14">Occupational Therapist Assistant</option>
<option value="15">Music Therapist</option>
<option value="16">Teacher of the Speech and Hearing Handicapped</option>
<option value="17">Teacher of Deaf</option>
<option value="18">Counselor</option>
</select></div>

          </div>
  </div>
            <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_license_number">
        <div>
      <label for="employee_license_number">License Number</label>
      <div class="content"><input type="text" id="employee_license_number" value="" name="employee[license_number]"></div>

          </div>
  </div>
            <div class="sf_admin_form_row sf_admin_date sf_admin_form_field_license_expiration">
        <div>
      <label for="employee_license_expiration">License Expires</label>
      <div class="content"><select id="employee_license_expiration_month" name="employee[license_expiration][month]" class="date">
<option selected="selected" value=""></option>
<option value="1">01</option>
<option value="2">02</option>
<option value="3">03</option>
<option value="4">04</option>
<option value="5">05</option>
<option value="6">06</option>
<option value="7">07</option>
<option value="8">08</option>
<option value="9">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
</select>/<select id="employee_license_expiration_day" name="employee[license_expiration][day]" class="date">
<option selected="selected" value=""></option>
<option value="1">01</option>
<option value="2">02</option>
<option value="3">03</option>
<option value="4">04</option>
<option value="5">05</option>
<option value="6">06</option>
<option value="7">07</option>
<option value="8">08</option>
<option value="9">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>/<select id="employee_license_expiration_year" name="employee[license_expiration][year]" class="date">
<option selected="selected" value=""></option>
<option value="2015">2015</option>
<option value="2014">2014</option>
<option value="2013">2013</option>
<option value="2012">2012</option>
<option value="2011">2011</option>
<option value="2010">2010</option>
<option value="2009">2009</option>
<option value="2008">2008</option>
<option value="2007">2007</option>
<option value="2006">2006</option>
<option value="2005">2005</option>
<option value="2004">2004</option>
<option value="2003">2003</option>
<option value="2002">2002</option>
<option value="2001">2001</option>
<option value="2000">2000</option>
<option value="1999">1999</option>
<option value="1998">1998</option>
<option value="1997">1997</option>
<option value="1996">1996</option>
<option value="1995">1995</option>
<option value="1994">1994</option>
<option value="1993">1993</option>
<option value="1992">1992</option>
<option value="1991">1991</option>
<option value="1990">1990</option>
<option value="1989">1989</option>
<option value="1988">1988</option>
<option value="1987">1987</option>
<option value="1986">1986</option>
<option value="1985">1985</option>
<option value="1984">1984</option>
<option value="1983">1983</option>
<option value="1982">1982</option>
<option value="1981">1981</option>
<option value="1980">1980</option>
<option value="1979">1979</option>
<option value="1978">1978</option>
<option value="1977">1977</option>
<option value="1976">1976</option>
<option value="1975">1975</option>
<option value="1974">1974</option>
<option value="1973">1973</option>
<option value="1972">1972</option>
<option value="1971">1971</option>
<option value="1970">1970</option>
<option value="1969">1969</option>
<option value="1968">1968</option>
<option value="1967">1967</option>
<option value="1966">1966</option>
<option value="1965">1965</option>
<option value="1964">1964</option>
<option value="1963">1963</option>
<option value="1962">1962</option>
<option value="1961">1961</option>
<option value="1960">1960</option>
<option value="1959">1959</option>
<option value="1958">1958</option>
<option value="1957">1957</option>
<option value="1956">1956</option>
<option value="1955">1955</option>
<option value="1954">1954</option>
<option value="1953">1953</option>
<option value="1952">1952</option>
<option value="1951">1951</option>
<option value="1950">1950</option>
<option value="1949">1949</option>
<option value="1948">1948</option>
<option value="1947">1947</option>
<option value="1946">1946</option>
<option value="1945">1945</option>
<option value="1944">1944</option>
<option value="1943">1943</option>
<option value="1942">1942</option>
<option value="1941">1941</option>
<option value="1940">1940</option>
<option value="1939">1939</option>
<option value="1938">1938</option>
<option value="1937">1937</option>
<option value="1936">1936</option>
<option value="1935">1935</option>
<option value="1934">1934</option>
<option value="1933">1933</option>
<option value="1932">1932</option>
<option value="1931">1931</option>
<option value="1930">1930</option>
<option value="1929">1929</option>
<option value="1928">1928</option>
<option value="1927">1927</option>
<option value="1926">1926</option>
<option value="1925">1925</option>
<option value="1924">1924</option>
<option value="1923">1923</option>
<option value="1922">1922</option>
<option value="1921">1921</option>
<option value="1920">1920</option>
<option value="1919">1919</option>
<option value="1918">1918</option>
<option value="1917">1917</option>
<option value="1916">1916</option>
<option value="1915">1915</option>
<option value="1914">1914</option>
<option value="1913">1913</option>
<option value="1912">1912</option>
<option value="1911">1911</option>
<option value="1910">1910</option>
</select><input type="hidden" disabled="disabled" id="employee_license_expiration_jquery_control" size="10" class="date hasDatepicker"><img class="ui-datepicker-trigger" src="/images/calendar.png" alt="..." title="..."><script type="text/javascript">
  function wfd_employee_license_expiration_read_linked()
  {
    jQuery("#employee_license_expiration_jquery_control").val(jQuery("#employee_license_expiration_year").val() + "-" + jQuery("#employee_license_expiration_month").val() + "-" + jQuery("#employee_license_expiration_day").val());

    return {};
  }

  function wfd_employee_license_expiration_update_linked(date)
  {
    jQuery("#employee_license_expiration_year").val(date.substring(0, 4));
    jQuery("#employee_license_expiration_month").val(date.substring(5, 7));
    jQuery("#employee_license_expiration_day").val(date.substring(8));
  }

  function wfd_employee_license_expiration_check_linked_days()
  {
    var daysInMonth = 32 - new Date(jQuery("#employee_license_expiration_year").val(), jQuery("#employee_license_expiration_month").val() - 1, 32).getDate();
    jQuery("#employee_license_expiration_day option").attr("disabled", "");
    jQuery("#employee_license_expiration_day option:gt(" + (daysInMonth) +")").attr("disabled", "disabled");

    if (jQuery("#employee_license_expiration_day").val() &gt; daysInMonth)
    {
      jQuery("#employee_license_expiration_day").val(daysInMonth);
    }
  }

  jQuery(document).ready(function() {
    jQuery("#employee_license_expiration_jquery_control").datepicker(jQuery.extend({}, {
      minDate:    new Date(1910, 1 - 1, 1),
      maxDate:    new Date(2015, 12 - 1, 31),
      beforeShow: wfd_employee_license_expiration_read_linked,
      onSelect:   wfd_employee_license_expiration_update_linked,
      showOn:     "button"
      , buttonImage: "/images/calendar.png", buttonImageOnly: true
    }, jQuery.datepicker.regional[""], {}, {dateFormat: "yy-mm-dd"}));
  });

  jQuery("#employee_license_expiration_day, #employee_license_expiration_month, #employee_license_expiration_year").change(wfd_employee_license_expiration_check_linked_days);
</script></div>

          </div>
  </div>
            <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_tc_type">
        <div>
      <label for="employee_tc_type">Teacher Cert. Type</label>
      <div class="content"><select id="employee_tc_type" name="employee[tc_type]">
<option selected="selected" value="0"></option>
<option value="1">Initial</option>
<option value="2">Provisional</option>
<option value="3">Permanent</option>
<option value="4">Professional</option>
</select></div>

          </div>
  </div>
            <div class="sf_admin_form_row sf_admin_date sf_admin_form_field_tc_effective">
        <div>
      <label for="employee_tc_effective">Teacher Cert. Effective</label>
      <div class="content"><select id="employee_tc_effective_month" name="employee[tc_effective][month]" class="date">
<option selected="selected" value=""></option>
<option value="1">01</option>
<option value="2">02</option>
<option value="3">03</option>
<option value="4">04</option>
<option value="5">05</option>
<option value="6">06</option>
<option value="7">07</option>
<option value="8">08</option>
<option value="9">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
</select>/<select id="employee_tc_effective_day" name="employee[tc_effective][day]" class="date">
<option selected="selected" value=""></option>
<option value="1">01</option>
<option value="2">02</option>
<option value="3">03</option>
<option value="4">04</option>
<option value="5">05</option>
<option value="6">06</option>
<option value="7">07</option>
<option value="8">08</option>
<option value="9">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>/<select id="employee_tc_effective_year" name="employee[tc_effective][year]" class="date">
<option selected="selected" value=""></option>
<option value="2015">2015</option>
<option value="2014">2014</option>
<option value="2013">2013</option>
<option value="2012">2012</option>
<option value="2011">2011</option>
<option value="2010">2010</option>
<option value="2009">2009</option>
<option value="2008">2008</option>
<option value="2007">2007</option>
<option value="2006">2006</option>
<option value="2005">2005</option>
<option value="2004">2004</option>
<option value="2003">2003</option>
<option value="2002">2002</option>
<option value="2001">2001</option>
<option value="2000">2000</option>
<option value="1999">1999</option>
<option value="1998">1998</option>
<option value="1997">1997</option>
<option value="1996">1996</option>
<option value="1995">1995</option>
<option value="1994">1994</option>
<option value="1993">1993</option>
<option value="1992">1992</option>
<option value="1991">1991</option>
<option value="1990">1990</option>
<option value="1989">1989</option>
<option value="1988">1988</option>
<option value="1987">1987</option>
<option value="1986">1986</option>
<option value="1985">1985</option>
<option value="1984">1984</option>
<option value="1983">1983</option>
<option value="1982">1982</option>
<option value="1981">1981</option>
<option value="1980">1980</option>
<option value="1979">1979</option>
<option value="1978">1978</option>
<option value="1977">1977</option>
<option value="1976">1976</option>
<option value="1975">1975</option>
<option value="1974">1974</option>
<option value="1973">1973</option>
<option value="1972">1972</option>
<option value="1971">1971</option>
<option value="1970">1970</option>
<option value="1969">1969</option>
<option value="1968">1968</option>
<option value="1967">1967</option>
<option value="1966">1966</option>
<option value="1965">1965</option>
<option value="1964">1964</option>
<option value="1963">1963</option>
<option value="1962">1962</option>
<option value="1961">1961</option>
<option value="1960">1960</option>
<option value="1959">1959</option>
<option value="1958">1958</option>
<option value="1957">1957</option>
<option value="1956">1956</option>
<option value="1955">1955</option>
<option value="1954">1954</option>
<option value="1953">1953</option>
<option value="1952">1952</option>
<option value="1951">1951</option>
<option value="1950">1950</option>
<option value="1949">1949</option>
<option value="1948">1948</option>
<option value="1947">1947</option>
<option value="1946">1946</option>
<option value="1945">1945</option>
<option value="1944">1944</option>
<option value="1943">1943</option>
<option value="1942">1942</option>
<option value="1941">1941</option>
<option value="1940">1940</option>
<option value="1939">1939</option>
<option value="1938">1938</option>
<option value="1937">1937</option>
<option value="1936">1936</option>
<option value="1935">1935</option>
<option value="1934">1934</option>
<option value="1933">1933</option>
<option value="1932">1932</option>
<option value="1931">1931</option>
<option value="1930">1930</option>
<option value="1929">1929</option>
<option value="1928">1928</option>
<option value="1927">1927</option>
<option value="1926">1926</option>
<option value="1925">1925</option>
<option value="1924">1924</option>
<option value="1923">1923</option>
<option value="1922">1922</option>
<option value="1921">1921</option>
<option value="1920">1920</option>
<option value="1919">1919</option>
<option value="1918">1918</option>
<option value="1917">1917</option>
<option value="1916">1916</option>
<option value="1915">1915</option>
<option value="1914">1914</option>
<option value="1913">1913</option>
<option value="1912">1912</option>
<option value="1911">1911</option>
<option value="1910">1910</option>
</select><input type="hidden" disabled="disabled" id="employee_tc_effective_jquery_control" size="10" class="date hasDatepicker"><img class="ui-datepicker-trigger" src="/images/calendar.png" alt="..." title="..."><script type="text/javascript">
  function wfd_employee_tc_effective_read_linked()
  {
    jQuery("#employee_tc_effective_jquery_control").val(jQuery("#employee_tc_effective_year").val() + "-" + jQuery("#employee_tc_effective_month").val() + "-" + jQuery("#employee_tc_effective_day").val());

    return {};
  }

  function wfd_employee_tc_effective_update_linked(date)
  {
    jQuery("#employee_tc_effective_year").val(date.substring(0, 4));
    jQuery("#employee_tc_effective_month").val(date.substring(5, 7));
    jQuery("#employee_tc_effective_day").val(date.substring(8));
  }

  function wfd_employee_tc_effective_check_linked_days()
  {
    var daysInMonth = 32 - new Date(jQuery("#employee_tc_effective_year").val(), jQuery("#employee_tc_effective_month").val() - 1, 32).getDate();
    jQuery("#employee_tc_effective_day option").attr("disabled", "");
    jQuery("#employee_tc_effective_day option:gt(" + (daysInMonth) +")").attr("disabled", "disabled");

    if (jQuery("#employee_tc_effective_day").val() &gt; daysInMonth)
    {
      jQuery("#employee_tc_effective_day").val(daysInMonth);
    }
  }

  jQuery(document).ready(function() {
    jQuery("#employee_tc_effective_jquery_control").datepicker(jQuery.extend({}, {
      minDate:    new Date(1910, 1 - 1, 1),
      maxDate:    new Date(2015, 12 - 1, 31),
      beforeShow: wfd_employee_tc_effective_read_linked,
      onSelect:   wfd_employee_tc_effective_update_linked,
      showOn:     "button"
      , buttonImage: "/images/calendar.png", buttonImageOnly: true
    }, jQuery.datepicker.regional[""], {}, {dateFormat: "yy-mm-dd"}));
  });

  jQuery("#employee_tc_effective_day, #employee_tc_effective_month, #employee_tc_effective_year").change(wfd_employee_tc_effective_check_linked_days);
</script></div>

          </div>
  </div>
            <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_tc_number">
        <div>
      <label for="employee_tc_number">Teacher Cert. Number</label>
      <div class="content"><input type="text" id="employee_tc_number" value="" name="employee[tc_number]"></div>

          </div>
  </div>
            <div class="sf_admin_form_row sf_admin_date sf_admin_form_field_tc_exp">
        <div>
      <label for="employee_tc_exp">Cert. Through (expires)</label>
      <div class="content"><select id="employee_tc_exp_month" name="employee[tc_exp][month]" class="date">
<option selected="selected" value=""></option>
<option value="1">01</option>
<option value="2">02</option>
<option value="3">03</option>
<option value="4">04</option>
<option value="5">05</option>
<option value="6">06</option>
<option value="7">07</option>
<option value="8">08</option>
<option value="9">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
</select>/<select id="employee_tc_exp_day" name="employee[tc_exp][day]" class="date">
<option selected="selected" value=""></option>
<option value="1">01</option>
<option value="2">02</option>
<option value="3">03</option>
<option value="4">04</option>
<option value="5">05</option>
<option value="6">06</option>
<option value="7">07</option>
<option value="8">08</option>
<option value="9">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>/<select id="employee_tc_exp_year" name="employee[tc_exp][year]" class="date">
<option selected="selected" value=""></option>
<option value="2015">2015</option>
<option value="2014">2014</option>
<option value="2013">2013</option>
<option value="2012">2012</option>
<option value="2011">2011</option>
<option value="2010">2010</option>
<option value="2009">2009</option>
<option value="2008">2008</option>
<option value="2007">2007</option>
<option value="2006">2006</option>
<option value="2005">2005</option>
<option value="2004">2004</option>
<option value="2003">2003</option>
<option value="2002">2002</option>
<option value="2001">2001</option>
<option value="2000">2000</option>
<option value="1999">1999</option>
<option value="1998">1998</option>
<option value="1997">1997</option>
<option value="1996">1996</option>
<option value="1995">1995</option>
<option value="1994">1994</option>
<option value="1993">1993</option>
<option value="1992">1992</option>
<option value="1991">1991</option>
<option value="1990">1990</option>
<option value="1989">1989</option>
<option value="1988">1988</option>
<option value="1987">1987</option>
<option value="1986">1986</option>
<option value="1985">1985</option>
<option value="1984">1984</option>
<option value="1983">1983</option>
<option value="1982">1982</option>
<option value="1981">1981</option>
<option value="1980">1980</option>
<option value="1979">1979</option>
<option value="1978">1978</option>
<option value="1977">1977</option>
<option value="1976">1976</option>
<option value="1975">1975</option>
<option value="1974">1974</option>
<option value="1973">1973</option>
<option value="1972">1972</option>
<option value="1971">1971</option>
<option value="1970">1970</option>
<option value="1969">1969</option>
<option value="1968">1968</option>
<option value="1967">1967</option>
<option value="1966">1966</option>
<option value="1965">1965</option>
<option value="1964">1964</option>
<option value="1963">1963</option>
<option value="1962">1962</option>
<option value="1961">1961</option>
<option value="1960">1960</option>
<option value="1959">1959</option>
<option value="1958">1958</option>
<option value="1957">1957</option>
<option value="1956">1956</option>
<option value="1955">1955</option>
<option value="1954">1954</option>
<option value="1953">1953</option>
<option value="1952">1952</option>
<option value="1951">1951</option>
<option value="1950">1950</option>
<option value="1949">1949</option>
<option value="1948">1948</option>
<option value="1947">1947</option>
<option value="1946">1946</option>
<option value="1945">1945</option>
<option value="1944">1944</option>
<option value="1943">1943</option>
<option value="1942">1942</option>
<option value="1941">1941</option>
<option value="1940">1940</option>
<option value="1939">1939</option>
<option value="1938">1938</option>
<option value="1937">1937</option>
<option value="1936">1936</option>
<option value="1935">1935</option>
<option value="1934">1934</option>
<option value="1933">1933</option>
<option value="1932">1932</option>
<option value="1931">1931</option>
<option value="1930">1930</option>
<option value="1929">1929</option>
<option value="1928">1928</option>
<option value="1927">1927</option>
<option value="1926">1926</option>
<option value="1925">1925</option>
<option value="1924">1924</option>
<option value="1923">1923</option>
<option value="1922">1922</option>
<option value="1921">1921</option>
<option value="1920">1920</option>
<option value="1919">1919</option>
<option value="1918">1918</option>
<option value="1917">1917</option>
<option value="1916">1916</option>
<option value="1915">1915</option>
<option value="1914">1914</option>
<option value="1913">1913</option>
<option value="1912">1912</option>
<option value="1911">1911</option>
<option value="1910">1910</option>
</select><input type="hidden" disabled="disabled" id="employee_tc_exp_jquery_control" size="10" class="date hasDatepicker"><img class="ui-datepicker-trigger" src="/images/calendar.png" alt="..." title="..."><script type="text/javascript">
  function wfd_employee_tc_exp_read_linked()
  {
    jQuery("#employee_tc_exp_jquery_control").val(jQuery("#employee_tc_exp_year").val() + "-" + jQuery("#employee_tc_exp_month").val() + "-" + jQuery("#employee_tc_exp_day").val());

    return {};
  }

  function wfd_employee_tc_exp_update_linked(date)
  {
    jQuery("#employee_tc_exp_year").val(date.substring(0, 4));
    jQuery("#employee_tc_exp_month").val(date.substring(5, 7));
    jQuery("#employee_tc_exp_day").val(date.substring(8));
  }

  function wfd_employee_tc_exp_check_linked_days()
  {
    var daysInMonth = 32 - new Date(jQuery("#employee_tc_exp_year").val(), jQuery("#employee_tc_exp_month").val() - 1, 32).getDate();
    jQuery("#employee_tc_exp_day option").attr("disabled", "");
    jQuery("#employee_tc_exp_day option:gt(" + (daysInMonth) +")").attr("disabled", "disabled");

    if (jQuery("#employee_tc_exp_day").val() &gt; daysInMonth)
    {
      jQuery("#employee_tc_exp_day").val(daysInMonth);
    }
  }

  jQuery(document).ready(function() {
    jQuery("#employee_tc_exp_jquery_control").datepicker(jQuery.extend({}, {
      minDate:    new Date(1910, 1 - 1, 1),
      maxDate:    new Date(2015, 12 - 1, 31),
      beforeShow: wfd_employee_tc_exp_read_linked,
      onSelect:   wfd_employee_tc_exp_update_linked,
      showOn:     "button"
      , buttonImage: "/images/calendar.png", buttonImageOnly: true
    }, jQuery.datepicker.regional[""], {}, {dateFormat: "yy-mm-dd"}));
  });

  jQuery("#employee_tc_exp_day, #employee_tc_exp_month, #employee_tc_exp_year").change(wfd_employee_tc_exp_check_linked_days);
</script></div>

          </div>
  </div>
            <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_npi">
        <div>
      <label for="employee_npi">NPI</label>
      <div class="content"><input type="text" id="employee_npi" value="" name="employee[npi]"></div>

          </div>
  </div>
  </fieldset>          <fieldset id="sf_fieldset_state_requirements">
      <legend>State Requirements</legend>

            <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_employee_to_location_list">
        <div>
      <label for="employee_employee_to_location_list">SCR Clearance</label>
      <div class="content"><ul class="checkbox_list"><li><input type="checkbox" id="employee_employee_to_location_list_1" value="1" name="employee[employee_to_location_list][]">&nbsp;<label for="employee_employee_to_location_list_1">NC Kids</label></li>
<li><input type="checkbox" checked="checked" id="employee_employee_to_location_list_2" value="2" name="employee[employee_to_location_list][]">&nbsp;<label for="employee_employee_to_location_list_2">Teddy Bear</label></li>
<li><input type="checkbox" id="employee_employee_to_location_list_3" value="3" name="employee[employee_to_location_list][]">&nbsp;<label for="employee_employee_to_location_list_3">Kid's Cove (Keeseville)</label></li>
<li><input type="checkbox" id="employee_employee_to_location_list_4" value="4" name="employee[employee_to_location_list][]">&nbsp;<label for="employee_employee_to_location_list_4">Learning Center (Rouses Point)</label></li></ul></div>

          </div>
  </div>
            <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_clearance_notes">
        <div>
      <label for="employee_clearance_notes">Clearance notes</label>
      <div class="content"><input type="text" id="employee_clearance_notes" value=" received" name="employee[clearance_notes]"></div>

          </div>
  </div>
            <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_employee_finger_to_location_list">
        <div>
      <label for="employee_employee_finger_to_location_list">Fingerprints</label>
      <div class="content"><ul class="checkbox_list"><li><input type="checkbox" id="employee_employee_finger_to_location_list_1" value="1" name="employee[employee_finger_to_location_list][]">&nbsp;<label for="employee_employee_finger_to_location_list_1">NC Kids</label></li>
<li><input type="checkbox" id="employee_employee_finger_to_location_list_2" value="2" name="employee[employee_finger_to_location_list][]">&nbsp;<label for="employee_employee_finger_to_location_list_2">Teddy Bear</label></li>
<li><input type="checkbox" id="employee_employee_finger_to_location_list_3" value="3" name="employee[employee_finger_to_location_list][]">&nbsp;<label for="employee_employee_finger_to_location_list_3">Kid's Cove (Keeseville)</label></li>
<li><input type="checkbox" id="employee_employee_finger_to_location_list_4" value="4" name="employee[employee_finger_to_location_list][]">&nbsp;<label for="employee_employee_finger_to_location_list_4">Learning Center (Rouses Point)</label></li></ul></div>

          </div>
  </div>
            <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_finger_print_notes">
        <div>
      <label for="employee_finger_print_notes">Fingerprint Notes</label>
      <div class="content"><input type="text" id="employee_finger_print_notes" value="Returning form to her! " name="employee[finger_print_notes]"></div>

          </div>
  </div>
  </fieldset>          <fieldset id="sf_fieldset_health_information">
      <legend>Health Information</legend>

            <div class="sf_admin_form_row sf_admin_date sf_admin_form_field_physical_date">
        <div>
      <label for="employee_physical_date">Physical Expiration Date</label>
      <div class="content"><select id="employee_physical_date_month" name="employee[physical_date][month]" class="date">
<option selected="selected" value=""></option>
<option value="1">01</option>
<option value="2">02</option>
<option value="3">03</option>
<option value="4">04</option>
<option value="5">05</option>
<option value="6">06</option>
<option value="7">07</option>
<option value="8">08</option>
<option value="9">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
</select>/<select id="employee_physical_date_day" name="employee[physical_date][day]" class="date">
<option selected="selected" value=""></option>
<option value="1">01</option>
<option value="2">02</option>
<option value="3">03</option>
<option value="4">04</option>
<option value="5">05</option>
<option value="6">06</option>
<option value="7">07</option>
<option value="8">08</option>
<option value="9">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>/<select id="employee_physical_date_year" name="employee[physical_date][year]" class="date">
<option selected="selected" value=""></option>
<option value="2015">2015</option>
<option value="2014">2014</option>
<option value="2013">2013</option>
<option value="2012">2012</option>
<option value="2011">2011</option>
<option value="2010">2010</option>
<option value="2009">2009</option>
<option value="2008">2008</option>
<option value="2007">2007</option>
<option value="2006">2006</option>
<option value="2005">2005</option>
<option value="2004">2004</option>
<option value="2003">2003</option>
<option value="2002">2002</option>
<option value="2001">2001</option>
<option value="2000">2000</option>
<option value="1999">1999</option>
<option value="1998">1998</option>
<option value="1997">1997</option>
<option value="1996">1996</option>
<option value="1995">1995</option>
<option value="1994">1994</option>
<option value="1993">1993</option>
<option value="1992">1992</option>
<option value="1991">1991</option>
<option value="1990">1990</option>
<option value="1989">1989</option>
<option value="1988">1988</option>
<option value="1987">1987</option>
<option value="1986">1986</option>
<option value="1985">1985</option>
<option value="1984">1984</option>
<option value="1983">1983</option>
<option value="1982">1982</option>
<option value="1981">1981</option>
<option value="1980">1980</option>
<option value="1979">1979</option>
<option value="1978">1978</option>
<option value="1977">1977</option>
<option value="1976">1976</option>
<option value="1975">1975</option>
<option value="1974">1974</option>
<option value="1973">1973</option>
<option value="1972">1972</option>
<option value="1971">1971</option>
<option value="1970">1970</option>
<option value="1969">1969</option>
<option value="1968">1968</option>
<option value="1967">1967</option>
<option value="1966">1966</option>
<option value="1965">1965</option>
<option value="1964">1964</option>
<option value="1963">1963</option>
<option value="1962">1962</option>
<option value="1961">1961</option>
<option value="1960">1960</option>
<option value="1959">1959</option>
<option value="1958">1958</option>
<option value="1957">1957</option>
<option value="1956">1956</option>
<option value="1955">1955</option>
<option value="1954">1954</option>
<option value="1953">1953</option>
<option value="1952">1952</option>
<option value="1951">1951</option>
<option value="1950">1950</option>
<option value="1949">1949</option>
<option value="1948">1948</option>
<option value="1947">1947</option>
<option value="1946">1946</option>
<option value="1945">1945</option>
<option value="1944">1944</option>
<option value="1943">1943</option>
<option value="1942">1942</option>
<option value="1941">1941</option>
<option value="1940">1940</option>
<option value="1939">1939</option>
<option value="1938">1938</option>
<option value="1937">1937</option>
<option value="1936">1936</option>
<option value="1935">1935</option>
<option value="1934">1934</option>
<option value="1933">1933</option>
<option value="1932">1932</option>
<option value="1931">1931</option>
<option value="1930">1930</option>
<option value="1929">1929</option>
<option value="1928">1928</option>
<option value="1927">1927</option>
<option value="1926">1926</option>
<option value="1925">1925</option>
<option value="1924">1924</option>
<option value="1923">1923</option>
<option value="1922">1922</option>
<option value="1921">1921</option>
<option value="1920">1920</option>
<option value="1919">1919</option>
<option value="1918">1918</option>
<option value="1917">1917</option>
<option value="1916">1916</option>
<option value="1915">1915</option>
<option value="1914">1914</option>
<option value="1913">1913</option>
<option value="1912">1912</option>
<option value="1911">1911</option>
<option value="1910">1910</option>
</select><input type="hidden" disabled="disabled" id="employee_physical_date_jquery_control" size="10" class="date hasDatepicker"><img class="ui-datepicker-trigger" src="/images/calendar.png" alt="..." title="..."><script type="text/javascript">
  function wfd_employee_physical_date_read_linked()
  {
    jQuery("#employee_physical_date_jquery_control").val(jQuery("#employee_physical_date_year").val() + "-" + jQuery("#employee_physical_date_month").val() + "-" + jQuery("#employee_physical_date_day").val());

    return {};
  }

  function wfd_employee_physical_date_update_linked(date)
  {
    jQuery("#employee_physical_date_year").val(date.substring(0, 4));
    jQuery("#employee_physical_date_month").val(date.substring(5, 7));
    jQuery("#employee_physical_date_day").val(date.substring(8));
  }

  function wfd_employee_physical_date_check_linked_days()
  {
    var daysInMonth = 32 - new Date(jQuery("#employee_physical_date_year").val(), jQuery("#employee_physical_date_month").val() - 1, 32).getDate();
    jQuery("#employee_physical_date_day option").attr("disabled", "");
    jQuery("#employee_physical_date_day option:gt(" + (daysInMonth) +")").attr("disabled", "disabled");

    if (jQuery("#employee_physical_date_day").val() &gt; daysInMonth)
    {
      jQuery("#employee_physical_date_day").val(daysInMonth);
    }
  }

  jQuery(document).ready(function() {
    jQuery("#employee_physical_date_jquery_control").datepicker(jQuery.extend({}, {
      minDate:    new Date(1910, 1 - 1, 1),
      maxDate:    new Date(2015, 12 - 1, 31),
      beforeShow: wfd_employee_physical_date_read_linked,
      onSelect:   wfd_employee_physical_date_update_linked,
      showOn:     "button"
      , buttonImage: "/images/calendar.png", buttonImageOnly: true
    }, jQuery.datepicker.regional[""], {}, {dateFormat: "yy-mm-dd"}));
  });

  jQuery("#employee_physical_date_day, #employee_physical_date_month, #employee_physical_date_year").change(wfd_employee_physical_date_check_linked_days);
</script></div>

          </div>
  </div>
            <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_physical_notes">
        <div>
      <label for="employee_physical_notes">Physical Notes</label>
      <div class="content"><input type="text" id="employee_physical_notes" value="" name="employee[physical_notes]"></div>

          </div>
  </div>
            <div class="sf_admin_form_row sf_admin_date sf_admin_form_field_tb_date">
        <div>
      <label for="employee_tb_date">TB Expiration Date</label>
      <div class="content"><select id="employee_tb_date_month" name="employee[tb_date][month]" class="date">
<option selected="selected" value=""></option>
<option value="1">01</option>
<option value="2">02</option>
<option value="3">03</option>
<option value="4">04</option>
<option value="5">05</option>
<option value="6">06</option>
<option value="7">07</option>
<option value="8">08</option>
<option value="9">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
</select>/<select id="employee_tb_date_day" name="employee[tb_date][day]" class="date">
<option selected="selected" value=""></option>
<option value="1">01</option>
<option value="2">02</option>
<option value="3">03</option>
<option value="4">04</option>
<option value="5">05</option>
<option value="6">06</option>
<option value="7">07</option>
<option value="8">08</option>
<option value="9">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>/<select id="employee_tb_date_year" name="employee[tb_date][year]" class="date">
<option selected="selected" value=""></option>
<option value="2015">2015</option>
<option value="2014">2014</option>
<option value="2013">2013</option>
<option value="2012">2012</option>
<option value="2011">2011</option>
<option value="2010">2010</option>
<option value="2009">2009</option>
<option value="2008">2008</option>
<option value="2007">2007</option>
<option value="2006">2006</option>
<option value="2005">2005</option>
<option value="2004">2004</option>
<option value="2003">2003</option>
<option value="2002">2002</option>
<option value="2001">2001</option>
<option value="2000">2000</option>
<option value="1999">1999</option>
<option value="1998">1998</option>
<option value="1997">1997</option>
<option value="1996">1996</option>
<option value="1995">1995</option>
<option value="1994">1994</option>
<option value="1993">1993</option>
<option value="1992">1992</option>
<option value="1991">1991</option>
<option value="1990">1990</option>
<option value="1989">1989</option>
<option value="1988">1988</option>
<option value="1987">1987</option>
<option value="1986">1986</option>
<option value="1985">1985</option>
<option value="1984">1984</option>
<option value="1983">1983</option>
<option value="1982">1982</option>
<option value="1981">1981</option>
<option value="1980">1980</option>
<option value="1979">1979</option>
<option value="1978">1978</option>
<option value="1977">1977</option>
<option value="1976">1976</option>
<option value="1975">1975</option>
<option value="1974">1974</option>
<option value="1973">1973</option>
<option value="1972">1972</option>
<option value="1971">1971</option>
<option value="1970">1970</option>
<option value="1969">1969</option>
<option value="1968">1968</option>
<option value="1967">1967</option>
<option value="1966">1966</option>
<option value="1965">1965</option>
<option value="1964">1964</option>
<option value="1963">1963</option>
<option value="1962">1962</option>
<option value="1961">1961</option>
<option value="1960">1960</option>
<option value="1959">1959</option>
<option value="1958">1958</option>
<option value="1957">1957</option>
<option value="1956">1956</option>
<option value="1955">1955</option>
<option value="1954">1954</option>
<option value="1953">1953</option>
<option value="1952">1952</option>
<option value="1951">1951</option>
<option value="1950">1950</option>
<option value="1949">1949</option>
<option value="1948">1948</option>
<option value="1947">1947</option>
<option value="1946">1946</option>
<option value="1945">1945</option>
<option value="1944">1944</option>
<option value="1943">1943</option>
<option value="1942">1942</option>
<option value="1941">1941</option>
<option value="1940">1940</option>
<option value="1939">1939</option>
<option value="1938">1938</option>
<option value="1937">1937</option>
<option value="1936">1936</option>
<option value="1935">1935</option>
<option value="1934">1934</option>
<option value="1933">1933</option>
<option value="1932">1932</option>
<option value="1931">1931</option>
<option value="1930">1930</option>
<option value="1929">1929</option>
<option value="1928">1928</option>
<option value="1927">1927</option>
<option value="1926">1926</option>
<option value="1925">1925</option>
<option value="1924">1924</option>
<option value="1923">1923</option>
<option value="1922">1922</option>
<option value="1921">1921</option>
<option value="1920">1920</option>
<option value="1919">1919</option>
<option value="1918">1918</option>
<option value="1917">1917</option>
<option value="1916">1916</option>
<option value="1915">1915</option>
<option value="1914">1914</option>
<option value="1913">1913</option>
<option value="1912">1912</option>
<option value="1911">1911</option>
<option value="1910">1910</option>
</select><input type="hidden" disabled="disabled" id="employee_tb_date_jquery_control" size="10" class="date hasDatepicker"><img class="ui-datepicker-trigger" src="/images/calendar.png" alt="..." title="..."><script type="text/javascript">
  function wfd_employee_tb_date_read_linked()
  {
    jQuery("#employee_tb_date_jquery_control").val(jQuery("#employee_tb_date_year").val() + "-" + jQuery("#employee_tb_date_month").val() + "-" + jQuery("#employee_tb_date_day").val());

    return {};
  }

  function wfd_employee_tb_date_update_linked(date)
  {
    jQuery("#employee_tb_date_year").val(date.substring(0, 4));
    jQuery("#employee_tb_date_month").val(date.substring(5, 7));
    jQuery("#employee_tb_date_day").val(date.substring(8));
  }

  function wfd_employee_tb_date_check_linked_days()
  {
    var daysInMonth = 32 - new Date(jQuery("#employee_tb_date_year").val(), jQuery("#employee_tb_date_month").val() - 1, 32).getDate();
    jQuery("#employee_tb_date_day option").attr("disabled", "");
    jQuery("#employee_tb_date_day option:gt(" + (daysInMonth) +")").attr("disabled", "disabled");

    if (jQuery("#employee_tb_date_day").val() &gt; daysInMonth)
    {
      jQuery("#employee_tb_date_day").val(daysInMonth);
    }
  }

  jQuery(document).ready(function() {
    jQuery("#employee_tb_date_jquery_control").datepicker(jQuery.extend({}, {
      minDate:    new Date(1910, 1 - 1, 1),
      maxDate:    new Date(2015, 12 - 1, 31),
      beforeShow: wfd_employee_tb_date_read_linked,
      onSelect:   wfd_employee_tb_date_update_linked,
      showOn:     "button"
      , buttonImage: "/images/calendar.png", buttonImageOnly: true
    }, jQuery.datepicker.regional[""], {}, {dateFormat: "yy-mm-dd"}));
  });

  jQuery("#employee_tb_date_day, #employee_tb_date_month, #employee_tb_date_year").change(wfd_employee_tb_date_check_linked_days);
</script></div>

          </div>
  </div>
            <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_tb_notes">
        <div>
      <label for="employee_tb_notes">TB Notes</label>
      <div class="content"><input type="text" id="employee_tb_notes" value="" name="employee[tb_notes]"></div>

          </div>
  </div>
            <div class="sf_admin_form_row sf_admin_date sf_admin_form_field_osha_date">
        <div>
      <label for="employee_osha_date">OSHA Expiration Date</label>
      <div class="content"><select id="employee_osha_date_month" name="employee[osha_date][month]" class="date">
<option selected="selected" value=""></option>
<option value="1">01</option>
</select>/<select id="employee_osha_date_day" name="employee[osha_date][day]" class="date">
<option selected="selected" value=""></option>
<option value="1">01</option>
</select>/<select id="employee_osha_date_year" name="employee[osha_date][year]" class="date">
<option selected="selected" value=""></option>
<option value="2015">2015</option>
</select></div>

          </div>
  </div>
            <div class="sf_admin_form_row sf_admin_date sf_admin_form_field_cpr_date">
        <div>
      <label for="employee_cpr_date">CPR Expiration Date</label>
      <div class="content"><select id="employee_cpr_date_month" name="employee[cpr_date][month]" class="date">
<option selected="selected" value=""></option>
<option value="1">01</option>
</select>/<select id="employee_cpr_date_day" name="employee[cpr_date][day]" class="date">
<option selected="selected" value=""></option>
<option value="1">01</option>
</select>/<select id="employee_cpr_date_year" name="employee[cpr_date][year]" class="date">
<option selected="selected" value=""></option>
<option value="2015">2015</option>
</select></div>

          </div>
  </div>
            <div class="sf_admin_form_row sf_admin_boolean sf_admin_form_field_health_insurance">
        <div>
      <label for="employee_health_insurance">Health insurance</label>
      <div class="content"><input type="checkbox" id="employee_health_insurance" name="employee[health_insurance]"></div>

          </div>
  </div>
            <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_health_type">
        <div>
      <label for="employee_health_type">Health type</label>
      <div class="content"><input type="text" id="employee_health_type" value="" name="employee[health_type]"></div>

          </div>
  </div>
            <div class="sf_admin_form_row sf_admin_boolean sf_admin_form_field_suplimental_health">
        <div>
      <label for="employee_suplimental_health">Supplemental health</label>
      <div class="content"><input type="checkbox" id="employee_suplimental_health" name="employee[suplimental_health]"></div>

          </div>
  </div>
            <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_supplemental_health_notes">
        <div>
      <label for="employee_supplemental_health_notes">Supplemental health notes</label>
      <div class="content"><input type="text" id="employee_supplemental_health_notes" value="" name="employee[supplemental_health_notes]"></div>

          </div>
  </div>
            <div class="sf_admin_form_row sf_admin_boolean sf_admin_form_field_retirement_plan">
        <div>
      <label for="employee_retirement_plan">Retirement plan</label>
      <div class="content"><input type="checkbox" id="employee_retirement_plan" name="employee[retirement_plan]"></div>

          </div>
  </div>
  </fieldset>          <fieldset id="sf_fieldset_admin">
      <legend>Admin</legend>

              <div class="sf_admin_form_row sf_admin_date sf_admin_form_field_has_keys">
        <div>
      <label for="employee_has_keys">Has keys</label>
      <div class="content"><input type="checkbox" id="employee_has_keys" name="employee[has_keys]">            </div>

    </div>
  </div>              <div class="sf_admin_form_row sf_admin_date sf_admin_form_field_has_email">
        <div>
      <label for="employee_has_email">Has email</label>
      <div class="content"><input type="checkbox" id="employee_has_email" name="employee[has_email]">            </div>

    </div>
  </div>              <div class="sf_admin_form_row sf_admin_date sf_admin_form_field_has_dist_list">
        <div>
      <label for="employee_has_dist_list">On distribution list</label>
      <div class="content"><input type="checkbox" id="employee_has_dist_list" name="employee[has_dist_list]">            </div>

    </div>
  </div>              <div class="sf_admin_form_row sf_admin_date sf_admin_form_field_has_server_access">
        <div>
      <label for="employee_has_server_access">Has server access</label>
      <div class="content"><input type="checkbox" id="employee_has_server_access" name="employee[has_server_access]">
      </div>

    </div>
  </div>            <div class="sf_admin_form_row sf_admin_boolean sf_admin_form_field_is_team_member">
        <div>
      <label for="employee_is_team_member">Is team member</label>
      <div class="content"><input type="checkbox" id="employee_is_team_member" name="employee[is_team_member]"></div>

          </div>
  </div>
            <div class="sf_admin_form_row sf_admin_date sf_admin_form_field_dof">
        <div>
      <label for="employee_dof">Date of Termination</label>
      <div class="content"><select id="employee_dof_month" name="employee[dof][month]" class="date">
<option selected="selected" value=""></option>
<option value="1">01</option>
</select>/<select id="employee_dof_day" name="employee[dof][day]" class="date">
<option selected="selected" value=""></option>
<option value="1">01</option>
</select>/<select id="employee_dof_year" name="employee[dof][year]" class="date">
<option selected="selected" value=""></option>
<option value="2015">2015</option>
<option value="1910">1910</option>
</select></div>

          </div>
  </div>
            <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_notes">
        <div>
      <label for="employee_notes">Notes</label>
      <div class="content"><textarea id="employee_notes" name="employee[notes]" cols="30" rows="4"></textarea></div>

          </div>
  </div>
            <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_picture">
        <div>
      <label for="employee_picture">Picture</label>
      <div class="content"><div><label>Delete the picture?</label> <input type="checkbox" id="employee_picture_delete" name="employee[picture_delete]"><br><label>New Picture</label> <input type="file" id="employee_picture" value="picture_missing.jpg" name="employee[picture]"></div></div>

          </div>
  </div>
  </fieldset>




  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields() ?>
          &nbsp;<a href="<?php echo url_for('provider/index') ?>">Cancel</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'provider/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['first_name']->renderLabel() ?></th>
        <td>
          <?php echo $form['first_name']->renderError() ?>
          <?php echo $form['first_name'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['last_name']->renderLabel() ?></th>
        <td>
          <?php echo $form['last_name']->renderError() ?>
          <?php echo $form['last_name'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['middle']->renderLabel() ?></th>
        <td>
          <?php echo $form['middle']->renderError() ?>
          <?php echo $form['middle'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['address']->renderLabel() ?></th>
        <td>
          <?php echo $form['address']->renderError() ?>
          <?php echo $form['address'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['address_2']->renderLabel() ?></th>
        <td>
          <?php echo $form['address_2']->renderError() ?>
          <?php echo $form['address_2'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['city']->renderLabel() ?></th>
        <td>
          <?php echo $form['city']->renderError() ?>
          <?php echo $form['city'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['state']->renderLabel() ?></th>
        <td>
          <?php echo $form['state']->renderError() ?>
          <?php echo $form['state'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['zip']->renderLabel() ?></th>
        <td>
          <?php echo $form['zip']->renderError() ?>
          <?php echo $form['zip'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['county']->renderLabel() ?></th>
        <td>
          <?php echo $form['county']->renderError() ?>
          <?php echo $form['county'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['home_phone']->renderLabel() ?></th>
        <td>
          <?php echo $form['home_phone']->renderError() ?>
          <?php echo $form['home_phone'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['cell_phone']->renderLabel() ?></th>
        <td>
          <?php echo $form['cell_phone']->renderError() ?>
          <?php echo $form['cell_phone'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['company_email']->renderLabel() ?></th>
        <td>
          <?php echo $form['company_email']->renderError() ?>
          <?php echo $form['company_email'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['personal_email']->renderLabel() ?></th>
        <td>
          <?php echo $form['personal_email']->renderError() ?>
          <?php echo $form['personal_email'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['license_number']->renderLabel() ?></th>
        <td>
          <?php echo $form['license_number']->renderError() ?>
          <?php echo $form['license_number'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['license_expiration']->renderLabel() ?></th>
        <td>
          <?php echo $form['license_expiration']->renderError() ?>
          <?php echo $form['license_expiration'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['dob']->renderLabel() ?></th>
        <td>
          <?php echo $form['dob']->renderError() ?>
          <?php echo $form['dob'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['doh']->renderLabel() ?></th>
        <td>
          <?php echo $form['doh']->renderError() ?>
          <?php echo $form['doh'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['dof']->renderLabel() ?></th>
        <td>
          <?php echo $form['dof']->renderError() ?>
          <?php echo $form['dof'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['job_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['job_id']->renderError() ?>
          <?php echo $form['job_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['ssn']->renderLabel() ?></th>
        <td>
          <?php echo $form['ssn']->renderError() ?>
          <?php echo $form['ssn'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['health_insurance']->renderLabel() ?></th>
        <td>
          <?php echo $form['health_insurance']->renderError() ?>
          <?php echo $form['health_insurance'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['retirement_plan']->renderLabel() ?></th>
        <td>
          <?php echo $form['retirement_plan']->renderError() ?>
          <?php echo $form['retirement_plan'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['suplimental_health']->renderLabel() ?></th>
        <td>
          <?php echo $form['suplimental_health']->renderError() ?>
          <?php echo $form['suplimental_health'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['supplemental_health_notes']->renderLabel() ?></th>
        <td>
          <?php echo $form['supplemental_health_notes']->renderError() ?>
          <?php echo $form['supplemental_health_notes'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['health_type']->renderLabel() ?></th>
        <td>
          <?php echo $form['health_type']->renderError() ?>
          <?php echo $form['health_type'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['physical_date']->renderLabel() ?></th>
        <td>
          <?php echo $form['physical_date']->renderError() ?>
          <?php echo $form['physical_date'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['physical_notes']->renderLabel() ?></th>
        <td>
          <?php echo $form['physical_notes']->renderError() ?>
          <?php echo $form['physical_notes'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['tb_date']->renderLabel() ?></th>
        <td>
          <?php echo $form['tb_date']->renderError() ?>
          <?php echo $form['tb_date'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['tb_notes']->renderLabel() ?></th>
        <td>
          <?php echo $form['tb_notes']->renderError() ?>
          <?php echo $form['tb_notes'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['osha_date']->renderLabel() ?></th>
        <td>
          <?php echo $form['osha_date']->renderError() ?>
          <?php echo $form['osha_date'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['cpr_date']->renderLabel() ?></th>
        <td>
          <?php echo $form['cpr_date']->renderError() ?>
          <?php echo $form['cpr_date'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['finger_prints']->renderLabel() ?></th>
        <td>
          <?php echo $form['finger_prints']->renderError() ?>
          <?php echo $form['finger_prints'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['finger_print_notes']->renderLabel() ?></th>
        <td>
          <?php echo $form['finger_print_notes']->renderError() ?>
          <?php echo $form['finger_print_notes'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['clearance_notes']->renderLabel() ?></th>
        <td>
          <?php echo $form['clearance_notes']->renderError() ?>
          <?php echo $form['clearance_notes'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['picture']->renderLabel() ?></th>
        <td>
          <?php echo $form['picture']->renderError() ?>
          <?php echo $form['picture'] ?>
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
        <th><?php echo $form['npi']->renderLabel() ?></th>
        <td>
          <?php echo $form['npi']->renderError() ?>
          <?php echo $form['npi'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['tc_type']->renderLabel() ?></th>
        <td>
          <?php echo $form['tc_type']->renderError() ?>
          <?php echo $form['tc_type'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['tc_effective']->renderLabel() ?></th>
        <td>
          <?php echo $form['tc_effective']->renderError() ?>
          <?php echo $form['tc_effective'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['tc_number']->renderLabel() ?></th>
        <td>
          <?php echo $form['tc_number']->renderError() ?>
          <?php echo $form['tc_number'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['tc_exp']->renderLabel() ?></th>
        <td>
          <?php echo $form['tc_exp']->renderError() ?>
          <?php echo $form['tc_exp'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['has_keys']->renderLabel() ?></th>
        <td>
          <?php echo $form['has_keys']->renderError() ?>
          <?php echo $form['has_keys'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['has_email']->renderLabel() ?></th>
        <td>
          <?php echo $form['has_email']->renderError() ?>
          <?php echo $form['has_email'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['has_dist_list']->renderLabel() ?></th>
        <td>
          <?php echo $form['has_dist_list']->renderError() ?>
          <?php echo $form['has_dist_list'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['has_server_access']->renderLabel() ?></th>
        <td>
          <?php echo $form['has_server_access']->renderError() ?>
          <?php echo $form['has_server_access'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['is_team_member']->renderLabel() ?></th>
        <td>
          <?php echo $form['is_team_member']->renderError() ?>
          <?php echo $form['is_team_member'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['employee_finger_to_location_list']->renderLabel() ?></th>
        <td>
          <?php echo $form['employee_finger_to_location_list']->renderError() ?>
          <?php echo $form['employee_finger_to_location_list'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['employee_to_location_list']->renderLabel() ?></th>
        <td>
          <?php echo $form['employee_to_location_list']->renderError() ?>
          <?php echo $form['employee_to_location_list'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
