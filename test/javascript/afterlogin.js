var name=localStorage.getItem("username")
if (name!="null") {
document.getElementById("nav-username").innerHTML += (" " +name );
}


function logout() {
  location.replace("signin.html");
  localStorage.removeItem("username");
  return;
}

function message() {
  var x = 0;
  var name = document.getElementById('event-name').value;
  var desc = document.getElementById('event-desc').value;
  var datetime = document.getElementById('date-time').value;
  var venue = document.getElementById('venue').value;
  if (name == "" || desc == "" || datetime == "" || venue == "") {
    alert("Fill all required data!!");
    x = -1;
  }

  if (x == 0) {
    alert("Thank you for trusting us. Your responses are recorded, we will contact you for confirmation and reflect the changes.")
  }

}
