Installation & SetUp for Dev
============================


Install
-------

### WampServer
1. Installation requise
2. Activation de de CURL dans C:\wamp\bin\php\php5.3.13 et C:\wamp\bin\apache\apache2.2.22\bin modifier le fichier php.ini (deux fois donc)
2.1 Décommenter ;extension=php_curl.dll  => extension=php_curl.dll
3. Redémarrer les services

### NoSQL Neo4J
1. Installer sur votre ordinateur neo4j-community_windows-x64_2_0_0-RC1
2. Lancer neo4j-community.exe
3. Accèder via un navigateur à http://localhost:7474/

Tester 
------

Lancer Wampserver puis Neo4J (neo4j-community.exe)
Lancer l'index contenu dans le projet ece_data_mining

### Problème
1. CURL non fonctionnel 
1.1 Actualiser votre dll de curl dans C:\wamp\bin\php\php5.3.13\ext remplacer php_curl.dll par celle contenu dans ce lien
http://www.mediafire.com/download/qwgdzgccthzwc15/php_curl-5.3.13-VC9-x64.zip
1.2 Redémarrer les services de wamp





