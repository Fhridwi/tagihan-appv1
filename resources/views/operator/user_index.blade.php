@extends('layouts.app_sneat')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Data User</h5>
                <div class="card-body">
                    <a href="{{ route('user.create') }}" class="btn btn-primary btn-md mb-3">TAMBAH DATA</a>
                    <div class="table-responsive">
                        <table class="table table-striped ">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>No HP</th>
                                    <th>Email</th>
                                    <th>Akses</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($models as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->nohp }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->akses }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4">Data Tidak Ada </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {!! $models->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
