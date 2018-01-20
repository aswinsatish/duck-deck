FROM centos:latest
RUN yum -y update
RUN yum install -y https://dl.fedoraproject.org/pub/epel/epel-release-latest-7.noarch.rpm && \
    yum install -y http://rpms.remirepo.net/enterprise/remi-release-7.rpm 

RUN yum install yum-utils && \
    yum-config-manager --enable remi-php70 && \
    yum update -y && \
    yum install -y \
    php70-php.x86_64 \
    php70-php-bcmath.x86_64 \
    php70-php-cli.x86_64 \
    php70-php-common.x86_64 \
    php70-php-devel.x86_64 \
    php70-php-gd.x86_64 \
    php70-php-intl.x86_64 \
    php70-php-json.x86_64 \
    php70-php-mbstring.x86_64 \
    php70-php-mcrypt.x86_64 \
    php70-php-mysqlnd.x86_64 \
    php70-php-mysqlnd.x86_64 \
    php70-php-pdo.x86_64 \
    php70-php-pear.noarch \
    php70-php-xml.x86_64 \
    php70-php-ast.x86_64 \
    php70-php-opcache.x86_64 \
    php70-php-pecl-zip.x86_64 \
    php70-php-pecl-memcached.x86_64 && \
    ln -s /usr/bin/php70 /usr/bin/php && \
    ln -s /etc/opt/remi/php70/php.ini /etc/php.ini && \
    ln -s /etc/opt/remi/php70/php.d /etc/php.d && \
    ln -s /etc/opt/remi/php70/pear.conf /etc/pear.conf && \
    ln -s /etc/opt/remi/php70/pear /etc/pear

RUN yum install -y httpd-devel.x86_64 nano wget memcached git unzip
RUN yum install -y mysql vim
RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

RUN usermod -u 1000 apache && ln -sf /dev/stdout /var/log/httpd/access_log && ln -sf /dev/stderr /var/log/httpd/error_log

RUN unlink /etc/localtime && ln -s /usr/share/zoneinfo/Europe/London /etc/localtime

RUN rm /etc/httpd/conf.d/welcome.conf \
    && sed -i -e "s/Options\ Indexes\ FollowSymLinks/Options\ -Indexes\ +FollowSymLinks/g" /etc/httpd/conf/httpd.conf \
    && sed -i -e "s/AllowOverride\ None/AllowOverride\ All/g" /etc/httpd/conf/httpd.conf \
    && echo "FileETag None" >> /etc/httpd/conf/httpd.conf \
    && sed -i -e "s/expose_php\ =\ On/expose_php\ =\ Off/g" /etc/opt/remi/php70/php.ini \
    && sed -i -e "s/short_open_tag\ =\ Off/short_open_tag\ =\ On/g" /etc/opt/remi/php70/php.ini \	
    && sed -i -e "s/\;error_log\ =\ php_errors\.log/error_log\ =\ \/var\/log\/php_errors\.log/g" /etc/opt/remi/php70/php.ini \
    && echo "ServerTokens Prod" >> /etc/httpd/conf/httpd.conf \
    && echo "ServerSignature Off" >> /etc/httpd/conf/httpd.conf


COPY . /src
RUN rm -rf /var/www/html && mv /src /var/www/html &&\
    find /var/www/html/ -type d -exec chmod 755 {} \; &&\
    find /var/www/html/ -type f -exec chmod 644 {} \; 

# Start Apache
ENTRYPOINT ["/usr/sbin/httpd", "-D", "FOREGROUND"]
