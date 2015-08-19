<?php

/**
 * 登录行为相关
 * 时间:2014-04-17
 * @author Author:wuxiang
 * @version 1.0
 * @subpackage Action
 * @package  Lib
 */
class LoginAction extends Action
{
    /**
     * index函数，显示登录界面
     * @access public
     */
    public function index()
    {
        $this->display();
    }

    /**
     * login函数，获取login页面Post传递值
     * 从数据库中查询，获取结果并判断相应值
     * 若有值获取用户名，权限，保存在session中并返回一个数组
     * 若没有数据，返回一个数组
     * @access public
     * @return array
     */
    public function login()
    {
        $data['username'] = $_POST['username'];
        $data['password'] = $_POST['userpass'];
        if ($data['username'] == '' || $data['password'] == '') {
            $this->error('你的输入不正确');
        } else {
            $user = M('User');
            $arr = $user->where($data)->select();
            if (count($arr) == 1) {
                $result = $this::controlLoginTime($arr[0]['qx']);
                if ($result) {
                    session_start();
                    $_SESSION['user_id'] = $arr[0]['id'];
                    $this->success('登录成功', '__APP__/System/index');
                } else {
                    $this->error('对不起，登陆时间已经过期');
                }
            } else {
                $this->error('你的输入不正确');
            }
        }
    }

    /**
     * 比较时间的登陆限制.
     *
     * $param string $str 用户的权限.
     *
     * @return boolean
     */
    public static function controlLoginTime($str)
    {
        if ($str) {

        } else {
            $id = $_SESSION['user_id'];
            $m = M('user');
            $str = $m->where('id=' . $id)->getField('qx');
        }
        $time = SystemAction::getLimitTime();
        if ($time) {
            if (strpos($str, '管理员')) {
                if ($time['gl'][0] < date('Y')) {
                    return false;
                } else if ($time['gl'][0] == date('Y')) {
                    if (date('m') < $time['gl'][1]) {
                        return true;
                    } elseif (date('m') == $time['gl'][1]) {
                        if (date('d') <= $time['gl']['2']) {
                            return true;
                        }
                        return false;
                    }else {
                        return false;
                    }
                } else {
                    return true;
                }
            } elseif ($str == '普通用户') {
                if ($time['pt'][0] < date('Y')) {
                    return false;
                } else if ($time['pt'][0] == date('Y')) {
                    if (date('m') < $time['pt'][1]) {
                        return true;
                    } elseif (date('m') == $time['pt'][1]) {
                        if (date('d') <= $time['pt']['2']) {
                            return true;
                        }
                        return false;
                    }else {
                        return false;
                    }
                } else {
                    return true;
                }
            }
            return true;
        }
        return true;
    }

}
