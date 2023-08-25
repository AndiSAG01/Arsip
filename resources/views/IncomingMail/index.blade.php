<x-app>
    <x-slot name="title">Surat Masuk</x-slot>
    @include('layouts.table')
    <div class="card">
        <div class="card-header">
            @include('IncomingMail.store')
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nomor Surat</th>
                            <th>Nama Jenis Surat</th>
                            <th>Nama Sifat Surat</th>
                            <th>Tanggal Input</th>
                            <th>Perihal</th>
                            <th>Asal Surat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($documents as $no => $item)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>{{ $item->code }}</td>
                                <td>{{ $item->category->name }}</td>
                                <td>{{ $item->type->name }}</td>
                                <td>{{ carbon\carbon::parse($item->created_at)->format('d M Y') }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->from }}</td>
                                <td>
                                    <div class="d-inline-flex gap-3">
                                        <a href="{{ route('surat-masuk.edit', $item->id) }}"
                                            class="btn btn-sm btn-warning">Ubah</a>
                                        <form action="{{ route('surat-masuk.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                Hapus</button>
                                        </form>
                                        <a class="btn btn-success btn-sm"
                                            href="{{ route('surat-masuk.download', $item->id) }}"
                                            role="button">Download</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app>
