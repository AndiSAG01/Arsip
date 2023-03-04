<x-app>
    <div class="page-heading">
        <h3>Petugas</h3>
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
    <form action="/document/{{ $document->slug }}" method="post">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Nama jenis dokumen</label>
                        <input type="text" class="form-control" value="{{ $document->name ?? old('name') }}"
                            name="name" id="name" placeholder="Masukkan nama jenis dokumen">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </div>
        </div>
    </form>

    </div>
    
</x-app>