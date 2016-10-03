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
			$myrez=$_POST['el12'];
			echo $myrez;
            $cars=mysql_query("select id_car from Orders WHERE  id_client=$myrez",$db);
            $allc=mysql_fetch_array($cars);
			$po=mysql_num_rows($cars);
			echo $po;
			$cg=0;
			
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
				$gy=$allc[$cg];
				echo $gy;
				$carses=mysql_query("select * from cars WHERE idCars='$gy'",$db);
				$al=mysql_fetch_array($carses);
				?>
				
					<tr>
                    <td>
					    <? echo $al['idCars'];?>
					</td>
                    <td>
					    <? echo $al['make'];?>
					</td>
					<td>
					    <? echo $al['model'];?>
					</td>
					<td>
					    <? echo $al['year'];?>
					</td>
					<td>
					    <? echo $al['VIN'];
						
						$cg=$cg+1;
						?>
					</td>
					</tr>
				
                <?
			}while($cg>=$po);
        ?></table>
	    <?
		    Mysql_close($db);
		?>
		<a href="select.php">
							    <input type="button" value="Clients" align="center">
		</a>   
		<br/>
        
		
	</body>
  </html>