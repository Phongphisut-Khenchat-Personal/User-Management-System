<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates to zero length or create a new file for writing
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates to zero length or create a new file for reading and writing
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab'); // write only, place the file pointer at the end of the file or create a new file for writing
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b'); // read/write, place the file pointer at the end of the file or create a new file for reading and writing
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb'); // create and open for writing only; fail if the file already exists
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b'); // create and open for reading and writing; fail if the file already exists

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
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
|--------------------------------------------------------------------------
| User System Constants
|--------------------------------------------------------------------------
| ค่าคงที่สำหรับระบบผู้ใช้
*/

// User Roles
defined('ROLE_ADMIN')    OR define('ROLE_ADMIN', 'admin');
defined('ROLE_USER')     OR define('ROLE_USER', 'user');

// User Status
defined('STATUS_ACTIVE')   OR define('STATUS_ACTIVE', 'active');
defined('STATUS_INACTIVE') OR define('STATUS_INACTIVE', 'inactive');
defined('STATUS_BANNED')   OR define('STATUS_BANNED', 'banned');

// Password Requirements
defined('MIN_PASSWORD_LENGTH') OR define('MIN_PASSWORD_LENGTH', 6);
defined('MIN_USERNAME_LENGTH') OR define('MIN_USERNAME_LENGTH', 3);
defined('MAX_USERNAME_LENGTH') OR define('MAX_USERNAME_LENGTH', 50);
defined('MAX_FULLNAME_LENGTH') OR define('MAX_FULLNAME_LENGTH', 100);

// File Upload Settings
defined('MAX_UPLOAD_SIZE')     OR define('MAX_UPLOAD_SIZE', 2048); // KB
defined('UPLOAD_PATH')         OR define('UPLOAD_PATH', './uploads/');
defined('PROFILE_UPLOAD_PATH') OR define('PROFILE_UPLOAD_PATH', './uploads/profiles/');
defined('ALLOWED_IMAGE_TYPES') OR define('ALLOWED_IMAGE_TYPES', 'jpg|jpeg|png|gif');

// Image Settings
defined('MAX_IMAGE_WIDTH')   OR define('MAX_IMAGE_WIDTH', 2000);
defined('MAX_IMAGE_HEIGHT')  OR define('MAX_IMAGE_HEIGHT', 2000);
defined('THUMB_WIDTH')       OR define('THUMB_WIDTH', 150);
defined('THUMB_HEIGHT')      OR define('THUMB_HEIGHT', 150);

// Session Settings
defined('SESSION_TIMEOUT')     OR define('SESSION_TIMEOUT', 7200); // 2 hours
defined('LOGIN_ATTEMPTS_MAX')  OR define('LOGIN_ATTEMPTS_MAX', 5);
defined('LOCKOUT_TIME')        OR define('LOCKOUT_TIME', 900); // 15 minutes

// Pagination
defined('ITEMS_PER_PAGE')      OR define('ITEMS_PER_PAGE', 10);
defined('PAGINATION_LINKS')    OR define('PAGINATION_LINKS', 5);

// Date Formats
defined('DATE_FORMAT')         OR define('DATE_FORMAT', 'd/m/Y');
defined('DATETIME_FORMAT')     OR define('DATETIME_FORMAT', 'd/m/Y H:i:s');
defined('TIME_FORMAT')         OR define('TIME_FORMAT', 'H:i:s');

// Cache Settings
defined('CACHE_TIMEOUT')       OR define('CACHE_TIMEOUT', 3600); // 1 hour
defined('ENABLE_CACHE')        OR define('ENABLE_CACHE', FALSE);

// API Settings
defined('API_VERSION')         OR define('API_VERSION', '1.0');
defined('API_RATE_LIMIT')      OR define('API_RATE_LIMIT', 100); // requests per hour

// Security Settings
defined('CSRF_TOKEN_NAME')     OR define('CSRF_TOKEN_NAME', 'csrf_token');
defined('HASH_ALGORITHM')      OR define('HASH_ALGORITHM', 'sha256');
defined('ENCRYPTION_METHOD')   OR define('ENCRYPTION_METHOD', 'AES-256-CBC');

// Email Settings
defined('EMAIL_FROM_NAME')     OR define('EMAIL_FROM_NAME', 'User System');
defined('EMAIL_FROM_ADDRESS')  OR define('EMAIL_FROM_ADDRESS', 'noreply@example.com');

