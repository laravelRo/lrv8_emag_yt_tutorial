@extends('front.user.cpanel.main')

@section('panel_content')
    <h1 class="text-center">
        Informatii cont E-mag Laravel 8 test
    </h1>
    <h3 class="text-center">
        {{ auth()->user()->name }} | cont <span class="text-primary">{{ auth()->user()->type }}</span>
    </h3>
    <p>
        In aceasta sectiune va puteti modifica datele contului pe situl E-mag Laravel 8 Test, puteti contacta
        administratorii sitului daca intamplinati probleme legate de comenzi, produse sau utilizarea sitului.
    </p>
    <p>
        In sectiunea <b>Adrese livrare / facturare</b> puteti adauga una sau mai multe adrese de livrare pentru viitoarele
        comenzi. De asemenea puteti adauga datele unor firme in cazul in care doriti facturarea pe firma a comenzilor.
    </p>
    <p>
        In sectiunea <b>Schimbare parola</b> puteti schimba parola pentru contul Dvs, in cazul in care considerati ca este
        nesigura. Va trebui sa introduceti parola curenta iar apoi noua parola pentru resetare.
    </p>
@endsection
