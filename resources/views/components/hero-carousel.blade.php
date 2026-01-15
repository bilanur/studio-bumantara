@if($carousels->count())
<div class="hero-carousel">
    @foreach($carousels as $index => $carousel)
    <div class="hero-slide {{ $index === 0 ? 'active' : '' }}"
        style="background-image: url('{{ asset('storage/'.$carousel->image) }}')">
        <div class="hero-content">
            <div class="hero-text">
                @if($carousel->title)
                <h1>{{ $carousel->title }}</h1>
                @endif
            </div>
        </div>
    </div>
    @endforeach

    <button class="carousel-nav prev" onclick="changeSlide(-1)">‹</button>
    <button class="carousel-nav next" onclick="changeSlide(1)">›</button>

    <div class="carousel-indicators">
        @foreach($carousels as $i => $c)
        <div class="indicator {{ $i === 0 ? 'active' : '' }}"
            onclick="goToSlide({{ $i }})"></div>
        @endforeach
    </div>
</div>
@endif