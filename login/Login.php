<?php
  if(isset($_SESSION['email'])){
    header('Location: /todo-list');
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- jQueary -->
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
  <!-- CSS -->
  <link rel="stylesheet" href="includes/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


  <!--  JS bundle w/ Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
    crossorigin="anonymous"></script>
  <title>login Page</title>

  <script>
    
    // btn click ==>chk empty
    // email ==>@ sign chk
    // @index check 
    // password =>8-16chk
    // capletter, small,Number
  $( document ).ready(function() {
    var regex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    $('#btn_submit').click(function(){
      const email = $('#email').val();
      var valid = true;
      const pass = $('#pass').val();
      if(!regex.test(email)){
        $('#email').css('border', '1px solid red');
        valid = false;
      }
      else{
        $('#email').css('border', '1px solid lightgrey');
        valid = true;
        if(pass.length < 8 || pass.length > 16 ){
          $('#pass').css('border', '1px solid red');
          valid = false;
        }else{
          $('#pass').css('border', '1px solid lightgrey');
          valid = true;
        }
      }
      if(valid){
        // AJEX REQUEST
        $.ajax({
            url: 'includes/php/Bend.php',
            method: 'POST',
            data: {
                email: email,
                password: pass
            },
            success: function(response) {
                console.log(response);
              switch (response) {
                case 'nopass':{
                  alert('Wrong pass')
                  break;
                }
                case 'good':{
                  alert('Good pass');
                  window.location.replace('/todo-list');
                break;
                }
                case 'NOT_FOUND':{
                  alert('User not exist');
                break;
                }
                default:{
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
          Login
        </label>
        <a href="#" class="btn btn-lg" id="btn_guest">Proceed as Guest ></a>
      </div>
      <div class="card-body">
        <input type="email" class="form-control" style="margin-bottom: 10px; " id="email"
          aria-describedby="emailHelp" placeholder="Enter email">
        <input type="password" class="form-control" style="margin-bottom: 10px;" id="pass"
          placeholder="Password">
        <button href="#" class="btn btn-lg btn-block" id="btn_submit">Proceed</button>
        <div class="text-center mt-2">
          <a href="Signup.php" class="btn btn-link">Not a member?</a>
        </div>
      </div>
    </div>
  </div>
</body>

</html>