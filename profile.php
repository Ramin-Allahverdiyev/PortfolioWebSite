<?php
    $conn = mysqli_connect('localhost','root','rr210602','contact_db') or die('connection failed');
    $result = mysqli_query($conn,'SELECT * FROM `contact_form` where id=1') or die('query failed');
    $row = $result->fetch_assoc();
    $profile=$row['profile'];
    header('Content-type: image/jpeg');
    echo $profile;

?>