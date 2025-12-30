<!DOCTYPE html>
<html lang="en-NG">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @php
        $routeName = request()->route()->getName() ?? 'home';
        $pageData = match ($routeName) {
            'home' => [
                'title' => 'Harjota - Institutional Intelligence & Digital Systems',
                'description' => 'Harjota helps organizations embed clarity, decision intelligence, and operational continuity into their core systems. Expert consulting for sustainable growth.',
                'keywords' => 'institutional intelligence, digital systems, business consulting, decision intelligence, Nigeria, Lagos'
            ],
            'about' => [
                'title' => 'About Us - Harjota | Our Mission & Approach',
                'description' => 'Learn about Harjota\'s mission to help organizations move beyond fragmented tools through structured assessment, architecture, and implementation.',
                'keywords' => 'about harjota, institutional intelligence company, digital transformation Nigeria'
            ],
            'services' => [
                'title' => 'Our Services - Harjota | Audits, Architecture & Digital Solutions',
                'description' => 'Explore Harjota\'s services: Institutional Intelligence Audit, Systems Architecture, Digital Infrastructure, Business Intelligence & AI, and Advisory Services.',
                'keywords' => 'institutional audit, digital infrastructure, business intelligence, AI enablement, consulting services Nigeria'
            ],
            'products' => [
                'title' => 'Products - Harjota | Academic & Hospital Intelligence Systems',
                'description' => 'Discover Harjota\'s AI-powered intelligence systems for educational institutions, hospitals, and complex organizations.',
                'keywords' => 'academic intelligence system, hospital intelligence, AI products, institutional software Nigeria'
            ],
            'insights' => [
                'title' => 'Insights - Harjota | Institutional Intelligence Blog',
                'description' => 'Read expert insights on institutional intelligence, digital transformation, and organizational clarity from Harjota.',
                'keywords' => 'institutional intelligence blog, digital transformation insights, business intelligence articles'
            ],
            'contact' => [
                'title' => 'Contact Us - Harjota | Book a Free Consultation',
                'description' => 'Get in touch with Harjota. Book a free 30-minute consultation to discuss how institutional intelligence can transform your organization.',
                'keywords' => 'contact harjota, free consultation, business consulting Lagos Nigeria'
            ],
            default => [
                'title' => 'Harjota - Institutional Intelligence & Digital Systems',
                'description' => 'Harjota helps organizations embed clarity, decision intelligence, and operational continuity into their core systems.',
                'keywords' => 'institutional intelligence, digital systems, business consulting'
            ]
        };
    @endphp

    <title>{{ $pageData['title'] }}</title>

    <!-- Primary Meta Tags -->
    <meta name="author" content="Harjota">
    <meta name="description" content="{{ $pageData['description'] }}">
    <meta name="keywords" content="{{ $pageData['keywords'] }}">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $pageData['title'] }}">
    <meta property="og:description" content="{{ $pageData['description'] }}">
    <meta property="og:image" content="{{ asset('harjota_og.jpg') }}">
    <meta property="og:site_name" content="Harjota">
    <meta property="og:locale" content="en_NG">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="{{ $pageData['title'] }}">
    <meta name="twitter:description" content="{{ $pageData['description'] }}">
    <meta name="twitter:image" content="{{ asset('harjota_og.jpg') }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('harjota_favicon.svg') }}" type="image/svg+xml">
    <link rel="apple-touch-icon" href="{{ asset('harjota_favicon.svg') }}">
    <meta name="theme-color" content="#DAA520">

    <!-- Preconnect for Performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://assets.calendly.com">

    <!-- CSS files -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Montserrat:wght@400;700&family=Raleway:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('libs/rs-plugin/css/settings.css') }}" media="screen">
    <link rel="stylesheet" href="{{ asset('libs/magnific-popup/magnific-popup.css') }}">
    <script src="{{ asset('sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('sweetalert2/dist/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animations.css') }}">

    <!-- Calendly Popup Widget -->
    <link href="https://assets.calendly.com/assets/external/widget.css" rel="stylesheet">
    <script src="https://assets.calendly.com/assets/external/widget.js" type="text/javascript" async></script>

    <!-- Schema.org Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "Harjota",
        "description": "Institutional Intelligence & Digital Systems company helping organizations embed clarity, decision intelligence, and operational continuity.",
        "url": "{{ url('/') }}",
        "logo": "{{ asset('harjota_logo.png') }}",
        "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "+234-906-757-4115",
            "contactType": "customer service",
            "email": "info@harjota.com",
            "areaServed": "NG",
            "availableLanguage": "English"
        },
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "Vibranium Valley, Concord",
            "addressLocality": "Ikeja",
            "addressRegion": "Lagos",
            "addressCountry": "NG"
        },
        "sameAs": [
            "https://wa.me/2349068584115"
        ]
    }
    </script>

    @stack('head')

