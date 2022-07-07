<?php 
    include ("header.php");
    include ("check-table.php");
?>
<?PHP
    $connexio = mysqli_connect("localhost", "root", "", "bbdd_test");
        mysqli_set_charset($connexio,"utf8");
        $consulta = "SELECT * FROM user";
        $result = mysqli_query($connexio, $consulta);
        $list = "";
        if(!$result){
          echo ("ERROR: No s'ha trobat cap resultat.");
        }else{
          $list = "";
  
          while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
            $list .= "<tr>";
            $list .= "<td>".$row['id']."</td>";
            $list .= "<td>".$row['name']."</td>";
            $list .= "<td>".$row['surname']."</td>";
            $list .= "<td>".$row['email']."</td>";
            $list .= "<td>".$row['password']."</td>";
            $list .= "<tr>";
          }
        }
?>
<html>
    <body>
        <div class="userdiv">
            <div class="h2Div">
                <h2>Usuarios</h2>
            </div>
            <div class="alluser">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th>contraseña</th>
                    </tr>
                    <tr>
                        <?=$list;?>
                    </tr>
                </table>
            </div>
        </div>
    </body>
</html>
<?php 
    include 'footer.php';
?>