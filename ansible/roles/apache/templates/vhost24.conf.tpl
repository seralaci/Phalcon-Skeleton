# Default Apache virtualhost template

<VirtualHost *:80>
    ServerAdmin webmaster@localhost
    DocumentRoot {{ server.web_root }}
{% set servernames = server.servername.split() %}
{% for servername in servernames %}
{% if loop.first %}
    ServerName {{ servername }}
{% else %}
    ServerAlias {{ servername }}
{% endif %}
{% endfor %}

    <Directory {{ server.web_root }}>
        AllowOverride FileInfo
        Options Indexes FollowSymLinks
        Require all granted
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/{{ server.hostname }}.error.log
    CustomLog ${APACHE_LOG_DIR}/{{ server.hostname }}.access.log combined
</VirtualHost>