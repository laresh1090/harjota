# Harjota SEO Organic Traffic Optimization Plan

**Current Date:** December 30, 2025
**Target:** 8-week implementation, 500+ organic monthly visitors by Q2 2026

---

## 1. Current State Analysis (80 lines)

### Existing Strengths
- Clean HTML structure with proper semantic markup
- Schema.org Organization structured data implemented
- Meta tags framework with page-specific data
- Sitemap.xml exists with all main pages
- Mobile-responsive design with preconnect hints
- Open Graph and Twitter meta tags for social sharing

### Critical SEO Gaps
- **Missing Schema Markup:**
  - Service schema for each service offering (audit, architecture, software)
  - Article schema for blog posts (missing @type fields)
  - LocalBusiness schema incomplete (missing areaServed variations)
  - No BreadcrumbList schema for navigation
  - No WebSite searchAction schema

- **On-Page Issues:**
  - No H1 tags in hero sections (critical for page hierarchy)
  - Blog articles lack proper structured meta descriptions (title/description not dynamic)
  - Internal linking sparse (only footer navigation)
  - No image alt tags verified across optimized images
  - Missing rel="noopener noreferrer" on external links

- **Technical Issues:**
  - Hardcoded article slugs without dynamic meta tags
  - No robots.txt specified (assuming default)
  - No canonical tags for duplicate content prevention
  - Opportunity for keyword clustering

- **Content Gaps:**
  - Blog articles lack keyword targets and search intent mapping
  - No long-form content (1,500+ words) for authority building
  - Missing FAQ pages for featured snippet optimization
  - No location pages for "institutional consulting + Lagos/Nigeria"

### Immediate Wins (Next 2 Weeks)
1. Add missing schema markup (Article, Service, BreadcrumbList)
2. Implement H1 structure properly
3. Create dynamic meta tags for all blog articles
4. Add image alt tags
5. Generate robots.txt

---

## 2. Technical SEO Implementation (100 lines)

### Schema.org Markup Strategy

**Service Schema** - Add to services page via component:
```blade
@php
$services = [
    [
        'name' => 'Institutional Intelligence Audit',
        'description' => 'Comprehensive assessment of decisions, data, processes, and systems.',
        'price' => '₦300,000 - ₦5,000,000',
        'provider' => 'Harjota',
        'areaServed' => ['Nigeria', 'West Africa', 'Sub-Saharan Africa'],
        'url' => route('services')
    ],
    // ... other services
];
@endphp

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Service",
  "name": "{{ $service['name'] }}",
  "description": "{{ $service['description'] }}",
  "provider": {
    "@type": "Organization",
    "name": "Harjota",
    "url": "{{ url('/') }}"
  },
  "areaServed": [
    @foreach($service['areaServed'] as $area)
    {
      "@type": "Country",
      "name": "{{ $area }}"
    }@if(!$loop->last),@endif
    @endforeach
  ],
  "priceRange": "{{ $service['price'] }}"
}
</script>
```

**Article Schema** - For insights/blog posts:
```blade
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BlogPosting",
  "headline": "{{ $article['title'] }}",
  "description": "{{ substr($article['excerpt'], 0, 160) }}",
  "image": "{{ asset($article['image']) }}",
  "datePublished": "{{ $article['date'] }}",
  "dateModified": "{{ $article['updated_at'] ?? $article['date'] }}",
  "author": {
    "@type": "Organization",
    "name": "Harjota"
  },
  "publisher": {
    "@type": "Organization",
    "name": "Harjota",
    "logo": {
      "@type": "ImageObject",
      "url": "{{ asset('harjota_logo.png') }}"
    }
  }
}
</script>
```

**BreadcrumbList Schema** - For navigation hierarchy:
```blade
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    {
      "@type": "ListItem",
      "position": 1,
      "name": "Home",
      "item": "{{ url('/') }}"
    },
    @foreach($breadcrumbs as $index => $crumb)
    {
      "@type": "ListItem",
      "position": {{ $index + 2 }},
      "name": "{{ $crumb['title'] }}",
      "item": "{{ $crumb['url'] }}"
    }@if(!$loop->last),@endif
    @endforeach
  ]
}
</script>
```

### Meta Tags in Layout.blade.php
```blade
<!-- Character encoding for mobile optimization -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">

<!-- SEO Core -->
<meta name="description" content="{{ $pageData['description'] }}">
<meta name="keywords" content="{{ $pageData['keywords'] }}">
<meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">

<!-- Additional Meta Tags -->
<meta name="language" content="English">
<meta name="revisit-after" content="7 days">
<meta name="author" content="Harjota">
<meta name="copyright" content="Harjota 2025">

<!-- Canonical URLs -->
<link rel="canonical" href="{{ url()->current() }}">

<!-- Alternate Links -->
<link rel="alternate" hreflang="en-NG" href="{{ url()->current() }}">
<link rel="alternate" hreflang="en" href="{{ url()->current() }}">
<link rel="alternate" hreflang="x-default" href="{{ url()->current() }}">
```

### Performance Optimization
```blade
<!-- Preload Critical Resources -->
<link rel="preload" as="image" href="{{ asset('harjota_logo.png') }}">
<link rel="preload" as="font" href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700" crossorigin>

<!-- DNS Prefetch -->
<link rel="dns-prefetch" href="https://assets.calendly.com">

<!-- Image Lazy Loading -->
<!-- In article cards: -->
<img src="{{ $article['image'] }}" alt="{{ $article['title'] }}" loading="lazy" decoding="async">

<!-- Disable render-blocking resources where possible -->
<script src="{{ asset('js/main.min.js') }}" defer></script>
```

### Mobile Optimization
- Current design is responsive (viewport meta tag present)
- Test with Google Mobile-Friendly Test
- Ensure button sizes (minimum 48x48px)
- Font size minimum 16px on mobile

---

## 3. On-Page SEO Strategy (120 lines)

### Target Keywords by Page

**Homepage (Priority: High)**
- Primary: "institutional intelligence Nigeria"
- Secondary: "digital transformation consulting Lagos", "business intelligence services"
- Long-tail: "institutional consulting West Africa", "decision systems architecture"

**Services Page (Priority: High)**
- Primary: "institutional intelligence audit Nigeria"
- Secondary: "digital infrastructure consulting", "business intelligence enablement"
- Long-tail: "institutional audit services Lagos", "digital systems assessment"

**About Page (Priority: Medium)**
- Primary: "about Harjota", "institutional intelligence company"
- Secondary: "digital transformation consultants Nigeria"
- Long-tail: "digital strategy consulting Lagos"

**Products Page (Priority: High)**
- Primary: "institutional intelligence platform", "hospital management software Nigeria"
- Secondary: "academic intelligence system", "AI-powered dashboards"
- Long-tail: "education management software Lagos", "hospital information system"

**Insights/Blog (Priority: High)**
- Article 1: "what is institutional intelligence" (500 words → 1,200 words)
- Article 2: "digital audit checklist" (long-form SEO guide, 1,500 words)
- Article 3: "technology project failure causes" (data-driven, 1,200 words)
- Article 4: "fragmented systems costs" (ROI-focused, 1,000 words)
- Article 5: "audit preparation guide" (practical guide, 1,500 words)

### Meta Title/Description Templates

**Services:**
- Length: 50-60 chars (title), 150-160 chars (description)
- Format: `[Service Name] - Harjota | Institutional Intelligence Services`
- Description: Focus on value prop + CTA

**Blog Posts:**
- Title: `[Article Title] | Harjota Insights`
- Description: Extract opening paragraph or excerpt (155 chars)

**Category Pages:**
- Title: `[Category] Articles | Harjota Blog`
- Description: Summarize category value + article count

### Content Optimization Checklist

Per article/page:
- [ ] H1 tag (one per page, main keyword)
- [ ] H2/H3 hierarchy proper (3-5 subheadings)
- [ ] Keyword density 1-2% (natural language)
- [ ] Internal links (minimum 3-5 per 1,000 words)
- [ ] External links to authority sites (2-3)
- [ ] Image alt text: "keyword context" format
- [ ] Meta description unique
- [ ] Schema markup applied
- [ ] Word count minimum 800 words for blogs
- [ ] Readability score 60+ (Flesch Reading Ease)

### Internal Linking Strategy

**Navigation Links:**
- Homepage → Services, About, Insights, Contact (primary)
- Services → Individual service detail pages
- Blog → Related articles (via tags/categories)

**Content Links:**
- Services page → 2-3 relevant blog articles per service
- Blog article → Services page (CTA)
- Case studies → Related service offerings

