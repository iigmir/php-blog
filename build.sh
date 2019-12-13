docker build -t phpdev-container .
docker run -p 8774:80 -v $PWD/src:/var/www/html phpdev-container
