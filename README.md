Before running need to install composer dependencies. `composer install` from project root directory.

Sample usage can be found at: `sample/index.php`
Run unit tests from command line (from project root): `vendor/bin/phpunit ./tests`

To add new Transport type one needs to create new class extended from `\VK\Task\BoardingCard\AbstractBoardingCard`

Algorithm complexity: O(n)