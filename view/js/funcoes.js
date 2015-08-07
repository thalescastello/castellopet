$(document).ready(function(){
    login();
    cadastrar_usuario();
});

function login(){
    $('#acessar').on('click', function(){ /* Botão */
        $('#acessos').submit(function(){ /* Formulário */
            formulario = $('#acessos').serialize(); /* Transforma os campos do formulario em variaveis e seta os valores */
            $.ajax({
                method: "POST",
                url: "index.php?site=ajax",
                data: formulario,
                dataType: 'json', /* Tipo de dados do retorno da requisição */
                success: function(resposta){
                    if(resposta.status){
                        document.location=resposta.mensagem;
                    } else {
                        $('#resposta_login').html(resposta.mensagem);
                        alert(resposta.mensagem);
                    }
                }
            });
            return false;
        });
    });
}

function cadastrar_usuario(){
    $('#salvar').on('click', function(){ /* Botão */
        $('#cadastrar').submit(function(){ /* Formulário */
            formulario = $('#cadastrar').serialize(); /* Transforma os campos do formulario em variaveis e seta os valores */
            $.ajax({
                method: "POST",
                url: "index.php?site=ajax",
                data: formulario,
                dataType: 'json', /* Tipo de dados do retorno da requisição */
                success: function(resposta){
                    if(resposta.status){
                        alert(resposta.mensagem);
                    } else {
                        alert(resposta.mensagem);
                    }
                }
            });
            return false;
        });
    });
}