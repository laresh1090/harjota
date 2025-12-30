# Harjota cPanel Deployment Guide
**Date**: December 30, 2024
**Platform**: TrueHost cPanel Hosting

---

## Overview

This guide explains how to set up automatic deployment from your GitHub repository to your TrueHost cPanel hosting account using Git Version Control.

## Prerequisites

Before you begin, ensure you have:

1. ✅ **cPanel Account**: Active TrueHost cPanel hosting account
2. ✅ **SSH Access**: SSH/Terminal access to your cPanel (optional but recommended)
3. ✅ **GitHub Repository**: Your code is pushed to https://github.com/laresh1090/harjota.git
4. ✅ **Domain**: Your domain is pointed to TrueHost nameservers
5. ✅ **PHP Version**: PHP 8.1 or higher (Laravel 11 requirement)
6. ✅ **Composer Access**: Composer installed on your cPanel (most cPanel servers have this)

---

## Step 1: Configure `.cpanel.yml` File

The `.cpanel.yml` file has been created in your repository root. Before deployment, you **MUST** update these variables:

### Open `.cpanel.yml` and update:

```yaml
- export CPANEL_USERNAME=your_cpanel_username_here    # Change this
- export DOMAIN=your_domain_here.com                  # Change this
```

### Example Configuration:

If your cPanel username is `harjota` and your domain is `harjota.com`:

```yaml
- export CPANEL_USERNAME=harjota
- export DOMAIN=harjota.com
```

### Save and commit the changes:

```bash
git add .cpanel.yml
git commit -m "Configure cPanel deployment settings"
git push origin master
```

---

## Step 2: Set Up Git Repository in cPanel

1. **Log in to cPanel**
   - Go to https://yourdomain.com:2083 (or TrueHost's cPanel URL)
   - Enter your cPanel credentials

2. **Access Git Version Control**
   - Navigate to: **Files** → **Git™ Version Control**

3. **Create Repository**
   - Click **Create** button
   - Fill in the form:
     - **Clone URL**: `https://github.com/laresh1090/harjota.git`
     - **Repository Path**: `/home/your_username/repositories/harjota`
     - **Repository Name**: `harjota` (or any name you prefer)
   - Click **Create** button

4. **Verify Repository**
   - You should see your repository listed
   - Status should show as "Up to date"

---

## Step 3: Set Up Environment Variables

Laravel requires a `.env` file with production settings. You need to create this **directly on the server**.

### Option A: Via cPanel File Manager

1. Go to **Files** → **File Manager**
2. Navigate to `/home/your_username/laravel_app/`
3. Create a new file named `.env`
4. Copy the contents below and update with your production values:

```env
APP_NAME=Harjota
APP_ENV=production
APP_KEY=base64:YOUR_GENERATED_APP_KEY_HERE
APP_DEBUG=false
APP_URL=https://harjota.com

APP_LOCALE=en
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=en_US

LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=error

# Database Configuration (Get these from cPanel → MySQL Databases)
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password

SESSION_DRIVER=file
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync

CACHE_STORE=file

MAIL_MAILER=smtp
MAIL_HOST=smtp.your-email-provider.com
MAIL_PORT=587
MAIL_USERNAME=your-email@harjota.com
MAIL_PASSWORD=your-email-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="info@harjota.com"
MAIL_FROM_NAME="Harjota"
```

### Option B: Via SSH Terminal

If you have SSH access:

```bash
# Connect to your server via SSH
ssh your_username@your_server_ip

# Navigate to Laravel app directory
cd /home/your_username/laravel_app

# Create .env file
cp .env.example .env

# Edit the .env file
nano .env
# (Update the values, then press Ctrl+X, Y, Enter to save)

# Generate application key
php artisan key:generate
```

---

## Step 4: Create Database

1. **Go to cPanel → MySQL® Databases**
2. **Create a New Database**:
   - Database Name: `your_username_harjota`
   - Click **Create Database**
