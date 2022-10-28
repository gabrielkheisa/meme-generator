<h1>Video meme generator</h1>
<h3>Generate subtitle and render it to a video</h3>
<img src="https://cdn.discordapp.com/attachments/1003173519879847966/1034466837854949436/2022-10-25_20-50-39.gif">
<h2>Requirements:</h2>
<ul>
    <li>PHP 7.2</li>
    <li>Python 3 (MoviePy, FFmpeg, MySQL module)</li>
    <li>MySQL (optional, you can modify the code to use SQLite DB instead)</li>
</ul>
<h2>Table structure (optional):</h2>
<img src="https://cdn.discordapp.com/attachments/1003173519879847966/1033705729653223424/unknown.png" width="100%">
<pre>
CREATE TABLE `meme` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`session` VARCHAR(20),
	`status` INT(1),
	`timestamp` TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	`value` TEXT,
	PRIMARY KEY (`id`)
);
</pre>
<h2>Process flow:</h2>
<img src="https://cdn.discordapp.com/attachments/1003173519879847966/1033781184272015430/process.jpg">
<h2>Preview:</h2>
<ul>
    <li><a href="https://meme.gabrielkheisa.xyz/">Slander</a></li>
    <li><a href="https://meme.gabrielkheisa.xyz/therock">The Rock</a></li>
    <li><a href="https://meme.gabrielkheisa.xyz/noot">Noot</a></li>
</ul>
<p>For <b>Docker LEMP stack</b> installation, switch to <a href="https://github.com/gabrielkheisa/meme-generator/tree/docker">docker branch</a></p>
<br>
<p>External repo: https://repo.gabrielkheisa.xyz/gabrielkheisa/meme-generator/</p>
