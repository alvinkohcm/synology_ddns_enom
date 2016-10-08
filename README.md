# synology_ddns_enom

This simple script will allow you to setup a Custom Dynamic DNS (DDNS) script to work with Synology DiskStation Manager (DSM).

Step 1: Creating a Custom DDNS Provider in Synology DSM
-------------------------------------------------------
- Go to **Control Panel** -> **Connectivity (External Access)** -> DDNS (Tab)
- Click on **Customize** and enter the following:

**Service provider**: Enom.com
**Query URL**: http://yourdomain.com/synology_ddns_enom/index.php?host=__HOSTNAME__&domain=__USERNAME__&key=__PASSWORD__&ip=__MYIP__

Step 2: Setting up your DNS Update Host/Password
------------------------------------------------
- Go to **Control Panel** -> **Connectivity (External Access)** -> DDNS (Tab)
- Click on **Add** and enter the following:

**Service provider**: "*Enom.com" (This was the service provider you created in Step 1)
**Hostname**: nas
**Username/Email**: yourdomain.com
**Password**: (access password)


Requirements
------------
- [] A web server running PHP 5.x with cURL extension accessible by the NAS via url e.g. **[yourdomain.com]**.
