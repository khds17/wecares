(function(win,doc){
    'use strict';

    //Delete
    function confirmDel(event)
    {
        event.preventDefault();
        // console.log(event.target.parentNode.href);
        let token=doc.getElementsByName("_token")[0].value;
        if(confirm("Deseja mesmo apagar?")){
            let ajax=new XMLHttpRequest();
            ajax.open("DELETE",event.target.parentNode.href);
            ajax.setRequestHeader('X-CSRF-TOKEN',token);
            ajax.onreadystatechange=function(){
                if(ajax.readyState === 4 && ajax.status === 200){
                    win.location.href="admin";
                }
            }
            ajax.send();
        }else{
            return false;
        }
    }
    if(doc.querySelector('.js-del')){
        let btn=doc.querySelectorAll('.js-del');
        for(let i=0; i<btn.length; i++){
            btn[i].addEventListener('click', confirmDel,false);
        }
    }
})(window,document);

$(document).ready(function() {
    $( "#cidade" ).autocomplete({
         source: function(request, response) {
            $.ajax({
            url: '/cuidadorcidades',
            type: 'get',
            data: {
                    term : request.term
             },
            dataType: "json",
            success: function(data){
               var resp = $.map(data,function(obj){
                    $( "#id" ).val(obj.ID);
                    return obj.CIDADE;
               }); 
 
               response(resp);
            }
        });
    },
    minLength: 1
 });
});

function getPaciente(id) {
    
    $.ajax({
        url: "selectpacientes/" + id,
        type: "post",
        dataType: 'json',
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            if (data != null) {
                //Limpa todos os select selecionados
                $("#pacienteTipo").find('option').attr("selected",false);
                $("#pacienteLocalizacao").find('option').attr("selected",false);
                $("#pacienteCidade").find('option').attr("selected",false);
                $("#pacienteEstado").find('option').attr("selected",false);
                // $("#tomaMedicamento").find('input[type="radio"]').attr("checked",false);

                //Atualiza os dados do formulário de solicitação conforme o paciente selecionado
                $("#pacienteTipo option[value="+data.pacientesTipos[0].ID+"]").attr("selected", "selected");
                $("#pacienteLocalizacao option[value="+data.pacientesLocalizacao[0].ID+"]").attr("selected", "selected");
                $('#pacienteCep').val(data.endereco.CEP);
                $('#pacienteEndereco').val(data.endereco.ENDERECO);
                $('#pacienteBairro').val(data.endereco.BAIRRO);
                $('#pacienteNumero').val(data.endereco.NUMERO);
                $("#pacienteCidade option[value="+data.endereco.ID_CIDADE+"]").attr("selected", "selected");
                $("#pacienteEstado option[value="+data.endereco.ID_ESTADO+"]").attr("selected", "selected");
                $('#pacienteComplemento').val(data.endereco.COMPLEMENTO);
                $("#pacienteCidade option[value="+data.endereco.ID_CIDADE+"]").attr("selected", "selected");
                // $("#tomaMedicamento").val(data.paciente.TOMA_MEDICAMENTOS).attr("checked", "checked");
                $('#tipoMedicamento').val(data.paciente.TIPO_MEDICAMENTOS);
                
            } 
        }
    });
}