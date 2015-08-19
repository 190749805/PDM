<?php

/**
 * 默认行为相关
 * 时间:2014-04-17
 * @author Author:wuxiang
 * @version 1.0
 * @subpackage Action
 * @package  Lib
 */
class CommonAction extends Action
{

    //类中共享数组
    public $data;
    public $datatemp;

    /**
     * __construct函数，读取构造数组
     * @access public
     */
    public function __construct()
    {
        parent::__construct();
        if ($_SESSION['user_id'] == null) {
            $this->error('没有登录', '__APP__/Index/index');
        } else {
            $result = LoginAction::controlLoginTime();
            if (!$result) {
                $this->success('对不起，登陆时间已经过期', '__APP__/Index/index');
            }
        }

        //$this->data["jb"]["0"] = $i;
        $id = $_SESSION['user_id'];
        $i = 0;
        $user = M('User');
        $arr = $user->where("id=" . $id)->select();
        //	dump($arr);
        if ($arr['0']['qx'] == 'admin') {
            $filedata = file("./Public/Json/qx/admin.data") or $this->error('系统发生错误', '__APP__/Index/index');
            fclose($filedata);
            $temp = '';
            //	dump($filedata);
            foreach ($filedata as $temp) {
                $temp = explode(":", $temp);
                $relation = trim($temp['0']);
                if ($relation == 'info1' || $relation == 'change') {
                    $operate_1['0']["$relation"] = "<a href='__APP__/Info/$relation'>" . trim($temp['1']) . '</a><br/>';
                } else {
                    $operate_1['0']["$relation"] = "<a href='__APP__/System/$relation'>" . trim($temp['1']) . '</a><br/>';
                }
            }
            $this->assign('operate', $operate_1);
            //	dump($operate_1);
        } else if (strpos($arr['0']['qx'], '管理员')) {
            $filedata = file("./Public/Json/qx/bmadmin.data") or $this->error('系统发生错误', '__APP__/Index/index');
            fclose($filedata);
            $temp = '';
            //	dump($filedata);
            foreach ($filedata as $temp) {
                $temp = explode(":", $temp);
                $relation = trim($temp['0']);
                //	dump($relation);
                if ($relation == 'info1' || $relation == 'change') {
                    $operate_1['0']["$relation"] = "<a href='__APP__/Info/$relation'>" . trim($temp['1']) . '</a><br/>';
                } else {
                    $operate_1['0']["$relation"] = "<a href='__APP__/System/$relation'>" . trim($temp['1']) . '</a><br/>';
                }
            }
            $this->assign('operate', $operate_1);
            //	dump($operate_1);
        } elseif ($arr['0']['qx'] == '普通用户') {
            $filedata = file("./Public/Json/qx/normal.data") or $this->error('系统发生错误', '__APP__/Index/index');
            fclose($filedata);
            $temp = '';
            //	dump($filedata);
            foreach ($filedata as $temp) {
                $temp = explode(":", $temp);
                $relation = trim($temp['0']);
                if ($relation == 'info1' || $relation == 'tishi') {
                    $operate_1['0']["$relation"] = "<a href='__APP__/Info/$relation'>" . trim($temp['1']) . '</a><br/>';
                } else {
                    $operate_1['0']["$relation"] = "<a href='__APP__/System/$relation'>" . trim($temp['1']) . '</a><br/>';
                }
            }
            $this->assign('operate', $operate_1);
            //	dump($operate_1);
        } else {
            $this->error('对不起，您不具备访问权限', '__APP__/Index/index');
        }
    }

    /**
     * 定义操作日志类
     */
    public function logOP($username = '', $op = '', $status = '操作成功')
    {
        $file_extention = '.log';
        date_default_timezone_set('PRC');
        if (!is_null($username) && !is_null($op)) {
            $llq = $_SERVER['HTTP_USER_AGENT'];
            $time = date('Y m d H:i:s');
            $ip = $this->getIP();
            $logPath = 'Log/' . $username . $file_extention;
            $log = "\r\n" . '时 间:' . $time . "\r\n" . 'i  p:' . $ip . "\r\n" . '浏览器:' . $llq . "\r\n" . '用户名:' . $username . "\r\n" . '操  作:' . $op . "\r\n" . '状  态:' . $status . "\r\n";
            $file = fopen($logPath, 'a+');
            fwrite($file, $log);
            fclose($file);
        }
    }

