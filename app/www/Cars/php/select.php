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
			$carse=mysql_query("select * from cars",$db);
			$myst = mysql_num_rows($carse);
			$myrez = 1;
            
        ?>
        <table border align="center">
            <tr>
                <th>№</th>
                <th>Make</th>
                <th>Model</th>
                <th>Year</th>   
                <th>VIN</th>
            </tr>
                <? 
				    do{
				    $cars=mysql_query("select * from cars WHERE  idCars=$myrez",$db);
                    $allc=mysql_fetch_array($cars);
					if ($allc['idCars']!=null){
				?><tr>
                    <td>
					    <? echo $allc['idCars'];
						   
						?>
					</td>
                    <td>
					    <? echo $allc['make'];?>
					</td>
					<td>
					    <? echo $allc['model'];?>
					</td>
					<td>
					    <? echo $allc['year'];?>
					</td>
					<td>
					    <? echo $allc['VIN'];
						if($allc['idCars']==null){$myst=$myst+1;}
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
        <a href="../html/InsertCars.html">
		    <input type="button" value="ADD CAR">
			
		</a>
		<a href="../html/delite.html">
		    <input type="button" value="Delite">
		</a>
		<a href="../html/Edit.html">
		    <input type="button" value="Edit">
		</a>
	</body>
  </html>