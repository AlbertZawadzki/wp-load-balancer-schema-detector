=== Load balancer schema detector ===
Plugin name:         Load balancer schema detector
Plugin URI:          https://github.com/AlbertZawadzki/wp-load-balancer-sche
Description:         Fixes infinite redirection bug in admin panel caused by
Version:             1.0
Author:              Albert Zawadzki
Author URI:          https://github.com/AlbertZawadzki
Requires at least:   6.1
Requires PHP:        7.3
Tested:              6.1
Stable tag:          6.1
Contributors:        azaw
License:             GPLv2 or later
License              URI: https://www.gnu.org/licenses/gpl-2.0.html
Tags:                ssl, load balancer, https, is_ssl, force_ssl_admin

=== Story ===
Your wordpress admin panel enforces ssl connection (force_ssl_admin()), but it is hidden behind some load
balancing software.
The is_ssl() method will always return false, because most load balancers do not transmit $_
SERVER['HTTPS'] variable.
This results in infinite 302 redirection bug.

=== Solution ===
Set $_SERVER['HTTPS'] = 'on' using plugin when appropriate server variables are set