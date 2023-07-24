<x-app>
    <x-slot name="title">User</x-slot>
    @include('layouts.table')

    <div class="card">
        <div class="card-header">
            @include('user.store')
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped nowrap" style="width:100%">
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
                                    <div class="d-flex gap-3">
                                        <a href="/user/{{ $item->slug }}/edit" class="btn btn-sm btn-warning"><i
                                                class="bi bi-pencil-square"></i>
                                            Ubah</a>
                                        <form action="/user/{{ $item->slug }}" method="post">
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
