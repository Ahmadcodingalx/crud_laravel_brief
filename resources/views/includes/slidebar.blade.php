<div class="side-bar">
    @php
        $user = Auth::user();
    @endphp

    <a href="" class="brand-logo-text">
        Admin Vs User
    </a>
    <br /><br /><br />

    <ul>
        <li>
            <small>
                <i class="fas fa-cart-arrow-down"></i>
                &nbsp;
                <b>Profil</b>
            </small>
        </li>
    </ul>

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


    @if ($user && $user->status == 1)
        <ul>
            <li>
                <small>
                    <i class="fa fa-boxes-packing"></i>
                    &nbsp;
                    <b>Gestion de utilisateurs</b>
                </small>
            </li>
        </ul>

        <ul>
            <li>
                <a href="{{ route('users_section.create_user') }}">
                    Créer une nouvel utilisateur
                </a>
            </li>
            <li>
                <a href="{{ route('users_section.index') }}">
                    Liste des utilisateurs
                </a>
            </li>
            
        </ul>
    @endif

</div>