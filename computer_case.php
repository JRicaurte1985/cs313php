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
        <th>Case</th>
        <th>Manufacturer</th>
        <th>Type</th>
        <th>Dimensions</th>
        <th>Ext. 5.25"</th>
        <th>Int. 3.5"</th>
        <th>Power Supply</th>
        <th>Price</th>
    </tr>
    </thead>
    <tbody>
        

<?php
    include 'getDB.php';

    $db = loadDatabase();

    $stmt = $db->query
    ("SELECT c.case_name, m.manufacturer_name, c.case_type,
    c.case_size, c.case_ext_bay, c.case_int_bay, c.case_power_supply, c.case_price FROM
    computer_case c INNER JOIN manufacturer m ON c.manufacturer_id = m.manufacturer_id");

    $cases = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($cases) > 0)
    {
        foreach ($cases as $case)
        {
            echo "<tr>";
            echo "<td>$case[case_name]</td>"; 
            echo "<td>$case[manufacturer_name]</td>"; 
            echo "<td>$case[case_type]</td>";  
            echo "<td>$case[case_size]</td>";
            echo "<td>$case[case_ext_bay]</td>"; 
            echo "<td>$case[case_int_bay]</td>"; 
            echo "<td>$case[case_power_supply]</td>";
            echo "<td>$$case[case_price]</td>";
            echo "</tr>";
        }
    }

    echo "</tbody></table></html>";
?>