// Application Settings
defined('APP_NAME')            OR define('APP_NAME', 'ระบบจัดการผู้ใช้');
defined('APP_VERSION')         OR define('APP_VERSION', '1.0.0');
defined('APP_DESCRIPTION')     OR define('APP_DESCRIPTION', 'ระบบจัดการผู้ใช้แบบ Minimalist');

// Debug Settings
defined('DEBUG_MODE')          OR define('DEBUG_MODE', TRUE); // เปลี่ยนเป็น FALSE ในการใช้งานจริง
defined('LOG_LEVEL')           OR define('LOG_LEVEL', 'error');

// Default Values
defined('DEFAULT_AVATAR')      OR define('DEFAULT_AVATAR', 'default-avatar.png');
defined('DEFAULT_TIMEZONE')    OR define('DEFAULT_TIMEZONE', 'Asia/Bangkok');
defined('DEFAULT_LANGUAGE')    OR define('DEFAULT_LANGUAGE', 'thai');

// HTTP Status Codes
defined('HTTP_OK')                    OR define('HTTP_OK', 200);
defined('HTTP_CREATED')               OR define('HTTP_CREATED', 201);
defined('HTTP_BAD_REQUEST')           OR define('HTTP_BAD_REQUEST', 400);
defined('HTTP_UNAUTHORIZED')          OR define('HTTP_UNAUTHORIZED', 401);
defined('HTTP_FORBIDDEN')             OR define('HTTP_FORBIDDEN', 403);
defined('HTTP_NOT_FOUND')             OR define('HTTP_NOT_FOUND', 404);
defined('HTTP_METHOD_NOT_ALLOWED')    OR define('HTTP_METHOD_NOT_ALLOWED', 405);
defined('HTTP_INTERNAL_SERVER_ERROR') OR define('HTTP_INTERNAL_SERVER_ERROR', 500);

// Response Messages
defined('MSG_SUCCESS')         OR define('MSG_SUCCESS', 'สำเร็จ');
defined('MSG_ERROR')           OR define('MSG_ERROR', 'เกิดข้อผิดพลาด');
defined('MSG_NOT_FOUND')       OR define('MSG_NOT_FOUND', 'ไม่พบข้อมูล');
defined('MSG_UNAUTHORIZED')    OR define('MSG_UNAUTHORIZED', 'ไม่มีสิทธิ์เข้าถึง');
defined('MSG_VALIDATION_ERROR') OR define('MSG_VALIDATION_ERROR', 'ข้อมูลไม่ถูกต้อง');

// User Messages
defined('MSG_LOGIN_SUCCESS')    OR define('MSG_LOGIN_SUCCESS', 'เข้าสู่ระบบสำเร็จ');
defined('MSG_LOGIN_FAILED')     OR define('MSG_LOGIN_FAILED', 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง');
defined('MSG_LOGOUT_SUCCESS')   OR define('MSG_LOGOUT_SUCCESS', 'ออกจากระบบสำเร็จ');
defined('MSG_REGISTER_SUCCESS') OR define('MSG_REGISTER_SUCCESS', 'สมัครสมาชิกสำเร็จ');
defined('MSG_PROFILE_UPDATED')  OR define('MSG_PROFILE_UPDATED', 'อัพเดทโปรไฟล์สำเร็จ');
defined('MSG_PASSWORD_CHANGED') OR define('MSG_PASSWORD_CHANGED', 'เปลี่ยนรหัสผ่านสำเร็จ');

// Validation Messages
defined('MSG_REQUIRED_FIELD')     OR define('MSG_REQUIRED_FIELD', 'กรุณากรอกข้อมูล');
defined('MSG_INVALID_EMAIL')      OR define('MSG_INVALID_EMAIL', 'รูปแบบอีเมลไม่ถูกต้อง');
defined('MSG_PASSWORD_TOO_SHORT') OR define('MSG_PASSWORD_TOO_SHORT', 'รหัสผ่านต้องมีอย่างน้อย 6 ตัวอักษร');
defined('MSG_USERNAME_EXISTS')    OR define('MSG_USERNAME_EXISTS', 'ชื่อผู้ใช้นี้มีอยู่แล้ว');
defined('MSG_EMAIL_EXISTS')       OR define('MSG_EMAIL_EXISTS', 'อีเมลนี้มีอยู่แล้ว');
