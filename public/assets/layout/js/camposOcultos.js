function exibirOutrosFamiliaridade(id) {
    document.getElementById('familiar').style.display="none";

    if(id == 25) {
        document.getElementById('familiar').style.display = "block";
    }
}

function exibirTipoMedicamentos(id) {

    if(id == 1){
        document.getElementById('medicamentos').style.display = "block";
    }else{
        document.getElementById('medicamentos').style.display="none";
    }
}