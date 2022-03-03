<?php
session_start();
include "head.php";
include "connection.php";
if (isset($_POST['sub']))
{

  $phone=$_POST['phone'];
  $password=$_POST['password'];
  $type=$_POST['type'];

  $sql="select * from signup_tb where phone='$phone' and password='$password' and type='$type' and status=1";
  $query=mysqli_query($con,$sql);

  if(!$query || mysqli_num_rows($query)==0) 
    {
      $error_login = "Invalid Phone Number or Password";
                
    }

  else
    {
      
      //$row = mysqli_fetch_array($query);
      while( $row = mysqli_fetch_array($query)){
        //print_r($row);
      $_SESSION['uid'] =$row['uid'];
      //echo $_SESSION['uid'];
      $_SESSION['phone'] = $row['phone'];
}
if($type=='public user'){
   header("location:public_user/public.php");
}
if($type=='property owner'){
       header("location:property_owner/owner.php");

    }
}
}
?>

<section id="signin" class="signin">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <br><br><br>
          <h2>WELCOME</h2>
          <p>SIGN IN</p>
        </div>

        <div class="row">

          <div class="col-lg-6 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="200">

            <form action="signin.php" method="post">
              <div class="row">
                <div class="form-group mt-3 col-lg-8">
                  <input type="radio" name="type" required style="padding-right: 20px;" value="public user">Public User &emsp;<input type="radio" name="type" required style="padding-right: 20px;" value="property owner">Property Owner
                </div>
              
                <div class="form-group mt-3 col-lg-8">
                  <input type="text" name="phone" class="form-control" pattern="[789][0-9]{9}" id="phone" placeholder="Your Phone Number" required>
                </div>
                <div class="form-group mt-3 col-lg-8">
                  <input type="password" name="password" class="form-control" id="password" placeholder="Your Password" required>
                </div>

                
              </div>
              
              
              <br>
              
              <div><input type="submit" class="btn btn-success" name="sub" value="Sign In"></input></div>
            
            </form>
            <br><br>
            <h6>Forget Password?</h6>
            <h6><a href="parking.php">Home</a></h6>
            <h6><a href="signup.php">Create new Account</a></h6>

          </div>

        </div>

      </div>
    </section>

<?php
include "tail.php";
?>