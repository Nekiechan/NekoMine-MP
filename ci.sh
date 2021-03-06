#!/bin/bash
echo xD
echo Running lint...
shopt -s globstar
for file in **/*.php; do
    OUTPUT=`php -l "$file"`
    [ $? -ne 0 ] && echo -n "$OUTPUT" && exit 1
done
echo Lint done successfully.
mkdir plugins
cd plugins
wget https://github.com/Nekiechan/NekoMine-DevTools/releases/download/neko/DevTools_v1.11.3.phar
cd -
echo -e "version\nmakeserver\nstop\n" | php src/pocketmine/PocketMine.php --no-wizard | grep -v "\[Neko] Adding "
if ls plugins/DevTools/NekoMine-MP*.phar >/dev/null 2>&1; then
    echo Server packaged successfully.
else
    echo No phar created!
    exit 1
fi
