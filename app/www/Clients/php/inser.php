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
                $el1 = $_POST['el1'];
                $el2 = $_POST['el2'];
                $el3 = $_POST['el3'];
				$el4 = $_POST['el4'];
				$el5 = $_POST['el5'];
				if(!ctype_digit($el5)){
					echo"Exeption. Write number in Phone!";?>
					<br/>
					<a href="../html/Insert.html">
		                 <input type="button" value="Add Client">
		            </a>
				<?
				}else{
				$el6 = $_POST['el6'];
                $result=mysql_query("INSERT INTO clients (First_name,Last_name,Pate_of_birth,Address,Phone,Email) 
				                     VALUES ('$el1','$el2','$el3','$el4','$el5','$el6')",$db);
                 
                if ($result==true){
                    echo "<br>All good.";
                } else echo "<br>Exeption.";
	       
            Mysql_close($db);}
                
        ?>
	    
		<a href="select.php">
			<input type="button" value="Clients" align="center">
		</a>   
	</body>
  </html>