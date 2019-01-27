# minimvc
A small MVC framework implementing a front and page controller with routing


#Config
ErrorDocument 404 /index.php in httpd.conf --> per fare redirect a home se l'url non esiste
NO! Ho spostato la gestione di ErrorDocument 404 in htaccess con pagina custom + mappato le url
altrimenti al submit di save mi svuota la variabile $_POST
crea virtual host via wamp --> il risultato è questo (qui uso porta 8080 perchè altrimenti si picchia con iis)


<VirtualHost 127.0.0.1:8080>
	ServerName frinblog
	DocumentRoot "c:/wamp64/www/minimvc/public"
	<Directory  "c:/wamp64/www/minimvc/public">
		Options +Indexes +Includes +FollowSymLinks +MultiViews
		AllowOverride All
		Require local
	</Directory>
</VirtualHost>

Ricordati di mappare localhost 127.0.0.1 frinblog in host
