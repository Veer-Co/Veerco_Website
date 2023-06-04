zip -r archive.zip README.md app artisan bootstrap composer.json composer.lock config database lang package-lock.json package.json phpunit.xml postcss.config.js public resources routes storage stubs tailwind.config.js tests veer_co vendor vite.config.js veerctuv_veerco.sql
timestamp=$(date +%s)
mv archive.zip ignore/archive-$timestamp.zip
scp ignore/archive-$timestamp.zip veerctuv@162.241.123.152:/home3/veerctuv/public_html
ssh veerctuv@162.241.123.152 "cd /home3/veerctuv/public_html && unzip archive-$timestamp.zip && mv archive-$timestamp.zip zip_files"
