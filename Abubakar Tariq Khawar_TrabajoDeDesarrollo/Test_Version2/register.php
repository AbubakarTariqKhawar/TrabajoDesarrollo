<?php 
    include ("header.php");
    include ("check-table.php");
?>

<?php 
  $connexio = mysqli_connect("localhost", "root", "", "bbdd_test");
  mysqli_set_charset($connexio,"utf8");
  $consulta = "SELECT max(id) as id FROM user";
  $result = mysqli_query($connexio, $consulta);

  $id_persona = "";
  while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
    $id_persona = $row['id'];
  }
  $id_persona = $id_persona + 1;

  if(isset($_COOKIE['usercreating'])){
    $usercreating = $_COOKIE['usercreating'];
  }else{
    $usercreating = "";
  }
  $passwordincorrect = "";

  if(isset($_POST['name'])){
    
    $id = $id_persona;
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['mail'];
    $password = $_POST['password'];
    $rpassword = $_POST['password1'];

    $checkmail = "SELECT email FROM user WHERE email LIKE '%".$email."%'";
    $checkresult = mysqli_query($connexio, $checkmail);
    $list = "";
    while($row = mysqli_fetch_array($checkresult, MYSQLI_BOTH)){
      $list = $row['email'];
    }

    if($password == $rpassword){
      $passwordincorrect = "";
      if ($list != $email){
        $insert_user = $connexio -> query("INSERT INTO user VALUES ('$id', '$name', '$surname', '$email', '$password')");
        setcookie("usercreating", "<p><b>l'usuari ha creat correctament.</b></p>", time() + 2);
        header("Refresh:0");
      }else{
        $passwordincorrect = "<p><b>Amb aquest correu electrònic l'usuari ja existeix</b></p>";
      }
    }else{
      $passwordincorrect = "<p><b>Les contrasenyes no coincideixen</b></p>";
    }
    
  }
?>


  <div class="formulario">
    <form action="" method="post">
      <p class="forR"><b>Registrar-se</b></p>
      <p><label> Nom* </label><input type="text" id="name" name="name" required></p>
			<p><label> Cognom* </label><input type="text" id="surname" name="surname" required></p>
			<p><label> Email/usuario* </label><input type="email" id="mail" name="mail" required></p>
      <p><label> Contrasenya* </label><input type="password" id="password" name="password" required></p>
			<p><label> Repeteix contrasenya* </label><input type="password" id="password1" name="password1" required></p>
			<p><label>*Camps oblitatoris</label></p>
      <?=$usercreating?> </br>
      <?=$passwordincorrect?> </br>
      <div class="formB">
        <input type="submit" value="Registrar-se"></br></br>
        <input type="button" onclick="location.href='index.php'" value="Mostrar Usuaris"/>
      </div>
    </form>
  </div>
    
<?php 
    include 'footer.php';
?>