@extends('livewire.admin.layouts.main')

@section('content')
<section id="antrian" class="d-flex align-items-center">
    <div class="container" style="margin-top: 150px">

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert"> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row">
    <div class="col">
        <div class="table-responsive">
            <table class="table table-bordered" id="table_id">
                <thead>
                    <tr style="text-align: center">
                        <th scope="col">ID</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr style="text-align: center">
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role_id }}</td>
                        <td>
                            <button type="button" class="btn btn-danger"
                                wire:click="confirmDelete({{ $user->id }})"
                                data-bs-toggle="modal" data-bs-target="#deleteUser">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>
    </div>

        @include('livewire.admin.deleteUser')

    </div>

</section>
@endsection