alias mage='XDEBUG_MODE=off bin/magento'
alias deploy='rm -rf var/view_preprocessed/ var/cache/ var/page_cache/ generated/ pub/static/adminhtml/ pub/static/frontend/ && mage maintenance:enable && XDEBUG_MODE=off composer install && mage set:up && mage set:di:com && mage setup:static-content:deploy -f && mage indexer:reset && mage indexer:reindex && mage maintenance:disable && mage c:c'
