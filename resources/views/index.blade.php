@extends('layouts.master')

@section('content')
    <article class="erro" id="erro-nome">Digite o seu nome</article>
    <article class="erro" id="erro-email">Digite o seu email</article>
    <article class="erro" id="erro-telefone">Digite o seu telefone</article>
    <article class="erro" id="erro-assunto">Digite o assunto</article>
    <article class="erro" id="erro-mensagem">Digite a mensagem</article>
    <article class="success" id="success">Mensagem enviada com sucesso!</article>
    <header>
        <nav>
            <ul class="grid-x">
                @guest
                    @if (Route::has('register'))                   
                        <a class="font-bold scroll large-2 float-center" href="#1" id="home"><li>Comece agora</li></a>
                    <a class="font-bold scroll large-2 float-center" href="#2" id="funciona"><li>Como funciona</li></a>
                    @endif
                    @else
                        <a class="font-bold large-2 float-center" href="{{url('/places')}}" id="home"><li>Navegar</li></a>
                        <a class="font-bold large-2 float-center" href="{{url('/perfil')}}" id="funciona"><li>{{ Auth::user()->name }} - Ver perfil</li></a>
                @endguest
                <a class="font-bold scroll large-2 float-center" href="#3" id="funciona"><li>Quem somos</li></a>
                <a class="font-bold scroll large-2 float-center" href="#4" id="funciona"><li>Contato</li></a>
            </ul>
        </nav>
    </header>
    <main class="grid-x" id="topo">
        <div class="sessao-um large-12 small-12 medium-12">
                <div class="sessao-um-opacity">            
                    <h1 class="logo">GUIA DA BAIXADA</h1>
                    <a class="down" href="#0">
                        <img src="{{asset('images/down-arrow.png')}}" alt="Descer" class="logo descer">
                    </a>
                </div>
        </div>        
        <div class="fundo-preto large-12 grid-x">
            <div class="paragrafo-box large-8 grid-container" id="0">
                <h1 class="font-bold titulo" id="1">COMECE AGORA</h1>     
                <p class="texto">
                    Não perca tempo e comece agora criando sua conta ou logando-se na aplicação. <br><br>
                    Não sabe o que fazer pela cidade? <br> Nossa aplicação vai te ajudar com facilidade, obtenha todas as informações dos locais que estão perto de você, tenha tudo que é necessário em apenas uma tela.
                    <br><br><br>
                    @guest
                        @if (Route::has('register'))  
                        <div class="grid-x" style="text-align: center">
                            <div class="large-6 small-6 medium-6">
                                <a href="{{ url('login') }}" class="botao-comecar hvr-linha-esquerda">LOGIN »</a>
                            </div>
                            <div class="large-6 small-6 medium-6">
                                <a href="{{ url('register') }}" class="botao-comecar hvr-linha-esquerda">CADASTRO »</a>
                            </div>
                        </div>                              
                        @endif
                        @else
                        <a href="{{ url('places') }}" class="botao-comecar hvr-linha-esquerda">VER OS LOCAIS »</a>
                    @endguest
                </p>       
            </div>
        </div>

        <div class="sessao-dois large-12 small-12 medium-12">
                <div class="sessao-um-opacity"></div>
        </div>

        <div class="fundo-preto large-12 grid-x">
            <div class="paragrafo-box large-8 grid-container">
                <h1 class="font-bold titulo" id="2">COMO FUNCIONA</h1>     
                <p class="texto">
                    Para que os usuários consigam usufruir da nossa aplicação é necessário que primeiro se cadastrem em nosso site, após o cadastro você estará apto a procurar novos locais ao seu redor! <br><br>
                    Com sua conta criada no Guia da Baixada, o usuário poderá buscar pelo nome do local, palavra-chave ou categoria. De acordo com a pesquisa feita pelo usuário, o buscador irá fornecer as informações de forma objetiva, simples e clara. <br> <br>
                </p>       
            </div>
        </div>

        <div class="sessao-tres large-12 small-12 medium-12">
                <div class="sessao-um-opacity"></div>
        </div>
            
        <div class="fundo-preto large-12 small-12 medium-12 grid-x">
            <div class="paragrafo-box large-8 grid-container">
                <h1 class="font-bold titulo" id="3">QUEM SOMOS</h1>     
                <p class="texto">
                O Guia da Baixada foi criado por Gabriel Costa e Pedro Henrique em 2019, como um Trabalho de Conclusão de Curso pela FATEC - Rubens Lara. <br><br> 
                O objetivo era montar uma aplicação que auxiliasse os usuários que frequentam novos lugares a encontrarem novos locais pela região. E com esse auxílio trazemos todas as informações necessárias para que o usuário saiba mais sobre o que está ao seu redor. <br>
                Locais com informações sobre seu endereço, horário de funcionamento, site do local e telefones.
                </p>       
            </div>
        </div>
        <div class="fundo-preto large-12 small-12 medium-12 grid-x">
            <div class="paragrafo-box hr large-8 small-11 medium-8 grid-container"></div>
        </div>
        <div class="sessao-quatro large-12 small-12 medium-12 grid-x grid-container">
                    <div class="large-3 small-12 medium-3 box-texto-comecar texto">
                        <h2 class="color-white font-bold">Navegue pela plataforma agora</h2>
                    </div>
                    <div class="large-3 small-12 medium-3 box-botao-comecar texto">
                        <p>                            
                        @guest
                            @if (Route::has('register'))                                
                        <div class="grid-x" style="text-align: center">
                            <div class="large-6 small-6 medium-6">
                                <a href="{{ url('login') }}" class="botao-comecar hvr-linha-esquerda">LOGIN »</a>
                            </div>
                            <div class="large-6 small-6 medium-6">
                                <a href="{{ url('register') }}" class="botao-comecar hvr-linha-esquerda">CADASTRO »</a>
                            </div>
                        </div>  
                            @endif
                            @else
                            <a href="{{ url('places') }}" class="botao-comecar hvr-linha-esquerda">VER OS LOCAIS »</a>
                        @endguest
                        </p>
                    </div>
        </div>  
        <div class="fundo-preto large-12 small-12 medium-12 grid-x">
            <div class="paragrafo-box hr large-8 small-11 medium-8 grid-container"></div>
        </div>
        <div class="sessao-cinco large-12 small-12 medium-12 grid-x">
                <div class="large-4 medium-6 small-12 float-center">
                    <h1 class="font-bold color-white text-center titulo" id="4">CONTATO</h1>
                    <form method="post" action="https://formspree.io/phenriqmelo99@gmail.com" id="r-form" name="form">
                        <input type="text" name="nome" id="nome" placeholder="Nome:" autocomplete="off">
                        <input type="email" name="email" id="email" placeholder="E-mail:" autocomplete="off">
                        <input type="text" name="tel" id="tel" placeholder="Telefone:" autocomplete="off">
                        <input type="text" name="assunto" id="assunto" placeholder="Assunto:" autocomplete="off">
                        <textarea type="text" name="message" placeholder="Mensagem:" id="r-mensagem" cols="3" rows="5" autocomplete="off"></textarea>
                        <input id="r-btn-enviar" type="submit" value="ENVIAR MENSAGEM" class="hvr-linha-esquerda botao color-white font-bold">
                    </form>
                </div>
        </div>
        <!-- <form action="https://formspree.io/phenriqmelo99@gmail.com" method="POST">
            <input type="text" name="name">
            <input type="email" name="_replyto">
            <input type="submit" value="Send">
          </form>    -->
        <div class="botao-subir large-1">
                <a class="down" href="#topo">
                    <img src="{{asset('images/down-arrow.png')}}" alt="Descer" class="logo subir">
                </a>
        </div>
    </main>    
@endsection
