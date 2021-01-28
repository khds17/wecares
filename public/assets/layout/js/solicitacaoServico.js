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
                console.log(data);
                //Limpa todos os select selecionados
                $("#pacienteTipo").find('option').attr("selected",false);
                $("#pacienteLocalizacao").find('option').attr("selected",false);
                $("#pacienteCidade").find('option').attr("selected",false);
                $("#pacienteEstado").find('option').attr("selected",false);
                $("#familiaridade").find('option').attr("selected",false);
                // $("#tomaMedicamento").find('input[type="radio"]').attr("checked",false);

                //Atualiza os dados do formulário de solicitação conforme o paciente selecionado
                $("#familiaridade option[value="+data.paciente.ID_FAMILIARIDADE+"]").attr("selected", "selected");
                $('#familiaridadeOutros').val(data.paciente.FAMILIAR_OUTROS);
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

function selectPrestadores() {
    
    let prestadores = [];

    $("input[id*='checkPrestador[']").each(function (chave, elemento) {

        if($(elemento).is(':checked')) {

            prestadores.push($(elemento).val());
        }
    });

    $("#idPrestadores").val(prestadores);
}

function aceitarProspostaPrestador(id)
 {
    event.preventDefault();
    if(confirm("Deseja mesmo aceitar este serviço?")){
        $.ajax({
            url:'/aceitarProspostaPrestador/' + id,
            type: 'PUT',
            dataType: 'json',
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (result) {
                window.location.replace('/servicosPrestados');
         }
        })
    }
}

function recusarProspostaPrestador(id)
 {
    event.preventDefault();
    if(confirm("Deseja mesmo recusar este serviço?")){
        $.ajax({
            url:'/recusarProspostaPrestador/' + id,
            type: 'PUT',
            dataType: 'json',
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (result) {
                console.log('Entrou');
                window.location.replace('/novaspropostas');
         }
        })
    }
}

function aceitarPropostaSolicitante(id)
 {
    event.preventDefault();
    if(confirm("Deseja mesmo aceitar este serviço?")){
        $.ajax({
            url:'/aceitarPropostaSolicitante/' + id,
            type: 'PUT',
            dataType: 'json',
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (result) {
                window.location.replace('/servicosPrestados');
         }
        })
    }
}

function recusarProspostaSolicitante(id)
 {
    event.preventDefault();
    if(confirm("Deseja mesmo recusar este serviço?")){
        $.ajax({
            url:'/recusarProspostaSolicitante/' + id,
            type: 'PUT',
            dataType: 'json',
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (result) {
                console.log('Entrou');
                window.location.replace('/novaspropostas');
         }
        })
    }
}