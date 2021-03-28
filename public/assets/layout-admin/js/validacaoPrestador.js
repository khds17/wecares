function aprovarPrestador(id)
 {
    event.preventDefault();
    if(confirm("Deseja mesmo aprovar?")){
        $.ajax({
            url:'/aprovarPrestador/' + id,
            type: 'PUT',
            dataType: 'json',
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (result) {
                window.location.replace('/prestadoresLista');
            },
            error: function(result) {
                alert("Ocorreu um erro inesperado! Tente novamente daqui alguns segundos");
            }
        })
    }
}

function reprovarPrestador(id)
 {
     event.preventDefault();
    if(confirm("Deseja mesmo reprovar?")){
        $.ajax({
            url:'/reprovarPrestador/' + id,
            type: 'PUT',
            dataType: 'json',
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (result) {
                window.location.replace('/prestadoresLista');
            },
            error: function(result) {
                alert("Ocorreu um erro inesperado! Tente novamente daqui alguns segundos");
            }
         })
    }
}