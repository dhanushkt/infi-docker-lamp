# Use the mattrayner/lamp:0.8.0-2004-php8 image as the base
# ubuntu 20.04.3 LTS (focal)
# Apache 2.4.41 (Ubuntu)
# PHP 8.0.10 (cli)
# mysql 8.0.26-0ubuntu0.20.04.2
# phpMyAdmin 5.1.1
FROM mattrayner/lamp:0.8.0-2004-php8

# Copy custom dashboard PHP app
COPY ./dashboard /var/www/html/dashboard

# Create a directory to hold .sql import file
RUN mkdir -p /docker-entrypoint-initdb.d

# Copy the custom script to initialize the database
COPY ./create_mysql_users.sh /create_mysql_users.sh

# Ensure the script is executable
RUN chmod +x /create_mysql_users.sh

# Install the PHP SSH2 extension
RUN apt update && apt install -y \
    php8.0-ssh2 \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Expose the ports
EXPOSE 80 3306

# Set the environment variable for MySQL Password 
# (remove it to generate random password and output in docker logs)
ENV MYSQL_ADMIN_PASS=mySQLdbdefaultpassword

# Start the services
CMD ["/run.sh"]