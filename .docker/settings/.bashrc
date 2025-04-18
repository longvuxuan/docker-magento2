alias mage='XDEBUG_MODE=off bin/magento'
alias deploy='rm -rf var/view_preprocessed/ var/cache/ var/page_cache/ generated/ pub/static/adminhtml/ && XDEBUG_MODE=off composer install && mage module:disable Magento_TwoFactorAuth && mage set:up && mage set:di:com && mage setup:static-content:deploy -f en_US && mage c:c'
alias sog='XDEBUG_MODE=off ./n98-magerun2.phar sys:cron:run sales_grid_order_async_insert'
alias de='rm -rf var/view_preprocessed/ var/cache/ var/page_cache/ generated/ pub/static/adminhtml/ pub/static/frontend/ && mage setup:static-content:deploy -f en_US && mage c:f'

alias ll='ls -alF'
alias la='ls -A'
alias l='ls -CF'
alias cr='cd /var/www/html/lg/src'
alias deploy='rm -rf generated/ && cp require mageplaza/module-smtp && cp install && mage set:up && mage module:disable Magento_TwoFactorAuth && mage set:di:com && mage setup:static-content:deploy -f en_US -a adminhtml && mage c:c'
alias deploy2='rm -rf generated/ && cp install && mage set:up && mage module:disable Magento_TwoFactorAuth && mage set:di:com && mage setup:static-content:deploy -f en_US -a adminhtml && mage c:c'
alias gt='git fetch --prune origin'
alias dt='cd /var/www/html/lg/src && docker compose stop && docker compose up -d --remove-orphans && git fetch --prune origin'
alias dp='cd /var/www/html/lg/src && docker compose run php bash --remove-orphans'
alias reset_phpstorm='rm -rf ~/.java/.userPrefs/ && rm -rf ~/.config/JetBrains/PhpStorm2024.3/'


alias mage='docker exec -it $(docker ps -aqf "name=^lg-php$") bin/magento'
alias n98='docker exec -it $(docker ps -aqf "name=^lg-php$") ./n98-magerun2.phar'
alias cp='docker exec -it $(docker ps -aqf "name=^lg-php$") composer'

alias ssh_stg='ssh -i ~/.ssh/smartosc/id_rsa 1.ent-vt2pniqibrqv6-staging-5em2ouy@ssh.eu-3.magento.cloud'
alias ssh_stg2='ssh -i ~/.ssh/smartosc/id_rsa 1.ent-vt2pniqibrqv6-staging2-5zxmgzy@ssh.eu-3.magento.cloud'
alias ssh_stg3='ssh -i ~/.ssh/smartosc/id_rsa 1.ent-vt2pniqibrqv6-staging3-nf5kgsq@ssh.eu-3.magento.cloud'
alias githubpush='GIT_SSH_COMMAND="ssh -i ~/.ssh/id_rsa_github" git push origin main'
