@extends('layouts.main')
@section('title', 'Se connecter')
@section('content')
<div class="login-splitscreen">
    <h1 class="hidden"  role="heading" aria-level="1">Gameon</h1>
    <div class="login-left"></div>
    <div class="login-right">
        <section class="login-wrapper">
            <h2 role="heading" aria-level="2"  class="login-title">
                Vérification d'email
            </h2>
            <p class="login-intro">
                Vous avez vérifié votre compte&nbsp;? <a href="/login" title="S'inscrire">Se connecter</a>
            </p>
            <p class="login-verify">
                Vous devez être vérifié pour vous connecter
            </p>
            <form action="{{ route('verification.send') }}" method="post" class="login-verify-form">
                @csrf
                <div class="login-verify-submit">
                    <input type="submit" value="Renvoyer le mail">
                </div>
            </form>
        </section>
    </div>
</div>
@endsection
