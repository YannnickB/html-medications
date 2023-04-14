REM  Variables
set "folder=.\info"
set "filesPattern=%folder%\*.json"
set "dstFileName=info.json"

REM Remove
del %dstFileName%


REM Add first bracet
echo [  >> %dstFileName%


REM
for %%f in ( "%filesPattern%" ) do (
	REM echo "%folder%/%%f"
	type "%%f" >> %dstFileName%
	echo ,  >> %dstFileName%
)



REM Add fake entry
echo {}  >> %dstFileName%

REM Add last bracet
echo ]  >> %dstFileName%

