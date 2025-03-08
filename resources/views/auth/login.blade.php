@extends('layouts.app')

@section('content')
<div class="account-page">
    <div class="main-wrapper">
        <div class="account-content">
            <div class="login-wrapper">
                <div class="login-content">
                    <div class="login-userset">
                        <div class="login-logo">
                            <img src="{{ asset('assets/img/logo.png') }}" alt="img">
                        </div>
                        <div class="login-userheading">
                            <h3>Connexion</h3>
                            <h4>Veuillez vous connecter à votre compte</h4>
                        </div>
                        
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            
                            <div class="form-login">
                                <label>Email</label>
                                <div class="form-addons">
                                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Entrez votre adresse email">
                                    <img src="{{ asset('assets/img/icons/mail.svg') }}" alt="img">
                                </div>
                                @error('email')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="form-login">
                                <label>Mot de passe</label>
                                <div class="pass-group">
                                    <input id="password" type="password" class="pass-input" name="password" required autocomplete="current-password" placeholder="Entrez votre mot de passe">
                                    <span class="fas toggle-password fa-eye-slash"></span>
                                </div>
                                @error('password')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="form-login">
                                <div class="alreadyuser">
                                    @if (Route::has('password.request'))
                                        <h4><a href="{{ route('password.request') }}" class="hover-a">Mot de passe oublié?</a></h4>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-login">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">Se souvenir de moi</label>
                                </div>
                            </div>
                            
                            <div class="form-login">
                                <button type="submit" class="btn btn-login">Se connecter</button>
                            </div>
                        </form>
                        
                        <div class="signinform text-center">
                            <h4>Vous n'avez pas de compte? <a href="{{ route('register') }}" class="hover-a">S'inscrire</a></h4>
                        </div>
                        
                        <div class="form-setlogin">
                            <h4>Ou inscrivez-vous avec</h4>
                        </div>
                        <div class="form-sociallink">
                            <ul>
                                <li>
                                    <a href="javascript:void(0);">
                                        <img src="{{ asset('assets/img/icons/google.png') }}" class="me-2" alt="google">
                                        S'inscrire avec Google
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <img src="{{ asset('assets/img/icons/facebook.png') }}" class="me-2" alt="google">
                                        S'inscrire avec Facebook
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="login-img">
                    <img src="{{ asset('assets/img/login.jpg') }}" alt="img">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection