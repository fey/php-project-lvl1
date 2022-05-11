install:
	composer install

brain-games:
	php bin/brain-games

brain-even:
	./bin/brain-even

brain-calc:
	./bin/brain-calc

validate:
	composer validate

lint:
	composer exec --verbose phpcs -- --standard=PSR12 -p src bin

lint-fix:
	composer exec --verbose phpcbf -- --standard=PSR12 -p src bin
