<x-app>
    <x-slot name="title">Profil Akun</x-slot>
    <div class="flex-grow-1">
        <!-- Header -->
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="user-profile-header-banner">
                        <img src="https://images.unsplash.com/photo-1533805994737-558461dcb28e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8aW5kb25lc2lhfGVufDB8fDB8fHww&auto=format&fit=crop&w=700&q=60"
                            alt="Banner image" height="200px" style="object-fit: cover; width: -webkit-fill-available"
                            class="rounded-top">
                    </div>
                    <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                        <div class="flex-grow-1 mt-3 mt-sm-5">
                            <div
                                class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                                <div class="user-profile-info">
                                    <h4 class="text-uppercase">{{ auth()->user()->name }}</h4>
                                    <div class="row">
                                        <ol class="list-group list-group-numbered">
                                            <div class="col-md">
                                                <div class="row">
                                                    <div class="col-md">
                                                        <li
                                                            class="list-group-item d-flex justify-content-between align-items-start border-0">
                                                            <div class="ms-2 me-auto">
                                                                <div class="fw-bold text-uppercase">Email</div>
                                                                {{ Auth()->user()->email }}
                                                            </div>
                                                        </li>
                                                        <li
                                                            class="list-group-item d-flex justify-content-between align-items-start border-0">
                                                            <div class="ms-2 me-auto">
                                                                <div class="fw-bold text-uppercase">NIK (Nomor Induk
                                                                    Kependudukan)
                                                                </div>
                                                                {{ Auth()->user()->nik }}
                                                            </div>
                                                        </li>
                                                        <li
                                                            class="list-group-item d-flex justify-content-between align-items-start border-0">
                                                            <div class="ms-2 me-auto">
                                                                <div class="fw-bold text-uppercase">NIP (Nomor Induk
                                                                    Pegawai)</div>
                                                                {{ Auth()->user()->nip }}
                                                            </div>
                                                        </li>
                                                    </div>
                                                    <div class="col-md">
                                                        <li
                                                            class="list-group-item d-flex justify-content-between align-items-start border-0">
                                                            <div class="ms-2 me-auto">
                                                                <div class="fw-bold text-uppercase">Alamat</div>
                                                                {{ Auth()->user()->address }}
                                                            </div>
                                                        </li>
                                                        <li
                                                            class="list-group-item d-flex justify-content-between align-items-start border-0">
                                                            <div class="ms-2 me-auto">
                                                                <div class="fw-bold text-uppercase">Telp</div>
                                                                {{ Auth()->user()->telp }}
                                                            </div>
                                                        </li>
                                                        <li
                                                            class="list-group-item d-flex justify-content-between align-items-start border-0">
                                                            <div class="ms-2 me-auto">
                                                                <div class="fw-bold text-uppercase">Tanggal Lahir</div>
                                                                {{ Carbon\Carbon::parse(Auth()->user()->birthday)->format('d M Y') }}
                                                            </div>
                                                        </li>
                                                    </div>
                                                </div>
                                            </div>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Header -->

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Profile Details</h5>
                    <!-- Account -->
                    <div class="card-body">
                        <form id="formAccountSettings" method="POST" class="form-input" novalidate="novalidate"
                            action="{{ route('profile.update', Auth()->user()->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="name" class="form-label">Nama</label>
                                    <input
                                        class="form-control @error('name')
                invalid
                @enderror"
                                        type="text" id="name" value="{{ auth()->user()->name }}" name="name">
                                    @error('name')
                                        <small class="text-danger fw-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input
                                        class="form-control @error('email')
                invalid
                @enderror"
                                        type="email" id="email" value="{{ auth()->user()->email }}"
                                        name="email">
                                    @error('email')
                                        <small class="text-danger fw-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="telp" class="form-label">Telp</label>
                                    <input
                                        class="form-control @error('telp')
                invalid
                @enderror"
                                        type="number" id="telp" value="{{ auth()->user()->telp }}"
                                        name="telp">
                                    @error('telp')
                                        <small class="text-danger fw-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="birthday" class="form-label">Tanggal Lahir</label>
                                    <input
                                        class="form-control @error('birthday')
                invalid
                @enderror"
                                        type="date" id="birthday" value="{{ auth()->user()->birthday }}"
                                        name="birthday">
                                    @error('birthday')
                                        <small class="text-danger fw-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="nik" class="form-label">NIK (Nomor Induk Kependudukan)</label>
                                    <input
                                        class="form-control @error('nik')
                invalid
                @enderror"
                                        type="number" id="nik" value="{{ auth()->user()->nik }}" name="nik">
                                    @error('nik')
                                        <small class="text-danger fw-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="nip" class="form-label">NIP (Nomor Induk Pegawai)</label>
                                    <input
                                        class="form-control @error('nip')
                invalid
                @enderror"
                                        type="number" id="nip" value="{{ auth()->user()->nip }}"
                                        name="nip">
                                    @error('nip')
                                        <small class="text-danger fw-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Alamat</label>
                                <textarea class="form-control @error('address')
            invalid
            @enderror" name="address"
                                    id="address" rows="3">{{ Auth()->user()->address }}</textarea>

                                @error('address')
                                    <small class="text-danger fw-bold">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">Simpan</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form>
                    </div>
                    <!-- /Account -->
                </div>
                @if (Auth()->user()->isAdmin == 1)
                    <div class="card">
                        <h5 class="card-header">Hapus Akun</h5>
                        <div class="card-body">
                            <div class="mb-3 col-12 mb-0">
                                <div class="alert alert-warning">
                                    <h6 class="alert-heading fw-medium mb-1">Apakah Anda yakin ingin menghapus akun
                                        Anda?
                                    </h6>
                                    <p class="mb-0">Setelah akun Anda dihapus, tidak ada cara untuk memulihkannya.
                                        Mohon
                                        diperhatikan.</p>
                                </div>
                            </div>
                            <form action="{{ route('profile.destroy', Auth()->user()->id) }}" class="form-input"
                                method="POST">
                                @csrf
                                @method('delete')
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" name="confirmAccount"
                                        id="confirmAccount" required>
                                    <label class="form-check-label" for="confirmAccount">Saya mengonfirmasi akun saya
                                        dihapus</label>
                                    <div
                                        class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-danger">Hapus Akun</button>
                                <input type="hidden">
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>



    </div>
</x-app>