**Anchor Text:** Use descriptive keywords, not "click here"
```blade
<!-- Good -->
<a href="{{ route('services') }}">Institutional Intelligence Audit Services</a>

<!-- Avoid -->
<a href="{{ route('services') }}">Learn More</a>
```

---

## 4. Content Strategy & Authority Building (100 lines)

### Blog Content Roadmap (Monthly)

**Month 1 (Jan 2026):**
1. Expand "What is Institutional Intelligence?" (500→1,500 words)
   - Add case studies
   - Include comparative analysis with other frameworks
   - Target: "institutional intelligence definition"

2. New: "10 Digital Transformation Red Flags" (1,200 words)
   - Target: "digital transformation fails"
   - List-based for snippet opportunity

3. New: "Institutional Intelligence vs. Business Intelligence" (1,200 words)
   - Target: "institutional intelligence vs BI"
   - Comparison-driven SEO

**Month 2 (Feb 2026):**
1. Expand "5 Signs Your Organization Needs a Digital Audit" (1,500 words)
   - Add diagnostic framework
   - Target: "do we need digital audit"

2. New: "Digital Audit Checklist [Complete Guide]" (1,800 words)
   - Target: "institutional audit checklist"
   - Downloadable as PDF (lead magnet)

**Month 3+ (Mar 2026):**
- Thought leadership pieces (2,000 words)
- Case studies with metrics
- Industry-specific guides

### Pillar Page Approach

**Pillar 1: Institutional Intelligence (Hub)**
- Central page: "Complete Guide to Institutional Intelligence" (2,000 words)
- Cluster articles:
  - What is institutional intelligence (definition)
  - Institutional vs. business intelligence
  - Implementation frameworks
  - Success metrics

**Pillar 2: Digital Transformation (Hub)**
- Central page: "Digital Transformation Strategy Guide" (2,000 words)
- Cluster articles:
  - Why tech projects fail
  - Fragmented systems costs
  - Digital audit guide
  - Change management

**Pillar 3: Industry Solutions (Hub)**
- Central page: "Institutional Intelligence for Healthcare" (1,500 words)
- Cluster articles:
  - Hospital systems challenges
  - Data integration in healthcare
  - Compliance in hospital systems

### Content Quality Standards
- Expert-authored (Harjota team)
- Data-backed claims (citation required)
- Updated quarterly
- Includes CTAs (consultation booking)
- Optimized for featured snippets (FAQ format)

---

## 5. Local SEO - Nigeria Market Focus (80 lines)

### Google Business Profile Optimization

**Core Information:**
- Business Name: Harjota
- Category: Management Consulting, Business Consulting
- Service Areas: Nigeria (all states), West Africa
- Address: Vibranium Valley, Concord, Ikeja, Lagos, Nigeria
- Phone: +234-906-757-4115
- Website: https://harjota.com
- Business Hours: Mon-Fri 9AM-5PM WAT

**Optimization Actions:**
1. Add 10+ high-quality photos (office, team, work in progress)
2. Write compelling business description (250 chars)
3. Add service areas (all Nigerian states + major cities)
4. Enable messaging/Q&A features
5. Post content (insights articles, case studies)
6. Encourage client reviews (Google & local platforms)

### Local Directory Listings

**Priority 1 (High Authority):**
- Google Business Profile
- Apple Maps
- LinkedIn Company Page (Harjota)

**Priority 2 (Medium Authority):**
- Nigerian business directories:
  - Jumia Business / Konga Business
  - Info Naija Business Directory
  - Yellow Pages Nigeria
  - NotchUp (business directory)

**Priority 3 (Emerging):**
- Chamber of Commerce (Lagos Chamber)
- Industry associations
- Local technology platforms

### Location-Specific Content

**Create pages for:**
- "Institutional Consulting in Lagos"
- "Digital Transformation Services in Abuja"
- "Business Intelligence Solutions Nigeria"

Template:
```blade
<h1>{{ $city }} | {{ $service }}</h1>
<p>Harjota provides {{ $service }} to organizations across {{ $city }}.
Serving businesses in [neighborhoods/areas]. Contact us for a free consultation.</p>
<schema>LocalBusiness + Service schema</schema>
```

### Local Link Building
- Partner with Lagos Chamber of Commerce
- Sponsorships of tech/business events
- Guest features on Nigerian business blogs
- Collaborations with complementary service providers

---

