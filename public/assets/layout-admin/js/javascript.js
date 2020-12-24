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
                window.location.replace('/prestadoreslista');
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
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json'      
         }).then( response =>{
            // 
         })
    }else{
        // 
    }
}

function aceitar(id)
 {
    event.preventDefault();
    if(confirm("Deseja mesmo aceitar este serviço?")){
        $.ajax({
            url:'/aceitar/' + id,
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

function recusar(id)
 {
    event.preventDefault();
    if(confirm("Deseja mesmo recusar este serviço?")){
        $.ajax({
            url:'/recusar/' + id,
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
