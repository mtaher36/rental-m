<?= $this->extend('client/layout/templateDetails') ?>
<?= $this->section('content') ?>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('<?= base_url('/assets'); ?>/img/pp2.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

            <h2>Katalog Details</h2>
            <ol>
                <li><a href="/">Home</a></li>
                <li>Katalog Details</li>
            </ol>

        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Projet Details Section ======= -->
    <section id="katalog-details" class="katalog-details">
        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="position-relative h-100">
                <div class="slides-1 portfolio-details-slider swiper">
                    <div class="swiper-wrapper align-items-center">

                        <div class="swiper-slide">
                            <img src="<?= base_url('/img'); ?>/cover/<?= $katalog['sampul'] ?>" alt="">
                        </div>

                        <div class="swiper-slide">
                            <img src="<?= base_url('/img'); ?>/cover/<?= $katalog['sampul'] ?>" alt="">
                        </div>

                        <div class="swiper-slide">
                            <img src="<?= base_url('/img'); ?>/cover/<?= $katalog['sampul'] ?>" alt="">
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>

            </div>

            <div class="row details justify-content-between gy-4 mt-4">

                <div class="col-lg-8">
                    <div class="portfolio-description">
                        <h2><?= $katalog['judul']; ?></h2>
                        <p>
                            Fasilitas:
                        </p>
                        <ul>
                            <li>2 Helm SNI</li>
                            <li>Jas Hujan</li>
                            <li>Masker</li>
                            <li>Melayani antar jemput unit di Stasiun, Terminal, atau Hotel sekitar kota Tegal</li>
                        </ul>

                        <div class="testimonial-item">
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                <?= $randomName; ?>
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                            <div>
                                <img src="<?= base_url('/img'); ?>/pp.jpeg" class="testimonial-img" alt="">
                                <h3><?= $randomMessage ?></h3>
                                <h4>Pelanggan Setia</h4>
                            </div>
                        </div>


                    </div>

                </div>
                <div class="col-lg-3">
                    <div class="portfolio-info">
                        <h3>Sewa Sekarang</h3>
                        <ul>
                            <li><strong>Jenis Motor</strong> <span><?= $katalog['jenis']; ?></span></li>
                            <li><strong>CC</strong> <span><?= $katalog['cc']; ?> CC</span></li>
                            <li><strong>Harga</strong> <span>120.000 - 300.000 </span></li>
                            <li>
                                <a href="https://api.whatsapp.com/send?phone=6281359164634&text=Hallo%20admin%2C%20saya%20ingin%20menyewa%20motor" class="btn-visit align-self-start">
                                    <i class="bi bi-whatsapp"></i>WhatsApp
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
                <h3>Sewa Motor Lainnya</h3>
                <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order">
                    <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                        <?php
                        // Mendapatkan 4 indeks acak dari array
                        $randomIndexes = array_rand($list, 4);

                        // Menampilkan item-item dengan indeks acak
                        foreach ($randomIndexes as $index) :
                            $k = $list[$index];

                            if ($k['id'] !== $katalog['id']) :
                        ?>
                                <div class="col-lg-3 col-md-6 portfolio-item">
                                    <div class="portfolio-content h-100">
                                        <img src="<?= base_url('/img'); ?>/cover/<?= $k['sampul']; ?>" class="img-fluid" alt="">
                                        <div class="portfolio-info">
                                            <h4><?= $k['judul']; ?></h4>
                                            <p><?= $k['cc']; ?> CC</p>

                                        </div>
                                    </div>
                                    <a href="<?= base_url('/img'); ?>/cover/<?= $k['sampul']; ?>" title="<?= $k['judul']; ?>" data-gallery="portfolio-gallery-remodeling" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                    <a href="/detail/<?= $k['id']; ?>" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i>Detail</a>
                                </div><!-- End katalogs Item -->
                        <?php
                            endif;
                        endforeach;
                        ?>
                    </div><!-- End katalogs Container -->
                </div>

            </div>
        </div>
    </section><!-- End Projet Details Section -->

</main><!-- End #main -->
<?= $this->endSection() ?>