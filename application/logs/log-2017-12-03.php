<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2017-12-03 05:15:55 --> Query error: Unknown column 'transactions.tstatus' in 'where clause' - Invalid query: SELECT `user_info`.`name`, `user_info`.`rollno`, `user_info`.`contact`, `user_info`.`email`, `user_info`.`address`, `user_requests`.`request_id`, `user_requests`.`status`, `user_requests`.`sem_list`, `user_requests`.`date`, `user_requests`.`assigned`, `user_requests`.`completion_date`, `services`.`description`, `costs`.`type`, `transactions`.`txnamount`, `uploaded_documents`.`doc1`
FROM `user_requests`
JOIN `user_info` ON `user_requests`.`user_id` = `user_info`.`id`
JOIN `request_services` ON `request_services`.`request_id`=`user_requests`.`request_id`
JOIN `costs` ON `request_services`.`service_id` = `costs`.`id`
JOIN `services` ON `costs`.`service` = `services`.`id`
JOIN `transactions` ON `user_requests`.`request_id` = `transactions`.`request_id`
JOIN `uploaded_documents` ON `uploaded_documents`.`request_id` = `transactions`.`request_id`
WHERE `transactions`.`tstatus` = 1
ERROR - 2017-12-03 05:15:55 --> Query error: Unknown column 'transactions.tstatus' in 'where clause' - Invalid query: UPDATE `ci_sessions` SET `timestamp` = 1512274555
WHERE `transactions`.`tstatus` = 1
AND `id` = 'ce8027bec529183e95a700e12953fbb9ba4c3783'
