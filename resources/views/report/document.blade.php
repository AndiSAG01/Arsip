<x-app>
    <x-slot name="title">Laporan Arsip</x-slot>
    @include('layouts.report')
    <div class="card">
        <div class="card-body table-responsive">
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
                        <th class="{{ Auth()->user()->isAdmin == 1 ? '' : 'd-none' }}">Aksi</th>
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
                            <td>{{ carbon\carbon::parse($item->created_at)->format('d-m-Y') }}</td>
                            <td>{{ $item->description }}</td>
                            <td class="{{ Auth()->user()->isAdmin == 1 ? '' : 'd-none' }}"><a
                                    class="btn btn-success btn-sm" href="/document/{{ $item->slug }}/download"
                                    role="button">Download</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app>
