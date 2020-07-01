<?php
include_once ("config/DBFunction.php");
$obj=new DBFunction();
$shw=$obj->show('pricelist');
$oid=date('y').date('m').date('d')."CHS".date('H').date('i').date('s').$obj->countorder('orderphoto');
if(isset($_POST['submit'])){
    if($obj->insertorder($oid)){
        echo "<script>alert('Your Order Number is $oid. Please Note it.');window.location.href='Order.php';</script>";
    }
   /* $name=$_POST['name'];
    $ph=$_POST['phone'];
    $add=$_POST['address'];
    $to=$_POST['email'];
    $subject='Order Confirmation';
    $message="<html><head><title>Order details of $name</title></head><body><table><tr><td>Order Id :</td><td>$oid</td></tr><tr><td>Name :</td><td>$name</td></tr><tr><td>Phone :</td><td>$ph</td><tr><td>Address :</td><td>$add</td></tr></tr></table></body></html>";
    $headers="MIME-Version:1.0"."\r\n";
    $headers .="Content-type:text/html;charset=iso-8859-1"."\r\n";
    $headers.="To: $to"."\r\n";
    $headers.="From:example@gmail.com"."\r\n";
    $su= mail($to, $subject, $message, $headers);
    if(!$su){
        echo error_get_last()['message'];
    }*/
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
    </head>
    <body class="bgimage" ng-app="OES">
        <script src="lib/angular.js"></script>
        <script src="lib/app.js"></script>
         <script src="lib/jquery-1.12.3.js" type="text/javascript"></script>
         <script>var counter=1;</script>
        <div class="">
            <div >  
         
                <form class="form-group" name="orderform" method="POST" action="" enctype="multipart/form-data">
                  <center>   <div class="container " > 
                           <div class="form-row divheader">
                           <div class="form-wrapper"><img src="images/chitralogo.jpg" width="200" height="200" title="LOGO"> </div>
                           <div class="form-wrapper"><h2>ORDER</h2></div></div>
                           <div class=" clear form-row">
						<div class="form-wrapper">
                                                    <input type="text" class="form-control" placeholder="Your Name" name="name" required>
						</div><div class="form-wrapper">
                                                    <input type="number" class="form-control" placeholder="Photo Number" name="phone" required ng-model="phone" ng-pattern="/^\+?\d{10}$/">
                                                    <span style="color:red" ng-show="orderform.phone.$error.pattern">Please enter 10-digit number.</span>
						</div>
					</div>
					<div class="form-row">
						<div class="form-wrapper">
                                                    <input type="email" class="form-control" placeholder="Email Address" name="email" required ng-model="email" ng-pattern="/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/" >
                                                    <span style="color:red" ng-show="orderform.email.$error.pattern">Please enter a Valid Email-Id.</span>
						</div>
						<div class="form-wrapper">
                                                    <input type="text" class="form-control " placeholder="Address" name="address" data-language='en' >
						</div>
					</div>
                 <div class="col-lg-12">
                     <div class="form-row" id="row1">1:
                     <div class="form-wrapper" id="size1">
                         <input type="text" class="form-control" id="s1" name="s1" placeholder="Size" onclick="document.getElementById('id05').style.display='block'"/></div>
                         <div class="form-wrapper" id="copy1">
                             <input type="number" class="form-control" id="c1" name="c1" placeholder="Copies" required/></div>
                                                  
                             <input type="hidden" class="form-control" id="nos1" name="nos" value=""/>
                     </div>
                     <div style=" margin-bottom: 5px;"  id='f1'>
                         <input name='file1' type='file' id="fileid1" accept=".jpg, .jpeg, .png" required/></div>
                         <div class="preview"></div>
        <div id='file_tools'>
            <img src='images/FileAdd.png' width="20" height="20" id='add_file' title='Add new Photo'/>
            <img src='images/Filedelete.png' width="20" height="20" id='del_file' title='Delete This'/>
	</div>
                                                                                
                                    </div>
                          <input type="hidden" id="tamt" name="tamt" value="0"/>
              
                <center><div>
                        <button class="bubbly-button" type="submit" name="submit" onclick="document.getElementById('nos1').value=counter;">ORDER NOW</button>
                    </div></center>
               
                       </div></center>      
         
 
         
        </form>
                
            </div>
            
        </div>
                  <div id="id05" class="modalprofile"> 
    
    <!-- Modal Content -->
    <div class="modalprofile-content animate shadowclass">
        <div class="imgcontainer" style=""> 
    <div><b>Select Size </b><span onclick="document.getElementById('id05').style.display='none'" class="cl" title="Close Modal">&times;</span>
    
    </div>
        </div>
  
 <div class="form-group" style=" margin-bottom: 45px !important;">
      <?php  $i=1;
      while($rec=$shw->fetch_object()){?>
	<div class="row">
            <div class="col-xs-12">
                <input type="hidden" id="<?php echo 'frameid'.$i;?>" value="<?php echo $rec->category;?>">
                <div class="col-xs-6"><img src="gallery/frames/<?php echo $rec->url;?>" width="290" height="400">
                </div><br><div class="col-xs-4"><span><a style=" cursor: pointer" id="framevalue" onclick="myfun(<?php echo $rec->id;?>, '<?php echo $rec->category;?>', counter,'<?php echo $rec->price;?>');"><?php echo "Size: ".$rec->size."<br>Category: ".$rec->category."<br>Service :".$rec->service."<br>Price: ".$rec->price."";?></a>&#8377;</span>	</div>
            </div>
        </div><br>
     
        <?php }?>
 </div>
</div>
   </div>
    
          <script>
                    $(document).ready(function(){
	//counter = 2;
       
        var str="document.getElementById('id05').style.display='block'";
	$('#del_file').hide();
	$('img#add_file').click(function(){
            counter++;
		$('#file_tools').before('<div class="form-row" id="row'+counter+'">'+counter+': <div class="form-wrapper" id="size'+counter+'">'+                        
                         '<input type="text" class="form-control" id="s'+counter+'" name="s'+counter+'" placeholder="Size" onclick="'+str+'"/></div>'+
                         '<div class="form-wrapper" id="copy'+counter+'"><input type="text" class="form-control" id="c'+counter+'" name="c'+counter+'" placeholder="Copies" required/></div>'+
                         '<div class="form-wrapper" id="radio'+counter+'" style=" display: none"><input type="number" class="form-control" id="nos'+counter+'" placeholder="Number of Photos in a Collage"/></div>'+
                     '</div><div style=" margin-bottom: 5px;" id="f'+counter+'"><input name="file'+counter+'" type="file" id="fileid'+counter+'"  accept=".jpg, .jpeg, .png" required/></div><div class="preview"></div>');
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
                function myfun(e,c,i,p){
                        $('#s'+i).removeAttr('readonly');
                        $('#s'+i).val(e);
                        var nc=counter;
                        var price=$('#tamt').val();
                        var tamt= parseInt(price) + parseInt(p);
                        $('#tamt').val(tamt);
                        
                        if(c === "Collage")
                        {
                           $('#fileid'+i).attr('multiple',true);
                           $('#fileid'+i).attr('name','file[]');
                           input.addEventListener('change', updateImageDisplay);
                        }
                        $('#id05').hide();
                        $('#s'+i).attr('readonly',true);
                        
                   
                   }
                    
              var preview = document.querySelector('.preview');

      
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
