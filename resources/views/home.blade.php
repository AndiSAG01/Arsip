<x-app>
    <x-slot name="title">Dashboard</x-slot>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Statistik Arsip</h4>
                </div>
                <div class="card-body">
                    {!! $chart->container() !!}

                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="col-md">
                <div class="card">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon red">
                                    <i class="iconly-boldBookmark"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Surat Masuk</h6>
                                <h6 class="font-extrabold mb-0">{{ $incomingMail }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="card">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon blue">
                                    <i class="iconly-boldBookmark"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Surat Keluar</h6>
                                <h6 class="font-extrabold mb-0">{{ $OutgoingMail }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ $chart->cdn() }}"></script>

    {{ $chart->script() }}
</x-app>
