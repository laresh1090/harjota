<x-hero-one
    title="Cybersecurity"
    background="i/ss.jpg"
    :breadcrumbs="[
        ['url' => route('home'), 'title' => 'Home'],
        ['url' => route('about'), 'title' => 'Cybersecurity Page']
    ]"
/>

<section class="section-page">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-12">
                        <x-blog-post
                            :sections="[
                                [
                                    'title' => 'Cybersecurity Services',
                                    'content' => 'At Skyllax Technologies, we provide comprehensive cybersecurity services to protect your business from cyber threats. Our services include:'
                                ],
                                [
                                    'title' => 'Network Security',
                                    'content' => '1. Firewall Configuration: We configure firewalls to control incoming and outgoing network traffic.<br>
2. Intrusion Detection and Prevention: Our systems detect and prevent intrusion attempts.<br>
3. Virtual Private Network (VPN): We set up secure VPNs for remote access.
'
                                ],
                                [
                                    'title' => 'Endpoint Security',
                                    'content' => '1. Antivirus and Anti-Malware: We install and manage antivirus and anti-malware software.<br>
2. Endpoint Detection and Response (EDR): Our EDR solutions detect and respond to endpoint threats.<br>
3. Patch Management: We ensure your endpoints are up-to-date with the latest security patches.
'
                                ],
                                [
                                    'title' => 'Cloud Security',
                                    'content' => '1. Cloud Security Assessment: We assess your cloud infrastructure for security risks.<br>
2. Cloud Compliance: We ensure your cloud infrastructure meets regulatory requirements.<br>
3. Cloud Monitoring: Our team monitors your cloud infrastructure for security threats.
'
                                ],
                                [
                                    'title' => 'Incident Response',
                                    'content' => '11. Incident Detection: We detect security incidents quickly.<br>
2. Incident Containment: Our team contains incidents to prevent further damage.<br>
3. Incident Eradication: We eradicate the root cause of incidents.
'
                                ],
                                [
                                    'title' => 'Penetration Testing',
                                    'content' => '1. External Penetration Testing: We simulate external attacks to identify vulnerabilities.<br>
2. Internal Penetration Testing: Our team simulates internal attacks to identify vulnerabilities.<br>
3. Vulnerability Assessment: We identify and prioritize vulnerabilities for remediation.
'
                                ],
                                [
                                    'title' => 'Benefits',
                                    'content' => '1. Improved Security Posture: Our services enhance your security posture.<br>
2. Reduced Risk: We reduce the risk of cyber attacks and data breaches.<br>
3. Compliance: Our services ensure regulatory compliance.<br>
4. Peace of Mind: You can focus on your business, knowing your security is in good hands.
'
                                ],
                                [
                                    'title' => 'Why Choose Skyllax Technologies?',
                                    'content' => '1. Expertise: Our team has extensive experience in digital branding.<br>2. Customized Approach: We tailor strategies to meet unique business needs.<br>3. Measurable Results: Our team tracks progress.'
                                ]
                            ]"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-bg mb0 section-extra-large bg-img stellar bg52 stats-section stats-bg" data-stellar-background-ratio="0.4">
    <link rel="preload" href="{{ asset('i/bg52.jpg') }}" as="image">
    <div class="bg-overlay gradient-1"></div>
    <div class="container">
        <div class="row mb50">
            <div class="col-sm-12">
                <div class="row">
                    @foreach ([
                        ['value' => 123, 'speed' => 4000, 'title' => 'Projects'],
                        ['value' => 1850, 'speed' => 4000, 'title' => 'Happy Customers'],
                        ['value' => 1768, 'speed' => 4000, 'title' => 'Support Tickets'],
                        ['value' => 58, 'speed' => 3500, 'title' => 'Employees']
                    ] as $stat)
                        <x-stat-item
                            :value="$stat['value']"
                            :speed="$stat['speed']"
                            :title="$stat['title']"
                        />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('contact') }}" class="btn-bottom">Contact Us</a>
</section>
<div class="shadow3"></div>
<div class="simple-hr mt20 mb30 xs-m0"></div>