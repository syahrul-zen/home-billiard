@extends("Admin.Layouts.main")

@section("container")
    <div class="container-fluid">
        <!-- DataTales Example -->

        @if (session()->has("success"))
            <div class="alert alert-success" role="alert">
                {{ session("success") }}
            </div>
        @endif
        <div class="card mb-4 shadow">
            <div class="card-header py-3">
                <h6 class="font-weight-bold text-primary m-0">Booking Meja 2</h6>
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
                                <th>Keterangan</th>
                                <th>Aksi</th>
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
                                    <td>{{ $data->keterangan }}</td>
                                    <td>
                                        <a href="{{ url("table2/" . $data->id . "/edit") }}"
                                            class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                        <form action="{{ url("table2/" . $data->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i
                                                    class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
