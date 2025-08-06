@extends('Member.Layouts.main')
<style>
    /* Main Booking Card */
    :root {
        --primary-dark: #0a2463;
        --primary-white: #ffffff;
        --accent-red: #d8315b;
        --light-bg: #f8f9fa;
        --card-light: rgba(255, 255, 255, 0.95);
        --border-light: rgba(10, 36, 99, 0.2);
        --booked-red: #dc3545;
        --text-dark: #333333;
    }

    .booking-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    /* Header Section */
    .booking-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .booking-header h1 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 10px;
        color: var(--primary-dark);
    }

    .booking-header .location {
        font-size: 1.1rem;
        opacity: 0.9;
        margin-bottom: 5px;
        color: var(--primary-dark);
    }

    .booking-header .address {
        font-size: 0.9rem;
        opacity: 0.7;
        color: var(--text-dark);
    }

    /* Main Booking Card */
    .booking-card {
        background-color: var(--card-light);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        border: 1px solid var(--border-light);
    }

    /* Table Selection */
    .table-selection {
        margin-bottom: 30px;
    }

    .table-selection h3 {
        font-size: 1.5rem;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
        color: var(--primary-dark);
    }

    .table-info {
        background-color: rgba(10, 36, 99, 0.05);
        border: 1px solid var(--primary-dark);
        border-radius: 10px;
        padding: 15px;
        margin-bottom: 20px;
    }

    .table-info h4 {
        font-size: 1.2rem;
        margin-bottom: 5px;
        color: var(--primary-dark);
    }

    .table-info p {
        margin: 0;
        opacity: 0.8;
        font-size: 0.9rem;
        color: var(--text-dark);
    }

    /* Time Slots */
    .time-slots {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 15px;
        margin-bottom: 30px;
    }

    .time-slot {
        background-color: var(--primary-white);
        border: 2px solid var(--border-light);
        border-radius: 10px;
        padding: 20px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .time-slot.available:hover {
        border-color: var(--primary-dark);
        background-color: rgba(10, 36, 99, 0.05);
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(10, 36, 99, 0.1);
    }

    .time-slot.selected {
        border-color: var(--primary-dark);
        background-color: rgba(10, 36, 99, 0.1);
        box-shadow: 0 5px 15px rgba(10, 36, 99, 0.2);
    }

    .time-slot.selected::before {
        content: '\2713';
        position: absolute;
        top: 10px;
        right: 15px;
        color: var(--primary-dark);
        font-weight: bold;
        font-size: 1.2rem;
    }

    .time-slot.booked {
        background-color: rgba(220, 53, 69, 0.1);
        border-color: var(--booked-red);
        cursor: not-allowed;
        opacity: 0.7;
    }

    .time-slot.booked::before {
        content: '\2716';
        position: absolute;
        top: 10px;
        right: 15px;
        color: var(--booked-red);
        font-weight: bold;
        font-size: 1.2rem;
    }

    .time-slot.booked .time {
        text-decoration: line-through;
        opacity: 0.7;
    }

    .time-slot .time {
        font-size: 1.3rem;
        font-weight: 600;
        margin-bottom: 5px;
        color: var(--primary-dark);
    }

    .time-slot .duration {
        font-size: 0.9rem;
        opacity: 0.7;
        margin-bottom: 10px;
        color: var(--text-dark);
    }

    .time-slot .price {
        font-size: 1.1rem;
        font-weight: 600;
    }

    .time-slot.available .price {
        color: var(--primary-dark);
    }

    .time-slot.selected .price {
        color: var(--primary-dark);
    }

    .time-slot.booked .price {
        color: var(--booked-red);
        text-decoration: line-through;
    }

    /* Action Buttons */
    .booking-actions {
        display: flex;
        gap: 15px;
        justify-content: flex-end;
        flex-wrap: wrap;
    }

    .btn-booking {
        padding: 12px 30px;
        border-radius: 50px;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
        border: 2px solid transparent;
        cursor: pointer;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-detail {
        background-color: transparent;
        color: var(--primary-dark);
        border-color: var(--primary-dark);
    }

    .btn-detail:hover {
        background-color: rgba(10, 36, 99, 0.05);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(10, 36, 99, 0.1);
    }

    .btn-create {
        background-color: var(--accent-red);
        color: var(--primary-white);
    }

    .btn-create:hover:not(:disabled) {
        background-color: #b82a4e;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(216, 49, 91, 0.3);
    }

    .btn-create:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }

    /* Selected Time Display */
    .selected-time-display {
        background-color: rgba(10, 36, 99, 0.05);
        border: 1px solid var(--primary-dark);
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 30px;
        display: none;
    }

    .selected-time-display.show {
        display: block;
        animation: slideIn 0.3s ease;
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .selected-time-display h4 {
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 10px;
        color: var(--primary-dark);
    }

    /* Legend */
    .legend {
        display: flex;
        gap: 20px;
        justify-content: center;
        margin-bottom: 20px;
        flex-wrap: wrap;
    }

    .legend-item {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 0.9rem;
        color: var(--text-dark);
    }

    .legend-color {
        width: 20px;
        height: 20px;
        border-radius: 5px;
        border: 2px solid;
    }

    .legend-available {
        background-color: var(--primary-white);
        border-color: var(--border-light);
    }

    .legend-selected {
        background-color: rgba(10, 36, 99, 0.1);
        border-color: var(--primary-dark);
    }

    .legend-booked {
        background-color: rgba(220, 53, 69, 0.1);
        border-color: var(--booked-red);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .booking-header h1 {
            font-size: 2rem;
        }

        .time-slots {
            grid-template-columns: 1fr;
        }

        .booking-actions {
            justify-content: center;
        }

        .btn-booking {
            flex: 1;
            justify-content: center;
        }

        .legend {
            gap: 15px;
        }
    }

    /* Loading Animation */
    .loading {
        display: none;
        text-align: center;
        padding: 20px;
    }

    .loading.show {
        display: block;
    }

    .spinner-border {
        color: var(--primary-dark);
    }

    /* Alert Success */
    .alert-success-custom {
        background-color: rgba(40, 167, 69, 0.1);
        border: 1px solid #28a745;
        color: #28a745;
        border-radius: 10px;
        padding: 15px;
        margin-bottom: 20px;
        animation: slideIn 0.3s ease;
    }


    /* Modal Styles - PERBAIKAN MODAL */
    .modal-content {
        background-color: #ffffff !important;
        /* Background solid putih */
        color: var(--text-dark);
        border: 1px solid #dee2e6;
        /* Border Bootstrap default */
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        /* Shadow Bootstrap default */
        /* Hapus backdrop-filter */
    }

    .modal-header {
        background-color: #ffffff;
        border-bottom: 1px solid #dee2e6;
    }

    .modal-footer {
        background-color: #ffffff;
        border-top: 1px solid #dee2e6;
    }

    .modal-body {
        background-color: #ffffff;
    }

    .modal-header h5 {
        color: var(--primary-dark);
        margin: 0;
    }

    .modal-body h6 {
        color: var(--primary-dark);
        font-weight: 600;
    }

    .modal-body p {
        color: var(--text-dark);
        margin-bottom: 0.5rem;
    }

    .modal-body ul {
        color: var(--text-dark);
        padding-left: 1.2rem;
    }

    .modal-body ul li {
        margin-bottom: 0.3rem;
    }

    .text-muted {
        color: #6c757d !important;
    }

    .btn-close {
        filter: none;
        /* Hapus filter invert */
        background-color: transparent;
        border: 0;
        opacity: 0.5;
    }

    .btn-close:hover {
        opacity: 0.75;
    }

    .btn-secondary {
        background-color: #6c757d;
        color: #ffffff;
        border: none;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
        color: #ffffff;
    }

    /* Modal backdrop */
    .modal-backdrop {
        background-color: rgba(0, 0, 0, 0.5);
        /* Background gelap untuk backdrop */
    }
</style>

@section('container')
    <div class="booking-container container my-5">
        <!-- Main Booking Card -->
        <div class="booking-card">
            <!-- Table Selection -->
            <div class="table-selection">
                <h3><i class="bi bi-table me-2"></i>Booking Meja</h3>
                <div class="table-info">
                    <h4>Meja 2</h4>
                    <p>Meja billiard premium dengan ruangan smoking yang nyaman</p>
                </div>
            </div>

            <!-- Selected Time Display -->
            {{-- <div class="selected-time-display" id="selectedTimeDisplay">
                <h4><i class="bi bi-clock-history me-2"></i>Waktu yang Dipilih</h4>
                <p id="selectedTimeText"></p>
            </div> --}}

            <!-- Time Slots -->
            <div class="time-slots" id="timeSlots">
                <!-- Time slots will be generated by JavaScript -->
            </div>

            <!-- Loading -->
            <div class="loading" id="loading">
                <div class="spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <p class="mt-2">Memproses booking...</p>
            </div>

            <!-- Action Buttons -->
            <div class="booking-actions">
                <button class="btn-booking btn-detail" onclick="showDetails()">
                    <i class="bi bi-info-circle me-2"></i>Detail Booking
                </button>
                {{-- <button class="btn-booking btn-create" onclick="confirmBooking()" id="createBtn" disabled>
                    <i class="bi bi-plus-circle me-2"></i>Create Booking
                </button> --}}
            </div>
        </div>
    </div>

    <!-- Modal for Details -->
    <div class="modal fade" id="detailsModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content"
                style="background-color: var(--card-dark); color: white; border: 1px solid var(--border-dark); backdrop-filter: blur(10px);">
                <div class="modal-header border-bottom border-secondary">
                    <h5 class="modal-title"><i class="bi bi-info-circle me-2"></i>Detail Booking</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <h6>Lokasi</h6>
                        <p class="mb-0">Billiard Pro - VIP Floor 2</p>
                        <p class="text-muted">Jl. Billiard No. 123, Tangerang, Banten</p>
                    </div>
                    <div class="mb-3">
                        <h6>Fasilitas</h6>
                        <ul class="mb-0">
                            <li>Meja Billiard Premium 9 feet</li>
                            <li>Ruangan Smoking</li>
                            <li>AC & Musik</li>
                            <li>Free WiFi</li>
                            <li>Mineral Water</li>
                        </ul>
                    </div>
                    <div class="mb-3">
                        <h6>Ketentuan</h6>
                        <ul class="mb-0">
                            <li>Minimal booking 1 jam</li>
                            <li>Maksimal booking 4 jam</li>
                            <li>Booking harus dilakukan 1 jam sebelumnya</li>
                            <li>Pembayaran di lokasi</li>
                        </ul>
                    </div>
                </div>
                <div class="modal-footer border-top border-secondary">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Generate time slots
        const timeSlots = [{
                time: '13:00 - 14:00',
                duration: '60 menit',
                price: 'Rp. 80.000'
            },
            {
                time: '14:00 - 15:00',
                duration: '60 menit',
                price: 'Rp. 80.000'
            },
            {
                time: '15:00 - 16:00',
                duration: '60 menit',
                price: 'Rp. 80.000'
            },
            {
                time: '16:00 - 17:00',
                duration: '60 menit',
                price: 'Rp. 80.000'
            },
            {
                time: '17:00 - 18:00',
                duration: '60 menit',
                price: 'Rp. 80.000'
            },
            {
                time: '18:00 - 19:00',
                duration: '60 menit',
                price: 'Rp. 80.000'
            },
            {
                time: '19:00 - 20:00',
                duration: '60 menit',
                price: 'Rp. 80.000'
            },
            {
                time: '20:00 - 21:00',
                duration: '60 menit',
                price: 'Rp. 80.000'
            },
            {
                time: '21:00 - 22:00',
                duration: '60 menit',
                price: 'Rp. 80.000'
            },
            {
                time: '22:00 - 23:00',
                duration: '60 menit',
                price: 'Rp. 80.000'
            },
            {
                time: '23:00 - 00:00',
                duration: '60 menit',
                price: 'Rp. 80.000'
            }
        ];


        let selectedSlot = null;

        function generateTimeSlots() {
            const container = document.getElementById('timeSlots');
            container.innerHTML = '';

            timeSlots.forEach((slot, index) => {
                const slotElement = document.createElement('div');
                slotElement.className = 'time-slot';
                slotElement.innerHTML = `
                    <div class="time">${slot.time}</div>
                    <div class="duration">${slot.duration}</div>
                    <div class="price">${slot.price}</div>
                `;

                slotElement.addEventListener('click', () => selectSlot(index));
                container.appendChild(slotElement);
            });
        }

        function selectSlot(index) {
            // Remove previous selection
            document.querySelectorAll('.time-slot').forEach(slot => {
                slot.classList.remove('selected');
            });

            // Add selection to clicked slot
            document.querySelectorAll('.time-slot')[index].classList.add('selected');
            selectedSlot = timeSlots[index];

            // Show selected time display
            const display = document.getElementById('selectedTimeDisplay');
            const text = document.getElementById('selectedTimeText');
            text.innerHTML = `<strong>${selectedSlot.time}</strong> - ${selectedSlot.duration} - ${selectedSlot.price}`;
            display.classList.add('show');

            // Enable create button
            document.getElementById('createBtn').disabled = false;
        }

        function showDetails() {
            const modal = new bootstrap.Modal(document.getElementById('detailsModal'));
            modal.show();
        }

        function createBooking() {
            if (!selectedSlot) {
                alert('Silakan pilih waktu terlebih dahulu');
                return;
            }

            // Show loading
            document.getElementById('loading').classList.add('show');
            document.getElementById('createBtn').disabled = true;

            // Simulate API call
            setTimeout(() => {
                document.getElementById('loading').classList.remove('show');

                // Show success message
                const successMessage = document.createElement('div');
                successMessage.className = 'alert-success-custom';
                successMessage.innerHTML = `
                    <i class="bi bi-check-circle me-2"></i>
                    <strong>Booking Berhasil!</strong> Meja VIP Floor 2 untuk jam ${selectedSlot.time} telah berhasil dipesan.
                    <button type="button" class="btn-close float-end" onclick="this.parentElement.remove()"></button>
                `;

                document.querySelector('.booking-card').insertBefore(successMessage, document.querySelector(
                    '.booking-actions'));

                // Reset selection
                document.querySelectorAll('.time-slot').forEach(slot => {
                    slot.classList.remove('selected');
                });
                document.getElementById('selectedTimeDisplay').classList.remove('show');
                selectedSlot = null;
                document.getElementById('createBtn').disabled = true;

                // Auto dismiss after 5 seconds
                setTimeout(() => {
                    if (successMessage.parentElement) {
                        successMessage.remove();
                    }
                }, 5000);
            }, 1500);
        }

        function toggleSelection(element) {
            let tanggal = element.getAttribute('data-tanggal')
            let jam = element.getAttribute('data-jam')
            let akunId = element.getAttribute('data-akunId');

            swal({
                    title: "Konfirmasi!",
                    text: `Anda akan memesan lapangan untuk tanggal ${tanggal} dan jam mulai ${jam} hingga 1 jam kedepan!`,
                    icon: "info",
                    buttons: true,
                    // dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = `pembayaran/${tanggal}/${jam}/${akunId}`;
                    }
                });
        }

        // Initialize
        generateTimeSlots();
    </script>
@endsection
