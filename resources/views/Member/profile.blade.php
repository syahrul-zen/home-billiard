@extends('Member.Layouts.main')

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

        body {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            color: var(--text-dark);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            padding: 40px 0;
        }

        /* Profile Container */
        .profile-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header Section */
        .profile-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .profile-header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
            color: var(--primary-dark);
        }

        .profile-header p {
            font-size: 1.1rem;
            opacity: 0.8;
            color: var(--text-dark);
        }

        /* Profile Card */
        .profile-card {
            background-color: var(--card-light);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            border: 1px solid var(--border-light);
            margin-bottom: 30px;
        }

        /* Profile Info */
        .profile-info {
            display: flex;
            align-items: center;
            gap: 30px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .profile-avatar {
            position: relative;
        }

        .avatar-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid var(--border-light);
        }

        .avatar-status {
            position: absolute;
            bottom: 10px;
            right: 10px;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: #28a745;
            border: 3px solid var(--card-light);
        }

        .profile-details {
            flex: 1;
        }

        .profile-name {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 5px;
            color: var(--primary-dark);
        }

        .profile-status {
            display: inline-block;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .status-vip {
            background-color: rgba(216, 49, 91, 0.1);
            color: var(--accent-red);
        }

        .status-regular {
            background-color: rgba(10, 36, 99, 0.1);
            color: var(--primary-dark);
        }

        .profile-stats {
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
        }

        .stat-item {
            text-align: center;
        }

        .stat-value {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-dark);
        }

        .stat-label {
            font-size: 0.9rem;
            color: #6c757d;
        }

        /* Profile Actions */
        .profile-actions {
            display: flex;
            gap: 15px;
            margin-top: 20px;
            flex-wrap: wrap;
        }

        .btn-profile {
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

        .btn-edit {
            background-color: var(--primary-dark);
            color: var(--primary-white);
            border: none;
        }

        .btn-edit:hover {
            background-color: #071a4a;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(10, 36, 99, 0.3);
        }

        .btn-upgrade {
            background-color: var(--accent-red);
            color: var(--primary-white);
            border: none;
        }

        .btn-upgrade:hover {
            background-color: #b82a4e;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(216, 49, 91, 0.3);
        }

        /* Tabs Navigation */
        .profile-tabs {
            margin-bottom: 30px;
        }

        .nav-tabs {
            border-bottom: 2px solid var(--border-light);
        }

        .nav-tabs .nav-link {
            color: var(--text-dark);
            border: none;
            border-bottom: 3px solid transparent;
            border-radius: 0;
            padding: 12px 20px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .nav-tabs .nav-link:hover {
            border-color: transparent;
            color: var(--primary-dark);
        }

        .nav-tabs .nav-link.active {
            background-color: transparent;
            border-color: var(--primary-dark);
            color: var(--primary-dark);
        }

        /* Tab Content */
        .tab-content {
            background-color: var(--card-light);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            border: 1px solid var(--border-light);
        }

        /* Personal Information */
        .info-row {
            display: flex;
            padding: 15px 0;
            border-bottom: 1px solid var(--border-light);
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .info-label {
            width: 200px;
            font-weight: 600;
            color: var(--primary-dark);
        }

        .info-value {
            flex: 1;
            color: var(--text-dark);
        }

        /* Booking History */
        .booking-history {
            overflow-x: auto;
        }

        .booking-table {
            width: 100%;
            border-collapse: collapse;
        }

        .booking-table th {
            background-color: var(--light-bg);
            padding: 15px;
            text-align: left;
            font-weight: 600;
            color: var(--primary-dark);
            border-bottom: 2px solid var(--border-light);
        }

        .booking-table td {
            padding: 15px;
            border-bottom: 1px solid var(--border-light);
            vertical-align: middle;
        }

        .booking-table tr:last-child td {
            border-bottom: none;
        }

        .booking-code {
            font-weight: 600;
            color: var(--primary-dark);
        }

        .booking-status {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .status-confirmed {
            background-color: rgba(40, 167, 69, 0.1);
            color: #28a745;
        }

        .status-pending {
            background-color: rgba(255, 193, 7, 0.1);
            color: #ffc107;
        }

        .status-cancelled {
            background-color: rgba(220, 53, 69, 0.1);
            color: var(--accent-red);
        }

        .status-completed {
            background-color: rgba(10, 36, 99, 0.1);
            color: var(--primary-dark);
        }

        .booking-actions {
            display: flex;
            gap: 10px;
        }

        .btn-action {
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 0.8rem;
            font-weight: 600;
            transition: all 0.3s ease;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .btn-view {
            background-color: var(--primary-dark);
            color: var(--primary-white);
            border: none;
        }

        .btn-view:hover {
            background-color: #071a4a;
        }

        .btn-cancel {
            background-color: transparent;
            color: var(--accent-red);
            border: 1px solid var(--accent-red);
        }

        .btn-cancel:hover {
            background-color: rgba(216, 49, 91, 0.1);
        }

        .btn-review {
            background-color: var(--accent-red);
            color: var(--primary-white);
            border: none;
        }

        .btn-review:hover {
            background-color: #b82a4e;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
        }

        .empty-icon {
            font-size: 4rem;
            color: #dee2e6;
            margin-bottom: 20px;
        }

        .empty-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--primary-dark);
            margin-bottom: 10px;
        }

        .empty-text {
            font-size: 1rem;
            color: #6c757d;
            margin-bottom: 30px;
        }

        /* Member Benefits */
        .benefits-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .benefit-card {
            background-color: var(--light-bg);
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .benefit-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .benefit-icon {
            font-size: 2.5rem;
            color: var(--primary-dark);
            margin-bottom: 15px;
        }

        .benefit-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--primary-dark);
            margin-bottom: 10px;
        }

        .benefit-desc {
            font-size: 0.9rem;
            color: #6c757d;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .profile-header h1 {
                font-size: 2rem;
            }

            .profile-info {
                flex-direction: column;
                text-align: center;
                gap: 20px;
            }

            .profile-stats {
                justify-content: center;
            }

            .info-row {
                flex-direction: column;
                gap: 5px;
            }

            .info-label {
                width: 100%;
            }

            .booking-table {
                font-size: 0.9rem;
            }

            .booking-table th,
            .booking-table td {
                padding: 10px;
            }

            .booking-actions {
                flex-direction: column;
            }
        }
    </style>

@section('container')

    <div class="profile-container py-5">
        <!-- Header -->
        {{-- <div class="profile-header">
            <h1><i class="bi bi-circle-fill me-2" style="color: var(--accent-red);"></i>Billiard Pro</h1>
            <p>Kelola informasi profil dan lihat riwayat pemesanan Anda</p>
        </div> --}}

        <!-- Profile Card -->
        <div class="profile-card">
            <!-- Profile Info -->
            <div class="profile-info">
                <div class="profile-avatar">
                    <img src="{{ asset('file/' . $member->foto) }}" alt="Avatar" class="avatar-img">
                    {{-- <img src="{{ asset('FE/img/avatar.png') }}" alt="Avatar" class="avatar-img"> --}}
                    <div class="avatar-status"></div>
                </div>
                
                <div class="profile-details">
                    <h2 class="profile-name">{{ $member->nama_lengkap }}</h2>
                    <span class="profile-status status-vip">Member </span>
                    
                    <div class="profile-stats">
                        <div class="stat-item">
                            <div class="stat-value">{{ $totalBermain }}</div>
                            <div class="stat-label">Total Booking</div>
                        </div>
                        {{-- <div class="stat-item">
                            <div class="stat-value">48</div>
                            <div class="stat-label">Jam Bermain</div>
                        </div> --}}
                        <div class="stat-item">
                            <div class="stat-value">{{ "Rp " . number_format($totalBermain * 35000, 0, ',', '.') }}</div>
                            <div class="stat-label">Total Pembayaran</div>
                        </div>
                        {{-- <div class="stat-item">
                            <div class="stat-value">85</div>
                            <div class="stat-label">Poin Member</div>
                        </div> --}}
                    </div>
                    
                    {{-- <div class="profile-actions">
                        <a href="#" class="btn-profile btn-edit">
                            <i class="bi bi-pencil-square"></i> Edit Profil
                        </a>
                        <a href="#" class="btn-profile btn-upgrade">
                            <i class="bi bi-star"></i> Upgrade Ke Premium
                        </a>
                    </div> --}}
                </div>
            </div>
        </div>

        <!-- Tabs Navigation -->
        <div class="profile-tabs">
            <ul class="nav nav-tabs" id="profileTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="info-tab" data-bs-toggle="tab" data-bs-target="#info" type="button" role="tab">Informasi Pribadi</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="history-tab" data-bs-toggle="tab" data-bs-target="#history" type="button" role="tab">Riwayat Pemesanan</button>
                </li>
            </ul>
        </div>

        <!-- Tab Content -->
        <div class="tab-content" id="profileTabsContent">
            <!-- Personal Information Tab -->
            <div class="tab-pane fade show active" id="info" role="tabpanel">
                <div class="info-row">
                    <div class="info-label">Nama Lengkap</div>
                    <div class="info-value">{{  $member->nama_lengkap }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Email</div>
                    <div class="info-value">{{ $member->email }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">No. WhatsApp</div>
                    <div class="info-value">{{ $member->no_wa }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Alamat</div>
                    <div class="info-value">{{ $member->alamat }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Tanggal Bergabung</div>
                    <div class="info-value">{{ \Carbon\Carbon::parse($member->created_at)->translatedFormat('d F Y') }}</div>
                </div>
                {{-- <div class="info-row">
                    <div class="info-label">Status Member</div>
                    <div class="info-value">
                        <span class="profile-status status-vip">VIP</span>
                        - Berlaku hingga 15 Januari 2024
                    </div>
                </div> --}}
            </div>

            <!-- Booking History Tab -->
            <div class="tab-pane fade" id="history" role="tabpanel">
                <div class="booking-history">
                    <table class="booking-table">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                {{-- <th>Durasi</th> --}}
                                <th>Meja</th>
                                <th>Harga</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allHistory as $history)
                                <tr>
                                    {{-- <td class="booking-code">#BK001</td> --}}
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{  \Carbon\Carbon::parse($history->tanggal_mulai)->translatedFormat('d F Y') }}</td>
                                    <td>{{  \Carbon\Carbon::parse($history->waktu_mulai)->translatedFormat('H:i') }} - {{  \Carbon\Carbon::parse($history->waktu_akhir)->translatedFormat('H:i') }}</td>
                                    {{-- <td>{{ $history->durasi }} jam</td> --}}

                                    @if ($history->getTable() == 'table1s')
                                        <td>{{ 'Meja 1' }}</td>
                                        
                                    @elseif ($history->getTable() == 'table2s')
                                        <td>{{ 'Meja 2' }}</td>

                                    @elseif ($history->getTable() == 'table3s')
                                        <td>{{ 'Meja 3' }}</td>

                                    @elseif ($history->getTable() == 'table4s')
                                        <td>{{ 'Meja 4' }}</td> 

                                    @elseif ($history->getTable() == 'table5s')
                                        <td>{{ 'Meja 5' }}</td>     
                                    
                                    @elseif ($history->getTable() == 'table6s')
                                        <td>{{ 'Meja 6' }}</td>
                                        
                                    @endif
                                    <td>Rp {{ number_format($history->harga, 0, ',', '.') }}</td>
                                    <td><span class="booking-status status-completed">{{ $history->status_booking }}</span></td>
                                    <td>
                                        <div class="booking-actions">
                                            <a href="{{ asset('file/' . $history->bukti_pembayaran) }}" class="btn-action btn-view">
                                                <i class="bi bi-eye"></i> Pembayaran
                                            </a>
                                        </div>
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