<x-app-layout>
    <x-slot:title>
        Barang
    </x-slot>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>User</h3>
                    <p class="text-subtitle text-muted">Ubah User</p>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('users.update', $user) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-md @error('username') is-invalid @enderror" placeholder="Username" name="username" value="{{ old('username') ?? $user->username }}">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-md @error('name') is-invalid @enderror" placeholder="Name" name="name" value="{{ old('name') ?? $user->name }}">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="role" id="flexRadioDefault1" value="admin">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Admin
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="role" id="flexRadioDefault2" value="kasir" checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Kasir
                                    </label>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block btn-sm shadow-sm mt-5">Submit</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
