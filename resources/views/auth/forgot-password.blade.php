@extends('layouts.main')
@section('title', 'Mot de passe oublié')
@section('content')
<div class="forgotPassword-splitscreen">
    <div class="forgotPassword-left"></div>
    <div class="forgotPassword-right">
        <section class="forgotPassword-wrapper">
            <h2 role="heading" aria-level="2"  class="forgotPassword-title">
                Mot de passe oublié
            </h2>
            <p class="forgotPassword-intro">
                Après avoir envoyé votre adresse e-mail, vous allez reçevoir un e-mail avec les démarches à suivre pour changer de mot de passe.
            </p>
            <form action="{{ route('password.email') }}" method="post" class="forgotPassword-form">
                @csrf
                <div class="forgotPassword-pseudo">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" value="{{ old('pseudo') }}">
                </div>
                <div class="forgotPassword-submit">
                    <input type="submit" value="Envoyer">
                </div>
            </form>
        </section>
    </div>
</div>
@endsection
