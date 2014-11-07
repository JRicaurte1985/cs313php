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
        <th>RAM</th>
        <th>Manufacturer</th>
        <th>Speed</th>
        <th>Type</th>
        <th>CAS</th>
        <th>Modules</th>
        <th>Size</th>
        <th>Price</th>
    </tr>
    </thead>
    <tbody>


<?php
    include 'getDB.php';

    $db = loadDatabase();

    $stmt = $db->query("SELECT me.memory_name, m.manufacturer_name, me.memory_size,
    me.memory_speed, me.memory_modules, me.memory_cas, me.memory_price, me.memory_type FROM
    memory me INNER JOIN manufacturer m ON me.manufacturer_id = m.manufacturer_id");

    $mems = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($mems) > 0)
    {
        foreach ($mems as $mem)
        {
            echo "<tr>";
            echo "<td> $mem[memory_name]</td>"; 
            echo "<td> $mem[manufacturer_name]</td>"; 
            echo "<td> $mem[memory_speed]</td>";  
            echo "<td>$mem[memory_type]</td>";
            echo "<td> $mem[memory_cas]</td>"; 
            echo "<td>$mem[memory_modules]</td>"; 
            echo "<td>$mem[memory_size]</td>";
            echo "<td>$$mem[memory_price]</td>";
            echo "</tr>";
        }
    }

    echo "</tbody></table></html>";
?>