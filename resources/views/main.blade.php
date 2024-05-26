<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/atiga-xicon.png') }}">
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!-- Feather Icon -->
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

    <title>Atiga Digital Printing</title>
</head>

<body>
    @include('includes.preloader')

    <!-- NavBar -->
    @include('includes.navbar')
    <!-- End Navbar -->

    <!-- Banner -->
    <section class="banner vh-100">
        <div class="content h-100">
            <div id="MyCarousel" class="carousel slide h-100 carousel-hero" data-bs-ride="carousel">
                <div class="carousel-indicators mb-0">
                    <button type="button" data-bs-target="#MyCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#MyCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#MyCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>

                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 py-5 left-slide">
                                    <h1>Banner Kustom dengan Hasil Cetak Berkualitas Tinggi.</h1>
                                    <p>Kami menyediakan banner kustom berkualitas tinggi yang cocok untuk semua kebutuhan. Apakah Anda seorang pemilik bisnis yang ingin mempromosikan usaha Anda atau perlu banner untuk acara anda. Tunggu apa lagi, ayo pesan sekarang!</p>
                                    <div class="banner-btn mt-5">
                                        <a href="{{ url('product-page?kategori=Banner') }}">Pesan Sekarang</a>
                                    </div>
                                </div>
                                <div class="col-lg-6 d-flex justify-content-center right-slide">
                                    <img src="{{ asset('assets/img/illust/illust3.webp') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Add other carousel items similarly -->
                </div>
                <button class="carousel-control-prev justify-content-start" type="button" data-bs-target="#MyCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next justify-content-end" type="button" data-bs-target="#MyCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
    <!-- end banner -->

    <section class="info h-100">
        <div class="container text-center pt-5">
            <div class="row">
                <div class="col-lg-4 px-4">
                    <i data-feather="thumbs-up"></i>
                    <h4>Kualitas Tinggi</h4>
                    <p>Kami menjamin hasil cetak berkualitas tinggi dengan menggunakan peralatan terkini dan bahan terbaik.</p>
                </div>
                <div class="col-lg-4 px-4">
                    <i data-feather="truck"></i>
                    <h4>Pengiriman Cepat</h4>
                    <p>Layanan pengiriman cepat untuk memastikan produk Anda tiba tepat waktu.</p>
                </div>
                <div class="col-lg-4 px-4">
                    <i data-feather="credit-card"></i>
                    <h4>Harga Terjangkau</h4>
                    <p>Kami menawarkan harga yang kompetitif untuk semua produk kami tanpa mengorbankan kualitas.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Product -->
    <section class="product h-100">
        <div class="container text-center mt-5 pb-2">
            <div class="title d-flex justify-content-between">
                <h1>Produk Kami</h1>
                <span class="pt-3"><a href="{{ url('product-page') }}">Lihat semua ></a></span>
            </div>
            <div class="row">
                @foreach (getProductByCategory('Banner') as $data)
                    <div class="col-lg-4 col-md-12 mb-4 right-slide">
                        <div class="card">
                            <div class="card-image">
                                <img src="{{ asset('assets/img/product-images/' . $data['image']) }}" class="w-100" />
                            </div>
                            <div class="card-body">
                                <a href="{{ url('product-detail?name=' . urlencode($data['product_name'])) }}">
                                    <h3 class="card-title mb-3">{{ $data['product_name'] }}</h3>
                                </a>
                                <a href="{{ url('product-page?kategori=' . $data['category_name']) }}">
                                    <p>{{ $data['category_name'] }}</p>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- PAYMENT INFO -->
    <div class="mt-3 mb-5 text-center">
        <div class="container pt-4" style="border-top: 1px solid #ddd;">
            <div class="d-flex">
                <img src="{{ asset('assets/img/illust/cod.png') }}" alt="cod" style="width: 500px; height: 500px;" class="cod left-slide">
                <div class="desc-cod ms-4">
                    <h2 class="fw-bold mb-3">Pembayaran mudah dengan system COD</h2>
                    <p>Anda hanya tinggal siapkan jumlah pembayaran yang mencukupi lalu bayarkan ke kurir.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('includes.footer')

    <!-- JS -->
    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/functions.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script>
        feather.replace()
    </script>

</body>

</html>
