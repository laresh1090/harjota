<section class="section mt40 page-contact">
    <div class="container">
        <div class="row">
            <x-contact-info
                icon="icon_pin_alt"
                content="Vibranium valley, concord, <br> Ikeja, Lagos"
            />
            <x-contact-info
                icon="icon_mobile"
                content="+234 802 265 0610<br>+234 903 824 8511"
            />
            <x-contact-info
                icon="icon_clock_alt"
                content="Mon - Sat: 9:00 - 18:00 <br> Sun: Closed"
            />
        </div>
        <div class="mb60"></div>
        <div class="row col-p30">
            <div class="col-sm-12 col-md-8 sm-box3">
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
                                <input type="text" name="name" id="name_" class="form-control" placeholder="Full Name" value="{{ old('name') }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                        <div class="col-sm-6">
                            <label class="mb10">
                                <input type="text" name="subject" id="subject_" required class="form-control" placeholder="Subject *" value="{{ old('subject') }}">
                                @error('subject')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                    </div>
                    <div class="row col-p10">
                        <div class="col-sm-6">
                            <label class="mb10">
                                <input type="text" name="phone" id="phone_" class="form-control" placeholder="Phone" value="{{ old('phone') }}">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                        <div class="col-sm-6">
                            <label class="mb10">
                                <input type="email" name="email" id="email_" required class="form-control" placeholder="Email Address *" value="{{ old('email') }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label>
                                <select name="country" id="select_" class="form-control">
                                    @foreach (["Select Country","Afghanistan","Albania","Algeria","Andorra","Angola","Antigua and Barbuda","Argentina","Armenia","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bhutan","Bolivia","Bosnia and Herzegovina","Botswana","Brazil","Brunei","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Canada","Cape Verde","Central African Republic","Chad","Chile","China","Colombia","Comoros","Congo (Brazzaville)","Congo (Kinshasa)","Costa Rica","Croatia","Cuba","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","East Timor (Timor-Leste)","Ecuador","Egypt","El Salvador","Equatorial Guinea","Eritrea","Estonia","Ethiopia","Fiji","Finland","France","Gabon","Gambia","Georgia","Germany","Ghana","Greece","Grenada","Guatemala","Guinea","Guinea-Bissau","Guyana","Haiti","Honduras","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Israel","Italy","Ivory Coast","Jamaica","Japan","Jordan","Kazakhstan","Kenya","Kiribati","Korea, North","Korea, South","Kosovo","Kuwait","Kyrgyzstan","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Marshall Islands","Mauritania","Mauritius","Mexico","Micronesia","Moldova","Monaco","Mongolia","Montenegro","Morocco","Mozambique","Myanmar (Burma)","Namibia","Nauru","Nepal","Netherlands","New Zealand","Nicaragua","Niger","Nigeria","Norway","Oman","Pakistan","Palau","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Qatar","Romania","Russia","Rwanda","Saint Kitts and Nevis","Saint Lucia","Saint Vincent and the Grenadines","Samoa","San Marino","Sao Tome and Principe","Saudi Arabia","Senegal","Serbia","Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","Solomon Islands","Somalia","South Africa","South Sudan","Spain","Sri Lanka","Sudan","Suriname","Swaziland","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania","Thailand","Togo","Tonga","Trinidad and Tobago","Tunisia","Turkey","Turkmenistan","Tuvalu","Uganda","Ukraine","United Arab Emirates","United Kingdom","United States","Uruguay","Uzbekistan","Vanuatu","Vatican City","Venezuela","Vietnam","Yemen","Zambia","Zimbabwe"] as $country)

                                        <option value="{{ $country }}" {{ old('country') == $country ? 'selected' : '' }}>
                                            {{ $country }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('country')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                    </div>

                    <label>
                        <textarea name="message" id="message_" cols="30" rows="10" required class="form-control" placeholder="Message *">{{ old('message') }}</textarea>
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
                <div class="box-services-6">
                    <div class="mb20"></div>
                    <h3 class="title-a mb30 hyt">Get Social</h3>
                    <ul class="sidebar-socials">
                        @foreach ([
                            ['icon' => 'social_twitter', 'url' => '#', 'text' => 'Follow us', 'count' => '450 Followers'],
                            ['icon' => 'social_facebook', 'url' => '#', 'text' => 'Like us', 'count' => '725 Likes'],
                            ['icon' => 'social_googleplus', 'url' => '#', 'text' => 'Circle us', 'count' => '300 Circles'],
                            ['icon' => 'icon_mail_alt', 'url' => '#', 'text' => 'Subscribe', 'count' => '380 Subscribers']
                        ] as $social)
                            <x-social-link
                                :icon="$social['icon']"
                                :url="$social['url']"
                                :text="$social['text']"
                                :count="$social['count']"
                            />
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="mb70"></div>