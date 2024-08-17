@extends('layouts.base')

@section('content')
    @include('includes.slidebar')

    <div class="wrap-content">
        @include('includes.appbar')

        <br /><br /><br />

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6 col-xxl-5">
                    <div class="card border border-light-subtle rounded-4">
                        <div class="card-body p-3 p-md-4 p-xl-5">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-5">
                                        <h4 class="text-center">Ajouter un utilisateur</h4>
                                    </div>
                                </div>
                            </div>
                            <form action="{{ route('users_section.store') }}" method="post">
                                
                                @csrf

                                @if ($errors->any())
                                    <ul class="alert alert-danger">
                                        {!! implode('', $errors->all('<p>:message</p>')) !!}
                                    </ul>
                                @endif
                                @if ($message = Session::get('error'))
                                    <div>{{ $message }}</div><br />
                                @endif
                                @if ($message = Session::get('success'))
                                    <div>{{ $message }}</div><br />
                                @endif
                                <div class="row gy-3 overflow-hidden">
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="`text" value="" class="form-control" name="name" id="name" placeholder="name@example.com" >
                                            <label for="name" class="form-label">Nom</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" value="" class="form-control" name="username" id="username" placeholder="name@example.com" >
                                            <label for="username" class="form-label">Nom d'utilisateur</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="`text" value="" class="form-control" name="email" id="email" placeholder="name@example.com" >
                                            <label for="email" class="form-label">Email</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <?php
                                                function generateRandomString($length = 10) {
                                                    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                                                    $randomString = str_shuffle($characters);
                                                    $code = rand(100, 1000);
                                                    $rdmString = substr($randomString, 0, $length);
                                                    $result = $code . "-" . $rdmString;
                                                    return $result;
                                                }
                                            ?>
                                            <input type="hidden" name="password" id="password" value="{{ generateRandomString(3) }}" >
                                            @error('password')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                            
                                        </div>
                                    </div>
                                    {{-- <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control" name="passwordConfirm" id="passwordConfirm" value="" placeholder="Confirm Password" >
                                            <label for="password" class="form-label">confirmer mot de passe</label>
                                        </div>
                                    </div> --}}
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button class="btn bsb-btn-xl btn-primary py-3" type="submit">Soumettre</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>








{{-- @section('content')


@endsection --}}