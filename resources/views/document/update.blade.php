<x-app>
    <x-slot name="title">Arsip {{ $document->name }}</x-slot>
    <div class="card">
        <div class="card-header text-end">
            <a class="btn btn-success" href="/document/{{ $document->slug }}/download" role="button">Download</a>
        </div>
        <form action="/document/{{ $document->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                            <label for="category_id">Jenis surat</label>
                            <select class="form-select form-select" name="category_id" id="category_id">
                                @foreach ($category as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $document->category->id == $item->id ? 'selected' : '' }}>
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
                            <label for="type_id">Jenis surat</label>
                            <select class="form-select form-select" name="type_id" id="type_id">
                                @foreach ($type as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $document->type->id == $item->id ? 'selected' : '' }}>{{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('type_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                            <label for="name">Nama surat</label>
                            <input type="text" class="form-control" value="{{ $document->name }}" name="name"
                                id="name" placeholder="Masukkan nama atau judul surat">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="from">Asal surat</label>
                            <input type="text" class="form-control" value="{{ $document->from }}" name="from"
                                id="from" placeholder="Masukkan Asal surat">
                            @error('from')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                            <label for="code">Nomor surat</label>
                            <input type="text" class="form-control" value="{{ $document->code }}" name="code"
                                id="code" placeholder="Masukkan nomor surat">
                            @error('code')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="file">File surat <small class="fw-bold text-primary">Jangan input kan file
                                    surat jika tidak mengubah isi
                                    file</small></label>
                            <input type="file" class="form-control" name="file" id="file">
                            @error('file')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description">Perihal</label>
                    <textarea class="form-control" name="description" id="description" rows="3"
                        placeholder="Masukkan keterangan atau perihal surat">{{ $document->description }}yyyyy</textarea>
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Ubah</button>

                </div>
            </div>
        </form>
    </div>
</x-app>
