@extends("Admin.Layouts.main")

@section("container")
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary shadow-sm" data-toggle="modal" data-target="#exampleModal">
                <i class="fas fa-download fa-sm text-white-50"></i> Cetak Laporan
            </button>

        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary h-100 py-2 shadow">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="font-weight-bold text-primary text-uppercase mb-1 text-xs">
                                    Jumlah Booking Hari Ini</div>
                                <div class="h5 font-weight-bold mb-0 text-gray-800">{{ $bookings->count() }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success h-100 py-2 shadow">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="font-weight-bold text-success text-uppercase mb-1 text-xs">
                                    Pendapatan Hari Ini</div>
                                <div class="h5 font-weight-bold mb-0 text-gray-800">Rp
                                    {{ number_format($bookings->sum("harga"), 0, ",", ".") }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info h-100 py-2 shadow">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="font-weight-bold text-info text-uppercase mb-1 text-xs">Total member
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 font-weight-bold mb-0 mr-3 text-gray-800">{{ $totalMember }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning h-100 py-2 shadow">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="font-weight-bold text-warning text-uppercase mb-1 text-xs">
                                    Pending Requests</div>
                                <div class="h5 font-weight-bold mb-0 text-gray-800">{{ $pendingBooking }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-business-time fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4 shadow">
            <div class="card-header py-3">
                <h6 class="font-weight-bold text-primary m-0">List Booking Hari Ini</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table-bordered table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Waktu Mulai</th>
                                <th>Waktu Selesai</th>
                                <th>Status Pembayaran</th>
                                <th>Status Booking</th>
                                <th>Meja</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->member->nama_lengkap }}</td>
                                    <td>{{ date("d-M-Y (H:i)", strtotime($data->waktu_mulai)) }}</td>
                                    <td>{{ date("d-M-Y (H:i)", strtotime($data->waktu_akhir)) }}</td>
                                    <td><span
                                            class="badge {{ $data->status_pembayaran == "belum_dikonfirmasi" ? "bg-warning" : "bg-success" }} text-dark">{{ $data->status_pembayaran }}</span>
                                    </td>
                                    <td><span
                                            class="badge {{ $data->status_booking == "pending" ? "bg-warning" : "bg-success" }} text-dark">{{ $data->status_booking }}</span>
                                    </td>
                                    <td>{{ $data->getTable() == "table1s" ? "Meja 1" : ($data->getTable() == "table2s" ? "Meja 2" : ($data->getTable() == "table3s" ? "Meja 3" : ($data->getTable() == "table4s" ? "Meja 4" : ($data->getTable() == "table5s" ? "Meja 5" : "Meja 6")))) }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pilih Rentang Tanggal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url("cetak-pdf") }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <label for="tanggalAwal">Tanggal Awal</label>
                                <input type="date" class="form-control" id="tanggalAwal" name="tanggal_awal">
                            </div>
                            <div class="col">
                                <label for="tanggalAkhir">Tanggal Akhir</label>
                                <input type="date" class="form-control" id="tanggalAkhir" name="tanggal_akhir">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Cetak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
