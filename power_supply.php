<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8'>
    <title>Jose Ricaurte's Homepage</title>
    <link rel='stylesheet' type='text/css' href='pcpartpicker.css'>

    <script src="jquery-2.1.1.min.js"></script> 
    <script src="jquery.tablesorter.min.js"></script>
      
    <script>
    $(document).ready(function() 
        { 
        // call the tablesorter plugin 
        $("table").tablesorter(); 
        }
    ); 
    </script>
  </head>

  <body>
    <div id="title">PC Part Picker Lite</div><br><br>

    <h2><mark>Choose a Component</mark></h2><br>

    <div id="centeredmenu">
     <ul>
      <li><a href="cpu.php"><img src="cpu.jpg"></a></li>
      <li><a href="motherboard.php"><img src="motherboard.jpg"></a></li>
      <li><a href="memory.php"><img src="memory.jpg"></a></li>
      <li><a href="storage.php"><img src="storage.jpg"></a></li>
      <li><a href="video_card.php"><img src="video_card.jpg"></a></li>
      <li><a href="power_supply.php"><img src="power_supply.jpg"></a></li>
      <li><a href="computer_case.php"><img src="computer_case.jpg"></a></li>
     </ul>
    </div><br><br><br><br><br><br><br><br><br><br><br><br>

    <h1>In Stock</h1>

    <table cellspacing = "1" class="tablesorter">
    <thead> 
    <tr>
        <th>Power Supply</th>
        <th>Manufacturer</th>
        <th>Form</th>
        <th>Efficiency</th>
        <th>Watts</th>
        <th>Modular</th>
        <th>Price</th>
    </tr>
    </thead>
    <tbody>
        

<?php
    include 'getDB.php';

    $db = loadDatabase();

    $stmt = $db->query
    ("SELECT p.power_supply_name, m.manufacturer_name, p.power_supply_form,
    p.power_supply_efficiency, p.power_supply_watts, p.power_supply_modular,
    p.power_supply_price  FROM power_supply p INNER JOIN manufacturer m ON p.manufacturer_id 
    = m.manufacturer_id");

    $pows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($pows) > 0)
    {
        foreach ($pows as $pow)
        {
            echo "<tr>";
            echo "<td> $pow[power_supply_name]</td>"; 
            echo "<td> $pow[manufacturer_name]</td>"; 
            echo "<td> $pow[power_supply_form]</td>";  
            echo "<td>$pow[power_supply_efficiency]</td>";
            echo "<td> $pow[power_supply_watts]</td>"; 
            echo "<td>$pow[power_supply_modular]</td>"; 
            echo "<td>$$pow[power_supply_price]</td>";
            echo "</tr>";
        }
    }

    echo "</tbody></table></html>";
?>