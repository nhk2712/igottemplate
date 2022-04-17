<?php
$svname = 'localhost';
$dbuser = 'nhk2712';
$dbpass = 'ev3BiNcfsSHB!GjW';
$dbname = 'ppshare';

$db = mysqli_connect($svname,$dbuser,$dbpass,$dbname);
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
?>