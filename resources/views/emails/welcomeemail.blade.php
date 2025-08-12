<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to SetiStyle</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #f0f9ff 0%, #e0e7ff 100%);
            line-height: 1.6;
        }
        .email-container {
            max-width: 600px;
            margin: 40px auto;
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .email-header {
            background: linear-gradient(135deg, #06b6d4 0%, #8b5cf6 100%);
            padding: 50px 30px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .email-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><circle cx="100" cy="100" r="3" fill="%23ffffff15"/><circle cx="300" cy="200" r="2" fill="%23ffffff10"/><circle cx="700" cy="150" r="4" fill="%23ffffff12"/><circle cx="500" cy="300" r="2" fill="%23ffffff08"/><circle cx="200" cy="400" r="3" fill="%23ffffff15"/><circle cx="800" cy="350" r="2" fill="%23ffffff10"/><circle cx="150" cy="600" r="3" fill="%23ffffff12"/><circle cx="600" cy="500" r="2" fill="%23ffffff08"/><circle cx="900" cy="600" r="4" fill="%23ffffff15"/></svg>');
            animation: sparkle 15s infinite linear;
        }
        @keyframes sparkle {
            0% { opacity: 0.3; transform: scale(1) rotate(0deg); }
            50% { opacity: 0.8; transform: scale(1.1) rotate(180deg); }
            100% { opacity: 0.3; transform: scale(1) rotate(360deg); }
        }
        .welcome-badge {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 50px;
            padding: 15px 30px;
            display: inline-block;
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
        }
        .welcome-text {
            color: rgba(255, 255, 255, 0.9);
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: 600;
        }
        .logo {
            font-size: 36px;
            font-weight: bold;
            color: white;
            margin-bottom: 15px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            position: relative;
            z-index: 1;
        }
        .header-subtitle {
            color: rgba(255, 255, 255, 0.9);
            font-size: 18px;
            position: relative;
            z-index: 1;
        }
        .email-body {
            padding: 50px 30px;
        }
        .greeting {
            font-size: 28px;
            font-weight: 700;
            background: linear-gradient(135deg, #06b6d4 0%, #8b5cf6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-align: center;
            margin-bottom: 25px;
        }
        .welcome-message {
            color: #4b5563;
            font-size: 18px;
            text-align: center;
            margin: 25px 0;
            line-height: 1.7;
        }
        .highlight-box {
            background: linear-gradient(135deg, #06b6d4 0%, #8b5cf6 100%);
            border-radius: 20px;
            padding: 30px;
            margin: 35px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .highlight-box::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: pulse-glow 4s infinite;
        }
        @keyframes pulse-glow {
            0%, 100% { transform: scale(0.8) rotate(0deg); opacity: 0.3; }
            50% { transform: scale(1.2) rotate(180deg); opacity: 0.6; }
        }
        .highlight-content {
            position: relative;
            z-index: 1;
        }
        .highlight-title {
            color: white;
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 15px;
        }
        .highlight-text {
            color: rgba(255, 255, 255, 0.9);
            font-size: 16px;
        }
        .benefits-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
            margin: 40px 0;
        }
        .benefit-item {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            padding: 25px;
            border-radius: 15px;
            text-align: center;
            border: 2px solid #e2e8f0;
            transition: all 0.3s ease;
        }
        .benefit-item:hover {
            border-color: #06b6d4;
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(6, 182, 212, 0.2);
        }
        .benefit-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #06b6d4 0%, #8b5cf6 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            font-size: 24px;
            box-shadow: 0 10px 25px rgba(6, 182, 212, 0.3);
        }
        .benefit-title {
            color: #1f2937;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 8px;
        }
        .benefit-text {
            color: #6b7280;
            font-size: 14px;
        }
        .cta-section {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border-radius: 20px;
            padding: 40px;
            text-align: center;
            margin: 40px 0;
            border: 1px solid #e2e8f0;
        }
        .cta-title {
            color: #1f2937;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 15px;
        }
        .cta-text {
            color: #6b7280;
            font-size: 16px;
            margin-bottom: 30px;
        }
        .cta-button {
            display: inline-block;
            background: linear-gradient(135deg, #06b6d4 0%, #8b5cf6 100%);
            color: white;
            text-decoration: none;
            padding: 18px 40px;
            border-radius: 30px;
            font-weight: 600;
            font-size: 18px;
            box-shadow: 0 15px 35px rgba(6, 182, 212, 0.4);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        .cta-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s;
        }
        .cta-button:hover::before {
            left: 100%;
        }
        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 20px 40px rgba(6, 182, 212, 0.5);
        }
        .email-footer {
            background: #1f2937;
            color: #9ca3af;
            text-align: center;
            padding: 40px 30px;
        }
        .footer-brand {
            color: white;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 15px;
        }
        .footer-tagline {
            color: #06b6d4;
            font-size: 16px;
            margin-bottom: 20px;
            font-weight: 500;
        }
        .footer-text {
            font-size: 14px;
            margin: 8px 0;
            line-height: 1.6;
        }
        .social-links {
            margin: 25px 0;
        }
        .social-link {
            display: inline-block;
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #06b6d4 0%, #8b5cf6 100%);
            border-radius: 50%;
            margin: 0 10px;
            line-height: 40px;
            color: white;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        .social-link:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(6, 182, 212, 0.4);
        }
        .divider {
            height: 2px;
            background: linear-gradient(90deg, transparent, #06b6d4, #8b5cf6, transparent);
            margin: 30px 0;
            border-radius: 1px;
        }
        @media (max-width: 600px) {
            .email-container {
                margin: 20px;
                border-radius: 15px;
            }
            .email-header, .email-body {
                padding: 30px 20px;
            }
            .benefits-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            .greeting {
                font-size: 24px;
            }
            .cta-section {
                padding: 30px 20px;
            }
            .logo {
                font-size: 28px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="email-header">
            <div class="welcome-badge">
                <div class="welcome-text">Welcome to</div>
            </div>
            <div class="logo">SetiStyle</div>
            <div class="header-subtitle">Your Premium Shopping Destination</div>
        </div>

        <!-- Body -->
        <div class="email-body">
            <div class="greeting">Hello {{ $name }}! 🎉</div>

            <p class="welcome-message">
                Congratulations and welcome to the SetiStyle family! We're absolutely thrilled to have you join our community of style enthusiasts and savvy shoppers.
            </p>

            <!-- Highlight Box -->
            <div class="highlight-box">
                <div class="highlight-content">
                    <div class="highlight-title">🚀 Your Style Journey Begins Now!</div>
                    <div class="highlight-text">
                        Get ready to explore exclusive deals, premium products, and an amazing shopping experience tailored just for you.
                    </div>
                </div>
            </div>

            <p class="welcome-message">
                As a new member, you now have access to our entire collection of premium products, exclusive member offers, and priority customer support.
            </p>

            <!-- Benefits Grid -->
            <div class="benefits-grid">
                <div class="benefit-item">
                    <div class="benefit-icon">🛍️</div>
                    <div class="benefit-title">Exclusive Deals</div>
                    <div class="benefit-text">Access to member-only discounts and special offers</div>
                </div>
                <div class="benefit-item">
                    <div class="benefit-icon">⚡</div>
                    <div class="benefit-title">Fast Delivery</div>
                    <div class="benefit-text">Quick and reliable shipping to your doorstep</div>
                </div>
                <div class="benefit-item">
                    <div class="benefit-icon">💎</div>
                    <div class="benefit-title">Premium Quality</div>
                    <div class="benefit-text">Carefully curated products of the highest quality</div>
                </div>
                <div class="benefit-item">
                    <div class="benefit-icon">🔒</div>
                    <div class="benefit-title">Secure Shopping</div>
                    <div class="benefit-text">Safe and secure payment processing</div>
                </div>
            </div>

            <!-- Call to Action -->
            <div class="cta-section">
                <div class="cta-title">Ready to Start Shopping?</div>
                <div class="cta-text">
                    Explore our amazing collection and discover your new favorite products today!
                </div>
                <a href="#" class="cta-button">Start Shopping Now</a>
            </div>

            <div class="divider"></div>

            <p class="welcome-message">
                If you have any questions or need assistance, our friendly customer support team is always here to help. Welcome aboard, and happy shopping!
            </p>
        </div>

        <!-- Footer -->
        <div class="email-footer">
            <div class="footer-brand">SetiStyle</div>
            <div class="footer-tagline">Where Style Meets Quality</div>
            <div class="footer-text">Thank you for choosing us as your shopping destination!</div>
            <div class="footer-text">We're excited to be part of your style journey.</div>

            <div class="social-links">
                <a href="#" class="social-link">f</a>
                <a href="#" class="social-link">t</a>
                <a href="#" class="social-link">i</a>
                <a href="#" class="social-link">@</a>
            </div>

            <div class="footer-text" style="margin-top: 25px; font-size: 12px; color: #6b7280;">
                © 2024 SetiStyle. All rights reserved.<br>
                You're receiving this email because you recently created an account with us.<br>
                Welcome to our community!
            </div>
        </div>
    </div>
</body>
</html>
