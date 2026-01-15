@php($title = 'Booking4 | Bumantara Studio')

@push('styles')
<link href="{{ asset('assets/css/booking4.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('assets/js/booking4.js') }}" defer></script>
@endpush

<x-layout>    

    <div class="container">
        <div class="info-box">
            <p class="info-text">Silahkan lakukan transfer sesuai dengan data keterangan dengan transfer</p>
        </div>

        <div class="card">
            <h2 class="card-title">Informasi Pembayaran</h2>
            
            <div class="info-row">
                <div class="info-label">Status</div>
                <div class="info-value">pending</div>
            </div>

            <div class="va-number-row">
                <div class="va-info">
                    <div class="info-label">No VA</div>
                    <div class="info-value">000000000000000000000</div>
                </div>
                <button class="copy-btn" onclick="copyVA()">Salin</button>
            </div>

            <div class="info-row">
                <div class="info-label">Total Pembayaran</div>
                <div class="info-value">200.000</div>
            </div>

            <div class="info-row">
                <div class="info-label">no transaksi</div>
                <div class="info-value">88120890120898</div>
            </div>
        </div>

        <div class="card">
            <h2 class="card-title">Kirim bukti pembayaran</h2>
            
            <div class="upload-area" onclick="document.getElementById('fileInput').click()">
                <p class="upload-text">insert & letakkan file di sini...</p>
            </div>
            
            <div class="button-group">
                <label class="btn btn-upload">
                    <span>📎</span>
                    <span>Tambahkan file</span>
                    <input type="file" id="fileInput" accept="image/*,.pdf" onchange="handleFileSelect(event)">
                </label>
                <button class="btn btn-send" onclick="sendProof()">Kirim</button>
            </div>
        </div>
    </div>

    <!-- Modal Success/Error -->
    <div id="customModal" class="custom-modal">
        <div class="modal-content">
            <div class="modal-icon" id="modalIcon">
                <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                    <circle class="checkmark-circle" cx="26" cy="26" r="25" fill="none"/>
                    <path class="checkmark-check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                </svg>
            </div>
            <h2 class="modal-title" id="modalTitle">Berhasil!</h2>
            <p class="modal-message" id="modalMessage">Produk berhasil diupdate!</p>
        </div>
    </div>

</x-layout>