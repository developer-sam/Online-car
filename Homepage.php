<?php 
require_once('service.php');

$obj=new sam();
$res=$obj->viewdata('carbrand');

?>
<html><head>
<meta charset="utf-8">
<title>Logo</title>


 <link href="css/homepagecss.css" rel="stylesheet" type="text/css">
   <script language="javascript" type="text/javascript">
function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();//The XMLHttpRequest object is used to exchange data with a server behind the scenes
		}
		catch(e)	{		
			try{	//All modern browsers (IE7+, Firefox, Chrome, Safari, and Opera) have a built-in XMLHttpRequest object.
		
		xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{ //To handle all modern browsers, including IE5 and IE6, check if the browser supports the XMLHttpRequest object. If it does, create an XMLHttpRequest object, if not, create an ActiveXObject:
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
    }

	
				function getmodel(model_id) {		
	
		var strURL="findmodel.php?model="+model_id;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('modeldiv').innerHTML=req.responseText;
						document.getElementById('seriesdiv').innerHTML='<select name="series">'+
						'<option>Select series</option>'+
				        '</select>';						
												
					} else {
						alert("Problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}		
	}

	function getseries(series_id) {		
		var strURL="findseries.php?series="+series_id;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('seriesdiv').innerHTML=req.responseText;						
					} else {
						alert("Problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
				
	}
</script>     
 <link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>
        <script src="js/jquery-1.6.min.js" type="text/javascript"></script>
        <script src="js/jquery.validationEngine.js" type="text/javascript" ></script>
		<script src="js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
        <script>
            
			jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery("#myform").validationEngine();
			jQuery('#myform').validationEngine('validate');
		});
       </script>
       <script>
            
			jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery("#newform").validationEngine();
			jQuery('#newform').validationEngine('validate');
		});
       </script> 
</head>

<body>


<div class="wraper">
<div class="header">

<div class="headlog">

<form method="post" action="login_action.php" enctype="multipart/form-data" id="myform">
<label><font face="Gill Sans" color="white">Username</font>
<input type="text"  name="email" id="tt" 
class="validate[required]" ></label>
        <font face="Gill Sans" color="white">Password</font>
         <input type="password" name="pass" id="ts"
         class="validate[required]" ><br>

        <input type="submit" name="submit" value="Login"/>
         </form><br>
         <form method="post" action="Register.php" enctype="multipart/form-data">
        <input type="submit"  value="Register if you are New" >
       </form>
 </div>

</div>
<div class="container">

