<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #f2f2f2;
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        .wrapper {
            max-width: 600px;
            margin: 40px auto;
            background: #ffffff;
        }

        .hero {
            background: #000;
            padding: 56px 40px 48px;
            overflow: hidden;
        }

        .hero-eyebrow {
            font-size: 10px;
            font-weight: 600;
            letter-spacing: 0.25em;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.45);
            margin-bottom: 16px;
        }

        .hero-title {
            font-size: 48px;
            font-weight: 900;
            line-height: 0.95;
            letter-spacing: -0.02em;
            text-transform: uppercase;
            color: #fff;
            margin-bottom: 20px;
        }

        .hero-sub {
            font-size: 14px;
            font-weight: 300;
            color: rgba(255, 255, 255, 0.65);
            line-height: 1.7;
            max-width: 360px;
        }

        .body {
            padding: 48px 40px;
            background: #fff;
        }

        .greeting {
            font-size: 22px;
            font-weight: 700;
            letter-spacing: -0.01em;
            text-transform: uppercase;
            color: #000;
            margin-bottom: 20px;
        }

        .body p {
            font-size: 14px;
            color: #444;
            line-height: 1.8;
            margin-bottom: 16px;
        }

        .cta-wrap {
            margin: 36px 0;
        }

        .cta-btn {
            display: inline-block;
            background: #000;
            color: #fff !important;
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            padding: 16px 40px;
        }

        .divider {
            border: none;
            border-top: 1px solid #e8e8e8;
            margin: 32px 0;
        }

        .notice {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            background: #f8f8f8;
            padding: 18px 20px;
            margin-bottom: 28px;
        }

        .notice-icon {
            color: #e74c3c;
            font-weight: 700;
            flex-shrink: 0;
            margin-right: 4px;
        }

        .notice p {
            font-size: 12px;
            color: #666;
            line-height: 1.6;
            margin: 0;
        }

        .notice strong {
            color: #000;
        }

        .url-fallback {
            background: #f5f5f5;
            padding: 16px 20px;
            margin-top: 16px;
        }

        .url-fallback p {
            font-size: 11px;
            color: #888;
            margin-bottom: 8px !important;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            font-weight: 600;
        }

        .url-fallback a {
            font-size: 11px;
            color: #000;
            word-break: break-all;
            line-height: 1.6;
        }

        .stripes {
            display: flex;
            gap: 4px;
            margin-bottom: 24px;
        }

        .stripe {
            width: 20px;
            height: 3px;
            background: #000;
        }

        .footer {
            background: #000;
            padding: 32px 40px;
        }

        .footer-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            padding-bottom: 24px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .footer-logo {
            font-size: 22px;
            font-weight: 900;
            color: #fff;
            letter-spacing: -0.02em;
            text-transform: uppercase;
        }

        div.footer-links {
            display: flex;
            gap: 24px;
        }

        div.footer-links a {
            font-size: 11px;
            color: rgba(255, 255, 255, 0.5);
            text-decoration: none;
            text-transform: uppercase;
        }

        .footer-bottom p {
            font-size: 11px;
            color: rgba(255, 255, 255, 0.3);
            line-height: 1.7;
        }

        .footer-bottom a {
            color: rgba(255, 255, 255, 0.5);
            text-decoration: none;
        }

        @media (max-width: 600px) {
            .wrapper {
                margin: 0;
            }

            .header,
            .hero,
            .body,
            .footer {
                padding-left: 24px;
                padding-right: 24px;
            }

            .hero-title {
                font-size: 36px;
            }

            .footer-top {
                flex-direction: column;
                align-items: flex-start;
                gap: 16px;
            }

            .notice-icon {
                margin-right: 2px
            }
        }
    </style>
</head>

<body>
    <div class="wrapper">

        <div class="hero">
            <p class="hero-eyebrow">Account Security</p>
            <h1 class="hero-title">Reset<br>Your<br>Password</h1>
            <p class="hero-sub">We received a request to reset the password associated with your account.</p>
        </div>

        <div class="body">

            <div class="stripes">
                <div class="stripe"></div>
                <div class="stripe"></div>
                <div class="stripe"></div>
            </div>

            <p class="greeting">Hello, {{ $notifiable->first_name ?? $notifiable->name }}!</p>

            <p>
                We received a password reset request for your Toko Sepatu Adidas account.
                Click the button below to set a new password. If you didn't request this,
                you can safely ignore this email — your account remains secure.
            </p>

            <div class="cta-wrap">
                <a href="{{ $url }}" class="cta-btn">Reset Password</a>
            </div>

            <div class="notice">
                <span class="notice-icon">!</span>
                <p>
                    <strong>This link expires in 60 minutes.</strong><br>
                    After that, you'll need to submit a new password reset request
                    from the login page.
                </p>
            </div>

            <hr class="divider">

            <p style="font-size:13px; color:#888;">
                If you're having trouble clicking the button above, copy and paste
                the URL below into your browser:
            </p>

            <div class="url-fallback">
                <p>Reset Link</p>
                <a href="{{ $url }}">{{ $url }}</a>
            </div>

        </div>

        <div class="footer">
            <div class="footer-bottom">
                <p>
                    &copy; {{ date('Y') }} Toko Sepatu Adidas. All rights reserved.<br>
                    You're receiving this because a password reset was requested for
                    <a href="#">{{ $notifiable->email }}</a>.
                    If this wasn't you, no action is needed.
                </p>
            </div>
        </div>

    </div>
</body>

</html>