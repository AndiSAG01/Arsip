<!-- Button trigger for basic modal -->
<button type="button" class="btn btn-primary block" data-bs-toggle="modal" data-bs-target="#default">
    Tambah Arsip
</button>

<!--Basic Modal -->
<div class="modal fade text-left" id="default" tabindex="-1" aria-labelledby="myModalLabel1" style="display: none;"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary justify-content-center">
                <h5 class="modal-title text-white " id="modalTitleId"> 🔔 "Pastikan Anda memperhatikan pengisian data
                    pada setiap
                    formulir." 🔔</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('surat-keluar.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="category_id">Jenis surat</label>
                                    <select class="form-select form-select" name="category_id" id="category_id">
                                        <option value="">Pilih satu jenis surat</option>
                                        @foreach ($category as $item)
                                            <option value="{{ $item->id }}" {{ old('category_id') == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="from">Asal surat</label>
                                    <input type="text" class="form-control" value="{{ old('from') }}"
                                        name="from" id="from" placeholder="Masukkan Asal surat">
                                    @error('from')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="type_id">Sifat surat</label>
                                    <select class="form-select form-select" name="type_id" id="type_id" required>
                                        <option value="">Pilih satu sifat surat</option>
                                        @foreach ($type as $item)
                                            <option value="{{ $item->id }}" {{ old('type_id') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('type_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="file">File surat</label>
                                    <input type="file" class="form-control" name="file" id="file" required>
                                    @error('file')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description">Perihal</label>
                                <textarea class="form-control" name="description" id="description" rows="3" value="{{ old('description') }}"
                                    placeholder="Masukkan keterangan atau deskripsi surat">{{ old('description') }}</textarea>
                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
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
