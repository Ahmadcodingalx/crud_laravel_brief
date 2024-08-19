@extends('layouts.base')

@section('content')
    @include('includes.slidebar')

    <div class="wrap-content">
        @include('includes.appbar')

        <br /><br /><br /><br /><br />

        <div class="container">

            @if ($message = Session::get('success'))
                <ul class="alert alert-success">
                    <li>{{ $message }}</li>
                </ul>
            @endif

            <div class="border datatable-cover stripe1">
                <table id="datatable" class="stripe2">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>nom d'utilisateur</th>
                            <th width="100" class="text-center">
                                Emails
                            </th>
                            <th width="100" class="text-center">
                                Opérations
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="stripe3">
                                <td>
                                    {{ $user->name }}
                                </td>
                                <td>
                                    {!! $user->username == null
                                        ? "<span class='text-muted'>Pas de no.</span>"
                                        : $user->username !!}
                                </td>
                                <td>
                                    {!! $user->email == null
                                        ? "<span class='text-muted'>Pas de description.</span>"
                                        : $user->email !!}
                                </td>
                                <td class="text-center">
                                    <div class="icone-hor">
                                        <a href="{{ route('users_section.edit_user', $user->id) }}" class="Btn">
                                            <i class="fas fa-pen-to-square" style="color: #FFF"></i>
                                        </a>
                                        &nbsp;
                                        <form class="d-inline" action="{{ route('users_section.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr(e) de vouloir supprimer la catégorie {{ $user->name }} ? Cette action sera irréversible !')">
                                            @csrf
                                            @method("DELETE")
                                            {{-- <button class="delete-button">
                                                <svg viewBox="0 0 448 512" class="svgIcon"><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"></path></svg>
                                            </button> --}}
                                            <button class="bookmarkBtn">
                                                <span class="IconContainer">
                                                  {{-- <svg viewBox="0 0 384 512" height="0.9em" class="icon">
                                                    <path
                                                      d="M0 48V487.7C0 501.1 10.9 512 24.3 512c5 0 9.9-1.5 14-4.4L192 400 345.7 507.6c4.1 2.9 9 4.4 14 4.4c13.4 0 24.3-10.9 24.3-24.3V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48z"
                                                    ></path>
                                                  </svg> --}}
                                                  <i class="fa-solid fa-trash"></i>
                                                </span>
                                                <p class="text">Supprimer</p>
                                              </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection






{{-- @section('content')


@endsection --}}