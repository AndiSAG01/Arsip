<x-app>
    <div class="page-heading">
        <h3>Ubah data Petugas</h3>
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>Gagal 👎</strong> Data tidak valid
        </div>

        <script>
            var alertList = document.querySelectorAll('.alert');
            alertList.forEach(function(alert) {
                new bootstrap.Alert(alert)
            })
        </script>
        @else
        <div class="alert alert-primary" role="alert">
            <strong>Peringatan!!!</strong> Pastikan data yang diinputkan lengkap dan tidak ada informasi yang terlewatkan. Hal ini termasuk informasi seperti nomor identitas, tanggal lahir dan lain sebagainya.
        </div>
        @endif
    </div>

    <div class="card">
    <form action="/admin/{{ $user->slug }}" method="post">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nik">NIK (Nomor Induk Kependudukan)</label>
                        <input type="number" class="form-control" value="{{ $user->nik }}" name="nik" id="nik"
                            placeholder="Masukkan Nomor Induk Kependudukan">
                        @error('nik')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nip">NIP (Nomor Identitas Pegawai Negeri Sipil)</label>
                        <input type="number" class="form-control" name="nip" value="{{ $user->nip }}" id="nip"
                            placeholder="Masukkan Nomor Identitas Pegawai Negeri Sipil">
                        @error('nip')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Nama lengkap</label>
                        <input type="text" class="form-control" name="name" value="{{ $user->name }}" id="name"
                            placeholder="Masukkan nama lengkap">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $user->email }}" id="email"
                            placeholder="Masukkan email">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label><br>
                        <small class="text-danger">Secara default masukkan "<span>password</span>" untuk login</small>
                        <input type="password" class="form-control" value="{{ $user->password }}" name="password" readonly id="password"
                            placeholder="Masukkan password">
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <input type="text" class="form-control" name="address" value="{{ $user->address }}"
                            id="address" placeholder="Masukkan alamat tempat tinggal">
                        @error('address')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="telp">Telp (WhatsApp)</label>
                        <input type="number" class="form-control" name="telp" value="{{ $user->telp }}"
                            id="telp" placeholder="Masukkan telp atau whatsapp yang dapat dihubungi">
                        @error('telp')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="birthday">Tanggal lahir</label>
                        <input type="date" class="form-control" name="birthday" value="{{ $user->birthday }}"
                            id="birthday" placeholder="Masukkan tanggal lahir petugas">
                        @error('')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">update</button>
                </div>
            </div>
        </div>
    </form>

    </div>
    
</x-app>