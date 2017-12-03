<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2017-12-02 14:51:49 --> Severity: Notice --> Use of undefined constant id - assumed 'id' C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 107
ERROR - 2017-12-02 14:51:49 --> Severity: Notice --> Use of undefined constant id - assumed 'id' C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 108
ERROR - 2017-12-02 14:51:49 --> Severity: Notice --> Undefined index: id C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 108
ERROR - 2017-12-02 14:56:20 --> Severity: Notice --> Use of undefined constant id - assumed 'id' C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 107
ERROR - 2017-12-02 14:56:20 --> Severity: Notice --> Use of undefined constant id - assumed 'id' C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 108
ERROR - 2017-12-02 14:56:20 --> Severity: Notice --> Undefined index: id C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 108
ERROR - 2017-12-02 14:56:30 --> Severity: Notice --> Use of undefined constant id - assumed 'id' C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 107
ERROR - 2017-12-02 14:56:30 --> Severity: Notice --> Use of undefined constant id - assumed 'id' C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 108
ERROR - 2017-12-02 14:56:30 --> Severity: Notice --> Undefined index: id C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 108
ERROR - 2017-12-02 14:56:54 --> Severity: Notice --> Use of undefined constant id - assumed 'id' C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 107
ERROR - 2017-12-02 14:56:54 --> Severity: Notice --> Use of undefined constant id - assumed 'id' C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 108
ERROR - 2017-12-02 14:56:54 --> Severity: Notice --> Undefined index: id C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 108
ERROR - 2017-12-02 14:56:59 --> Severity: Notice --> Use of undefined constant id - assumed 'id' C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 107
ERROR - 2017-12-02 14:57:00 --> Severity: Notice --> Use of undefined constant id - assumed 'id' C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 108
ERROR - 2017-12-02 14:57:00 --> Severity: Notice --> Undefined index: id C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 108
ERROR - 2017-12-02 14:57:02 --> Severity: Notice --> Use of undefined constant id - assumed 'id' C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 107
ERROR - 2017-12-02 14:57:02 --> Severity: Notice --> Use of undefined constant id - assumed 'id' C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 108
ERROR - 2017-12-02 14:57:02 --> Severity: Notice --> Undefined index: id C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 108
ERROR - 2017-12-02 14:58:08 --> Severity: Notice --> Undefined index: name C:\xampp\htdocs\ara\application\views\admin\applicationForm.php 16
ERROR - 2017-12-02 15:03:05 --> Severity: Notice --> Undefined index: name C:\xampp\htdocs\ara\application\views\admin\applicationForm.php 16
ERROR - 2017-12-02 15:03:07 --> Severity: Notice --> Undefined index: name C:\xampp\htdocs\ara\application\views\admin\applicationForm.php 16
ERROR - 2017-12-02 15:03:08 --> Severity: Notice --> Undefined index: name C:\xampp\htdocs\ara\application\views\admin\applicationForm.php 16
ERROR - 2017-12-02 15:03:09 --> Severity: Notice --> Undefined index: name C:\xampp\htdocs\ara\application\views\admin\applicationForm.php 16
ERROR - 2017-12-02 15:03:30 --> Query error: Column 'request_id' in where clause is ambiguous - Invalid query: SELECT `user_info`.`name`, `user_info`.`rollno`, `user_info`.`contact`, `user_info`.`email`, `user_info`.`address`, `user_requests`.`request_id`, `user_requests`.`status`, `user_requests`.`sem_list`, `user_requests`.`date`, `user_requests`.`assigned`, `user_requests`.`completion_date`, `services`.`description`, `costs`.`type`, `transactions`.`txnamount`, `uploaded_documents`.`doc1`
FROM `user_requests`
JOIN `user_info` ON `user_requests`.`user_id` = `user_info`.`id`
JOIN `request_services` ON `request_services`.`request_id`=`user_requests`.`request_id`
JOIN `costs` ON `request_services`.`service_id` = `costs`.`id`
JOIN `services` ON `costs`.`service` = `services`.`id`
JOIN `transactions` ON `user_requests`.`request_id` = `transactions`.`request_id`
JOIN `uploaded_documents` ON `uploaded_documents`.`request_id` = `transactions`.`request_id`
WHERE `request_id` = '-157792849240180'
ERROR - 2017-12-02 15:03:30 --> Query error: Unknown column 'request_id' in 'where clause' - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1512223410
WHERE `request_id` = '-157792849240180'
AND `id` = '62ce99eecb2192d03ab8ecf699846926e2f34ab4'
ERROR - 2017-12-02 15:04:34 --> Severity: Notice --> Use of undefined constant id - assumed 'id' C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 107
ERROR - 2017-12-02 15:04:34 --> Severity: Notice --> Use of undefined constant id - assumed 'id' C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 108
ERROR - 2017-12-02 15:04:34 --> Severity: Notice --> Undefined index: id C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 108
ERROR - 2017-12-02 15:05:16 --> Severity: Notice --> Use of undefined constant id - assumed 'id' C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 107
ERROR - 2017-12-02 15:05:16 --> Severity: Notice --> Use of undefined constant id - assumed 'id' C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 108
ERROR - 2017-12-02 15:05:16 --> Severity: Notice --> Undefined index: id C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 108
ERROR - 2017-12-02 15:09:53 --> Severity: Notice --> Use of undefined constant id - assumed 'id' C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 107
ERROR - 2017-12-02 15:09:53 --> Severity: Notice --> Use of undefined constant id - assumed 'id' C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 108
ERROR - 2017-12-02 15:09:53 --> Severity: Notice --> Undefined index: id C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 108
ERROR - 2017-12-02 15:10:52 --> Severity: Notice --> Use of undefined constant id - assumed 'id' C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 107
ERROR - 2017-12-02 15:10:52 --> Severity: Notice --> Use of undefined constant id - assumed 'id' C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 108
ERROR - 2017-12-02 15:10:52 --> Severity: Notice --> Undefined index: id C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 108
ERROR - 2017-12-02 15:11:07 --> Severity: Notice --> Use of undefined constant id - assumed 'id' C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 107
ERROR - 2017-12-02 15:11:07 --> Severity: Notice --> Use of undefined constant id - assumed 'id' C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 108
ERROR - 2017-12-02 15:11:07 --> Severity: Notice --> Undefined index: id C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 108
ERROR - 2017-12-02 15:11:11 --> Severity: Notice --> Use of undefined constant id - assumed 'id' C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 107
ERROR - 2017-12-02 15:11:11 --> Severity: Notice --> Use of undefined constant id - assumed 'id' C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 108
ERROR - 2017-12-02 15:11:11 --> Severity: Notice --> Undefined index: id C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 108
ERROR - 2017-12-02 15:11:26 --> Severity: Notice --> Use of undefined constant id - assumed 'id' C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 107
ERROR - 2017-12-02 15:11:26 --> Severity: Notice --> Use of undefined constant id - assumed 'id' C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 108
ERROR - 2017-12-02 15:11:26 --> Severity: Notice --> Undefined index: id C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 108
ERROR - 2017-12-02 15:13:58 --> Severity: Notice --> Use of undefined constant id - assumed 'id' C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 107
ERROR - 2017-12-02 15:13:58 --> Severity: Notice --> Use of undefined constant id - assumed 'id' C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 108
ERROR - 2017-12-02 15:13:58 --> Severity: Notice --> Undefined index: id C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 108
ERROR - 2017-12-02 15:18:09 --> Severity: Notice --> Undefined index: course C:\xampp\htdocs\ara\application\views\admin\applicationForm.php 31
ERROR - 2017-12-02 15:22:07 --> Severity: Notice --> Use of undefined constant id - assumed 'id' C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 107
ERROR - 2017-12-02 15:22:07 --> Severity: Notice --> Use of undefined constant id - assumed 'id' C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 108
ERROR - 2017-12-02 15:22:07 --> Severity: Notice --> Undefined index: id C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 108
ERROR - 2017-12-02 15:26:34 --> Severity: Warning --> mail(): Failed to connect to mailserver at &quot;localhost&quot; port 25, verify your &quot;SMTP&quot; and &quot;smtp_port&quot; setting in php.ini or use ini_set() C:\xampp\htdocs\ara\system\libraries\Email.php 1816
ERROR - 2017-12-02 15:27:28 --> Severity: Warning --> mail(): Failed to connect to mailserver at &quot;localhost&quot; port 25, verify your &quot;SMTP&quot; and &quot;smtp_port&quot; setting in php.ini or use ini_set() C:\xampp\htdocs\ara\system\libraries\Email.php 1816
ERROR - 2017-12-02 15:30:39 --> Severity: Warning --> mail(): Failed to connect to mailserver at &quot;localhost&quot; port 25, verify your &quot;SMTP&quot; and &quot;smtp_port&quot; setting in php.ini or use ini_set() C:\xampp\htdocs\ara\system\libraries\Email.php 1816
ERROR - 2017-12-02 15:33:43 --> Severity: Notice --> Undefined variable: proxy C:\xampp\htdocs\ara\application\models\CostModel.php 206
ERROR - 2017-12-02 15:33:44 --> Severity: User Error --> Curl failed with error #60: SSL certificate problem: unable to get local issuer certificate C:\xampp\htdocs\ara\application\models\CostModel.php 228
ERROR - 2017-12-02 15:34:07 --> Severity: User Error --> Curl failed with error #60: SSL certificate problem: unable to get local issuer certificate C:\xampp\htdocs\ara\application\models\CostModel.php 228
ERROR - 2017-12-02 15:34:20 --> Severity: User Error --> Curl failed with error #60: SSL certificate problem: unable to get local issuer certificate C:\xampp\htdocs\ara\application\models\CostModel.php 228
ERROR - 2017-12-02 15:34:24 --> Severity: User Error --> Curl failed with error #60: SSL certificate problem: unable to get local issuer certificate C:\xampp\htdocs\ara\application\models\CostModel.php 228
ERROR - 2017-12-02 15:47:50 --> Severity: Warning --> Missing argument 3 for CostModel::currencyConverter(), called in C:\xampp\htdocs\ara\application\models\CostModel.php on line 440 and defined C:\xampp\htdocs\ara\application\models\CostModel.php 197
ERROR - 2017-12-02 15:58:59 --> Severity: Warning --> mail(): Failed to connect to mailserver at &quot;localhost&quot; port 25, verify your &quot;SMTP&quot; and &quot;smtp_port&quot; setting in php.ini or use ini_set() C:\xampp\htdocs\ara\system\libraries\Email.php 1816
ERROR - 2017-12-02 15:58:59 --> Severity: Error --> Call to undefined method CostModel::convert() C:\xampp\htdocs\ara\application\controllers\Index.php 140
ERROR - 2017-12-02 16:00:29 --> Severity: Warning --> mail(): Failed to connect to mailserver at &quot;localhost&quot; port 25, verify your &quot;SMTP&quot; and &quot;smtp_port&quot; setting in php.ini or use ini_set() C:\xampp\htdocs\ara\system\libraries\Email.php 1816
ERROR - 2017-12-02 16:00:56 --> Severity: Notice --> Undefined index: doc1 C:\xampp\htdocs\ara\application\models\CostModel.php 105
ERROR - 2017-12-02 16:00:56 --> Severity: Notice --> Undefined index: doc1 C:\xampp\htdocs\ara\application\models\CostModel.php 113
ERROR - 2017-12-02 16:00:56 --> Severity: Notice --> Undefined index: doc1 C:\xampp\htdocs\ara\application\models\CostModel.php 105
ERROR - 2017-12-02 16:00:56 --> Query error: Column 'doc1' cannot be null - Invalid query: INSERT INTO `uploaded_documents` (`request_id`, `doc1`, `secondary_type`) VALUES ('1273327819425603', NULL, NULL)
ERROR - 2017-12-02 16:02:05 --> Severity: Warning --> mail(): Failed to connect to mailserver at &quot;localhost&quot; port 25, verify your &quot;SMTP&quot; and &quot;smtp_port&quot; setting in php.ini or use ini_set() C:\xampp\htdocs\ara\system\libraries\Email.php 1816
ERROR - 2017-12-02 16:03:38 --> Severity: Notice --> Use of undefined constant id - assumed 'id' C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 107
ERROR - 2017-12-02 16:03:38 --> Severity: Notice --> Use of undefined constant id - assumed 'id' C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 108
ERROR - 2017-12-02 16:03:38 --> Severity: Notice --> Undefined index: id C:\xampp\htdocs\ara\application\views\admin\viewRequests.php 108
