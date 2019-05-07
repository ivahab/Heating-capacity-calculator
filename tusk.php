<?php
//server request uri
$name = $_POST["name"];
$temp1 = $_POST["temp1"];
$temp2 = $_POST["temp2"];
$amount = $_POST["amount"];



$servername = "localhost";
$username = "ohrev";
$password = "ohrev";
$dbname = "ohrev";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM `ohrev` WHERE `Name-en` LIKE '$name'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
		$c= $row["kapacita"];
		$Cwh = $c/3600;
		$E = $amount * $Cwh * ($temp2-$temp1); //
		$E1 = $E/1000;
		$KJ = $E1/3600;
    }
} else {
    echo "0 results";
}
$conn->close();



?>

<html>
    <head>
    
        <title></title>
        <meta charset="UTF-8">
        <link rel="shortcut icon" type="image/x-icon" href="icon.ico" />
        
        <link rel="stylesheet" href="style.css"> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        
            
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

         
        </head>
    
    
<body>        
     
        
        
  <div class="table-responsive">
  <table class="table">
     <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Výpočet</th>
    </tr>
    
  </thead>
  <tbody>
    
    <tr>
      <th scope="row">Merná tepelná kapacita latky</th>
      <td><?php echo $c; ?></td>
    
    </tr>
    
    <tr>
      <th scope="row">Merná tepelná kapacita</th>
      <td><?php echo $Cwh; ?></td>
     
    </tr>
    
    <tr>
      <th scope="row">W hodiny</th>
      <td><?php echo $E; ?></td>
    
    </tr>
    
    <tr>
      <th scope="row">KW hodiny</th>
      <td><?php echo $E1; ?></td>
    
    </tr>
    
    <tr>
      <th scope="row">K joule</th>
      <td><?php echo $KJ; ?></td>
     
    </tr>
    
  </tbody>
  </table>
</div>      
        
 
    </body>
</html>




