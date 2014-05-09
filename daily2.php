<?php

//MSSQL connection string details.
$dbhost = "10.100.100.11";
$dbuser = 'raj.ayappan';
$dbpass = 'c0wm1lk';
$dbname = 'ReinoComm';

$db = mssql_connect($dbhost, $dbuser, $dbpass);
if (!$db) {
    die('Could not connect to mssql - check your connection details!');
}
$db_selected = mssql_select_db($dbname, $db);
if (!$db_selected) {
    die('Could not select mssql db');
}


$sql = "
SET DATEFIRST 1;

select * from (

SELECT MeterId as meter_id, 
DATEPART(YY, TransDateTime) as year_id, DATEPART(WK, TransDateTime) as week_id,
CONVERT(CHAR(10),DATEADD(DAY, DATEDIFF(DAY, '19000101', TransDateTime) / 7 * 7, '19000101'),105) AS start_date,
CONVERT(CHAR(10),DATEADD(DAY, DATEDIFF(DAY, '19000101', TransDateTime) / 7 * 7, '19000101')+6,105) AS end_date,

sum (case when DATEPART(hh, TransDateTime) = 0 and DATEPART(dw, TransDateTime) = 1 then  AmountInCents/100.0 else 0 end) as \"00:00-Mon\",
sum (case when DATEPART(hh, TransDateTime) = 1 and DATEPART(dw, TransDateTime) = 1 then  AmountInCents/100.0 else 0 end) as \"01:00-Mon\",
sum (case when DATEPART(hh, TransDateTime) = 2 and DATEPART(dw, TransDateTime) = 1 then  AmountInCents/100.0 else 0 end) as \"02:00-Mon\",
sum (case when DATEPART(hh, TransDateTime) = 3 and DATEPART(dw, TransDateTime) = 1 then  AmountInCents/100.0 else 0 end) as \"03:00-Mon\",
sum (case when DATEPART(hh, TransDateTime) = 4 and DATEPART(dw, TransDateTime) = 1 then  AmountInCents/100.0 else 0 end) as \"04:00-Mon\",
sum (case when DATEPART(hh, TransDateTime) = 5 and DATEPART(dw, TransDateTime) = 1 then  AmountInCents/100.0 else 0 end) as \"05:00-Mon\",
sum (case when DATEPART(hh, TransDateTime) = 6 and DATEPART(dw, TransDateTime) = 1 then  AmountInCents/100.0 else 0 end) as \"06:00-Mon\",
sum (case when DATEPART(hh, TransDateTime) = 7 and DATEPART(dw, TransDateTime) = 1 then  AmountInCents/100.0 else 0 end) as \"07:00-Mon\",
sum (case when DATEPART(hh, TransDateTime) = 8 and DATEPART(dw, TransDateTime) = 1 then  AmountInCents/100.0 else 0 end) as \"08:00-Mon\",
sum (case when DATEPART(hh, TransDateTime) = 9 and DATEPART(dw, TransDateTime) = 1 then  AmountInCents/100.0 else 0 end) as \"09:00-Mon\",
sum (case when DATEPART(hh, TransDateTime) = 10 and DATEPART(dw, TransDateTime) = 1 then  AmountInCents/100.0 else 0 end) as \"10:00-Mon\",
sum (case when DATEPART(hh, TransDateTime) = 11 and DATEPART(dw, TransDateTime) = 1 then  AmountInCents/100.0 else 0 end) as \"11:00-Mon\",
sum (case when DATEPART(hh, TransDateTime) = 12 and DATEPART(dw, TransDateTime) = 1 then  AmountInCents/100.0 else 0 end) as \"12:00-Mon\",
sum (case when DATEPART(hh, TransDateTime) = 13 and DATEPART(dw, TransDateTime) = 1 then  AmountInCents/100.0 else 0 end) as \"13:00-Mon\",
sum (case when DATEPART(hh, TransDateTime) = 14 and DATEPART(dw, TransDateTime) = 1 then  AmountInCents/100.0 else 0 end) as \"14:00-Mon\",
sum (case when DATEPART(hh, TransDateTime) = 15 and DATEPART(dw, TransDateTime) = 1 then  AmountInCents/100.0 else 0 end) as \"15:00-Mon\",
sum (case when DATEPART(hh, TransDateTime) = 16 and DATEPART(dw, TransDateTime) = 1 then  AmountInCents/100.0 else 0 end) as \"16:00-Mon\",
sum (case when DATEPART(hh, TransDateTime) = 17 and DATEPART(dw, TransDateTime) = 1 then  AmountInCents/100.0 else 0 end) as \"17:00-Mon\",
sum (case when DATEPART(hh, TransDateTime) = 18 and DATEPART(dw, TransDateTime) = 1 then  AmountInCents/100.0 else 0 end) as \"18:00-Mon\",
sum (case when DATEPART(hh, TransDateTime) = 19 and DATEPART(dw, TransDateTime) = 1 then  AmountInCents/100.0 else 0 end) as \"19:00-Mon\",
sum (case when DATEPART(hh, TransDateTime) = 20 and DATEPART(dw, TransDateTime) = 1 then  AmountInCents/100.0 else 0 end) as \"20:00-Mon\",
sum (case when DATEPART(hh, TransDateTime) = 21 and DATEPART(dw, TransDateTime) = 1 then  AmountInCents/100.0 else 0 end) as \"21:00-Mon\",
sum (case when DATEPART(hh, TransDateTime) = 22 and DATEPART(dw, TransDateTime) = 1 then  AmountInCents/100.0 else 0 end) as \"22:00-Mon\",
sum (case when DATEPART(hh, TransDateTime) = 23 and DATEPART(dw, TransDateTime) = 1 then  AmountInCents/100.0 else 0 end) as \"23:00-Mon\",
sum (case when DATEPART(hh, TransDateTime) = 0 and DATEPART(dw, TransDateTime) = 2 then  AmountInCents/100.0 else 0 end) as \"00:00-Tue\",
sum (case when DATEPART(hh, TransDateTime) = 1 and DATEPART(dw, TransDateTime) = 2 then  AmountInCents/100.0 else 0 end) as \"01:00-Tue\",
sum (case when DATEPART(hh, TransDateTime) = 2 and DATEPART(dw, TransDateTime) = 2 then  AmountInCents/100.0 else 0 end) as \"02:00-Tue\",
sum (case when DATEPART(hh, TransDateTime) = 3 and DATEPART(dw, TransDateTime) = 2 then  AmountInCents/100.0 else 0 end) as \"03:00-Tue\",
sum (case when DATEPART(hh, TransDateTime) = 4 and DATEPART(dw, TransDateTime) = 2 then  AmountInCents/100.0 else 0 end) as \"04:00-Tue\",
sum (case when DATEPART(hh, TransDateTime) = 5 and DATEPART(dw, TransDateTime) = 2 then  AmountInCents/100.0 else 0 end) as \"05:00-Tue\",
sum (case when DATEPART(hh, TransDateTime) = 6 and DATEPART(dw, TransDateTime) = 2 then  AmountInCents/100.0 else 0 end) as \"06:00-Tue\",
sum (case when DATEPART(hh, TransDateTime) = 7 and DATEPART(dw, TransDateTime) = 2 then  AmountInCents/100.0 else 0 end) as \"07:00-Tue\",
sum (case when DATEPART(hh, TransDateTime) = 8 and DATEPART(dw, TransDateTime) = 2 then  AmountInCents/100.0 else 0 end) as \"08:00-Tue\",
sum (case when DATEPART(hh, TransDateTime) = 9 and DATEPART(dw, TransDateTime) = 2 then  AmountInCents/100.0 else 0 end) as \"09:00-Tue\",
sum (case when DATEPART(hh, TransDateTime) = 10 and DATEPART(dw, TransDateTime) = 2 then  AmountInCents/100.0 else 0 end) as \"10:00-Tue\",
sum (case when DATEPART(hh, TransDateTime) = 11 and DATEPART(dw, TransDateTime) = 2 then  AmountInCents/100.0 else 0 end) as \"11:00-Tue\",
sum (case when DATEPART(hh, TransDateTime) = 12 and DATEPART(dw, TransDateTime) = 2 then  AmountInCents/100.0 else 0 end) as \"12:00-Tue\",
sum (case when DATEPART(hh, TransDateTime) = 13 and DATEPART(dw, TransDateTime) = 2 then  AmountInCents/100.0 else 0 end) as \"13:00-Tue\",
sum (case when DATEPART(hh, TransDateTime) = 14 and DATEPART(dw, TransDateTime) = 2 then  AmountInCents/100.0 else 0 end) as \"14:00-Tue\",
sum (case when DATEPART(hh, TransDateTime) = 15 and DATEPART(dw, TransDateTime) = 2 then  AmountInCents/100.0 else 0 end) as \"15:00-Tue\",
sum (case when DATEPART(hh, TransDateTime) = 16 and DATEPART(dw, TransDateTime) = 2 then  AmountInCents/100.0 else 0 end) as \"16:00-Tue\",
sum (case when DATEPART(hh, TransDateTime) = 17 and DATEPART(dw, TransDateTime) = 2 then  AmountInCents/100.0 else 0 end) as \"17:00-Tue\",
sum (case when DATEPART(hh, TransDateTime) = 18 and DATEPART(dw, TransDateTime) = 2 then  AmountInCents/100.0 else 0 end) as \"18:00-Tue\",
sum (case when DATEPART(hh, TransDateTime) = 19 and DATEPART(dw, TransDateTime) = 2 then  AmountInCents/100.0 else 0 end) as \"19:00-Tue\",
sum (case when DATEPART(hh, TransDateTime) = 20 and DATEPART(dw, TransDateTime) = 2 then  AmountInCents/100.0 else 0 end) as \"20:00-Tue\",
sum (case when DATEPART(hh, TransDateTime) = 21 and DATEPART(dw, TransDateTime) = 2 then  AmountInCents/100.0 else 0 end) as \"21:00-Tue\",
sum (case when DATEPART(hh, TransDateTime) = 22 and DATEPART(dw, TransDateTime) = 2 then  AmountInCents/100.0 else 0 end) as \"22:00-Tue\",
sum (case when DATEPART(hh, TransDateTime) = 23 and DATEPART(dw, TransDateTime) = 2 then  AmountInCents/100.0 else 0 end) as \"23:00-Tue\",
sum (case when DATEPART(hh, TransDateTime) = 0 and DATEPART(dw, TransDateTime) = 3 then  AmountInCents/100.0 else 0 end) as \"00:00-Wed\",
sum (case when DATEPART(hh, TransDateTime) = 1 and DATEPART(dw, TransDateTime) = 3 then  AmountInCents/100.0 else 0 end) as \"01:00-Wed\",
sum (case when DATEPART(hh, TransDateTime) = 2 and DATEPART(dw, TransDateTime) = 3 then  AmountInCents/100.0 else 0 end) as \"02:00-Wed\",
sum (case when DATEPART(hh, TransDateTime) = 3 and DATEPART(dw, TransDateTime) = 3 then  AmountInCents/100.0 else 0 end) as \"03:00-Wed\",
sum (case when DATEPART(hh, TransDateTime) = 4 and DATEPART(dw, TransDateTime) = 3 then  AmountInCents/100.0 else 0 end) as \"04:00-Wed\",
sum (case when DATEPART(hh, TransDateTime) = 5 and DATEPART(dw, TransDateTime) = 3 then  AmountInCents/100.0 else 0 end) as \"05:00-Wed\",
sum (case when DATEPART(hh, TransDateTime) = 6 and DATEPART(dw, TransDateTime) = 3 then  AmountInCents/100.0 else 0 end) as \"06:00-Wed\",
sum (case when DATEPART(hh, TransDateTime) = 7 and DATEPART(dw, TransDateTime) = 3 then  AmountInCents/100.0 else 0 end) as \"07:00-Wed\",
sum (case when DATEPART(hh, TransDateTime) = 8 and DATEPART(dw, TransDateTime) = 3 then  AmountInCents/100.0 else 0 end) as \"08:00-Wed\",
sum (case when DATEPART(hh, TransDateTime) = 9 and DATEPART(dw, TransDateTime) = 3 then  AmountInCents/100.0 else 0 end) as \"09:00-Wed\",
sum (case when DATEPART(hh, TransDateTime) = 10 and DATEPART(dw, TransDateTime) = 3 then  AmountInCents/100.0 else 0 end) as \"10:00-Wed\",


sum (case when DATEPART(hh, TransDateTime) = 11 and DATEPART(dw, TransDateTime) = 3 then  AmountInCents/100.0 else 0 end) as \"11:00-Wed\",

sum (case when DATEPART(hh, TransDateTime) = 12 and DATEPART(dw, TransDateTime) = 3 then  AmountInCents/100.0 else 0 end) as \"12:00-Wed\",
sum (case when DATEPART(hh, TransDateTime) = 13 and DATEPART(dw, TransDateTime) = 3 then  AmountInCents/100.0 else 0 end) as \"13:00-Wed\",
sum (case when DATEPART(hh, TransDateTime) = 14 and DATEPART(dw, TransDateTime) = 3 then  AmountInCents/100.0 else 0 end) as \"14:00-Wed\",
sum (case when DATEPART(hh, TransDateTime) = 15 and DATEPART(dw, TransDateTime) = 3 then  AmountInCents/100.0 else 0 end) as \"15:00-Wed\",
sum (case when DATEPART(hh, TransDateTime) = 16 and DATEPART(dw, TransDateTime) = 3 then  AmountInCents/100.0 else 0 end) as \"16:00-Wed\",
sum (case when DATEPART(hh, TransDateTime) = 17 and DATEPART(dw, TransDateTime) = 3 then  AmountInCents/100.0 else 0 end) as \"17:00-Wed\",
sum (case when DATEPART(hh, TransDateTime) = 18 and DATEPART(dw, TransDateTime) = 3 then  AmountInCents/100.0 else 0 end) as \"18:00-Wed\",
sum (case when DATEPART(hh, TransDateTime) = 19 and DATEPART(dw, TransDateTime) = 3 then  AmountInCents/100.0 else 0 end) as \"19:00-Wed\",
sum (case when DATEPART(hh, TransDateTime) = 20 and DATEPART(dw, TransDateTime) = 3 then  AmountInCents/100.0 else 0 end) as \"20:00-Wed\",
sum (case when DATEPART(hh, TransDateTime) = 21 and DATEPART(dw, TransDateTime) = 3 then  AmountInCents/100.0 else 0 end) as \"21:00-Wed\",
sum (case when DATEPART(hh, TransDateTime) = 22 and DATEPART(dw, TransDateTime) = 3 then  AmountInCents/100.0 else 0 end) as \"22:00-Wed\",
sum (case when DATEPART(hh, TransDateTime) = 23 and DATEPART(dw, TransDateTime) = 3 then  AmountInCents/100.0 else 0 end) as \"23:00-Wed\",
sum (case when DATEPART(hh, TransDateTime) = 0 and DATEPART(dw, TransDateTime) = 4 then  AmountInCents/100.0 else 0 end) as \"00:00-Thu\",
sum (case when DATEPART(hh, TransDateTime) = 1 and DATEPART(dw, TransDateTime) = 4 then  AmountInCents/100.0 else 0 end) as \"01:00-Thu\",
sum (case when DATEPART(hh, TransDateTime) = 2 and DATEPART(dw, TransDateTime) = 4 then  AmountInCents/100.0 else 0 end) as \"02:00-Thu\",
sum (case when DATEPART(hh, TransDateTime) = 3 and DATEPART(dw, TransDateTime) = 4 then  AmountInCents/100.0 else 0 end) as \"03:00-Thu\",
sum (case when DATEPART(hh, TransDateTime) = 4 and DATEPART(dw, TransDateTime) = 4 then  AmountInCents/100.0 else 0 end) as \"04:00-Thu\",
sum (case when DATEPART(hh, TransDateTime) = 5 and DATEPART(dw, TransDateTime) = 4 then  AmountInCents/100.0 else 0 end) as \"05:00-Thu\",
sum (case when DATEPART(hh, TransDateTime) = 6 and DATEPART(dw, TransDateTime) = 4 then  AmountInCents/100.0 else 0 end) as \"06:00-Thu\",
sum (case when DATEPART(hh, TransDateTime) = 7 and DATEPART(dw, TransDateTime) = 4 then  AmountInCents/100.0 else 0 end) as \"07:00-Thu\",
sum (case when DATEPART(hh, TransDateTime) = 8 and DATEPART(dw, TransDateTime) = 4 then  AmountInCents/100.0 else 0 end) as \"08:00-Thu\",
sum (case when DATEPART(hh, TransDateTime) = 9 and DATEPART(dw, TransDateTime) = 4 then  AmountInCents/100.0 else 0 end) as \"09:00-Thu\",
sum (case when DATEPART(hh, TransDateTime) = 10 and DATEPART(dw, TransDateTime) = 4 then  AmountInCents/100.0 else 0 end) as \"10:00-Thu\",
sum (case when DATEPART(hh, TransDateTime) = 11 and DATEPART(dw, TransDateTime) = 4 then  AmountInCents/100.0 else 0 end) as \"11:00-Thu\",
sum (case when DATEPART(hh, TransDateTime) = 12 and DATEPART(dw, TransDateTime) = 4 then  AmountInCents/100.0 else 0 end) as \"12:00-Thu\",
sum (case when DATEPART(hh, TransDateTime) = 13 and DATEPART(dw, TransDateTime) = 4 then  AmountInCents/100.0 else 0 end) as \"13:00-Thu\",
sum (case when DATEPART(hh, TransDateTime) = 14 and DATEPART(dw, TransDateTime) = 4 then  AmountInCents/100.0 else 0 end) as \"14:00-Thu\",
sum (case when DATEPART(hh, TransDateTime) = 15 and DATEPART(dw, TransDateTime) = 4 then  AmountInCents/100.0 else 0 end) as \"15:00-Thu\",
sum (case when DATEPART(hh, TransDateTime) = 16 and DATEPART(dw, TransDateTime) = 4 then  AmountInCents/100.0 else 0 end) as \"16:00-Thu\",
sum (case when DATEPART(hh, TransDateTime) = 17 and DATEPART(dw, TransDateTime) = 4 then  AmountInCents/100.0 else 0 end) as \"17:00-Thu\",
sum (case when DATEPART(hh, TransDateTime) = 18 and DATEPART(dw, TransDateTime) = 4 then  AmountInCents/100.0 else 0 end) as \"18:00-Thu\",
sum (case when DATEPART(hh, TransDateTime) = 19 and DATEPART(dw, TransDateTime) = 4 then  AmountInCents/100.0 else 0 end) as \"19:00-Thu\",
sum (case when DATEPART(hh, TransDateTime) = 20 and DATEPART(dw, TransDateTime) = 4 then  AmountInCents/100.0 else 0 end) as \"20:00-Thu\",
sum (case when DATEPART(hh, TransDateTime) = 21 and DATEPART(dw, TransDateTime) = 4 then  AmountInCents/100.0 else 0 end) as \"21:00-Thu\",
sum (case when DATEPART(hh, TransDateTime) = 22 and DATEPART(dw, TransDateTime) = 4 then  AmountInCents/100.0 else 0 end) as \"22:00-Thu\",
sum (case when DATEPART(hh, TransDateTime) = 23 and DATEPART(dw, TransDateTime) = 4 then  AmountInCents/100.0 else 0 end) as \"23:00-Thu\",
sum (case when DATEPART(hh, TransDateTime) = 0 and DATEPART(dw, TransDateTime) = 5 then  AmountInCents/100.0 else 0 end) as \"00:00-Fri\",
sum (case when DATEPART(hh, TransDateTime) = 1 and DATEPART(dw, TransDateTime) = 5 then  AmountInCents/100.0 else 0 end) as \"01:00-Fri\",
sum (case when DATEPART(hh, TransDateTime) = 2 and DATEPART(dw, TransDateTime) = 5 then  AmountInCents/100.0 else 0 end) as \"02:00-Fri\",
sum (case when DATEPART(hh, TransDateTime) = 3 and DATEPART(dw, TransDateTime) = 5 then  AmountInCents/100.0 else 0 end) as \"03:00-Fri\",
sum (case when DATEPART(hh, TransDateTime) = 4 and DATEPART(dw, TransDateTime) = 5 then  AmountInCents/100.0 else 0 end) as \"04:00-Fri\",
sum (case when DATEPART(hh, TransDateTime) = 5 and DATEPART(dw, TransDateTime) = 5 then  AmountInCents/100.0 else 0 end) as \"05:00-Fri\",
sum (case when DATEPART(hh, TransDateTime) = 6 and DATEPART(dw, TransDateTime) = 5 then  AmountInCents/100.0 else 0 end) as \"06:00-Fri\",
sum (case when DATEPART(hh, TransDateTime) = 7 and DATEPART(dw, TransDateTime) = 5 then  AmountInCents/100.0 else 0 end) as \"07:00-Fri\",
sum (case when DATEPART(hh, TransDateTime) = 8 and DATEPART(dw, TransDateTime) = 5 then  AmountInCents/100.0 else 0 end) as \"08:00-Fri\",
sum (case when DATEPART(hh, TransDateTime) = 9 and DATEPART(dw, TransDateTime) = 5 then  AmountInCents/100.0 else 0 end) as \"09:00-Fri\",
sum (case when DATEPART(hh, TransDateTime) = 10 and DATEPART(dw, TransDateTime) = 5 then  AmountInCents/100.0 else 0 end) as \"10:00-Fri\",
sum (case when DATEPART(hh, TransDateTime) = 11 and DATEPART(dw, TransDateTime) = 5 then  AmountInCents/100.0 else 0 end) as \"11:00-Fri\",
sum (case when DATEPART(hh, TransDateTime) = 12 and DATEPART(dw, TransDateTime) = 5 then  AmountInCents/100.0 else 0 end) as \"12:00-Fri\",
sum (case when DATEPART(hh, TransDateTime) = 13 and DATEPART(dw, TransDateTime) = 5 then  AmountInCents/100.0 else 0 end) as \"13:00-Fri\",
sum (case when DATEPART(hh, TransDateTime) = 14 and DATEPART(dw, TransDateTime) = 5 then  AmountInCents/100.0 else 0 end) as \"14:00-Fri\",
sum (case when DATEPART(hh, TransDateTime) = 15 and DATEPART(dw, TransDateTime) = 5 then  AmountInCents/100.0 else 0 end) as \"15:00-Fri\",
sum (case when DATEPART(hh, TransDateTime) = 16 and DATEPART(dw, TransDateTime) = 5 then  AmountInCents/100.0 else 0 end) as \"16:00-Fri\",
sum (case when DATEPART(hh, TransDateTime) = 17 and DATEPART(dw, TransDateTime) = 5 then  AmountInCents/100.0 else 0 end) as \"17:00-Fri\",
sum (case when DATEPART(hh, TransDateTime) = 18 and DATEPART(dw, TransDateTime) = 5 then  AmountInCents/100.0 else 0 end) as \"18:00-Fri\",
sum (case when DATEPART(hh, TransDateTime) = 19 and DATEPART(dw, TransDateTime) = 5 then  AmountInCents/100.0 else 0 end) as \"19:00-Fri\",
sum (case when DATEPART(hh, TransDateTime) = 20 and DATEPART(dw, TransDateTime) = 5 then  AmountInCents/100.0 else 0 end) as \"20:00-Fri\",
sum (case when DATEPART(hh, TransDateTime) = 21 and DATEPART(dw, TransDateTime) = 5 then  AmountInCents/100.0 else 0 end) as \"21:00-Fri\",
sum (case when DATEPART(hh, TransDateTime) = 22 and DATEPART(dw, TransDateTime) = 5 then  AmountInCents/100.0 else 0 end) as \"22:00-Fri\",
sum (case when DATEPART(hh, TransDateTime) = 23 and DATEPART(dw, TransDateTime) = 5 then  AmountInCents/100.0 else 0 end) as \"23:00-Fri\",
sum (case when DATEPART(hh, TransDateTime) = 0 and DATEPART(dw, TransDateTime) = 6 then  AmountInCents/100.0 else 0 end) as \"00:00-Sat\",
sum (case when DATEPART(hh, TransDateTime) = 1 and DATEPART(dw, TransDateTime) = 6 then  AmountInCents/100.0 else 0 end) as \"01:00-Sat\",
sum (case when DATEPART(hh, TransDateTime) = 2 and DATEPART(dw, TransDateTime) = 6 then  AmountInCents/100.0 else 0 end) as \"02:00-Sat\",
sum (case when DATEPART(hh, TransDateTime) = 3 and DATEPART(dw, TransDateTime) = 6 then  AmountInCents/100.0 else 0 end) as \"03:00-Sat\",
sum (case when DATEPART(hh, TransDateTime) = 4 and DATEPART(dw, TransDateTime) = 6 then  AmountInCents/100.0 else 0 end) as \"04:00-Sat\",
sum (case when DATEPART(hh, TransDateTime) = 5 and DATEPART(dw, TransDateTime) = 6 then  AmountInCents/100.0 else 0 end) as \"05:00-Sat\",
sum (case when DATEPART(hh, TransDateTime) = 6 and DATEPART(dw, TransDateTime) = 6 then  AmountInCents/100.0 else 0 end) as \"06:00-Sat\",
sum (case when DATEPART(hh, TransDateTime) = 7 and DATEPART(dw, TransDateTime) = 6 then  AmountInCents/100.0 else 0 end) as \"07:00-Sat\",
sum (case when DATEPART(hh, TransDateTime) = 8 and DATEPART(dw, TransDateTime) = 6 then  AmountInCents/100.0 else 0 end) as \"08:00-Sat\",
sum (case when DATEPART(hh, TransDateTime) = 9 and DATEPART(dw, TransDateTime) = 6 then  AmountInCents/100.0 else 0 end) as \"09:00-Sat\",
sum (case when DATEPART(hh, TransDateTime) = 10 and DATEPART(dw, TransDateTime) = 6 then  AmountInCents/100.0 else 0 end) as \"10:00-Sat\",
sum (case when DATEPART(hh, TransDateTime) = 11 and DATEPART(dw, TransDateTime) = 6 then  AmountInCents/100.0 else 0 end) as \"11:00-Sat\",
sum (case when DATEPART(hh, TransDateTime) = 12 and DATEPART(dw, TransDateTime) = 6 then  AmountInCents/100.0 else 0 end) as \"12:00-Sat\",
sum (case when DATEPART(hh, TransDateTime) = 13 and DATEPART(dw, TransDateTime) = 6 then  AmountInCents/100.0 else 0 end) as \"13:00-Sat\",
sum (case when DATEPART(hh, TransDateTime) = 14 and DATEPART(dw, TransDateTime) = 6 then  AmountInCents/100.0 else 0 end) as \"14:00-Sat\",
sum (case when DATEPART(hh, TransDateTime) = 15 and DATEPART(dw, TransDateTime) = 6 then  AmountInCents/100.0 else 0 end) as \"15:00-Sat\",
sum (case when DATEPART(hh, TransDateTime) = 16 and DATEPART(dw, TransDateTime) = 6 then  AmountInCents/100.0 else 0 end) as \"16:00-Sat\",
sum (case when DATEPART(hh, TransDateTime) = 17 and DATEPART(dw, TransDateTime) = 6 then  AmountInCents/100.0 else 0 end) as \"17:00-Sat\",
sum (case when DATEPART(hh, TransDateTime) = 18 and DATEPART(dw, TransDateTime) = 6 then  AmountInCents/100.0 else 0 end) as \"18:00-Sat\",
sum (case when DATEPART(hh, TransDateTime) = 19 and DATEPART(dw, TransDateTime) = 6 then  AmountInCents/100.0 else 0 end) as \"19:00-Sat\",
sum (case when DATEPART(hh, TransDateTime) = 20 and DATEPART(dw, TransDateTime) = 6 then  AmountInCents/100.0 else 0 end) as \"20:00-Sat\",
sum (case when DATEPART(hh, TransDateTime) = 21 and DATEPART(dw, TransDateTime) = 6 then  AmountInCents/100.0 else 0 end) as \"21:00-Sat\",
sum (case when DATEPART(hh, TransDateTime) = 22 and DATEPART(dw, TransDateTime) = 6 then  AmountInCents/100.0 else 0 end) as \"22:00-Sat\",
sum (case when DATEPART(hh, TransDateTime) = 23 and DATEPART(dw, TransDateTime) = 7 then  AmountInCents/100.0 else 0 end) as \"23:00-Sat\",
sum (case when DATEPART(hh, TransDateTime) = 0 and DATEPART(dw, TransDateTime) = 7 then  AmountInCents/100.0 else 0 end) as \"00:00-Sun\",
sum (case when DATEPART(hh, TransDateTime) = 1 and DATEPART(dw, TransDateTime) = 7 then  AmountInCents/100.0 else 0 end) as \"01:00-Sun\",
sum (case when DATEPART(hh, TransDateTime) = 2 and DATEPART(dw, TransDateTime) = 7 then  AmountInCents/100.0 else 0 end) as \"02:00-Sun\",
sum (case when DATEPART(hh, TransDateTime) = 3 and DATEPART(dw, TransDateTime) = 7 then  AmountInCents/100.0 else 0 end) as \"03:00-Sun\",
sum (case when DATEPART(hh, TransDateTime) = 4 and DATEPART(dw, TransDateTime) = 7 then  AmountInCents/100.0 else 0 end) as \"04:00-Sun\",
sum (case when DATEPART(hh, TransDateTime) = 5 and DATEPART(dw, TransDateTime) = 7 then  AmountInCents/100.0 else 0 end) as \"05:00-Sun\",
sum (case when DATEPART(hh, TransDateTime) = 6 and DATEPART(dw, TransDateTime) = 7 then  AmountInCents/100.0 else 0 end) as \"06:00-Sun\",
sum (case when DATEPART(hh, TransDateTime) = 7 and DATEPART(dw, TransDateTime) = 7 then  AmountInCents/100.0 else 0 end) as \"07:00-Sun\",
sum (case when DATEPART(hh, TransDateTime) = 8 and DATEPART(dw, TransDateTime) = 7 then  AmountInCents/100.0 else 0 end) as \"08:00-Sun\",
sum (case when DATEPART(hh, TransDateTime) = 9 and DATEPART(dw, TransDateTime) = 7 then  AmountInCents/100.0 else 0 end) as \"09:00-Sun\",
sum (case when DATEPART(hh, TransDateTime) = 10 and DATEPART(dw, TransDateTime) = 7 then  AmountInCents/100.0 else 0 end) as \"10:00-Sun\",
sum (case when DATEPART(hh, TransDateTime) = 11 and DATEPART(dw, TransDateTime) = 7 then  AmountInCents/100.0 else 0 end) as \"11:00-Sun\",
sum (case when DATEPART(hh, TransDateTime) = 12 and DATEPART(dw, TransDateTime) = 7 then  AmountInCents/100.0 else 0 end) as \"12:00-Sun\",
sum (case when DATEPART(hh, TransDateTime) = 13 and DATEPART(dw, TransDateTime) = 7 then  AmountInCents/100.0 else 0 end) as \"13:00-Sun\",
sum (case when DATEPART(hh, TransDateTime) = 14 and DATEPART(dw, TransDateTime) = 7 then  AmountInCents/100.0 else 0 end) as \"14:00-Sun\",
sum (case when DATEPART(hh, TransDateTime) = 15 and DATEPART(dw, TransDateTime) = 7 then  AmountInCents/100.0 else 0 end) as \"15:00-Sun\",
sum (case when DATEPART(hh, TransDateTime) = 16 and DATEPART(dw, TransDateTime) = 7 then  AmountInCents/100.0 else 0 end) as \"16:00-Sun\",
sum (case when DATEPART(hh, TransDateTime) = 17 and DATEPART(dw, TransDateTime) = 7 then  AmountInCents/100.0 else 0 end) as \"17:00-Sun\",
sum (case when DATEPART(hh, TransDateTime) = 18 and DATEPART(dw, TransDateTime) = 7 then  AmountInCents/100.0 else 0 end) as \"18:00-Sun\",
sum (case when DATEPART(hh, TransDateTime) = 19 and DATEPART(dw, TransDateTime) = 7 then  AmountInCents/100.0 else 0 end) as \"19:00-Sun\",
sum (case when DATEPART(hh, TransDateTime) = 20 and DATEPART(dw, TransDateTime) = 7 then  AmountInCents/100.0 else 0 end) as \"20:00-Sun\",
sum (case when DATEPART(hh, TransDateTime) = 21 and DATEPART(dw, TransDateTime) = 7 then  AmountInCents/100.0 else 0 end) as \"21:00-Sun\",
sum (case when DATEPART(hh, TransDateTime) = 22 and DATEPART(dw, TransDateTime) = 7 then  AmountInCents/100.0 else 0 end) as \"22:00-Sun\",
sum (case when DATEPART(hh, TransDateTime) = 23 and DATEPART(dw, TransDateTime) = 7 then  AmountInCents/100.0 else 0 end) as \"23:00-Sun\"

FROM dbo.TransactionsCash

WHERE MeterId in (4677)
-- and DATEPART (WK, TransDateTime) between '1' and ''
and DATEPART (yy, TransDateTime) between '2010' and '2011'

GROUP BY MeterId, DATEPART(YY, TransDateTime), DATEPART(WK, TransDateTime),
CONVERT(CHAR(10),DATEADD(DAY, DATEDIFF(DAY, '19000101', TransDateTime) / 7 * 7, '19000101'),105),
CONVERT(CHAR(10),DATEADD(DAY, DATEDIFF(DAY, '19000101', TransDateTime) / 7 * 7, '19000101')+6,105)

) xa
order by meter_id, year_id, week_id    


