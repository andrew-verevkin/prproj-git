# prproj-git-ppp-vcs
Version control system for Adobe Premiere Pro projects. A tool that provides advanced features for backups. This is more than simple autosave.

MAC OS X (cron, git, php)

Working directory should be look like this
├── .git
├── .gitattributes
├── .gitignore
├── cron.log
├── cron.php
├── example-project.prproj
├── media
├── proxy

1. Set up a Cron job
$ env EDITOR=nano crontab -e
Сopy and paste this
MAILTO=""
0 */2 * * * php ~/Desktop/example-project/cron.php >> ~/Desktop/example-project/cron.log 2>&1
Press Cmd+O, Return, Cmd+X
Команда покажет список текущих заданий 
crontab -l

2. Initialize git repository
$ cd ~/Desktop/example-project/
$ git init

3. The project file (.prproj) is a gzip of an XML. Define the filter via git config
$ git config --global diff.gzipped.textconv "gunzip -c"
$ nano .gitattributes
paste this
*.prproj diff textconv=gzipped
Press Cmd+O, Return, Cmd+X

4. Log
$ touch cron.log

5. Place cron.php in your directory











