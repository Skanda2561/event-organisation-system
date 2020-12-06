function formAction(){
var password = document.getElementById("crpword").value;
var cpassword = document.getElementById("copword").value;
if(password==cpassword){
  var selectedIndex = form_id.elements["usertype"].selectedIndex;
   var url = form_id.elements["usertype"].options[selectedIndex].value;
       // window.open(url);
   document.form_id.action  = url;
 }
  else 
  alert("Passwords do not match. Please check and try again!!! ")
 }