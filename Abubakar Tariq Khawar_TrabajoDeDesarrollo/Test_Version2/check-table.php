<?PHP

    $connexio = mysqli_connect("localhost", "root", "", "bbdd_test");
    mysqli_set_charset($connexio,"utf8");

    //create table
    $insert_user = $connexio -> query("CREATE TABLE IF NOT EXISTS `user` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `name` varchar(64) COLLATE utf8_general_ci NOT NULL DEFAULT '0',
        `surname` varchar(64) COLLATE utf8_general_ci DEFAULT '0',
        `email` varchar(64) COLLATE utf8_general_ci DEFAULT '0',
        `password` varchar(64) COLLATE utf8_general_ci DEFAULT '0',
        PRIMARY KEY (`id`),
        UNIQUE KEY `email` (`email`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;");

    //add user
    $firstconsulta = "SELECT max(id) as id FROM user";
    $firstresult = mysqli_query($connexio, $firstconsulta);  

    $firstid = "";
    while($row = mysqli_fetch_array($firstresult, MYSQLI_BOTH)){
        $firstid = $row['id'];
    }
    $firstid = $firstid + 1;
    if($firstid == 1){
        $firstuser = $connexio -> query("INSERT INTO user VALUES ('$firstid', 'Abubakar', 'Tariq', 'atariqw@gmail.com', 'admin123')");
    }

?>