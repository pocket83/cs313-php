<html>

<head>
    <meta charset="utf-8">
    <title>PHP Survey</title>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ubuntu:regular&subset=Latin,Cyrillic">
    <link rel="stylesheet" type="text/css" href="phpSurvey.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
</head>

<body>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <?php

// default Heroku Postgres configuration URL
$dbUrl = getenv('DATABASE_URL');

if (empty($dbUrl)) {
 // example localhost configuration URL with postgres username and a database called cs313db
 $dbUrl = "postgres://hdghgzswtmkufg:zG8qDA8ZElYXvqeGbhvYJwhMMs@ec2-54-235-155-172.compute-1.amazonaws.com:5432/d5pf61j61flag6";
}

$dbopts = parse_url($dbUrl);

$dbHost = $dbopts["host"]; 
$dbPort = $dbopts["port"]; 
$dbUser = $dbopts["user"]; 
$dbPassword = $dbopts["pass"];
$dbName = ltrim($dbopts["path"],'/');

try {
 $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
}
catch (PDOException $ex) {
 print "<p>error: $ex->getMessage() </p>\n\n";
 die();
}
 ?>
        <nav>
            <div class="nav-wrapper blue lighten-4"> <a href="hello.html" class="brand-logo">Weston Clark</a>
                <ul id="nav-mobile" class="right">
                    <li class="navLink"><a class="navLinkText" href="../hello.html">Home</a></li>
                    <li class="navLink"><a class="navLinkText" href="../assignments.html">Assignments</a></li>
                </ul>
            </div>
        </nav>
        <div class="header">
            <h1>Database Access</h1> </div>
        <div class="col s12 m6">
            <div class="card  blue-grey lighten-3">
                <div class="card-content white-text"> <span class="card-title">Table Contents</span>
                    <p>Users</p>
                    <div class="users"> </div>
                    <?php
                        foreach ($db->query('SELECT first_name, last_name, email FROM users') as $row)
                        {
                            echo '<p>';
                            echo '<strong>' . 'First Name: ' . $row['first_name'] . ' ' . 'Last Name' . $row['last_name'] . ' Email: ' . $row['email'];
                            echo '</p>';
                        }
                    ?>
                    
                    <p>Recipes</p>
                    <div class="recipes"> </div>
                    <?php
                        foreach ($db->query('SELECT name, prep_time, serves, instructions FROM recipe') as $row)
                        {
                            echo '<p>';
                            echo '<strong>' . 'Name: ' . $row['name'] . ' ' . 'Prep Time: ' . $row['prep_time'] . ' Serves: ' . $row['serves'] . ' ' . 'Instructions: ' . $row['instructions'];
                            echo '</p>';
                        }
                    ?>
                    
                </div>
            </div>
        </div>
</body>

</html>