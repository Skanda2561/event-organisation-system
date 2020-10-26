//transitions of signin and signup
function toggleForm() {
  var container=document.querySelector('.login .container')
  container.classList.toggle('active')
}


//user details
var studentobj = [
	{
		username: "stud",
		password: "stud"
	}
]

var hostobj = [
	{
		username: "host",
		password: "host"
	}
]

// login functionality for students
function studlogin()
{	// retreive data from username and store in username variable
	var username = document.getElementById("studname").value
	// retreive data from password and store in password variable
	var password = document.getElementById("spword").value
  var done =-1
	// loop through all the user pbjects and confrim if the username and password are correct
	for(var i = 0; i < studentobj.length; i++)
  {
		if(username ==studentobj[i].username && password == studentobj[i].password) {
      location.replace("student.html")
      localStorage.setItem("username", username)
      done=1
			// stop the statement if result is found true
			return
		}
	}
  // error if username and password don't match
  if(done==-1)
    alert('incorrect username or password')
}


// login functionality for hosts
function hostlogin()
{
	// retreive data from username and store in username variable
	var username = document.getElementById('hostname').value
	// retreive data from password and store in password variable
	var password = document.getElementById('hpword').value
  var done =-1
	// loop through all the user pbjects and confrim if the username and password are correct
	for(var i = 0; i < hostobj.length; i++)
  {	// check to
		if(username == hostobj[i].username && password == hostobj[i].password)
    {
      location.replace("host.html")
      localStorage.setItem("username", username)
      done=1
			// stop the statement if result is found true
			return
		}
	}
    // error if username and password don't match
  if(done==-1)
    alert('incorrect username or password')
}


// register functionality
function registerUser() {
	// store new users username
	var Username = document.getElementById('uname').value
  // store new user type
  var Usertype = document.getElementById('usertype').value
	// store new users password
	var Password = document.getElementById('crpword').value
  var Passwordc = document.getElementById('copword').value
  //test whether both passwords are same
  if(Password!=Passwordc)
    alert("Passwords do not match. Please check and try again!!! ")
	// store new user data in an object
	var newUser = {
		username: Username,
		password: Password
	}
  if(Usertype=='student')
  {
    // loop throught people array to see if the username is taken, or password to short
  	for(var i = 0; i < studentobj.length; i++)
    {
  		if(User == studentobj[i].username)
      {
  			alert('That username is already in use, please choose another')
  			return
  		}
		}

  	// push new object to the people array
  	studentobj.push(newUser)
    alert("Thank you for trusting us. Your responses are recorded, we will contact you for confirmation and reflect the changes.")
    return
}
  else if(Usertype=='host')
  {
    // loop throught people array to see if the username is taken, or password to short
  	for(var i = 0; i < hostobj.length; i++)
    {
  		if(Username == hostobj[i].username)
      {
  			alert('That username is alreay in user, please choose another')
  			return
  		}
  	}
  	// push new object to the people array
  	hostobj.push(newUser)
      alert("Thank you for trusting us. Your responses are recorded, we will contact you for confirmation and reflect the changes.")
      return
  }

}
