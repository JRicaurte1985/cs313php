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
        <th>Video Card</th>
        <th>Manufacturer</th>
        <th>Chipset</th>
        <th>Memory</th>
        <th>Core Clock</th>
        <th>3DMark Score</th>
        <th>Price</th>
    </tr>
    </thead>
    <tbody>

        
<?php
    include 'getDB.php';

    $db = loadDatabase();

    $stmt = $db->query
    ("SELECT v.video_card_name, m.manufacturer_name, v.video_card_chipset,
    v.video_card_memory, v.video_card_core_clock, v.video_card_benchmark_rating,                   v.video_card_price FROM video_card v INNER JOIN manufacturer m ON v.manufacturer_id =
    m.manufacturer_id");

   $vids = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($vids) > 0)
    {
        foreach ($vids as $vid)
        {
            echo "<tr>";
            echo "<td> $vid[video_card_name]</td>"; 
            echo "<td> $vid[manufacturer_name]</td>"; 
            echo "<td> $vid[video_card_chipset]</td>";  
            echo "<td>$vid[video_card_memory]</td>";
            echo "<td> $vid[video_card_core_clock]</td>"; 
            echo "<td>$vid[video_card_benchmark_rating]</td>"; 
            echo "<td>$$vid[video_card_price]</td>";
            echo "</tr>";
        }
    }

    echo "</tbody></table></html>";
?>