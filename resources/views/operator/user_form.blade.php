@extends('layouts.app_sneat')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Form User</h5>
                <div class="card-body">
                
                   <!-- Menampilkan Pesan Sukses -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Form untuk membuat user baru -->
                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" name="name" id="name" class="form-control mt-1 mb-1" value="{{ old('name') }}" required>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nohp">No HP</label>
                            <input type="text" name="nohp" id="nohp" class="form-control  mt-1 mb-1" value="{{ old('nohp') }}" required>
                            @error('nohp')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control  mt-1 mb-1" value="{{ old('email') }}" required>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="akses">Akses</label>
                            <select name="akses" id="akses" class="form-control  mt-1 mb-1" required>
                                <option value="admin" {{ old('akses') == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="operator" {{ old('akses') == 'operator' ? 'selected' : '' }}>Operator</option>
                                <option value="wali" {{ old('akses') == 'wali' ? 'selected' : '' }}>Wali</option> 

                            </select>
                            @error('akses')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Field untuk Password -->
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control  mt-1 mb-1" required>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Button untuk submit -->
                        <button type="submit" class="btn btn-primary mt-4">SIMPAN</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
