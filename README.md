# php-mariadb-docker
PHP mit MariaDB im Docker

## Datenbank

Datenbank erstellen im leeren Docker beim Start mit Testdaten
https://mkyong.com/docker/how-to-run-an-init-script-for-docker-mariadb/

Erstelle in diesem Repository ein Verzeichnis "mariadbdata"

Beim ersten Starten der Datenbank mit leerem Verzeichnis mariadbdata muss das sql-init SQL ticket.sql ausgeführt werden. Dazu im docker-compose.yml das Init script aktivieren und danach wieder auskommentieren.
