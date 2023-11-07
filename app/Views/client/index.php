<?= $this->extend('client/layout/template') ?>
<?= $this->section('content') ?>

<!-- ======= Hero Section ======= -->
<section id="hero" class="hero">

    <div class="info d-flex align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <h2 data-aos="fade-down"><span>Alee Sewa Motor Tegal</span></h2>
                    <p data-aos="fade-up">Mari berkeliling ke tujuan Anda dengan nyaman dan terpercaya bersama Sewa Motor Ale. Berdiri Sejak 2018</p>
                    <a data-aos="fade-up" data-aos-delay="200" href="#katalog" class="btn-get-started">Sewa Sekarang</a>
                </div>
            </div>
        </div>
    </div>

    <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-item active" style="background-image: url(<?= base_url('\assets'); ?>/img/pp2.jpg)">
        </div>
        <div class="carousel-item" style="background-image: url(<?= base_url('\assets'); ?>/img/pp2.jpg)"></div>
        <div class="carousel-item" style="background-image: url(<?= base_url('\assets'); ?>/img/pp2.jpg)"></div>


        <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

    </div>

</section><!-- End Hero Section -->

<main id="main">
    <!-- ======= Alt Services Section ======= -->
    <section id="alt-services" class="alt-services">
        <div class="container" data-aos="fade-up">

            <div class="row justify-content-around gy-4">
                <div class="col-lg-6 img-bg" style="background-image: url(<?= base_url('\assets'); ?>/img/pp2.jpg);" data-aos="zoom-in" data-aos-delay="100"></div>

                <div class="col-lg-5 d-flex flex-column justify-content-center">
                    <h3>Tentang Kami</h3>
                    <p>Penyewaan sepeda motor di Tegal dengan harga yang sangat terjangkau dan pelayanan terbaik...
                        Berdiri di kota Cirebon tahun 2014 dengan total armada yang di miliki mencapai lebih dari 56 motor...
                        Setelah sukses di kota Cirebon, Ale Sewa Motor ekspansi ke Tegal..

                    </p>

                    <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="100">
                        <i class="bi bi-easel flex-shrink-0"></i>
                        <div>
                            <h4><a href="" class="stretched-link">Pelayanan</a></h4>
                            <p>Kami melayani penyewaan motor secara Harian, Mingguan, atau Bulanan</p>
                        </div>
                    </div><!-- End Icon Box -->

                    <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="200">
                        <i class="bi bi-patch-check flex-shrink-0"></i>
                        <div>
                            <h4><a href="" class="stretched-link">Fasilitas</a></h4>
                            <p> Anda akan mendapatkan fasilitas :
                                - 2 Helm SNI
                                - Jas Hujan
                                - Masker
                                - Melayani antar jemput unit di Stasiun, Terminal, atau Hotel sekitar kota Tegal.</p>
                        </div>
                    </div><!-- End Icon Box -->

                    <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="200">
                        <i class="bi bi-clock flex-shrink-0"></i>
                        <div>
                            <h4><a href="" class="stretched-link">Jam Kerja</a></h4>
                            <p>Pukul 06:00 s.d 18:00.</p>
                        </div>
                    </div><!-- End Icon Box -->

                </div>
            </div>

        </div>
    </section><!-- End Alt Services Section -->



    <!-- ======= Our katalog Section ======= -->
    <section id="katalog" class="katalog section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Katalog Motor</h2>
                <p>Temukan berbagai pilihan motor terbaik untuk kebutuhan Anda. Dari motor sport yang bertenaga hingga motor matic yang praktis, kami menyediakan berbagai jenis motor dengan performa dan kenyamanan terbaik</p>
            </div>

            <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order">

                <ul class="portfolio-flters" data-aos="fade-up" data-aos-delay="100">
                    <li data-filter="*" class="filter-active">All</li>
                    <li data-filter=".filter-Gigi">Gigi</li>
                    <li data-filter=".filter-Kopling">Kopling</li>
                    <li data-filter=".filter-Matic">Matic</li>
                    <!-- <li data-filter=".filter-design">Revo</li> -->
                </ul><!-- End katalog Filters -->

                <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                    <?php foreach ($katalog as $k) : ?>
                        <div class="col-lg-3 col-md-6 portfolio-item filter-<?= $k['jenis']; ?> ">
                            <div class="portfolio-content h-100">
                                <img src="<?= base_url('/img'); ?>/cover/<?= $k['sampul']; ?>" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <h4><?= $k['judul']; ?></h4>
                                    <p><?= $k['cc']; ?> CC</p>
                                </div>
                            </div>
                            <a href="<?= base_url('/img'); ?>/cover/<?= $k['sampul']; ?>" title="<?= $k['judul']; ?>" data-gallery="portfolio-gallery-remodeling" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            <a href="/detail/<?= $k['id']; ?>" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i>Detail</a>

                        </div><!-- End katalog Item -->
                    <?php endforeach; ?>
                </div><!-- End katalog Container -->
                <?= $pager->links('default', 'pagination') ?>
            </div>
        </div>
    </section><!-- End Our katalog Section -->

    <section id="galeri" class="galeri">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Galeri</h2>
                <p>Momen-momen bahagia pelanggan yang telah menggunakan layanan kami. Lihatlah galeri ini untuk mendapatkan gambaran tentang pengalaman menyenangkan yang bisa Anda rasakan dengan menggunakan layanan kami. Bergabunglah dengan ribuan pelanggan puas dan nikmati liburan yang tak terlupakan dengan Ale Rental Motor!</p>
            </div>

            <div class="row gy-4">

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card-item">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card-bg" style="background-image: url(<?= base_url('/assets'); ?>/img/galeri/galeri1.jpg);"></div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Card Item -->

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card-item">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card-bg" style="background-image: url(<?= base_url('/assets'); ?>/img/galeri/galeri2.jpg);"></div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Card Item -->

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card-item">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card-bg" style="background-image: url(<?= base_url('/assets'); ?>/img/galeri/galeri3.jpg);"></div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Card Item -->
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card-item">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card-bg" style="background-image: url(<?= base_url('/assets'); ?>/img/galeri/galeri7.jpg);"></div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Card Item -->
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card-item">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card-bg" style="background-image: url(<?= base_url('/assets'); ?>/img/galeri/galeri6.jpg);"></div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Card Item -->

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="card-item">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card-bg" style="background-image: url(<?= base_url('/assets'); ?>/img/galeri/galeri4.jpg);"></div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Card Item -->

            </div>

        </div>
    </section><!-- End galeri Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg ">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Ulasan</h2>
                <p>Kata-kata mereka adalah bukti kepuasan dan kepercayaan mereka terhadap layanan kami. Bacalah testimonial dari pelanggan setia kami yang telah merasakan manfaat dari menggunakan layanan kami.</p>
            </div>

            <div class="slides-2 swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($reviews as $k) : ?>
                        <?php $rating = $k['bintang']; ?>
                        <?php $jumlahBintang = floor($rating); ?>
                        <div class="swiper-slide">
                            <div class="testimonial-wrap">
                                <div class="testimonial-item">
                                    <img src="<?= base_url('/img'); ?>/pp.jpeg" class="testimonial-img" alt="">
                                    <h3><?= $k['nama_client']; ?></h3>
                                    <h4>Pelanggan</h4>
                                    <div class="stars">
                                        <?php for ($i = 0; $i < $jumlahBintang; $i++) :  ?>
                                            <i class="bi bi-star-fill"></i>
                                        <?php endfor; ?>
                                    </div>
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        <?= $k['pesan']; ?>
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->
                    <?php endforeach; ?>
                </div>
                <div class="swiper-pagination"></div>
                <div class="tulisUlasan">
                    <ul>
                        <li><a href="https://www.google.com/search?hl=id-ID&gl=id&q=ALE+SEWA+MOTOR+TEGAL+(SINCE+2018),+Jl.+Pala+IV+Timur+No.4,+Sibata,+Mejasem+Bar.,+Kec.+Kramat,+Kabupaten+Tegal,+Jawa+Tengah+52181&ludocid=476270624191748441&lsig=AB86z5U9yAMRSsOnkruHswAq2ym_#lrd=0x2e6fb9ec42847373:0x69c0d9bfbe71959,3" class="text-primary">Tulis Ulasan</a></li>
                        <li><a href="https://www.google.com/search?hl=id-ID&gl=id&q=ALE+SEWA+MOTOR+TEGAL+(SINCE+2018),+Jl.+Pala+IV+Timur+No.4,+Sibata,+Mejasem+Bar.,+Kec.+Kramat,+Kabupaten+Tegal,+Jawa+Tengah+52181&ludocid=476270624191748441&lsig=AB86z5U9yAMRSsOnkruHswAq2ym_#lrd=0x2e6fb9ec42847373:0x69c0d9bfbe71959,1,,,," class="text-primary">Baca Selengkapnya </a></li>
                    </ul>
                </div>
            </div>

        </div>
    </section><!-- End Testimonials Section -->
    <section class="">
        <div class="container" style="height: 50px;"></div>
    </section>

    <section id="contact" class="contact section-bg">
        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="section-header">
                <h2>Hubungi Kami</h2>
            </div>
            <div class="row gy-4">
                <div class="col-lg-6">
                    <div class="info-item  d-flex flex-column justify-content-center align-items-center">
                        <a href="https://goo.gl/maps/iSaruZqkPpq37ncc6" class="d-flex align-items-center justify-content-center"><i class="bi bi-map"></i></a>
                        <h3>Alamat Kami</h3>
                        <p>Jalan Pala IV Timur No.4, Mejasem Barat, Kecamatan Kramat, Tegal, Jawa Tengah 52181</p>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="info-item d-flex flex-column justify-content-center align-items-center">
                        <a href="https://www.instagram.com/sewamotor_tegal" class="d-flex align-items-center justify-content-center"><i class="bi bi-instagram"></i></a>
                        <h3>Instagram Kami</h3>
                        <p>@sewamotor_tegal</p>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="info-item  d-flex flex-column justify-content-center align-items-center">
                        <a href="https://api.whatsapp.com/send?phone=6281359164634&text=Hallo%20admin%2C%20saya%20ingin%20menyewa%20motor">
                            <i class="bi bi-telephone"></i>
                        </a>
                        </i>
                        <h3>Hubungi Kami</h3>
                        <p>0813-5916-4634</p>
                    </div>
                </div><!-- End Info Item -->

            </div>

            <div class="row gy-4 mt-1">

                <div class="col-lg-12 ">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1980.5484981258676!2d109.1546653!3d-6.878981974846748!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6fb9ec42847373%3A0x69c0d9bfbe71959!2sALE%20SEWA%20MOTOR%20TEGAL%20(SINCE%202018)!5e0!3m2!1sen!2sid!4v1688238193311!5m2!1sen!2sid" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
                </div><!-- End Google Maps -->

                <!-- <div class="col-lg-6">
                    <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                        <div class="row gy-4">
                            <div class="col-lg-6 form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                            </div>
                            <div class="col-lg-6 form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center"><button type="submit">Send Message</button></div>
                    </form> -->
            </div><!-- End Contact Form -->

        </div>

        </div>
    </section><!-- End Contact Section -->


</main>


<?= $this->endSection() ?>