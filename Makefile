PORT	?=	8000
HOST	?=	localhost

.PHONY: run
run: main.php
	php -S ${HOST}:${PORT} main.php