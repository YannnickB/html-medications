# Remove
rm info.json

#
echo "["  >> info.json   

#
find ./info -name "*.json" -print0 | xargs -0 -I file cat file coma.txt >> info.json

#
echo "{}" >> info.json
echo "]" >> info.json

