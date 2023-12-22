<?php
 include('connection.inc.php');

$query=mysqli_query($conn,"SELECT id from guests");
$count_total_guests=mysqli_num_rows($query);

echo $count_total_guests
 ?> 