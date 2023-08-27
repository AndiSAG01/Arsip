    <!-- Button trigger for basic modal -->
    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#{{ $item->slug }}">

        Ubah
    </button>

    <!--Basic Modal -->
    <div class="modal fade text-left" id="{{ $item->slug }}" tabindex="-1" aria-labelledby="myModalLabel1"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h6 class="text-center">Ubah Jenis Surat</h6>
                    <hr>
                    <form action="{{ route('type.update', $item->slug) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{ $item->name ?? old('name') }}"
                                    name="name" id="name" placeholder="Masukkan nama jenis surat">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
