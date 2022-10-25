<h1>Video meme generator</h1>
<h3>Generate subtitle and render it to a video</h3>









<h2>Table structure (optional):</h2>
<img src="https://cdn.discordapp.com/attachments/1003173519879847966/1033705729653223424/unknown.png" width="100%">
<h2>Process flow:</h2>
<img src="https://cdn.discordapp.com/attachments/1003173519879847966/1033781184272015430/process.jpg">
<h2>Preview:</h2>
<ul>
    <li><a href="https://meme.gabrielkheisa.xyz/">Slander</a></li>
    <li><a href="https://meme.gabrielkheisa.xyz/therock">The Rock</a></li>
    <li><a href="https://meme.gabrielkheisa.xyz/noot">Noot</a></li>
</ul>












<h2>Installation with Docker LEMP Stack:</h2>

<h3>1. Create a file, named <b>docker-compose.yml</b>. Insert with these contents:</h3>
<pre>
# ./docker-compose.yml
version: '3'

services:
  app:
    image: adhocore/lemp:7.4
    # For different app you can use different names. (eg: )
    container_name: some-app
    volumes:
      # app source code
      - ./meme:/var/www/html
      # db data persistence
      - db_data:/var/lib/mysql
      # Here you can also volume php ini settings
      # - /path/to/zz-overrides:/usr/local/etc/php/conf.d/zz-overrides.ini
    ports:
      - 8080:80
    environment:
      MYSQL_ROOT_PASSWORD: supersecurepwd
      MYSQL_DATABASE: appdb
      MYSQL_USER: dbusr
      MYSQL_PASSWORD: securepwd
      # for postgres you can pass in similar env as for mysql but with PGSQL_ prefix

volumes:
  db_data: {}
</pre>

<h3>2. Then compose</h3>
<pre>
docker-compose up -d
</pre>

<h3>3. Navigate to <b>meme</b> folder (volume), then clone my repo and change to <b>docker</b> branch</h3>
<pre>
cd meme
git clone https://repo.gabrielkheisa.xyz/gabrielkheisa/meme-generator.git
git checkout docker
</pre>

<h3>4. Bash into container</h3>
<pre>
docker exec -u root -t -i some-app /bin/bash
</pre>

<h3>5. Login to MySQL as root with the password <b>supersecurepwd</b></h3>
<pre>
mysql -u root -p
</pre>

<h3>6. Create database <b>meme</b>, then allow <b>dbusr</b> to access it</h3>
<pre>
GRANT ALL PRIVILEGES ON meme.* TO 'dbuser'@'localhost' WITH GRANT OPTION;
exit;
</pre>

<h3>7. Navigate to <b>/var/www/html/meme-generator</b></h3>
<pre>
cd /var/www/html/meme-generator
</pre>

<h3>8. Run the Python script</b></h3>
<pre>
python3 renderDB.py
</pre>