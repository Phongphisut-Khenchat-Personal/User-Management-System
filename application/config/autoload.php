<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
| AUTO-LOADER
| -------------------------------------------------------------------
| This file specifies which systems should be loaded by default.
*/

/*
| -------------------------------------------------------------------
|  Auto-load Packages
| -------------------------------------------------------------------
*/
$autoload['packages'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Libraries
| -------------------------------------------------------------------
| โหลด libraries ที่ใช้บ่อยอัตโนมัติ
*/
$autoload['libraries'] = array(
    'database',      // สำหรับเชื่อมต่อฐานข้อมูล
    'session',       // สำหรับจัดการ session
    'form_validation', // สำหรับตรวจสอบข้อมูลฟอร์ม
    'upload',        // สำหรับอัพโหลดไฟล์
    'email'          // สำหรับส่งอีเมล (ถ้าต้องการใช้)
);

/*
| -------------------------------------------------------------------
|  Auto-load Drivers
| -------------------------------------------------------------------
*/
$autoload['drivers'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Helper Files
| -------------------------------------------------------------------
| โหลด helpers ที่ใช้บ่อยอัตโนมัติ
*/
$autoload['helper'] = array(
    'url',           // สำหรับ base_url(), site_url() เป็นต้น
    'form',          // สำหรับสร้างฟอร์ม HTML
    'html',          // สำหรับ HTML helpers
    'file',          // สำหรับจัดการไฟล์
    'date',          // สำหรับจัดการวันที่
    'security',      // สำหรับความปลอดภัย
    'string',        // สำหรับจัดการ string
    'array'          // สำหรับจัดการ array
);

/*
| -------------------------------------------------------------------
|  Auto-load Config files
| -------------------------------------------------------------------
*/
$autoload['config'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Language files
| -------------------------------------------------------------------
*/
$autoload['language'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Models
| -------------------------------------------------------------------
| โหลด models ที่ใช้บ่อยอัตโนมัติ
*/
$autoload['model'] = array(
    'user_model'     // โหลด User_model อัตโนมัติ
);
