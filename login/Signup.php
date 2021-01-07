<?php
if (isset($_SESSION['email'])) {
  header('Location: /todo-list');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- jQueary -->
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <!-- CSS -->
  <link rel="stylesheet" href="includes/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


  <!-- JS bundle w/ Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <title>SignUp</title>
  <script>
    $(document).ready(function() {
      var regex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
      var nameRegex = /^[a-zA-Z\-]+$/;
      $('#btn_submit').click(function() {
        const email = $('#email').val();
        const name = $('#username').val();
        const pass = $('#pass').val();
        const pass2 = $('#pass2').val();
        var valid = true;
        if (!nameRegex.test(name)) {
          $('#username').css('border', '1px solid red');
          valid = false;
        } else
        if (!regex.test(email)) {
          $('#email').css('border', '1px solid red');
          valid = false;
        } else {
          $('#email').css('border', '1px solid lightgrey');
          valid = true;
          if (pass.length < 8 || pass.length > 16) {
            $('#pass').css('border', '1px solid red');
            valid = false;
          } else {
            $('#pass').css('border', '1px solid lightgrey');
            valid = true;
          }
          if (pass !== pass2) {
            $('#pass').css('border', '1px solid red');
            $('#pass2').css('border', '1px solid lightgrey');
            alert('password doesnot match');
            valid = false;
          } else {
            $('#pass').css('border', '1px solid lightgrey');
            $('#pass2').css('border', '1px solid lightgrey');
            valid = true;
          }
        }
        if (valid) {
          // AJEX REQUEST
          $.ajax({
            url: 'includes/php/signup_Bend.php',
            method: 'POST',
            data: {
              username: name,
              email: email,
              password: pass
            },
            success: function(response) {
              console.log(response);
              switch (response) {
                case 'Success': {
                  alert('User Created');
                  window.location.replace('/todo-list');
                  break;
                }
                case 'Worthless': {
                  alert('Failed to Create');
                  break;
                }
                case 'Already Exist': {
                  alert('You know you already exist right!');
                  break;
                }
                default: {
                  break;
                }
              }
            }
          });
        }
      });
    });
  </script>
</head>

<body>
  <div class="container">
    <div class="card" style="width: 50%;">
      <div class="card-header bg-white">
        <label style="font-size: 35px; font-weight: bold;">
          SignUp
        </label>
      </div>
      <div class="card-body">
        <input type="name" class="form-control" style="margin-bottom: 10px;" id="username" aria-describedby="nameHelp" placeholder="User Name">
        <input type="email" class="form-control" style="margin-bottom: 10px;" id="email" aria-describedby="emailHelp" placeholder="Enter email">
        <input type="password" class="form-control" style="margin-bottom: 10px;" id="pass" placeholder="Password">
        <input type="password" class="form-control" style="margin-bottom: 10px;" id="pass2" placeholder="Confirm Password">
        <button href="#" class="btn btn-lg btn-block" id="btn_submit">Proceed</button>
        <div class="text-center mt-2">
          <a href="Login.php" class="btn btn-link">Return to Login</a>
        </div>
      </div>
    </div>
  </div>
</body>

</html>