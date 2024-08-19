@extends('layouts.base')

@section('content')
    @include('includes.slidebar')

    <div class="wrap-content">
        @include('includes.appbar')

        <br /><br /><br />

        <div class="container">

            @if ($message = Session::get('success'))
                <ul class="alert alert-success">
                    <li>{{ $message }}</li>
                </ul>
            @endif

            @if ($message = Session::get('error'))
                <ul class="alert alert-danger">
                    <li>{{ $message }}</li>
                </ul>
            @endif
            
            <div class="row justify-content-center">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6 col-xxl-5">
                    

                    {{-- -------------------- --}}

                    <div class="container2-0">
                        <div class="heading">Modifier</div>
                        <form class="form1" action="{{ route('users_section.update', $user->id) }}" method="post">
                            @csrf

                            @if ($errors->any())
                                <ul class="alert alert-danger">
                                    {!! implode('', $errors->all('<p>:message</p>')) !!}
                                </ul>
                            @endif
                            @if ($message = Session::get('error'))
                                <div>{{ $message }}</div><br />
                            @endif
                            <label for="name">Nom</label>
                            <input type="text" value="{{ $user->name }}" class="input" name="name" id="name" placeholder="Nouveau nom ..."/>
                            
                            <label for="username">Nom d'utilisateur</label>
                            <input type="text" value="{{ $user->username }}" class="input" name="username" id="username" placeholder="Nouveau nom d'utilisateur..."/>
                            
                            <label for="email">Email</label>
                            <input type="`text" value="{{ $user->email }}" class="input" name="email" id="email" placeholder="name@example.com" >

                            <?php
                                function generateRandomString($length = 10) {
                                    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                                    $randomString = str_shuffle($characters);
                                    $code = rand(100, 999);
                                    $rdmString = substr($randomString, 0, $length);
                                    $result = $code . "-" . $rdmString;
                                    return $result;
                                }
                            ?>
                            <input type="hidden" name="password" id="password" value="{{ generateRandomString(3) }}" >

                            <label class="inline-checkbox">
                                Changer le mot de passe &nbsp;
                                <input type="checkbox" id="checkboxInput">
                                <label for="checkboxInput" class="toggleSwitch">
                                </label>
                                {{-- <label class="container_checkbox">
                                    <input type="checkbox" checked="checked">
                                    <div class="checkmark"></div>
                                </label> --}}
                            </label><br />
                            {{-- <span class="forgot-password"><a href="#">Forgot Password ?</a></span> --}}
                            {{-- <input value="Sign In" type="submit" class="login-button" /> --}}
                            <button class="cta">
                                <span class="span">Modifier</span>
                                <span class="second">
                                    <svg
                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                    xmlns="http://www.w3.org/2000/svg"
                                    version="1.1"
                                    viewBox="0 0 66 43"
                                    height="20px"
                                    width="50px"
                                    >
                                    <g
                                        fill-rule="evenodd"
                                        fill="none"
                                        stroke-width="1"
                                        stroke="none"
                                        id="arrow"
                                    >
                                        <path
                                        fill="#FFFFFF"
                                        d="M40.1543933,3.89485454 L43.9763149,0.139296592 C44.1708311,-0.0518420739 44.4826329,-0.0518571125 44.6771675,0.139262789 L65.6916134,20.7848311 C66.0855801,21.1718824 66.0911863,21.8050225 65.704135,22.1989893 C65.7000188,22.2031791 65.6958657,22.2073326 65.6916762,22.2114492 L44.677098,42.8607841 C44.4825957,43.0519059 44.1708242,43.0519358 43.9762853,42.8608513 L40.1545186,39.1069479 C39.9575152,38.9134427 39.9546793,38.5968729 40.1481845,38.3998695 C40.1502893,38.3977268 40.1524132,38.395603 40.1545562,38.3934985 L56.9937789,21.8567812 C57.1908028,21.6632968 57.193672,21.3467273 57.0001876,21.1497035 C56.9980647,21.1475418 56.9959223,21.1453995 56.9937605,21.1432767 L40.1545208,4.60825197 C39.9574869,4.41477773 39.9546013,4.09820839 40.1480756,3.90117456 C40.1501626,3.89904911 40.1522686,3.89694235 40.1543933,3.89485454 Z"
                                        class="one"
                                        ></path>
                                        <path
                                        fill="#FFFFFF"
                                        d="M20.1543933,3.89485454 L23.9763149,0.139296592 C24.1708311,-0.0518420739 24.4826329,-0.0518571125 24.6771675,0.139262789 L45.6916134,20.7848311 C46.0855801,21.1718824 46.0911863,21.8050225 45.704135,22.1989893 C45.7000188,22.2031791 45.6958657,22.2073326 45.6916762,22.2114492 L24.677098,42.8607841 C24.4825957,43.0519059 24.1708242,43.0519358 23.9762853,42.8608513 L20.1545186,39.1069479 C19.9575152,38.9134427 19.9546793,38.5968729 20.1481845,38.3998695 C20.1502893,38.3977268 20.1524132,38.395603 20.1545562,38.3934985 L36.9937789,21.8567812 C37.1908028,21.6632968 37.193672,21.3467273 37.0001876,21.1497035 C36.9980647,21.1475418 36.9959223,21.1453995 36.9937605,21.1432767 L20.1545208,4.60825197 C19.9574869,4.41477773 19.9546013,4.09820839 20.1480756,3.90117456 C20.1501626,3.89904911 20.1522686,3.89694235 20.1543933,3.89485454 Z"
                                        class="two"
                                        ></path>
                                        <path
                                        fill="#FFFFFF"
                                        d="M0.154393339,3.89485454 L3.97631488,0.139296592 C4.17083111,-0.0518420739 4.48263286,-0.0518571125 4.67716753,0.139262789 L25.6916134,20.7848311 C26.0855801,21.1718824 26.0911863,21.8050225 25.704135,22.1989893 C25.7000188,22.2031791 25.6958657,22.2073326 25.6916762,22.2114492 L4.67709797,42.8607841 C4.48259567,43.0519059 4.17082418,43.0519358 3.97628526,42.8608513 L0.154518591,39.1069479 C-0.0424848215,38.9134427 -0.0453206733,38.5968729 0.148184538,38.3998695 C0.150289256,38.3977268 0.152413239,38.395603 0.154556228,38.3934985 L16.9937789,21.8567812 C17.1908028,21.6632968 17.193672,21.3467273 17.0001876,21.1497035 C16.9980647,21.1475418 16.9959223,21.1453995 16.9937605,21.1432767 L0.15452076,4.60825197 C-0.0425130651,4.41477773 -0.0453986756,4.09820839 0.148075568,3.90117456 C0.150162624,3.89904911 0.152268631,3.89694235 0.154393339,3.89485454 Z"
                                        class="three"
                                        ></path>
                                    </g>
                                    </svg>
                                </span>
                            </button>
                        </form>
                        {{-- <div class="social-account-container">
                          <span class="title">Ou se connecter avec</span>
                          <div class="social-accounts">
                            <button class="social-button google">
                              <svg
                                viewBox="0 0 488 512"
                                height="1em"
                                xmlns="http://www.w3.org/2000/svg"
                                class="svg"
                              >
                                <path
                                  d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z"
                                ></path>
                              </svg>
                            </button>
                            <button class="social-button apple">
                              <svg
                                viewBox="0 0 384 512"
                                height="1em"
                                xmlns="http://www.w3.org/2000/svg"
                                class="svg"
                              >
                                <path
                                  d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 4 184.8 4 273.5q0 39.3 14.4 81.2c12.8 36.7 59 126.7 107.2 125.2 25.2-.6 43-17.9 75.8-17.9 31.8 0 48.3 17.9 76.4 17.9 48.6-.7 90.4-82.5 102.6-119.3-65.2-30.7-61.7-90-61.7-91.9zm-56.6-164.2c27.3-32.4 24.8-61.9 24-72.5-24.1 1.4-52 16.4-67.9 34.9-17.5 19.8-27.8 44.3-25.6 71.9 26.1 2 49.9-11.4 69.5-34.3z"
                                ></path>
                              </svg>
                            </button>
                            <button class="social-button twitter">
                              <svg
                                viewBox="0 0 512 512"
                                height="1em"
                                xmlns="http://www.w3.org/2000/svg"
                                class="svg"
                              >
                                <path
                                  d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"
                                ></path>
                              </svg>
                            </button>
                          </div>
                        </div> --}}
                        <span class="agreement"><a href="#">Merci d'avoir choisis Admin Vs User</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    .inline-checkbox {
        display: inline-flex;
        align-items: center;
        margin-right: 15px; /* Espace entre les options */
    }
    .inline-checkbox input[type="checkbox"] {
        margin-right: 5px; /* Espace entre la case et le texte */
    }
    .check {
        width: 20px;
    }

    .check:focus {
        outline: none
    }
</style>
