PORT	?=	8000
HOST	?=	localhost

.PHONY: run
run: router.php
	php -S ${HOST}:${PORT} router.php