## 6. Technical Implementation (Laravel/Blade Code Snippets) (120 lines)

### Dynamic Meta Tags Helper (app/Helpers/SeoHelper.php)

```php
<?php
namespace App\Helpers;

class SeoHelper {
    public static function generateMeta($page) {
        $metaData = [
            'home' => [
                'title' => 'Harjota - Institutional Intelligence & Digital Systems',
                'description' => 'Harjota helps organizations embed clarity, decision intelligence, and operational continuity into their core systems. Expert consulting for sustainable growth.',
                'keywords' => 'institutional intelligence, digital systems, business consulting, Lagos, Nigeria',
                'ogImage' => asset('harjota_og.jpg')
            ],
            'services' => [
                'title' => 'Services - Harjota | Audits, Architecture & Digital Solutions',
                'description' => 'Harjota offers institutional intelligence audits, systems architecture, digital infrastructure, business intelligence, and advisory services.',
                'keywords' => 'consulting services, digital transformation, institutional audit, Nigeria'
            ],
            // ... other pages
        ];

        return $metaData[$page] ?? $metaData['home'];
    }

    public static function generateArticleSchema($article) {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'BlogPosting',
            'headline' => $article['title'],
            'description' => substr($article['excerpt'], 0, 160),
            'image' => asset($article['image']),
            'datePublished' => $article['published_at'],
            'dateModified' => $article['updated_at'],
            'author' => ['@type' => 'Organization', 'name' => 'Harjota'],
            'publisher' => [
                '@type' => 'Organization',
                'name' => 'Harjota',
                'logo' => ['@type' => 'ImageObject', 'url' => asset('harjota_logo.png')]
            ]
        ];
    }
}
```

### Dynamic Article Component (resources/views/components/article-seo.blade.php)

```blade
@props(['article'])

<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BlogPosting',
    'headline' => $article['title'],
    'description' => substr($article['excerpt'], 0, 160),
    'image' => asset($article['image']),
    'datePublished' => $article['date'],
    'author' => ['@type' => 'Organization', 'name' => 'Harjota'],
    'publisher' => [
        '@type' => 'Organization',
        'name' => 'Harjota',
        'logo' => ['@type' => 'ImageObject', 'url' => asset('harjota_logo.png')]
    ]
]) !!}
</script>

<!-- Proper Heading Structure -->
<article class="article-post">
    <h1 class="article-main-title">{{ $article['title'] }}</h1>

    <div class="article-meta">
        <span class="article-date">{{ date('F j, Y', strtotime($article['date'])) }}</span>
        <span class="article-reading-time">{{ $article['reading_time'] ?? '5' }} min read</span>
    </div>

    <!-- Article content with H2/H3 hierarchy -->
    <div class="article-body">
        {!! $article['content'] !!}
    </div>
</article>
```

### Robots.txt (public/robots.txt)

```
User-agent: *
Allow: /
Disallow: /admin/
Disallow: /api/
Disallow: /storage/
Disallow: *?page=

# Crawl delay (optional)
Crawl-delay: 1

# Sitemap location
Sitemap: https://harjota.com/sitemap.xml
```

### Dynamic Sitemap (routes/web.php)

```php
Route::get('/sitemap.xml', function () {
    $sitemap = \Illuminate\Support\Facades\View::make('sitemap');
    return response($sitemap)->header('Content-Type', 'application/xml');
});
```

### Sitemap Template (resources/views/sitemap.blade.php)

```xml
<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <!-- Main Pages -->
    @foreach(['home' => '/', 'about' => '/about', 'services' => '/services', 'products' => '/products', 'insights' => '/insights', 'contact' => '/contact'] as $name => $url)
    <url>
        <loc>{{ url($url) }}</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
        <changefreq>{{ $name == 'insights' ? 'weekly' : 'monthly' }}</changefreq>
        <priority>{{ $name == 'home' ? '1.0' : '0.8' }}</priority>
    </url>
    @endforeach

    <!-- Blog Articles -->
    @foreach($articles as $article)
    <url>
        <loc>{{ route('insights.show', $article['slug']) }}</loc>
        <lastmod>{{ $article['updated_at']->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.6</priority>
    </url>
    @endforeach
</urlset>
```

### Image Alt Text Blade Macro (app/Providers/BladeServiceProvider.php)

```php
public function boot() {
    \Blade::directive('altText', function ($expression) {
        return "<?php echo \"$expression | Harjota institutional intelligence\"; ?>";
    });
}
```

