
function toggleForm() {
  var container=document.querySelector('.login .container');
  container.classList.toggle('active')
}
function userSignup(){
  document.querySelector('.login ').style.display="none";;
  document.querySelector('.signup-prompt').style.display="none";
  document.querySelector('.signin-prompt').style.display="flex";
  document.querySelector('.signup .user .formbox form').style.display="block";
}
function userSignin(){
  document.querySelector('.login ').style.display="flex";;
  document.querySelector('.signup-prompt').style.display="flex";
  document.querySelector('.signin-prompt').style.display="none";
  document.querySelector('.signup .user .formbox form').style.display="none";
}
