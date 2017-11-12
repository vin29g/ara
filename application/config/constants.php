<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESCTRUCTIVE') OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code


/* 
|
|----------------------------------------------------------------------
|ARA
|----------------------------------------------------------------------
|
| Array for country lookup table.
|
*/

define ("countries",json_encode(array("India","Afghanistan","Argentina","Australia","Austria","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Bermuda","Bhutan","Botswana","Brunei Darussalam","Bulgaria (Rep)","Cambodia","Canada","Cape Verde","Cayman Island","China (People's Rep)","Cuba","Cyprus","Democratic Republic of Congo","Denmark","Egypt","El Salvador","Eritrea","Estonia","Ethiopia","Fiji","France","Georgia","Germany","Ghana","Greece","Guyana","Hong Kong","Hungary","Iceland","Indonesia","Iran","Iraq","Ireland","Israel","Italy","Japan","Jordan","Kenya","Korea (Republic of)","Kuwait","Latvia","Luxembourg","Macao (China)","Malawi","Malaysia","Maldives","Mauritius","Mexico","Mongolia","Morocco","Namibia","Nauru","Nepal","Netherlands","New Zealand","Niger","Nigeria","Norway","Oman","Pakistan","Panama (Rep)","Papua New Guinea","Philippines","Poland","Portugal","Qatar","Rwanda","Romania","Russia","Saudi Arabia","Senegal","Singapore","South Africa","Spain","Sri Lanka","Sudan","Sweden","Switzerland","Taiwan","Tanzania","Thailand","Tunisia","Turkey","United Arab Emirates (UAE)","Uganda","United Kingdom of  Great Britain","Ukraine","United States of America","Vietnam","Yemen")));

/*If you make any change to branch list, update it in courses table in db. */
define ("courses",json_encode(array("Civil Engineering","Electrical Engineering","Mechanical Engineering","Electronics &amp; Communications Engineering","Metallurgical &amp; Materials Engineering","Chemical Engineering","Computer Science &amp; Engineering","Biotechnology","Mathematics","Physics","Chemistry","School of Managment","Humanities &amp; Social Science","Not Applicable")));	

define ("course_types",json_encode(array("B. Tech.","M.Tech","PhD","MSc.","MCA","MBA","MSc. Tech")));				
define ("postal_charges",json_encode(array("0","638","805","630","905","680","485","615","930","785","575","370","950","400","650","505","930","825","780","400","875","760","950","1030","730","790","760","755","995","480","815","910","865","455","925","830","590","930","960","440","900","590","1030","760","975","420","760","885","410","665","695","865","395","700","900","375","765","880","670","800","640","580","365","1050","520","450","840","1310","650","490","1025","680","405","775","720","740","695","1005","1160","745","820","430","865","795","415","920","1015","1175","515","770","380","705","645","895","930","955","925","585","390","515")));
/* End of file constants.php */
/* Location: ./application/config/constants.php */
