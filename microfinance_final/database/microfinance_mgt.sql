DROP DATABASE IF EXISTS microfinance_mgt;
CREATE DATABASE microfinance_mgt;
USE microfinance_mgt;


CREATE TABLE `role` (
  `role_id` int(11) PRIMARY KEY,
  `r_name` varchar(50) NOT NULL
) ;


CREATE TABLE `loan_status` (
  `loan_status_id` int(11) PRIMARY KEY,
  `loan_status_name` varchar(50) NOT NULL
);


CREATE TABLE `payment_status` (
  `payment_status_id` int(11) PRIMARY KEY,
  `payment_status_name` varchar(50) NOT NULL
);

CREATE TABLE `user` (
  `user_id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) unique NOT NULL,
  `password` varchar(255) NOT NULL,
  `telephone` varchar(16) NOT NULL,
  `role_id` int(11) NOT NULL,
  foreign key(role_id) references role(role_id) ON DELETE CASCADE ON UPDATE CASCADE
);


CREATE TABLE `loan_application` (
  `loan_application_id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `loan_status_id` int(11) NOT NULL,
  `loan_amount` int(11) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `repayment_terms` varchar(1000) NOT NULL,
  `collateral` varchar(10000) NOT NULL,
  foreign key(user_id) references user(user_id) ON DELETE CASCADE ON UPDATE CASCADE,
  foreign key(loan_status_id) references loan_status(loan_status_id) ON DELETE CASCADE ON UPDATE CASCADE
);


CREATE TABLE `loan` (
  `loan_id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `user_id_fk` int(11) NOT NULL,
  `loan_application_id` int(11) NOT NULL,
  `loan_status_id` int(11) NOT NULL,
  `loan_amount` int(11) NOT NULL,
  `interest_rate` int(11) NOT NULL,
  `repayment_schedule` varchar(255) NOT NULL,
  foreign key(user_id_fk) references user(user_id) ON DELETE CASCADE ON UPDATE CASCADE,
  foreign key(loan_application_id) references loan_application(loan_application_id) ON DELETE CASCADE ON UPDATE CASCADE,
foreign key(loan_status_id) references loan_status(loan_status_id) ON DELETE CASCADE ON UPDATE CASCADE
) ;


CREATE TABLE `loan_notification` (
  `loan_notification_id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `user_id_fk` int(11) NOT NULL,
  `loan_status_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  foreign key(user_id_fk) references user(user_id) ON DELETE CASCADE ON UPDATE CASCADE,
  foreign key(loan_status_id) references loan_status(loan_status_id) ON DELETE CASCADE ON UPDATE CASCADE
);



CREATE TABLE `payment_notification` (
  `payment_notification_id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `user_id_fk` int(11) NOT NULL,
  `payment_status_id` int(11) NOT NULL,
  `message` varchar(10000) NOT NULL,
  `timestamp` datetime NOT NULL,
  foreign key(user_id_fk) references user(user_id) ON DELETE CASCADE ON UPDATE CASCADE,
  foreign key(payment_status_id) references payment_status(payment_status_id) ON DELETE CASCADE ON UPDATE CASCADE
);


CREATE TABLE `payment` (
  `payment_id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `loan_id` int(11) NOT NULL,
  `loan_status_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_date` datetime NOT NULL,
  `payment_method` varchar(300) NOT NULL,
  foreign key(loan_id) references loan(loan_id) ON DELETE CASCADE ON UPDATE CASCADE,
  foreign key(loan_status_id) references loan_status(loan_status_id) ON DELETE CASCADE ON UPDATE CASCADE
);





INSERT INTO `loan_status` (`loan_status_id`, `loan_status_name`) VALUES
(1, 'approved'),
(2, 'pending'),
(3, 'rejected');



INSERT INTO `payment_status` (`payment_status_id`, `payment_status_name`) VALUES
(1, 'paid'),
(2, 'unpaid');


INSERT INTO `role` (`role_id`, `r_name`) VALUES
(1, 'admin'),
(2, 'user');

INSERT INTO `user` (`user_id`, `fname`, `lname`,`username`,`email`,`password`,`telephone`,`role_id`) VALUES
(0, 'admin','admin','admin','admin@microfinance','@Dmin','+000-000-000-000', 1);