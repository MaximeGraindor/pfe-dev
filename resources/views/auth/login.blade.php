@extends('layouts.main')

@section('content')
<div class="login-splitscreen">
    <div class="login-left"></div>
    <div class="login-right">
        <section class="login-wrapper">
            <h2 role="heading" aria-level="2"  class="login-title">
                Connectez-vous
            </h2>
            <p class="login-intro">
                Pas encore inscrit ? <a href="/register">S'inscrire</a>
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
                    @if (Route::has('password.request'))
                        <a class="login-forgotPassword" href="{{ route('password.request') }}">
                            Mot de passe oublié&nbsp;?
                        </a>
                    @endif
                </div>

                <div class="login-submit">
                    <input type="submit" value="Se connecter">
                </div>
            </form>
        </section>
    </div>
</div>
@endsection
