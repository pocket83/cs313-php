<html>

<body>
    <h1>Users</h1>
    <?php

// default Heroku Postgres configuration URL

$dbUrl = getenv('postgres://hdghgzswtmkufg:zG8qDA8ZElYXvqeGbhvYJwhMMs@ec2-54-235-155-172.compute-1.amazonaws.com:5432/d5pf61j61flag6');

$dbopts = parse_url($dbUrl);


$dbHost = $dbopts["host"];
$dbPort = $dbopts["port"];
$dbUser = $dbopts["user"];
$dbPassword = $dbopts["pass"];
$dbName = ltrim($dbopts["path"],'/');

try {
$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
    foreach($db->query('SELECT first_name, last_name, email FROM users')as $row)
    {
        echo '<p>';
        echo '<strong>' . $row['first_name'] . '' . $row['last_name'] . ':';
        echo $row['email'];
        echo '</p>';
    }
}
catch (PDOException $ex) {
print "<p>error: $ex->getMessage() </p>\n\n";
die();
}

?>
</body>

</html>