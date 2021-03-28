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
            },
            error: function(result) {
                alert("Ocorreu um erro inesperado! Tente novamente daqui alguns segundos");
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
            },
            error: function(result) {
                alert("Ocorreu um erro inesperado! Tente novamente daqui alguns segundos");
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
            },
            error: function(result) {
                alert("Ocorreu um erro inesperado! Tente novamente daqui alguns segundos");
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
            },
            error: function(result) {
                alert("Ocorreu um erro inesperado! Tente novamente daqui alguns segundos");
            }
        })
    }
}

function getProposta(id) {

    $.ajax({
        url: "selectProposta/" + id,
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
                $('#dataInicio').val(data.propostas.DATA_INICIO);
                $('#dataFim').val(data.propostas.DATA_FIM);
                $('#valorServico').val(data.propostas.VALOR);
                $('#valorRepasse').val(data.propostas.VALOR * 0.88);
                $('#horaInicio').val(data.propostas.HORA_INICIO);
                $('#horaFim').val(data.propostas.HORA_FIM);
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

function calcularServicos() {

    //Pegando as datas e horas do form
    let dataInicio = document.getElementById('dataInicio').value;
    let horaInicio = document.getElementById('horaInicio').value;
    let dataFim = document.getElementById('dataFim').value;
    let horaFim = document.getElementById('horaFim').value;

    //Pegando a data do dia
    let hoje = new Date();
    let dd = String(hoje.getDate()).padStart(2, '0');
    let mm = String(hoje.getMonth() + 1).padStart(2, '0');
    let yyyy = hoje.getFullYear();

    hoje = yyyy + '-' + mm + '-' + dd;

    //Concatenando data e horário
    let dataInicioServico = dataInicio + ' ' + horaInicio;
    let dataFimServico = dataFim + ' ' + horaFim;

    //Valor total do serviço
    let valorTotal = 0;

    // Calculo das horas
    var ms = moment(dataInicioServico,"YYYY-MM-DD HH:mm").diff(moment(dataFimServico,"YYYY-MM-DD HH:mm"));
    var d = moment.duration(ms);
    let horasContratadas = Math.floor(d.asHours());

    //Converte a quantidade horas contratadas para positivo
    if(horasContratadas < 0) {
        horasContratadas = Math.abs(horasContratadas);
    }

    //Validações
    if(hoje > dataInicio) {
        alert('A data inicio do serviço não pode ser menor que hoje');
    } else if(dataInicio > dataFim) {
        alert('A data inicio do serviço não pode ser maior que a data de fim');
    } else if(dataInicio == dataFim && horaInicio > horaFim) {
        alert('A hora de inicio não pode ser maior que a hora de inicio do serviço');
    } else if(horasContratadas > 16) {
        alert('Desculpe! Não é possível contratar mais do que 15 horas de serviço');
    } else {
        valorTotal = horasContratadas * 15;
        document.getElementById('propostaValorSimulacao').value = valorTotal;
        document.getElementById('precoServico').value = valorTotal;
    }

}

