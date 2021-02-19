@extends('layouts.main')

@section('content')
<div class="register-splitscreen">
    <div class="register-left"></div>
    <div class="register-right">
        <section class="register-wrapper">
            <h2 role="heading" aria-level="2"  class="register-title">
                Inscrivez-vous
            </h2>
            <p class="register-intro">
                déjà inscrit ? <a href="/login">Se connecter</a>
            </p>
            <form action="/register" method="post" class="register-form">
                @csrf
                <div class="register-pseudo">
                    <label for="pseudo">Pseudo</label>
                    <input type="text" id="pseudo" name="pseudo">
                </div>
                <div class="register-email">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email">
                </div>
                <div class="register-password">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password">
                </div>
                <div class="register-passwordConfirm">
                    <label for="password-confirm">Confirmation du mot de passe</label>
                    <input type="password" id="password-confirm" name="password_confirmation">
                </div>

                <div class="register-submit">
                    <input type="submit" value="Se connecter">
                </div>
            </form>
        </section>
    </div>
</div>
@endsection
