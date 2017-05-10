CREATE TABLE `login` (
 `salutation` varchar(5) NOT NULL,
 `first_name` varchar(255) NOT NULL,
 `last_name` varchar(255) NOT NULL,
 `affiliation` varchar(255) NOT NULL,
 `position` varchar(255) NOT NULL,
 `email` varchar(255) NOT NULL,
 `password` varchar(255) NOT NULL,
 `phone_number` varchar(255) DEFAULT NULL,
 `fax_number` varchar(255) DEFAULT NULL,
 `website` varchar(255) DEFAULT NULL,
 `address` varchar(255) NOT NULL,
 `city` varchar(255) NOT NULL,
 `state` varchar(255) DEFAULT NULL,
 `postal` int(6) DEFAULT NULL,
 `region` varchar(255) NOT NULL,
 PRIMARY KEY (`email`)
) 
