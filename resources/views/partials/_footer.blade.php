<!-- Footer -->
<footer class="footer-wrapper footer-dark">
    <div class="footer-main">
        <div class="container">
            <div class="row">
                <!-- About Column -->
                <div class="col-md-4 col-sm-6 mb30">
                    <div class="footer-brand">
                        <img src="{{ asset('harjota_logo.svg') }}" alt="Harjota" class="footer-logo" style="width: 140px; height: auto; margin-bottom: 20px;">
                    </div>
                    <p class="footer-desc">Your partner for building systems that think, adapt, and endure.</p>
                    <div class="footer-socials">
                        <a href="https://www.instagram.com/harjota.tech/" target="_blank"><i class="fa fa-instagram"></i></a>
                        <a href="https://web.facebook.com/harjota.tech" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="https://www.linkedin.com/company/110416131/" target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="col-md-2 col-sm-6 mb30">
                    <h4 class="footer-heading">Quick Links</h4>
                    <ul class="footer-links">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('about') }}">About</a></li>
                        <li><a href="{{ route('services') }}">Services</a></li>
                        <li><a href="{{ route('products') }}">Products</a></li>
                        <li><a href="{{ route('insights') }}">Insights</a></li>
                    </ul>
                </div>

                <!-- Services -->
                <div class="col-md-3 col-sm-6 mb30">
                    <h4 class="footer-heading">Services</h4>
                    <ul class="footer-links">
                        <li><a href="{{ route('services') }}">Institutional Audit</a></li>
                        <li><a href="{{ route('services') }}">Systems Architecture</a></li>
                        <li><a href="{{ route('services') }}">Digital Infrastructure</a></li>
                        <li><a href="{{ route('services') }}">BI & AI Enablement</a></li>
                        <li><a href="{{ route('services') }}">Advisory Services</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div class="col-md-3 col-sm-6 mb30">
                    <h4 class="footer-heading">Contact Us</h4>
                    <ul class="footer-contact">
                        <li>
                            <i class="fa fa-map-marker"></i>
                            <span>Vibranium Valley, Concord,<br>Ikeja, Lagos, Nigeria</span>
                        </li>
                        <li>
                            <i class="fa fa-phone"></i>
                            <span>+234 906 757 4115</span>
                        </li>
                        <li>
                            <i class="fa fa-envelope"></i>
                            <span>info@harjota.com</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <p class="copyright">&copy; {{ date('Y') }} Harjota. All rights reserved.</p>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <p class="footer-tagline">Institutional Intelligence Partner</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
.footer-wrapper.footer-dark {
    background: #1a1a1a;
    color: #b0b0b0;
}

.footer-main {
    padding: 60px 0 40px;
}

.footer-heading {
    color: #fff;
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 25px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.footer-desc {
    font-size: 14px;
    line-height: 1.7;
    margin-bottom: 25px;
}

.footer-socials {
    display: flex;
    gap: 12px;
}

.footer-socials a {
    width: 38px;
    height: 38px;
    border: 1px solid #444;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #b0b0b0;
    transition: all 0.3s ease;
}

.footer-socials a:hover {
    background: #DAA520;
    border-color: #DAA520;
    color: #fff;
}

.footer-links {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-links li {
    margin-bottom: 12px;
}

.footer-links li a {
    color: #b0b0b0;
    font-size: 14px;
    transition: color 0.3s;
    text-decoration: none;
}

.footer-links li a:hover {
    color: #DAA520;
}

.footer-contact {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-contact li {
    display: flex;
    gap: 12px;
    margin-bottom: 15px;
    font-size: 14px;
}

.footer-contact li i {
    color: #DAA520;
    margin-top: 3px;
}

.footer-bottom {
    background: #111;
    padding: 20px 0;
    border-top: 1px solid #333;
}

.footer-bottom .copyright,
.footer-bottom .footer-tagline {
    margin: 0;
    font-size: 13px;
    color: #888;
}

@media (max-width: 768px) {
    .footer-bottom .text-right {
        text-align: left !important;
        margin-top: 10px;
    }
}
</style>
