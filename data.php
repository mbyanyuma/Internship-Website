<?php
#Programmer: Moses Byanyuma

require('./.env');


// Opens a connection to a mySQL server
try {
	$db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME. ';charset=utf8',  DB_USERNAME, DB_PASSWORD);
} catch (PDOException $e) {
    echo "An Error occured, could not connect!";
}

$statement = $db->query('SELECT timestamp FROM 032096ff152541ae');
$rows = array();
$rows['name'] = 'Timestamp';
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    $rows['data'][] = $row['timestamp'];   
}

$statement = $db->query('SELECT temp FROM 032096ff152541ae');
$rows1 = array();
$rows1['name'] = 'Temp';
while ($rrow = $statement->fetch(PDO::FETCH_ASSOC)) {
    $rows1['data'][] = $rrow['temp'];  
}

$statement = $db->query('SELECT humid FROM 032096ff152541ae');
$rows2 = array();
$rows2['name'] = 'Humid';
while ($rrrow = $statement->fetch(PDO::FETCH_ASSOC)) {
    $rows2['data'][] = $rrrow['humid'];  
}

$result = array();
array_push($result,$rows);
array_push($result,$rows1);
array_push($result, $rows2);

print json_encode($result, JSON_NUMERIC_CHECK);
