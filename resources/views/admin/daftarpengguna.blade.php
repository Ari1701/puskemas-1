@extends('admin.layouts.main')

@section('content')
<div class="row">
    <div class="col">
        <div class="table-responsive">
            <table class="table table-bordered" id="table_id">
                <thead>
                    <tr style="text-align: center">
                        <th scope="col">ID</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr style="text-align: center">
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a class="btn btn-warning" wire:click="editUser({{ $user->id }})"
                                role="button" data-bs-toggle="modal" data-bs-target="#editUser"><i
                                    class="bi bi-pencil"></i></a>

                            <button type="button" class="btn btn-danger"
                                wire:click="deleteUser({{ $user->id }})" role="button"
                                data-bs-toggle="modal" data-bs-target="#deleteUser"><i
                                    class="bi bi-trash"></i></button>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>
</div>

@endsection
@section('script')
    <script>
        window.addEventListener('closeModal', event => {
            $('#createAntrian').modal('hide')
            $('#editUser').modal('hide')
            $('#deleteUser').modal('hide')
        })
    
    </script>
@endsection