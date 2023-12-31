<x-app>
    <x-slot name="title">Ubah User {{ $user->name }}</x-slot>
    <div class="card">
        <form action="/user/{{ $user->slug }}" method="post">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                            <label for="nik">NIK (Nomor Induk Kependudukan)</label>
                            <input type="number" class="form-control" value="{{ $user->nik }}" name="nik"
                                id="nik" placeholder="Masukkan Nomor Induk Kependudukan">
                            @error('nik')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="nip">NIP (Nomor Identitas Pegawai Negeri Sipil)</label>
                            <input type="number" class="form-control" name="nip" value="{{ $user->nip }}"
                                id="nip" placeholder="Masukkan Nomor Identitas Pegawai Negeri Sipil">
                            @error('nip')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                            <label for="name">Nama lengkap</label>
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}"
                                id="name" placeholder="Masukkan nama lengkap">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="address">Alamat</label>
                            <input type="text" class="form-control" name="address" value="{{ $user->address }}"
                                id="address" placeholder="Masukkan alamat tempat tinggal">
                            @error('address')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                            <label for="telp">Telp (WhatsApp)</label>
                            <input type="number" class="form-control" name="telp" value="{{ $user->telp }}"
                                id="telp" placeholder="Masukkan telp atau whatsapp yang dapat dihubungi">
                            @error('telp')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="birthday">Tanggal lahir</label>
                            <input type="date" class="form-control" name="birthday" value="{{ $user->birthday }}"
                                id="birthday" placeholder="Masukkan tanggal lahir petugas">
                            @error('birthday')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $user->email }}"
                                id="email" placeholder="Masukkan email">
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <small
                                class="text-danger">{{ Auth::user()->isAdmin == 1 ? 'Jangan inputkan ulang jika tidak mengubah password akun!' : (Auth::user()->slug == $user->slug ? 'Jangan inputkan ulang jika tidak mengubah password akun!' : 'Anda tidak punya hak akses untuk mengubah password') }}
                            </small>
                            <input type="text" class="form-control" name="password"
                                {{ Auth::user()->isAdmin == 1 ? '' : (Auth::user()->slug == $user->slug ? '' : 'readonly') }}
                                id="password" placeholder="************">
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="isAdmin" class="form-label">Role</label>
                    <select class="form-select" name="isAdmin" id="isAdmin">
                        <option selected value=" ">Select one</option>
                        <option value="0" {{ $user->isAdmin == 0 ? 'selected' : '' }}>Petugas</option>
                        <option value="1" {{ $user->isAdmin == 1 ? 'selected' : '' }}>Kepala</option>
                    </select>
                    @error('isAdmin')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                </div>
                <button type="submit" class="btn btn-primary">update</button>

            </div>
        </form>

    </div>

</x-app>
