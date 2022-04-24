@extends('front.user.cpanel.main')

@section('panel_content')
    <h3>Adaugarea unei adrese pentru cont</h3>
    <div class="card m-3 p-3">
        <div class="card-header">
            Datele noii adrese
        </div>
        <div class="card-body">
            <form action={{ route('address.create') }} method="POST">
                @csrf
                <div class="row my-2 p-2">
                    <div class="col-md-6 form-group">
                        <label>Nume destinatar *</label>
                        <input name="name" value="{{ old('name') }}"
                            class="form-control @error('name') is-invalid @enderror" type="text"
                            placeholder="Numele destinatarului pentru comenzi" required>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Telefon</label>
                        <input name="phone" value="{{ old('phone') }}"
                            class="form-control @error('phone') is-invalid @enderror" type="text"
                            placeholder="Numarul de telefon (pot fi mai multe)">
                        @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Oras *</label>
                        <input name="city" value="{{ old('city') }}"
                            class="form-control @error('city') is-invalid @enderror" type="text"
                            placeholder="Numele orasului de destinatie" required>
                        @error('city')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row my-2 p-2">
                    <div class="col-md-12 form-group">
                        <label>Adresa *</label>
                        <input value="{{ old('address') }}" name="address"
                            class="form-control @error('address') is-invalid @enderror" type="text"
                            placeholder="Introduceti numele strazii, numarul, blocul etc..." required>
                        @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row my-2 p-2">
                    <div class="col-md-12 form-group">
                        <label>Observatii</label>
                        <textarea name="observations" class="form-control @error('observations') is-invalid @enderror" rows="4"
                            placeholder="Orice observatii legate de destinatar sau adresa de destinatie">{{ old('observations') }}</textarea>
                        @error('observations')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

        </div>
        <div class="card-footer">
            <a href="{{ route('address.show') }}" class="btn btn-dark float-left">Return</a>
            <button class="btn btn-primary float-right" type="submit">Add Address</button>
        </div>
        </form>

    </div>
@endsection
