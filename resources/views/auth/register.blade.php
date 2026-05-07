@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 80vh; padding: 2rem;">
  <div class="card border" style="width: 100%; max-width: 400px; border-radius: 16px; padding: 2.5rem 2rem;">

    <div class="text-center mb-4">
      <div class="d-inline-flex align-items-center justify-content-center bg-light border rounded-3 mb-3" style="width:44px; height:44px;">
        <i class="bi bi-person text-secondary"></i>
      </div>
      <h5 class="fw-medium mb-1">Crear cuenta</h5>
      <p class="text-muted small mb-0">Completa los datos para registrarte</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
      @csrf

      <div class="mb-3">
        <label for="name" class="form-label small fw-medium text-secondary">{{ __('Name') }}</label>
        <input id="name" type="text"
          class="form-control form-control-sm @error('name') is-invalid @enderror"
          name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        @error('name')
          <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
      </div>

      <div class="mb-3">
        <label for="email" class="form-label small fw-medium text-secondary">{{ __('Email Address') }}</label>
        <input id="email" type="email"
          class="form-control form-control-sm @error('email') is-invalid @enderror"
          name="email" value="{{ old('email') }}" required autocomplete="email">
        @error('email')
          <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
      </div>

      <div class="mb-3">
        <label for="password" class="form-label small fw-medium text-secondary">{{ __('Password') }}</label>
        <input id="password" type="password"
          class="form-control form-control-sm @error('password') is-invalid @enderror"
          name="password" required autocomplete="new-password">
        @error('password')
          <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
      </div>

      <div class="mb-4">
        <label for="password-confirm" class="form-label small fw-medium text-secondary">{{ __('Confirm Password') }}</label>
        <input id="password-confirm" type="password"
          class="form-control form-control-sm"
          name="password_confirmation" required autocomplete="new-password">
      </div>

      <button type="submit" class="btn btn-dark w-100">{{ __('Register') }}</button>

      <p class="text-center text-muted small mt-3 mb-0">
        ¿Ya tienes cuenta?
        <a href="{{ route('login') }}" class="text-decoration-none text-dark fw-medium">Inicia sesión</a>
      </p>

    </form>
  </div>
</div>
@endsection
