<x-app>
    <div class="page-heading">
        <h3>Jenis Dokumen</h3>
        <div class="alert alert-primary" role="alert">
            <strong>Peringatan!!!</strong> Pastikan data yang diinputkan lengkap dan tidak ada informasi yang terlewatkan. Hal ini termasuk informasi seperti nama dan lain sebagainya.
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="my-3">
                @include('category.store')        
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
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $no => $item)
                        <tr>
                            <td>{{ ++$no }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                <div class="d-inline-flex gap-3">
                                    <a href="/category/{{ $item->slug }}/edit" class="btn btn-sm btn-warning">Ubah</a>
                                    <form action="/category/{{$item->slug}}" method="post">
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
