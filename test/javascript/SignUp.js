function formAction() {
  localStorage.setItem("username", username)
  var password = document.getElementById("crpword").value;
  var cpassword = document.getElementById("copword").value;
  if (password == cpassword) {
    var selectedIndex = form_id.elements["usertype"].selectedIndex;
    var url = form_id.elements["usertype"].options[selectedIndex].value;
    // window.open(url);
    document.form_id.action = url;
  } else
    alert("Passwords do not match. Please check and try again!!! ")
}
$(document).ready(function() {
  // Function to change form action.
  $("#usertype").change(function() {
    var selected = $(this).children(":selected").text();
    switch (selected) {
      case "Student":
        $("#myform").attr('action', '../html/student.html');
        var username = document.getElementById('hostname').value
        break;
      case "Host":
        $("#myform").attr('action', 'host.html');
        break;
      default:
        $("#myform").attr('action', '#');
    }
  });
  // Function For Back Button
  $(".back").click(function() {
    parent.history.back();
    return false;
  });
});
