<h1>Load balancer schema detector</h1>

<h2>Story</h2>
Your wordpress admin panel enforces ssl connection (<code>force_ssl_admin()</code>), but it is hidden behind some load
balancing software.
The <code>is_ssl()</code> method will always return false, because most load balancers do not transmit <code>$_
SERVER['HTTPS']</code> variable.
This results in infinite 302 redirection bug.

<h2>Solution</h2>
Set <code>$_SERVER['HTTPS'] = 'on'</code> using plugin when appropriate server variables are set