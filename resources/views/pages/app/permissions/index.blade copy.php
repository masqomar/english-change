@extends('layouts.app')

@section('title', 'Blank Page')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Halaman Hak Izin</h1>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Hak Izin</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('app.permissions') }}" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="q"
                                            placeholder="cari berdasarkan nama permissions">
                                        <button class="btn btn-primary input-group-text" type="submit">
                                            <i class="fa fa-search me-2 text-white"></i>
                                        </button>
                                    </div>
                                </form>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-m">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="width: 5%">No</th>
                                                <th scope="col">Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($permissions as $no => $permission)
                                                <tr>
                                                    <th scope="row">
                                                        {{ ++$no + ($permissions->currentPage() - 1) * $permissions->perPage() }}
                                                    </th>
                                                    <td>
                                                        <span class="alert alert-success">
                                                            {{ $permission->name }}
                                                        </span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer pull-right">
                                {{ $permissions->links('vendor.pagination.bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
