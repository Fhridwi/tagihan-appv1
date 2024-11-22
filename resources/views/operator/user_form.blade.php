@extends('layouts.app_sneat')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">
                    @isset($santri)
                        Edit User
                    @else
                        Form User
                    @endisset
                </h5>
                <div class="card-body">
                
                    <!-- Menampilkan Pesan Sukses -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Form untuk membuat atau mengedit user -->
                    <form action="@isset($santri) {{ route('user.update', $santri->id) }} @else {{ route('user.store') }} @endisset" method="POST">
                        @csrf
                        
                        @isset($santri)
                            @method('PUT') 
                        @endisset

                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" name="name" id="name" class="form-control mt-1 mb-1" value="{{ old('name', $santri->name ?? '') }}" required>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nohp">No HP</label>
                            <input type="text" name="nohp" id="nohp" class="form-control  mt-1 mb-1" value="{{ old('nohp', $santri->nohp ?? '') }}" required>
                            @error('nohp')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control  mt-1 mb-1" value="{{ old('email', $santri->email ?? '') }}" required>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="akses">Akses</label>
                            <select name="akses" id="akses" class="form-control  mt-1 mb-1" required>
                                <option value="admin" {{ old('akses', $santri->akses ?? '') == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="operator" {{ old('akses', $santri->akses ?? '') == 'operator' ? 'selected' : '' }}>Operator</option>
                                <option value="wali" {{ old('akses', $santri->akses ?? '') == 'wali' ? 'selected' : '' }}>Wali</option> 
                            </select>
                            @error('akses')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Field untuk Password -->
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control  mt-1 mb-1" @isset($santri) placeholder="Kosongkan jika tidak ingin mengubah password" @endisset>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Button untuk submit -->
                        <button type="submit" class="btn btn-primary mt-4">
                            @isset($santri)
                                Update
                            @else
                                Simpan
                            @endisset
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
