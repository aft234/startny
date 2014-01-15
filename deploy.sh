if [[ $1 == "down" ]]; then
    rsync -rlv root@startny.byjakt.com:/var/www/jakt/ ./ &&
    notify -message "Synced down from startny.co";
elif [[ $1 == "up" ]]; then
    rsync -rlzih --owner=startny --group=www.data  --progress --stats --exclude .git ./ root@startny.byjakt.com:/var/www/vhosts/www.startny.co/http_docs/ &&
    notify -message "Synced up to startny.co";
else
    echo "Please specify down or up";
fi
