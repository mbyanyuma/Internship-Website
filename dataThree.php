<?php
#Programmer: Moses Byanyuma

require('./.env');


// Opens a connection to a mySQL server
try {
	$db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME. ';charset=utf8',  DB_USERNAME, DB_PASSWORD);
} catch (PDOException $e) {
    echo "An Error occured, could not connect!";
}

$statement = $db->query('SELECT windDir FROM 4a0000009f113b00 LIMIT 36');
$rows = array();
$rows['name'] = 'WindDir';
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    $rows['data'][] = $row['windDir'];   
}

$statement = $db->query('SELECT gustDir FROM 4a0000009f113b00 LIMIT 36');
$rows2 = array();
$rows2['name'] = 'GustDir';
while ($rrow = $statement->fetch(PDO::FETCH_ASSOC)) {
    $rows2['data'][] = $rrow['gustDir'];  
}

$statement = $db->query('SELECT temp FROM 4a0000009f113b00 LIMIT 36');
$rows3 = array();
$rows3['name'] = 'Temp';
while ($rrrow = $statement->fetch(PDO::FETCH_ASSOC)) {
    $rows3['data'][] = $rrrow['temp'];  
}

$statement = $db->query('SELECT humid FROM 4a0000009f113b00 LIMIT 36');
$rows4 = array();
$rows4['name'] = 'Humid';
while ($windRow = $statement->fetch(PDO::FETCH_ASSOC)) {
    $rows4['data'][] = $windRow['humid'];  
}

$result = array();
array_push($result,$rows);
array_push($result,$rows2);
array_push($result, $rows3);
array_push($result, $rows4);

print json_encode($result, JSON_NUMERIC_CHECK);
