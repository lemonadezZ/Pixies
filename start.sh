#/usr/bin/evn bash
composer install
case $1 in
	'swoole')
	./bin/Pixies	
	;;
	*)
	cd public
	php -S 0.0.0.0:8082
	;;
esac
