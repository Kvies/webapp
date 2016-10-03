<!--<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" 
  "http://www.w3.org/TR/html4/loose.dtd">-->
  <html>
    <head>
	    <title>
		    Administration Application
		</title>
		<meta http-equiv="Content-Language" content="en"/>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>	
	</head>
	<body>	
       <?php
            //include '../database.php';
            $db = mysql_connect('localhost','Root','Root');
			if (mysqli_connect_errno()) {
                printf("Exeption: %s\n", mysqli_connect_error());
                exit();
            }
			mysql_select_db('Administrationdb',$db);
			    $el0 = $_POST['el0'];
				$carse=mysql_query("select Max(idOrder) where orders",$db);
				if(!ctype_digit($el0) || $el0<$carse){
					echo"Exeption. Write number in id Order!";?>
					<br/>
					<a href="../html/Edit.html">
		                 <input type="button" value="Edit Order">
		            </a>
				<?
				}else{
                $el1 = $_POST['el1'];
                $el2 = $_POST['el2'];
                $el3 = $_POST['el3'];
				$el4 = $_POST['el4'];
				if(!ctype_digit($el1)){
					echo"Exeption. Write number in Order!";?>
					<br/>
					<a href="../html/Edit.html">
		                 <input type="button" value="Edit Order">
		            </a>
				<?
				}else{
				
                 $result=mysql_query("UPDATE  Orders SET Amaunt='$el1' WHERE idOrder=$el0",$db);
                 $result=mysql_query("UPDATE  Orders SET Status='$el2' WHERE idOrder=$el0",$db);
				 $result=mysql_query("UPDATE  Orders SET id_car='$el3' WHERE idOrder=$el0",$db);
				 $result=mysql_query("UPDATE  Orders SET id_client='$el4' WHERE idOrder=$el0",$db);
				
                if ($result==true){
                    echo "<br>All good.";
                } else echo "<br>Exeption.";
	       
				Mysql_close($db);}}
                
        ?>
	    
		<a href="select.php">
			<input type="button" value="Orders" align="center">
		</a>   
	</body>
  </html>