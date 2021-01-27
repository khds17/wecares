function aprovar(id)
 {
    event.preventDefault();
    if(confirm("Deseja mesmo aprovar?")){
        $.ajax({
            url:'/aprovar/' + id,
            type: 'PUT',
            dataType: 'json',
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (result) {
                window.location.replace('/prestadoresLista');
         }
        })
    }else{
        // 
    }
}

function reprovar(id)
 {
     event.preventDefault();
    if(confirm("Deseja mesmo reprovar?")){
        $.ajax({
            url:'/reprovar/' + id,
            type: 'PUT',
            dataType: 'json',
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (result) {
                window.location.replace('/prestadoreslista');
         }
                
         })
    }else{
        // 
    }
}