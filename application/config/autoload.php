<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$autoload['packages'] = array();

$autoload['libraries'] = array('database'); //libarari kita tambahkan database

$autoload['drivers'] = array();

$autoload['helper'] = array('url', 'form', 'html'); //pada helper kita tambahkan url, form, html

$autoload['config'] = array();

$autoload['language'] = array();

$autoload['model'] = array('model_mahasiswa'); // model_mahasiswa bentuk file kita ambil dari folder mahasiswa/application/model/model_mahasiswa.php
?>