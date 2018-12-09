# Guzzle Library Installation


How to Install:

* Go to the current folder (where 'composer.json' file exists [typically same folder of this file] )

* Run the follwing commands one by one :

``` Commands
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    php composer-setup.php
    php -r "unlink('composer-setup.php');"
    php composer.phar self-update
    php composer.phar install
```

This would install 'vendor' folder for the application.

And ready to run your application :+1:

