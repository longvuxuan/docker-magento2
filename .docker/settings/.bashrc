alias mage='XDEBUG_MODE=off bin/magento'
alias deploy='rm -rf var/view_preprocessed/ var/cache/ var/page_cache/ generated/ pub/static/adminhtml/ && XDEBUG_MODE=off composer install && mage module:disable Magento_TwoFactorAuth && mage set:up && mage set:di:com && mage setup:static-content:deploy -f en_US && mage c:c'
alias sog='XDEBUG_MODE=off ./n98-magerun2.phar sys:cron:run sales_grid_order_async_insert'
alias de='rm -rf var/view_preprocessed/ var/cache/ var/page_cache/ generated/ pub/static/adminhtml/ pub/static/frontend/ && mage setup:static-content:deploy -f en_US && mage c:f'