<style>
/* Floating Buttons Container */
.floating-buttons {
    position: fixed;
    bottom: 30px;
    right: 30px;
    z-index: 9999;
    display: flex;
    flex-direction: column;
    gap: 15px;
    align-items: flex-end;
}

/* WhatsApp Floating Button */
.whatsapp-float {
    width: 55px;
    height: 55px;
    background-color: #25D366;
    color: #fff;
    border-radius: 50%;
    text-align: center;
    font-size: 26px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.25);
    display: flex;
    align-items: center;
    justify-content: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    text-decoration: none;
}

.whatsapp-float:hover {
    transform: scale(1.1);
    box-shadow: 0 6px 20px rgba(0,0,0,0.35);
    color: #fff;
    text-decoration: none;
}

/* Chat Widget */
.chat-widget {
    position: relative;
}

.chat-toggle {
    width: 55px;
    height: 55px;
    background: #DAA520;
    color: #fff;
    border-radius: 50%;
    border: none;
    font-size: 24px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.25);
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.chat-toggle:hover {
    background: #B8860B;
    transform: scale(1.1);
    box-shadow: 0 6px 20px rgba(0,0,0,0.35);
}

.chat-toggle.active {
    background: #333;
}

.chat-toggle .chat-icon { display: block; }
.chat-toggle .close-icon { display: none; }
.chat-toggle.active .chat-icon { display: none; }
.chat-toggle.active .close-icon { display: block; }

/* Chat Box */
.chat-box {
    position: absolute;
    bottom: 70px;
    right: 0;
    width: 350px;
    max-height: 500px;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.2);
    overflow: hidden;
    opacity: 0;
    visibility: hidden;
    transform: translateY(20px) scale(0.95);
    transition: all 0.3s ease;
}

.chat-box.active {
    opacity: 1;
    visibility: visible;
    transform: translateY(0) scale(1);
}

.chat-header {
    background: #DAA520;
    color: #fff;
    padding: 20px;
    text-align: center;
}

.chat-header h4 {
    margin: 0 0 5px;
    font-size: 18px;
}

.chat-header p {
    margin: 0;
    font-size: 13px;
    opacity: 0.9;
}

.chat-body {
    padding: 20px;
    max-height: 300px;
    overflow-y: auto;
}

