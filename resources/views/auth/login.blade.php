@extends('layouts.main')
@section('title', 'Se connecter')
@section('content')
<div class="login-splitscreen">
    <h1 class="hidden"  role="heading" aria-level="1">Gameon</h1>
    <div class="login-left"></div>
    <div class="login-right">
        <section class="login-wrapper">
            <h2 role="heading" aria-level="2"  class="login-title">
                Connectez-vous
            </h2>
            <p class="login-intro">
                Pas encore inscrit ? <a href="/register" title="S'inscrire">S'inscrire</a>
            </p>
            <form action="/login" method="post" class="login-form">
                @csrf
                <div class="login-pseudo">
                    <label for="pseudo">Pseudo</label>
                    <input type="text" id="pseudo" name="pseudo" value="{{ old('pseudo') }}" class="@if($errors->has('pseudo'))login-input-error @endif">
                    @error('pseudo')
                        <span class="login-error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="login-password">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" class="@if($errors->has('password'))login-input-error @endif">
                    @error('password')
                        <span class="login-error">{{ $message }}</span>
                    @enderror
                    <div class="login-others">
                        <div class="login-others-wrap">
                            <input class="rememberMe" type="checkbox" name="remember" id="rememberMe" {{ old('remember') ? 'checked' : '' }}>
                            <label class="login-rememberMe" for="rememberMe">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                        @if (Route::has('password.request'))
                            <a class="login-forgotPassword" href="{{ route('password.request') }}">
                                Mot de passe oublié&nbsp;?
                            </a>
                        @endif
                    </div>
                </div>

                <div class="login-submit">
                    <input type="submit" value="Se connecter">
                </div>
            </form>
        </section>
    </div>
</div>
<script src="{{ asset('/js/app.js') }}"></script>
@endsection