---

## 7. Link Building Quick Wins (60 lines)

### On-Site Link Building

**Service Pages → Blog Articles:**
Link each service to 2-3 relevant articles:
- Audit service → "What is Institutional Intelligence", "Audit Preparation Guide"
- Architecture service → "Tech Project Failures", "Decision Systems"
- Software service → "Product features" articles

**Blog Internal Linking:**
- Each article → 3-4 internal links to services/products
- Related articles (tag-based)
- CTA linking to contact/consultation page

### Off-Site Link Building Strategy

**High-Probability Opportunities (8 weeks):**

1. **Nigerian Tech/Business Media** (3-5 links)
   - TechCabal, Disrupt Africa, CIR magazine
   - Pitch: Expert commentary on digital transformation in Nigeria

2. **Industry Association & Chamber** (2-3 links)
   - Lagos Chamber of Commerce membership
   - Nigerian Information Technology Association (NITAD)
   - Links from partner directories

3. **Client Case Studies & Testimonials** (4-6 links)
   - Encourage clients to feature Harjota on their websites
   - Partnership mentions on partner sites
   - Supplier directories

4. **Educational & Thought Leadership** (2-3 links)
   - Guest posts on fintech/transformation blogs
   - Podcast appearances (backlinks from show notes)
   - LinkedIn articles (social signals)

5. **Local & Startup Communities** (2-3 links)
   - Startup accelerator partnerships
   - Local technology meet-up sponsorships
   - Business improvement partnerships

### Link Building Action Items
- [ ] Create outreach list (20+ targets)
- [ ] Develop media kit (1-2 pages)
- [ ] Prepare guest post pitches (3 topics)
- [ ] Document case study permission framework
- [ ] Track all acquired links in spreadsheet

---

## 8. Implementation Timeline (8-Week Rollout) (80 lines)

### Week 1-2: Technical Foundation (Quick Wins)
**Ownership: Dev Team**

Priority tasks:
1. Add missing schema markup
   - Article schema for all blog posts
   - Service schema component
   - BreadcrumbList schema
2. Create/update robots.txt
3. Add H1 tags to all pages (proper hierarchy)
4. Implement image alt text on optimized images
5. Add missing meta tags (robots, language, revisit-after)

Deliverables: Pull request with SEO enhancements
Timeline: 4 days

### Week 2-3: Content Preparation
**Ownership: Content + Dev**

1. Expand 5 blog articles (500 → 1,500 words)
   - Add subheadings (H2/H3)
   - Enhance with data/examples
   - Add internal links
2. Create article meta schema (dynamic)
3. Build content calendar (monthly topics)
4. Keyword research completion

Timeline: 8 days

### Week 3: Local SEO Launch
**Ownership: Marketing**

1. Optimize Google Business Profile
   - Complete all fields
   - Upload 10+ photos
   - Enable messaging
2. Create location-specific landing pages (2-3)
3. Submit to Nigerian directories (5 listings)
4. Craft local link outreach list

Timeline: 5 days

### Week 4: On-Page Optimization
**Ownership: Dev + Content**

1. Implement dynamic meta tags helper
2. Update all page titles/descriptions
3. Build internal linking structure
   - Services → related articles
   - Blog → CTA links
4. Test with Google Search Console

Timeline: 6 days

### Week 5: Blog Authority Building
**Ownership: Content**

1. Publish 2 long-form articles (1,500+ words)
2. Create downloadable resources (audit checklist PDF)
3. Update existing articles with fresh content
4. Optimize all articles for featured snippets (FAQ format)

Timeline: 7 days

### Week 6: Link Building Launch
**Ownership: Marketing/Dev**

1. Finalize link outreach targets (20+)
2. Launch guest post pitches (3)
3. Contact local organizations (partnerships)
4. Gather case study backlink opportunities

Timeline: 5 days

### Week 7: Monitoring & Adjustment
**Ownership: Marketing**

1. Submit sitemap to Google Search Console
2. Set up Analytics 4 goals (contact form, consultation)
3. Create ranking tracking spreadsheet
4. Monitor search performance (initial data)

Timeline: 4 days

### Week 8: Testing & Reporting
**Ownership: All**

1. Mobile-friendliness test (Google Mobile-Friendly Tool)
2. Page speed audit (Google PageSpeed Insights)
3. Meta tag validation
4. Compile initial SEO audit report

