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
            $(".msg-perfil").html("<article class='sucess' style='display:block;'>"+msg.success+"</article>")
            $(".msg-perfil").css({"opacity": "1","background-color": "green"});
            setTimeout(function(){
                $(".msg-perfil").css({"opacity": "0", "transition": ".7s all","background-color": "green"});
            },2000); 
            console.log(msg.success);
        }
        if(typeof msg.error != "undefined"){
            $(".msg-perfil" ).html("<article class='erro' style='display:block;'>"+msg.error+"</article>" );
            $(".msg-perfil").css({"opacity": "1","background-color": "#B90003"});
            setTimeout(function(){
                $(".msg-perfil").css({"opacity": "0", "transition": ".7s all","background-color": "#B90003"});
            },2000); 
            console.log(msg.error);
        }
    });
    
}