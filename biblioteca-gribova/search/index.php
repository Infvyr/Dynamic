<html>
	<head>
		<title>Pagina de căutare</title>	
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" href="../fonts/font.css">
		<link rel="shortcut icon" href="srch-b.png" TYPE="image/x-icon">
		<script>
			function check()
            {
                var searchtext = document.getElementById("txt").value;
                if(searchtext=='')
                {
                    alert('Introduceți cuvintele pe care doriți să le găsiți!');
                   
                }
				else{
					document.myform.submit();
				}
            }
			function reset_table()
			{
				document.myform.submit();
			}
		</script>
	</head>
	<body>
		<?php
error_reporting(0);
require_once "config.php";
$link = mysql_connect($hostname, $username,$password);
$dbcon = mysql_select_db($dbname);
 echo "<div align='center' class='resp_code'>";
 echo "<h5><b>Căutați în baza de date a bibliotecii, cărțile dorite!</b></h5>";
echo "<div align='center'>";
  echo "<form  method='post' action='index.php'  id='searchform' class='frms' name='myform'> 
	      <input  type='text' id='txt' name='name' autocomplete='off' placeholder='Introduceți termenii pentru căutare...'> 
	      <input  type='submit' name='submit' value='Căutați' id='search' onclick='check();'>
		  <input  type='submit' name='reset' value='Ștergeți' id='reset' onclick='reset_table()'> 
	    </form> ";
 echo "</div>";
 echo "<div align='center'>";
 $search = $_POST["name"];
 $search = preg_replace("#[^0-9a-z]#i","",$search);

  if(isset($_POST['name']))
    {	
        echo "<table class='table'>
		<tr><th>Denumire Carte</th>
		<th>Autor</th>
		<th>Editura</th>
		</tr>";	    
	    $qry = mysql_query('SELECT * FROM users WHERE name like "%'.$search.'%" OR surname like "%'.$search.'%" OR password like "%'.$search.'%"' ); /* OR surname like "%'.$search.'%'*/
	    $count = mysql_numrows($qry);
		if($count>0){
			if($qry) 
			{    
			  while($row=mysql_fetch_row($qry))  /*aici vor fi introduse cimpurile dorite pentru afisare */ 
			   {      
					$nam = $row['name'];
					$clg = $row['surname'];
					echo "<tr><td id='nam'>$row[1]</td>
					<td id='clg'>$row[2]</td>
					<td id='clg'>$row[3]</td>
					</tr>"; /*<td id='clg'>$row[3]</td>*/
			   }    
			}
				else{echo "No";}
		}
		else{$op = "Nu am găsit nici un rezultat după cuvintele introduse"."<br>". "Introduceți corect cuvîntul căutat!";}	    
    }
    else
    {
	    echo "<table class='table'>
		<tr><th>Denumire Carte</th>
		<th>Autor</th>
		<th>Editura</th>
		</tr>";	   
	    $query = mysql_query("SELECT * FROM users");
	    while($row=mysql_fetch_array($query))
	    {
			$nam = $row['name'];
			$clg = $row['surname'];
		
		/*aici vor fi introduse cimpurile dorite pentru afisare */ 
		echo "<tr>
				<td id='nam'>$nam</td>
				<td id='clg'>$row[2]</td> 		
				<td id='clg'>$row[3]</td> 		
			</tr>";		/*<td id='clg'>$row[1]</td>*/
	    }
    }
    echo "</table>";
    echo "</div>";
	echo "<div style='font-weight:bold;color:red;'>$op</div>";
     echo "</div>";
?>
	</body>
</html>