Timeline: 3 days

**Success Metrics at Week 8:**
- All 5 target pages indexed in Google
- 10+ blog articles with Article schema
- 15+ backlink prospects contacted
- 2 long-form articles published
- Google Business Profile fully optimized

---

## 9. Measurement & Tracking (60 lines)

### Key Performance Indicators (KPIs)

**Organic Search Performance (Monthly):**
- Organic traffic (Google Analytics 4)
- Keyword rankings (target 10-20 keywords)
- Click-through rate (CTR) from search
- Average position in search results
- Impressions vs. clicks ratio

**On-Site Engagement:**
- Pages per session (target: 2.0+)
- Average session duration (target: 2+ minutes)
- Bounce rate (target: <55%)
- Goal conversions (contact form, consultation booking)

**Content Performance:**
- Top 5 performing pages (traffic & engagement)
- Articles generating backlinks
- Internal click patterns
- Scroll depth on blog articles

**Technical Metrics:**
- Core Web Vitals (LCP, FID, CLS)
- Page load time (target: <3 seconds)
- Mobile usability issues
- Crawl errors in Search Console

### Tools Setup

1. **Google Search Console**
   - Verify property with DNS record
   - Submit sitemap
   - Monitor indexation status
   - Track search performance
   - Fix crawl errors

2. **Google Analytics 4**
   - Track organic traffic source
   - Set up conversion tracking (contacts, bookings)
   - Create custom segments for organic users
   - Enable Google Signals (demographic data)

3. **Rank Tracking (Free/Paid Options)**
   - Semrush free tier (5 projects)
   - SE Ranking (basic tier)
   - Google Search Console (built-in)

4. **Backlink Monitoring**
   - Google Search Console links report
   - Ahrefs free backlink checker
   - Monitor.com for backlink alerts

### Reporting Schedule

**Weekly (Internal):**
- Google Search Console indexation status
- Any crawl/manual penalties
- Core Web Vitals status

**Bi-Weekly (Marketing Review):**
- Organic traffic trends
- Top 5 performing pages
- Keyword ranking movements
- New backlinks acquired

**Monthly (Executive Report):**
- Organic traffic + YoY comparison
- Keyword visibility score
- Conversion performance (organic → contact)
- ROI estimate
- Recommendations for next month

### Success Targets (8 Weeks & Beyond)

**Week 8 Targets:**
- 10-15 indexed pages (core + articles)
- 0-5 organic impressions/day (initial phase)
- 0-1 organic click/day
- 5+ backlinks acquired

**3-Month Targets (end of Q1 2026):**
- 200+ indexed pages
- 50+ keyword rankings
- 50-100 organic visits/month
- 10-15 monthly goal completions (contacts)
- 15+ quality backlinks

**6-Month Targets (end of Q2 2026):**
- 300+ pages indexed
- 100+ keyword rankings
- 300-500 organic visits/month
- 40-60 monthly goal completions
- 25+ quality backlinks

**12-Month Targets (end of 2026):**
- 500+ organic monthly visitors
- 200+ keyword rankings
- Top 10 positions for 15+ primary keywords
- 100+ monthly goal completions
- $50K+ estimated revenue attributed to organic

---

## Quick Reference: Priority Actions Next 30 Days

1. **Technical (Days 1-7)**
   - [ ] Add Article schema to all blog posts
   - [ ] Add Service schema to services page
   - [ ] Create robots.txt
   - [ ] Add H1 tags properly

2. **Content (Days 8-21)**
   - [ ] Expand 2 blog articles to 1,500+ words
   - [ ] Create internal linking strategy document
   - [ ] Research 20 keyword targets
   - [ ] Plan 3 new articles

3. **Local SEO (Days 15-21)**
   - [ ] Optimize Google Business Profile
   - [ ] Create location landing pages
   - [ ] Submit to 5 Nigerian directories

4. **Link Building (Days 22-30)**
   - [ ] Create outreach list (20 targets)
   - [ ] Write guest post pitches
   - [ ] Contact 10 local organizations

5. **Monitoring (Days 25-30)**
   - [ ] Set up Google Search Console
   - [ ] Set up Google Analytics 4
   - [ ] Create ranking tracking spreadsheet

---

**End of Document**

File generated for Harjota website SEO optimization planning. Implementation by development and marketing teams.
