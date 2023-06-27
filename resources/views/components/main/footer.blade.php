<footer class="dark-wrapper inverse-text">
    <div class="container inner">
        <div class="row">
            <div class="col-md-12 col-lg-3 text-center text-lg-left">
                <div class="widget"><img src="#"
                                         srcset="style/images/logo-light.png 1x, style/images/logo-light@2x.png 2x"
                                         alt=""/>
                    <div class="space20"></div>
                    <p>Snowlake is a multi-concept and powerful site template contains rich layouts with possibility
                        of unlimited combinations & beautiful elements.</p>
                </div>
                <form action="{{route('contacts.store')}}" method="post" class="fields-white">
                    @csrf
                    <label for="" style="color: aliceblue">Subscribe</label>
                    <div class="form-group">
                        <input name="email" type="email" class="form-control" required>
                    </div>
                </form>
                <!-- /.widget -->
            </div>
            <!-- /column -->
            <div class="space30 d-lg-none d-xl-none"></div>
            <div class="col-6 col-md-3 col-lg-2 offset-lg-1">
                <div class="widget">
                    <h5 class="widget-title">Need Help?</h5>
                    <ul class="list-unstyled mb-0">
                        <li><a href="#">Support</a></li>
                        <li><a href="#">Get Started</a></li>
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
                <!-- /.widget -->
            </div>
            <!-- /column -->
            <div class="col-6 col-md-3 col-lg-2">
                <div class="widget">
                    <h5 class="widget-title">Learn More</h5>
                    <ul class="list-unstyled mb-0">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Our Story</a></li>
                        <li><a href="#">Projects</a></li>
                        <li><a href="#">Pricing</a></li>
                        <li><a href="#">Features</a></li>
                    </ul>
                </div>
                <!-- /.widget -->
            </div>
            <!-- /column -->
            <div class="col-6 col-md-3 col-lg-2">
                <div class="widget">
                    <h5 class="widget-title">Company</h5>
                    <ul class="list-unstyled mb-0">
                        <li><a href="#">Our Team</a></li>
                        <li><a href="#">Strategy</a></li>
                        <li><a href="#">Service</a></li>
                        <li><a href="#">Mission</a></li>
                        <li><a href="#">Process</a></li>
                    </ul>
                </div>
                <!-- /.widget -->
            </div>
            <!-- /column -->
            <div class="col-6 col-md-3 col-lg-2">
                <div class="widget">
                    <h5 class="widget-title">Contact</h5>
                    <address> Moonshine St. 14/05 Light City, London</address>
                    <a href="mailto:first.last@email.com">info@email.com</a><br/> +00 (123) 456 78 90
                </div>
                <!-- /.widget -->
            </div>
            <!-- /column -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
    <div class="container inner pt-0 pb-40 d-flex align-items-center">
        <p class="mb-0 mr-auto">© 2020 Snowlake. All rights reserved.</p>
        <ul class="social social-mute social-s ml-auto">
            <li><a href="#"><i class="jam jam-twitter"></i></a></li>
            <li><a href="{{$settings?->facebook}}"><i class="jam jam-facebook"></i></a></li>
            <li><a href="{{$settings?->instagram}}"><i class="jam jam-instagram"></i></a></li>
            <li><a href="#"><i class="jam jam-vimeo"></i></a></li>
            <li><a href="#"><i class="jam jam-youtube"></i></a></li>
        </ul>
    </div>
</footer>
