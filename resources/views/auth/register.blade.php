@extends('template.layout')

@section('title', 'GVS Control - Cadastro')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')

    <header>
        <nav class="navbar">
            <img src="{{ asset('images/logo-2.png') }}" alt="logo GVS">
        </nav>
    </header>

    <div class="container">

        @if (Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
    
        @if (Session::get('fail'))
            <div class="alert alert-danger">
                {{ Session::get('fail') }}
            </div>
        @endif

        <form action="{{ route('auth.save') }}" method="post" class="form-box register">
            @csrf
            
            <div class="form-title">
                <h1>Registre-se</h1>
            </div>
    
            <div class="form-input">
                <label class="form-label">Nome</label>
                <input class="form-control @error('name') is-invalid @enderror" name="name" type="name" value="{{ old('name') }}">
                @error('name')<span class="invalid-feedback">{{ $message }}</span>@enderror
            </div>

            <div class="form-input">
                <select class="form-select @error('sector') is-invalid @enderror" value="{{ old('sector') }}">             
                    <option selected>Selecione o setor</option>
                    <option value="1">Comercial</option>
                    <option value="2">Financeiro</option>
                    <option value="3">Contabilidade</option>
                    <option value="4">TI</option>
                </select>
                @error('sector')<span class="invalid-feedback">{{ $message }}</span>@enderror
            </div>



            <div class="form-input">
                <label class="form-label">Email</label>
                <input class="form-control @error('email') is-invalid @enderror" name="email" type="email" value="{{ old('email') }}">
                @error('email')<span class="invalid-feedback">{{ $message }}</span>@enderror
            </div>

            <div class="form-input">
                <label class="form-label">Senha</label>
                <input class="form-control @error('password') is-invalid @enderror" name="password" type="password" value="{{ old('password') }}">
                @error('password')<span class="invalid-feedback">{{ $message }}</span>@enderror
            </div>

            <div class="register">
                <b>Já tem conta?</b> <a href="{{ route('auth.login') }}">Logar</a>
            </div>

            <div class="form-btn">
                <button class="btn" id="submit" name="submit" type="submit">Registrar</button>
            </div>
        
        </form>
    </div>
@endsection    