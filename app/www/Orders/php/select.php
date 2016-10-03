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
			$carse=mysql_query("select * from Orders",$db);
			$myst = mysql_num_rows($carse);
			$myrez = 1;
            
        ?>
        <table border align="center">
            <tr>
                <th>№</th>
                <th>Amaunt</th>
                <th>Status</th> 
                <th>№ Car</th>
				<th>№ Client</th>
            </tr>
                <? 
				    do{
				    $cars=mysql_query("select * from Orders WHERE  idOrder=$myrez",$db);
                    $allc=mysql_fetch_array($cars);
					if ($allc['idOrder']!=null){
				?><tr>
                    <td>
					    <? echo $allc['idOrder'];
						   
						?>
					</td>
                    <td>
					    <? echo $allc['Amaunt'];?>
					</td>
					<td>
					    <? echo $allc['Status'];?>
					</td>
					<td>
					    <? echo $allc['id_car'];?>
					</td>
					<td>
					    <? echo $allc['id_client'];
						if($allc['idOrder']==null){$myst=$myst+1;}
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
		    <input type="button" value="ADD Orders">
			
		</a>
		<a href="../html/delite.html">
		    <input type="button" value="Delite Orders">
		</a>
		<a href="../html/Edit.html">
		    <input type="button" value="Edit Orders">
		</a>
	</body>
  </html>