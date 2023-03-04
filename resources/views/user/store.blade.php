    <!-- Button trigger for basic modal -->
    <button type="button" class="btn btn-primary block" data-bs-toggle="modal" data-bs-target="#default">
     Tambah data petugas
    </button>

    <!--Basic Modal -->
    <div class="modal fade text-left" id="default" tabindex="-1" aria-labelledby="myModalLabel1" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h3 class="text-center">Tambah data petugas</h3><hr>
                    <form action="/superadmin" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group">
                                    <label for="nik">NIK (Nomor Induk Kependudukan)</label>
                                    <input type="number" class="form-control" value="{{ old('nik')}}" name="nik" id="nik"
                                        placeholder="Masukkan Nomor Induk Kependudukan">
                                    @error('nik')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nip">NIP (Nomor Identitas Pegawai Negeri Sipil)</label>
                                    <input type="number" class="form-control" name="nip" value="{{ old('nip')}}" id="nip"
                                        placeholder="Masukkan Nomor Identitas Pegawai Negeri Sipil">
                                    @error('nip')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name">Nama lengkap</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name')}}" id="name"
                                        placeholder="Masukkan nama lengkap">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ old('email')}}" id="email"
                                        placeholder="Masukkan email">
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label><br>
                                    <small class="text-danger">Secara default masukkan "<span>password</span>" untuk login</small>
                                    <input type="text" class="form-control" value="password" name="password" readonly
                                        id="password" placeholder="Masukkan password">
                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="address">Alamat</label>
                                    <input type="text" class="form-control" name="address" value="{{ old('address')}}" id="address"
                                        placeholder="Masukkan alamat tempat tinggal">
                                    @error('address')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="telp">Telp (WhatsApp)</label>
                                    <input type="number" class="form-control" name="telp" value="{{ old('telp')}}" id="telp"
                                        placeholder="Masukkan telp atau whatsapp yang dapat dihubungi">
                                    @error('telp')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="birthday">Tanggal lahir</label>
                                    <input type="date" class="form-control" name="birthday" value="{{ old('birthday')}}" id="birthday"
                                        placeholder="Masukkan tanggal lahir petugas">
                                    @error('')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
