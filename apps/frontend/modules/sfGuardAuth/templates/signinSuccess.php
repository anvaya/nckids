<!--  Login Box -->
   <div id="login">
<?php if ($form->hasErrors()): ?>
<!-- ERROR DIV -->
      <div class="error"><span>Invalid Login!</span>
        <p> you have entered wrong username or password!</p></div>
<!-- ERROR DIV -->   
<?php endif; ?> 
   
<table width="550" align="center">
<thead>
<tr><th colspan="2">
North Country Kids Admin Database Login
</th></tr></thead>
<tfoot><tr><td colspan="2">
       <span class="forgot">
       <a href="https://webmail.nckidsinc.com/zimbra?app=mail&view=compose&to=info@kbscomputer.com" target="_blank">Forgot Password?</a>
       </span>
<!-- LOGIN FORM -->      
</td></tr></tfoot>
<tr><td class="vmiddle"><img src="/images/loginkey.jpg" alt="Database Panel Login" /> </td><td>
<!-- LOGIN FORM -->
        <form name="loginform" class="loginform" action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
            <?php echo $form['username']->renderLabel() ?>
            <?php echo $form['username']->render(array('class'=>'input', 'id'=>'userlogin')) ?>
            <?php echo $form['password']->renderLabel() ?>
            <?php echo $form['password']->render(array('class'=>'input', 'id'=>'userpass')) ?>
          <p class="submit">
            <input type="submit" name="submit" value="Log In" tabindex="100" />
          </p>
        </form> 
   </td></tr></table>
    </div>
<!--  LoginBox End -->