<?php
    $connn = mysqli_connect('localhost','root','rr210602','contact_db') or die('connection failed');
    $resulttt = mysqli_query($connn,'SELECT * FROM `social` where id=7') or die('query failed');
    $rowss = $resulttt->fetch_assoc();
    

?>