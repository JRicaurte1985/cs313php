<?php
    include 'getDB.php';

    $db = loadDatabase();

    $stmt = $db->query("SELECT mb.motherboard_name, m.manufacturer_name, mb.motherboard_socket_cpu,
    mb.motherboard_form_factor, mb.motherboard_ram_slots, mb.motherboard_max_ram, mb.motherboard_price
    FROM motherboard mb INNER JOIN manufacturer m ON mb.manufacturer_id = m.manufacturer_id");

    $mbs = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<table>
          <tr>
          <th>Motherboard</th>
            <th>Manufacturer</th>
            <th>Socket/CPU</th>
            <th>Form Factor</th>
            <th>RAM Slots</th>
            <th>Max RAM</th>
            <th>Price</th>
        </tr>";

    if (count($mbs) > 0)
    {
        foreach ($mbs as $mb)
        {
            echo "<tr>";
            echo "<td> $mb[motherboard_name]</td>"; 
            echo "<td style='text-align:center'> $mb[manufacturer_name]</td>"; 
            echo "<td> $mb[motherboard_socket_cpu]</td>";  
            echo "<td style='text-align:center'>$mb[motherboard_form_factor]</td>";
            echo "<td> $mb[motherboard_ram_slots]GB</td>"; 
            echo "<td style='text-align:center'>$mb[motherboard_max_ram]</td>"; 
            echo "<td>$$mb[motherboard_price]</td>";
            echo "</tr>";
        }
    }


    $stmt2 = $db->query("SELECT c.cpu_name, m.manufacturer_name, c.cpu_price, c.cpu_speed, c.cpu_cores,
    c.cpu_tdp, c.cpu_benchmark_rating FROM cpu c INNER JOIN manufacturer m ON c.manufacturer_id =
    m.manufacturer_id");

    $cpus = $stmt2->fetchAll(PDO::FETCH_ASSOC);

    echo "<!doctype html>
    <head>
        <meta charset='utf-8'>
        <title>Jose Ricaurte's Homepage</title>
        <link rel='stylesheet' type='text/css' href='cs313homepage.css'>
    </head>

    <h1><mark>PC Part Picker Lite</mark></h1><br /><br />

    <table>
        <tr>
            <th>CPU</th>
            <th>Manufacturer</th>
            <th>Speed</th>
            <th>Cores</th>
            <th>TDP</th>
            <th>PassMark Rating</th>
            <th>Price</th>
        </tr>";
    
    
    if (count($cpus) > 0)
    {
        foreach ($cpus as $cpu)
        {
            echo "<tr>";
            echo "<td> $cpu[cpu_name]</td>"; 
            echo "<td style='text-align:center'> $cpu[manufacturer_name]</td>"; 
            echo "<td> $cpu[cpu_speed]GHz</td>";  
            echo "<td style='text-align:center'>$cpu[cpu_cores]</td>";
            echo "<td> $cpu[cpu_tdp]W</td>"; 
            echo "<td style='text-align:center'>$cpu[cpu_benchmark_rating]</td>"; 
            echo "<td>$$cpu[cpu_price]</td>";
            echo "</tr>";
        }
    }

    echo "</table></html>";
?>