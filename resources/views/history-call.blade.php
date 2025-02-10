@extends('layout.app')

@section('content')
<!-- Page Title -->
<div class="page-title light-background features-cards">
    <div class="container text-center">
        <img src="{{ asset('assets/img/logo-mwt.png') }}" alt="Logo" style="width: 250px;">
        <h2 class="mt-4">History Paging System PT Mada Wikri Tunggal</h2>

        <!-- Filter Section -->
        <div class="container mt-5">
            <form id="filterForm" method="GET" action="{{ route('history-call') }}">
                <div class="row g-3">
                    <!-- Filter Jenis Pemanggilan -->
                    <div class="col-md-5">
                        <label for="jenis_pemanggilan" class="form-label">Jenis Pemanggilan</label>
                        <select class="form-control" name="jenis_pemanggilan" id="jenis_pemanggilan">
                            <option value="">-- Semua --</option>
                            @foreach($jenisPemanggilanOptions as $jenis)
                                <option value="{{ $jenis }}" {{ request('jenis_pemanggilan') == $jenis ? 'selected' : '' }}>
                                    {{ $jenis }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Filter Tanggal -->
                    <div class="col-md-5">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal"
                            value="{{ request('tanggal') }}">
                    </div>

                    <!-- Tombol Submit -->
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="submit" class="btn btn-success w-100">Filter</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Button Refresh & Export PDF -->
        <div class="d-flex justify-content-center mt-3">
            <div class="mx-2">
                <button type="button" class="btn btn-dark" onclick="location.reload();">
                    Refresh Data
                </button>
            </div>
            <div class="mx-2">
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exportModal">
                    Export PDF
                </button>
            </div>
        </div>

        <!-- Table History Call -->
        <div class="container mt-4">
            <div class="card">
                <div class="card-body">
                    <table id="historyTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis Pemanggilan</th>
                                <th>Tujuan</th>
                                <th>Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($historyCalls as $index => $call)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $call->jenis_pemanggilan }}</td>
                                    <td>{{ $call->nama_mesin }}</td>
                                    <td>{{ $call->created_at->format('d-m-Y H:i:s') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Tidak ada histori panggilan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Export PDF -->
<div class="modal fade" id="exportModal" tabindex="-1" aria-labelledby="exportModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="exportForm" method="GET" action="{{ route('history-call.export-pdf') }}">
                <div class="modal-header">
                    <h5 class="modal-title" id="exportModalLabel">Pilih Rentang Waktu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="start_date" class="form-label">Dari Tanggal</label>
                        <input type="date" class="form-control" name="start_date" id="start_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="end_date" class="form-label">Sampai Tanggal</label>
                        <input type="date" class="form-control" name="end_date" id="end_date" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Export PDF</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection