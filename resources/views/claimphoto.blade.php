@php($title = 'Claim Photo | Bumantara Studio')

@push('styles')
<link href="{{ asset('assets/css/claim.css') }}" rel="stylesheet">
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

                    <button type="submit" class="submit-btn">
                        Cari Transaksi
                    </button>
                </form>
            </div>
        </div>

        <!-- cloud harus DI DALAM claim-page -->
        <div class="clouds"></div>

    </div>
</x-layout>

