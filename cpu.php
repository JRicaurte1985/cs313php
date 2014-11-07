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
        <th>CPU</th>
        <th>Manufacturer</th>
        <th>Speed</th>
        <th>Cores</th>
        <th>TDP</th>
        <th>PassMark Rating</th>
        <th>Price</th>
    </tr>
    </thead>
    <tbody>
        

<?php
    include 'getDB.php';

    $db = loadDatabase();

    $stmt = $db->query("SELECT c.cpu_name, m.manufacturer_name, c.cpu_price, c.cpu_speed,
    c.cpu_cores, c.cpu_tdp, c.cpu_benchmark_rating FROM cpu c INNER JOIN manufacturer m ON
    c.manufacturer_id = m.manufacturer_id");

    $cpus = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($cpus) > 0)
    {
        foreach ($cpus as $cpu)
        {
            echo "<tr>";
            echo "<td> $cpu[cpu_name]</td>"; 
            echo "<td> $cpu[manufacturer_name]</td>"; 
            echo "<td> $cpu[cpu_speed]GHz</td>";  
            echo "<td>$cpu[cpu_cores]</td>";
            echo "<td> $cpu[cpu_tdp]W</td>"; 
            echo "<td>$cpu[cpu_benchmark_rating]</td>"; 
            echo "<td>$$cpu[cpu_price]</td>";
            echo "</tr>";
        }
    }

    echo "</tbody></table></html>";
?>