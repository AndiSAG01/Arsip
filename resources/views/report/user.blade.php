<x-app>
    <x-slot name="title">Laporan Akun</x-slot>
    @include('layouts.report')
    <div class="card">
        <div class="card-body table-responsive">
            <table id="example" class="table nowrap" style="width:100%">
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
                            <td>{{ $item->birthday }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app>