<div class="slider">

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body style="padding:0px; margin:0px; background-color:#fff;font-family:Arial, sans-serif">

    <!-- #region Jssor Slider Begin -->

    <!-- Generator: Jssor Slider Maker -->
    <!-- Source: http://www.jssor.com/demos/simple-fade-slideshow.slider -->
    
    <!-- This demo works without jquery library. -->

    <script type="text/javascript" src="js/jssor.slider.min.js"></script>
    <!-- use jssor.slider.debug.js instead for debug -->
    <script>
        jssor_1_slider_init = function() {
            
            var jssor_1_SlideshowTransitions = [
              {$Duration:1200,$Opacity:2}
            ];
            
            var jssor_1_options = {
              $AutoPlay: true,
              $SlideshowOptions: {
                $Class: $JssorSlideshowRunner$,
                $Transitions: jssor_1_SlideshowTransitions,
                $TransitionsOrder: 1
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };
            
            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
            
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 600);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            //responsive code end
        };
    </script>

    <style>
        
        /* jssor slider bullet navigator skin 05 css */
        /*
        .jssorb05 div           (normal)
        .jssorb05 div:hover     (normal mouseover)
        .jssorb05 .av           (active)
        .jssorb05 .av:hover     (active mouseover)
        .jssorb05 .dn           (mousedown)
        */
        .jssorb05 {
            position: absolute;
        }
        .jssorb05 div, .jssorb05 div:hover, .jssorb05 .av {
            position: absolute;
            /* size of bullet elment */
            width: 16px;
            height: 16px;
            background: url('img/b05.png') no-repeat;
            overflow: hidden;
            cursor: pointer;
        }
        .jssorb05 div { background-position: -7px -7px; }
        .jssorb05 div:hover, .jssorb05 .av:hover { background-position: -37px -7px; }
        .jssorb05 .av { background-position: -67px -7px; }
        .jssorb05 .dn, .jssorb05 .dn:hover { background-position: -97px -7px; }

        /* jssor slider arrow navigator skin 12 css */
        /*
        .jssora12l                  (normal)
        .jssora12r                  (normal)
        .jssora12l:hover            (normal mouseover)
        .jssora12r:hover            (normal mouseover)
        .jssora12l.jssora12ldn      (mousedown)
        .jssora12r.jssora12rdn      (mousedown)
        */
        .jssora12l, .jssora12r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 30px;
            height: 46px;
            cursor: pointer;
            background: url('img/a12.png') no-repeat;
            overflow: hidden;
        }
        .jssora12l { background-position: -16px -37px; }
        .jssora12r { background-position: -75px -37px; }
        .jssora12l:hover { background-position: -136px -37px; }
        .jssora12r:hover { background-position: -195px -37px; }
        .jssora12l.jssora12ldn { background-position: -256px -37px; }
        .jssora12r.jssora12rdn { background-position: -315px -37px; }
    </style>


    <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 600px; height: 300px; overflow: hidden; visibility: hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
            <div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
        </div>
        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 600px; height: 300px; overflow: hidden;">
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="images/1.png"/>
            </div>
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="images/2.png" />
            </div>
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="images/3.png" />
            </div>
            <div data-p="112.50" style="display: none;">
                <img data-u="image" src="images/4.jpg" />
            </div>
            <a data-u="add" href="http://www.jssor.com" style="display:none">Jssor Slider</a>
        
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb05" style="bottom:16px;right:16px;" data-autocenter="1">
            <!-- bullet navigator item prototype -->
            <div data-u="prototype" style="width:16px;height:16px;"></div>
        </div>
        <!-- Arrow Navigator -->
        <span data-u="arrowleft" class="jssora12l" style="top:0px;left:0px;width:30px;height:46px;" data-autocenter="2"></span>
        <span data-u="arrowright" class="jssora12r" style="top:0px;right:0px;width:30px;height:46px;" data-autocenter="2"></span>
    </div>
    <script>
        jssor_1_slider_init();
    </script>

    <!-- #endregion Jssor Slider End -->
</body>
</html>

</div>


</div>
</div>

<div class="sidebar">

<div class="form">


<form method="post" action="search.php">
<table border="1">

  <tr> <th>Select Year: </th><td> <select name="year">
        						<option hidden="">--year--</option>
                    <?php for($i=2000;$i<=2015;$i++) {?>
        			<option value="<?php echo $i ?>"><?php echo $i ?></option>
                    <?php }?>
                    </select></td></tr>
   <tr><th>Select Brand:</th><td>  <select name="name" onChange="getmodel(this.value)">
	<option value="">Select brand</option>
	<?php while ($row=mysql_fetch_array($res)) { ?>
	<option value=<?php echo $row['id']?>><?php echo $row['name']?></option>
	<?php } ?>
	</select></td></tr>
 <tr><th>Model</th>
   <td ><div id="modeldiv"><select name="model" >
	<option>Select model</option>
        </select></div></td>
  </tr>
   <tr >
    <th>Series</th>
    <td ><div id="seriesdiv"><select name="series">
	<option>Select Series</option>
    
        </select></div></td>
  </tr>
     <tr><th> </th><td><center><input type="submit" name="search" value="Go"></center></td></tr>
     </form>
     <form method="post" action="searchcity.php">
     <tr><th>City </th> <?php
     				$res1=$obj->viewdata('cities');
										?>
						<td><select name="city">
						<option value="">Search by city</option>
									<?php
									/*while($fetch=mysql_fetch_object($res1))
									{
									?>
                                     <option value="<?php echo $fetch->id;?>"><?php echo $fetch->name;?></option>
 									<?php   
									}*/
									?></select><br></td></tr>
     <tr><th> </th><td><center><input type="submit" name="search" value="Go"></center></td></tr>
 </table>

</form>


</div>

</div>










</body>
</html>
