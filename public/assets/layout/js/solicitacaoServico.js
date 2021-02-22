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
                $("#familiaridade").find('option').attr("selected",false);
                $("#tomaMedicamento").find('input[type="radio"]').attr("checked",false);

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
                $("input[name=tomaMedicamento][value="+data.paciente.TOMA_MEDICAMENTOS+"]").attr("checked", true);
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

function getProposta(id) {
    
    $.ajax({
        url: "selectproposta/" + id,
        type: "post",
        dataType: 'json',
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            console.log(data);
            if (data != null) {

                //Atualiza os dados do formulário de solicitação conforme o paciente selecionado
                $('#solicitanteNome').val(data.NOME_SOLICITANTE);
                $('#pacienteNome').val(data.NOME_PACIENTE);
                $("#familiaridade option[value="+data.ID_FAMILIARIDADE+"]").attr("selected", "selected");
                $('#familiaridadeOutros').val(data.FAMILIAR_OUTROS);
                $('#pacienteTipo').val(data.TIPO);
                $('#pacienteLocalizacao').val(data.LOCALIZACAO);
                $('#pacienteCep').val(data.CEP);
                $('#pacienteEndereco').val(data.ENDERECO);
                $('#pacienteBairro').val(data.BAIRRO);
                $('#pacienteNumero').val(data.NUMERO);
                $('#pacienteCidade').val(data.CIDADE);
                $('#pacienteEstado').val(data.UF);
                $('#pacienteComplemento').val(data.COMPLEMENTO);
                $('#servicoDataPrestacao').val(data.DATA_SERVICO);
                $('#servicoValor').val(data.VALOR);
                $('#servicoInicio').val(data.HORA_INICIO);
                $('#servicoFim').val(data.HORA_FIM);
                $("input[name=tomaMedicamento][value="+data.TOMA_MEDICAMENTOS+"]").attr("checked", true);
                $('#tipoMedicamento').val(data.TIPO_MEDICAMENTOS);

                let servicos = data.SERVICOS.split([',']);

                servicos.forEach(function(elemento){
                    console.log(elemento);
                    $("input[name=servicos][value="+elemento+"]").attr("checked", true);
                });
                
            } 
        }
    });
}