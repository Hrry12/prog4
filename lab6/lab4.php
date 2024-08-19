<html>
<head>
    <title> Lab 4</title>
</head>
<body>
<?php 

$personas = array("juan" => "Panama",
"john"=>"USA",
"eica"=>"finlandia", 
"kusanagi"=> "japon") ;


foreach ($personas as $persona =>$pais) {
    print"$persona es de $pais <br>";
    }
    echo"<br>".$personas["juan"];
    echo"<br>".$personas["eica"];
?>
</body>
</html>