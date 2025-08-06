@extends('Member.Layouts.main')

@section('container')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Validasi Item</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .section-card {
      background: white;
      border-radius: 8px;
      padding: 20px;
      margin-bottom: 20px;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
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
</head>
<body>

  <div class="container py-4">
    <div class="row g-4">
      <div class="col-lg-6">
        <div class="section-card">
          <div class="section-title">Customer Detail</div>
          <div class="mb-3">
            <label class="form-label">Customer Name*</label>
            <input type="text" class="form-control border-warning" value="Bambang Pamungkas">
          </div>
          <div class="mb-3">
            <label class="form-label">Customer WA Number*</label>
            <input type="text" class="form-control border-warning" value="082387120434">
          </div>
          <div class="mb-3">
            <label class="form-label">Status*</label>
            <input type="text" class="form-control border-warning" value="pelajar(siswa)">
          </div>
          <div class="mb-3">
            <label class="form-label">Email*</label>
            <input type="email" class="form-control border-warning" value="bambang@gmail.com">
          </div>
          <div class="mb-3">
            <label class="form-label">Notes*</label>
            <input type="text" class="form-control border-warning" placeholder="Keterangan">
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="section-card text-center">
          <div class="section-title text-start">Pembayaran</div>
          <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b7/Logo_Bank_Syariah_Indonesia.svg/512px-Logo_Bank_Syariah_Indonesia.svg.png" alt="BSI Logo" class="img-fluid mb-3" style="max-height: 100px;">
          <div class="text-start mb-3">
            <p class="mb-1"><strong>NO REK :</strong> 7174889087</p>
            <p class="mb-3"><strong>Atas Nama :</strong> icho hendra saputra</p>
            <label class="form-label">Upload Bukti Pembayaran*</label>
            <input class="form-control border-warning" type="file">
          </div>
        </div>
      </div>
    </div>

    <div class="section-card">
      <div class="mb-2">
        <h5 class="fw-bold mb-0">Meja 1</h5>
        {{-- <p class="text-success fw-bold mb-1">Futsal Ball</p> --}}
        <br>
        <p class="text-success mb-3">Wed, 06 Aug 2025 • 09:00 - 10:00</p>
      </div>
      {{-- <div class="mb-2">
        <strong>Harga Lapangan :</strong>
        <span class="text-danger float-end text-decoration-line-through">Rp 130.000</span>
      </div> --}}
      {{-- <div class="mb-2">
        <strong>Harga Lapangan untuk siswa :</strong>
        <span class="text-success float-end">Rp. 50.000</span>
      </div> --}}
      <hr>
      <div class="mb-0">
        <strong class="text-warning ms-2">Bayar Penuh</strong>
        <span class="text-success float-end fw-bold">Rp 50.000</span>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

    
@endsection