3. **Create Database User**:
   - Username: `your_username_harjota_user`
   - Password: (Generate a strong password)
   - Click **Create User**
4. **Add User to Database**:
   - Select the user you just created
   - Select the database you just created
   - Grant **ALL PRIVILEGES**
   - Click **Add**

5. **Update `.env` file** with these database credentials

---

## Step 5: Configure PHP Version

Laravel 11 requires **PHP 8.1+**. Ensure your cPanel is using the correct version:

1. Go to **Software** → **MultiPHP Manager**
2. Select your domain
3. Set PHP Version to **8.1** or higher
4. Click **Apply**

---

## Step 6: Deploy Your Application

### Automatic Deployment (Recommended)

Once everything is configured, deployment happens automatically:

1. **Make changes locally** to your code
2. **Commit and push** to GitHub:
   ```bash
   git add .
   git commit -m "Your commit message"
   git push origin master
   ```
3. **Automatic deployment triggers** via the post-receive hook
4. Your site updates automatically!

### Manual Deployment

If you need to manually trigger deployment:

1. Go to **cPanel** → **Git™ Version Control**
2. Click **Manage** next to your repository
3. Go to **Pull or Deploy** tab
4. Click **Update from Remote** (pulls latest changes from GitHub)
5. Click **Deploy HEAD Commit** (runs the `.cpanel.yml` deployment tasks)

---

## Step 7: Configure Web Server (Important!)

By default, cPanel serves files from `public_html`. Laravel needs special configuration.

### Option A: Update `.htaccess` in `public_html`

Create or edit `/home/your_username/public_html/.htaccess`:

```apache
<IfModule mod_rewrite.c>
    RewriteEngine On

    # Redirect all requests to Laravel's public directory
    RewriteCond %{REQUEST_URI} !^/public/
    RewriteRule ^(.*)$ /public/$1 [L]
</IfModule>
```

### Option B: Change Document Root (Recommended)

1. Go to **cPanel** → **Domains**
2. Click the domain you want to configure
3. Change **Document Root** from:
   - `/home/your_username/public_html`
   - To: `/home/your_username/public_html/public` (or `/home/your_username/laravel_app/public`)
4. Click **Submit**

**Note**: This depends on your `.cpanel.yml` configuration. If you're copying files to `public_html`, use `/public_html`. If you're using the app directory approach, point to `/laravel_app/public`.

---

## Step 8: Run Initial Deployment

After everything is configured:

```bash
# On your local machine
git add .cpanel.yml DEPLOYMENT-GUIDE.md
git commit -m "Add cPanel deployment configuration

🤖 Generated with [Claude Code](https://claude.com/claude-code)

Co-Authored-By: Claude Sonnet 4.5 <noreply@anthropic.com>"
git push origin master
```

Then in cPanel:

1. Go to **Git™ Version Control** → **Manage** → **Pull or Deploy**
2. Click **Update from Remote**
3. Click **Deploy HEAD Commit**
4. Monitor the deployment log for any errors

---

## Step 9: Post-Deployment Tasks

### Run Database Migrations

Via SSH:
```bash
cd /home/your_username/laravel_app
php artisan migrate --force
```

Or via cPanel Terminal (if available):
1. Go to **Advanced** → **Terminal**
2. Run the commands above

### Clear Caches

```bash
cd /home/your_username/laravel_app
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear
```

### Set Permissions

```bash
chmod -R 755 /home/your_username/laravel_app/storage
chmod -R 755 /home/your_username/laravel_app/bootstrap/cache
```

---

## Step 10: Verify Deployment

1. **Visit your website**: https://harjota.com
2. **Check for errors**: If you see errors, check:
   - `.env` file is configured correctly
   - Database connection is working
   - PHP version is 8.1+
   - File permissions are correct

### Common Issues & Solutions

