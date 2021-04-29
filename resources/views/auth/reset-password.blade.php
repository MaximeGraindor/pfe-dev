@extends('layouts.main')

@section('content')
<div class="resetPassword-splitscreen">
    <div class="resetPassword-left"></div>
    <div class="resetPassword-right">
        <section class="resetPassword-wrapper">
            <h2 role="heading" aria-level="2"  class="resetPassword-title">
                Changez de mot de passe
            </h2>
            <form action="{{ route('password.update') }}" method="post" class="resetPassword-form">
                @csrf
                <input type="hidden" name="token" value="{{ request()-> token}}">
                <div class="resetPassword-pseudo">
                    <label for="email">E-mail</label>
                    <input type="text" id="email" name="email">
                </div>
                <div class="resetPassword-password">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password">
                </div>
                <div class="resetPassword-password">
                    <label for="password-confirm">Confirmation de Mot de passe</label>
                    <input type="password" id="password-confirm" name="password-confirm">
                </div>

                <div class="resetPassword-submit">
                    <input type="submit" value="Changer ">
                </div>
            </form>
        </section>
    </div>
</div>
@endsection
