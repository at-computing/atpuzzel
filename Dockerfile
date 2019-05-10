FROM shadysailor/shadyimage 

COPY public /var/www/html
COPY passwords.txt  /var/www/
EXPOSE 80/tcp

