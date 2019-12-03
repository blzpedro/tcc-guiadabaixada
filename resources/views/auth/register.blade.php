@extends('layouts.master')

@section('content')
<header>
        <nav style="display: block !important;">
            <ul class="grid-x">
                <a class="font-bold float-center large-6 small-6 medium-6" href="{{url('/')}}"><li>Ínicio</li></a>
                <a class="font-bold float-center large-6 small-6 medium-6" href="{{ url('login') }}"><li>Login</li></a>
            </ul>
        </nav>
    </header>
    <main class="grid-x" id="topo">
        <div class="sessao-um large-12 small-12 medium-12">
                <div class="sessao-um-opacity">          
                      
                    <h1 class="logo">GUIA DA BAIXADA | Cadastro</h1>
                    <a class="down" href="#0">
                        <img src="{{asset('images/down-arrow.png')}}" alt="Descer" class="logo descer">
                    </a>
                </div>
        </div>

        <div class="fundo-preto large-12 small-12 medium-12 grid-x">
            <div class="paragrafo-box large-8 medium-12 small-12 grid-container">
                <h1 class="font-bold text-center" id="2">CADASTRO</h1>   
                <div class="grid-x">
                    <div class="grid-x large-6 medium-12 small-10 box-login">     
                     <form method="POST" action="{{ route('register') }}" class="large-12 medium-12 small-12">
                        @csrf

                        <div class="grid-x">
                            <label for="name" class="large-12 medium-12 small-12">{{ __('Nome') }}</label>

                            <div class="large-12 medium-12 small-12">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="grid-x">
                            <label for="email" class="large-12 medium-12 small-12">{{ __('E-mail') }}</label>

                            <div class="large-12 medium-12 small-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="grid-x">
                            <label for="password" class="large-12 medium-12 small-12">{{ __('Senha') }}</label>

                            <div class="large-12 medium-12 small-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="grid-x">
                            <label for="password-confirm" class="large-12 medium-12 small-12">{{ __('Confirme sua senha') }}</label>

                            <div class="large-12 medium-12 small-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="">
                            <div class="large-12 small-12 medium-12 grid-x">
                                <div class=" box-botao-comecar float-center">
                                <button class="botao-comecar hvr-linha-esquerda">
                                    {{ __('ENTRAR »') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    </div>
                    </div>
                </div> 
            </div>
        </div>    
        <div class="botao-subir large-1">
                <a class="down" href="#topo">
                    <img src="{{asset('images/down-arrow.png')}}" alt="Descer" class="logo subir">
                </a>
        </div>
    </main>   
@endsection


