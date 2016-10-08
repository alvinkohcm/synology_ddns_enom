# synology_ddns_enom

This simple script will allow you to setup a Custom Dynamic DNS (DDNS) script to work with Synology DiskStation Manager (DSM).

To setup, go to **Control Panel** -> **Connectivity (External Access)** -> DDNS.
Click on **Customize** and enter the following:

Service provider: "Enom.com"
Query URL: "http://[yourdomain.com]/synology_ddns_enom/index.php?host=__HOSTNAME__&domain=__USERNAME__&key=__PASSWORD__&ip=__MYIP__"

Requirements:
1) A web server running PHP 5.x with cURL extension accessible by the NAS via url e.g. **[yourdomain.com]**.

