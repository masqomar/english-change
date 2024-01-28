@extends('layouts.app')

@section('title', 'Jenis Kas')

@push('style')
<!-- CSS Libraries -->
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Halaman Jenis Kas</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Jenis Kas</h4>
                        </div>
                        <div class="card-body">
                            <form action="#" method="GET">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="q" placeholder="cari berdasarkan nama jenis kas">
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
                                            <th scope="col">Nama Kas</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Pemasukan</th>
                                            <th scope="col">Pengeluaran</th>
                                            <th scope="col">Transfer</th>
                                            <th scope="col" style="width: 15%">Pilihan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jenisKas as $no => $typeKas)
                                        <tr>
                                            <th scope="row">
                                                {{ ++$no + ($jenisKas->currentPage() - 1) * $jenisKas->perPage() }}
                                            </th>
                                            <td>{{ $typeKas->nama }}</td>
                                            <td>{{ $typeKas->status }}</td>
                                            <td>{{ $typeKas->pemasukan }}</td>
                                            <td>{{ $typeKas->pengeluaran }}</td>
                                            <td>{{ $typeKas->transfer }}</td>
                                            <td class="text-center">

                                                @can('jenis-kas.edit')
                                                <a href="{{ route('app.jenis-kas.edit', $typeKas->id) }}" class="btn btn-success btn-sm">
                                                    <i class="fa fa-pencil-alt me-1" title="Edit Jenis Kas">
                                                    </i>
                                                </a>
                                                @endcan

                                                @can('jenis-kas.delete')
                                                <button onclick="Delete(this.id)" id="{{ $typeKas->id }}" class="btn btn-danger btn-sm"><i class="fa fa-trash" title="Hapus Jenis Kas"></i>
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
                            {{ $jenisKas->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>
                </div>

                @can('jenis-kas.create')
                <div class="col-12 col-md-6 col-lg-4">
                    @include('pages.app.jenis-kas._create')
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
                    url: "/app/jenis-kas/" + id,
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