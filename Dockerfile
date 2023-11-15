FROM sail-8.2/app

# Include original instructions from vendor Dockerfile
COPY --chown=www-data:www-data vendor/laravel/sail/runtimes/8.2/ /etc/

# Include your custom Nginx configuration
COPY sail-nginx.conf /etc/nginx/conf.d/sail-nginx.conf
