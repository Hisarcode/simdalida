 <!-- Footer -->
 <footer class="footer" style="background-image:url('{{ url('front/img/map.png') }}')">
    <!-- Footer Top -->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Footer About -->
                    <div class="single-widget footer-about widget">
                        <div class="logo">
                            <div class="img-logo">
                                <a class="logo" href="{{ route('home') }}">
                                    <img class="img-responsive" src="{{ url('front/img/logo-sgu.png') }}" width="60" alt="logo">
                                </a>
                            </div>
                        </div>
                        <div class="footer-widget-about-description">
                            <p>Pemerintah Kabupaten Sanggau</p>
                        </div>
                        <div class="social">
                            <!-- Social Icons -->
                            <ul class="social-icons">
                                <li><a class="youtube" href="#" target="_blank"><i
                                            class="fa fa-youtube"></i></a></li>
                                <li><a class="  " href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li><a class="whatsapp" href="#" target="_blank"><i
                                            class="fa fa-whatsapp"></i></a></li>
                                <li><a class="facebook" href="#" target="_blank"><i
                                            class="fa fa-facebook"></i></a></li>
                                <li><a class="instagram" href="#" target="_blank"><i
                                            class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                        <div class="button"><a href="{{ route('about') }}" class="bizwheel-btn">Tentang Kami</a></div>
                    </div>
                    <!--/ End Footer About -->
                </div>
                <div class="col-lg-2 col-md-6 col-12">

                </div>
                <div class="col-lg-4 col-md-6 col-12">

                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Footer Contact -->
                    <div class="single-widget footer_contact widget">
                        <h3 class="widget-title">Kontak</h3>
                        <p>Pemerintah Kabupaten Sanggau</p>
                        <ul class="address-widget-list">
                            <li class="footer-mobile-number"><i class="fa fa-phone"></i>0822-5555-1111</li>
                            <li class="footer-mobile-number"><i class="fa fa-envelope"></i>info@sanggau.com
                            </li>
                            <li class="footer-mobile-number"><i class="fa fa-map-marker"></i>Jalan Sanggau</li>
                        </ul>
                    </div>
                    <!--/ End Footer Contact -->
                </div>
            </div>

        </div>
    </div>
    <!-- Copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="copyright-content">
                        <!-- Copyright Text -->
                        <p>© Copyright <a href="{{ route('home') }}">Kabupaten Sanggau</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Copyright -->
</footer>