<x-print-layout>
    <div class="page-heading">
        <h3>Laporan data dokumen</h3>
            <small>Data yang telah diarsip</small>
    </div>
    <div class="card">
        <div class="card-body table-responsive">
            <table id="mytable" class="display responsive" style="width:100%">
                <thead>
                    <tr>
                        <th>Nama atau judul dokumen</th>
                        <th>Jenis dokumen</th>
                        <th>Kode dokument</th>
                        <th>Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($documents as $item)                
                    <tr>
                        <td>{{ $item->name}}</td>
                        <td>{{ $item->category->name}}</td>
                        <td>{{ $item->code}}</td>
                        <td>{{ $item->description}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-print-layout>