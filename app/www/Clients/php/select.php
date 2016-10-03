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
                printf("Не удалось подключиться: %s\n", mysqli_connect_error());
                exit();
            }
			mysql_select_db('Administrationdb',$db);
			$carse=mysql_query("select * from clients",$db);
			$myst = mysql_num_rows($carse);
			$myrez = 1;
            
        ?>
        <table border align="center">
            <tr>
                <th>№</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Pate of birth</th>   
                <th>Address</th>
				<th>Phone</th>
				<th>Email</th>
            </tr>
                <? 
				    do{
				    $cars=mysql_query("select * from clients WHERE  idClients=$myrez",$db);
                    $allc=mysql_fetch_array($cars);
				if ($allc['idClients']!=null){
				?><tr>
                    <td>
					    <? echo $allc['idClients'];
						   
						?>
					</td>
                    <td>
					    <? echo $allc['First_name'];?>
					</td>
					<td>
					    <? echo $allc['Last_name'];?>
					</td>
					<td>
					    <? echo $allc['Pate_of_birth'];?>
					</td>
					<td>
					    <? echo $allc['Address'];?>
					</td>
					<td>
					    <? echo $allc['Phone'];?>
					</td>
					<td>
					    <? echo $allc['Email'];
						if($allc['idClients']==null){$myst=$myst+1;}
						$myrez=$myrez+1;
						?>
					</td>
					</tr>
                <?}else{$myrez=$myrez+1;$myst=$myst+1;}	
				    }
				    while ($myrez <= $myst  );
				?>
            </tr>
			
        </table>
	    <?
		    Mysql_close($db);
		?>
		<a href="../../index.html">
							    <input type="button" value="DataBases" align="center">
		</a>   
		<br/>
        <a href="../html/Insert.html">
		    <input type="button" value="ADD Clients">
			
		</a>
		<a href="../html/delite.html">
		    <input type="button" value="Delite Clients">
		</a>
		<a href="../html/Edit.html">
		    <input type="button" value="Edit Clients">
		</a>
		<br/> <br/><br/>
		<form action="../php/clcar.php"  method="post">
		        <p>Enter number's clienr for  viewing of his cars</p>
		        <br/><input name="el12" type="text" size="10"><br/>
				<input type="submit" value="Client Cars">
		</form>
	</body>
  </html>