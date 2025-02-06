<x-app-layout>
    <x-slot:title>
        Barang
    </x-slot>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>User</h3>
                    <p class="text-subtitle text-muted">Tambahkan User</p>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" placeholder="Name" name="name" value="{{ old('name') ?? '' }}">
                            <div class="form-control-icon">
                                <i class="bi bi-people"></i>
                            </div>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-sm @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') ?? '' }}">
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-sm @error('username') is-invalid @enderror" placeholder="Username" name="username" value="{{ old('username') ?? '' }}">
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
                            <input type="password" class="form-control form-control-sm @error('password') is-invalid @enderror" placeholder="Password" name="password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            @error('password')
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
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-sm" placeholder="Confirm Password" name="password_confirmation">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block btn-sm shadow-sm mt-5">Submit</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
