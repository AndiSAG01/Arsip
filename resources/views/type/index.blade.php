<x-app>
    <x-slot name="title">Sifat Surat</x-slot>
    @include('layouts.table')
    <div class="card">
        <div class="card-header">
            @include('type.store')
        </div>
        <div class="card-body">
            <table id="example" class="table table-striped nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Sifat Surat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($types as $no => $item)
                        <tr>
                            <td>{{ ++$no }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                <div class="d-inline-flex gap-3">
                                    @include('type.update')
                                    <form action="/type/{{ $item->slug }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i>
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

</x-app>
