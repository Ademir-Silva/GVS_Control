@extends('template.layout')

@section('title', 'GVS Control - Login')

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

        <form action="" method="post" class="form-box">
            @csrf
            
            <div class="form-title">
                <h1>Entrar</h1>
            </div>
    
            <div class="form-input">
                <label class="form-label">Email</label>
                <input class="form-control @error('email') is-invalid @enderror" name="email" type="email" minlength="10" maxlength="100" required value="{{ old('name') }}">
                @error('email')<span class="invalid-feedback">{{ $message }}</span>@enderror
            </div>

            <div class="form-input">
                <label class="form-label">Senha</label>
                <input class="form-control @error('password') is-invalid @enderror" name="password" type="password" minlength="5" maxlength="32" required value="{{ old('password') }}">
                @error('password')<span class="invalid-feedback">{{ $message }}</span>@enderror
            </div>

            <div class="register">
                <b>Não tem conta?</b> <a href="#">Cadastre-se</a>
            </div>

            <div class="form-btn">
                <button class="btn" id="submit" name="submit" type="submit">Entrar</button>
            </div>
        
        </form>
    </div>
@endsection    