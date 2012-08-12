function createCookie(name,value,days) {
        if (days) {
                var date = new Date();
                date.setTime(date.getTime()+(days*24*60*60*1000));
                var expires = "; expires="+date.toGMTString();
        }
        else var expires = "";
        document.cookie = name+"="+value+expires+"; path=/";
}

function readCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for(var i=0;i < ca.length;i++) {
                var c = ca[i];
                while (c.charAt(0)==' ') c = c.substring(1,c.length);
                if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
        }
        return null;
}

function eraseCookie(name) {
        createCookie(name,"",-1);
}

function restore_toolbar_state()
{ 
  var state_cookie = readCookie('filter_toolbar');
  var editorbox = document.getElementById('sf_admin_bar');
  if(state_cookie)
  {
    var preferences = state_cookie.split('x');

    editorbox.style.left = preferences[0]+'px';
    editorbox.style.top = preferences[1]+'px';
    
  }
  editorbox.style.display = 'block';
  
}

function save_toolbar_state()
{
  var position = Position.cumulativeOffset($('sf_admin_bar'));  
  var preferences = new Array();
  preferences[0] = position[0];
  preferences[1] = position[1];

  createCookie('filter_toolbar', preferences.join('x'), 7);
}

Event.observe(window, 'load', function() {
  restore_toolbar_state();
});
