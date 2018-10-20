# Log in and Sign up system

- Create account
- Log in
- Activate account
- Deactivate account
- Forget password
- Change password
- Update profile
- Remember me
- Permision
- Validation (password, email, username)

Its localhost version

For demo, just create DB and configure in config.php file.

Database fields (I know, I just need to put exported db file, but hey let makes some practice)

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `reset_code` char(32) NOT NULL,
  `is_active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


Screenshoots : 

https://imgur.com/5vzTUCV
https://imgur.com/FAabh7R
https://imgur.com/ianCMGX
https://imgur.com/pOHSTdr
https://imgur.com/WVYjuXj
https://imgur.com/NuaMug9
https://imgur.com/JnGARFs
https://imgur.com/ODm8UPE
https://imgur.com/K7VNYE8
https://imgur.com/8Tb7t1w
https://imgur.com/uDXLVRO
https://imgur.com/4SPlfAL
https://imgur.com/JaAUzlp


Any question, just ask.

Have a fun.
