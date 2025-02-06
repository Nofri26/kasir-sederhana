<x-app-layout>
    <x-slot:title>
        User
    </x-slot>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>User</h3>
                    <p class="text-subtitle text-muted">List Users</p>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <form action="{{ route('users.search') }}" method="GET">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group position-relative has-icon-left mb-4">
                                            <input type="text" class="form-control form-control-xs" placeholder="Search" name="search">
                                            <div class="form-control-icon">
                                                <i class="bi bi-search"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col text-start">
                                        <button class="btn btn-secondary">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col">
                            <a href="{{ route('users.create') }}" class="btn btn-primary float-end">Tambah User</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Username</th>
                                    <th>Nama User</th>
                                    <th>Akses</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="text-bold-500">{{ $user->username }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td class="text-capitalize">{{ $user->role }}</td>
                                        <td>
                                            <a href="{{ route('users.edit', $user) }}" class="text-warning"><i class="bi bi-pencil"></i></a>
                                            <form action="{{ route('users.destroy', $user) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-danger border-0 bg-transparent" onclick="return confirm('Apakah Anda yakin ingin menghapus ini?');">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
