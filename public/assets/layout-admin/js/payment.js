doSubmit = false;
document.getElementById('pay').addEventListener('submit', getCardTokenPayment);

function getCardTokenPayment(event){
    event.preventDefault();
    if(!doSubmit){
        let $form = document.getElementById('pay');
        window.Mercadopago.createToken($form, setCardTokenAndPayment);
        return false;
    }
 };
 
 function setCardTokenAndPayment(status, response) {
    if (status == 200 || status == 201) {
        let form = document.getElementById('pay');
        let card = document.createElement('input');
        card.setAttribute('name', 'token');
        card.setAttribute('type', 'hidden');
        card.setAttribute('value', response.id);
        form.appendChild(card);
        doSubmit=true;
        form.submit();
    } else {
        alert("Verify filled data!\n"+JSON.stringify(response, null, 4));
    }
 };