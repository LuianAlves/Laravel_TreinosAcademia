@extends('app.main_template')

<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                <div class="card mb-3">

                    <div class="card-body">

                        <div class="pt-4 pb-2">
                            <h5 class="card-title text-center mb-2 fs-4">Registre uma Conta</h5>
                        </div>

                        <form class="row g-3" action="{{ route('register') }}" method="post" style="font-family: 'Poppins', sans-serif;">
                            @csrf

                            <div class="col-12 mt-3">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bxs-user"></i></span>
                                    <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Seu Nome" required>
                                </div>
                            </div>

                            <div class="col-12 mt-3">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bx-voicemail"></i></span>
                                    <input type="email" name="email" class="form-control" value="{{old('email')}}" placeholder="E-mail" required>
                                </div>
                            </div>

                            <div class="col-12 mt-3">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bxs-phone"></i></span>
                                    <input type="number" name="phone" class="form-control" value="{{old('telefone')}}" placeholder="Telefone">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bxs-lock-alt"></i></span>
                                    <input type="password" name="password" class="form-control" placeholder="Senha" autocomplete="new-password" required>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bxs-lock-open"></i></span>
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmar Senha" autocomplete="new-password" required>
                                </div>
                            </div>

                            <div class="col-12 mt-3">
                                <button class="btn btn-primary w-100" type="submit">Registrar</button>
                            </div>
                            <div class="col-12 text-center mt-3">
                                Ja tem uma Conta? <a href="{{ route('login') }}">Acesse agora!</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

