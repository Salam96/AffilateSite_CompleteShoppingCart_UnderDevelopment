if (window.sessionStorage){
    var usern=document.getElementById("username")
    if (sessionStorage.usern){ //if there is data stored for the target textarea
        usern.value=sessionStorage.usern //recall it upon refresh or crash
    }
    
    usern.onkeyup=function(e){
        sessionStorage.usern=this.value //save contents of textarea as user types
    }
}
window.onload = function() {
    var input_fields = document.getElementsByTagName('input');
    for(var i=0;i<input_fields.length;i++) {
        if(input_fields[i].type == 'text' || input_fields[i].type == 'number' || input_fields[i].type == 'email') {
            if(input_fields[i].hasAttribute('pattern')) {
                input_fields[i].addEventListener('input', function(e) { 
                    var targetElement = e.target || e.srcElement;
                    checkField(targetElement);
                }, false);
            }
        }
    }
}
function checkField(a_field) {
    if(a_field.checkValidity()) {
        if(a_field.value == '') {
            a_field.style.background = 'red';
            a_field.nextElementSibling.innerHTML = a_field.title;
        } else {
            a_field.style.background = '#ed2553';
            a_field.nextElementSibling.innerHTML = '';
        }
    } else {
        a_field.style.background = 'red'; 
        a_field.nextElementSibling.innerHTML = a_field.title;
    }   
}
function termsandconditions()
  {
                  if (document.getElementById('check').checked == true)
                        {
                              document.getElementById('f_submission').disabled = false;
                              document.getElementById('f_submission').style.background = 'lightred';
                        }
                else
                        {
                              document.getElementById('f_submission').disabled = true;
                              document.getElementById('f_submission').style.background = 'lightgrey'

                        }

  }