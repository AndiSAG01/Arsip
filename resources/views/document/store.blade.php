<!-- Button trigger for basic modal -->
<button type="button" class="btn btn-primary block" data-bs-toggle="modal" data-bs-target="#default">
    Tambah dokumen baru
</button>

<!--Basic Modal -->
<div class="modal fade text-left" id="default" tabindex="-1" aria-labelledby="myModalLabel1" style="display: none;"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h3 class="text-center">Tambah dokumen baru</h3>
                <hr>
                <form action="/document" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            {{-- 'category_id', 'name', 'code', 'description', 'file', 'slug' --}}
                            <div class="form-group">
                                <label for="category_id">Jenis dokumen</label>
                                <select class="form-select form-select" name="category_id" id="category_id">
                                    <option selected value="">Pilih satu janis dokumen</option>

                                    <option value=""></option>

                                </select>
                                @error('category_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Nama dokumen</label>
                                <input type="text" class="form-control" value="{{ old('name') }}" name="name"
                                    id="name" placeholder="Masukkan nama atau judul dokumen">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="code">Kode dokumen</label>
                                <input type="text" class="form-control" value="{{ old('code') }}" name="code"
                                    id="code" placeholder="Masukkan kode dokumen">
                                @error('code')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Deskripsi dokumen</label>
                                <textarea class="form-control" name="description" id="description" rows="3" value="{{ old('description') }}" placeholder="Masukkan keterangan atau deskripsi dokumen"></textarea>
                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="file">File dokumen</label>
                                <input type="file" class="form-control" value="{{ old('file') }}" name="file"
                                    id="file">
                                @error('file')
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
