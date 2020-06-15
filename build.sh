#!/bin/sh
cd public

FILE="../public.list"
BUILD="$HOME/Documents/Dev/Vue/ibrahimturan/dist/*"

for f in *; do
   if [ ! -z $(grep "$f" "$FILE") ];
   then echo $f;
   else rm -rf $f
   fi
done

cp -r $BUILD ./

cd ..

git add .
git commit  -m "latest build received"

echo "success"

exec bash
