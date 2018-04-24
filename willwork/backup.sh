#!/bin/bash
#设置数据库名，数据库登录名，密码，备份路径，日志路径，数据文件位置，以及备份方式

#默认情况下备份方式是tar，还可以是mysqldump,mysqldotcopy

#默认情况下，用root(空)登录mysql数据库，备份至/root/dbxxxxx.tgz

DBName=dev_zyxy

DBUser=root

DBPasswd=zyxy@88.com

BackupPath=/root/

LogFile=/root/dbbackup.log

DBPath=/var/lib/mysql/

BackupMethod=mysqldump

#BackupMethod=mysqlhotcopy

#BackupMethod=tar

#SettingEnd

# NewFile="$BackupPath"db$(date+%y%m%d).tgz

DumpFile="$BackupPath"db$(date+%y%m%d)
OldFile="$BackupPath"db$(date+%y%m%d--date='5daysago')
# OldFile="$BackupPath"db$(date+%y%m%d--date='5daysago').tgz

echo"-------------------------------------------">>$LogFile

echo$(date+"%y-%m-%d%H:%M:%S")>>$LogFile

echo"--------------------------">>$LogFile

#DeleteOldFile

if[-f$OldFile]

then

rm-f$OldFile>>$LogFile2>&1

echo"[$OldFile]DeleteOldFileSuccess!">>$LogFile

else

echo"[$OldFile]NoOldBackupFile!">>$LogFile

fi

if[-f$DumpFile]

then

echo"[$DumpFile]TheBackupFileisexists,Can'tBackup!">>$LogFile

else

case$BackupMethodin

mysqldump)

if[-z$DBPasswd]

then

mysqldump-u$DBUser--opt$DBName>$DumpFile

else

mysqldump-u$DBUser-p$DBPasswd--opt$DBName>$DumpFile

fi

tarczvf$NewFile$DumpFile>>$LogFile2>&1

echo"[$NewFile]BackupSuccess!">>$LogFile

rm-rf$DumpFile

;;

mysqlhotcopy)

rm-rf$DumpFile

mkdir$DumpFile

if[-z$DBPasswd]

then

mysqlhotcopy-u$DBUser$DBName$DumpFile>>$LogFile2>&1

else

mysqlhotcopy-u$DBUser-p$DBPasswd$DBName$DumpFile>>$LogFile2>&1

fi

tarczvf$NewFile$DumpFile>>$LogFile2>&1

echo"[$NewFile]BackupSuccess!">>$LogFile

rm-rf$DumpFile

;;

*)

/etc/init.d/mysqldstop>/dev/null2>&1

tarczvf$NewFile$DBPath$DBName>>$LogFile2>&1

/etc/init.d/mysqldstart>/dev/null2>&1

echo"[$NewFile]BackupSuccess!">>$LogFile

;;

esac

fi

echo"-------------------------------------------">>$LogFile