<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>

<div class="container">
  @if(Session::get('success'))
  <div class="alert alert-success">
    {{Session::get('success')}}
  </div>
  @endif

  @if(Session::get('fail'))
    <div class="alert alert-danger">
    {{Session::get('fail')}}
    </div>
  @endif
  <h2>User form details</h2>
  <form action="myform" method="post" onsubmit="return validateForm1()" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="profile_name">Profile Name:</label>
      <input type="text" class="form-control" id="profile_name" placeholder="Profile Name" name="profile_name">
      <div class="error_msg error_profile_name"></div>
    </div>
    <div class="form-group">
      <label for="profile_image">Profile Image:</label>
      <input type="file" class="form-control" id="profile_image" placeholder="Enter Profile Image" name="profile_image">
      <div class="error_msg error_profile_image"></div>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
      <div class="error_msg error_email"></div>
    </div>
    <div class="form-group">
      <label for="address">Address:</label>
      <textarea class="form-control" id="address" placeholder="Address" name="address"></textarea>
      <div class="error_msg error_address"></div>
    </div>
    <div class="form-group">
      <label for="pan_card">PAN Card Number:</label>
      <input type="text" class="form-control text-uppercase" id="pan_card" placeholder="PAN Card Number" name="pan_card">
      <div class="error_msg error_pan_card"></div>
    </div>
    <div class="form-group">
      <label for="aadhar_card">Aadhar Card Number:</label>
      <input type="number" class="form-control" id="aadhar_card" placeholder="Aadhar Card Number" name="aadhar_card">
      <div class="error_msg error_aadhar_card"></div>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>
<style>
.error_msg{
  color:red;
}
</style>
</body>
</html>
<script>
function validateForm1()
{
    $(".error_msg").html('')
    var profile_name = $("#profile_name").val()
    if(profile_name==""){
      $(".error_profile_name").html("Enter Profile Name");
    }else{
      var regex = /^[A-Za-z ]+$/;
      if (regex.test(profile_name)) {
        $(".error_profile_name").html("");
      }else{
        $(".error_profile_name").html("Invalid Name");
        return false;
      }
    }

    var profile_image = $("#profile_image")[0].files.length;
    if(profile_image==0){
      $(".error_profile_image").html("Enter Profile Image");
    }else{
        var $input = $("#profile_image");
        var files = $input[0].files;
        var filename = files[0].name;
        var extension = filename.substr(filename.lastIndexOf("."));
        var allowedExtensionsRegx = /(\.jpg|\.png)$/i;
        var isAllowed = allowedExtensionsRegx.test(extension);
        if(isAllowed){
          $(".error_profile_image").html("");
        }else{
          $(".error_profile_image").html("Invalid File Type selected only jpg or png");
        return false;
        }
    }

    var email = $("#email").val()
    if(email==""){
      $(".error_email").html("Enter Email");
    }else{
      var regex =
/^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      if (regex.test(email)) {
        $(".error_email").html("");
      }else{
        $(".error_email").html("Invalid Email");
        return false;
      }
    }

    var address = $("#address").val()
    if(address==""){
      $(".error_address").html("Enter Address");
    }else{
      var regex = /^[0-9a-zA-Z ]+$/;
      if (regex.test(address)) {
        $(".error_address").html("");
      }else{
        $(".error_address").html("Invalid Addresss");
        return false;
      }
    }

    var pan_card = $("#pan_card").val()
    if(pan_card==""){
      $(".error_pan_card").html("Enter PAN Card Number");
    }else{
      var regex = /([A-Z]){5}([0-9]){4}([A-Z]){1}$/;
      if (regex.test(pan_card.toUpperCase())) {
        $(".error_pan_card").html("");
      }else{
        $(".error_pan_card").html("Invalid PAN Card Number");
        return false;
      }
    }

    var aadhar_card = $("#aadhar_card").val()
    if(aadhar_card==""){
      $(".error_aadhar_card").html("Enter Aadhar Card Number");
    }else{
      var regex = /^([0-9]{4}[0-9]{4}[0-9]{4}$)|([0-9]{4}\s[0-9]{4}\s[0-9]{4}$)|([0-9]{4}-[0-9]{4}-[0-9]{4}$)/;
      if (regex.test(aadhar_card)) {
        $(".error_aadhar_card").html("");
      }else{
        $(".error_aadhar_card").html("Invalid Aadhar Card Number");
        return false;
      }
    }
    
    if(profile_name=="" || profile_image=="" || email=="" || address=="" || pan_card=="" || aadhar_card==""){
      return false;
    }
}
function IsEmail(email) {
    var regex =
/^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!regex.test(email)) {
        return false;
    }
    else {
        return true;
    }
}
</script>
