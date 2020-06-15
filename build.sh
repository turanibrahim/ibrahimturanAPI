#!/bin/sh
cd public

FILE="../public.list"
BUILD="$HOME/Documents/Dev/Vue/ibrahimturan/dist/*"

echo =============================
echo "| UNDELETED FILES           |"
echo -----------------------------
for f in *; do
   if [ ! -z $(grep "$f" "$FILE") ];
   then echo $f;
   else rm -rf $f
   fi
done
echo ==============================

cp -r $BUILD ./

cd ..

git add .
git commit  -m "latest build received"

echo "DONE"
echo ==============================

exec bash
