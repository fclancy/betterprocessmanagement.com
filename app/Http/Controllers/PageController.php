<?php

namespace App\Http\Controllers;

use App\Models\GalleryItem;
use App\Models\PageContent;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    /**
     * Display a static page using CMS content with defaults.
     * Handles: home, aboutus, services, contact, faq, privacy, terms, blue-ocean
     */
    public function show($page = null)
    {
        $routeName = request()->route()->getName();
        $pageKey = str_replace(['.', '-'], '_', $routeName);

        // Default content per page (used if no CMS entry exists)
        $defaults = [
            'about_us' => [
                'title' => 'About Us',
                'content' => '<h2>Our Story</h2><p>Better Process Management provides expert consulting services in Business Process Management (BPM), Activity-Based Management (ABM), and cost optimization.</p><h3>Our Mission</h3><p>Empower organizations to achieve peak efficiency through data-driven process improvement.</p><h3>Our Team</h3><p>With decades of experience in management consulting and IT strategy, our team brings deep expertise to every engagement.</p>',
                'meta_title' => 'About Us - Better Process Management',
                'meta_description' => 'Learn about Better Process Management, our mission, team, and history in business process consulting.'
            ],
            'services' => [
                'title' => 'Our Services',
                'content' => '<h2>Business Process Management</h2><p>We help organizations map, analyze, and optimize their core business processes.</p><h3>Key Services:</h3><ul><li>Process mapping and documentation</li><li>Process performance analysis</li><li>Workflow automation</li><li>Continuous improvement programs</li></ul><h2>Activity-Based Management</h2><p>True cost visibility through activity-based costing and management.</p><h2>Cost Optimization</h2><p>Strategic cost reduction without sacrificing quality.</p><h2>IT Strategy & Audits</h2><p>Align your technology investments with business objectives.</p>',
                'meta_title' => 'Services - Better Process Management',
                'meta_description' => 'Our consulting services include BPM, ABM, cost optimization, IT strategy, and team training.'
            ],
            'contact' => [
                'title' => 'Contact Us',
                'content' => '',
                'meta_title' => 'Contact - Better Process Management',
                'meta_description' => 'Get in touch with Better Process Management for consulting inquiries.'
            ],
            'faq' => [
                'title' => 'Frequently Asked Questions',
                'content' => '<h2>General Questions</h2><h3>What is Business Process Management (BPM)?</h3><p>BPM is a systematic approach to making an organization\'s workflow more effective, efficient, and capable of adapting to an ever-changing environment.</p><h3>How do you measure process improvement?</h3><p>We use key performance indicators (KPIs) such as cycle time, defect rates, cost per transaction, and customer satisfaction.</p><h3>What industries do you serve?</h3><p>We work with organizations across various sectors including manufacturing, healthcare, logistics, and professional services.</p>',
                'meta_title' => 'FAQ - Better Process Management',
                'meta_description' => 'Frequently asked questions about our BPM consulting services.'
            ],
            'privacy' => [
                'title' => 'Privacy Policy',
                'content' => '<h2>Privacy Policy</h2><p>This Privacy Policy describes how Better Process Management collects, uses, and discloses your personal information when you use our website and services.</p><h3>Information We Collect</h3><p>We collect information you provide directly, such as when you fill out our contact form.</p><h3>Data Retention</h3><p>We retain personal information only as long as necessary.</p><h3>Contact Us</h3><p>If you have questions, please contact us.</p>',
                'meta_title' => 'Privacy Policy - Better Process Management',
                'meta_description' => 'Privacy policy for Better Process Management website and services.'
            ],
            'terms' => [
                'title' => 'Terms of Service',
                'content' => '<h2>Terms of Service</h2><p>By accessing or using our website and services, you agree to be bound by these Terms.</p><h3>Services</h3><p>We provide business process management consulting services subject to separate engagement agreements.</p><h3>Limitation of Liability</h3><p>We shall not be liable for any indirect, incidental, or consequential damages.</p><h3>Governing Law</h3><p>These terms are governed by the laws of Ontario, Canada.</p>',
                'meta_title' => 'Terms of Service - Better Process Management',
                'meta_description' => 'Terms of service for Better Process Management consulting services.'
            ],
            'blue_ocean' => [
                'title' => 'Blue Ocean Review',
                'content' => '<h2>Blue Ocean Strategy in Process Management</h2><p>The Blue Ocean Strategy is about creating new market space and making the competition irrelevant. Applied to BPM, this means reimagining processes to deliver unprecedented value.</p><h3>Our Approach</h3><p>We help organizations break free from competitive constraints by:</p><ul><li>Identifying areas where processes can be radically simplified</li><li>Eliminating or reducing factors that the industry takes for granted</li><li>Raising or creating elements that deliver new value to customers</li><li>Building innovative process frameworks that open new markets</li></ul><h3>Get Started</h3><p>Ready to explore your Blue Ocean? Contact us for a discovery session.</p>',
                'meta_title' => 'Blue Ocean Review - Better Process Management',
                'meta_description' => 'Discover how Blue Ocean Strategy can transform your business processes and create uncontested market space.'
            ],
        ];

        $data = $defaults[$pageKey] ?? ['title' => 'Page', 'content' => '', 'meta_title' => null, 'meta_description' => null];

        // Override with CMS content if available
        $cms = PageContent::where('page_key', $pageKey)->first();
        if ($cms) {
            $data['content'] = $cms->content;
            if ($cms->meta_title) {
                $data['meta_title'] = $cms->meta_title;
            }
            if ($cms->meta_description) {
                $data['meta_description'] = $cms->meta_description;
            }
        }

        return view('pages.dynamic', $data);
    }

    /**
     * Display the homepage (special handling for featured projects).
     */
    public function home()
    {
        $featuredProjects = GalleryItem::where('is_featured', true)->take(3)->get();
        $recentProjects = GalleryItem::published()->latest()->take(6)->get();

        $title = 'Better Process Management - BPM Consulting Excellence';
        $metaDescription = 'Expert consulting in Business Process Management, Activity-Based Management, and cost optimization.';

        return view('pages.home', compact('featuredProjects', 'recentProjects', 'title', 'metaDescription'));
    }
}
