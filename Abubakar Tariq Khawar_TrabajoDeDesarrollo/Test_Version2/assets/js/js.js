//user registration
function formR(name,surname,mail,pass,pass1){
    var array = "";
    var result = "";
    if((name != "") && (surname != "") && (mail != "") && (pass != "") && (pass1 != "")){
        var passwordd = /^(?=.*[A-Za-z])(?=.*[0-9]).*$/;
        var alfa = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)+$/;
        if(pass === pass1){
            if(alfa.test(mail)){
                if(passwordd.test(pass)){
                    array = [name,surname,mail,pass,pass1];
                    alert("El usuario ha sido creado con exito");
                    var count = (localStorage.length);
                    count = count + 1;
                    //put data
                    
                    var new_data = localStorage.setItem('dataAbubakar'+count+'', array);
                    old_data.push(new_data);
                }else{
                    alert("la contrasena debe tener al menos algunos caracteres alfabeticos (a-z) y algunos numericos (0-9)");
                }
            }else{
                alert("Mail no comple los requesitos");
            }
        }else{
           alert("la contrasena no coincide.");
        }
    }else{

    }
}