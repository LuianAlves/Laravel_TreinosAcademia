@extends('app.main_template')

<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                <div class="card mb-3">

                    <div class="card-body">

                        <div class="pt-4 pb-2">
                            <h5 class="card-title text-center mb-2 fs-4">Acesse sua Conta</h5>
                        </div>

                        <form class="row g-3" action="{{ route('login') }}" method="post" style="font-family: 'Poppins', sans-serif;">
                            @csrf

                            <div class="col-12">
                                @error('email')
                                    <div class="alert alert-danger p-2">
                                        <strong>E-mail Inválido!</strong>
                                    </div>
                                @enderror
                                @error('password')
                                    <div class="alert alert-danger p-2">
                                        <strong>Senha Inválida!</strong>
                                    </div>
                                @enderror
                            </div>

                            <div class="col-12 mt-3">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bx-user"></i></span>
                                    <input type="email" name="email" class="form-control" value="{{old('email')}}" placeholder="E-mail">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bx-lock-alt"></i></span>
                                    <input type="password" name="password" class="form-control" placeholder="Senha">
                                </div>
                            </div>

                            <div class="col-12 mt-5">
                                <button class="btn btn-primary w-100" type="submit">Login</button>
                            </div>
                            <div class="col-12 text-center mt-5" style="font-weight: 600;">
                                <a href="{{ route('password.request') }}">Esqueceu sua Senha?</a>
                            </div>
                            <div class="col-12 text-center" style="font-weight: 600;">
                                <a href="{{ route('register') }}">Registre-se</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
