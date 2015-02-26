

<?php
      
    $server = "localhost";
    $connectionInfo = array("Database"=>"projectdev", "UID"=>"sa", "PWD"=>"admin123");
    $conn = sqlsrv_connect( $server, $connectionInfo);
    if( $conn ) {
        echo "Connection established.<br />";
    }else{
        echo "Connection could not be established.<br />";
        die( print_r( sqlsrv_errors(), true));
    }

    $query = "SELECT * FROM tblAlbum";
    $stmt = sqlsrv_query($conn, $query);
    if( $stmt === false ) {
        echo "Error in statement execution.\n";
    die( print_r( sqlsrv_errors(), true)); }
    echo "<table border='1'>"; 
    echo "<tr><th>Album Id</th><th>Album Name</th><th>Status</th></tr>";
    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC))
        {     echo "<tr><td>$row[album_id]</td><td>$row[album_name]</td><td>$row[album_status]</td></tr>"; }
        echo "</table>"; sqlsrv_free_stmt( $stmt); sqlsrv_close( $conn);
?>