    public function getIP()
    {
        if (getenv('HTTP_CLIENT_IP')) {
            $ip = getenv('HTTP_CLIENT_IP');
        } elseif (getenv('HTTP_X_FORWARDED_FOR')) {
            $ip = getenv('HTTP_X_FORWARDED_FOR');
        } elseif (getenv('HTTP_X_FORWARDED')) {
            $ip = getenv('HTTP_X_FORWARDED');
        } elseif (getenv('HTTP_FORWARDED_FOR')) {
            $ip = getenv('HTTP_FORWARDED_FOR');

        } elseif (getenv('HTTP_FORWARDED')) {
            $ip = getenv('HTTP_FORWARDED');
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    public function readconfig()
    {
        $this->data = '';

        //性别
        $this->data['sex'][0] = '<option name="nan" id="nan" value="男">男</option>';
        $this->data['sex'][1] = '<option name="nv" id="nv" value="女">女</option>';
        // 评委会审批
        $this->data['sp'][0] = '<option  value="成都信息工程学院职称改革工作领导小组">'.成都信息工程学院职称改革工作领导小组.'</option>';
        $this->data['sp'][1] = '<option  value="四川省职称改革工作领导小组">'.四川省职称改革工作领导小组.'</option>';
        $this->data['sp'][2] = '<option  value="其他">'.其他.'</option>';
        // 教学工作的任务类型
        $this->data['rwlx'][0] = '<option value="讲授">'.讲授.'</option>';
        $this->data['rwlx'][1] = '<option value="上机">'.上机.'</option>';
        $this->data['rwlx'][2] = '<option value="实验">'.实验.'</option>';
        $this->data['rwlx'][3] = '<option value="实习">'.实习.'</option>';
        //时间年
        for ($i = 120; $i > 0; $i--) {
            $this->data['year'][$i] = '<option value="' . ($i + 1900) . '">' . ($i + 1900) . '</option>';
        }
        //时间月
        for ($j = 1; $j < 10; $j++) {
            $this->data['month'][$j] = '<option value="0' . $j . '">0' . $j . '</option>';
        }
        $this->data['month'][10] = '<option value="10">10</option>';
        $this->data['month'][11] = '<option value="11">11</option>';
        $this->data['month'][12] = '<option value="12">12</option>';
        // 时间日
        for ($j = 1; $j < 10; $j++) {
            $this->data['day'][$j] = '<option value="0' . $j . '">0' . $j . '</option>';
        }
        for ($j = 10; $j < 32; $j++) {
            $this->data['day'][$j] = '<option value="' . $j . '">' . $j . '</option>';
        }
        //读取部门的信息
        $file = file("./Public/Json/bm.data") or exit("Unable to open file!");
        fclose($file);
        $i = 0;
        foreach ($file as $temp) {
            if ($temp !== '') {
                $temp = trim($temp);
                //$this->datatemp["bm"]["$i"] = $temp;
                $this->data["bm"]["$i"] = '<option value="' . $temp . '">' . $temp . '</option>';
                $i++;
            }
        }
        // $this->data["bm"]["0"] = $i;
        //审核情况
        $this->data['qk'][0] = "<option value='0'>未审核</option>";
        $this->data['qk'][1] = "<option value='1'>通过</option>";
        $this->data['qk'][2] = "<option value='2'>不通过</option>";
        //项目级别教改项目级别：国家级、省级、校级

        $this->data['xmjb'][0] = '<option value="国家级">国家级</option>';
        $this->data['xmjb'][1] = '<option value="省级">省级</option>';
        $this->data['xmjb'][2] = '<option value="校级">校级</option>';
        // 有无的情况
        $this->data['ywqk'][0] = '<option value="有">有</option>';
        $this->data['ywqk'][1] = '<option value="无">无</option>';
        //结题或在研
        $this->data['jz'][0] = '<option value="结题">结题</option>';
        $this->data['jz'][1] = '<option value="在研">在研</option>';
       /* //考试类型
        $this->data['kslx'][0] = '<option value="职称英语考试">职称英语考试</option>';
        $this->data['kslx'][1] = '<option value="职称计算机考试">职称计算机考试</option>';
        $this->data['kslx'][2] = '<option value="免试">免试</option>';*/
        // 免试类型
        $this->data['mslx'][0] = '<option value="英语">英语</option>';
        $this->data['mslx'][1] = '<option value="计算机">计算机</option>';
        //成绩
        $this->data['cj'][0] = '<option value="合格">合格</option>';
        $this->data['cj'][1] = '<option value="免试">免试</option>';
        $this->data['cj'][2] = '<option value="已报名">已报名</option>';
        $this->data['cj'][3] = '<option value="待考">待考</option>';
        // 英语免试原因
        $this->data['yyms'][0] = '<option value="离退休年龄不足5年">'.离退休年龄不足5年.'</option>';
        $this->data['yyms'][1] = '<option value="专业免试">'.专业免试.'</option>';
        $this->data['yyms'][2] = '<option value="学历免试">'.学历免试.'</option>';
        $this->data['yyms'][3] = '<option value="在国外留学进修一年以上">'.在国外留学进修一年以上.'</option>';
        $this->data['yyms'][4] = '<option value="国家英语六级430分以上免中级，国家英语四级430分以上免初级">'.国家英语六级430分以上免中级，国家英语四级430分以上免初级.'</option>';
        // 计算机免试原因
        $this->data['jsjms'][0] = '<option value="年龄免试">'.年龄免试.'</option>';
        $this->data['jsjms'][1] = '<option value="专业免试">'.专业免试.'</option>';
        //专著承担部分
        $this->data['cdbf'][0] = '<option value="主编">主编</option>';
        $this->data['cdbf'][1] = '<option value="独著">独著</option>';
        $this->data['cdbf'][2] = '<option value="参编">参编</option>';
		$this->data['cdbf'][3] = '<option value="其他">其他</option>';
        //项目排名
        $this->data['xmpm'][] = '<option value="独立">独立</option>';
        $xmPm = array(1=>'一', '二', '三', '四', '五', '六', '七', '八', '九', '十');
        foreach ($xmPm as $ky => $val) {
            $this->data['xmpm'][$ky] = '<option value="第' . $val . '">第' . $val . '</option>';
        }
        $this->data['xmpm'][] = '<option value="其他">其他</option>';
        //专利类型
        $this->data['zllx'][0] = '<option value="发明专利">发明</option>';
        $this->data['zllx'][1] = '<option value="实用新型专利">实用新型</option>';
        $this->data['zllx'][2] = '<option value="外观设计专利">外观设计</option>';
        $this->data['zllx'][3] = '<option value="PCT">PCT</option>';
        $this->data['zllx'][4] = '<option value="软件著作权">软件著作权</option>';
        // 教学分类
        $this->data['fl'][0] = '<option value="教学">教学</option>';
        $this->data['fl'][1] = '<option value="毕业设计">毕业设计</option>';
        //读取民族的信息
        $file = file("./Public/Json/mz.data") or exit("Unable to open file!");
        fclose($file);
        $i = 0;
        foreach ($file as $temp) {
            if ($temp !== '') {
                $temp = trim($temp);
                $this->data["mz"]["$i"] = '<option value="' . $temp . '">' . $temp . '</option>';
                $i++;
            }
        }
        //任职或者是学习
        $this->data['rzxx'][0] = '<option value="学习">学习</option>';
        $this->data['rzxx'][1] = '<option value="任职">任职</option>';

        //读取党派的信息
        $file = file("./Public/Json/dp.data") or exit("Unable to open file!");
        fclose($file);
        $i = 0;
        foreach ($file as $temp) {
            if ($temp !== '') {
                $temp = trim($temp);
                $this->data["dp"]["$i"] = '<option value="' . $temp . '">' . $temp . '</option>';
                $i++;
            }
        }
        //读取教材类别的信息
        $file = file("./Public/Json/jclb.data") or exit("Unable to open file!");
        fclose($file);
        $i = 0;
        foreach ($file as $temp) {
            if ($temp !== '') {
                $temp = trim($temp);
                $this->data["jclb"]["$i"] = '<option value="' . $temp . '">' . $temp . '</option>';
                $i++;
            }
        }
        //健康状况
        $this->data['jkzk'][0] = '<option value="一般">一般</option>';
        $this->data['jkzk'][1] = '<option value="良好">良好</option>';
        $this->data['jkzk'][2] = '<option value="不合格">不合格</option>';
        //校龄
        for ($i = 1; $i <= 40; $i++) {
            if ($i < 10) {
                $this->data['xl'][$i] = '<option value="0' . $i . '">0' . $i . '</option>';
                continue;
            }
            $this->data['xl'][$i] = '<option value="' . $i . '">' . $i . '</option>';
        }
        //科研获奖类别
        $this->data['jlb'][0] = '<option value="教学">教学</option>';
        $this->data['jlb'][1] = '<option value="科技">科技</option>';
        //学历
        $this->data['xueli'][0] = '<option value="专科">专科</option>';
        $this->data['xueli'][1] = '<option value="本科">本科</option>';
        $this->data['xueli'][2] = '<option value="硕士研究生">硕士研究生</option>';
        $this->data['xueli'][3] = '<option value="博士研究生">博士研究生</option>';
        $this->data['xueli'][4] = '<option value="其他">其他</option>';

        //专著类别
        //$this->data['zzlb'][0]=
        $file = file("./Public/Json/zzlb.data") or exit("Unable to open file!");
        fclose($file);
        $i = 0;
        foreach ($file as $temp) {
            if ($temp !== '') {
                $temp = trim($temp);
                $this->data["zzlb"]["$i"] = "<option value='" . $temp . "'>" . $temp . "</option>";
                $i++;
            }
        }
        //$this->data["zzlb"]["0"] = $i;
        //是否增刊
        $this->data['zk'][0] = '<option value="是">是</option>';
        $this->data['zk'][1] = '<option value="否">否</option>';
        //排名
        $pmArr = array('一', '二', '三', '四', '五', '六', '七', '八', '九', '十');
        foreach ($pmArr as $ky => $vl) {
            $this->data['pm'][$ky] = '<option value="第' . $vl . '作者">第' . $vl . '作者</option>';
        }
        $this->data['pm'][] = '<option value="其他">' . '其他' . '</option>';
        //
        $this->data['xw'][0] = '<option value="学士">学士</option>';
        $this->data['xw'][1] = '<option value="硕士">硕士</option>';
        $this->data['xw'][2] = '<option value="博士">博士</option>';
        $this->data['xw'][3] = '<option value="无学位">无学位</option>';
        //读取一级学科的信息
        $file = file("./Public/Json/yjxk.data") or exit("Unable to open file!");
        fclose($file);
        $i = 0;
        foreach ($file as $temp) {
            if ($temp !== '') {
                $temp = trim($temp);
                $this->data["yjxk"]["$i"] = '<option value="' . $temp . '">' . $temp . '</option>';
                $i++;
            }
        }
        //读取校内学科组的信息
        $file = file("./Public/Json/xkz.data") or exit("Unable to open file!");
        fclose($file);
        $i = 0;
        foreach ($file as $temp) {
            if ($temp !== '') {
                $temp = trim($temp);
                $this->data["xnxkz"]["$i"] = '<option value="' . $temp . '">' . $temp . '</option>';
                $i++;
            }
        }
        //读取校外学科组的信息
        $file = file("./Public/Json/xwxkz.data") or exit("Unable to open file!");
        fclose($file);
        $i = 0;
        foreach ($file as $temp) {
            if ($temp !== '') {
                $temp = trim($temp);
                $this->data["xwxkz"][$i] = '<option value="' . $temp . '">' . $temp . '</option>';
                $i++;
            }
        }
        //读取学位类型的信息
        $file = file("./Public/Json/xwlx.data") or exit("Unable to open file!");
        fclose($file);
        $i = 0;
        foreach ($file as $temp) {
            if ($temp !== '') {
                $temp = trim($temp);
                $this->data["xwlx"]["$i"] = '<option value="' . $temp . '">' . $temp . '</option>';
                $i++;
            }
        }

        //读取现任技术职位的信息
        $file = file("./Public/Json/xrjszw.data") or exit("Unable to open file!");
        fclose($file);
        $i = 0;
        foreach ($file as $temp) {
            if ($temp !== '') {
                $temp = trim($temp);
                $this->data["xrjszw"]["$i"] = '<option value="' . $temp . '">' . $temp . '</option>';
                $i++;
            }
        }
        //$this->data["xrjszw"]["0"] = '其他';

        //读取类别的信息
        $file = file("./Public/Json/lb.data") or exit("Unable to open file!");
        fclose($file);
        $i = 0;
        foreach ($file as $temp) {
            if ($temp !== '') {
                $temp = trim($temp);
                $this->data["lb"]["$i"] = '<option value="' . $temp . '">' . $temp . '</option>';
                $i++;
            }
        }
        // 读取项目来源
        $file = file("./Public/Json/xmly.data") or exit("Unable to open file!");
        fclose($file);
        $i = 0;
        foreach ($file as $temp) {
            if ($temp !== '') {
                $temp = trim($temp);
                $this->data["xmly"]["$i"] = '<option value="' . $temp . '">' . $temp . '</option>';
                $i++;
            }
        }
        //考试级别
        $this->data['ksjb'][0] = '<option value="A">'.A.'</option>';
        $this->data['ksjb'][1] = '<option value="B">'.B.'</option>';
        $this->data['ksjb'][2] = '<option value="C">'.C.'</option>';
        $this->data['ksjb'][3] = '<option value="D">'.D.'</option>';
        // 获奖级别
         $this->data['hjjb'][0] = '<option value="国家级">'.国家级.'</option>';
         $this->data['hjjb'][1] = '<option value="省部级">'.省部级.'</option>';
         $this->data['hjjb'][2] = '<option value="市厅级">'.市厅级.'</option>';
         $this->data['hjjb'][3] = '<option value="校级">'.校级.'</option>';
         $this->data['hjjb'][4] = '<option value="其他">'.其他.'</option>';
        //备注
        $this->data['bz'][0] = '<option value="本科">本科</option>';
        $this->data['bz'][1] = '<option value="研究生">研究生</option>';
        $this->data['bz'][2] = '<option value="专科">专科</option>';
        //获奖或者惩处
        $this->data['status'][0] = '<option value="获奖">获奖</option>';
        $this->data['status'][1] = '<option value="惩处">惩处</option>';
        $this->data['status'][2] = '<option value="荣誉">荣誉</option>';
        $this->data['status'][3] = '<option value="无">无</option>';
        //读取刊物级别的信息
        $file = file("./Public/Json/jb.data") or exit("Unable to open file!");
        fclose($file);
        $i = 0;
        foreach ($file as $temp) {
            if ($temp !== '') {
                $temp = trim($temp);
                $this->data["jb"]["$i"] = '<option value="' . $temp . '">' . $temp . '</option>';
                $i++;
            }
        }
    }
	
	/**
	 * 进入权限判断
	 */ 
	public function check_user_request($option){
		$data['id'] = $_SESSION['user_id'];
		$user = M('User');
		$user_info = $user->where($data)->select();
		if($option == 'all'){
		
		}else if( $option == 'admin' ){
			if($user_info['0']['qx'] != 'admin'){
				$this->error('非法操作','__APP__/System/index');
			}
		}else if( $option == '管理员' ){
			if(!strpos($user_info['0']['qx'], '管理员')){
				$this->error('非法操作','__APP__/System/index');
			}
		}else if( $option == '普通用户' ){
			if($user_info['0']['qx'] != '普通用户'){
				$this->error('非法操作','__APP__/System/index');
			}
		}else if( $option == 'add' ){
			if($user_info['0']['qx'] == '三审管理员' || $user_info['0']['qx'] == 'admin'){

			}else{
                $this->error('非法操作','__APP__/System/index');
            }
		}else{
			$this->error('非法操作','__APP__/Index/index');
		}
	}
}