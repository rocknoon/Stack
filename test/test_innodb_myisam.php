<?php
$mysqli = new mysqli("localhost", "weflex_dingen", "dingen", "test");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

for( $i = 0; $i < 10000000; $i ++ ){
$value = rand( 1,100000 );
$query = "INSERT INTO rocky_int VALUES (NULL, 'rocky', '$value')";
$mysqli->query($query);
}

/* close connection */
$mysqli->close();
?>