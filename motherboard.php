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

    <div id='centeredmenu'>
     <ul>
      <li><a href='cpu.php'><img src='cpu.jpg'></a></li>
      <li><a href='motherboard.php'><img src='motherboard.jpg'></a></li>
      <li><a href='memory.php'><img src='memory.jpg'></a></li>
      <li><a href='storage.php'><img src='storage.jpg'></a></li>
      <li><a href='video_card.php'><img src='video_card.jpg'></a></li>
      <li><a href='power_supply.php'><img src='power_supply.jpg'></a></li>
      <li><a href='computer_case.php'><img src='computer_case.jpg'></a></li>
     </ul>
    </div><br><br><br><br><br><br><br><br><br><br><br><br>

    <h1>In Stock</h1>

    <table cellspacing = "1" class='tablesorter'>
    <thead> 
    <tr>
     <th>Motherboard</th>
     <th>Manufacturer</th>
     <th>Socket/CPU</th>
     <th>Form Factor</th>
     <th>RAM Slots</th>
     <th>Max RAM</th>
     <th>Price</th>
    </tr>
    </thead>
    <tbody>

            
<?php
    include 'getDB.php';

    $db = loadDatabase();

    $stmt = $db->query("SELECT mb.motherboard_name, m.manufacturer_name,
    mb.motherboard_socket_cpu,mb.motherboard_form_factor, mb.motherboard_ram_slots,
    mb.motherboard_max_ram, mb.motherboard_price FROM motherboard mb INNER JOIN manufacturer m
    ON mb.manufacturer_id = m.manufacturer_id");

    $mbs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if (count($mbs) > 0)
    {
        foreach ($mbs as $mb)
        {
            echo "<tr>";
            echo "<td> $mb[motherboard_name]</td>"; 
            echo "<td> $mb[manufacturer_name]</td>"; 
            echo "<td> $mb[motherboard_socket_cpu]</td>";  
            echo "<td>$mb[motherboard_form_factor]</td>";
            echo "<td> $mb[motherboard_ram_slots]GB</td>"; 
            echo "<td>$mb[motherboard_max_ram]</td>"; 
            echo "<td>$$mb[motherboard_price]</td>";
            echo "</tr>";
        }
    }

    echo "</tbody></table></html>";
?>