cd /
for entry in `ls $search`; do
    (echo "$entry" | grep -Eq i) && echo $entry
done
