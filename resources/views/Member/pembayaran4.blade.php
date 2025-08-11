@extends("Member.Layouts.main")

@section("container")
    <style>
        body {
            background-color: #f8f9fa;
        }

        .section-card {
            background: white;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }

        .section-title {
            font-weight: 600;
            font-size: 1.25rem;
            margin-bottom: 1rem;
        }

        .navbar-custom {
            border-bottom: 2px solid red;
        }

        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link {
            color: black;
            font-weight: 600;
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.5);
            border-color: #ffc107;
        }
    </style>

    <div class="container py-4">

        <form action="{{ url("/booking-table4") }}" method="post" enctype="multipart/form-data">

            <input type="hidden" name="member_id" value="{{ $user->id }}">
            <input type="hidden" name="waktu_mulai" value="{{ $waktuAwal }}">
            <input type="hidden" name="waktu_akhir" value="{{ $waktuAkhir }}">
            <input type="hidden" name="harga" value="35000">

            @csrf

            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="section-card">
                        <div class="section-title">Customer Detail</div>
                        <div class="mb-3">
                            <label class="form-label">Customer Name*</label>
                            <input type="text" class="form-control border-warning" value="{{ $user->nama_lengkap }}"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Customer WA Number*</label>
                            <input type="text" class="form-control border-warning" value="{{ $user->no_wa }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status*</label>
                            <input type="text" class="form-control border-warning" value="{{ $user->status }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email*</label>
                            <input type="email" class="form-control border-warning" value="{{ $user->email }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Notes*</label>
                            <input type="text" class="form-control border-warning" placeholder="Keterangan"
                                name="keterangan">
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="section-card text-center">
                        <div class="section-title text-start">Pembayaran</div>
                        <img src="https://i.pinimg.com/736x/c2/8b/3d/c28b3d755023f4c88a0521945b17964d.jpg" alt="BSI Logo"
                            class="img-fluid mb-3" style="max-height: 100px;">
                        <div class="mb-3 text-start">
                            <p class="mb-1"><strong>NO DANA :</strong> 082387120434</p>
                            <p class="mb-3"><strong>Atas Nama :</strong> Bagass</p>
                            <label class="form-label">Upload Bukti Pembayaran*</label>
                            <input class="form-control border-warning" type="file" name="bukti_pembayaran" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section-card">
                <div class="mb-2">
                    <h5 class="fw-bold mb-0">Meja 4</h5>
                    {{-- <p class="text-success fw-bold mb-1">Futsal Ball</p> --}}
                    <br>
                    <p class="text-success fw-bold mb-3">{{ date("D, d M Y", strtotime($tanggal)) }} •
                        {{ date("H:i", strtotime($waktuAwal)) }} -
                        {{ date("H:i", strtotime($waktuAkhir)) }}</p>
                </div>
                <hr>
                <div class="mb-0">
                    <strong class="fw-bold ms-2">Bayar Penuh</strong>
                    <span class="text-success fw-bold float-end">Rp 35.000</span>
                </div>

                <hr>

                <div class="text-center">
                    <button class="btn btn-warning w-100 fw-bold py-2">Bayar</button>
                </div>
            </div>
        </form>

    </div>
@endsection
