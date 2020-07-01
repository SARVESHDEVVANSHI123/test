<?php 
include_once ("config/DBFunction.php");
$obj=new DBFunction();
$shw=$obj->show('pricelist');
if(isset($_POST['submit'])){
    if($obj->isexist('orderphoto',$_POST['oid'], '0') ){
        $url1="gallery/photos/".$_POST['pid'];
        $url2="gallery/wphotos/".$_POST['pid'];
        if($obj->isexist('photodetails',$url1, '1') ){
            $obj->insertreorder();
        }
         else
        echo "<script>alert('Please check the photo number!');</script>"; 
    }
    else
        echo "<script>alert('Please check the order number!');</script>";
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
        <title>Chitra Studio Reorder</title>
     
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/mystyle.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/modelclass.css" rel="stylesheet" type="text/css"/>
    </head>
    <body class="bgimage">
        <script src="lib/jquery-1.12.3.js" type="text/javascript"></script>
        <div class="">
            <div >  
         
                <form class="form-group" action='' method="POST">
                   <center>  <div class="container " > 
                           <div class="form-row divheader">
                           <div class="form-wrapper"><img src="images/chitralogo.jpg" width="200" height="200" title="LOGO"> </div>
                           <div class="form-wrapper"><h2>REORDER</h2></div></div>
                           <div class=" clear form-row">
						<div class="form-wrapper">
                                                    <input type="text" class="form-control" name='oid' placeholder="Order Number" required>
						</div>
						<div class="form-wrapper">
                                                    <input type="text" class="form-control" placeholder="Photo Name" name='pid' required>
						</div>
					</div>
					<div class="form-row">
                                            <div class="form-wrapper">
                                                <input type="number" class="form-control " id="size" name="size" placeholder="Size" onclick="document.getElementById('id05').style.display='block'"  required>
						</div>
						<div class="form-wrapper">
                                                    <input type="number" class="form-control" placeholder="Number of copy" data-language='en' name='copy' required>
						</div>
						
					</div>
                           <div class="form-row">
                                            <div class="form-wrapper">
                                                <input type="number" class="form-control " placeholder="Price" name='price' id='price' data-language='en'required >
						</div>
						<div class="form-wrapper">
                                                    <input type="text" class="form-control" placeholder="Description" data-language='en' name='desc' >
						</div>
						
					</div>
                 
                <div>
                    <button type="submit" class="bubbly-button" name="submit">ORDER</button>
                </div>
               
                       </div>    </center>     
         
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
                <input type="hidden" id="frameid" value="<?php echo $rec->id;?>">
                <input type="hidden" id="framep" value="<?php echo $rec->price;?>">
                <div class="col-xs-6"><img src="gallery/frames/<?php echo $rec->url;?>" width="290" height="400">
                </div><br><div class="col-xs-4"><span><a style=" cursor: pointer" id="framevalue" onclick="myfun(<?php echo $rec->id;?>,'<?php echo $rec->price;?>');"><?php echo "Size: ".$rec->size."<br>Category: ".$rec->category."<br>Service :".$rec->service."<br>Price: ".$rec->price."";?></a>&#8377;</span>	</div>
            </div>
        </div><br>
     
        <?php }?>
 </div>
</div>
   </div>
        
         <script>
        
         function myfun(e,p){
                 $('#size').removeAttr('readonly');
                 $('#price').removeAttr('readonly');                 
                 $('#size').val(e);
                 $('#price').val(p);
                 $('#id05').hide();
                 $('#size').attr('readonly',true);
                 $('#price').attr('readonly',true);
                 

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
