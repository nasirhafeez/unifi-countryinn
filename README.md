# Ubiquiti External Captive Portal

The captive portal web server can be setup using the instructions given [here](https://gist.github.com/nasirhafeez/d47c9d68742227a23f1011455a190490).
The following actions are required to use the code given in this repo:
 
Rename the `.env.example` file to `.env` and set the values of the given environment variables in it.

*Install Composer*

Then run `php composer.phar install` to install the packages given in `composer.json`.

*Access Code*
Execute the given script to create the database table and define your desire access code. 

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `access_code` varchar(30) NOT NULL
);
INSERT INTO `settings` (`id`, `access_code`) VALUES
(1, 'user_define_code');
