<x-app>
    <x-slot name="title">Arsip</x-slot>
    @include('layouts.table')
    <div class="card">
        <div class="card-header">
            @include('document.store')
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Surat</th>
                            <th>Nama Jenis Surat</th>
                            <th>Nama Sifat Surat</th>
                            <th>Nomor Surat</th>
                            <th>Tanggal Input</th>
                            <th>Perihal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($documents as $no => $item)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->category->name }}</td>
                                <td>{{ $item->type->name }}</td>
                                <td>{{ $item->code }}</td>
                                <td>{{ carbon\carbon::parse($item->created_at)->format('d M Y') }}</td>
                                <td>{{ $item->description }}</td>
                                <td>
                                    <div class="d-inline-flex gap-3">
                                        <a href="/document/{{ $item->slug }}/edit"
                                            class="btn btn-sm btn-warning">Ubah</a>
                                        <form action="/document/{{ $item->slug }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i
                                                    class="bi bi-trash"></i>
                                                Hapus</button>
                                        </form>
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
