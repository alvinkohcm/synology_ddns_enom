# synology_ddns_enom

This simple script will allow you to setup a Custom Dynamic DNS (DDNS) script to work with Synology DiskStation Manager (DSM).

Step 1: Creating a Custom DDNS Provider in Synology DSM
-------------------------------------------------------
- Go to **Control Panel** -> **Connectivity (External Access)** -> DDNS (Tab)
- Click on **Customize** and enter the following:

1. **Service provider**: Enom.com
2. **Query URL**: http://*(yourdomain.com)*/synology_ddns_enom/index.php?host=\_\_HOSTNAME\_\_&username=\_\_USERNAME\_\_&key=\_\_PASSWORD\_\_&ip=\_\_MYIP\_\_

Step 2: Setting up your DNS Update Host/Password
------------------------------------------------
- Go to **Control Panel** -> **Connectivity (External Access)** -> DDNS (Tab)
- Click on **Add** and enter the following:

1. **Service provider**: "\*Enom.com" (This was the service provider you created in Step 1)
2. **Hostname**: *nas.yourdomain.com* (full hostname)
3. **Username**: Enom UID (UID/username for Enom account)
4. **Password**: (domain password)

Requirements
------------
- [ ] A web server running PHP 5.x with cURL extension which can be called by the NAS
