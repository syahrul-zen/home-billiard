@extends("Admin.Layouts.main")

<style>
    :root {
        --primary-dark: #0a2463;
        --primary-white: #ffffff;
        --accent-red: #d8315b;
        --light-bg: #f8f9fa;
        --card-light: #ffffff;
        --border-light: #dee2e6;
        --text-dark: #333333;
    }

    /* body {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            color: var(--text-dark);
            min-height: 100vh;
            padding: 40px 0;
        } */
    /* Detail Container */
    .detail-container {
        /* max-width: 1000px; */
        margin: 0 auto;
        padding: 0 20px;
        margin-bottom: 20px
    }

    /* Header Section */
    .detail-header {
        margin-bottom: 30px;
    }

    .detail-header h4 {
        font-size: 1.5rem;
        font-weight: 600;
        color: var(--primary-dark);
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    /* Detail Card */
    .detail-card {
        background-color: var(--card-light);
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        border: 1px solid var(--border-light);
    }

    /* Success Alert */
    .success-alert {
        background-color: rgba(40, 167, 69, 0.1);
        border: 1px solid #28a745;
        color: #28a745;
        border-radius: 10px;
        padding: 15px 20px;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .alert-close {
        background: none;
        border: none;
        font-size: 1.2rem;
        color: #28a745;
        cursor: pointer;
    }

    /* Action Buttons */
    .action-buttons {
        display: flex;
        gap: 15px;
        margin-bottom: 30px;
        flex-wrap: wrap;
    }

    .btn-action {
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        cursor: pointer;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-status {
        background-color: var(--primary-dark);
        color: var(--primary-white);
        border: none;
    }

    .btn-status:hover {
        background-color: #071a4a;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(10, 36, 99, 0.3);
    }

    .btn-payment {
        background-color: #17a2b8;
        color: var(--primary-white);
        border: none;
    }

    .btn-payment:hover {
        background-color: #138496;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(23, 162, 184, 0.3);
    }

    .btn-receipt {
        background-color: #28a745;
        color: var(--primary-white);
        border: none;
    }

    .btn-receipt:hover {
        background-color: #218838;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(40, 167, 69, 0.3);
    }

    /* Modal Styles */
    .modal-content {
        border-radius: 15px;
        border: none;
    }

    .modal-header {
        border-bottom: 1px solid var(--border-light);
        padding: 20px;
    }

    .modal-title {
        font-weight: 600;
        color: var(--primary-dark);
    }

    .modal-body {
        padding: 20px;
    }

    .modal-footer {
        border-top: 1px solid var(--border-light);
        padding: 20px;
    }

    /* Radio Buttons */
    .form-check {
        margin-bottom: 15px;
    }

    .form-check-input {
        width: 1.2em;
        height: 1.2em;
        margin-top: 0.25em;
    }

    .form-check-input:checked {
        background-color: var(--primary-dark);
        border-color: var(--primary-dark);
    }

    .form-check-label {
        font-weight: 500;
    }

    /* Detail Table */
    .detail-table {
        width: 100%;
        border-collapse: collapse;
    }

    .detail-table th {
        width: 30%;
        padding: 12px 15px;
        text-align: left;
        font-weight: 600;
        color: var(--primary-dark);
        border-bottom: 1px solid var(--border-light);
        vertical-align: top;
    }

    .detail-table td {
        width: 5%;
        padding: 12px 15px;
        border-bottom: 1px solid var(--border-light);
        vertical-align: top;
    }

    .detail-table td:last-child {
        width: 65%;
    }

    .detail-table tr:last-child th,
    .detail-table tr:last-child td {
        border-bottom: none;
    }

    /* Status Badges */
    .status-badge {
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
    }

    .badge-warning {
        background-color: rgba(255, 193, 7, 0.1);
        color: #ffc107;
    }

    .badge-info {
        background-color: rgba(23, 162, 184, 0.1);
        color: #17a2b8;
    }

    .badge-success {
        background-color: rgba(40, 167, 69, 0.1);
        color: #28a745;
    }

    /* Payment Proof */
    .payment-proof {
        display: inline-flex;
        align-items: center;
        gap: 10px;
    }

    .btn-view-proof {
        background-color: #17a2b8;
        color: var(--primary-white);
        border: none;
        padding: 5px 10px;
        border-radius: 6px;
        font-size: 0.8rem;
        transition: all 0.3s ease;
    }

    .btn-view-proof:hover {
        background-color: #138496;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .detail-header h4 {
            font-size: 1.3rem;
        }

        .action-buttons {
            flex-direction: column;
        }

        .btn-action {
            width: 100%;
            justify-content: center;
        }

        .detail-table th,
        .detail-table td {
            padding: 10px;
            font-size: 0.9rem;
        }

        .detail-table th {
            width: 40%;
        }

        .detail-table td:last-child {
            width: 55%;
        }
    }
</style>

@section("container")
    <div class="detail-container">
        <!-- Header -->
        <div class="detail-header">
            <h4><i class="bi bi-box-arrow-up"></i> Detail Booking Meja 6</h4>
        </div>

        <!-- Detail Card -->
        <div class="detail-card">
            <!-- Success Alert -->

            @if (session()->has("success"))
                <div class="success-alert">
                    <div>
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>{{ session("success") }}</span>
                    </div>
                    <button class="alert-close">
                        <i class="bi bi-x"></i>
                    </button>
                </div>
            @endif

            <!-- Action Buttons -->
            <div class="action-buttons">
                {{-- <button type="button" class="btn-action btn-status" data-bs-toggle="modal" data-bs-target="#statusModal">
                    <i class="bi bi-pencil-square"></i> Status Rental
                </button> --}}

                <a href="{{ url("/table6") }}" class="btn-action btn-receipt">
                    Kembali
                </a>
                <button type="button" class="btn-action btn-status" data-toggle="modal" data-target="#statusBooking">
                    Status Booking
                </button>
                {{-- <button type="button" class="btn-action btn-payment" data-bs-toggle="modal" data-bs-target="#paymentModal">
                    <i class="bi bi-credit-card"></i> Status Pembayaran
                </button> --}}
                <button type="button" class="btn-action btn-payment" data-toggle="modal" data-target="#exampleModal">
                    Status Pembayaran
                </button>
            </div>

            <!-- Detail Table -->
            <table class="detail-table">
                <tbody>
                    <tr>
                        <th>Nama Member</th>
                        <td>:</td>
                        <td>{{ $booking->member->nama_lengkap }}</td>
                    </tr>
                    <tr>
                        <th>Meja Billiard</th>
                        <td>:</td>
                        <td>Meja 6</td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td>:</td>
                        <td>{{ date("d F Y", strtotime($booking->waktu_mulai)) }}</td>
                    </tr>
                    <tr>
                        <th>Jam</th>
                        <td>:</td>
                        <td>{{ date("H:i", strtotime($booking->waktu_mulai)) }} -
                            {{ date("H:i", strtotime($booking->waktu_akhir)) }}</td>
                    </tr>
                    <tr>
                        <th>Status Booking</th>
                        <td>:</td>
                        <td>
                            <span
                                class="badge {{ $booking->status_booking == "pending" ? "badge-warning" : "badge-success" }}">{{ $booking->status_booking }}</span>

                        </td>
                    </tr>
                    <tr>
                        <th>Status Pembayaran</th>
                        <td>:</td>
                        <td>
                            <span
                                class="badge {{ $booking->status_pembayaran == "belum_dikonfirmasi" ? "badge-warning" : "badge-success" }}">{{ $booking->status_pembayaran }}</span>
                        </td>
                    </tr>
                    <tr>
                        <th>Total Denda</th>
                        <td>:</td>
                        <td>Rp. 35.000</td>
                    </tr>
                    <tr>
                        <th>Bukti Pembayaran</th>
                        <td>:</td>
                        <td>
                            <div class="payment-proof">
                                <a href="{{ asset("file/" . $booking->bukti_pembayaran) }}" class="btn-view-proof">
                                    <i class="bi bi-eye"></i> Lihat Bukti
                                </a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Status Booking Modal -->
    <!-- Modal -->
    <div class="modal fade" id="statusBooking" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Status Booking</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url("set-status-booking6/" . $booking->id) }}" method="POST">
                        @csrf
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status_booked" id="statusPending"
                                value="pending" @checked($booking->status_booking == "pending")>
                            <label class="form-check-label" for="statusPending">
                                Pending
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status_booked" id="statusBooked"
                                value="booked" @checked($booking->status_booking == "booked")>
                            <label class="form-check-label" for="statusBooked">
                                Booked
                            </label>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ url("set-status-pembayaran6/" . $booking->id) }}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Status Pembayaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Ubah Status Pembayaran</p>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="belum_dikonfirmasi"
                                name="status_pembayaran" id="pending" required @checked($booking->status_pembayaran == "belum_dikonfirmasi")>
                            <label class="form-check-label" for="pending">
                                Belum dikonfirmasi
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status_pembayaran"
                                value="sudah_dikonfirmasi" id="telahDibayar" required @checked($booking->status_pembayaran == "sudah_dikonfirmasi")>
                            <label class="form-check-label" for="telahDibayar">
                                Sudah dikonfirmasi
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
