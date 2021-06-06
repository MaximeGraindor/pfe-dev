@extends('layouts.main')
@section('title', 'S\'inscrire')
@section('content')
<div class="register-splitscreen">
    <h1 class="hidden" role="heading" aria-level="1">Gameon</h1>
    <div class="register-left"></div>
    <div class="register-right">
        <section class="register-wrapper">
            <h2 role="heading" aria-level="2"  class="register-title">
                Inscrivez-vous
            </h2>
            <p class="register-intro">
                déjà inscrit ? <a href="/login" title="Se connecter">Se connecter</a>
            </p>
            <form action="/register" method="post" class="register-form">
                @csrf

                <div class="register-pseudo">
                    <label for="pseudo">Pseudo</label>
                    <input  type="text"
                            id="pseudo"
                            name="pseudo"
                            value="{{ old('pseudo') }}"
                            class="@if($errors->has('pseudo'))login-input-error @endif" >
                    @error('pseudo')
                        <span class="login-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="register-email">
                    <label for="email">Email</label>
                    <input  type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="@if($errors->has('email'))login-input-error @endif" >
                    @error('email')
                        <span class="login-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="register-password">
                    <label for="password">Mot de passe</label>
                    <input  type="password"
                            id="password"
                            name="password"
                            class="@if($errors->has('password'))login-input-error @endif" >
                    @error('password')
                        <span class="login-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="register-passwordConfirm">
                    <label for="password-confirm">Confirmation du mot de passe</label>
                    <input  type="password"
                            id="password-confirm"
                            name="password_confirmation"
                            class="@if($errors->has('password-confirm'))login-input-error @endif" >
                    @error('password-confirm')
                        <span class="login-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="register-submit">
                    <input type="hidden" name="picture" value="user-picture-default.jpg">
                    <input type="submit" name="submit" value="Se connecter">
                </div>
            </form>
        </section>
    </div>
</div>
@endsection
