<x-app>
    <div class="page-heading">
        <h3>Ubah dokumen</h3>
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
    <form action="/document/{{ $document->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="row">
                <div class="row">
                    <div class="form-group">
                        <label for="category_id">Jenis dokumen</label>
                        <select class="form-select form-select" name="category_id" id="category_id">
                            <option selected value="{{ $document->category->id }}">{{ $document->category->name}}</option>
                            @foreach ($category as $item)
                            <option value="{{$item->id}}">{{ $item->name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Nama dokumen</label>
                        <input type="text" class="form-control" value="{{ $document->name }}" name="name"
                            id="name" placeholder="Masukkan nama atau judul dokumen">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="code">Kode dokumen</label>
                        <input type="text" class="form-control" value="{{ $document->code }}" name="code"
                            id="code" placeholder="Masukkan kode dokumen">
                        @error('code')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi dokumen</label>
                        <textarea class="form-control" name="description" id="description" rows="3" placeholder="Masukkan keterangan atau deskripsi dokumen">{{ $document->description }}yyyyy</textarea>
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="file">File dokumen</label>
                        <input type="file" class="form-control" name="file"
                            id="file">
                        @error('file')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Ubah</button>

                    </div>
                </div>
            </div>
        </div>
    </form>

    </div>
    
</x-app>