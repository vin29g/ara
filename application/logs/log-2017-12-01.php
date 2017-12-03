<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2017-12-01 09:16:55 --> Severity: Warning --> mysqli::real_connect(): (HY000/1045): Access denied for user 'root'@'localhost' (using password: YES) C:\xampp\htdocs\ara\system\database\drivers\mysqli\mysqli_driver.php 161
ERROR - 2017-12-01 09:16:55 --> Unable to connect to the database
ERROR - 2017-12-01 09:41:29 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '.`request_id`, `user_requests`.`status`, `user_requests`.`sem_list`, `user_reque' at line 1 - Invalid query: SELECT `user_info`.`name`, `user_info`.`rollno`, `user_info`.`contact`, `user_info`.`email`, `user_info`.`address` `user_requests`.`request_id`, `user_requests`.`status`, `user_requests`.`sem_list`, `user_requests`.`date`, `user_requests`.`assigned`, `user_requests`.`completion_date`, `services`.`description`, `costs`.`type`, `transactions`.`txnamount`, `uploaded_documents`.`doc1`
FROM `user_requests`
JOIN `user_info` ON `user_requests`.`user_id` = `user_info`.`id`
JOIN `request_services` ON `request_services`.`request_id`=`user_requests`.`request_id`
JOIN `costs` ON `request_services`.`service_id` = `costs`.`id`
JOIN `services` ON `costs`.`service` = `services`.`id`
JOIN `transactions` ON `user_requests`.`request_id` = `transactions`.`request_id`
JOIN `uploaded_documents` ON `uploaded_documents`.`request_id` = `transactions`.`request_id`
ERROR - 2017-12-01 09:55:42 --> Severity: Notice --> Undefined variable: MERCHANT_KEY C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 13
ERROR - 2017-12-01 09:55:42 --> Severity: Notice --> Undefined variable: hash C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 14
ERROR - 2017-12-01 09:55:42 --> Severity: Notice --> Undefined index: txnid C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 15
ERROR - 2017-12-01 09:55:42 --> Severity: Notice --> Undefined index: amount C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 16
ERROR - 2017-12-01 09:55:42 --> Severity: Notice --> Undefined index: firstname C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 17
ERROR - 2017-12-01 09:55:42 --> Severity: Notice --> Undefined index: email C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 18
ERROR - 2017-12-01 09:55:42 --> Severity: Notice --> Undefined index: phone C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 19
ERROR - 2017-12-01 09:55:42 --> Severity: Notice --> Undefined index: productinfo C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 20
ERROR - 2017-12-01 09:55:42 --> Severity: Notice --> Undefined index: surl C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 21
ERROR - 2017-12-01 09:55:42 --> Severity: Notice --> Undefined index: furl C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 22
ERROR - 2017-12-01 11:06:48 --> Severity: Notice --> Undefined offset: 182 C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 42
ERROR - 2017-12-01 11:07:31 --> Severity: Notice --> Undefined offset: 182 C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 42
ERROR - 2017-12-01 12:01:06 --> Severity: Notice --> Use of undefined constant id - assumed 'id' C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 107
ERROR - 2017-12-01 12:01:06 --> Severity: Notice --> Undefined index: id C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 107
ERROR - 2017-12-01 12:05:51 --> Severity: Notice --> Use of undefined constant id - assumed 'id' C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 107
ERROR - 2017-12-01 12:05:51 --> Severity: Notice --> Use of undefined constant id - assumed 'id' C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 108
ERROR - 2017-12-01 12:05:51 --> Severity: Notice --> Undefined index: id C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 108
