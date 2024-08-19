<header class="app-bar">
    <table width="100%">
        <tr class="card222">
            @php
                $user = Auth::user();
            @endphp

            @if ($user && $user->status == 1)
                <td>
                    <a href="{{ route('admin_dashboard') }}">
                        <b>Home</b>
                    </a>
                </td>
            @else
                <td>
                    <a href="{{ route('users_section.user_dashboard') }}">
                        <b>Home</b>
                    </a>
                </td>
            @endif
{{-- 
            <td class="loader">
                <p>loading</p>
                <ul class="words">
                    <span class="word">buttons</span>
                    <span class="word">forms</span>
                    <span class="word">switches</span>
                    <span class="word">cards</span>
                    <span class="word">buttons</span>
                </ul>
            </td> --}}


            <td class="text-right">
                <a href="{{ route('admin_login') }}">
                    <b>Déconnexion</b>
                </a>
            </td>
            {{-- <td class="text-right">
                @if (isset($_COOKIE['clientId']) || isset($client->id))
                    <a href="{{ route('profile.edit', ['id' => $_COOKIE['clientId'] ?? $client->id]) }}">
                        <b>Paramètres</b>
                    </a>
                @endif
            </td> --}}
        </tr>
    </table>
</header>