@section('title', 'Home')

<main class="main-container">
    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="/home" title="Home">Home</a></li>
            <span class="slash">/</span>
            {{-- <li class="item-link"><span>Home</span></li> --}}
        </ul>
    </div>
    <section class="home" id="home">
      <div class="row">
        <div class="content">
          <h3>Upto 75% off</h3>
          <p>Bumili sa pinakamasarap at pinakamurang Bakeshop sa Pilipinas, maraming iba't ibang pagpipilian at patok sa inyong panlasa!</p>
          <a href="/shop" class="btn">Shop now</a>
        </div>

        <div class="swiper swiper-container">
          <h2>BEST SELLING</h2>
          <div class="swiper-wrapper">
              @foreach ($bsproducts as $bsproduct)
              <div class="swiper-slide card">
                <div class="thumbnail">
                    <span><img src="{{ asset('assets/img/stocks') }}/{{ $bsproduct->image }}" alt=""></span>
                </div>
                <span class="title-container">
                    <h3>{{ $bsproduct->name }}</h3>
                </span>
                <div class="price">₱{{ $bsproduct->regular_price }}</div>
              </div>
              @endforeach
          </div>
        </div>
      </div>
    </section>
</main>
