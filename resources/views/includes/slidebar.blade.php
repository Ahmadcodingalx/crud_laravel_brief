<div class="side-bar">
    @php
        $user = Auth::user();
    @endphp

    <a href="" class="brand-logo-text">
        Admin Vs User
    </a>
    <br /><br /><br />

    {{-- <div style="font-size: 30px">
        <ul>
            <li>
                <small>
                    <i class="fas fa-cart-arrow-down"></i>
                    &nbsp;
                    <b>Profil</b>
                </small>
            </li>
        </ul>
    </div> --}}
    <div class="cards1">
    
        <div class="Option blue">
            <ul>
    
                @if ($user && $user->status == 1)
                    <li>
                        <a href="{{ route('admin_profil') }}">
                            Profil
                        </a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('users_section.profil') }}">
                            Profil
                        </a>
                    </li>
                @endif
                
            </ul>
        </div>
    
    
        @if ($user && $user->status == 1)
            {{-- <div style="font-size: 25px">
                <ul>
                    <li>
                        <small>
                            <i class="fa fa-boxes-packing"></i>
                            &nbsp;
                            <b>Gestion de utilisateurs</b>
                        </small>
                    </li>
                </ul>
            </div> --}}
    
            <div class="Option">
                <ul>
                    <li>
                        <a href="{{ route('users_section.create_user') }}">
                            Créer une nouvel utilisateur
                        </a>
                    </li>
                </ul>
            </div>
            <div class="Option">
                <ul>
                    <li>
                        <a href="{{ route('users_section.index') }}">
                            Liste des utilisateurs
                        </a>
                    </li>
                </ul>
            </div>
                
        @endif
    </div>

</div>