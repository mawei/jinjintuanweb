<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `system`;");
E_C("CREATE TABLE `system` (
  `id` enum('1') NOT NULL DEFAULT '1',
  `value` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
E_D("replace into `system` values('1','eyJkYiI6eyJob3N0IjoibG9jYWxob3N0IiwidXNlciI6InJvb3QiLCJwYXNzIjoiIiwibmFtZSI6IjU4dHVhbiJ9LCJtZW1jYWNoZSI6WyIiLCIiLCIiLCIiXSwid2Vicm9vdCI6IiIsInN5c3RlbSI6eyJ3d3dwcmVmaXgiOiJodHRwOlwvXC8xMjcuMC4wLjEiLCJpbWdwcmVmaXgiOiJodHRwOlwvXC8xMjcuMC4wLjEiLCJjc3NwcmVmaXgiOiJodHRwOlwvXC8xMjcuMC4wLjEiLCJzaXRlbmFtZSI6Ilx1NTZlMlx1OGQyZFx1N2Y1MSIsInNpdGV0aXRsZSI6Ilx1NTZlMlx1OGQyZFx1N2Y1MSIsImFiYnJldmlhdGlvbiI6Ilx1NTZlMlx1OGQyZFx1N2Y1MSIsImNvdXBvbm5hbWUiOiJcdTRmMThcdTYwZTBcdTUyMzgiLCJjdXJyZW5jeSI6Ilx1MDBhNSIsImN1cnJlbmN5bmFtZSI6IkNOWSIsInRpbWV6b25lIjoiRXRjXC9HTVQtOCIsImluZGV4dGVhbSI6IjEyIiwic2lkZXRlYW0iOiI0IiwiZWRpdG9yIjoia2luZCIsImRlc2NyaXB0aW9uIjoiXHU4ZDJkXHU3ZjUxXHVmZjBjXHU0ZTEzXHU0ZTFhXHU3Njg0XHU2MjgwXHU2NzJmXHU1M2NhXHU4ZmQwXHU4NDI1XHU1NmUyXHU5NjFmXHUzMDAyNyoyNFx1NWMwZlx1NjVmNlx1NTcyOFx1N2ViZlx1NWJhMlx1NjcwZFx1NGUzYVx1NTU0Nlx1NWJiNlx1MzAwMVx1NWJhMlx1NjIzN1x1NjNkMFx1NGY5Ylx1NjViOVx1NGZiZlx1NjcwZFx1NTJhMVx1MzAwMiIsImtleXdvcmRzIjoiXHU1NmUyXHU4ZDJkXHU3ZjUxIiwiaW52aXRlY3JlZGl0IjoiMSIsImNvbmR1c2VyIjowLCJwYXJ0bmVyZG93biI6MCwiZ3ppcCI6MCwia2VmdXFxIjoiMjcyOTk2NjYzIiwia2VmdW1zbiI6IiIsIm1vYmlsZXVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMVwvd2FwIiwiaWNwIjoiWyBcdTU4OWVcdTUwM2NcdTc1MzVcdTRmZTFcdTRlMWFcdTUyYTFcdTdlY2ZcdTg0MjVcdThiYjhcdTUzZWZcdThiYzEgQTIuQjEuQjItMjAzMzAwMjEgXSBJQ1AgXHU4YmMxXHU1M2Y3Olx1NmQ1OSBJQ1AgXHU1OTA3IDEzMDE4Mjc3XHU1M2Y3LTEiLCJzdGF0Y29kZSI6IiIsInNpbmFqaXdhaSI6IiIsInRlbmNlbnRqaXdhaSI6IiIsImdpdmVtb25leSI6IjAuMSIsInRhc2tfaV9ob3VyIjoiMCIsInRhc2tfaV9taW4iOiIyMCIsInRhc2tfaV9zZWMiOiIwIiwidGFza19pX251bSI6IjEifSwiYnVsbGV0aW4iOnsiMCI6IjEyMjMiLCIxIjoiPHA+PFwvcD4iLCI1MyI6IjIxMTExMTEzIiwiNTIiOiIiLCI1MSI6IjIxMzMzMzMzMzMzIiwiNDYiOiIiLCI0NSI6IiIsIjQyIjoiIn0sImFsaXBheSI6eyJndWFyYW50ZWUiOiJOIiwibWlkIjoiIiwic2VjIjoiIiwiYWNjIjoiIiwiaXRicGF5IjoiIiwiZ3VhcmFudGVlc3VjY2VzcyI6Ik4iLCJhbGlmYXN0IjoiTiIsImFsaWFkZHJlc3MiOiJOIn0sInRlbnBheSI6eyJtaWQiOiIiLCJzZWMiOiIiLCJndWFyYW50ZWUiOiJOIiwiZGlyZWN0IjoiWSJ9LCJzZG9wYXkiOnsibWlkIjoiIiwic2VjIjoiIiwiZGlyZWN0IjoiWSJ9LCJiaWxsIjp7Im1pZCI6IiIsInNlYyI6IiJ9LCJjaGluYWJhbmsiOnsibWlkIjoiIiwic2VjIjoiIn0sInBheXBhbCI6eyJtaWQiOiIiLCJsb2MiOiIifSwieWVlcGF5Ijp7Im1pZCI6IiIsInNlYyI6IiIsImRpcmVjdCI6IlkifSwiY21wYXkiOnsibWlkIjoiIiwic2VjIjoiIn0sImdvcGF5Ijp7Im1pZCI6IiIsImFjYyI6IiIsImNvZGUiOiIiLCJkaXJlY3QiOiJZIn0sIm90aGVyIjp7InBheSI6IiJ9LCJvcHRpb24iOnsiaW5kZXhtdWx0aSI6IlkiLCJpbmRleHBhZ2UiOiJZIiwiaW5kZXhtdWx0aW1laXR1YW4iOiJZIiwidmVyaWZ5cmVnaXN0ZXIiOiJZIiwidmVyaWZ5dG9waWMiOiJOIiwidmVyaWZ5ZmVlZGJhY2siOiJOIiwibmF2Y29tbWVudCI6IlkiLCJuYXZwcmVkaWN0IjoiWSIsIm5hdnBhcnRuZXIiOiJZIiwibmF2c2Vjb25kcyI6IlkiLCJuYXZnb29kcyI6IlkiLCJuYXZmb3J1bSI6Ik4iLCJidXljb3Vwb25zbXMiOiJOIiwidXNlY291cG9uc21zIjoiTiIsImV4cHJlc3NidXlzbXMiOiJOIiwiZGlzcGxheWZhaWx1cmUiOiJZIiwidGVhbWFzayI6IlkiLCJjcmVkaXRzZWNvbmRzIjoiTiIsInNtc3N1YnNjcmliZSI6IlkiLCJ0cnNpbXBsZSI6IlkiLCJtb25leXNhdmUiOiJZIiwidGVhbXdob2xlIjoiWSIsImVuY29kZWlkIjoiTiIsInVzZXJwcml2YWN5IjoiWSIsInVzZXJjcmVkaXQiOiJZIiwiY3JlZGl0c2hvcCI6IlkiLCJjaXR5bG9jYWwiOiJZIiwibXljb3Vwb24iOiJZIiwiYmluZG1vYmlsZSI6Ik4iLCJkYXlzaWduIjoiWSIsIndpZGdldCI6IlkiLCJvbmx5Y291cG9uIjoiTiIsImluZGV4Y2F0ZXRlYW0iOiJZIiwiY2F0ZXRlYW0iOiJZIiwiY2F0ZXBhcnRuZXIiOiJZIiwiY2l0eXBhcnRuZXIiOiJZIiwiY2F0ZXNlY29uZHMiOiJZIiwiY2F0ZWdvb2RzIjoiWSIsImVtYWlsdmVyaWZ5IjoiTiIsIm5lZWRtb2JpbGUiOiJZIiwibW9iaWxlY29kZSI6Ik4iLCJnaXZlY3JlZGl0IjoiTiIsImdpdmVtb25leSI6IlkiLCJ0YXNrIjoiWSIsInJld3JpdGVjaXR5IjoiTiIsInJld3JpdGV0ZWFtIjoiTiIsInJld3JpdGVwYXJ0bmVyIjoiTiIsImhkZmsiOiJZIiwic2luYWxvZ2luIjoiWSIsImZpcnN0c2luYWxvZ2luIjoiWSIsInFxbG9naW4iOiJZIiwiZmlyc3RxcWxvZ2luIjoiWSIsInF6b25lbG9naW4iOiJOIiwiZmlyc3Rxem9uZWxvZ2luIjoiTiJ9LCJtYWlsIjp7ImVuY29kaW5nIjoiVVRGLTgiLCJtYWlsIjoic210cCIsImhvc3QiOiIiLCJwb3J0IjoiMjUiLCJzc2wiOiJmYWxzZSIsInVzZXIiOiIiLCJwYXNzIjoiIiwiZnJvbSI6IiIsInJlcGx5IjoiIiwiaW50ZXJ2YWwiOiIwIiwiaGVscHBob25lIjoiIiwiaGVscGVtYWlsIjoiIn0sInNtcyI6eyJ1c2VyIjoiIiwicGFzcyI6IiIsImludGVydmFsIjoiNjAiLCJudW1iZXJzIjoiMyJ9LCJjcmVkaXQiOnsicmVnaXN0ZXIiOjAsImxvZ2luIjowLCJpbnZpdGUiOjEwLCJidXkiOjAsInBheSI6MCwiY2hhcmdlIjowLCJjb21tZW50Ijo1fSwic2tpbiI6eyJ0ZW1wbGF0ZSI6IjU4MjAxMyIsInRoZW1lIjoiNTgifSwiYXV0aG9yaXphdGlvbiI6bnVsbCwic2luYSI6eyJrZXkiOiIxIiwic2VjIjoiMSJ9LCJxcSI6eyJrZXkiOiIxIiwic2VjIjoiMSJ9LCJxem9uZSI6eyJrZXkiOiIiLCJzZWMiOiIifX0=');");

require("../../inc/footer.php");
?>