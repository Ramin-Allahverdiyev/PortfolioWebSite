<?php
    $conn = mysqli_connect('localhost','root','rr210602','contact_db') or die('connection failed');
    $resultt = mysqli_query($conn,'SELECT * FROM `edu_exp` where id=1') or die('query failed');
    $roww = $resultt->fetch_assoc();
    

?>