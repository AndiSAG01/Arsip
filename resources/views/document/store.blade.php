<!-- Button trigger for basic modal -->
<button type="button" class="btn btn-primary block" data-bs-toggle="modal" data-bs-target="#default">
    Tambah Arsip
</button>

<!--Basic Modal -->
<div class="modal fade text-left" id="default" tabindex="-1" aria-labelledby="myModalLabel1" style="display: none;"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h6 class="text-center">Tambah Arsip</h6>
                <hr>
                <form action="/document" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="category_id">Jenis surat</label>
                            <select class="form-select form-select" name="category_id" id="category_id">
                                <option selected value="">Pilih satu jenis surat</option>
                                @foreach ($category as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="type_id">Sifat surat</label>
                            <select class="form-select form-select" name="type_id" id="type_id" required>
                                <option selected value="">Pilih satu sifat surat</option>
                                @foreach ($type as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('type_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Nama surat</label>
                            <input type="text" class="form-control" value="{{ old('name') }}" name="name"
                                id="name" placeholder="Masukkan nama atau judul surat">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="from">Asal surat</label>
                            <input type="text" class="form-control" value="{{ old('from') }}" name="from"
                                id="from" placeholder="Masukkan Asal surat">
                            @error('from')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="code">Nomor surat</label>
                            <input type="text" class="form-control" value="{{ old('code') }}" name="code"
                                id="code" placeholder="Masukkan nomor surat">
                            @error('code')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Perihal</label>
                            <textarea class="form-control" name="description" id="description" rows="3" value="{{ old('description') }}"
                                placeholder="Masukkan keterangan atau deskripsi surat"></textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="file">File surat</label>
                            <input type="file" class="form-control" name="file" id="file">
                            @error('file')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
