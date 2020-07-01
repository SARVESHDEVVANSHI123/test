<?php
include_once ("config/DBFunction.php");
$obj=new DBFunction();
if(isset($_POST['submit'])){
    $oid=date('y').date('m').date('d').$obj->countorder('worder');
if($obj->insertworder($oid)){
        echo "<script>alert('Your Order Number is $oid. Please Note it.');window.location.href='Order.php';</script>";
    }    
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
        <title>Chitra Studio Order</title>
     
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/mystyle.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/modelclass.css" rel="stylesheet" type="text/css"/>
        <style>
            form ol {
      padding-left: 0;
    }

    form li, div > p {
      background: #eee;
      display: flex;
      justify-content: space-between;
      margin-bottom: 10px;
      list-style-type: none;
      border: none;
    }

    .imgclass {
      width: 100px;
      height: 64px;
      order: 1;
    }

    form p {
      line-height: 32px;
      padding-left:10px;
    }
        </style>
        <script>
             function validatephone(){
            var contact=document.getElementById('phone');
            if(contact.value.length<10||contact.value.length>10){
                alert('Please Enter 10-digit contact number');
                contact.focus();
                return false;
        }
        else{
            return true;
        }
        }
        </script>
    </head>
    <body class="bgimage" ng-app="OES">
        <script src="lib/angular.js"></script>
        <script src="lib/app.js"></script>
         <script src="lib/jquery-1.12.3.js" type="text/javascript"></script>
         <script>var counter=1;</script>
        <div class="">
            <div >  
         
                <form class="form-group" name="orderform" onsubmit="return validatephone()" method="POST" action="" enctype="multipart/form-data">
                  <center>   <div class="container " > 
                           <div class="form-row divheader">
                           <div class="form-wrapper"><img src="images/chitralogo.jpg" width="200" height="200" title="LOGO"> </div>
                           <div class="form-wrapper"><h2>WALKING ORDER</h2></div></div>
                           <div class=" clear form-row">
						<div class="form-wrapper">
                                                    <input type="text" class="form-control" placeholder="Your Name" name="name" required>
						</div><div class="form-wrapper">
                                                    <input type="number" class="form-control" placeholder="Phone Number" id="phone" name="phone" required ng-model="phone" ng-pattern="/^\+?\d{10}$/">
                                                    <span style="color:red" ng-show="orderform.phone.$error.pattern">Please enter 10-digit number.</span>
						</div>
					</div>
					
                 <div class="col-lg-12">
                     
                     <div style=" margin-bottom: 5px;"  id='f1'>
                         <input name='file[]' type='file' id="fileid1" accept=".jpg, .jpeg, .png" required/></div>
                         <div class="preview"></div>
        <div id='file_tools'>
            <img src='images/FileAdd.png' width="20" height="20" id='add_file' title='Add new Photo'/>
            <img src='images/Filedelete.png' width="20" height="20" id='del_file' title='Delete This'/>
	</div>
                                                                                
                                    </div>
                          
              
                <center><div>
                        <button class="bubbly-button" type="submit" name="submit" onclick="document.getElementById('nos1').value=counter;">ORDER NOW</button>
                    </div></center>
               
                       </div></center>      
         
 
         
        </form>
                
            </div>
            
        </div>
            
    
          <script>
                    $(document).ready(function(){
	//counter = 2;
       
        var str="document.getElementById('id05').style.display='block'";
	$('#del_file').hide();
	$('img#add_file').click(function(){
            counter++;
		$('#file_tools').before('<div style=" margin-bottom: 5px;" id="f'+counter+'"><input name="file[]" type="file" id="fileid'+counter+'"  accept=".jpg, .jpeg, .png" required/></div><div class="preview"></div>');
		$('#del_file').fadeIn(0);
	
	});
	$('img#del_file').click(function(){
		if(counter==2){
			$('#del_file').hide();
		}   
		$('#f'+counter).remove();
                $('#row'+counter).remove();
                counter--;
                
	});
       });</script>
         
        <script>
            
            var input = document.querySelector('input[type=file]');        
              var preview = document.querySelector('.preview');

      input.addEventListener('change', updateImageDisplay);
    function updateImageDisplay() {
      while(preview.firstChild) {
        preview.removeChild(preview.firstChild);
      }

      const curFiles = input.files;
      if(curFiles.length === 0) {
        const para = document.createElement('p');
        para.textContent = 'No files currently selected for upload';
        preview.appendChild(para);
      } else {
        const list = document.createElement('ol');
        preview.appendChild(list);

        for(const file of curFiles) {
          const listItem = document.createElement('li');
          const para = document.createElement('p');

          if(validFileType(file)) {
            para.textContent = `File name : ${file.name}, File size : ${returnFileSize(file.size)}.`;
            const image = document.createElement('img');
            image.src = URL.createObjectURL(file);
            image.classList.add('imgclass');

            listItem.appendChild(image);
            listItem.appendChild(para);
          } else {
            para.textContent = `File name ${file.name}: Not a valid file type. Update your selection.`;
            listItem.appendChild(para);
          }

          list.appendChild(listItem);
        }
      }
    }

    const fileTypes = [
        'image/apng',
        'image/bmp',
        'image/gif',
        'image/jpeg',
        'image/pjpeg',
        'image/png',
        'image/svg+xml',
        'image/tiff',
        'image/webp',
        `image/x-icon`
    ];

    function validFileType(file) {
      return fileTypes.includes(file.type);
    }

    function returnFileSize(number) {
      if(number < 1024) {
        return number + 'bytes';
      } else if(number > 1024 && number < 1048576) {
        return (number/1024).toFixed(1) + 'KB';
      } else if(number > 1048576) {
        return (number/1048576).toFixed(1) + 'MB';
      }
    }   
        </script>
         
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
