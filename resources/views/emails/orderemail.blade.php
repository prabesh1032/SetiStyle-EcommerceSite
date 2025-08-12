<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Update - SetiStyle</title>
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
            padding: 40px 30px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .email-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 200%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="50" cy="50" r="2" fill="%23ffffff10"/><circle cx="20" cy="20" r="1" fill="%23ffffff08"/><circle cx="80" cy="30" r="1.5" fill="%23ffffff12"/><circle cx="30" cy="70" r="1" fill="%23ffffff08"/><circle cx="70" cy="80" r="2" fill="%23ffffff10"/></svg>');
            animation: float 20s infinite linear;
        }
        @keyframes float {
            0% { transform: translateX(-100%) rotate(0deg); }
            100% { transform: translateX(100%) rotate(360deg); }
        }
        .logo {
            font-size: 32px;
            font-weight: bold;
            color: white;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
            position: relative;
            z-index: 1;
        }
        .header-subtitle {
            color: rgba(255, 255, 255, 0.9);
            font-size: 16px;
            position: relative;
            z-index: 1;
        }
        .email-body {
            padding: 40px 30px;
        }
        .greeting {
            font-size: 24px;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 20px;
        }
        .status-card {
            background: linear-gradient(135deg, #06b6d4 0%, #8b5cf6 100%);
            border-radius: 15px;
            padding: 25px;
            margin: 30px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .status-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            animation: shimmer 3s infinite;
        }
        @keyframes shimmer {
            0% { left: -100%; }
            100% { left: 100%; }
        }
        .status-label {
            color: rgba(255, 255, 255, 0.8);
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 8px;
        }
        .status-value {
            color: white;
            font-size: 28px;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }
        .message-text {
            color: #4b5563;
            font-size: 16px;
            margin: 20px 0;
        }
        .features-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin: 30px 0;
        }
        .feature-item {
            text-align: center;
            padding: 20px;
            background: linear-gradient(135deg, #f0f9ff 0%, #e0e7ff 100%);
            border-radius: 12px;
            border: 1px solid #e0e7ff;
        }
        .feature-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #06b6d4 0%, #8b5cf6 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
            color: white;
            font-size: 18px;
            font-weight: bold;
        }
        .feature-text {
            color: #4b5563;
            font-size: 12px;
            font-weight: 500;
        }
        .cta-section {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border-radius: 15px;
            padding: 25px;
            text-align: center;
            margin: 30px 0;
            border: 1px solid #e2e8f0;
        }
        .cta-button {
            display: inline-block;
            background: linear-gradient(135deg, #06b6d4 0%, #8b5cf6 100%);
            color: white;
            text-decoration: none;
            padding: 15px 30px;
            border-radius: 25px;
            font-weight: 600;
            font-size: 16px;
            box-shadow: 0 10px 25px rgba(6, 182, 212, 0.3);
            transition: all 0.3s ease;
        }
        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(6, 182, 212, 0.4);
        }
        .email-footer {
            background: #1f2937;
            color: #9ca3af;
            text-align: center;
            padding: 30px;
        }
        .footer-brand {
            color: white;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .footer-text {
            font-size: 14px;
            margin: 5px 0;
        }
        .social-links {
            margin: 20px 0;
        }
        .social-link {
            display: inline-block;
            width: 35px;
            height: 35px;
            background: linear-gradient(135deg, #06b6d4 0%, #8b5cf6 100%);
            border-radius: 50%;
            margin: 0 8px;
            line-height: 35px;
            color: white;
            text-decoration: none;
            font-weight: bold;
        }
        @media (max-width: 600px) {
            .email-container {
                margin: 20px;
                border-radius: 15px;
            }
            .email-header, .email-body {
                padding: 30px 20px;
            }
            .features-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }
            .greeting {
                font-size: 20px;
            }
            .status-value {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="email-header">
            <div class="logo">SetiStyle</div>
            <div class="header-subtitle">Your Premium Shopping Experience</div>
        </div>

        <!-- Body -->
        <div class="email-body">
            <div class="greeting">Hello {{ $name }}! 👋</div>

            <p class="message-text">
                Great news! We have an exciting update about your recent order with us.
            </p>

            <!-- Status Card -->
            <div class="status-card">
                <div class="status-label">Order Status</div>
                <div class="status-value">{{ strtoupper($status) }}</div>
            </div>

            <p class="message-text">
                Thank you for choosing SetiStyle for your shopping needs. We're committed to providing you with the best products and service experience.
            </p>

            <!-- Features Grid -->
            <div class="features-grid">
                <div class="feature-item">
                    <div class="feature-icon">🚀</div>
                    <div class="feature-text">Fast Delivery</div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">✨</div>
                    <div class="feature-text">Quality Products</div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">🔒</div>
                    <div class="feature-text">Secure Shopping</div>
                </div>
            </div>

            <!-- Call to Action -->
            <div class="cta-section">
                <p style="margin: 0 0 20px 0; color: #4b5563; font-size: 16px;">
                    Continue exploring our amazing collection
                </p>
                <a href="#" class="cta-button">Shop More Products</a>
            </div>
        </div>

        <!-- Footer -->
        <div class="email-footer">
            <div class="footer-brand">SetiStyle</div>
            <div class="footer-text">Premium Quality • Fast Delivery • Secure Shopping</div>
            <div class="footer-text">Thank you for being our valued customer!</div>

            <div class="social-links">
                <a href="#" class="social-link">f</a>
                <a href="#" class="social-link">t</a>
                <a href="#" class="social-link">i</a>
            </div>

            <div class="footer-text" style="margin-top: 20px; font-size: 12px; color: #6b7280;">
                © 2024 SetiStyle. All rights reserved.<br>
                This email was sent regarding your recent order update.
            </div>
        </div>
    </div>
</body>
</html>
