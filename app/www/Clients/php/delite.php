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
            $el8 = $_POST['el8'];
				if(ctype_digit($el8)){
					$carse=mysql_query("select Max(idClients) where clients",$db);
					if($el8>$carse){
					 $result=mysql_query("DELETE FROM clients WHERE idClients=$el8",$db);
					 }else{
						echo"Exeption.Such number does not exist!";
		?>
					<a href="../html/delite.html">
		                 <input type="button" value="Delite">
		            </a>
		<? 
					 }
                 
                if ($result==true){
                    echo "<br>All good.";
                } else echo "<br>Exeption.";
	       
            Mysql_close($db);
				}else{
					echo"Exeption.Write number!";
		?>
					<a href="../html/delite.html">
		                 <input type="button" value="Delite">
		            </a>
				<?}?>
	    
		<a href="select.php">
			<input type="button" value="Clients" align="center">
		</a>   
	</body>
  </html>