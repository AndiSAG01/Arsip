    <!-- Button trigger for basic modal -->
    <button type="button" class="btn btn-primary block" data-bs-toggle="modal" data-bs-target="#default">
        Tambah jenis dokumen
    </button>

    <!--Basic Modal -->
    <div class="modal fade text-left" id="default" tabindex="-1" aria-labelledby="myModalLabel1" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h3 class="text-center">Tambah jenis dokumen</h3>
                    <hr>
                    <form action="/category" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group">
                                    <label for="name">Nama jenis dokumen</label>
                                    <input type="text" class="form-control" value="{{ old('name') }}"
                                        name="name" id="name" placeholder="Masukkan nama jenis dokumen">
                                    @error('name')
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
