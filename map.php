<!DOCTYPE html>
<html>
<head>
</head>
<body>
<p>

    <?php
    /*
    //mysql code
    $db = new mysqli(
        "bbsqldb.database.windows.net",
        "teamdsqldb",
        "Sql20022016*",
        "SQL_BB"
    );
    // test if connection was established, and print any errors
    if (!$db) {
        die('Connect Error: ' . mysqli_connect_errno());
    }
    $sql_query = "SELECT * FROM B&B";
    // execute the SQL query
    $result = $db->query($sql_query);
    if (!$result) {
        die('No query');
    }
    // iterate over $result object one $row at a time
    // use fetch_array() to return an associative array
    while($row = $result->fetch_array()){
        // print out fields from row of data
        echo $row['bbname'] . "<br>";
    }
    */
    /*
    echo ($row [bbname]);
    echo ($row [latitude]);
    echo ($row [longitude]);
    }
    */
    function parseToXML($htmlStr)
    {
        $xmlStr=str_replace('<','&lt;',$htmlStr);
        $xmlStr=str_replace('>','&gt;',$xmlStr);
        $xmlStr=str_replace('"','&quot;',$xmlStr);
        $xmlStr=str_replace("'",'&#39;',$xmlStr);
        $xmlStr=str_replace("&",'&amp;',$xmlStr);
        return $xmlStr;
    }
    //sql code
    $conn = new PDO ( "sqlsrv:server = tcp:bbsqldb.database.windows.net,1433; Database = SQL_BB", "teamdsqldb", "Sql20022016*");
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    try {
        $st = $conn->query("SELECT [bbname],[address],[latitude],[longitude] FROM [B&B] ");
        header("Content-type: text/xml");
        echo '<markers>';
        foreach ($st->fetchAll() as $row) {
            echo '<marker ';
            echo 'name="' . parseToXML($row['bbname']) . '" ';
            echo 'address="' . parseToXML($row['address']) . '" ';
            echo 'lat="' . $row['latitude'] . '" ';
            echo 'lng="' . $row['longitude'] . '" ';
            echo 'type="' . $row['type'] . '" ';
            echo '/>';
        }
// End XML file
        echo '</markers>';
    }
    catch(PDOException $e)
    {print"$e";}
    ?>




</p>
</body>
</html>
