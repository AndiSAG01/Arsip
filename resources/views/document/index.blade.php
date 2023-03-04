<x-app>
    <div class="page-heading">
        <h3>Dokumen</h3>
        <div class="alert alert-primary" role="alert">
            <strong>Peringatan!!!</strong> Pastikan data yang diinputkan lengkap dan tidak ada informasi yang terlewatkan. Hal ini termasuk informasi seperti jenis dokumen, nama, kode dan lain sebagainya.
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="my-3">
                @include('document.store')        
            </div>
            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>Gagal 👎</strong> Data tidak valid
            </div>

            <script>
                var alertList = document.querySelectorAll('.alert');
                alertList.forEach(function(alert) {
                    new bootstrap.Alert(alert)
                })
            </script>
            @elseif (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>Berhasil!!! </strong>{{Session::get('success')}}
            </div>

            <script>
                var alertList = document.querySelectorAll('.alert');
                alertList.forEach(function(alert) {
                    new bootstrap.Alert(alert)
                })
            </script>
        @endif

        </div>
        <div class="card-body">
            <table id="mytable" class="ui celled table responsive nowrap unstackable" style="width:100%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama jenis dokumen</th>
                        <th>Kode dokumen</th>
                        <th>Nama dokumen</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($documents as $no => $item)
                        <tr>
                            <td>{{ ++$no }}</td>
                            <td>{{ $item->category->name }}</td>
                            <td>{{ $item->code }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>
                                <div class="d-inline-flex gap-3">
                                    <a href="/document/{{ $item->slug }}/edit" class="btn btn-sm btn-warning">Ubah</a>
                                    <form action="/document/{{$item->slug}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-app>
