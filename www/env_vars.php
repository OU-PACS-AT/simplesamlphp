<html>
 <body>
  <table>
  <tr><th colspan="2">$_SERVER Variables</th></tr>
<?php
    foreach ($_SERVER as $key => $value) {
        echo "   <tr><td>".htmlspecialchars($key)."</td><td>".htmlspecialchars($value)."</td></tr>\n";
    }
?>
</table>
<hr>
<table>
<tr><th colspan="2">$_COOKIE Variables</th></tr>
<?php 
    foreach ($_SERVER as $key => $value) {
    	echo "   <tr><td>".htmlspecialchars($key)."</td><td>".htmlspecialchars($value)."</td></tr>\n";
    }
    ?>
</table>
<hr>
<table>
<tr><th colspan="2">Memcache Variables</th></tr>
<?php 
    

    $m = new Memcached();
    $m->addServer('localhost',11211);
    
    $response = $m->getAllKeys();
     
    for ($i = 0; $i < count($response); $i++) {
    	$value = $m ->get($response[$i]);
    	if ($value) {
    		echo "<tr><td>Key: ".htmlspecialchars($response[$i])."</td>";
    		echo "<td>Value: ".htmlspecialchars($value)."</td></tr>";
    	} else {
    		echo "<tr><td>Key: ".htmlspecialchars($response[$i])."</td>";
    		echo "<td>Value: NONE FOUND</td></tr>";
    	}
    }
    
/*    if ($response){
    	echo "<tr><td>var_dump: " + var_dump($response) + "</td></tr>";
    } else {
    	echo "<tr><td>NO RESPONSE VAR</tr></td>";
    }
  */  
    
    
?>
  </table>
 </body>
</html>
