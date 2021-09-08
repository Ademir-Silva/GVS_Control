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
        <form action="{{ route('auth.check') }}" method="post" class="form-box">
            @csrf
            <div class="form-title">
                <h1>Logar</h1>
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
                <b>Não tem conta?</b> <a href="{{ route('auth.register') }}">Registre-se</a>
            </div>

            <div class="form-btn">
                <button class="btn" id="submit" name="submit" type="submit">Entrar</button>
            </div>
        
        </form>
    </div>
@endsection    