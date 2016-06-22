# NBJS

Nuke Bad JavaScript ,

When i notice a joomla website has been hacked ,
i have created this script in order to clean all maleware from PHP files
the attack  injected a fake JQuery Script that include
virus into the HEAD section right before the closing </head> 
the virus look like this ,

https://blog.sucuri.net/wp-content/uploads/2015/11/js-jquery-min-php-injection.png

so basicly my script look for the bad javascript string and delete it ,

Cheers
JudaB
