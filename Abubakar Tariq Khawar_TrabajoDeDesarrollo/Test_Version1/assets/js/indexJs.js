function getuser(){
    alert("localStorage.length");
    if(localStorage.length > 0){
        document.getElementById('resultUser').innerHTML = JSON.parse(localStorage.getItem('dataAbubakar1'));
    }
}