| Issue | Solution |
|-------|----------|
| **500 Internal Server Error** | Check `.env` file exists and `APP_KEY` is set. Run `php artisan key:generate` |
| **403 Forbidden** | Check file permissions: `chmod -R 755 storage bootstrap/cache` |
| **Database Connection Failed** | Verify database credentials in `.env` file |
| **Composer Not Found** | Contact TrueHost support to install Composer, or upload `vendor` directory manually |
| **Route Not Found** | Run `php artisan route:clear && php artisan route:cache` |

---

## Deployment Workflow Summary

```
┌─────────────────────────────────────────────────────────────┐
│                   DEVELOPMENT (Local)                       │
│                                                             │
│  1. Make code changes                                       │
│  2. Test locally (php artisan serve)                        │
│  3. Commit changes (git commit)                             │
│  4. Push to GitHub (git push origin master)                 │
└─────────────────────┬───────────────────────────────────────┘
                      │
                      ▼
┌─────────────────────────────────────────────────────────────┐
│                   GITHUB REPOSITORY                         │
│                                                             │
│  https://github.com/laresh1090/harjota.git                  │
│  (Code is stored here)                                      │
└─────────────────────┬───────────────────────────────────────┘
                      │
                      ▼
┌─────────────────────────────────────────────────────────────┐
│              CPANEL GIT VERSION CONTROL                     │
│                                                             │
│  • Pulls changes from GitHub                                │
│  • Triggers post-receive hook                               │
│  • Executes .cpanel.yml tasks                               │
└─────────────────────┬───────────────────────────────────────┘
                      │
                      ▼
┌─────────────────────────────────────────────────────────────┐
│                 PRODUCTION SERVER                           │
│                                                             │
│  • Files deployed to /laravel_app                           │
│  • Public assets to /public_html                            │
│  • Composer dependencies installed                          │
│  • Laravel caches optimized                                 │
│  • Site is LIVE at https://harjota.com                      │
└─────────────────────────────────────────────────────────────┘
```

---

## Maintenance & Updates

### Deploying New Changes

Simply push to GitHub:
```bash
git add .
git commit -m "Update services page pricing"
git push origin master
```

The site will update automatically within seconds!

### Manual Cache Clearing (If Needed)

If changes don't appear immediately:
```bash
cd /home/your_username/laravel_app
php artisan config:clear
php artisan cache:clear
php artisan view:clear
```

### Monitoring Deployments

Check deployment logs:
```bash
cat /home/your_username/laravel_app/storage/logs/deployment.log
```

---

## Security Checklist

Before going live, ensure:

- [ ] `.env` file has `APP_ENV=production`
- [ ] `.env` file has `APP_DEBUG=false`
- [ ] `.env` file is **NOT** in Git (it's in `.gitignore`)
- [ ] Strong database password is set
- [ ] File permissions are correct (755 for directories, 644 for files)
- [ ] SSL certificate is installed (HTTPS)
- [ ] `vendor` directory is generated on server (via Composer)
- [ ] All sensitive files are excluded from Git

---

## Support & Troubleshooting

### TrueHost Support
- **Email**: support@truehost.com
- **Phone**: Check TrueHost website
- **Knowledge Base**: https://truehost.com/help

### Laravel Documentation
- **Deployment Guide**: https://laravel.com/docs/11.x/deployment
- **Configuration**: https://laravel.com/docs/11.x/configuration

### Need Help?
If you encounter issues, check:
1. cPanel deployment logs
2. Laravel logs: `/home/your_username/laravel_app/storage/logs/laravel.log`
3. Apache error logs (available in cPanel → Errors)

---

## What's Next?

After successful deployment:

1. ✅ **Set up SSL**: cPanel → SSL/TLS → Install free Let's Encrypt certificate
2. ✅ **Configure Backups**: cPanel → Backup → Enable automatic backups
3. ✅ **Set up Email**: cPanel → Email Accounts → Create info@harjota.com
4. ✅ **Monitor Performance**: Use tools like Google Analytics, PageSpeed Insights
5. ✅ **Implement Phase 1**: Launch IDIA pilot projects (see strategic plan)

---

**Deployment Status**: ⏳ Pending Initial Setup
**Last Updated**: December 30, 2024
