    <!-- Button trigger for basic modal -->
    <button type="button" class="btn btn-primary block" data-bs-toggle="modal" data-bs-target="#default">
        Tambah jenis surat
    </button>

    <!--Basic Modal -->
    <div class="modal fade text-left" id="default" tabindex="-1" aria-labelledby="myModalLabel1" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h6 class="text-center">Tambah Jenis Surat</h6>
                    <hr>
                    <form action="{{ route('type.store') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{ old('name') }}" name="name"
                                    id="name" placeholder="Masukkan nama jenis surat">
                                @error('name')
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
