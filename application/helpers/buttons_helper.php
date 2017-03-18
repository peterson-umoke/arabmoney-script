<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

function simple_btn($name ="", $link ="") {
    return anchor($link,$name,"style='padding: 6px 12px;margin-bottom: 0;font-size: 14px;font-weight: 400;line-height: 1.42857143;text-align: center;white-space: nowrap;vertical-align: middle;-ms-touch-action: manipulation;touch-action: manipulation;cursor: pointer;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;background-image: none;color: #fff;display: block;width: 100%;border: 1px solid transparent;background-color: #3c8dbc;border-color: #367fa9;border-radius: 0;-webkit-box-shadow: none;-moz-box-shadow: none;box-shadow: none;border-width: 1px;margin-top:5px;text-decoration:none;'");
}