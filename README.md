##Sparsh Referrer Url Tracking Extension
This extension allows admin to track which website refers to customers and orders to the Magento store and give customers and orders referrer domain reports.

##Support: 
version - 2.3.x, 2.4.x

##How to install Extension

1. Download the archive file.
2. Unzip the files
3. Create a folder [Magento_Root]/app/code/Sparsh/ReferrerUrlTracking
4. Drop/move the unzipped files to directory '[Magento_Root]/app/code/Sparsh/ReferrerUrlTracking'

#Enable Extension:
- php bin/magento module:enable Sparsh_ReferrerUrlTracking
- php bin/magento setup:upgrade
- php bin/magento setup:di:compile
- php bin/magento setup:static-content:deploy
- php bin/magento cache:flush

#Disable Extension:
- php bin/magento module:disable Sparsh_ReferrerUrlTracking
- php bin/magento setup:upgrade
- php bin/magento setup:di:compile
- php bin/magento setup:static-content:deploy
- php bin/magento cache:flush
