@extends('layouts.app')

@section('title', 'Kas Transfer')

@push('style')
<!-- CSS Libraries -->
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Halaman Kas Transfer</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Kas Transfer</h4>
                        </div>
                        <div class="card-body">
                            <form action="#" method="GET">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="q" placeholder="cari berdasarkan nama kas transfer">
                                    <button class="btn btn-primary input-group-text" type="submit">
                                        <i class="fa fa-search me-2 text-white"></i>
                                    </button>
                                    <button class="btn btn-primary input-group-text" onclick="resetPage()">
                                        <i class="fas fa-sync-alt me-2 text-white"></i>
                                    </button>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table class="table table-bordered table-m">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="width: 5%">No</th>
                                            <th scope="col">Kode Transaksi</th>
                                            <th scope="col">Tanggal Transaksi</th>
                                            <th scope="col">Dari Kas</th>
                                            <th scope="col">Untuk Kas</th>
                                            <th scope="col">Nominal</th>
                                            <th scope="col">Keterangam</th>
                                            <th scope="col" style="width: 15%">Pilihan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kasTransfers as $no => $kasTransfer)
                                        <tr>
                                            <th scope="row">
                                                {{ ++$no + ($kasTransfers->currentPage() - 1) * $kasTransfers->perPage() }}
                                            </th>
                                            <td>{{ $kasTransfer->kode_transaksi }}</td>
                                            <td>{{ \Carbon\Carbon::parse($kasTransfer->tanggal_catat)->format('d/m/Y')}}</td>
                                            <td>{{ $kasTransfer->dari_jenis_kas->nama }}</td>
                                            <td>{{ $kasTransfer->untuk_jenis_kas->nama }}</td>
                                            <td>{{ number_format($kasTransfer->jumlah) }}</td>
                                            <td>{{ $kasTransfer->keterangan }}</td>
                                            <td class="text-center">

                                                @can('kas-transfer.edit')
                                                <a href="{{ route('app.kas-transfer.edit', $kasTransfer->id) }}" class="btn btn-success btn-sm">
                                                    <i class="fa fa-pencil-alt me-1" title="Edit Kas Transfer">
                                                    </i>
                                                </a>
                                                @endcan

                                                @can('kas-transfer.delete')
                                                <button onclick="Delete(this.id)" id="{{ $kasTransfer->id }}" class="btn btn-danger btn-sm"><i class="fa fa-trash" title="Hapus Kas Transfer"></i>
                                                </button>
                                                @endcan

                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer pull-right">
                            {{ $kasTransfers->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>
                </div>

                @can('kas-transfer.create')
                <div class="col-12 col-md-6 col-lg-4">
                    @include('pages.app.kas-transfer._create')
                </div>
                @endcan

            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<!-- JS Libraies -->
<script>
    function resetPage() {
        window.location.reload();
    }
</script>

<script>
    function Delete(id) {
        var id = id;
        var token = $("meta[name='csrf-token']").attr("content");

        swal({
            title: "APAKAH KAMU YAKIN ?",
            text: "INGIN MENGHAPUS DATA INI!",
            icon: "warning",
            buttons: [
                'TIDAK',
                'YA'
            ],
            dangerMode: true,
        }).then(function(isConfirm) {
            if (isConfirm) {

                //ajax delete
                jQuery.ajax({
                    url: "/app/kas-transfer/" + id,
                    data: {
                        "id": id,
                        "_token": token
                    },
                    type: 'DELETE',
                    success: function(response) {
                        if (response.status == "success") {
                            swal({
                                title: 'BERHASIL!',
                                text: 'DATA BERHASIL DIHAPUS!',
                                icon: 'success',
                                timer: 1000,
                                showConfirmButton: false,
                                showCancelButton: false,
                                buttons: false,
                            }).then(function() {
                                location.reload();
                            });
                        } else {
                            swal({
                                title: 'GAGAL!',
                                text: 'DATA GAGAL DIHAPUS!',
                                icon: 'error',
                                timer: 1000,
                                showConfirmButton: false,
                                showCancelButton: false,
                                buttons: false,
                            }).then(function() {
                                location.reload();
                            });
                        }
                    }
                });

            } else {
                return true;
            }
        })
    }
</script>
<!-- Page Specific JS File -->
@endpush