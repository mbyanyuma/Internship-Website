<?php
#Programmer: Moses Byanyuma

require('./.env');


// Opens a connection to a mySQL server
try {
	$db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME. ';charset=utf8',  DB_USERNAME, DB_PASSWORD);
} catch (PDOException $e) {
    echo "An Error occured, could not connect!";
}

$statement = $db->query('SELECT temp FROM 14169265172c41ae LIMIT 36');
$rows = array();
$rows['name'] = 'Temp';
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    $rows['data'][] = $row['temp'];   
}

$statement = $db->query('SELECT humid FROM 14169265172c41ae LIMIT 36');
$rows1 = array();
$rows1['name'] = 'Humid';
while ($rrow = $statement->fetch(PDO::FETCH_ASSOC)) {
    $rows1['data'][] = $rrow['humid'];  
}

$statement = $db->query('SELECT rain FROM 14169265172c41ae LIMIT 36');
$rows2 = array();
$rows2['name'] = 'Rain';
while ($rrrow = $statement->fetch(PDO::FETCH_ASSOC)) {
    $rows2['data'][] = $rrrow['rain'];  
}

$statement = $db->query('SELECT windDir FROM 14169265172c41ae LIMIT 36');
$rows4 = array();
$rows4['name'] = 'WindDir';
while ($windRow = $statement->fetch(PDO::FETCH_ASSOC)) {
    $rows4['data'][] = $windRow['windDir'];  
}

/*
$statement = $db->query('SELECT gustDir FROM 14169265172c41ae LIMIT 36');
$rows5 = array();
$rows5['name'] = 'GustDir';
while ($gustRow = $statement->fetch(PDO::FETCH_ASSOC)) {
    $rows5['data'][] = $gustRow['gustDir'];  
}
*/

$statement = $db->query('SELECT windSpeed FROM 14169265172c41ae LIMIT 36');
$rows6 = array();
$rows6['name'] = 'WindSpeed';
while ($windSpeedRow = $statement->fetch(PDO::FETCH_ASSOC)) {
    $rows6['data'][] = $windSpeedRow['windSpeed'];  
}

$statement = $db->query('SELECT gustSpeed FROM 14169265172c41ae LIMIT 36');
$rows7 = array();
$rows7['name'] = 'GustSpeed';
while ($gustSpeedRow = $statement->fetch(PDO::FETCH_ASSOC)) {
    $rows7['data'][] = $gustSpeedRow['gustSpeed'];  
}

$result = array();
array_push($result,$rows);
array_push($result,$rows1);
array_push($result, $rows2);
array_push($result, $rows4);
//array_push($result, $rows5);
array_push($result, $rows6);
array_push($result, $rows7);

print json_encode($result, JSON_NUMERIC_CHECK);