";

    /**
     * Retrieve result into csv file
     */
    /*
    $results = mssql_query($sql, $db);
        //Generate CSV file - Set as MSSQL_ASSOC as you don't need the numeric values.
        while ($l = mssql_fetch_array($results, MSSQL_ASSOC)) {
        foreach($l AS $key => $value){
            //If the character " exists, then escape it, otherwise the csv file will be invalid.
            $pos = strpos($value, '"');
            if ($pos !== false) {
                $value = str_replace('"', '\"', $value);
            }
            $out .= '"'.$value.'",';
        }
        $out .= "\n";
    }
    mssql_free_result($results);
    mssql_close($db);
    // Output to browser with the CSV mime type
    header("Content-type: text/x-csv");
    header("Content-Disposition: attachment; filename=table_dump.csv");
    echo $out;
    */

$result = mssql_query($sql); 
if (!$result) 
    { 
    $message = 'ERROR: ' . mssql_get_last_message(); 
    return $message; 
    } 
    else 
    { 
        $i = 0; 
        echo '<html><body><table><thead>'; 
        while ($i < mssql_num_fields($result)) 
        { 
            $meta = mssql_fetch_field($result, $i); 
            echo '<td>' . $meta->name . '</td>'; 
            $i = $i + 1;
        }
        echo '</thead>';
        while ( ($row = mssql_fetch_row($result))) 
            { 
            $count = count($row); $y = 0; echo '<tr>'; 
            while ($y < $count) 
                { 
                $c_row = current($row); echo '<td>' . $c_row . '</td>'; 
                next($row); 
                $y = $y + 1;
                } 
        echo '</tr>';
        } 
    mssql_free_result($result); 
    echo '</table></body></html>'; 

   }

?>
