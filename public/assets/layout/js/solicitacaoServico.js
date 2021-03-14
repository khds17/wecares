if (document.getElementById('cidade') !== null) {
    $(document).ready(function() {
        $( "#cidade" ).autocomplete({
             source: function(request, response) {
                $.ajax({
                url: '/cuidadorCidades',
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
}

function getPaciente(id) {

    $.ajax({
        url: "selectPacientes/" + id,
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
                window.location.replace('/novaspropostas');
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
                window.location.replace('/propostas');
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
                window.location.replace('/propostas');
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
            if (data != null) {
                //Atualiza os dados do formulário de solicitação conforme o paciente selecionado
                $('#solicitanteNome').val(data.propostas.NOME_SOLICITANTE);
                $('#pacienteNome').val(data.propostas.NOME_PACIENTE);
                $('#prestadorNome').val(data.propostas.NOME_PRESTADOR);
                $("#familiaridade option[value="+data.propostas.ID_FAMILIARIDADE+"]").attr("selected", "selected");
                $('#familiaridadeOutros').val(data.propostas.FAMILIAR_OUTROS);
                $('#pacienteTipo').val(data.propostas.TIPO);
                $('#pacienteLocalizacao').val(data.propostas.LOCALIZACAO);
                $('#pacienteCep').val(data.propostas.CEP);
                $('#pacienteEndereco').val(data.propostas.ENDERECO);
                $('#pacienteBairro').val(data.propostas.BAIRRO);
                $('#pacienteNumero').val(data.propostas.NUMERO);
                $('#pacienteCidade').val(data.propostas.CIDADE);
                $('#pacienteEstado').val(data.propostas.UF);
                $('#pacienteComplemento').val(data.propostas.COMPLEMENTO);
                $('#servicoDataPrestacao').val(data.propostas.DATA_SERVICO);
                $('#servicoValor').val(data.propostas.VALOR);
                $('#servicoInicio').val(data.propostas.HORA_INICIO);
                $('#servicoFim').val(data.propostas.HORA_FIM);
                $("input[name=tomaMedicamento][value="+data.propostas.TOMA_MEDICAMENTOS+"]").attr("checked", true);
                $('#tipoMedicamento').val(data.propostas.TIPO_MEDICAMENTOS);
                $('#servicoOutros').val(data.propostas.SERVICOS_OUTROS);
                $('#formacao').val(data.prestador[0].FORMACAO);
                $('#prestadorTelefone').val(data.prestador[0].TELEFONE);

                let servicos = data.propostas.SERVICOS.split([',']);

                servicos.forEach(function(elemento){
                    console.log(elemento);
                    $("input[name=servicos][value="+elemento+"]").attr("checked", true);
                });
            }
        }
    });
}