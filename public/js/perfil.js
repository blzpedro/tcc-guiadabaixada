function alterarPerfil(){
    let senha = $("#perfil input[name='senha']").val();
    let confirma_senha = $("#perfil input[name='c-senha']").val();
    if(senha != confirma_senha) return false;
    let token = $("#perfil input[name='token']").val();
    let data = {
        _token: token,
        name: $("#perfil input[name='nome']").val(),
        email: $("#perfil input[name='email']").val(),
        password: senha
    }
     $.ajax({
        type: 'PUT',
        url: '/perfil',
        contentType: 'application/json',
        data: JSON.stringify(data), // access in body
    }).done(function () {

    }).fail(function (msg) {
        console.log('FAIL', msg);
    }).always(function (msg) {
        if(typeof msg.success != "undefined"){
            // Mensagem de sucesso
            console.log(msg.success);
        }
        if(typeof msg.error != "undefined"){
            //Mensagem de error
            console.error(msg.error);
        }
    });
    
}