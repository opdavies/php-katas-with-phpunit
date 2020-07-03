CLEAN_PATHS=vendor
PHPUNIT_PATH=vendor/bin/phpunit

all: test

clean:
	@for dir in $(CLEAN_PATHS); do \
		rm -fr $$dir; \
	done

phpunit: vendor
	@$(PHPUNIT_PATH) --colors=always --testdox

test: phpunit

vendor: composer.json composer.lock
	@composer install

.PHONY: all clean phpunit test
