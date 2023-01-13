<h3>Story</h3>
Your wordpress admin panel enforces ssl connection (<code>force_ssl_admin()</code>), but it is hidden behind some load balancing software.
The <code>is_ssl()</code> method will always return false, because most load balancers do not transmit <code>$_SERVER['HTTPS']</code> variable.
This results in infinite 302 redirection bug.

<h3>Solution</h3>
Set <code>$_SERVER['HTTPS'] = 'on'</code> using plugin when appropriate server variables are set