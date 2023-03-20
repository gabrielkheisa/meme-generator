<h1>Video meme generator</h1>
<h3>Generate subtitle and render it to a video</h3>
<img src="https://cdn.discordapp.com/attachments/1003173519879847966/1034466837854949436/2022-10-25_20-50-39.gif">









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












<h2>Installation with <a href="https://github.com/adhocore/docker-lemp">Docker LEMP Stack</a>:</h2>

<h3>1. Create a file, named <b>docker-compose.yml</b>. Insert with these contents:</h3>


```yaml
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
```

<h3>2. Then compose</h3>
<pre>
docker-compose up -d
</pre>

<h3>3. Navigate to <b>meme</b> folder (volume), then clone my repo, navigate to <b>meme-generator</b> and then change to <b>docker</b> branch</h3>
<pre>
cd meme
git clone https://github.com/gabrielkheisa/meme-generator.git
cd meme-generator
git checkout docker
</pre>

<h3>4. Bash into container, to run it as detached output (in background) use <b>screen</b></h3>
<pre>
screen
</pre>
<pre>
docker exec -u root -t -i some-app /bin/bash
</pre>

<h3>5. Login to MySQL as root with the password <b>supersecurepwd</b></h3>
<pre>
mysql -u root -p
</pre>

<h3>6. Create table <b>meme</b> and <b>meme_ronaldo</b> in <b>appdb</b> database, then allow <b>dbusr</b> to access it</h3>
<pre>
USE appdb;

CREATE TABLE `meme` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`session` VARCHAR(20),
	`status` INT(1),
	`timestamp` TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	`value` TEXT,
	PRIMARY KEY (`id`)
);

CREATE TABLE `meme_ronaldo` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`session` VARCHAR(20),
	`status` INT(1),
	`timestamp` TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	`value` TEXT,
	PRIMARY KEY (`id`)
);
</pre>
<pre>


GRANT ALL PRIVILEGES ON appdb.* TO 'dbusr'@'localhost' WITH GRANT OPTION;
exit;
</pre>

<h3>7. Navigate to <b>/var/www/html/meme-generator</b></h3>
<pre>
cd /var/www/html/meme-generator
</pre>

<h3>8. Install Python 3, pip3, and remaining dependencies</b></h3>
<pre>
apk add --no-cache python3 py3-pip
</pre>
<pre>
apk add make automake gcc g++ subversion python3-dev
apk add ffmpeg
pip3 install --upgrade pip
pip3 install mysql-connector-python==8.0.29
pip3 install moviepy
</pre>

<h3>9. Run the Python script, detach from <b>screen</b> by pressing <b>Ctrl + A</b> then <b>Ctrl + D</b></h3>
<pre>
python3 renderDB.py
</pre>

<h3>10. Run the second Python script by creating a new screen session, detach from <b>screen</b> by pressing <b>Ctrl + A</b> then <b>Ctrl + D</b></h3>
<pre>
screen
</pre>
<pre>
docker exec -u root -t -i some-app /bin/bash
</pre>
<pre>
cd /var/www/html/meme-generator/ronaldo
python3 renderDB.py
</pre>

<h3>11. Open your browser, navigate to http://{your-ip}:8080/meme-generator/</h3>

<h1>External repo</h1>
https://repo.gabrielkheisa.xyz/gabrielkheisa/meme-generator
