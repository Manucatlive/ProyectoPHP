# Establece la imagen base de PHP con Apache
FROM php:7.4-apache

# Instala extensiones de PHP y herramientas necesarias
RUN apt-get update && apt-get install -y git unzip

RUN docker-php-ext-install mysqli

# Descarga phpMyAdmin desde el sitio web oficial y descomprime
RUN mkdir /usr/share/phpmyadmin && \
    curl -L https://www.phpmyadmin.net/downloads/phpMyAdmin-latest-all-languages.tar.gz | tar xz --strip-components=1 -C /usr/share/phpmyadmin

# Crea el enlace simbólico para phpMyAdmin
RUN ln -s /usr/share/phpmyadmin /var/www/html/phpmyadmin

# Configura phpMyAdmin para que funcione con Apache en el puerto 8080
RUN echo "Alias /phpmyadmin /var/www/html/phpmyadmin" >> /etc/apache2/apache2.conf
RUN echo "<Directory /var/www/html/phpmyadmin>" >> /etc/apache2/apache2.conf
RUN echo "    Options Indexes FollowSymLinks" >> /etc/apache2/apache2.conf
RUN echo "    AllowOverride All" >> /etc/apache2/apache2.conf
RUN echo "    Require all granted" >> /etc/apache2/apache2.conf
RUN echo "</Directory>" >> /etc/apache2/apache2.conf

# Cambiar el puerto de MySQL a 3307
# RUN sed -i 's/3306/3307/g' /etc/mysql/mysql.conf.d/mysqld.cnf

# Configura el puerto de Apache para escuchar en el puerto 8080
RUN sed -i 's/80/8080/g' /etc/apache2/ports.conf

# Copia tu código fuente al directorio de trabajo en el contenedor
COPY . /var/www/html/

# Configura Apache para servir tu aplicación PHP desde la subcarpeta \app\view
RUN echo "Alias /app /var/www/html/app" >> /etc/apache2/apache2.conf
RUN echo "<Directory /var/www/html/app>" >> /etc/apache2/apache2.conf
RUN echo "    Options Indexes FollowSymLinks" >> /etc/apache2/apache2.conf
RUN echo "    AllowOverride All" >> /etc/apache2/apache2.conf
RUN echo "    Require all granted" >> /etc/apache2/apache2.conf
RUN echo "</Directory>" >> /etc/apache2/apache2.conf

# Configura el nombre del servidor para Apache
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Expone el puerto 8080 para acceder a phpMyAdmin y tu aplicación web
EXPOSE 8080

# Comando para iniciar el servidor Apache cuando se ejecute el contenedor
CMD ["apache2-foreground"]
