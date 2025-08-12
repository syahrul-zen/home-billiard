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
                <h6 class="font-weight-bold text-primary m-0">Member</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table-bordered table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>No WA</th>
                                <th>Status</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($members as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->nama_lengkap }}</td>
                                    <td>{{ $data->alamat }}</td>
                                    <td>{{ $data->no_wa }}</td>
                                    <td>{{ $data->status }}</td>
                                    <td>{{ $data->email }}</td>

                                    <td>
                                        <a href="{{ url("member/" . $data->id . "/edit") }}"
                                            class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                        <form action="{{ url("member/" . $data->id) }}" method="POST" class="d-inline">
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
