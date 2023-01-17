<!-- ответы - 0: все отлично, 1: не совпадают пароли, 2: емейл занят, 3: заполнить поля -->
function reg(){
    let name = document.querySelector('#first_name').value +' ' + document.querySelector('#last_name').value
    let email = document.querySelector('#email').value
    let pass1 = document.querySelector('#pass1').value
    let pass2 = document.querySelector('#pass2').value
    $.ajax({
        url: 'reg.php',
        method: 'post',
        data: {email: email, pass1: pass1, pass2: pass2},
        dataType: 'html',
        success: function(ans){
            if(ans == 1) {document.querySelector(".fail").style.visibility='visible';
                document.querySelector("#error_message").textContent='Не совпадают пароли'}
            if(ans == 2) {document.querySelector(".fail").style.visibility='visible';
                document.querySelector("#error_message").textContent='E-mail уже зарегистрирован'}
            if(ans == 3) {document.querySelector(".fail").style.visibility='visible';
                document.querySelector("#error_message").textContent='Не все поля заполнены'}
            if(ans == 0) document.querySelector(".accept").style.visibility='visible';
        }
    });
}
function fail_hide(){
    document.querySelector(".fail").style.visibility='hidden'
}
