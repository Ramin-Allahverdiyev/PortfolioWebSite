<?php

$folderPath = 'images/';

$files = glob($folderPath . '*');

foreach ($files as $file) {
    if (is_file($file)) {
        unlink($file);

    }
}

$conn = mysqli_connect('localhost','root','rr210602','contact_db') or die('connection failed');


$query = "SELECT * FROM `bmupic` where id!=-1";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $image_name = $row['imgname'];
    $image_data = $row['images'];
    

    $file_path = 'images/'.$image_name.'.jpg';
    file_put_contents($file_path, $image_data);
}

mysqli_close($conn);

?>
