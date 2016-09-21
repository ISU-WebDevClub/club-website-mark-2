# Before trying my instructions, follow [these instructions](https://coolestguidesontheplanet.com/get-apache-mysql-php-and-phpmyadmin-working-on-osx-10-11-el-capitan/)



# Serving your project to mobile
If you have a mac, these instructions will show you how to serve your project files on your macs localhost so you can 
view your website with a mobile phone.

I can only verify that this works on an IPhone as I do not have an Android to test it on.

# Steps

## Apache2

If you don't have Apache installed on your computer, you will need it. OS X comes packages with Apache and PHP so 
all you would need to do is install MySQL.

## httpd.conf

You will need to edit the apache httpd.conf file to look in the projects directory for the files to serve.

To do this, edit /etc/apache2/httpd.conf

```
sudo nano /etc/apache2/httpd.conf
```

Scroll down a ways until you find the lines that say

```
User _www
Group _www
```
and edit them so they look like this 
(Remember to replace `<username>` with your username. You can find this by typing `whoami` in the terminal)

```
User <username>
Group staff
```

Next, scroll down until you find lines that say

```
DocumentRoot "/Library/WebServer/Documents"                                                                                                                                                                                                
<Directory "/Library/WebServer/Documents">       
```

And edit them to point to your projects Document root.

Here is an example of what it would look like

```
DocumentRoot "/Users/gregory/Documents/club-website-mark-2/"                                                                                                                                                                                              
<Directory "/Users/gregory/Documents/club-website-mark-2/">
```

Next, you will need to give apache permission to read from that directory, so run 

```
sudo chmod -R 747 <Path to your document root>
```

Now, you will need to tell apache that you have permission to view the local server

```
cd /etc/apache2/users/
```

If there is not already a file called `<username>`.conf then create one (Once again `<username>` is your username)

Example:
```
sudo nano gregory.conf
```

And paste this into that file (Replace `<username>` with your username)
   
```
<Directory "/Users/<username>/Sites/">
AllowOverride All
Options Indexes MultiViews FollowSymLinks
Require all granted
</Directory>
```

Save and exit.
Lastly, restart apache

```
sudo apachectl restart
```

Go to `localhost` on your mac to test if it shows your project as you would expect.

Now, make sure your phone and mac are on the same network, and go to 

```
<username>s-imac.local
```

Example

```
gregorys-imac.local
```


If you have further questions, here are the links I got this information from


[stackoverflow.com](http://stackoverflow.com/questions/5891802/how-do-i-change-the-root-directory-of-an-apache-server)

[coolestguideontheplanet.com](https://coolestguidesontheplanet.com/forbidden-403-you-dont-have-permission-to-access-username-on-this-server/)