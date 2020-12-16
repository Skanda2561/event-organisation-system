//transitions of signin and signup
function toggleForm() {
  var container = document.querySelector('.login .container')
  container.classList.toggle('active')
}


//user details
var studentobj = [{
  username: "stud",
  password: "stud"
}]

var hostobj = [{
  username: "host",
  password: "host"
}]

// login functionality for students
function studlogin() { // retreive data from username and store in username variable
  var username = document.getElementById("studname").value
  // retreive data from password and store in password variable
  var password = document.getElementById("spword").value
  var done = -1
  // loop through all the user pbjects and confrim if the username and password are correct
  for (var i = 0; i < studentobj.length; i++) {
    if (username == studentobj[i].username && password == studentobj[i].password) {
      location.replace("student.html")
      localStorage.setItem("username", username)
      done = 1
      // stop the statement if result is found true
      return
    }
  }
  // error if username and password don't match
  if (done == -1)
    alert('incorrect username or password')
}


// login functionality for hosts
function hostlogin() {
  // retreive data from username and store in username variable
  var username = document.getElementById('hostname').value
  // retreive data from password and store in password variable
  var password = document.getElementById('hpword').value
  var done = -1
  // loop through all the user pbjects and confrim if the username and password are correct
  for (var i = 0; i < hostobj.length; i++) { // check to
    if (username == hostobj[i].username && password == hostobj[i].password) {
      location.replace("host.html")
      localStorage.setItem("username", username)
      done = 1
      // stop the statement if result is found true
      return
    }
  }
  // error if username and password don't match
  if (done == -1)
    alert('incorrect username or password')
}


// register functionality
function registerUser() {
  // store new users username
  var Username = document.getElementById('uname').value
  localStorage.setItem("username", username)
}
