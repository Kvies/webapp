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
				if(!ctype_digit($el0)){
					echo"Exeption. Write number in id Client!";?>
					<br/>
					<a href="../html/InsertCars.html">
		                 <input type="button" value="Add Car">
		            </a>
				<?
				}else{
				$carse=mysql_query("select Max(idCars) where cars",$db);
				
					if($el0<$carse){
                $el1 = $_POST['el1'];
                $el2 = $_POST['el2'];
                $el3 = $_POST['el3'];
				$a = getdate();
				if(!ctype_digit($el3)|| $el3>$a['year']){
					echo"Exeption. Write number in year!";?>
					<br/>
					<a href="../html/edit.html">
		                 <input type="button" value="Edit">
		            </a>
				<?
				}else{
				$el4 = $_POST['el4'];
				
                $result=mysql_query("UPDATE  cars SET make='$el1' WHERE idCars=$el0",$db);
                 $result=mysql_query("UPDATE  cars SET model='$el2' WHERE idCars=$el0",$db);
				 $result=mysql_query("UPDATE  cars SET year='$el3' WHERE idCars=$el0",$db);
				 $result=mysql_query("UPDATE  cars SET VIN='$el4' WHERE idCars=$el0",$db);
                if ($result==true){
                    echo "<br>All good.";
                } else echo "<br>Exeption.";
	       
				Mysql_close($db);}
				                }else{
						echo"Exeption.Such number does not exist!";?>
					<a href="../html/edit.html">
		                 <input type="button" value="Edit">
		            </a>
				<? 
					 }
				}              
                
        ?>
	    
		<a href="select.php">
			<input type="button" value="Cars" align="center">
		</a>   
	</body>
  </html>