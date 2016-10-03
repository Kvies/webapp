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
				$carse=mysql_query("select Max(idClients) where clients",$db);
				if(!ctype_digit($el0) || $el0<$carse){
					echo"Exeption. Write number in id Client!";?>
					<br/>
					<a href="../html/Edit.html">
		                 <input type="button" value="Edit Client">
		            </a>
				<?
				}else{
                $el1 = $_POST['el1'];
                $el2 = $_POST['el2'];
                $el3 = $_POST['el3'];
				$el4 = $_POST['el4'];
				$el5 = $_POST['el5'];
				$el6 = $_POST['el6'];
				if(!ctype_digit($el5)){
					echo"Exeption. Write number in Phone!";?>
					<br/>
					<a href="../html/Edit.html">
		                 <input type="button" value="Edit Client">
		            </a>
				<?
				}else{
				
                 $result=mysql_query("UPDATE  clients SET First_name='$el1' WHERE idClients=$el0",$db);
                 $result=mysql_query("UPDATE  clients SET Last_name='$el2' WHERE idClients=$el0",$db);
				 $result=mysql_query("UPDATE  clients SET Pate_of_birth='$el3' WHERE idClients=$el0",$db);
				 $result=mysql_query("UPDATE  clients SET Address='$el4' WHERE idClients=$el0",$db);
				 $result=mysql_query("UPDATE  clients SET Phone='$el5' WHERE idClients=$el0",$db);
				 $result=mysql_query("UPDATE  clients SET Email='$el6' WHERE idClients=$el0",$db);
                if ($result==true){
                    echo "<br>All good.";
                } else echo "<br>Exeption.";
	       
				Mysql_close($db);}}
                
        ?>
	    
		<a href="select.php">
			<input type="button" value="Clients" align="center">
		</a>   
	</body>
  </html>