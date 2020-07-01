<?php 
include_once ("config/DBFunction.php");
$obj=new DBFunction();
if(isset($_POST['order'])){
     $obj->insertshoot($_POST['name'], $_POST['phone'], $_POST['wphone'],$_POST['email'], $_POST['shoot'], $_POST['date'], $_POST['time']);    
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Chitra Studio Book for Shoot</title>
     
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/mystyle.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        
    </head>
    <body class="bgimage" ng-app="OES">
        <script src="lib/angular.js"></script>
    <script src="lib/app.js"></script>
    
        <script src="lib/jquery-1.12.3.js" type="text/javascript"></script>
        <div class="">
            <div >  
         
                <form action="" method="POST" class="form-group" ng-controller="samectrl" name="bookform" >
                   <center>  <div class="container " > 
                           <div class="form-row divheader">
                           <div class="form-wrapper"><img src="images/chitralogo.jpg" width="200" height="200" title="LOGO"> </div>
                           <div class="form-wrapper"><h2>Shoot Book</h2></div></div>
                           <div class=" clear form-row">
						<div class="form-wrapper">
                                                    <input type="text" class="form-control" placeholder="Your Name" name="name" ng-model="name1" required>
                                                    <span style="color:red" ng-show="bookform.name1.$dirty&&bookform.name1.$invalid&&bookform.name1.$error.required">*Required.</span>
						</div>
						<div class="form-wrapper">
                                                    <input type="number" class="form-control" placeholder="Photo Number" name="phone" ng-model="phone" ng-pattern="/^\+?\d{10}$/" required>
                                                    <span style="color:red" ng-show="bookform.phone.$error.pattern">*Please enter 10-digit number.</span>
                                                    <span style="color:red" ng-show="bookform.phone.$dirty&&bookform.phone.$invalid&&bookform.phone.$error.required">*Required.</span>
						</div>
					</div>
					<div class="form-row">
                                            <div class="form-wrapper">
                                                <input type="number" class="form-control " placeholder="WhatsApp Number" name="wphone" ng-model="wphone"  ng-pattern="/^\+?\d{10}$/" required>
                                                <span style="color:red" ng-show="bookform.wphone.$error.pattern">Please enter 10-digit number.</span>
                                                <span style="color:red" ng-show="bookform.wphone.$dirty&&bookform.wphone.$invalid&&bookform.wphone.$error.required">*Required.</span>
                                                <div><input type="checkbox" id="pnum" name="same" class="agree-term" ng-change="setdetails()" ng-model="chkbx">
                                                        <label for="pnum" class="label-agree-term">Same as Phone Number</label></div>
						</div>
						<div class="form-wrapper">
                                                    <input type="email" class="form-control" placeholder="Email Address" name="email" ng-model="email" ng-pattern="/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/" required>
                                                    <span style="color:red" ng-show="bookform.email.$error.pattern">Please enter a Valid Email-Id.</span>
                                                    <span style="color:red" ng-show="bookform.email.$dirty&&bookform.email.$invalid&&bookform.email.$error.required">*Required.</span>
						</div>
						
					</div>
                           <div class="form-row">
                               <div class="form-wrapper">
                                   <input type="radio" id='inst' name='shoot' value='Instant Photography' ng-model="shoot" required>Instant Photography
                                   <span style="color:red" ng-show="bookform.shoot.$dirty&&bookform.shoot.$invalid&&bookform.shoot.$error.required">*Required.</span>
                               </div>
                                   <div class="form-wrapper">
                                   <input type="radio" name='shoot' value='Kids'>Kids</div>
                               <div class='form-wrapper'>
                                   <input type="radio" name='shoot' value='Family'>Family</div>
                               <div class="form-wrapper">
                                   <input type="radio" name='shoot' value='Maternity'>Maternity</div>
                               <div class='form-wrapper'>
                                   <input type="radio" name='shoot' value='Matrinomial'>Matrinomial</div>
                               <div class="form-wrapper">
                                   <input type="radio" name='shoot' value='Protrait'>Potrait<br>
                               </div>
                               
                           </div>
                           <div class="form-row">
                                            <div class="form-wrapper">
                                                <input type="date" class="form-control " ng-model="pdate" placeholder="Preferred Date" name="date" required><label style="color:red;font-size:10px ">*Preferred Date</label>
                                                <span style="color:red" ng-show="bookform.pdate.$dirty&&bookform.pdate.$invalid&&bookform.pdate.$error.required">*Required.</span>
						</div>
						<div class="form-wrapper">
                                                    <input type="time" class="form-control" placeholder="Time Slot"  name="time" ng-model="ptime" required><label style="color:red;font-size:10px">*Time Slot</label>
                                                    <span style="color:red" ng-show="bookform.ptime.$dirty&&bookform.ptime.$invalid&&bookform.ptime.$error.required">*Required.</span>
						</div>
						
					</div>
                 
                <div>
                    <button type="submit" class="bubbly-button" name="order">ORDER</button>
                </div>
               
                       </div>    </center> 
         
        </form>
                
            </div>
            
        </div>
       
         
                    <script src="lib/bootstrap.min.js" type="text/javascript"></script>
          <script>var animateButton = function(e) {

  e.preventDefault;
  //reset animation
  e.target.classList.remove('animate');
  
  e.target.classList.add('animate');
  setTimeout(function(){
    e.target.classList.remove('animate');
  },700);
};

var bubblyButtons = document.getElementsByClassName("bubbly-button");

for (var i = 0; i < bubblyButtons.length; i++) {
  bubblyButtons[i].addEventListener('click', animateButton, false);
}</script>
    </body>
    <?php include 'include/Footer.php';?>
</html>
