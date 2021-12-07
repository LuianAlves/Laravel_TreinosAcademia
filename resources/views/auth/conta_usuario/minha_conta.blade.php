<!DOCTYPE html>

@extends('app.main_template')

@section('content')

    {{-- Breadcrumb --}}
    @include('app.body.breadcrumb')

    <section class="section">
        <div class="row justify-content-center">
            <div class="col-8 text-center">

                {{-- Profile --}}
                <div class="card m-3">
                    <div class="card-body">
                        <div class="pb-2">
                            <h5 class="card-title mb-2 fs-4">Atualizar Informações da Conta</h5>
                        </div>
                        <form action="{{ route('user.profile.update', $user->id) }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="image-upload row justify-content-center">
                                <label for="profile_photo">
                                    <img src="{{ (!empty($user->profile_photo_path)) ? asset('upload/imagem_usuario/'.$user->profile_photo_path) : url('backend/assets/img/no_image.jpg') }}" class="rounded-circle" style="width: 50%; height: 70%;">                            
                                </label>
                                
                                <input type="file" id="profile_photo" name="profile_photo_path">
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bx bxs-user fs-4"></i></span>
                                        <input type="text" name="name" class="form-control w-50" value="{{ $user->name }}"
                                            placeholder="Seu Nome" required>
                                        @error('name')
                                            <span class="text-danger"><b>{{ $message }}</b></span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-6">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bx bx-voicemail fs-4"></i></span>
                                        <input type="email" name="email" class="form-control" value="{{ $user->email }}"
                                            placeholder="E-mail" required>
                                        @error('email')
                                            <span class="text-danger"><b>{{ $message }}</b></span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="row justify-content-end mt-5">
                                <button class="btn btn-sm btn-success w-25" type="submit">Atualizar</button>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Password --}}
                <div class="card m-3">
                    <div class="card-body">
                        <div class="pb-2">
                            <h5 class="card-title mb-2 fs-4">Atualizar Senha</h5>
                        </div>
                        <form action="{{ route('user.profile.update_password', $user->id) }}" method="post">
                            @csrf
                            <div class="row mt-3">
                                <div class="col-6">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bx bxs-key fs-4"></i></span>
                                        <input type="password" name="oldpassword" class="form-control w-50"
                                            placeholder="Senha Atual">
                                        @error('oldpassword')
                                            <span class="text-danger"><b>{{ $message }}</b></span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-6">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bx bx-key fs-4"></i></span>
                                        <input type="password" name="password" class="form-control w-50"
                                            placeholder="Nova Senha">
                                        @error('password')
                                            <span class="text-danger"><b>{{ $message }}</b></span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-6">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bx bx-key fs-4"></i></span>
                                        <input type="password" name="password_confirmation" class="form-control w-50" placeholder="Confirmar Senha">
                                        @error('password_confirmation')
                                            <span class="text-danger"><b>{{ $message }}</b></span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            


                            <div class="row justify-content-end mt-5">
                                <button class="btn btn-sm btn-success w-25" type="submit">Atualizar</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection

<style>
    .image-upload input {
        display: none;
    }
</style>