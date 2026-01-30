@php($title = 'Claim Photo | Bumantara Studio')

@push('styles')
<link href="{{ asset('assets/css/claim.css') }}" rel="stylesheet">
<style>
    /* Force Poppins font untuk navbar dan footer */
    header,
    header *,
    nav,
    nav *,
    .logo,
    .logo *,
    .nav-links,
    .nav-links *,
    .nav-right,
    .nav-right *,
    .masuk-btn,
    .masuk-btn-outline,
    .profile-trigger,
    .profile-dropdown,
    .profile-dropdown *,
    footer,
    footer *,
    .footer,
    .footer *,
    .footer-section,
    .footer-section *,
    .copyright {
        font-family: 'Poppins', sans-serif !important;
    }

    .alert {
        padding: 1rem;
        border-radius: 8px;
        margin-bottom: 1.5rem;
        font-size: 0.95rem;
    }
    .alert-danger {
        background-color: #fee;
        border: 1px solid #fcc;
        color: #c33;
    }
    .text-danger {
        color: #c33;
        font-size: 0.85rem;
        margin-top: 0.25rem;
        display: block;
    }
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
        border: none !important;
        cursor: pointer !important;
        transition: all 0.3s ease !important;
    }
    .payment-btn:hover {
        transform: translateY(-2px) !important;
        box-shadow: 0 6px 18px rgba(108, 92, 231, 0.45) !important;
    }
    .payment-btn:active {
        transform: translateY(0) !important;
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
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form id="searchForm" action="{{ route('claim.search') }}" method="POST">
                    @csrf
                    
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input 
                            type="email" 
                            name="email"
                            class="form-input" 
                            placeholder="contoh : email@domain.com"
                            value="{{ old('email') }}"
                            required
                        >
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">No Telepon</label>
                        <input 
                            type="text" 
                            name="phone"
                            class="form-input" 
                            placeholder="contoh : 089745677889"
                            value="{{ old('phone') }}"
                            required
                        >
                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="payment-btn">
                        Cari Transaksi
                    </button>
                </form>
            </div>
        </div>

        <div class="clouds"></div>
    </div>
</x-layout>