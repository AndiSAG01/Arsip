<x-app>
    <div class="page-heading">
        <h3>Data Petugas</h3>
        <div class="alert alert-primary" role="alert">
            <strong>Peringatan!!!</strong> Pastikan data yang diinputkan lengkap dan tidak ada informasi yang
            terlewatkan. Hal ini termasuk informasi seperti nomor identitas, tanggal lahir dan lain sebagainya.
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="my-3">
                @if (Auth()->user()->isAdmin == 1)
                    @include('user.store')
                @endif
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
                    <strong>Berhasil!!! </strong>{{ Session::get('success') }}
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
                        <th>Nama Petugas</th>
                        <th>Email</th>
                        <th>NIK</th>
                        <th>NIP</th>
                        <th>Alamat</th>
                        <th>Telp</th>
                        <th>Tanggal Lahir</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $no => $item)
                        <tr>
                            <td>{{ ++$no }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->nik }}</td>
                            <td>{{ $item->nip }}</td>
                            <td>{{ $item->address }}</td>
                            <td><a
                                    href="https://api.whatsapp.com/send/?phone={{ $item->telp }}&text&type=phone_number&app_absent=0">{{ $item->telp }}</a>
                            </td>
                            <td>{{ Carbon\carbon::parse($item->birthday)->format('d F Y') }}</td>
                            <td>
                                @if (Auth()->user()->isAdmin == 1)
                                    <div class="d-inline-flex gap-3">
                                        <a href="/admin/{{ $item->slug }}/edit" class="btn btn-sm btn-warning"><i
                                                class="bi bi-pencil-square"></i>
                                            Ubah</a>
                                        <form action="/admin/{{ $item->slug }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i
                                                    class="bi bi-trash"></i>
                                                Hapus</button>
                                        </form>
                                    </div>
                                @elseif (Auth()->user()->slug == $item->slug)
                                    <div class="d-inline-flex gap-3">
                                        <a href="/admin/{{ $item->slug }}/edit" class="btn btn-sm btn-warning"><i
                                                class="bi bi-pencil-square"></i>
                                            Ubah</a>
                                    </div>
                                @else
                                <strong>Tidak ada akses</strong>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-app>
