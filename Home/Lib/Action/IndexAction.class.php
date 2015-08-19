<?php

/**
 * 默认行为相关
 * 时间:2014-04-17
 * @author Author:wuxiang
 * @version 1.0
 * @subpackage Action
 * @package  Lib
 */
class IndexAction extends Action
{
    /**
     * index函数，显示登录界面
     * @access public
     */
    public function index()
    {
        $this->display("Login:login");
        /*$llq = $_SERVER['HTTP_USER_AGENT'];
        $nanainfo = strstr($llq, 'Chrome');
        if ($nanainfo != false) {
            $this->display("Login:login");
        } else {
            $this->error();
        }*/
    }

    public function error()
    {
        $this->display('Index:error');
    }

    public function download()
    {
        $file_name = 'Chrome.exe'; //下载文件名
        $file_dir = "./ChromeDown/"; //下载文件存放目录
        //检查文件是否存在
        if (!file_exists($file_dir . $file_name)) {
            echo "文件不存在";
            exit ();
        } else {
            //打开文件
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . $file_name);
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file_dir . $file_name));
            ob_clean();
            flush();
            readfile($file_dir . $file_name);
            exit;
        }
    }
}