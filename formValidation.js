/*login Form Validation Function
     Purpose: Checks to make sure the user has inputted a username and password in order to submit. 
     Preconditions:Click the submit button.
     Postconditions: If a username and/or password aren't inputted, an alert will be posted to the screen and the cancel the submit.
     Return: False if the username/password aren't inputted isn't isn't inputted otherwise true.
   */
   function loginValidateForm() {
    var x = document.forms["myform"]["username"].value;
    var y = document.forms["myform"]["password"].value;
    if (x == null || x == "" || y == null || y == "") {
         document.getElementById("formerror").innerHTML = "Please enter a Username and Password.";
         document.getElementById("formerror").style.color = "red";
         return false;
    }
    else {
         document.getElementById("formerror").innerHTML = "";
    }
   }


 /*
        validateForm function
        Purpose: Allow a user to submit their information or not based on whether the information is filled 
                        out correctly. If not they will be notified on the screen what needs to be filled out.
        Parameters: None
        Return:True if the submit can pass otherwise false.
  */
  function registerValidateForm() {

     var inputs = ["email", "username", "password", "firstname", "lastname", "area", "phone"];
     var ctr = 0;
     for (i = 0; i < inputs.length; i++) {
        var value = document.forms["myform"][inputs[i]].value;
        if (value == "" || value == null) {
                ctr++;
                if(inputs[i] == "area") {
                        document.getElementById("phone").innerHTML = " Input Required";
                        document.getElementById("phone").style.color = "red";
                }
                else {
                        document.getElementById(inputs[i]).innerHTML = " Input Required";
                        document.getElementById(inputs[i]).style.color = "red";
                }
        }
        else if(inputs[i] == "email") {
                var atpos = value.indexOf("@");
                var dotpos = value.lastIndexOf(".");
                var confemval = document.forms["myform"]["confemail"].value;
                if(atpos<1 || dotpos<atpos+2 || dotpos+2>=value.length) {
                        ctr++;
                        document.getElementById(inputs[i]).innerHTML = " Invalid Email Address.";
                        document.getElementById(inputs[i]).style.color = "red";
                }
                else if(value != confemval) {
                        ctr++;
                        document.getElementById(inputs[i]).innerHTML = " Email doesn't match.";
                        document.getElementById(inputs[i]).style.color = "red";
                }
                else {
                        document.getElementById(inputs[i]).innerHTML = "";
                }
        }
        else if (inputs[i] == "password"){
                var confpassval = document.forms["myform"]["confpass"].value;
                if(value != confpassval) {
                        ctr++;
                        document.getElementById(inputs[i]).innerHTML = " Password doesn't match.";
                        document.getElementById(inputs[i]).style.color = "red";
                }
                else {
                         document.getElementById(inputs[i]).innerHTML = "";
                }

        }
      else if(inputs[i] == "area" && value.length != 3) {
           ctr++;
           document.getElementById(inputs[i]).innerHTML = "Invalid 3 digit Area Code.";
           document.getElementById(inputs[i]).style.color = "red";
        }
        else if(inputs[i] == "phone" && value.length != 7) {
            ctr++;
            document.getElementById(inputs[i]).innerHTML = "Invalid phone Number.";
            document.getElementById(inputs[i]).style.color = "red";
        }
        else {
                document.getElementById(inputs[i]).innerHTML = "";
        }
    }
    if (ctr > 0) {
      return false;
        }
    }



