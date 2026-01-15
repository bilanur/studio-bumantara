@php($title = 'Claim Photo | Bumantara Studio')

@push('styles')
<link href="{{ asset('assets/css/claim.css') }}" rel="stylesheet">
@push('styles')
<link href="{{ asset('assets/css/claim.css') }}" rel="stylesheet">
<style>
    .payment-btn {
        display: block !important;
        width: 100% !important;
        margin-top: 1rem !important;
        background: linear-gradient(135deg, #6c5ce7 0%, #a29bfe 100%) !important;
        color: #ffffff !important;
        padding: 0.9rem !important;
        border-radius: 8px !important;
        font-size: 0.95rem !important;
        font-weight: 600 !important;
        text-align: center !important;
        text-decoration: none !important;
        box-shadow: 0 4px 14px rgba(108, 92, 231, 0.35) !important;
        font-family: 'Poppins', sans-serif !important;
    }
    .payment-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 18px rgba(108, 92, 231, 0.45);
    }
</style>
@endpush

@push('scripts')
<script src="{{ asset('assets/js/claim.js') }}" defer></script>
@endpush

<x-layout>
    <div class="claim-page">

        <div class="container">
            <div class="page-title">
                <h1>Cari Transaksi</h1>
            </div>

            <div class="search-card">
                <form id="searchForm">
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input 
                            type="email" 
                            class="form-input" 
                            placeholder="contoh : email@domain.com"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label class="form-label">No Transaksi</label>
                        <input 
                            type="text" 
                            class="form-input" 
                            placeholder="contoh : xxxXXXxxxx"
                            required
                        >
                    </div>

                    {{-- <button type="submit" class="submit-btn">
                        Cari Transaksi
                    </button> --}}
                   <a href="{{ route('claim2') }}" class="payment-btn">Cari Transaksi</a>
                </form>
            </div>
        </div>

        <!-- cloud harus DI DALAM claim-page -->
        <div class="clouds"></div>

    </div>
</x-layout>