.chat-messages {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.chat-message {
    max-width: 85%;
    padding: 12px 16px;
    border-radius: 18px;
    font-size: 14px;
    line-height: 1.5;
}

.chat-message.bot {
    background: #f0f0f0;
    align-self: flex-start;
    border-bottom-left-radius: 4px;
}

.chat-message.user {
    background: #DAA520;
    color: #fff;
    align-self: flex-end;
    border-bottom-right-radius: 4px;
}

.chat-footer {
    padding: 15px;
    border-top: 1px solid #eee;
}

.chat-input-wrapper {
    display: flex;
    gap: 10px;
}

.chat-input {
    flex: 1;
    border: 1px solid #ddd;
    border-radius: 25px;
    padding: 10px 18px;
    font-size: 14px;
    outline: none;
    transition: border-color 0.3s;
}

.chat-input:focus {
    border-color: #DAA520;
}

.chat-send {
    width: 42px;
    height: 42px;
    background: #DAA520;
    color: #fff;
    border: none;
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background 0.3s;
}

.chat-send:hover {
    background: #B8860B;
}

.quick-actions {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-top: 15px;
}

.quick-action {
    background: #fff;
    border: 1px solid #DAA520;
    color: #DAA520;
    padding: 8px 14px;
    border-radius: 20px;
    font-size: 12px;
    cursor: pointer;
    transition: all 0.3s;
}

.quick-action:hover {
    background: #DAA520;
    color: #fff;
}

@media (max-width: 480px) {
    .chat-box {
        width: calc(100vw - 30px);
        right: -15px;
    }
}

/* Global Mobile Responsiveness */
@media (max-width: 992px) {
    .container {
        padding-left: 20px;
        padding-right: 20px;
    }
}

@media (max-width: 768px) {
    /* Typography */
    h1, .title-large {
        font-size: 28px !important;
        line-height: 1.3;
    }

    h2, .title-medium, .title-uppercased {
        font-size: 24px !important;
        line-height: 1.3;
    }

    h3, .title-small {
        font-size: 20px !important;
    }

    /* Sections */
    .section, .section-bg {
        padding: 40px 0;
    }

    .section-large, .section-extra-large {
        padding: 60px 0;
    }

    /* Buttons */
    .btn, .btn-e, .btn-slider {
        padding: 12px 25px;
        font-size: 14px;
    }

    /* Text alignment on mobile */
    .text-right {
        text-align: left !important;
    }

    /* Row spacing */
    .row {
        margin-left: -10px;
        margin-right: -10px;
    }

    .row > [class*="col-"] {
        padding-left: 10px;
        padding-right: 10px;
    }

    /* Margin utilities */
    .mb50, .mb40 {
        margin-bottom: 30px !important;
    }

    .mt50, .mt40 {
        margin-top: 30px !important;
    }

    /* Floating buttons mobile */
    .floating-buttons {
        bottom: 20px;
        right: 20px;
        gap: 10px;
    }

    .whatsapp-float,
    .chat-toggle {
        width: 50px;
        height: 50px;
        font-size: 22px;
    }
}

@media (max-width: 480px) {
    h1, .title-large {
        font-size: 24px !important;
    }

    h2, .title-medium, .title-uppercased {
        font-size: 20px !important;
    }

    .btn, .btn-e, .btn-slider {
        display: block;
        width: 100%;
        text-align: center;
    }
}

/* Print styles */
@media print {
    .floating-buttons,
    .chat-widget,
    .whatsapp-float {
        display: none !important;
    }
}

</style>
</head>

<body>

    <!-- Global Wrapper -->
    <div id="wrapper" class="animsition">

    @include('partials._header')

    {{$slot}}

    </div>
    <!-- END Global Wrapper -->

    <!-- Floating Buttons -->
    <div class="floating-buttons">
        <!-- Chat Widget -->
        <div class="chat-widget">
            <div class="chat-box" id="chatBox">
                <div class="chat-header">
                    <h4>Hi there!</h4>
                    <p>How can we help you today?</p>
                </div>
                <div class="chat-body">
                    <div class="chat-messages" id="chatMessages">
                        <div class="chat-message bot">
                            Welcome to Harjota! I'm here to help you learn about our institutional intelligence services. What would you like to know?
                        </div>
                    </div>
                    <div class="quick-actions">
                        <button class="quick-action" data-message="Tell me about your services">Our Services</button>
                        <button class="quick-action" data-message="How much does an audit cost?">Pricing</button>
                        <button class="quick-action" data-message="I want to schedule a consultation">Book a Call</button>
                    </div>
                </div>
                <div class="chat-footer">
                    <div class="chat-input-wrapper">
                        <input type="text" class="chat-input" id="chatInput" placeholder="Type your message...">
                        <button class="chat-send" id="chatSend">
                            <i class="fa fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>
            <button class="chat-toggle" id="chatToggle">
                <i class="fa fa-comments chat-icon"></i>
                <i class="fa fa-times close-icon"></i>
            </button>
        </div>

        <!-- WhatsApp Button -->
        <a href="https://wa.me/2349068584115" class="whatsapp-float" target="_blank" title="Chat on WhatsApp">
            <i class="fa fa-whatsapp"></i>
        </a>
    </div>

    <!-- Do not remove this -->
    <div class="check-media"></div>

    <!-- Javascript files -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('libs/rs-plugin/js/revolution-slider.js') }}"></script>
    <script src="{{ asset('libs/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/main.min.js') }}"></script>

    <!-- Calendly Popup Function -->
    <script>
    function openCalendly() {
        Calendly.initPopupWidget({url: 'https://calendly.com/codelixer96/30min'});
        return false;
    }
    </script>

    <!-- Chat Widget Script -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const chatToggle = document.getElementById('chatToggle');
        const chatBox = document.getElementById('chatBox');
        const chatInput = document.getElementById('chatInput');
        const chatSend = document.getElementById('chatSend');
        const chatMessages = document.getElementById('chatMessages');
        const quickActions = document.querySelectorAll('.quick-action');

        // Toggle chat
        chatToggle.addEventListener('click', function() {
            this.classList.toggle('active');
            chatBox.classList.toggle('active');
            if (chatBox.classList.contains('active')) {
                chatInput.focus();
            }
        });

        // Send message
        function sendMessage(text) {
            if (!text.trim()) return;

            // Add user message
            const userMsg = document.createElement('div');
            userMsg.className = 'chat-message user';
            userMsg.textContent = text;
            chatMessages.appendChild(userMsg);

            // Clear input
            chatInput.value = '';

            // Scroll to bottom
            chatMessages.scrollTop = chatMessages.scrollHeight;

            // Bot response (simulated)
            setTimeout(function() {
                const botMsg = document.createElement('div');
                botMsg.className = 'chat-message bot';

                if (text.toLowerCase().includes('service')) {
                    botMsg.innerHTML = 'We offer 5 core services: Institutional Intelligence Audit, Systems & Decision Architecture, Digital Infrastructure, Business Intelligence & AI, and Advisory Services. <a href="/services" style="color:#DAA520">View all services</a>';
                } else if (text.toLowerCase().includes('price') || text.toLowerCase().includes('cost') || text.toLowerCase().includes('audit')) {
                    botMsg.innerHTML = 'Our audit packages range from ₦300K - ₦5M depending on scope. <a href="/services" style="color:#DAA520">See pricing details</a>';
                } else if (text.toLowerCase().includes('book') || text.toLowerCase().includes('schedule') || text.toLowerCase().includes('consultation') || text.toLowerCase().includes('call')) {
                    botMsg.innerHTML = 'I\'d be happy to help you book a free consultation! <a href="javascript:void(0)" onclick="openCalendly()" style="color:#DAA520">Book now</a> or call us at +234 906 858 4115';
                } else if (text.toLowerCase().includes('contact') || text.toLowerCase().includes('phone') || text.toLowerCase().includes('email')) {
                    botMsg.innerHTML = 'You can reach us at:<br>Email: info@harjota.com<br>Phone: +234 906 858 4115<br>Or <a href="/contact" style="color:#DAA520">visit our contact page</a>';
                } else {
                    botMsg.innerHTML = 'Thanks for your message! For a detailed response, please <a href="/contact" style="color:#DAA520">schedule a consultation</a> or chat with us on WhatsApp.';
                }

                chatMessages.appendChild(botMsg);
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }, 800);
        }

        chatSend.addEventListener('click', function() {
            sendMessage(chatInput.value);
        });

        chatInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                sendMessage(chatInput.value);
            }
        });

        // Quick actions
        quickActions.forEach(function(btn) {
            btn.addEventListener('click', function() {
                sendMessage(this.getAttribute('data-message'));
            });
        });
    });
    </script>
</body>
</html>
