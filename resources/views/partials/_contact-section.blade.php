<!-- Contact Intro -->
<section class="section-bg mt0">
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2 text-center">
                <p class="text-4 mb0">Ready to bring clarity to your organization? Get in touch through any of the channels below.</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Options -->
<section class="section mt40 page-contact">
    <div class="container">
        <!-- Multi-Channel Options -->
        <div class="row mb50">
            <div class="col-md-4 col-sm-12 mb30">
                <div class="contact-option-box featured-option">
                    <span class="free-tag">FREE</span>
                    <div class="contact-option-icon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <h4>Free Consultation</h4>
                    <p>Book a free 30-minute discovery call</p>
                    <a href="javascript:void(0)" onclick="openCalendly()" class="btn btn-primary">Book Free Call</a>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 mb30">
                <div class="contact-option-box">
                    <div class="contact-option-icon">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <h4>Email Us</h4>
                    <p>Response within 24 hours</p>
                    <a href="mailto:info@harjota.com" class="btn btn-default">info@harjota.com</a>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 mb30">
                <div class="contact-option-box">
                    <div class="contact-option-icon">
                        <i class="fa fa-whatsapp"></i>
                    </div>
                    <h4>WhatsApp</h4>
                    <p>Quick questions? Chat with us</p>
                    <a href="https://wa.me/2349068584115" target="_blank" class="btn btn-default">+234 906 858 4115</a>
                </div>
            </div>
        </div>

        <div class="mb60"></div>

        <!-- Contact Form & Info -->
        <div class="row col-p30">
            <div class="col-sm-12 col-md-8 sm-box3">
                <h3 class="title-a mb30 hyt">Send Us a Message</h3>
                <form class="form ajax-contact-form" method="POST" action="/contact">
                    @csrf
                    <div class="alert alert-success hidden" id="contact-success">
                        <span class="glyphicon glyphicon-ok"></span>
                        <strong>Success!</strong> Thank you for your message.
                    </div>
                    <div class="alert alert-danger hidden" id="contact-error">
                        <span class="glyphicon glyphicon-remove"></span>
                        <strong>Error!</strong> Oops, something went wrong.
                    </div>
                    <div class="row col-p10">
                        <div class="col-sm-6">
                            <label class="mb10">
                                <input type="text" name="name" id="name_" required class="form-control" placeholder="Full Name *" value="{{ old('name') }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                        <div class="col-sm-6">
                            <label class="mb10">
                                <input type="text" name="organization" id="organization_" required class="form-control" placeholder="Organization *" value="{{ old('organization') }}">
                                @error('organization')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                    </div>
                    <div class="row col-p10">
                        <div class="col-sm-6">
                            <label class="mb10">
                                <input type="email" name="email" id="email_" required class="form-control" placeholder="Email Address *" value="{{ old('email') }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                        <div class="col-sm-6">
                            <label class="mb10">
                                <input type="text" name="phone" id="phone_" class="form-control" placeholder="Phone Number" value="{{ old('phone') }}">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label class="mb10">
                                <select name="inquiry_type" id="inquiry_type_" class="form-control">
                                    <option value="">How can we help?</option>
                                    <option value="audit" {{ old('inquiry_type') == 'audit' ? 'selected' : '' }}>I need an Institutional Audit</option>
                                    <option value="software" {{ old('inquiry_type') == 'software' ? 'selected' : '' }}>I need Custom Software Development</option>
                                    <option value="consulting" {{ old('inquiry_type') == 'consulting' ? 'selected' : '' }}>I need Strategic Consulting</option>
                                    <option value="products" {{ old('inquiry_type') == 'products' ? 'selected' : '' }}>I'm interested in your Products</option>
                                    <option value="partnership" {{ old('inquiry_type') == 'partnership' ? 'selected' : '' }}>Partnership Inquiry</option>
                                    <option value="other" {{ old('inquiry_type') == 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('inquiry_type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                    </div>
                    <label>
                        <textarea name="message" id="message_" cols="30" rows="8" required class="form-control" placeholder="Tell us about your organization's needs *">{{ old('message') }}</textarea>
                        @error('message')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </label>

                    <div class="mb40"></div>
                    <div class="clearfix">
                        <div class="pull-right xs-pull-left xs-box">
                            <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
                            @error('g-recaptcha-response')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="pull-left">
                            <button type="submit" class="btn btn-icon btn-e">
                                <i class="icon icon_mail_alt"></i> Send Message
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-12 col-md-4">
                <!-- Office Info -->
                <div class="box-services-6 mb40">
                    <h3 class="title-a mb30 hyt">Office Information</h3>
                    <div class="contact-info-item">
                        <i class="icon icon_pin_alt"></i>
                        <div>
                            <strong>Location</strong><br>
                            Vibranium Valley, Concord,<br>
                            Ikeja, Lagos, Nigeria
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <i class="icon icon_clock_alt"></i>
                        <div>
                            <strong>Business Hours</strong><br>
                            Mon - Fri: 9:00 AM - 6:00 PM<br>
                            Sat: 10:00 AM - 2:00 PM
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <i class="icon icon_phone"></i>
                        <div>
                            <strong>Phone</strong><br>
                            +234 906 858 4115
                        </div>
                    </div>
                </div>

                <!-- What Happens Next -->
                <div class="box-services-6">
                    <h3 class="title-a mb30 hyt">What Happens Next</h3>
                    <div class="next-steps">
                        <div class="next-step">
                            <span class="step-num">1</span>
                            <p>We'll respond within 24 hours</p>
                        </div>
                        <div class="next-step">
                            <span class="step-num">2</span>
                            <p>Schedule a discovery call</p>
                        </div>
                        <div class="next-step">
                            <span class="step-num">3</span>
                            <p>Receive a tailored proposal</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="mb70"></div>

<style>
/* Contact Option Boxes */
.contact-option-box {
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 5px 30px rgba(0,0,0,0.1);
    padding: 40px 30px;
    text-align: center;
    height: 100%;
    transition: transform 0.3s ease;
}

.contact-option-box:hover {
    transform: translateY(-5px);
}

.contact-option-icon {
    width: 80px;
    height: 80px;
    background: #DAA520;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
}

.contact-option-icon i {
    font-size: 32px;
    color: #fff;
}

.contact-option-box h4 {
    margin-bottom: 10px;
    color: #333;
}

.contact-option-box p {
    color: #666;
    margin-bottom: 20px;
}

/* Contact Info Items */
.contact-info-item {
    display: flex;
    gap: 15px;
    margin-bottom: 20px;
    align-items: flex-start;
}

.contact-info-item i {
    font-size: 24px;
    color: #DAA520;
    margin-top: 3px;
}

.contact-info-item strong {
    color: #333;
}

/* Next Steps */
.next-steps {
    padding-left: 10px;
}

.next-step {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 15px;
}

.step-num {
    width: 30px;
    height: 30px;
    background: #DAA520;
    color: #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    flex-shrink: 0;
}

.next-step p {
    margin: 0;
    color: #666;
}

/* Featured Option */
.contact-option-box.featured-option {
    border: 2px solid #DAA520;
    position: relative;
}

.free-tag {
    position: absolute;
    top: -12px;
    left: 50%;
    transform: translateX(-50%);
    background: #DAA520;
    color: #fff;
    padding: 4px 15px;
    border-radius: 15px;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 1px;
}

@media (max-width: 768px) {
    .contact-option-box {
        margin-bottom: 20px;
    }
}
</style>
