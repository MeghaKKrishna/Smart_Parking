<?php
include "head.php";
include "connection.php";
if (isset($_POST['sub']))
{
  
  $name=$_POST['name'];
  $address=$_POST['address'];
  $type=$_POST['type'];
  $aadhar=$_POST['aadhar'];
  $filename=$_POST['filename'];
  $phone=$_POST['phone'];
  $password=$_POST['password'];
  $sql="insert into signup_tb(name,address,type,aadhar,filename,phone,password,status) values('$name','$address','$type','$aadhar','$filename','$phone','$password','0')";
  if(mysqli_query($con,$sql))
  {
    echo '<script>alert ("Registration Successful");</script>';
    header("location:signin.php");
  }
  else
  {
    echo "Error:".sql."<br>".mysqli_error($con);
  }
  mysqli_close($con);
}
?>

<section id="signup" class="signup">
  <div class="container">

    <div class="section-title" data-aos="fade-up">
      <br><br><br>
      <h2>Sign Up</h2>
      <p>Registration Form</p>
    </div>

    <div class="row">

      <div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="200">

        <form action="" method="post">
          <div class="row container">
            <div class="col-md-6 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
              <span id="name-info" style="top: -9px; color: #e41847;" class="info"></span>
            </div>
            <div class="form-group mt-3">
              <textarea class="form-control" name="address" id="address" rows="5" placeholder="Your Address"></textarea>

            </div>
            <div>
              <br>
              User Type:<br><input type="radio" name="type" id="type" value="public user" required>Public User &emsp;<input type="radio" name="type" id="type" value="property owner" required>Property Owner
              <span id="type-info" style="top: -9px; color: #e41847;" class="info"></span>
            </div>

            <div class="form-group mt-3 col-lg-4">
              <input type="text" name="aadhar" class="form-control" id="aadhar" placeholder="Your Aadhar Number" required>
              <span id="a-info" style="top: -9px; color: #e41847;" class="info"></span>

            </div>

            <div class="form-group mt-3 col-lg-4">
              <input type="file" id="filename" name="filename">
            </div>

            <div class="form-group mt-3 col-lg-4">
              <input type="text" name="phone" class="form-control" pattern="[789][0-9]{9}" id="phone" placeholder="Your Phone Number" required>
              <span id="ph-info" style="top: -9px; color: #e41847;" class="info"></span>
            </div>
            <div class="form-group mt-3 col-lg-6 effects">
              <input type="password" name="password" class="form-control" id="password" placeholder="Your Password" required>
              <span id="pass-info" style="top: -9px; color: #e41847;" class="info"></span>
            </div>
            <div class="form-group mt-3 col-lg-6 effects">
              <input type="password" name="cpassword" class="form-control" id="cpassword" placeholder="Confirm Password" required>
              <span id="cpass-info" style="top: -9px; color: #e41847;" class="info"></span>
            </div>


          </div>


          <br>

          <div  class="text-center">
           <button class="btn btn-primary" name="sub" type="submit" id="submit">Sign Up</button> 

         </div>


       </form>
       <h6><a href="parking.php">Home</a></h6>
       <h6><a href="signin.php">Already have an Account?Sign In...</a></h6>

     </div>
   </div>

 </div>
</section>
<?php
include "tail.php";
?>

<script type="text/javascript">

  $("#submit").click(function(){

    if ( validateContactForm()) {
      return true;
    }
    return false;
  });
  function validateContactForm() {

    var valid = true;

    $(".info").html("");
    $(".input-field").css('border', '#e0dfdf 1px solid');
    var name = $("#name").val();
    var aadhar = $("#aadhar").val();
    var phone = $("#phone").val();
    var password = $("#password").val();
    var confirm_pwd = $("#cpassword").val();


    if (name=="")
    {
      $("#name-info").html("Required.");
      $("#name").css('border', '#e66262 1px solid');
      valid = false;
    }

    if (aadhar=="")
    {
      $("#a-info").html("Required.");
      $("#aadhar").css('border', '#e66262 1px solid');
      valid = false;
    }

    if (phone=="") {
      $("#ph-info").html("Required.");
      $("#phone").css('border', '#e66262 1px solid');
      valid = false;
    }
    if (!phone.match(/^\d{10,12}$/))
    {
      $("#ph-info").html("Please enter a valid  Phone number.");
      $("#phone").css('border', '#e66262 1px solid');
      valid = false;
    }

    if (password=="")
    {
      $("#pass-info").html("Required.");
      $("#password").css('border', '#e66262 1px solid');
      valid = false;
    }
    if (confirm_pwd =="") {
      $("#cpass-info").html("Required.");
      $("#cpassword").css('border', '#e66262 1px solid');
      valid = false;
    }
    
    if (password!="")
    { 
      var minMaxLength = /^[\s\S]{6,16}$/,
      upper = /[A-Z]/,
      lower = /[a-z]/,
      number = /[0-9]/,
      special = /[ !"#$%&'()*+,\-./:;<=>?@[\\\]^_`{|}~]/;

      if (minMaxLength.test(password))
      {
        if (upper.test(password))    
        {
          if ( lower.test(password))    
          {
            if (number.test(password) )    
            {
             if (special.test(password))    
             {
              if (confirm_pwd!=password)
              {
                $("#cpass-info").html("Passwords does not match!.");
                $("#cpassword").css('border', '#e66262 1px solid');
                valid = false;
              }
              else{
                return valid;
              }
              return valid;
            }
            else{
              $("#pass-info").html("Password requires a special character.");
              $("#password").css('border', '#e66262 1px solid');
              valid = false;
            }
            return valid;
          }
          else{
            $("#pass-info").html("Password requires a number.");
            $("#password").css('border', '#e66262 1px solid');
            valid = false;
          }
          return valid;
        }
        else{
          $("#pass-info").html("Password requires lower case letter.");
          $("#password").css('border', '#e66262 1px solid');
          valid = false;
        }
        return valid;
      }
      else{
        $("#pass-info").html("Password requires upper case letter.");
        $("#password").css('border', '#e66262 1px solid');
        valid = false;
      }
      return valid;
    }
    else{
      $("#pass-info").html("Password requires at least 8 characters and no more than 16 characters.");
      $("#password").css('border', '#e66262 1px solid');
      valid = false;
    }

  }
  return valid;
}

</script>