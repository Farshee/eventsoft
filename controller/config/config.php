<?php

define("Projecet_NAME", "BPDB Event Software");

define("DB_HOST", "localhost");
define("DB_NAME", "event");
define("DB_USER", "root");
define("DB_PASS", "123456");

/**
 * Configuration for: Cookies
 * Please note: The COOKIE_DOMAIN needs the domain where your app is,
 * in a format like this: .mydomain.com
 * Note the . in front of the domain. No www, no http, no slash here!
 * For local development .127.0.0.1 or .localhost is fine, but when deploying you should
 * change this to your real domain, like '.mydomain.com' ! The leading dot makes the cookie available for
 * sub-domains too.
 * @see http://stackoverflow.com/q/9618217/1114320
 * @see http://www.php.net/manual/en/function.setcookie.php
 *
 * COOKIE_RUNTIME: How long should a cookie be valid ? 1209600 seconds = 2 weeks
 * COOKIE_DOMAIN: The domain where the cookie is valid for, like '.mydomain.com'
 * COOKIE_SECRET_KEY: Put a random value here to make your app more secure. When changed, all cookies are reset.
 */
define("COOKIE_RUNTIME", 1209600);
define("COOKIE_DOMAIN", ".127.0.0.1");
define("COOKIE_SECRET_KEY", "1gp@TMPS{+$78sfpMJFe-92s");

define("EMAIL_USE_SMTP", false);
define("EMAIL_SMTP_HOST", "yourhost");
define("EMAIL_SMTP_AUTH", true);
define("EMAIL_SMTP_USERNAME", "yourusername");
define("EMAIL_SMTP_PASSWORD", "yourpassword");
define("EMAIL_SMTP_PORT", 465);
define("EMAIL_SMTP_ENCRYPTION", "ssl");

define("EMAIL_PASSWORDRESET_URL", "http://127.0.0.1/php-login-advanced/password_reset.php");
define("EMAIL_PASSWORDRESET_FROM", "no-reply@example.com");
define("EMAIL_PASSWORDRESET_FROM_NAME", "My Project");
define("EMAIL_PASSWORDRESET_SUBJECT", "Password reset for PROJECT XY");
define("EMAIL_PASSWORDRESET_CONTENT", "Please click on this link to reset your password:");

define("EMAIL_VERIFICATION_URL", "http://127.0.0.1/php-login-advanced/register.php");
define("EMAIL_VERIFICATION_FROM", "no-reply@example.com");
define("EMAIL_VERIFICATION_FROM_NAME", "My Project");
define("EMAIL_VERIFICATION_SUBJECT", "Account activation for PROJECT XY");
define("EMAIL_VERIFICATION_CONTENT", "Admin will activate your account:");

define("HASH_COST_FACTOR", "10");
