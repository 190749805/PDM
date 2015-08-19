<?php
/**
 * 关于用的信息填写的所有功能.
 *
 * @author xyc <yunchuanx@jumei.com>
 */

/**
 * Class InfoAction
 */
class InfoAction extends CommonAction
{
    public function __construct()
    {
        parent::__construct();
        /* $id=$_SESSION['user_id'];
		$m=M('User');
		$arr=$m->where('id='.$id)->getField('status');
		if($arr==1){
				$this->error('对不起，访问时间已经过期');
		} */
    }

    /**
     * 显示填写时的提示信息
     */
    public function index()
    {
        $this->tishi();
    }

    public function tishi()
    {
        $this->display('tishi');
    }

    public function checkpasschange()
    {
        $data['id'] = $_SESSION['user_id'];
        $user = M('User');
        $info = $user->where($data)->select();
        $this->assign('info', $info);
        if ($info['0']['password'] == '123456') {
            $this->error('请修改初始密码', '__APP__/System/changepass');
        }
    }

    //控制用户是否处于审核状态
    public function control_audit_user()
    {
        $id = $_SESSION['user_id'];
        $m = M('User');
        $arr = $m->where('id=' . $id)->getField('status');
        return $arr;
    }

    //验证时间的正确性
    public function check_time($year, $month, $str)
    {
        if ($year < date('Y')) {

        } else if ($year == date('Y') && $month <= date('m')) {

        } else {
            switch ($str) {
                case 'hscjdp':
                    $tishi = '何时参见党派';
                    break;
                case 'xzw':
                    $tishi = '现职务';
                    break;
                case 'cjgz':
                    $tishi = '参见工作';
                    break;
                case 'csny':
                    $tishi = '出身年月';
                    break;
                case 'ks':
                    $tishi = '开始';
                    break;
                case 'js':
                    $tishi = '结束';
                    break;
                case 'sw':
                    $tishi = '授位';
                    break;
                case 'yyks':
                    $tishi = '英语考试';
                    break;
                case 'jsjks':
                    $tishi = '计算机考试';
                    break;
                case 'cbs':
                    $tishi = '出版社';
                    break;
                case 'fblw':
                    $tishi = '发表论文';
                    break;
                case 'zltg':
                    $tishi = '专利通过';
                    break;
                case 'hj':
                    $tishi = '获奖';
                    break;
            }
            $this->error($tishi . '时间不合法');
            exit;
        }
    }

    //验证用户操作的id是否是自己的
    public function check_userId($data, $table)
    {
        $m = M($table);
        $arr = $m->where($data)->find();
        if ($arr > 0) {

        } else {
            $this->error('对不起，你的操作非法');
            exit;
        }
    }

    //查询所有的控制审核的表的情况
    public function audit_all_table($userId)
    {
        if ($userId > 0) {
            $id = $userId;
        } else {
            $id = $_SESSION['user_id'];
        }
        $user = M('cp_user');
        $arr = $user->where('uid=' . $id)->select();
        $a = 0;
        $b = 0;
        $c = 0;
        if ($arr > 0) {
            for ($i = 0; $i < count($arr); $i++) {
                $userArr = array_slice($arr[$i], 2);
                foreach ($userArr as $ky => $val) {
                    if ($val == 0 || $val == 2) {
                        return 2;
                    }
                }
            }
        } else {
            $a = 1;
        }
        $ary = array('jf', 'fblw', 'fmzl', 'jgxm', 'jx', 'jxgz', 'ks', 'kyhj', 'kyxm', 'xl', 'xw', 'zzl','jc');
        for ($i = 0; $i < count($ary); $i++) {
            $m = M('cp_' . $ary[$i]);
            $allAry = $m->where('uid=' . $id)->select();
            if ($allAry) {
                for ($j = 0; $j < count($allAry); $j++) {
                    $num = $allAry[$j][$ary[$i] . 'qk'];
                    if ($num == 0 || $num == 2) {
                        return 2;
                    }
                }
                $c++;
            } else {
                $b++;
            }
        }
        if ($a == 1 && $b == count($ary)) {
            return null;
        } else if ($a == 0 && ($c + $b) == count($ary)) {
            return 1;
        }
    }

    /**
     * 这是一个处理含有其他这个选项的一个数组.
     *
     * @param array  $data 含有其他这个选项的一个数组.
     * @param string $str  已经存在数据库里面的一个选项.
     *
     * @return array
     */
    public function qiTa($data, $str)
    {
        // dump($data);
        $ary = explode(':', $str);
        for ($i = 0; $i < count($data); $i++) {
            $dataArr = explode('>', $data[$i]);
            $stry = substr($dataArr[1], 0, -8);
            // dump($stry);
            // exit;
            if ($stry == $ary[0]) {
                $arr[$i] = '<option selected="true" value="'.$ary[0].'">'.$ary[0].'</option>';
            } else {
                $arr[$i] = $data[$i];
            }
        }
        $arry[] = $arr;
        if ($ary[1] != null) {
            $arry[] = $ary[1];
        } else {
            $arry[] = $str;
        }
        return $arry;
    }

    /**
     * 查询不同的表检查是否已经被审核.
     *
     * @param string  $table 表名.
     * @param integer $cid   内容的id.
     *
     * @return integer
     */
    public function selectAudit($table, $cid)
    {
        $data['uid'] = $_SESSION['user_id'];
        $m = M('cp_' . $table);
        if ($cid) {
            $data['cid'] = $cid;
            $arr = $m->where($data)->count();
            return $arr;
        }
        $arr = $m->where($data)->count();
        return $arr;
    }

    // 显示第1页面
    public function info1()
    {
        $this->checkpasschange();
        $this->readconfig();
        $arr1 = $this->data['sex'];
        // $arr2=$this->data['bm'];
        $arr3 = $this->data['year'];
        $arr4 = $this->data['month'];
        $arr5 = $this->data['mz'];
        $arr6 = $this->data['xrjszw'];
        $user = M('User');
        $id = $_SESSION['user_id'];
        $arr = $user->where("id=" . $id)->select();
        if ($arr > 0) {
            $this->assign('list', $arr);
            for ($i = 0; $i < count($arr1); $i++) {
                if (strpos($arr1[$i], $arr[0]['sex'])) {
                    $arr1[$i] = '<option selected="true" value="' . $arr[0]['sex'] . '">' . $arr[0]['sex'] . '</option>';
                }
            }
            /* for($i=0;$i<count($arr2);$i++){
					if(strpos($arr2[$i],$arr[0]['bm'])){
						$arr2[$i]='<option selected="true" value="'.$arr[0]['bm'].'">'.$arr[0]['bm'].'</option>';
					}
			} */
            for ($i = 0; $i < count($arr3); $i++) {
                if (strpos($arr3[$i], substr($arr[0]['csny'], 0, 4))) {
                    $arr3[$i] = '<option selected="true" value="' . substr($arr[0]['csny'], 0, 4) . '">' . substr($arr[0]['csny'], 0, 4) . '</option>';
                }
            }
            // dump($arr4);
            for ($i = 1; $i <= count($arr4); $i++) {
                if (strpos($arr4[$i], substr($arr[0]['csny'], 5, 2))) {
                    $arr4[$i] = '<option selected="true" value="' . substr($arr[0]['csny'], 5, 2) . '">' . substr($arr[0]['csny'], 5, 2) . '</option>';
                }
            }
            for ($i = 0; $i < count($arr5); $i++) {
                if (strpos($arr5[$i], $arr[0]['mz'])) {
                    $arr5[$i] = '<option selected="true" value="' . $arr[0]['mz'] . '">' . $arr[0]['mz'] . '</option>';
                }
            }
            //拟聘职务
            //dump($arr6);
            $zwArr = array();
            for ($i = 0; $i < count($arr6); $i++) {
                //dump($arr6[$i]);
                $ary = array();
                $ary = explode('>', $arr6[$i]);
                $str = substr($ary[1], 0, -8);
                if ($arr[0]['npzw'] == $str) {
                    $zwArr[$i] = '<option value="' . $str . '" selected="ture">' . $str . '</option>';
                    continue;
                }
                $zwArr[$i] = $arr6[$i];
            }
            if ($zwArr) {
                $arr6 = $zwArr;
            }
        }
        $audit = M('cp_user');
        $userArr = $audit->where('uid=' . $id)->find();
        $this->assign('contl', $userArr);
        //dump(substr($arr[0]['csny'],5,2));
        $this->assign('sex', $arr1);
        //$this->assign('bms',$arr2);
        $this->assign('year', $arr3);
        $this->assign('month', $arr4);
        $this->assign('mz', $arr5);
        $this->assign('npzw', $arr6);
        $this->display();
    }

    //对第1页面的数据保存
    public function insert_info1($info, $data, $hidden)
    {
        $user = M('User');
        if ($hidden == null) {
            $data['zplj'] = $info[0]['savepath'] . $info[0]['savename'];
            $arr = $user->save($data);
            if ($arr > 0) {
                $this->success('保存成功', '__URL__/info1');
            } else {
                $this->error('保存失败');
            }
        } else {
            $arr = $user->save($data);
            if ($arr > 0) {
                $this->success('修改成功', '__URL__/info1');
            } else {
                $this->error('修改失败');
            }
        }
    }

    //上传照片
    public function commit_info1()
    {
        if ($_POST['name'] != null && $_POST['sfzh'] != null) {
            import('ORG.Net.UploadFile');
            $upload = new UploadFile(); // 实例化上传类
            $upload->maxSize = 5242880; // 设置附件上传大小
            $upload->allowExts = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
            $upload->savePath = './Uploads/Image/';
            //$upload->thumbRemoveOrigin = true;
            if (!$upload->upload()) { // 上传错误提示错误信息
               //if ($_POST['hidden'] == null) {
                    // $this->error($upload->getErrorMsg());
               // } else {
               // dump($data);
                //exit;
                    $st = $this->control_audit_user();
                    $wt = $this->selectAudit('user');
                    if ($st == 0) {
                        $hidden = $data['zplj'] = $_POST['hidden'];
                        $data['id'] = $_SESSION['user_id'];
                        $data['name'] = $_POST['name'];
                        $data['sex'] = $_POST['sex'];
                        $data['npzw'] = $_POST['npzw'];
                        //$data['bm']=$_POST['bm'];
                        $this->check_time($_POST['csny'], $_POST['csnm'], 'csym');
                        $data['csny'] = $_POST['csny'] . '.' . $_POST['csnm'];
                        $data['mz'] = $_POST['mz'];
                        $data['sfzh'] = $_POST['sfzh'];
                        $data['jg'] = $_POST['prov'] . '.' . $_POST['city'];
                        $this->insert_info1($info, $data, $hidden);
                    } else if ($wt == 0 || $st == 1) {
                        $this->error('对不起，此时你不能修改');
                    } else {
                        $user = M('cp_user');
                        $arr = $user->where('uid=' . $_SESSION['user_id'])->find();
                        $data['id'] = $_SESSION['user_id'];
                        foreach ($arr as $ky => $val) {
                            switch ($ky) {
                                case 'name':
                                    if ($val == 2) {
                                        $data['name'] = $_POST['name'];
                                    }
                                    break;
                                case 'sex':
                                    if ($val == 2) {
                                        $data['sex'] = $_POST['sex'];
                                    }
                                    break;
                                case 'npzw':
                                    if ($val == 2) {
                                        $data['npzw'] = $_POST['npzw'];
                                    }
                                    break;
                                /* case 'bm':
									if($val!=1){
										$data['bm']=$_POST['bm'];
									}
									break; */
                                case 'csny':
                                    if ($val == 2) {
                                        $this->check_time($_POST['csny'], $_POST['csnm'], 'csny');
                                        $data['csny'] = $_POST['csny'] . $_POST['csnm'];
                                    }
                                    break;
                                case 'mz':
                                    if ($val == 2) {
                                        $data['mz'] = $_POST['mz'];
                                    }
                                    break;
                                case 'sfzh':
                                    if ($val == 2) {
                                        $data['sfzh'] = $_POST['sfzh'];
                                    }
                                    break;
                                case 'jg':
                                    if ($val == 2) {
                                        $data['jg'] = $_POST['prov'] . '.' . $_POST['city'];
                                    }
                                    break;
                                case 'zplj':
                                    if ($val == 2) {
                                        $hidden = $data['zplj'] = $_POST['hidden'];
                                    } else {
                                        $hidden = true;
                                    }
                                    break;
                            }
                        }
                        $this->insert_info1($info, $data, $hidden);
                  //  }
                }
            } else { // 上传成功 获取上传文件信息
                $st = $this->control_audit_user();
                $wt = $this->selectAudit('user');
                if ($st == 0) {
                    $info = $upload->getUploadFileInfo();
                    $hidden = "";
                    $data['id'] = $_SESSION['user_id'];
                    $data['name'] = $_POST['name'];
                    $data['sex'] = $_POST['sex'];
                    $data['npzw'] = $_POST['npzw'];
                    // $data['bm']=$_POST['bm'];
                    $this->check_time($_POST['csny'], $_POST['csnm'], 'csny');
                    $data['csny'] = $_POST['csny'] . '.' . $_POST['csnm'];
                    $data['mz'] = $_POST['mz'];
                    $data['sfzh'] = $_POST['sfzh'];
                    $data['jg'] = $_POST['prov'] . '.' . $_POST['city'];
                    $this->insert_info1($info, $data, $hidden);
                } else if ($wt == 0 || $st == 1) {
                    $this->error('对不起，此时你不能修改');
                } else {
                    $user = M('cp_user');
                    $arr = $user->where('uid=' . $_SESSION['user_id'])->find();
                    $data['id'] = $_SESSION['user_id'];
                    foreach ($arr as $ky => $val) {
                        switch ($ky) {
                            case 'name':
                                if ($val == 2) {
                                    $data['name'] = $_POST['name'];
                                }
                                break;
                            case 'sex':
                                if ($val == 2) {
                                    $data['sex'] = $_POST['sex'];
                                }
                                break;
                            case 'npzw':
                                if ($val == 2) {
                                    $data['npzw'] = $_POST['npzw'];
                                }
                                break;
                            /* case 'bm':
								if($val!=1){
									$data['bm']=$_POST['bm'];
								}
								break; */
                            case 'csny':
                                if ($val == 2) {
                                    $this->check_time($_POST['csny'], $_POST['csnm'], 'csny');
                                    $data['csny'] = $_POST['csny'] . $_POST['csnm'];
                                }
                                break;
                            case 'mz':
                                if ($val == 2) {
                                    $data['mz'] = $_POST['mz'];
                                }
                                break;
                            case 'sfzh':
                                if ($val == 2) {
                                    $data['sfzh'] = $_POST['sfzh'];
                                }
                                break;
                            case 'jg':
                                if ($val == 2) {
                                    $data['jg'] = $_POST['prov'] . '.' . $_POST['city'];
                                }
                                break;
                            case 'zplj':
                                if ($val == 2) {
                                    $info = $upload->getUploadFileInfo();
                                    $hidden = "";
                                } else {
                                    $hidden = true;
                                }
                                break;
                        }
                    }
                    //dump('fdas');
                    $this->insert_info1($info, $data, $hidden);
                }

            }
        } else {
            $this->error('非法操作');
        }
    }

    // 删除info1的数据
    public function delete_info1()
    {
        $st = $this->control_audit_user();
        if ($st == 0) {
            $user = M('User');
            $id = $_GET['id'];
            $data['name'] = "";
            $data['sex'] = "";
            // $data['bm']="";
            $data['csny'] = "";
            $data['mz'] = "";
            $data['sfzh'] = "";
            $data['jg'] = "";
            $data['zplj'] = "";
            $data['npzw'] = "";
            $arr = $user->where("id=" . $id)->save($data);
            if ($arr > 0) {
                $this->success('删除成功', '__URL__/info1');
            } else {
                $this->error('删除失败');
            }
        } else {
            $this->error('亲，你已经开始被审核，不能执行此操作');
        }
    }
    //
    // 显示info2
    public function info2()
    {
        $this->readconfig();
        $msg = M('User');
        $id = $_SESSION['user_id'];
        $result = $msg->where('id=' . $id)->getField('name');
        if ($result) {
            $npzw = $msg->where('id=' . $id)->getField('npzw');
            $this->assign('npzw', $npzw);
            $dp = $this->data['dp'];
            $jkzk = $this->data['jkzk'];
            $year2 = $year1 = $year = $this->data['year'];
            $month2 = $month1 = $month = $this->data['month'];
            $xrjszw = $this->data['xrjszw'];
            $xl = $this->data['xl'];
            $xnxkz = $this->data['xnxkz'];
            $xwxkz = $this->data['xwxkz'];
            // dump($xwxkz);
            $yjxk = $this->data['yjxk'];
            $sp = $this->data['sp'];
            $iid = $_SESSION['user_id'];
            $info = M('Info');
            $arr = $info->where('iid=' . $iid)->select();
            $this->assign('xrjszw', $xrjszw);
            // dump($xrjszw);
            if ($arr > 0) {
                $arr[0]['hg'] = substr($arr[0]['hshgdj'], 7, strlen($arr[0]['hshgdj']));
                // 评委和审批
                $pwhsp = $this->qiTa($sp, $arr[0]['pwhsp']);
                $arr[0]['pwhsp'] = $pwhsp[1];
                $this->assign('list', $arr);
                //参加党派
                for ($i = 0; $i < count($dp); $i++) {
                    if (strpos($dp[$i], $arr[0]['cjdp'])) {
                        $dp[$i] = '<option selected="true" value="' . $arr[0]['cjdp'] . '">' . $arr[0]['cjdp'] . '</option>';
                    }
                }
                //健康状况
                for ($i = 0; $i < count($jkzk); $i++) {
                    if (strpos($jkzk[$i], $arr[0]['jkzk'])) {
                        $jkzk[$i] = '<option selected="true" value="' . $arr[0]['jkzk'] . '">' . $arr[0]['jkzk'] . '</option>';
                    }
                }
                //参加党派时间
                for ($i = 0; $i < count($year); $i++) {
                    if (strpos($year[$i], substr($arr[0]['hscjdp'], 0, 4))) {
                        $year[$i] = '<option selected="true" value="' . substr($arr[0]['hscjdp'], 0, 4) . '">' . substr($arr[0]['hscjdp'], 0, 4) . '</option>';
                    }
                }
                for ($i = 1; $i <= count($month); $i++) {
                    if (strpos($month[$i], substr($arr[0]['hscjdp'], 5, 2))) {
                        $month[$i] = '<option selected="true" value="' . substr($arr[0]['hscjdp'], 5, 2) . '">' . substr($arr[0]['hscjdp'], 5, 2) . '</option>';
                    }
                }
                //现任专业技术职务
                $ary = explode('、', $arr[0]['xrjszw']);
                $ary = array_unique($ary);
                $ary = array_filter($ary);
                //dump($month);
                for ($j = 0; $j < count($ary); $j++) {
                    $xrzw = "";
                    $jszw = "";
                    $jszwArr = explode('-', $ary[$j]);
                    //dump($jszwArr);
                    for ($i = 0; $i < count($xrjszw); $i++) {
                        $xrzw[$i] = $xrjszw[$i];
                        $aryy = explode('>', $xrjszw[$i]);
                        $str = substr($aryy[1], 0, -8);
                        /* dump($aryy[1]);
						dump($str);
						exit; */
                        if ($str == $jszwArr[0]) {
                            $xrzw[$i] = '<option selected="true" value="' . $jszwArr[0] . '">' . $jszwArr[0] . '</option>';
                        }
                        $jszw .= $xrzw[$i];
                    }
                    for ($i = 1; $i <= count($year1); $i++) {
                        if (strpos($year1[$i], substr($jszwArr[1], 0, 4))) {
                            $zwyear[$i] = '<option selected="true" value="' . substr($jszwArr[1], 0, 4) . '">' . substr($jszwArr[1], 0, 4) . '</option>';
                            continue;
                        }
                        $zwyear[$i] = $year1[$i];
                    }
                    for ($i = 1; $i <= count($month1); $i++) {
                        if (strpos($month1[$i], substr($jszwArr[1], 5, 2))) {
                            $zwmonth[$i] = '<option selected="true" value="' . substr($jszwArr[1], 5, 2) . '">' . substr($jszwArr[1], 5, 2) . '</option>';
                            continue;
                        }
                        $zwmonth[$i] = $month1[$i];
                    }

                    $xrjszwArr[$j]['xrjszw'] = $jszw;
                    $xrjszwArr[$j]['jszwsjy'] = $zwyear;
                    $xrjszwArr[$j]['jszwsjm'] = $zwmonth;

                }
                // dump($xrjszwArr);
                // exit;
                // 校龄
                for ($i = 0; $i < count($xl); $i++) {
                    if (strpos($xl[$i], $arr[0]['xl'])) {
                        $xl[$i] = '<option selected="true" value="' . $arr[0]['xl'] . '">' . $arr[0]['xl'] . '</option>';
                    }
                }
                // 参见工作时间
                for ($i = 0; $i < count($year2); $i++) {
                    if (strpos($year2[$i], substr($arr[0]['cjgzsj'], 0, 4))) {
                        $year2[$i] = '<option selected="true" value="' . substr($arr[0]['cjgzsj'], 0, 4) . '">' . substr($arr[0]['cjgzsj'], 0, 4) . '</option>';
                    }
                }
                for ($i = 0; $i < count($month2); $i++) {
                    if (strpos($month2[$i], substr($arr[0]['cjgzsj'], 5, 2))) {
                        $month2[$i] = '<option selected="true" value="' . substr($arr[0]['cjgzsj'], 5, 2) . '">' . substr($arr[0]['cjgzsj'], 5, 2) . '</option>';
                    }
                }
                // 校内学科组
                for ($i = 0; $i <= count($xnxkz); $i++) {
                    if (strpos($xnxkz[$i], $arr[0]['xnxkz'])) {
                        $xnxkz[$i] = '<option selected="true" value="' . $arr[0]['xnxkz'] . '">' . $arr[0]['xnxkz'] . '</option>';
                    }
                }
                // 校外学科组
                for ($i = 0; $i < count($xwxkz); $i++) {
                    if (strpos($xwxkz[$i], $arr[0]['xwxkz'])) {
                        $xwxkz[$i] = '<option selected="true" value="' . $arr[0]['xwxkz'] . '">' . $arr[0]['xwxkz'] . '</option>';
                    }
                }
                // dump($arr[0]['xk']);
                // 一级学科
                foreach ($yjxk as $val) {
                    $xkAry = explode('>', $val);
                    $str = substr($xkAry[1], 0, -8);
                    //dump(substr($xkAry[1],0,-2));
                    if ($str == $arr[0]['xk']) {
                        $val = '<option selected="true" value="' . $arr[0]['xk'] . '">' . $arr[0]['xk'] . '</option>';
                    }
                    $xkArr[] = $val;
                }
                // 专业专长
                if ($arr[0]['xcszy']){
                    $zy = explode('、', $arr[0]['xcszy']);
                    $zc = explode('、', $arr[0]['xcszc']);
                    for ($i = 0; $i < count($zy); $i++) {
                        $zyzc[$i]['zy'] = $zy[$i];
                        $zyzc[$i]['zc'] = $zc[$i];
                    }
                }
                // 团体职务
                if ($arr[0]['cjxstt']){
                    $tt = explode('、', $arr[0]['cjxstt']);
                    $zw = explode('、', $arr[0]['rhzw']);
                    for ($i = 0; $i < count($tt); $i++) {
                        $ttzw[$i]['tt'] = $tt[$i];
                        $ttzw[$i]['zw'] = $zw[$i];
                    }
                }
                // 党政职务
                $dzzw = explode('、', $arr[0]['drdzzw']);
                // 社会兼职
                $shjz = explode('、', $arr[0]['shjz']);

            }
            if ($xkArr != null) {
                $yjxk = $xkArr;
            }
            if ($pwhsp != null) {
                $sp = $pwhsp[0];
            }
            /* dump($pwhsp);
             exit;*/
            $model = M('cp_user');
            $rt = $model->where('uid=' . $_SESSION['user_id'])->find();
            // dump($zyzc);
            $this->assign('ttzw', $ttzw);
            $this->assign('zyzc', $zyzc);
            $this->assign('contl', $rt);
            $this->assign('dp', $dp);
            $this->assign('jkzk', $jkzk);
            $this->assign('year', $year);
            $this->assign('month', $month);
            $this->assign('xrjszwArr', $xrjszwArr);
            $this->assign('xl', $xl);
            $this->assign('year1', $year1);
            $this->assign('month1', $month1);
            $this->assign('year2', $year2);
            $this->assign('month2', $month2);
            // $this->assign('sxkz',$sxkz);
            $this->assign('pwhsp', $sp);
            $this->assign('xnxkz', $xnxkz);
            $this->assign('xwxkz', $xwxkz);
            // dump($xnxkz);
            $this->assign('yjxk', $yjxk);
            $this ->assign('dzzw', $dzzw);
            $this ->assign('shjz', $shjz);
            $this->display();
        } else {
            $this->error('请保存你所访问的页面的上一页信息后在访问');
        }
    }

    //验证数据社会兼职，党政职务
    public function sureNum ($data)
    {
        $drNum = 0;
        $zwNum = 0;
        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i] == null) {
                $drNum++;
                continue;
            }
            $zwNum++;
            if ($zwNum == 1) {
                $arr = $data[$i];
            } else if ($zwNum > 1) {
                $arr .= '、'.$data[$i];
            }
        }
        if ($drNum == count($data)) {
            $this->error('对不起，党政职务或社会兼职不能为空');
        } else {
            return $arr;
        }
    }
    //  接收info2数据保存在数据库
    public function commit_info2()
    {
        if ( $_POST['drdzzw'] != null && $_POST['shjz'] != null) {
            for ($i = 0; $i < count($_POST['xcszy']); $i++) {
                if ($_POST['xcszy'][$i] == null || strlen($_POST['xcszy'][$i]) > 60 ||
                    $_POST['xcszc'][$i] == null || strlen($_POST['xcszc'][$i]) > 60
                ) {
                    $this->error('对不起，你输入的专业专长不能为空或不能超过20个字');
                } else {
                    if (!$zy) {
                        $zy = $_POST['xcszy'][$i];
                    } else {
                        $zy .= '、'.$_POST['xcszy'][$i];
                    }
                    if (!$zc) {
                        $zc = $_POST['xcszc'][$i];
                    } else {
                        $zc .= '、'.$_POST['xcszc'][$i];
                    }
                }
            }
            for ($i = 0; $i < count($_POST['cjxstt']); $i++) {
                if ($_POST['cjxstt'][$i] == null || $_POST['rhzw'][$i] == null ||
                    strlen($_POST['cjxstt'][$i]) > 60 || strlen($_POST['rhzw'][$i]) > 60
                ) {
                    $this->error('对不起，你输入的团体职务不能为空或不能超过20个字');
                } else {
                    if (!$tt) {
                        $tt = $_POST['cjxstt'][$i];
                    } else {
                        $tt .= '、'.$_POST['cjxstt'][$i];
                    }
                    if (!$zw) {
                        $zw = $_POST['rhzw'][$i];
                    } else {
                        $zw .= '、'.$_POST['rhzw'][$i];
                    }
                }
            }
            $data['iid'] = $_SESSION['user_id'];
            if ($_SESSION['user_id'] != null) {
                $st = $this->control_audit_user();
                $wt = $this->selectAudit('user');
                $user = M('cp_user');
                $userArr = $user->where('uid=' . $data['iid'])->find();
                //  dump($st);
                if ($st == 0) {
                    // $this->check_time($_POST['hscjdpy'], $_POST['hscjdpm'], 'hscjdp');
                    // $data['hscjdp'] = $_POST['hscjdpy'] . '.' . $_POST['hscjdpm'];
                    $data['cjdp'] = $_POST['dp'];
                    if ($data['cjdp'] == '群众')
                    {
                        $data['hscjdp'] = '';
                    } else {
                        $this->check_time($_POST['hscjdpy'], $_POST['hscjdpm'], 'hscjdp');
                        $data['hscjdp'] = $_POST['hscjdpy'] . '.' . $_POST['hscjdpm'];
                    }
                    $data['jkzk'] = $_POST['jkzk'];
                    $data['xwxkz'] = $_POST['xwxkz'];
                    $msg = M('User');
                    $npzw = $msg->where('id=' . $_SESSION['user_id'])->getField('npzw');
                    if ($npzw == '讲师' || $npzw == '助理研究员') {
                        $data['xwxkz'] = '无';
                    }
                    if (count($_POST['xrjszw']) == 1) {
                        $this->check_time($_POST['xrzwsjy'][0], $_POST['xrzwsjm'][0], 'xzw');
                        $data['xrjszw'] = $_POST['xrjszw'][0] . '-' . $_POST['xrzwsjy'][0] . '.' . $_POST['xrzwsjm'][0];
                    } else {
                        //  $data['xrjszw']="";
                        for ($i = 0; $i < count($_POST['xrjszw']); $i++) {
                            $this->check_time($_POST['xrzwsjy'][$i], $_POST['xrzwsjm'][$i], 'xzw');
                            $data['xrjszw'] .= $_POST['xrjszw'][$i] . '-' . $_POST['xrzwsjy'][$i] . '.' . $_POST['xrzwsjm'][$i] . '、';
                        }
                        $data['xrjszw'] = substr($data['xrjszw'], 0, -1);
                    }
                    // dump($_POST['xrzwsjm']);
                    // exit;
                    $data['xl'] = $_POST['xl'];
                    // $data['xrzwsj']=$_POST['xrzwsjy'].'.'.$_POST['xrzwsjm'];
                    $this->check_time($_POST['cjgzsjy'], $_POST['cjgzsjm'], 'cjgz');
                    $data['cjgzsj'] = $_POST['cjgzsjy'] . '.' . $_POST['cjgzsjm'];
                    if ($_POST['pwhsp'] == '其他') {
                        if ($_POST['sp'] == null) {
                            $this->error('对不起，选择其他后，后面填写的内容不能为空');
                        } else {
                            $data['pwhsp'] = $_POST['pwhsp'].':'.$_POST['sp'];
                        }
                    } else {
                        $data['pwhsp'] = $_POST['pwhsp'];
                    }
                    $data['xcszy'] = $zy;
                    $data['xcszc'] = $zc;
                    $data['xnxkz'] = $_POST['xnxkz'];
                    $data['xk'] = $_POST['yjxk'];
                    $data['cjxstt'] = $tt;
                    $data['rhzw'] = $zw;
                    $data['drdzzw'] = $this->sureNum($_POST['drdzzw']);
                    $data['shjz'] = $this->sureNum($_POST['shjz']);
                } else if ($wt == 0 || $st == 1) {
                    $this->error('对不起，此时你不能修改');
                } else {
                    $xwxkz = '';
                    foreach ($userArr as $ky => $val) {
                        switch ($ky) {
                            case 'hscjdp':
                                if ($val == 2) {
                                    $this->check_time($_POST['hscjdpy'], $_POST['hscjdpm'], 'hscjdp');
                                    $data['cjdp'] = $_POST['dp'];
                                    $data['hscjdp'] = $_POST['hscjdpy'] . '.' . $_POST['hscjdpm'];
                                }
                                break;
                            case 'jkzk':
                                if ($val == 2) {
                                    $data['jkzk'] = $_POST['jkzk'];
                                }
                                break;
                            case 'zwhsj':
                                if ($val == 2) {
                                    if (count($_POST['xrjszw']) == 1) {
                                        $this->check_time($_POST['xrzwsjy'][0], $_POST['xrzwsjm']['0'], 'xzw');
                                        $data['xrjszw'] = $_POST['xrjszw'][0] . '-' . $_POST['xrzwsjy'][0] . '.' . $_POST['xrzwsjm'][0];
                                    } else {
                                        for ($i = 0; $i < count($_POST['xrjszw']); $i++) {
                                            if ($_POST['xrjszw'][$i] == '讲师' || $_POST['xrjszw'][$i] == '助理研究员') {
                                                $xwxkz = '无';
                                            }
                                            $this->check_time($_POST['xrzwsjy'][$i], $_POST['xrzwsjm'][$i], 'xzw');
                                            $data['xrjszw'] .= $_POST['xrjszw'][$i] . '-' . $_POST['xrzwsjy'][$i] . '.' . $_POST['xrzwsjm'][$i] . '、';
                                        }
                                        $data['xrjszw'] = substr($data['xrjszw'], 0, -1);
                                    }
                                }
                                break;
                            case 'xl':
                                if ($val == 2) {
                                    $data['xl'] = $_POST['xl'];
                                }
                                break;
                            case 'cjgzsj':
                                if ($val == 2) {
                                    $this->check_time($_POST['cjgzsjy'], $_POST['cjgzsjm'], 'cjgz');
                                    $data['cjgzsj'] = $_POST['cjgzsjy'] . '.' . $_POST['cjgzsjm'];
                                }
                                break;
                            case 'pwhsp':
                                if ($val == 2) {
                                    $data['pwhsp'] = $_POST['pwhsp'];
                                }
                                break;
                            case 'zyzc':
                                if ($val == 2) {
                                    $data['xcszy'] = $zy;
                                    $data['xcszc'] = $zc;
                                }
                                break;
                            case 'xkz':
                                if ($val == 2) {
                                    $data['xnxkz'] = $_POST['xnxkz'];
                                    $data['xwxkz'] = $_POST['xwxkz'];
                                    $msg = M('User');
                                    $npzw = $msg->where('id=' . $_SESSION['user_id'])->getField('npzw');
                                    if ($npzw == '讲师' || $npzw == '助理研究员') {
                                        $data['xwxkz'] = '无';
                                    }
                                }
                                break;
                            case 'xk':
                                if ($val == 2) {
                                    $data['xk'] = $_POST['yjxk'];
                                }
                                break;
                            case 'xsttzw':
                                if ($val == 2) {
                                    $data['cjxstt'] = $tt;
                                    $data['rhzw'] = $zw;
                                }
                                break;
                           // case ''
                            case 'dzzw':
                                if ($val == 2) {
                                    $data['drdzzw'] = $this->sureNum($_POST['drdzzw']);
                                }
                                break;
                            case 'shjz':
                                if ($val == 2) {
                                    $data['shjz'] = $this->sureNum($_POST['shjz']);
                                }
                                break;
                        }
                    }
                    if ($xwxkz ) {
                        $data['xwxkz'] = $xwxkz;
                    }
                }
                $info = M('Info');
                $arr = $info->where("iid=" . $data['iid'])->select();
                if (!empty($arr[0]['cjdp']) && $arr[0]['iid'] != null) {
                    $arr1 = $info->where("id=" . $arr[0]['id'])->save($data);
                    if ($arr1 > 0) {
                        $this->success('修改成功', '__URL__/info2');
                    } else {
                        $this->error('修改失败');
                    }
                } else if (empty($arr[0]['cjdp']) && $arr[0]['iid'] != null) {
                    $arr2 = $info->where("id=" . $arr[0]['id'])->save($data);
                    if ($arr2 > 0) {
                        $this->success('保存成功', '__URL__/info2');
                    } else {
                        $this->error('保存失败');
                    }
                } else if ($arr[0]['iid'] == null) {
                    $arr3 = $info->add($data);
                    if ($arr3 > 0) {
                        $this->success('保存成功', '__URL__/info2');
                    } else {
                        $this->error('保存失败');
                        // dump($data);
                    }
                }
            } else {
                $this->error('请先登录', "__APP__/Login/login");
            }
        } else {
            $this->error('非法操作');
        }
    }

    // 通过info2接收的id来删除相应的信息
    public function delete_info2()
    {
        $st = $this->control_audit_user();
        if ($st == 0) {
            $info = M('Info');
            $id = $_GET['id'];
            $data['cjdp'] = "";
            $data['jkzk'] = "";
            $data['hscjdp'] = "";
            $data['xrjszw'] = "";
            $data['xl'] = '';
            $data['xrzwsj'] = "";
            $data['cjgzsj'] = "";
            $data['pwhsp'] = '';
            $data['xcszy'] = "";
            $data['xcszc'] = '';
            $data['xnxkz'] = '';
            $data['xwxkz'] = '';
            $data['xk'] = '';
            $data['cjxstt'] = '';
            $data['rhzw'] = '';
            $data['drdzzw'] = '';
            $data['shjz'] = '';
            //$data['iid']="";
            $data['id'] = $id;
            $arr = $info->where("id=" . $id)->save($data);
            if ($arr > 0) {
                $this->success('删除成功', '__URL__/info2');
            } else {
                $this->error('删除失败');
            }
        } else {
            $this->error('此信息正在审核，不能删除');
        }
    }

    //显示填写信息的第三页面
    public function info3()
    {
        $this->readconfig();
        $msg = M('Info');
        $id = $_SESSION['user_id'];
        $result = $msg->where('iid=' . $id)->getField('xrjszw');
        if ($result) {
            $year = $this->data['year'];
            $month1 = $month = $this->data['month'];
            $rzxx = $this->data['rzxx'];
            $xynx = $this->data['xl'];
            $xynx[] = '<option value="其他">其他</option>';
            $xueli = $this->data['xueli'];
            $xlid = $_SESSION['user_id'];
            $year1[121] = '<option value="至今">至今</option>';
            for ($i = count($year);$i > 0;$i--) {
                $year1[$i] = $year[$i];
            }
            $xl = M('Xl');
            $arr = $xl->where("xlid=" . $xlid)->select();
            if ($arr > 0) {
                $this->assign('list', $arr);
            }
            // dump($arr);
            if ($_GET['id'] == null) {
                $this->assign('year', $year);
                $this->assign('month', $month);
                $this->assign('year1', $year1);
                $this->assign('month1', $month1);
                $this->assign('rzxx', $rzxx);
                $this->assign('xynx', $xynx);
                $this->assign('xueli', $xueli);
            } else {
                $checkId['id'] = $data['cid'] = $id = $_GET['id'];
                $checkId['xlid'] = $data['uid'] = $_SESSION['user_id'];
                $this->check_userId($checkId, 'xl');
                $m = M('cp_xl');
                $xlqk = $m->where($data)->getField('xlqk');
                $st = $this->control_audit_user();
                if ($xlqk == 2 || $st == 0) {
                    $xl = M('Xl');
                    $ary = $xl->where("id=" . $id)->select();
                    if ($ary > 0) {
                        $this->assign('list1', $ary);
                        // 经历开始时间
                        for ($i = 0; $i < count($year); $i++) {
                            if (strpos($year[$i], substr($ary[0]['kssj'], 0, 4))) {
                                $year[$i] = '<option selected="true" value="' . substr($ary[0]['kssj'], 0, 4) . '">' . substr($ary[0]['kssj'], 0, 4) . '</option>';
                            }
                        }
                        for ($i = 0; $i < count($month); $i++) {
                            if (strpos($month[$i], substr($ary[0]['kssj'], 5, 2))) {
                                $month[$i] = '<option selected="true" value="' . substr($ary[0]['kssj'], 5, 2) . '">' . substr($ary[0]['kssj'], 5, 2) . '</option>';
                            }
                        }
                        //  经历结束时间
                        for ($i = 0; $i < count($year1); $i++) {
                            if (strpos($year1[$i], substr($ary[0]['jssj'], 0, 4))) {
                                $year1[$i] = '<option selected="true" value="' . substr($ary[0]['jssj'], 0, 4) . '">' . substr($ary[0]['jssj'], 0, 4) . '</option>';
                            }
                        }
                        for ($i = 0; $i < count($month1); $i++) {
                            if (strpos($month1[$i], substr($ary[0]['jssj'], 5, 2))) {
                                $month1[$i] = '<option selected="true" value="' . substr($ary[0]['jssj'], 5, 2) . '">' . substr($ary[0]['jssj'], 5, 2) . '</option>';
                            }
                        }
                        // 任职学习
                        for ($i = 0; $i < count($rzxx); $i++) {
                            if (strpos($rzxx[$i], $ary[0]['rzxx'])) {
                                $rzxx[$i] = '<option selected="true" value="' . $ary[0]['rzxx'] . '">' . $ary[0]['rzxx'] . '</option>';
                            }
                        }
                        // 学业年限
                        for ($i = 0; $i < count($xynx); $i++) {
                            if (strpos($xynx[$i], $ary[0]['xynx'])) {
                                $xynx[$i] = '<option selected="true" value="' . $ary[0]['xynx'] . '">' . $ary[0]['xynx'] . '</option>';
                            }
                        }
                        //  学历
                        for ($i = 0; $i < count($xueli); $i++) {
                            if (strpos($xueli[$i], $ary[0]['xl'])) {
                                $xueli[$i] = '<option selected="true" value="' . $ary[0]['xl'] . '">' . $ary[0]['xl'] . '</option>';
                            }
                        }
                    }
                    $this->assign('yeara', $year);
                    $this->assign('montha', $month);
                    $this->assign('yearb', $year1);
                    $this->assign('monthb', $month1);
                    $this->assign('rzxxa', $rzxx);
                    $this->assign('xynxa', $xynx);
                    $this->assign('xuelia', $xueli);
                } else {
                    $this->error('此信息已经通过或者未审核，不能修改');
                }
            }
            $this->display();
        } else {
            $this->error('请保存你所访问的页面的上一页信息后在访问');
        }
    }

    // 接收info3页面信息的内容储存在数据库
    public function commit_info3()
    {
        if ($_POST['hd'] != null && $_POST['bm'] != null && $_POST['zy'] != null && $_POST['zmr'] != null) {
            if ($_POST['jssjy'] == '至今') {
                $this->check_time($_POST['kssjy'], $_POST['kssjm'], 'ks');
                $data['jssj'] = $_POST['jssjy'];

            } else {
                if ($_POST['jssjy'] > $_POST['kssjy']) {
                    $this->check_time($_POST['kssjy'], $_POST['kssjm'], 'ks');
                    $this->check_time($_POST['jssjy'], $_POST['jssjm'], 'js');
                } else if (($_POST['jssjy'] == $_POST['kssjy'] && $_POST['kssjm'] <= $_POST['jssjm'])) {
                    $this->check_time($_POST['kssjy'], $_POST['kssjm'], 'ks');
                    $this->check_time($_POST['jssjm'], $_POST['jssjm'], 'js');
                } else {
                    $this->error('开始时间不能比结束时间大');
                    exit;
                }
                $data['jssj'] = $_POST['jssjy'] . '.' . $_POST['jssjm'];
            }
            $data['kssj'] = $_POST['kssjy'] . '.' . $_POST['kssjm'];
            $data['hd'] = $_POST['hd'];
            $data['bm'] = $_POST['bm'];
            $data['zy'] = $_POST['zy'];
            $data['rzxx'] = $_POST['rzxx'];
            if ($data['rzxx'] == '学习') {
                $data['xynx'] = $_POST['select-rzxx'];
                $data['xl'] = $_POST['select-xl'];
            } else {
                $data['xynx'] = "";
                $data['xl'] = "";
            }
            $data['zmr'] = $_POST['zmr'];
            $data['xlid'] = $_SESSION['user_id'];
            $xl = M('Xl');
            if ($_POST['hidden'] == null) {
                $st = $this->control_audit_user();
                if ($st == 0) {
                    $arr2 = $xl->add($data);
                    if ($arr2 > 0) {
                        $this->success('保存成功');
                    } else {
                        $this->error('保存失败');
                    }
                } else {
                    $this->error('不能添加信息');
                }
            } else {
                $arr2 = $xl->where("id=" . $_POST['hidden'])->save($data);
                if ($arr2 > 0) {
                    $this->success('修改成功', '__URL__/info3');
                } else {
                    $this->error('修改失败');
                }
            }
        } else {
            $this->error('非法操作');
        }
    }

    // 根据id删除相应的info3的信息
    public function delete_info3()
    {
        $checkId['id'] = $data['cid'] = $id = $_GET['id'];
        $checkId['xlid'] = $data['uid'] = $_SESSION['user_id'];
        $this->check_userId($checkId, 'xl');
        $m = M('cp_xl');
        $xlqk = $m->where($data)->getField('xlqk');
        $st = $this->control_audit_user();
        if ($xlqk == 2 || $st == 0) {
            $xl = M('Xl');
            $arr = $xl->where("id=" . $id)->delete();
            if ($arr > 0) {
                $this->success('删除成功', '__URL__/info3');
            } else {
                $this->error('删除失败');
            }
        } else {
            $this->error('此信息已经通过或者未审核，不能删除');
        }
    }

    // 显示填写信息的第四页面
    public function info4()
    {
        $this->readconfig();
        $msg = M('Xl');
        $id = $_SESSION['user_id'];
        $result = $msg->where('xlid=' . $id)->count();
        if ($result > 0) {
            $year = $this->data['year'];
            $month1 = $month = $this->data['month'];
            $year1[121] = '<option value="至今">至今</option>';
            for ($i = count($year);$i > 0;$i--) {
                $year1[$i] = $year[$i];
            }
            $xynx = $this->data['xl'];
            $xwlx = $this->data['xwlx'];
            $xw = $this->data['xw'];
            //$sxzy=$this->data['sxzy'];
            $xwm = M('Xw');
            $arr = $xwm->where("xwid=" . $_SESSION['user_id'])->select();
            if ($arr > 0) {
                $this->assign('list', $arr);
            }
            if ($_GET['id'] == null) {
                $this->assign('xwlx', $xwlx);
                $this->assign('year', $year);
                $this->assign('month', $month);
                $this->assign('year1', $year1);
                $this->assign('month1', $month1);
                $this->assign('xynx', $xynx);
                $this->assign('xw', $xw);
                //$this->assign('sxzy',$sxzy);
            } else {
                $checkId['id'] = $data['cid'] = $id = $_GET['id'];
                $checkId['xwid'] = $data['uid'] = $_SESSION['user_id'];
                $this->check_userId($checkId, 'xw');
                $md = M('cp_xw');
                $xwqk = $md->where($data)->getField('xwqk');
                $st = $this->control_audit_user();
                if ($xwqk == 2 || $st == 0) {
                    $ary = $xwm->where("id=" . $id)->select();
                    if ($ary > 0) {
                        $this->assign('va', $ary);
                        // dump($ary[0]['xw']);
                        // 授位开始时间
                        for ($i = 0; $i < count($year); $i++) {
                            if (strpos($year[$i], substr($ary[0]['kssj'], 0, 4))) {
                                $year[$i] = '<option selected="true" value="' . substr($ary[0]['kssj'], 0, 4) . '">' . substr($ary[0]['kssj'], 0, 4) . '</option>';
                            }
                        }
                        for ($i = 0; $i < count($month); $i++) {
                            if (strpos($month[$i], substr($ary[0]['kssj'], 5, 2))) {
                                $month[$i] = '<option selected="true" value="' . substr($ary[0]['kssj'], 5, 2) . '">' . substr($ary[0]['kssj'], 5, 2) . '</option>';
                            }
                        }
                        // 授位结束时间
                        for ($i = 0; $i < count($year1); $i++) {
                            if (strpos($year1[$i], substr($ary[0]['swsj'], 0, 4))) {
                                $year1[$i] = '<option selected="true" value="' . substr($ary[0]['swsj'], 0, 4) . '">' . substr($ary[0]['swsj'], 0, 4) . '</option>';
                            }
                        }
                        for ($i = 0; $i < count($month1); $i++) {
                            if (strpos($month1[$i], substr($ary[0]['swsj'], 5, 2))) {
                                $month1[$i] = '<option selected="true" value="' . substr($ary[0]['swsj'], 5, 2) . '">' . substr($ary[0]['swsj'], 5, 2) . '</option>';
                            }
                        }
                        //学业年限
                        for ($i = 0; $i < count($xynx); $i++) {
                            if (strpos($xynx[$i], $ary[0]['xynx'])) {
                                $xynx[$i] = '<option selected="true" value="' . $ary[0]['xynx'] . '">' . $ary[0]['xynx'] . '</option>';
                            }
                        }
                        //  学位
                        for ($i = 0; $i < count($xw); $i++) {
                            if (strpos($xw[$i], $ary[0]['xw'])) {
                                $xw[$i] = '<option selected="true" value="' . $ary[0]['xw'] . '">' . $ary[0]['xw'] . '</option>';
                            }
                        }
                        //  学位类型
                        for ($i = 0; $i < count($xwlx); $i++) {
                            if (strpos($xwlx[$i], $ary[0]['xwlx'])) {
                                $xwlx[$i] = '<option selected="true" value="' . $ary[0]['xwlx'] . '">' . $ary[0]['xwlx'] . '</option>';
                            }
                        }
                        // 学位类型
                        // dump($xwlx);
                       /* for ($i = 0; $i < count($xwlx); $i++) {
                            $str1 = explode('>', $xwlx[$i]);
                            $str2 = substr($str1[1], 0, -8);
                            if ($str2 == $ary[0]['xwlx']) {
                                $lxArr[$i] = '<option value="' . $str2 . '" selected="true">' . $str2 . '</option>';
                                continue;
                            }
                            $lxArr[$i] = $xwlx[$i];
                        }*/
                        // dump($lxArr);
                        // 所学专业
                        /* for($i=0;$i<count($sxzy);$i++){
							if(strpos($sxzy[$i],$ary[0]['sxzy'])){
								$sxzy[$i]='<option selected="true" value="'.$ary[0]['sxzy'].'">'.$ary[0]['sxzy'].'</option>';
							}
						} */
                        if ($lxArr) {
                            $xwlx = $lxArr;
                        }
                        $this->assign('xwlx', $xwlx);
                        $this->assign('yeara', $year);
                        $this->assign('montha', $month);
                        $this->assign('year1a', $year1);
                        $this->assign('month1a', $month1);
                        $this->assign('xynxa', $xynx);
                        $this->assign('xwa', $xw);
                        // $this->assign('xwlxa', $xwlx);
                        // $this->assign('sxzya',$sxzy);
                    }
                } else {
                    $this->error('此信息已经通过或者未审核，不能修改');
                }
            }
            $this->display();
        } else {
            $this->error('请保存你所访问的页面的上一页信息后在访问');
        }
    }

    // 保存info4的页面的信息
    public function commit_info4()
    {
        if ($_POST['byxx'] != null && $_POST['szyx'] != null) {
            if ($_POST['swsjy'] == '至今') {
                $this->check_time($_POST['wkssjy'], $_POST['wkssjm'], 'ks');
                $data['swsj'] = $_POST['swsjy'];
            } else {
                if ($_POST['swsjy'] > $_POST['wkssjy']) {
                    $this->check_time($_POST['wkssjy'], $_POST['wkssjm'], 'ks');
                    $this->check_time($_POST['swsjy'], $_POST['swsjm'], 'sw');

                } else if (($_POST['swsjy'] == $_POST['wkssjy'] && $_POST['wkssym'] <= $_POST['swsjm'])) {
                    $this->check_time($_POST['wkssjy'], $_POST['wkssjm'], 'ks');
                    $this->check_time($_POST['swsjy'], $_POST['swsjm'], 'sw');
                } else {
                    $this->error('开始时间不能比结束时间大');
                    exit;
                }
                $data['swsj'] = $_POST['swsjy'] . '.' . $_POST['swsjm'];
            }
            $data['kssj'] = $_POST['wkssjy'] . '.' . $_POST['wkssjm'];
            $data['byxx'] = $_POST['byxx'];
            $data['szyx'] = $_POST['szyx'];
            $data['sxzy']=$_POST['ssxzy'];
            $data['xynx'] = $_POST['sxynx'];
            $data['xwlx'] = $_POST['sxwlx'];
            $data['xw'] = $_POST['sxw'];
            if ($data['xw'] == '无学位') {
                $data['sxzy'] = "";
                $data['xwlx'] = "";
                $data['xynx'] = "";
            }
            $data['xwid'] = $_SESSION['user_id'];
            /* dump($data);
			exit; */
            $xw = M('Xw');
            if ($_POST['hidden'] == null) {
                $st = $this->control_audit_user();
                if ($st == 0) {
                    $arr = $xw->add($data);
                    if ($arr > 0) {
                        $this->success('保存成功');
                    } else {
                        $this->error('保存失败');
                    }
                } else {
                    $this->error('不能添加信息');
                }
            } else {
                $data['id'] = $_POST['hidden'];
                $arr = $xw->save($data);
                if ($arr > 0) {
                    $this->success('修改成功', '__URL__/info4');
                } else {
                    $this->error('修改失败');
                }
            }
        } else {
            $this->error('非法操作');
        }
        //dump($data);
    }

    // 根据id删除相应的info4的信息
    public function delete_info4()
    {
        $checkId['id'] = $data['cid'] = $id = $_GET['id'];
        $checkId['xwid'] = $data['uid'] = $_SESSION['user_id'];
        $this->check_userId($checkId, 'xw');
        $md = M('cp_xw');
        $xwqk = $md->where($data)->getField('xwqk');
        $st = $this->control_audit_user();
        if ($xwqk == 2 || $st == 0) {
            $xw = M('Xw');
            $arr = $xw->where("id=" . $id)->delete();
            if ($arr > 0) {
                $this->success('删除成功', '__URL__/info4');
            } else {
                $this->error('删除失败');
            }
        } else {
            $this->error('此信息已经通过或者未审核，不能删除');
        }
    }

    // 显示填写的第五页面
    public function info5()
    {
        $this->readconfig();
        $msg = M('Xw');
        $id = $_SESSION['user_id'];
        $result = $msg->where('xwid=' . $id)->count();
        if ($result > 0) {
            $year = $this->data['year'];
            $month1 = $month = $this->data['month'];
            $ywqk = $this->data['ywqk'];
            $lb = $this->data['lb'];
            $year1[121] = '<option value="至今">至今</option>';
            for ($i = count($year);$i > 0;$i--) {
                $year1[$i] = $year[$i];
            }
            $m = M('Gnwjx');
            $arr = $m->where('gid=' . $id)->select();
            if ($arr > 0) {
                $this->assign('list', $arr);
            }
            if ($_GET['id'] == null) {
                $this->assign('ywqk', $ywqk);
                $this->assign('year', $year);
                $this->assign('year1', $year1);
                $this->assign('month', $month);
                $this->assign('month1', $month1);
                $this->assign('lb', $lb);
            } else {
                $checkId['id'] = $data['cid'] = $id = $_GET['id'];
                $checkId['gid'] = $data['uid'] = $_SESSION['user_id'];
                $this->check_userId($checkId, 'gnwjx');
                $md = M('cp_jx');
                $jxqk = $md->where($data)->getField('jxqk');
                $st = $this->control_audit_user();
                if ($jxqk == 2 || $st == 0) {
                    $ary = $m->where("id=" . $id)->select();
                    if ($ary > 0) {
                        $this->assign('va', $ary);
                        for ($i = 0; $i < count($ywqk); $i++) {
                            if (strpos($ywqk[$i], $ary[0]['qk'])) {
                                $ywqk[$i] = '<option selected="true" value="'.$ary[0]['qk'].'">'.$ary[0]['qk'].'</option>';
                            }
                        }
                        // 开始时间
                        for ($i = 0; $i < count($year); $i++) {
                            if (strpos($year[$i], substr($ary[0]['kssj'], 0, 4))) {
                                $year[$i] = '<option selected="true" value="' . substr($ary[0]['kssj'], 0, 4) . '">' . substr($ary[0]['kssj'], 0, 4) . '</option>';
                            }
                        }
                        for ($i = 0; $i < count($month); $i++) {
                            if (strpos($month[$i], substr($ary[0]['kssj'], 5, 2))) {
                                $month[$i] = '<option selected="true" value="' . substr($ary[0]['kssj'], 5, 2) . '">' . substr($ary[0]['kssj'], 5, 2) . '</option>';
                            }
                        }
                        // 结束时间
                        for ($i = 0; $i < count($year1); $i++) {
                            if (strpos($year1[$i], substr($ary[0]['jssj'], 0, 4))) {
                                $year1[$i] = '<option selected="true" value="' . substr($ary[0]['jssj'], 0, 4) . '">' . substr($ary[0]['jssj'], 0, 4) . '</option>';
                            }
                        }
                        for ($i = 0; $i < count($month1); $i++) {
                            if (strpos($month1[$i], substr($ary[0]['jssj'], 5, 2))) {
                                $month1[$i] = '<option selected="true" value="' . substr($ary[0]['jssj'], 5, 2) . '">' . substr($ary[0]['jssj'], 5, 2) . '</option>';
                            }
                        }
                        // 类别
                        for ($i = 0; $i < count($lb); $i++) {
                            if (strpos($lb[$i], $ary[0]['lb'])) {
                                $lb[$i] = '<option selected="true" value="' . $ary[0]['lb'] . '">' . $ary[0]['lb'] . '</option>';
                            }
                        }
                        $this->assign('ywqk', $ywqk);
                        $this->assign('yeara', $year);
                        $this->assign('year1a', $year1);
                        $this->assign('montha', $month);
                        $this->assign('month1a', $month1);
                        $this->assign('lba', $lb);
                    }
                } else {
                    $this->error('此信息已经通过或者未审核，不能修改');
                }
            }
            $this->display();
        } else {
            $this->error('请保存你所访问的页面的上一页信息后在访问');
        }
    }

    // 保存info5信息
    public function commit_info5()
    {
        if ($_POST['xx'] != null || $_POST['qk'] == '无') {
            $m = M('Gnwjx');
            $qkArr = $m->field('qk')->where('gid = '.$_SESSION['user_id'])->select();
            if ($_POST['qk'] == '无') {
                /* dump($qkArr);
                 exit;*/
                if ($qkArr) {

                    $this->error('对不起,不能填无了');
                    exit;
                } else {
                    $data['kssj'] = $data['jssj'] = $data['xx'] = $data['lb'] = $data['qk'] = '无';
                }
            } else {
                if ($_POST['jssjy'] == '至今') {
                    $this->check_time($_POST['kssjy'], $_POST['kssjm'], 'ks');
                    $data['jssj'] = $_POST['jssjy'];
                } else {
                    if ($_POST['jssjy'] > $_POST['kssjy']) {
                        $this->check_time($_POST['kssjy'], $_POST['kssjm'], 'ks');
                        $this->check_time($_POST['jssjy'], $_POST['jssjm'], 'js');

                    } else if (($_POST['kssjy'] == $_POST['jssjy'] && $_POST['kssjm'] <= $_POST['jssjm'])) {
                        $this->check_time($_POST['kssjy'], $_POST['kssjm'], 'ks');
                        $this->check_time($_POST['jssjy'], $_POST['jssjm'], 'js');
                    } else {
                        $this->error('开始时间不能比结束时间大');
                        exit;
                    }
                    $data['jssj'] = $_POST['jssjy'] . '.' . $_POST['jssjm'];
                }

                $data['kssj'] = $_POST['kssjy'] . '.' . $_POST['kssjm'];
                $data['xx'] = $_POST['xx'];
                $data['qk'] = '有';
                $data['lb'] = $_POST['slb'];
            }
            for ($i = 0; $i < count($qkArr); $i++) {
                if ($qkArr[$i]['qk'] == '无') {
                    $this->error('对不起，你已经填写了无了,要填写请先删除无');
                    exit;
                }
            }
            $data['gid'] = $_SESSION['user_id'];
            // dump($data);
            // exit;
            if ($_POST['hidden'] == null) {
                $st = $this->control_audit_user();
                if ($st == 0) {
                    $arr = $m->add($data);
                    if ($arr > 0) {
                        $this->success('保存成功');
                    } else {
                        $this->error('保存失败');
                    }
                } else {
                    $this->error('不能添加信息');
                }
            } else {
                $data['id'] = $_POST['hidden'];
                $arr = $m->save($data);
                if ($arr > 0) {
                    $this->success('修改成功', '__URL__/info5');
                } else {
                    $this->error('修改失败');
                }
            }
        } else {
            $this->error('非法操作');
        }
    }

    // 根据id删除相应的info5的信息
    public function delete_info5()
    {
        $checkId['id'] = $data['cid'] = $id = $_GET['id'];
        $checkId['gid'] = $data['uid'] = $_SESSION['user_id'];
        $this->check_userId($checkId, 'gnwjx');
        $md = M('cp_jx');
        $jxqk = $md->where($data)->getField('jxqk');
        $st = $this->control_audit_user();
        if ($jxqk == 2 || $st == 0) {
            $id = $_GET['id'];
            $m = M('Gnwjx');
            $arr = $m->where("id=" . $id)->delete();
            if ($arr > 0) {
                $this->success('删除成功', '__URL__/info5');
            } else {
                $this->error('删除失败');
            }
        } else {
            $this->error('此信息已经通过或者未审核，不能删除');
        }
    }
    //
    // 显示填写信息的第六个页面
    public function info6()
    {
        $this->readconfig();
        $msg = M('Gnwjx');
        $id = $_SESSION['user_id'];
        $result = $msg->where('gid=' . $id)->count();
        if ($result > 0) {
            $year = $this->data['year'];
            $fl = $this->data['fl'];
            $month1 = $month = $this->data['month'];
            $bz = $this->data['bz'];
            $ywqk = $this->data['ywqk'];
            $rwlx = $this->data['rwlx'];
            $year1[121] = '<option value="至今">至今</option>';
            for ($i = count($year);$i > 0;$i--) {
                $year1[$i] = $year[$i];
            }
            $m = M('Xzwcgz');
            $arr = $m->where('xzid=' . $id)->select();
            if ($arr > 0) {
                $this->assign('list', $arr);
            }
            if ($_GET['id'] == null) {
                $this->assign('fl', $fl);
                $this->assign('rwlx', $rwlx);
                $this->assign('ywqk', $ywqk);
                $this->assign('year', $year);
                $this->assign('year1', $year1);
                $this->assign('month', $month);
                $this->assign('month1', $month1);
                $this->assign('bz', $bz);
            } else {
                $checkId['id'] = $data['cid'] = $id = $_GET['id'];
                $checkId['xzid'] = $data['uid'] = $_SESSION['user_id'];
                $this->check_userId($checkId, 'xzwcgz');
                $md = M('cp_jxgz');
                $jxgzqk = $md->where($data)->getField('jxgzqk');
                $st = $this->control_audit_user();
                if ($jxgzqk == 2 || $st == 0) {
                    $ary = $m->where("id=" . $id)->select();
                    if ($ary > 0) {
                        $this->assign('va', $ary);
                        // 教学分类
                        if ($ary[0]['mcrw'] == '毕业设计') {
                            $fl[1] = '<option selected="true" value="毕业设计">毕业设计</option>';
                        }
                        // 控制任务类型
                        for ($i = 0; $i < count($rwlx); $i++) {
                            if (strpos($rwlx[$i], $ary[0]['lx'])) {
                                $rwlx[$i] = '<option selected="true" value="' . $ary[0]['lx'] . '">' . $ary[0]['lx'] . '</option>';
                            }
                        }
                        // 控制有无情况
                        for ($i = 0; $i < count($ywqk); $i++) {
                            if (strpos($ywqk[$i], $ary[0]['qk'])) {
                                $ywqk[$i] = '<option selected="true" value="' . $ary[0]['qk'] . '">' . $ary[0]['qk'] . '</option>';
                            }
                        }
                        // 开始时间
                        for ($i = 0; $i < count($year); $i++) {
                            if (strpos($year[$i], substr($ary[0]['kssj'], 0, 4))) {
                                $year[$i] = '<option selected="true" value="' . substr($ary[0]['kssj'], 0, 4) . '">' . substr($ary[0]['kssj'], 0, 4) . '</option>';
                            }
                        }
                        for ($i = 0; $i < count($month); $i++) {
                            if (strpos($month[$i], substr($ary[0]['kssj'], 5, 2))) {
                                $month[$i] = '<option selected="true" value="' . substr($ary[0]['kssj'], 5, 2) . '">' . substr($ary[0]['kssj'], 5, 2) . '</option>';
                            }
                        }
                        // 结束时间
                        for ($i = 0; $i < count($year1); $i++) {
                            if (strpos($year1[$i], substr($ary[0]['jssj'], 0, 4))) {
                                $year1[$i] = '<option selected="true" value="' . substr($ary[0]['jssj'], 0, 4) . '">' . substr($ary[0]['jssj'], 0, 4) . '</option>';
                            }
                        }
                        for ($i = 0; $i < count($month1); $i++) {
                            if (strpos($month1[$i], substr($ary[0]['jssj'], 5, 2))) {
                                $month1[$i] = '<option selected="true" value="' . substr($ary[0]['jssj'], 5, 2) . '">' . substr($ary[0]['jssj'], 5, 2) . '</option>';
                            }
                        }
                        // 备注
                        for ($i = 0; $i < count($bz); $i++) {
                            if (strpos($bz[$i], $ary[0]['bz'])) {
                                $bz[$i] = '<option selected="true" value="' . $ary[0]['bz'] . '">' . $ary[0]['bz'] . '</option>';
                            }
                        }
                        $this->assign('fl', $fl);
                        $this->assign('rwlx', $rwlx);
                        $this->assign('ywqk', $ywqk);
                        $this->assign('yeara', $year);
                        $this->assign('year1a', $year1);
                        $this->assign('montha', $month);
                        $this->assign('month1a', $month1);
                        $this->assign('bza', $bz);
                    }
                } else {
                    $this->error('此信息已经通过或者未审核，不能修改');
                }
            }
            $user = M('cp_user');
            $zs = $user->where('uid=' . $_SESSION['user_id'])->getField('jxrwzs');
            $this->assign('contl', $zs);
            $this->display();
        } else {
            $this->error('请保存你所访问的页面的上一页信息后在访问');
        }
    }

    // 获取info6页面信息保存数据库
    public function commit_info6()
    {
        if ($_POST['mcrw'] != null && $_POST['xsrs'] != null &&
            is_numeric($_POST['xsrs']) && $_POST['zhxss'] != null && is_numeric($_POST['zhxss']) &&
            $_POST['zxss'] != null && is_numeric($_POST['zxss']) || $_POST['qk'] == '无') {
            $m = M('Xzwcgz');
            $qkArr = $m->field('qk')->where('xzid = '.$_SESSION['user_id'])->select();
            if ($_POST['qk'] == '无') {
                if ($qkArr) {
                    $this->error('对不起，不能填写无了');
                    exit;
                } else {
                    $data['qk'] = $data['mcrw'] = $data['kssj'] = $data['jssj'] = $data['xsrs'] =
                        $data['zhxss'] = $data['zxss'] = $data['bz'] = $data['lx'] = '无';
                }
            } else {
                $data['mcrw'] = $_POST['mcrw'];
                $data['lx'] = $_POST['lx'];
                if ($_POST['endy'] == '至今') {
                    $this->check_time($_POST['starty'], $_POST['startm'], 'ks');
                    $data['jssj'] = $_POST['endy'];
                } else {
                    if ($_POST['endy'] > $_POST['starty']) {
                        $this->check_time($_POST['starty'], $_POST['startm'], 'ks');
                        $this->check_time($_POST['endy'], $_POST['endm'], 'js');

                    } else if (($_POST['starty'] == $_POST['endy'] && $_POST['startm'] <= $_POST['endm'])) {
                        $this->check_time($_POST['starty'], $_POST['startm'], 'ks');
                        $this->check_time($_POST['endy'], $_POST['endm'], 'js');
                    } else {
                        $this->error('开始时间不能比结束时间大');
                        exit;
                    }
                    $data['jssj'] = $_POST['endy'] . '.' . $_POST['endm'];
                }
                $data['kssj'] = $_POST['starty'] . '.' . $_POST['startm'];
                $data['xsrs'] = $_POST['xsrs'];
                $data['zhxss'] = $_POST['zhxss'];
                $data['zxss'] = $_POST['zxss'];
                $data['bz'] = $_POST['bz'];
                $data['qk'] = '有';
            }
           for ($i = 0; $i < count($qkArr); $i++) {
               if ($qkArr[$i]['qk'] == '无') {
                   $this->error('对不起，不能填写无了，请先删除无后在填写');
                   exit;
               }
           }
            $data['xzid'] = $_SESSION['user_id'];

            if ($_POST['hidden'] == null) {
                $st = $this->control_audit_user();
                if ($st == 0) {
                    // dump($data);
                    // exit;
                    $ary = $m->add($data);
                    if ($ary > 0) {
                        $this->success('保存成功');
                    } else {
                        $this->error('保存失败');
                    }
                } else {
                    $this->error('不能添加信息');
                }
            } else {
                $id = $_POST['hidden'];
                $ary = $m->where("id=" . $id)->save($data);
                if ($ary > 0) {
                    $this->success('保存成功', '__URL__/info6');
                } else {
                    $this->error('保存失败');
                }
            }
        } elseif ($_POST['fl'] == '毕业设计' && $_POST['qk'] == '有' && $_POST['xsrs'] != null) {
            if (!is_numeric($_POST['xsrs']) || $_POST['xsrs'] > 8 ) {
                $this->error('填写的人数不是数字或者超过8人了');
            } else {
                $m = M('Xzwcgz');
                $qkArr = $m->field('qk')->where('xzid = '.$_SESSION['user_id'])->select();
                if ($_POST['qk'] == '无') {
                    if ($qkArr) {
                        $this->error('对不起，不能填写无了');
                        exit;
                    } else {
                        $data['qk'] = $data['mcrw'] = $data['kssj'] = $data['jssj'] = $data['xsrs'] =
                        $data['zhxss'] = $data['zxss'] = $data['bz'] = $data['lx'] = '无';
                    }
                } else {
                    $data['mcrw'] = $_POST['fl'];
                    // $data['lx'] = $_POST['lx'];
                    if ($_POST['endy'] == '至今') {
                        $this->check_time($_POST['starty'], $_POST['startm'], 'ks');
                        $data['jssj'] = $_POST['endy'];
                    } else {
                        if ($_POST['endy'] > $_POST['starty']) {
                            $this->check_time($_POST['starty'], $_POST['startm'], 'ks');
                            $this->check_time($_POST['endy'], $_POST['endm'], 'js');

                        } else if (($_POST['starty'] == $_POST['endy'] && $_POST['startm'] <= $_POST['endm'])) {
                            $this->check_time($_POST['starty'], $_POST['startm'], 'ks');
                            $this->check_time($_POST['endy'], $_POST['endm'], 'js');
                        } else {
                            $this->error('开始时间不能比结束时间大');
                            exit;
                        }
                        $data['jssj'] = $_POST['endy'] . '.' . $_POST['endm'];
                    }
                    $data['kssj'] = $_POST['starty'] . '.' . $_POST['startm'];
                    $data['qk'] = '有';
                    $data['xsrs'] = $_POST['xsrs'];
                    $data['zhxss'] = "";
                    $data['zxss'] = "";
                    $data['bz'] = "";
                    $data['lx'] = "";
                }
                for ($i = 0; $i < count($qkArr); $i++) {
                    if ($qkArr[$i]['qk'] == '无') {
                        $this->error('对不起，不能填写无了，请先删除无后在填写');
                        exit;
                    }
                }
                $data['xzid'] = $_SESSION['user_id'];

                if ($_POST['hidden'] == null) {
                    $st = $this->control_audit_user();
                    if ($st == 0) {
                        // dump($data);
                        // exit;
                        $ary = $m->add($data);
                        if ($ary > 0) {
                            $this->success('保存成功');
                        } else {
                            $this->error('保存失败');
                        }
                    } else {
                        $this->error('不能添加信息');
                    }
                } else {
                    $id = $_POST['hidden'];
                    $ary = $m->where("id=" . $id)->save($data);
                    if ($ary > 0) {
                        $this->success('保存成功', '__URL__/info6');
                    } else {
                        $this->error('保存失败');
                    }
                }
            }
        } else {
            $this->error('非法操作');
        }
    }

    // 根据id删除相应的info6的信息
    public function delete_info6()
    {
        $checkId['id'] = $data['cid'] = $id = $_GET['id'];
        $checkId['xzid'] = $data['uid'] = $_SESSION['user_id'];
        $this->check_userId($checkId, 'xzwcgz');
        $md = M('cp_jxgz');
        $jxgzqk = $md->where($data)->getField('jxgzqk');
        $st = $this->control_audit_user();
        if ($st == 0 || $jxgzqk == 2) {
            $m = M('Xzwcgz');
            $arr = $m->where('id=' . $id)->delete();
            if ($arr > 0) {
                $this->success('删除成功', '__URL__/info6');
            } else {
                $this->error('删除失败');
            }
        } else {
            $this->error('此信息已经通过或者未审核，不能删除');
        }
    }
    ///
    // 显示info7的信息
    public function info7()
    {
        $this->readconfig();
        $msg = M('Xzwcgz');
        $id = $_SESSION['user_id'];
        $result = $msg->where('xzid=' . $id)->count();
        if ($result > 0) {
            $qk = $this->data['status'];
            $year = $this->data['year'];
            $month = $this->data['month'];
            $hjjb = $this->data['hjjb'];
            $dj = array('一等','二等','三等','四等','五等','六等');
            for ($i = 0; $i < count($dj); $i++) {
                $hjdj[$i] = '<option value="'.$dj[$i].'">'.$dj[$i].'</option>';
            }
            $jid = $_SESSION['user_id'];
            $m = M('Jf');
            $arr = $m->where("jid=" . $jid)->select();
            if ($arr > 0) {
                $this->assign('list', $arr);
            }
            if ($_GET['id'] == null) {
                $this->assign('jb' , $hjjb);
                $this->assign('hjdj', $hjdj);
                $this->assign('qk', $qk);
                $this->assign('year', $year);
                $this->assign('month', $month);
            } else {
                $checkId['id'] = $data['cid'] = $id = $_GET['id'];
                $checkId['jid'] = $data['uid'] = $_SESSION['user_id'];
                $this->check_userId($checkId, 'jf');
                $jf = M('cp_jf');
                $jfqk = $jf->where($data)->getField('jfqk');
                $st = $this->control_audit_user();
                if ($jfqk == 2 || $st == 0) {
                    $ary = $m->where("id=" . $id)->select();
                    if ($ary > 0) {
                        $this->assign('va', $ary);
                        // 获奖级别
                        for ($i = 0; $i < count($hjjb); $i++) {
                            if (strpos($hjjb[$i], $ary[0]['jb'])) {
                                $hjjb[$i] = '<option selected="true" value="' . $ary[0]['jb'] . '">' . $ary[0]['jb'] . '</option>';
                            }
                        }
                        // 获奖等级
                        for ($i = 0; $i < count($hjdj); $i++) {
                            if (strpos($hjdj[$i], $ary[0]['dj'])) {
                                $hjdj[$i] = '<option selected="true" value="' . $ary[0]['dj'] . '">' . $ary[0]['dj'] . '</option>';
                            }
                        }
                        // 获奖或惩处情况
                        for ($i = 0; $i < count($qk); $i++) {
                            if (strpos($qk[$i], $ary[0]['status'])) {
                                $qk[$i] = '<option selected="true" value="' . $ary[0]['status'] . '">' . $ary[0]['status'] . '</option>';
                            }
                        }

                        // 开始时间
                        for ($i = 0; $i < count($year); $i++) {
                            if (strpos($year[$i], substr($ary[0]['time'], 0, 4))) {
                                $year[$i] = '<option selected="true" value="' . substr($ary[0]['time'], 0, 4) . '">' . substr($ary[0]['time'], 0, 4) . '</option>';
                            }
                        }
                        for ($i = 0; $i < count($month); $i++) {
                            if (strpos($month[$i], substr($ary[0]['time'], 5, 2))) {
                                $month[$i] = '<option selected="true" value="' . substr($ary[0]['time'], 5, 2) . '">' . substr($ary[0]['time'], 5, 2) . '</option>';
                            }
                        }
                    }
                    $this->assign('jb', $hjjb);
                    $this->assign('hjdj', $hjdj);
                    $this->assign('qka', $qk);
                    $this->assign('yeara', $year);
                    $this->assign('montha', $month);
                } else {
                    $this->error('此信息已经通过或者未审核，不能修改');
                }
            }
            $user = M('cp_user');
            $zs = $user->where('uid=' . $_SESSION['user_id'])->getField('hjzs');
            $this->assign('contl', $zs);
            $this->display();
        } else {
            $this->error('请保存你所访问的页面的上一页信息后在访问');
        }
    }

    // 保存info7页面的信息
    public function commit_info7()
    {
        if ($_POST['mcsy'] != null && $_POST['dd'] != null || $_POST['status'] == '无' ||
             $_POST['status'] == '荣誉'
        ) {
            $m = M('Jf');
            $qkArr = $m->field('status')->where('jid=' . $_SESSION['user_id'])->select();
            if ($_POST['status'] == '无') {
                if ($qkArr) {
                    $this->error('对不起，不能填无了');
                    exit;
                } else {
                    $data['time'] = $data['mcsy'] = $data['dd'] = $data['jb'] = $data['pm'] = $data['ch'] = $data['bz'] = '无';
                }
            } elseif($_POST['status'] == '惩处') {
                $data['jb'] = "";
                $data['pm'] = "";
                $data['ch'] = "";
                $data['dj'] =  "";
                $data['bz'] = $_POST['bz'];
                $data['mcsy'] = $_POST['mcsy'];
                $data['dd'] = $_POST['dd'];
                $this->check_time($_POST['timey'], $_POST['timem']);
                $data['time'] = $_POST['timey'] . '.' . $_POST['timem'];
            } else if($_POST['status'] == '荣誉') {
                $data['jb'] = "";
                $data['pm'] = "";
                $data['dj'] = "";
                $data['ch'] = $_POST['ch'];
                $this->check_time($_POST['timey'], $_POST['timem']);
                $data['time'] = $_POST['timey'] . '.' . $_POST['timem'];
            } else {
                $data['mcsy'] = $_POST['mcsy'];
                $data['dd'] = $_POST['dd'];
                $data['dj'] = $_POST['dj'];
                $data['jb'] = $_POST['jb'];
                $data['pm'] = $_POST['pm'];
                $data['ch'] = $_POST['ch'];
                $data['bz'] = $_POST['bz'];
                $this->check_time($_POST['timey'], $_POST['timem']);
                $data['time'] = $_POST['timey'] . '.' . $_POST['timem'];
            }
            for ($i = 0; $i < count($qkArr); $i++) {
                if ($qkArr[$i]['status'] == '无') {
                    $this->error('对不起，已经填写无了,要填写请先删除无');
                }
            }
            $data['status'] = $_POST['status'];
            $data['jid'] = $_SESSION['user_id'];
            if ($_POST['hidden'] == null) {
                $st = $this->control_audit_user();
                if ($st == 0) {
                    $arr = $m->add($data);
                    if ($arr > 0) {
                        $this->success('保存成功', '__URL__/info7');
                    } else {
                        $this->error('保存失败');
                    }
                } else {
                    $this->error('不能添加信息');
                }
            } else {
                $data['id'] = $_POST['hidden'];
                $arr = $m->save($data);
                if ($arr > 0) {
                    $this->success('修改成功', '__URL__/info7');
                } else {
                    $this->error('修改失败');
                }
            }
        } else {
            $this->error('非法操作');
        }
    }

    // 根据id删除相应的info7的信息
    public function delete_info7()
    {
        $checkId['id'] = $data['cid'] = $id = $_GET['id'];
        $checkId['jid'] = $data['uid'] = $_SESSION['user_id'];
        $this->check_userId($checkId, 'jf');
        $jf = M('cp_jf');
        $jfqk = $jf->where($data)->getField('jfqk');
        $st = $this->control_audit_user();
        if ($jfqk == 2 || $st == 0) {
            $m = M('Jf');
            $arr = $m->where("id=" . $id)->delete();
            if ($arr > 0) {
                $this->success('删除成功', '__URL__/info7');
            } else {
                $this->error('删除失败');
            }
        } else {
            $this->error('此信息已经通过或者未审核，不能删除');
        }
    }
    ///
    // 显示info8页面信息
    public function info8()
    {
        $this->readconfig();
        $msg = M('Jf');
        $id = $_SESSION['user_id'];
        $result = $msg->where('jid=' . $id)->count();
        if ($result > 0) {
            $xmjb = $this->data['xmjb'];
            $year = $this->data['year'];
            $month1 = $month = $this->data['month'];
            $jz = $this->data['jz'];
            $ywqk = $this->data['ywqk'];
            $pm = $this->data['xmpm'];
            $jgid = $_SESSION['user_id'];
            $year1[121] = '<option value="至今">至今</option>';
            for ($i = count($year);$i > 0;$i--) {
                $year1[$i] = $year[$i];
            }
            $m = M('Jgxm');
            $arr = $m->where("jgid=" . $jgid)->select();
            if ($arr > 0) {
                $this->assign('list', $arr);
            }
            if ($_GET['id'] == null) {
                $this->assign('pm', $pm);
                $this->assign('ywqk', $ywqk);
                $this->assign('xmjb', $xmjb);
                $this->assign('year', $year);
                $this->assign('month', $month);
                $this->assign('year1', $year1);
                $this->assign('month1', $month1);
                $this->assign('jz', $jz);
            } else {
                $checkId['id'] = $data['cid'] = $id = $_GET['id'];
                $checkId['jgid'] = $data['uid'] = $_SESSION['user_id'];
                $this->check_userId($checkId, 'jgxm');
                $jgxm = M('cp_jgxm');
                $num = $jgxm->where($data)->getField('jgxmqk');
                $st = $this->control_audit_user();
                if ($num == 2 || $st == 0) {
                    $ary = $m->where('id=' . $id)->select();
                    if ($ary > 0) {
                        $xmpm = $this->qiTa($pm, $ary[0]['pm']);
                        $ary[0]['pm'] = $xmpm[1];
                        $this->assign('va', $ary);
                        // 项目有无情况
                        for ($i = 0; $i < count($ywqk); $i++) {
                            if (strpos($ywqk[$i], $ary[0]['qk'])) {
                                $ywqk[$i] = '<option selected="true" value="' . $ary[0]['qk'] . '">' . $ary[0]['qk'] . '</option>';
                            }
                        }
                        // 项目级别
                        for ($i = 0; $i < count($xmjb); $i++) {
                            if (strpos($xmjb[$i], $ary[0]['jb'])) {
                                $xmjb[$i] = '<option selected="true" value="' . $ary[0]['jb'] . '">' . $ary[0]['jb'] . '</option>';
                            }
                        }
                        // 开始时间
                        for ($i = 0; $i < count($year); $i++) {
                            if (strpos($year[$i], substr($ary[0]['kssj'], 0, 4))) {
                                $year[$i] = '<option selected="true" value="' . substr($ary[0]['kssj'], 0, 4) . '">' . substr($ary[0]['kssj'], 0, 4) . '</option>';
                            }
                        }
                        for ($i = 0; $i < count($month); $i++) {
                            if (strpos($month[$i], substr($ary[0]['kssj'], 5, 2))) {
                                $month[$i] = '<option selected="true" value="' . substr($ary[0]['kssj'], 5, 2) . '">' . substr($ary[0]['kssj'], 5, 2) . '</option>';
                            }
                        }
                        // 结束时间
                        for ($i = 0; $i < count($year1); $i++) {
                            if (strpos($year1[$i], substr($ary[0]['jssj'], 0, 4))) {
                                $year1[$i] = '<option selected="true" value="' . substr($ary[0]['jssj'], 0, 4) . '">' . substr($ary[0]['jssj'], 0, 4) . '</option>';
                            }
                        }
                        for ($i = 0; $i < count($month1); $i++) {
                            if (strpos($month1[$i], substr($ary[0]['jssj'], 5, 2))) {
                                $month1[$i] = '<option selected="true" value="' . substr($ary[0]['jssj'], 5, 2) . '">' . substr($ary[0]['jssj'], 5, 2) . '</option>';
                            }
                        }
                        // 结题或在研
                        for ($i = 1; $i < count($jz); $i++) {
                            if (strpos($jz[$i], $ary[0]['jz'])) {
                                $jz[$i] = '<option selected="true" value="' . $ary[0]['jz'] . '">' . $ary[0]['jz'] . '</option>';
                            }
                        }
                    }
                    if ($xmpm != null) {
                       $pm = $xmpm[0];
                    }
                    $this->assign('pm', $pm);
                    $this->assign('ywqk', $ywqk);
                    $this->assign('xmjba', $xmjb);
                    $this->assign('yeara', $year);
                    $this->assign('montha', $month);
                    $this->assign('year1a', $year1);
                    $this->assign('month1a', $month1);
                    $this->assign('jza', $jz);
                } else {
                    $this->error('此信息已经通过或者未审核，不能修改');
                }
            }
            $user = M('cp_user');
            $zs = $user->where('uid=' . $_SESSION['user_id'])->getField('jxggzs');
            $this->assign('contl', $zs);
            $this->display();
        } else {
            $this->error('请保存你所访问的页面的上一页信息后在访问');
        }
    }

    // 接收info8数据进行保存
    public function commit_info8()
    {
        if ($_POST['xmmc'] != null && $_POST['ly'] != null && $_POST['pm'] != null || $_POST['qk'] == '无') {
            $m = M('Jgxm');
            $qkArr = $m->field('qk')->where('jgid = '.$_SESSION['user_id'])->select();
//            dump(count($qkArr));
            if ($_POST['qk'] == '无') {
                if ($qkArr) {
                    $this->error('对不起，不能在填写无了');
                    exit;
                } else {
                    $data['xmmc'] = $data['jb'] = $data['ly'] = $data['kssj'] = $data['jssj'] = $data['jz'] =
                        $data['pm'] = $data['qk'] = '无';
                }
            } else {
                $data['xmmc'] = $_POST['xmmc'];
                $data['jb'] = $_POST['jb'];
                $data['ly'] = $_POST['ly'];
                if ($_POST['jssjy'] == '至今') {
                    $this->check_time($_POST['kssjy'], $_POST['kssjm'], 'ks');
                    $data['jssj'] = $_POST['jssjy'];
                } else {
                    if ($_POST['jssjy'] > $_POST['kssjy']) {
                        $this->check_time($_POST['kssjy'], $_POST['kssjm'], 'ks');
                        // $this->check_time($_POST['jssjy'], $_POST['jssjm'], 'js');

                    } else if (($_POST['jssjy'] == $_POST['kssjy'] && $_POST['kssjm'] <= $_POST['jssjm'])) {
                        $this->check_time($_POST['kssjy'], $_POST['kssjm'], 'ks');
                        // $this->check_time($_POST['jssjy'], $_POST['jssjm'], 'js');
                    } else {
                        $this->error('开始时间不能比结束时间大');
                        exit;
                    }
                    $data['jssj'] = $_POST['jssjy'] . '.' . $_POST['jssjm'];
                }
                $data['kssj'] = $_POST['kssjy'] . '.' . $_POST['kssjm'];
                $data['jz'] = $_POST['sjz'];
                if ($_POST['pm'] == '其他') {
                    if ($_POST['qita'] == null) {
                        $this->error('对不起，当选择其他时所填写不能为空');
                    } else {
                        $data['pm'] = $_POST['pm'].':'.$_POST['qita'];
                    }
                } else {
                    $data['pm'] = $_POST['pm'];
                }
                $data['qk'] = '有';
            }
            for ($i = 0; $i < count($qkArr); $i++) {
                if ($qkArr[$i]['qk'] == '无') {
                    $this->error('对不起，不能填写无，请先删除无才能填写');
                    exit;
                }
            }
            $data['jgid'] = $_SESSION['user_id'];

            if ($_POST['hidden'] == null) {
                $st = $this->control_audit_user();
                if ($st == 0) {
                    $ary = $m->add($data);
                    if ($ary > 0) {
                        $this->success('保存成功', '__URL__/info8');
                    } else {
                        $this->error('保存失败');
                    }
                } else {
                    $this->error('不能添加信息');
                }
            } else {
                $data['id'] = $_POST['hidden'];
                $ary = $m->save($data);
                if ($ary > 0) {
                    $this->success('修改成功', '__URL__/info8');
                } else {
                    $this->error('修改失败');
                }
            }
        } else {
            $this->error('非法操作');
        }
    }

    // 根据id删除相应的info8的信息
    public function delete_info8()
    {
        $checkId['id'] = $data['cid'] = $id = $_GET['id'];
        $checkId['jgid'] = $data['uid'] = $_SESSION['user_id'];
        $this->check_userId($checkId, 'jgxm');
        $jgxm = M('cp_jgxm');
        $num = $jgxm->where($data)->getField('jgxmqk');
        $m = M('Jgxm');
        $st = $this->control_audit_user();
        if ($num == 2 || $st == 0) {
            $arr = $m->where('id=' . $id)->delete();
            if ($arr > 0) {
                $this->success('删除成功', '__URL__/info8');
            } else {
                $this->error('删除失败');
            }
        } else {
            $this->error('此信息已经通过或者未审核，不能删除');
        }
    }
    ///
    // 显示info9的信息
    public function info9()
    {
        $this->readconfig();
        $msg = M('Jgxm');
        $id = $_SESSION['user_id'];
        $result = $msg->where('jgid=' . $id)->count();
        if ($result > 0) {
            // $lx = $this->data['kslx'];
            $year1 = $year = $this->data['year'];
            $month1 = $month = $this->data['month'];
            $jsjcj = $yycj = $this->data['cj'];
            $yyms = $this->data['yyms'];
            $jsjms = $this->data['jsjms'];
            $ksjb1 = $ksjb = $this->data['ksjb'];
            $iid = $_SESSION['user_id'];
            $m = M('Ks');
            $ary = $m->where('kid=' . $iid)->select();
            if ($ary > 0) {
                // 英语考试级别
                for ($i = 0; $i < count($ksjb); $i++) {
                    if (strpos($ksjb[$i], $ary[0]['yyjb'])) {
                        $ksjb[$i] = '<option selected="true" value="' . $ary[0]['yyjb'] . '">' . $ary[0]['yyjb'] . '</option>';
                    }
                }
                // dump($ksjb);
                // 计算机考试级别
                for ($i = 0; $i < count($ksjb1); $i++) {
                    if (strpos($ksjb1[$i], $ary[0]['jsjjb'])) {
                        $ksjb1[$i] = '<option selected="true" value="' . $ary[0]['jsjjb'] . '">' . $ary[0]['jsjjb'] . '</option>';
                    }
                }
                // 英语考试时间
                for ($i = 0; $i < count($year); $i++) {
                    if (strpos($year[$i], substr($ary[0]['yysj'], 0, 4))) {
                        $year[$i] = '<option selected="true" value="' . substr($ary[0]['yysj'], 0, 4) . '">' . substr($ary[0]['yysj'], 0, 4) . '</option>';
                    }
                }
                for ($i = 0; $i < count($month); $i++) {
                    if (strpos($month[$i], substr($ary[0]['yysj'], 5, 2))) {
                        $month[$i] = '<option selected="true" value="' . substr($ary[0]['yysj'], 5, 2) . '">' . substr($ary[0]['yysj'], 5, 2) . '</option>';
                    }
                }
                // 计算机考试时间
                for ($i = 0; $i < count($year1); $i++) {
                    if (strpos($year1[$i], substr($ary[0]['jsjsj'], 0, 4))) {
                        $year1[$i] = '<option selected="true" value="' . substr($ary[0]['jsjsj'], 0, 4) . '">' . substr($ary[0]['jsjsj'], 0, 4) . '</option>';
                    }
                }
                for ($i = 0; $i < count($month1); $i++) {
                    if (strpos($month1[$i], substr($ary[0]['jsjsj'], 5, 2))) {
                        $month1[$i] = '<option selected="true" value="' . substr($ary[0]['jsjsj'], 5, 2) . '">' . substr($ary[0]['jsjsj'], 5, 2) . '</option>';
                    }
                }
                // 英语成绩
                for($i=0;$i<count($yycj);$i++){
                    if(strpos($yycj[$i],$ary[0]['yycj'])){
                        $yycj[$i]='<option selected="true" value="'.$ary[0]['yycj'].'">'.$ary[0]['yycj'].'</option>';
                    }
                }
                // 计算机成绩
                for($i=0;$i<count($jsjcj);$i++){
                    if(strpos($jsjcj[$i],$ary[0]['jsjcj'])){
                        $jsjcj[$i]='<option selected="true" value="'.$ary[0]['jsjcj'].'">'.$ary[0]['jsjcj'].'</option>';
                    }
                }
                // 英语免试原因
                for($i=0;$i<count($yyms);$i++){
                    if(strpos($yyms[$i],$ary[0]['yyms'])){
                        $yyms[$i]='<option selected="true" value="'.$ary[0]['yyms'].'">'.$ary[0]['yyms'].'</option>';
                    }
                }
                // 计算机免试原因
                for($i=0;$i<count($jsjms);$i++){
                    if(strpos($jsjms[$i],$ary[0]['jsjms'])){
                        $jsjms[$i]='<option selected="true" value="'.$ary[0]['jsjms'].'">'.$ary[0]['jsjms'].'</option>';
                    }
                }
            }
            $this->assign('yycj', $yycj);
            $this->assign('yyjb', $ksjb);
            $this->assign('year', $year);
            $this->assign('month', $month);
            $this->assign('year1', $year1);
            $this->assign('month1', $month1);
            $this->assign('month1', $month1);
            $this->assign('jsjjb', $ksjb1);
            $this->assign('jsjcj', $jsjcj);
            $this->assign('yyms', $yyms);
            $this->assign('jsjms', $jsjms);
            $this->display();
        } else {
            $this->error('请保存你所访问的页面的上一页信息后在访问');
        }
    }

    // 接收info9数据进行保存
    public function commit_info9()
    {
        if ($_SESSION['user_id']) {
            $ks = M('cp_ks');
            $qk = $ks->where('uid=' . $_SESSION['user_id'])->getField('ksqk');
            $st  = $this->control_audit_user();
            if ($qk == 2 || $st == 0) {
                $m = M('Ks');
                $data['kid'] = $_SESSION['user_id'];
                // $ary = $m->where($data)->getField('slx');
                $data['yylx'] = '职称英语考试';
                $data['jsjlx'] = '职称计算机考试';
                $data['yycj'] = $_POST['yycj'];
                $data['jsjcj'] = $_POST['jsjcj'];
                if ($_POST['yycj'] == '免试') {
                    $data['yyms'] = $_POST['yyms'];
                    $data['yyjb'] = $data['yysj'] = '';
                } else {
                    $data['yyms'] = '';
                    $data['yyjb'] = $_POST['yyjb'];
                    $this->check_time($_POST['yyy'], $_POST['yym'], 'yyks');
                    $data['yysj'] = $_POST['yyy'] . '.' . $_POST['yym'];
                }
                if ($_POST['jsjcj'] == '免试') {
                    $data['jsjms'] = $_POST['jsjms'];
                    $data['jsjjb'] = $data['jsjsj'] = '';
                } else {
                    $data['jsjms'] = '';
                    $data['jsjjb'] = $_POST['jsjjb'];
                    $this->check_time($_POST['jsjy'], $_POST['jsjm'], 'jsjks');
                    $data['jsjsj'] = $_POST['jsjy'] . '.' . $_POST['jsjm'];
                }
                $id = $m->where('kid=' . $_SESSION['user_id'])->getField('id');
                if ($id > 0) {
                    $data['id'] = $id;
                    $arr = $m->save($data);
                    if ($arr > 0) {
                        $this->success('修改成功', '__URL__/info9');
                    } else {
                        $this->error('修改失败', '__URL__/info9');
                    }
                } else {
                    $arr = $m->add($data);
                    if ($arr > 0) {
                        $this->success('保存成功', '__URL__/info9');
                    } else {
                        $this->error('保存失败');
                    }
                }
            } else if ($qk == null) {
                $this->error('对不起，正在审核，不能修改');
            } else {
                $this->error('对不起，不能修改');
            }

        } else {
            $this->error('对不起，你还没有登陆');
        }


    }

    /*//根据id删除相应的info9的信息
    public function delete_info9()
    {
        $checkId['id'] = $data['cid'] = $id = $_GET['id'];
        $checkId['kid'] = $data['uid'] = $_SESSION['user_id'];
        $this->check_userId($checkId, 'ks');
        $ks = M('cp_ks');
        $num = $ks->where($data)->getField('ksqk');
        $st = $this->control_audit_user();
        if ($num == 2 || $st == 0) {
            $m = M('Ks');
            $arr = $m->where('id=' . $id)->delete();
            if ($arr > 0) {
                $this->success('删除成功', '__URL__/info9');
            } else {
                $this->error('删除失败');
            }
        } else {
            $this->error('此信息已经通过或者未审核，不能删除');
        }
    }*/
    ///
    // 显示第10个页面
    public function info10()
    {
        $this->readconfig();
        $msg = M('Ks');
        $id = $_SESSION['user_id'];
        $result = $msg->where('kid=' . $id)->count();
        if ($result > 0) {
            $year = $this->data['year'];
            $month = $this->data['month'];
            $zzlb = $this->data['zzlb'];
            $cdbf = $this->data['cdbf'];
            $ywqk = $this->data['ywqk'];
            $iid = $_SESSION['user_id'];
            $m = M('Zzl');
            $arr = $m->where('zid=' . $iid)->select();
            if ($arr > 0) {
                $this->assign('list', $arr);
            }
            if ($_GET['id'] == null) {
                $this->assign('ywqk', $ywqk);
                $this->assign('year', $year);
                $this->assign('month', $month);
                $this->assign('lb', $zzlb);
                $this->assign('cdbf', $cdbf);
            } else {
                $checkId['id'] = $data['cid'] = $id = $_GET['id'];
                $checkId['zid'] = $data['uid'] = $_SESSION['user_id'];
                $this->check_userId($checkId, 'zzl');
                $md = M('cp_zzl');
                $num = $md->where($data)->getField('zzlqk');
                $st = $this->control_audit_user();
                if ($num == 2 || $st == 0) {
                    $ary = $m->where('id=' . $id)->select();
                    if ($ary > 0) {
						$cdbf_id = $this->qiTa($cdbf, $ary[0]['cdbf']);
					//	$ary[0]['cdbf'] = $cdbf_id[1];
					//	dump($ary[0]['cdbf']);
						$this->assign('qitacdbf', $cdbf_id[1]);
                        $this->assign('va', $ary);
                      
                        // 专著情况
                        for ($i = 0; $i < count($ywqk); $i++) {
                            if (strpos($ywqk[$i], $ary[0]['qk'])) {
                                $ywqk[$i] = '<option selected="true" value="' . $ary[0]['qk'] . '">' . $ary[0]['qk'] . '</option>';
                            }
                        }
                        // 出版时间
                        for ($i = 0; $i < count($year); $i++) {
                            if (strpos($year[$i], substr($ary[0]['cbsj'], 0, 4))) {
                                $year[$i] = '<option selected="true" value="' . substr($ary[0]['cbsj'], 0, 4) . '">' . substr($ary[0]['cbsj'], 0, 4) . '</option>';
                            }
                        }
                        for ($i = 0; $i < count($month); $i++) {
                            if (strpos($month[$i], substr($ary[0]['cbsj'], 5, 2))) {
                                $month[$i] = '<option selected="true" value="' . substr($ary[0]['cbsj'], 5, 2) . '">' . substr($ary[0]['cbsj'], 5, 2) . '</option>';
                            }
                        }
                        // 专著类别
                        for ($i = 0; $i < count($zzlb); $i++) {
                            if (strpos($zzlb[$i], $ary[0]['lb'])) {
                                $zzlb[$i] = '<option selected="true" value="' . $ary[0]['lb'] . '">' . $ary[0]['lb'] . '</option>';
                            }
                        }
                        // 本人承担部分
                       /*  for ($i = 0; $i < count($cdbf); $i++) {
                            if (strpos($cdbf[$i], $ary[0]['cdbf'])) {
                                $cdbf[$i] = '<option selected="true" value="' . $ary[0]['cdbf'] . '">' . $ary[0]['cdbf'] . '</option>';
                            }
                        } */
						if ($cdbf_id != null) {
							$cdbf = $cdbf_id[0];
						}
                    }
                    $this->assign('ywqk', $ywqk);
                    $this->assign('year', $year);
                    $this->assign('month', $month);
                    $this->assign('lb', $zzlb);
                    $this->assign('cdbf', $cdbf);
                } else {
                    $this->error('此信息已经通过或者未审核，不能修改');
                }
            }
            $user = M('cp_user');
            $zs = $user->where('uid=' . $_SESSION['user_id'])->getField('lwzzzs');
            $this->assign('contl', $zs);
            $this->display();
        } else {
            $this->error('请保存你所访问的页面的上一页信息后在访问');
        }
    }

    // 接收info10数据进行保存
    public function commit_info10()
    {
        if ($_POST['mc'] != null && $_POST['cbs'] != null && $_POST['sm'] != null &&
            $_POST['num'] !=null && is_numeric($_POST['num']) || $_POST['qk'] == '无'
        ) {
            $m = M('Zzl');
            $qkArr = $m->field('qk')->where('zid = '.$_SESSION['user_id'])->select();
            if ($_POST['qk'] == '无') {
                if ($qkArr) {
                    $this->error('对不起，不能在填写无了');
                    exit;
                } else {
                    $data['mc'] =$data['qk'] = $data['cbsj'] = $data['lb'] =
                    $data['cbs'] = $data['cdbf'] = $data['sm'] = $data['num'] = '无';
                }
            } else {
                $data['mc'] = $_POST['mc'];
                $this->check_time($_POST['cbsjy'], $_POST['cbsjm'], 'cbs');
                $data['cbsj'] = $_POST['cbsjy'] . '.' . $_POST['cbsjm'];
                $data['num'] = $_POST['num'];
                $data['lb'] = $_POST['slb'];
                $data['cbs'] = $_POST['cbs'];
                if($_POST['scdbf'] == '其他'){
					$data['cdbf'] = '其他:'.$_POST['qita'];
				}else{
					$data['cdbf'] = $_POST['scdbf'];
				}
                $data['sm'] = $_POST['sm'];
                $data['qk'] = '有';
            }
            for ($i = 0; $i < count($qkArr); $i++) {
                if ($qkArr[$i]['qk'] == '无') {
                    $this->error('对不起，不能填写无了 ，请先删除无在填写');
                    exit;
                }
            }
            $data['zid'] = $_SESSION['user_id'];
            if ($_POST['hidden'] == null) {
                $st = $this->control_audit_user();
                if ($st == 0) {
                    $ary = $m->add($data);
                    if ($ary > 0) {
                        $this->success('保存成功', '__URL__/info10');
                    } else {
                        $this->error('保存失败');
                    }
                } else {
                    $this->error('不能添加信息');
                }
            } else {
                $data['id'] = $_POST['hidden'];
                $ary = $m->save($data);
                if ($ary > 0) {
                    $this->success('修改成功', '__URL__/info10');
                } else {
                    $this->error('修改失败');
                }
            }
        } else {
            $this->error('非法操作');
        }
    }

    // 删除info10的数据
    public function delete_info10()
    {
        $checkId['id'] = $data['cid'] = $id = $_GET['id'];
        $checkId['zid'] = $data['uid'] = $_SESSION['user_id'];
        $this->check_userId($checkId, 'zzl');
        $md = M('cp_zzl');
        $num = $md->where($data)->getField('zzlqk');
        $st = $this->control_audit_user();
        if ($num == 2 || $st == 0) {
            $m = M('Zzl');
            $arr = $m->where('id=' . $id)->delete();
            if ($arr > 0) {
                $this->success('删除成功', '__URL__/info10');
            } else {
                $this->error('删除失败');
            }
        } else {
            $this->error('此信息已经通过或者未审核，不能删除');
        }
    }
    ///
    // 显示info11的信息
    public function info11()
    {
        $this->readconfig();
        $msg = M('Zzl');
        $id = $_SESSION['user_id'];
        $result = $msg->where('zid=' . $id)->count();
        if ($result > 0) {
            $year = $this->data['year'];
            $month = $this->data['month'];
            $zk = $this->data['zk'];
            $jb = $this->data['jb'];
            $pm = $this->data['xmpm'];
            $ywqk = $this->data['ywqk'];
            $fid = $_SESSION['user_id'];
            $m = M('Fblwl');
            $arr = $m->where('fid=' . $fid)->select();
            if ($arr > 0) {
                $this->assign('list', $arr);
            }
            if ($_GET['id'] == null) {
                $this->assign('ywqk', $ywqk);
                $this->assign('year', $year);
                $this->assign('month', $month);
                $this->assign('zk', $zk);
                $this->assign('jb', $jb);
                $this->assign('pm', $pm);
            } else {
                $checkId['id'] = $data['cid'] = $id = $_GET['id'];
                $checkId['fid'] = $data['uid'] = $_SESSION['user_id'];
                //  dump($checkId);
                //  exit;
                $this->check_userId($checkId, 'fblwl');
                $md = M('cp_fblw');
                $num = $md->where($data)->getField('fblwqk');
                $st = $this->control_audit_user();
                if ($st == 0 || $num == 2) {
                    $ary = $m->where('id=' . $id)->select();
                    if ($ary > 0) {
                        $lwpm = $this->qiTa($pm, $ary[0]['pm']);
                        $ary[0]['pm'] = $lwpm[1];
                        $this->assign('va', $ary);
                        // 论文有无情况
                        for ($i = 0; $i < count($ywqk); $i++) {
                            if (strpos($ywqk[$i], $ary[0]['qk'])) {
                                $ywqk[$i] = '<option selected="true" value="'.$ary[0]['qk'].'">'.$ary[0]['qk'].'</option>';
                            }
                        }
                        // 发表时间
                        for ($i = 0; $i < count($year); $i++) {
                            if (strpos($year[$i], substr($ary[0]['time'], 0, 4))) {
                                $year[$i] = '<option selected="true" value="' . substr($ary[0]['time'], 0, 4) . '">' . substr($ary[0]['time'], 0, 4) . '</option>';
                            }
                        }
                        for ($i = 0; $i < count($month); $i++) {
                            if (strpos($month[$i], substr($ary[0]['time'], 5, 2))) {
                                $month[$i] = '<option selected="true" value="' . substr($ary[0]['time'], 5, 2) . '">' . substr($ary[0]['time'], 5, 2) . '</option>';
                            }
                        }
                        // 是否增刊
                        for ($i = 0; $i < count($zk); $i++) {
                            if (strpos($zk[$i], $ary[0]['status'])) {
                                $zk[$i] = '<option selected="true" value="' . $ary[0]['status'] . '">' . $ary[0]['status'] . '</option>';
                            }
                        }
                        // 刊物级别
                        // dump($ary[0]['jb']);
                        foreach ($jb as $val) {
                            $jbAry = explode('>', $val);
                            $jbStr = substr($jbAry[1], 0, -8);
                            if ($jbStr == $ary[0]['jb']) {
                                $val = '<option selected="true" value="' . $ary[0]['jb'] . '">' . $ary[0]['jb'] . '</option>';
                                //dump($val);
                            }
                            $jbArr[] = $val;
                        }
                        /* for($i=0;$i<count($jb);$i++){
							if(strpos($jb[$i],$ary[0]['jb'])){
								$jb[$i]='<option selected="true" value="'.$ary[0]['jb'].'">'.$ary[0]['jb'].'</option>';
							}
						} */
                        // 排名
                    }
                    // dump($jbArr);
                    if ($lwpm != null) {
                        $pm = $lwpm[0];
                    }
                    $this->assign('ywqk', $ywqk);
                    $this->assign('yeara', $year);
                    $this->assign('montha', $month);
                    $this->assign('zka', $zk);
                    $this->assign('jba', $jbArr);
                    $this->assign('pma', $pm);
                } else {
                    $this->error('此信息已经通过或者未审核，不能修改');
                }
            }
            $this->display();
        } else {
            $this->error('请保存你所访问的页面的上一页信息后在访问');
        }
    }

    // 接收info11数据进行保存
    public function commit_info11()
    {
        if ($_POST['title'] != null && $_POST['slmc'] != null && $_POST['js'] != null || $_POST['qk'] == '无') {
            $m = M('Fblwl');
            $qkArr = $m->field('qk')->where('fid =  '.$_SESSION['user_id'])->select();
            if ($_POST['qk'] == '无') {
                if ($qkArr) {
                    $this->error('对不起，不能在填写无了');
                    exit;
                } else {
                    $data['title'] = $data['time'] = $data['qk'] = $data['status'] = $data['jb'] = $data['slmc'] =
                        $data['pm'] = $data['js'] = '无';
                }
            } else {
                $data['title'] = $_POST['title'];
                // $this->check_time($_POST['timey'], $_POST['timem'], 'fblw');
                $data['time'] = $_POST['timey'] . '.' . $_POST['timem'];
                $data['status'] = $_POST['status'];
                $data['jb'] = $_POST['sjb'];
                $data['slmc'] = $_POST['slmc'];
                if ($_POST['spm'] == '其他') {
                    if ($_POST['qita'] == null) {
                        $this->error('对不起，当选择其他时所填写不能为空');
                    } else {
                        $data['pm'] = $_POST['spm'].':'.$_POST['qita'];
                    }
                } else {
                    $data['pm'] = $_POST['spm'];
                }
                $data['js'] = $_POST['js'];
                $data['qk'] = '有';
            }
            for ($i = 0; $i < count($qkArr); $i++) {
                if ($qkArr[$i]['qk'] == '无') {
                    $this->error('对不起，不能在填写无了，请先删除无在填写');
                    exit;
                }
            }
            $data['fid'] = $_SESSION['user_id'];

            if ($_POST['hidden'] == null) {
                $st = $this->control_audit_user();
                if ($st == 0) {
                    $arr = $m->add($data);
                    if ($arr > 0) {
                        $this->success('保存成功', '__URL__/info11');
                    } else {
                        $this->error('保存失败');
                    }
                } else {
                    $this->error('不能添加信息');
                }
            } else {
                $data['id'] = $_POST['hidden'];
                $arr = $m->save($data);
                if ($arr > 0) {
                    $this->success('修改成功', '__URL__/info11');
                } else {
                    $this->error('修改失败');
                }
            }
        } else {
            $this->error('非法操作');
        }
    }

    // 根据id删除相应的info11的信息
    public function delete_info11()
    {
        $checkId['id'] = $data['cid'] = $id = $_GET['id'];
        $checkId['fid'] = $data['uid'] = $_SESSION['user_id'];
        $this->check_userId($checkId, 'fblwl');
        $md = M('cp_fblw');
        $num = $md->where($data)->getField('fblwqk');
        $st = $this->control_audit_user();
        if ($st == 0 || $num == 2) {
            $m = M('Fblwl');
            $arr = $m->where('id=' . $id)->delete();
            if ($arr > 0) {
                $this->success('删除成功', '__URL__/info11');
            } else {
                $this->error('删除失败');
            }
        } else {
            $this->error('此信息已经通过或者未审核，不能删除');
        }
    }
    ///
    // 显示info12的信息
    public function info12()
    {
        $this->readconfig();
        $msg = M('Fblwl');
        $id = $_SESSION['user_id'];
        $result = $msg->where('fid=' . $id)->count();
        if ($result > 0) {
            $year = $this->data['year'];
            $month1 = $month = $this->data['month'];
            $pm = $this->data['xmpm'];
            $jz = $this->data['jz'];
            $xmjb = $this->data['xmly'];
            // dump($xmly);
			$ywqk = $this->data['ywqk'];
           // dump($ywqk);
            $year1[121] = '<option value="至今">至今</option>';
            for ($i = count($year);$i > 0;$i--) {
                $year1[$i] = $year[$i];
            }
            $m = M('Kyxm');
            $kyid = $_SESSION['user_id'];
            $arr = $m->where('kyid=' . $kyid)->select();
            if ($arr > 0) {
                $this->assign('list', $arr);
            }
            if ($_GET['id'] == null) {
                $this->assign('xmjb', $xmjb);
                $this->assign('ywqk', $ywqk);
                $this->assign('year', $year);
                $this->assign('month', $month);
                $this->assign('year1', $year1);
                $this->assign('month1', $month1);
                $this->assign('pm', $pm);
                $this->assign('jz', $jz);
            } else {
                $checkId['id'] = $data['cid'] = $id = $_GET['id'];
                $checkId['kyid'] = $data['uid'] = $_SESSION['user_id'];
                $this->check_userId($checkId, 'kyxm');
                $md = M('cp_kyxm');
                $num = $md->where($data)->getField('kyxmqk');
                $st = $this->control_audit_user();
                if ($st == 0 || $num == 2) {
                    $ary = $m->where('id=' . $id)->select();
                    if ($ary > 0) {
                        $xmpm = $this->qiTa($pm, $ary[0]['pm']);
                        $ary[0]['pm'] = $xmpm[1];
                        $this->assign('va', $ary);
                        // 项目有无情况
                        for ($i = 0; $i < count($ywqk); $i++) {
                            if (strpos($ywqk[$i], $ary[0]['qk'])) {
                                $ywqk[$i] = '<option selected="true" value="'.$ary[0]['qk'].'">'.$ary[0]['qk'].'</option>';
                            }
                        }
                        // 项目级别
                        for ($i = 0; $i < count($xmjb); $i++) {
                            if (strpos($xmjb[$i], $ary[0]['xmjb'])) {
                                $xmjb[$i] = '<option selected="true" value="'.$ary[0]['xmjb'].'">'.$ary[0]['xmjb'].'</option>';
                            }
                        }
                        // 开始时间
                        for ($i = 0; $i < count($year); $i++) {
                            if (strpos($year[$i], substr($ary[0]['qzsj'], 0, 4))) {
                                $year[$i] = '<option selected="true" value="' . substr($ary[0]['qzsj'], 0, 4) . '">' . substr($ary[0]['qzsj'], 0, 4) . '</option>';
                            }
                        }
                        for ($i = 0; $i < count($month); $i++) {
                            if (strpos($month[$i], substr($ary[0]['qzsj'], 5, 2))) {
                                $month[$i] = '<option selected="true" value="' . substr($ary[0]['qzsj'], 5, 2) . '">' . substr($ary[0]['qzsj'], 5, 2) . '</option>';
                            }
                        }
                        // 结束时间
                        for ($i = 0; $i < count($year1); $i++) {
                            if (strpos($year1[$i], substr($ary[0]['qzsj'], 8, 4))) {
                                $year1[$i] = '<option selected="true" value="' . substr($ary[0]['qzsj'], 8, 4) . '">' . substr($ary[0]['qzsj'], 8, 4) . '</option>';
                            }
                        }
                        for ($i = 0; $i < count($month1); $i++) {
                            if (strpos($month1[$i], substr($ary[0]['qzsj'], 13, 2))) {
                                $month1[$i] = '<option selected="true" value="' . substr($ary[0]['qzsj'], 13, 2) . '">' . substr($ary[0]['qzsj'], 13, 2) . '</option>';
                            }
                        }
                        // 科研排名
                        for ($i = 0; $i < count($pm); $i++) {
                            if (strpos($pm[$i], $ary[0]['pm'])) {
                                $pm[$i] = '<option selected="true" value="' . $ary[0]['pm'] . '">' . $ary[0]['pm'] . '</option>';
                            }
                        }
                        // 结题或者在研
                        for ($i = 0; $i < count($jz); $i++) {
                            if (strpos($jz[$i], $ary[0]['wcqk'])) {
                                $jz[$i] = '<option selected="true" value="' . $ary[0]['wcqk'] . '">' . $ary[0]['wcqk'] . '</option>';
                            }
                        }
                    }
                    if ($xmpm != null) {
                        $pm = $xmpm[0];
                    }
                    // dump($xmpm);
                    $this->assign('xmjb', $xmjb);
                    $this->assign('ywqk', $ywqk);
                    $this->assign('yeara', $year);
                    $this->assign('montha', $month);
                    $this->assign('year1a', $year1);
                    $this->assign('month1a', $month1);
                    $this->assign('pma', $pm);
                    $this->assign('jza', $jz);
                } else {
                    $this->error('此信息已经通过或者未审核，不能修改');
                }
            }
            $this->display();
        } else {
            $this->error('请保存你所访问的页面的上一页信息后在访问');
        }
    }

    // 保存info12的页面的信息
    public function commit_info12()
    {
        if ($_POST['kyxm'] != null && $_POST['xmly'] != null && $_POST['cdrw'] != null &&
            $_POST['bh'] != null || $_POST['qk'] == '无') {
            $m = M('Kyxm');
            $qkArr = $m->field('qk')->where('kyid = '.$_SESSION['user_id'])->select();
            if ($_POST['qk'] == '无') {
                if (count($qkArr) > 0) {
                    $this->error('对不起，不能填写无了');
                    exit;
                } else {
                    $data['qzsj'] = $data['qk'] = $data['kyxm'] = $data['xmjb'] = $data['cdrw'] = $data['pm'] = $data['wcqk']= '无';
                }
            } else {
                if ($_POST['jssjy'] == '至今') {
                    $this->check_time($_POST['kssjy'], $_POST['kssjm'], 'ks');
                    $data['qzsj'] = $_POST['kssjy'] . '.' . $_POST['kssjm'] . '-' . $_POST['jssjy'];
                } else {
                    if ($_POST['jssjy'] > $_POST['kssjy']) {
                        $this->check_time($_POST['kssjy'], $_POST['kssjm'], 'ks');
                        // $this->check_time($_POST['jssjy'], $_POST['jssjm'], 'js');

                    } else if (($_POST['jssjy'] == $_POST['kssjy'] && $_POST['kssjm'] <= $_POST['jssjm'])) {
                        $this->check_time($_POST['kssjy'], $_POST['kssjm'], 'ks');
                        // $this->check_time($_POST['jssjy'], $_POST['jssjm'], 'js');
                    } else {
                        $this->error('开始时间不能比结束时间大');
                        exit;
                    }
                    $data['qzsj'] = $_POST['kssjy'] . '.' . $_POST['kssjm'] . '-' . $_POST['jssjy'] . '.' . $_POST['jssjm'];
                }
                $data['bh'] = $_POST['bh'];
                $data['kyxm'] = $_POST['kyxm'];
                $data['xmjb'] = $_POST['xmjb'];
                $data['xmly'] = $_POST['xmly'];
                $data['cdrw'] = $_POST['cdrw'];
                if ($_POST['spm'] == '其他') {
                    if ($_POST['qita'] == null) {
                        $this->error('对不起，当选择其他时所填写不能为空');
                    } else {
                        $data['pm'] = $_POST['spm'].':'.$_POST['qita'];
                    }
                } else {
                    $data['pm'] = $_POST['spm'];
                }
                $data['wcqk'] = $_POST['sjz'];
                $data['qk'] = '有';
            }
            for ($i = 0;$i < count($qkArr); $i++) {
                if ($qkArr[$i]['qk'] == '无') {
                    $this->error('对不起，不能填写无，请先删除无在填写');
                    exit;
                }
            }
            $data['kyid'] = $_SESSION['user_id'];

            if ($_POST['hidden'] == null) {
                $st = $this->control_audit_user();
                if ($st == 0) {
                    $arr = $m->add($data);
                    if ($arr > 0) {
                        $this->success('保存成功', '__URL__/info12');
                    } else {
                        $this->error('保存失败');
                    }
                } else {
                    $this->error('不能添加信息');
                }
            } else {
                $data['id'] = $_POST['hidden'];
                $arr = $m->save($data);
                if ($arr > 0) {
                    $this->success('修改成功','__URL__/info12');
                } else {
                    $this->error('修改失败');
                }
            }
        } else {
            $this->error('非法操作');
        }
    }

    // 根据id删除相应的info12的信息
    public function delete_info12()
    {
        $checkId['id'] = $data['cid'] = $id = $_GET['id'];
        $checkId['kyid'] = $data['uid'] = $_SESSION['user_id'];
        $this->check_userId($checkId, 'kyxm');
        $md = M('cp_kyxm');
        $num = $md->where($data)->getField('kyxmqk');
        $st = $this->control_audit_user();
        if ($st == 0 || $num == 2) {
            $m = M('Kyxm');
            $arr = $m->where('id=' . $id)->delete();
            if ($arr > 0) {
                $this->success('删除成功', '__URL__/info12');
            } else {
                $this->error('删除失败');
            }
        } else {
            $this->error('此信息已经通过或者未审核，不能删除');
        }
    }
    ///
    // 显示info13的信息
    public function info13()
    {
        $this->readconfig();
        $msg = M('Kyxm');
        $id = $_SESSION['user_id'];
        $result = $msg->where('kyid=' . $id)->count();
        if ($result > 0) {
            $lb = $this->data['jlb'];
            $year = $this->data['year'];
            $month = $this->data['month'];
            $pm = $this->data['xmpm'];
            $ywqk = $this->data['ywqk'];
            $m = M('Kyhj');
            $kjid = $_SESSION['user_id'];
            $arr = $m->where('kjid=' . $kjid)->select();
            if ($arr > 0) {
                $this->assign('list', $arr);
            }
            if ($_GET['id'] == null) {
                $this->assign('ywqk', $ywqk);
                $this->assign('lb', $lb);
                $this->assign('year', $year);
                $this->assign('month', $month);
                $this->assign('pm', $pm);
                // dump($lb);
            } else {
                $checkId['id'] = $data['cid'] = $id = $_GET['id'];
                $checkId['kjid'] = $data['uid'] = $_SESSION['user_id'];
                $this->check_userId($checkId, 'kyhj');
                $kyhj = M('cp_kyhj');
                $num = $kyhj->where($data)->getField('kyhjqk');
                $st = $this->control_audit_user();
                if ($num == 2 || $st == 0) {
                    $ary = $m->where('id=' . $id)->select();
                    if ($ary > 0) {
                        $hjpm = $this->qiTa($pm, $ary[0]['pm']);
                        $ary[0]['pm'] = $hjpm[1];
                        $this->assign('va', $ary);
                       /* // 科研获奖有无情况
                        for ($i = 0; $i < count($ywqk); $i++) {
                            if (strpos($ywqk[$i], $ary[0]['qk'])) {
                                $ywqk[$i] = '<option selected="true" value="' . $ary[0]['qk'] . '">' . $ary[0]['qk'] . '</option>';
                            }
                        }*/
                        // 获奖类别
                        for ($i = 0; $i < count($lb); $i++) {
                            if (strpos($lb[$i], $ary[0]['lb'])) {
                                $lb[$i] = '<option selected="true" value="' . $ary[0]['lb'] . '">' . $ary[0]['lb'] . '</option>';
                            }
                        }
                        // 获奖时间
                        for ($i = 0; $i < count($year); $i++) {
                            if (strpos($year[$i], substr($ary[0]['sj'], 0, 4))) {
                                $year[$i] = '<option selected="true" value="' . substr($ary[0]['sj'], 0, 4) . '">' . substr($ary[0]['sj'], 0, 4) . '</option>';
                            }
                        }
                        for ($i = 0; $i < count($month); $i++) {
                            if (strpos($month[$i], substr($ary[0]['sj'], 5, 2))) {
                                $month[$i] = '<option selected="true" value="' . substr($ary[0]['sj'], 5, 2) . '">' . substr($ary[0]['sj'], 5, 2) . '</option>';
                            }
                        }
                        // 获奖排名
                        for ($i = 0; $i < count($pm); $i++) {
                            if (strpos($pm[$i], $ary[0]['pm'])) {
                                $pm[$i] = '<option selected="true" value="' . $ary[0]['pm'] . '">' . $ary[0]['pm'] . '</option>';
                            }
                        }
                    }
                    if ($hjpm != null) {
                        $pm = $hjpm[0];
                    }
                    $this->assign('ywqk', $ywqk);
                    $this->assign('lba', $lb);
                    $this->assign('yeara', $year);
                    $this->assign('montha', $month);
                    $this->assign('pma', $pm);
                } else {
                    $this->error('此信息已经通过或者未审核，不能修改');
                }
            }
            $this->display();
        } else {
            $this->error('请保存你所访问的页面的上一页信息后在访问');
        }
    }

    // 保存info13的页面的信息
    public function commit_info13()
    {
        if ($_POST['mc'] != null && $_POST['dw'] != null && $_POST['jb'] != null && $_POST['cg'] != null || $_POST['qk'] == '无') {
            $m = M('Kyhj');
            $qkArr = $m->field('qk')->where('kjid = '.$_SESSION['user_id'])->select();
            if ($_POST['qk'] == '无') {
                if ($qkArr) {
                    $this->error('对不起，不能在填写无了');
                    exit;
                } else {
                    $data['lb'] = $data['qk'] = $data['sj'] = $data['mc'] = $data['dw'] =
                    $data['jb'] = $data['pm'] = $data['cg'] = '无';
                }
            } else {
                $_data['lb'] = $_POST['slb'];
                $this->check_time($_POST['sjy'], $_POST['sjm'], 'hj');
                $data['sj'] = $_POST['sjy'] . '.' . $_POST['sjm'];
                $data['cg'] = $_POST['cg'];
                $data['mc'] = $_POST['mc'];
                $data['dw'] = $_POST['dw'];
                $data['jb'] = $_POST['jb'];
                if ($_POST['spm'] == '其他') {
                    if ($_POST['qita'] == null) {
                        $this->error('对不起，当选择其他时所填写不能为空');
                    } else {
                        $data['pm'] = $_POST['spm'].':'.$_POST['qita'];
                    }
                } else {
                    $data['pm'] = $_POST['spm'];
                }
                $data['qk'] = '有';
            }
            for ($i = 0;$i < count($qkArr); $i++) {
                if ($qkArr[$i]['qk'] == '无') {
                    $this->error('对不起，不能在添加无了，请删除无后在添加');
                    exit;
                }
            }
            $data['kjid'] = $_SESSION['user_id'];

            if ($_POST['hidden'] == null) {
                $st = $this->control_audit_user();
                if ($st == 0) {
                    $arr = $m->add($data);
                    if ($arr > 0) {
                        $this->success('保存成功', '__URL__/info13');
                    } else {
                        $this->error('保存失败');
                    }
                } else {
                    $this->error('不能添加信息');
                }
            } else {
                $data['id'] = $_POST['hidden'];
                $arr = $m->save($data);
                if ($arr > 0) {
                    $this->success('修改成功', '__URL__/info13');
                } else {
                    $this->error('修改失败');
                }
            }
        } else {
            $this->error('非法操作');
        }
    }

    // 根据id删除相应的info13的信息
    public function delete_info13()
    {
        $checkId['id'] = $data['cid'] = $id = $_GET['id'];
        $checkId['kjid'] = $data['uid'] = $_SESSION['user_id'];
        $this->check_userId($checkId, 'kyhj');
        $kyhj = M('cp_kyhj');
        $num = $kyhj->where($data)->getField('kyhjqk');
        $st = $this->control_audit_user();
        if ($num == 2 || $st == 0) {
            $m = M('Kyhj');
            $arr = $m->where('id=' . $id)->delete();
            if ($arr > 0) {
                $this->success('删除成功', '__URL__/info13');
            } else {
                $this->error('删除失败');
            }
        } else {
            $this->error('此信息已经通过或者未审核，不能删除');
        }
    }
    ///
    // 显示info14的信息
    public function info14()
    {
        $this->readconfig();
        $msg = M('Kyhj');
        $id = $_SESSION['user_id'];
        $result = $msg->where('kjid=' . $id)->count();
        if ($result > 0) {
            $year = $this->data['year'];
            $month = $this->data['month'];
            $lx = $this->data['zllx'];
            // $sq = $this->data['zk'];
            $ywqk = $this->data['ywqk'];
            // $info = M('Info');
            $iid = $_SESSION['user_id'];
            $m = M('Fmzl');
            $arr = $m->where('fmid=' . $iid)->select();
            if ($arr > 0) {
                $this->assign('list', $arr);
            }
            if ($_GET['id'] == null) {
                $this->assign('ywqk', $ywqk);
                $this->assign('year', $year);
                $this->assign('month', $month);
                $this->assign('lx', $lx);
                // $this->assign('sq', $sq);
            } else {
                $checkId['id'] = $data['cid'] = $id = $_GET['id'];
                $checkId['fmid'] = $data['uid'] = $_SESSION['user_id'];
                $this->check_userId($checkId, 'fmzl');
                $fmzl = M('cp_fmzl');
                $num = $fmzl->where($data)->getField('fmzlqk');
                $st = $this->control_audit_user();
                if ($num == 2 || $st == 0) {
                    $ary = $m->where('id=' . $id)->select();
                    if ($ary > 0) {
                        $this->assign('va', $ary);
                        // 专利有无情况
                        for ($i = 0; $i < count($ywqk); $i++) {
                            if (strpos($ywqk[$i], $ary[0]['qk'])) {
                                $ywqk[$i] = '<option selected="true" value="' . $ary[0]['qk'] . '">' . $ary[0]['qk'] . '</option>';
                            }
                        }
                        // 专利通过时间
                        for ($i = 0; $i < count($year); $i++) {
                            if (strpos($year[$i], substr($ary[0]['tgsj'], 0, 4))) {
                                $year[$i] = '<option selected="true" value="' . substr($ary[0]['tgsj'], 0, 4) . '">' . substr($ary[0]['tgsj'], 0, 4) . '</option>';
                            }
                        }
                        for ($i = 0; $i < count($month); $i++) {
                            if (strpos($month[$i], substr($ary[0]['tgsj'], 5, 2))) {
                                $month[$i] = '<option selected="true" value="' . substr($ary[0]['tgsj'], 5, 2) . '">' . substr($ary[0]['tgsj'], 5, 2) . '</option>';
                            }
                        }
                        // 专利类型
                        for ($i = 0; $i < count($lx); $i++) {
                            if (strpos($lx[$i], $ary[0]['lx'])) {
                                $lx[$i] = '<option selected="true" value="' . $ary[0]['lx'] . '">' . $ary[0]['lx'] . '</option>';
                            }
                        }
                        /*// 是否授权
                        for ($i = 0; $i < count($sq); $i++) {
                            if (strpos($sq[$i], $ary[0]['sq'])) {
                                $sq[$i] = '<option selected="true" value="' . $ary[0]['sq'] . '">' . $ary[0]['sq'] . '</option>';
                            }
                        }*/
                    }
                    $this->assign('ywqk', $ywqk);
                    $this->assign('yeara', $year);
                    $this->assign('montha', $month);
                    $this->assign('lxa', $lx);
                    // $this->assign('sqa', $sq);
                } else {
                    $this->error('此信息已经通过或者未审核，不能修改');
                }
            }
            $user = M('cp_user');
            $zs = $user->where('uid=' . $_SESSION['user_id'])->getField('kyhjzs');
            $this->assign('contl', $zs);
            $this->display();
        } else {
            $this->error('请保存你所访问的页面的上一页信息后在访问');
        }
    }

    // 保存info14的页面的信息
    public function commit_info14()
    {
        if ($_POST['mc'] != null && $_POST['zlh'] != null || $_POST['qk'] == '无') {
            $m = M('Fmzl');
            $qkArr = $m->field('qk')->where('fmid = '.$_SESSION['user_id'])->select();
            if ($_POST['qk'] == '无') {
                if ($qkArr) {
                    $this->error('对不起，不能在填写无了');
                    exit;
                } else {
                    $data['qk'] = $data['tgsj'] = $data['mc'] = $data['lx'] =
                    $data['sq'] = $data['zlh'] = '无';
                }
            } else {
                $this->check_time($_POST['tgsjy'], $_POST['tgsjm'], 'zltg');
                $data['tgsj'] = $_POST['tgsjy'] . '.' . $_POST['tgsjm'];
                $data['mc'] = $_POST['mc'];
                $data['lx'] = $_POST['slx'];
                // $data['sq'] = $_POST['ssq'];
                $data['zlh'] = $_POST['zlh'];
                $data['qk'] = '有';
            }
            for ($i = 0;$i < count($qkArr); $i++) {
                if ($qkArr[$i]['qk'] == '无') {
                    $this->error('对不起，不能填写无了，请删除无后在填写');
                    exit;
                }
            }
            $data['fmid'] = $_SESSION['user_id'];
            if ($_POST['hidden'] == null) {
                $st = $this->control_audit_user();
                if ($st == 0) {
                    $ary = $m->add($data);
                    if ($ary > 0) {
                        $this->success('保存成功', '__URL__/info14');
                    } else {
                        $this->error('保存失败');
                    }
                } else {
                    $this->error('不能添加信息');
                }
            } else {
                $data['id'] = $_POST['hidden'];
                $ary = $m->save($data);
                if ($ary > 0 || $arr > 0) {
                    $this->success('修改成功', '__URL__/info14');
                } else {
                    $this->error('修改失败');
                }
            }
        } else {
            $this->error('非法操作');
        }
    }

    // 根据id删除相应的info14的信息
    public function delete_info14()
    {
        $checkId['id'] = $data['cid'] = $id = $_GET['id'];
        $checkId['fmid'] = $data['uid'] = $_SESSION['user_id'];
        $this->check_userId($checkId, 'fmzl');
        $fmzl = M('cp_fmzl');
        $num = $fmzl->where($data)->getField('fmzlqk');
        $st = $this->control_audit_user();
        if ($num == 2 || $st == 0) {
            $m = M('Fmzl');
            $arr = $m->where('id=' . $id)->delete();
            if ($arr > 0) {
                $this->success('删除成功', '__URL__/info14');
            } else {
                $this->error('删除失败');
            }
        } else {
            $this->error('此信息已经通过或者未审核，不能删除');
        }
    }

    // 显示info15页面的信息
    public function info15()
    {
        $this->readconfig();
        $fmzl = M('Fmzl');
        $arry = $fmzl->where('fmid=' . $_SESSION['user_id'])->select();
        if ($arry > 0) {
            $year = $this->data['year'];
            $month = $this->data['month'];
            $jclb = $this->data['jclb'];
            $cdbf = $this->data['cdbf'];
            $ywqk = $this->data['ywqk'];
            $iid = $_SESSION['user_id'];
            $m = M('jc');
            $arr = $m->where('uid=' . $iid)->select();
            if ($arr > 0) {
                $this->assign('list', $arr);
            }
            if ($_GET['id'] == null) {
                $this->assign('ywqk', $ywqk);
                $this->assign('year', $year);
                $this->assign('month', $month);
                $this->assign('lb', $jclb);
                $this->assign('cdbf', $cdbf);
            } else {
                $checkId['id'] = $data['cid'] = $id = $_GET['id'];
                $checkId['uid'] = $data['uid'] = $_SESSION['user_id'];
                $this->check_userId($checkId, 'jc');
                $md = M('cp_jc');
                $num = $md->where($data)->getField('jcqk');
                $st = $this->control_audit_user();
                if ($num == 2 || $st == 0) {
                    $ary = $m->where('id=' . $id)->select();
                    if ($ary > 0) {
						$cdbf_id = $this->qiTa($cdbf, $ary[0]['cdbf']);
					//	$ary[0]['cdbf'] = $cdbf_id[1];
					//	dump($ary[0]['cdbf']);
						$this->assign('qitacdbf', $cdbf_id[1]);
                        $this->assign('va', $ary);
                        // 教材有无情况
                        for ($i = 0; $i < count($ywqk); $i++) {
                            if (strpos($ywqk[$i], $ary[0]['qk'])) {
                                $ywqk[$i] = '<option selected="true" value="' . $ary[0]['qk'] . '">' . $ary[0]['qk'] . '</option>';
                            }
                        }
                        // 出版时间
                        for ($i = 0; $i < count($year); $i++) {
                            if (strpos($year[$i], substr($ary[0]['cbsj'], 0, 4))) {
                                $year[$i] = '<option selected="true" value="' . substr($ary[0]['cbsj'], 0, 4) . '">' . substr($ary[0]['cbsj'], 0, 4) . '</option>';
                            }
                        }
                        for ($i = 0; $i < count($month); $i++) {
                            if (strpos($month[$i], substr($ary[0]['cbsj'], 5, 2))) {
                                $month[$i] = '<option selected="true" value="' . substr($ary[0]['cbsj'], 5, 2) . '">' . substr($ary[0]['cbsj'], 5, 2) . '</option>';
                            }
                        }
                        // 教材类别
                        for ($i = 0; $i < count($jclb); $i++) {
                            if (strpos($jclb[$i], $ary[0]['lb'])) {
                                $jclb[$i] = '<option selected="true" value="' . $ary[0]['lb'] . '">' . $ary[0]['lb'] . '</option>';
                            }
                        }
                      /*   // 本人承担部分
                        for ($i = 0; $i < count($cdbf); $i++) {
                            if (strpos($cdbf[$i], $ary[0]['cdbf'])) {
                                $cdbf[$i] = '<option selected="true" value="' . $ary[0]['cdbf'] . '">' . $ary[0]['cdbf'] . '</option>';
                            }
                        } */
						if ($cdbf_id != null) {
							$cdbf = $cdbf_id[0];
						}
                    }
                    $this->assign('ywqk', $ywqk);
                    $this->assign('year', $year);
                    $this->assign('month', $month);
                    $this->assign('lb', $jclb);
                    $this->assign('cdbf', $cdbf);
                } else {
                    $this->error('此信息已经通过或者未审核，不能修改');
                }
            }
            $user = M('cp_user');
            $zs = $user->where('uid=' . $_SESSION['user_id'])->getField('lwzzzs');
            $this->assign('contl', $zs);
            $this->display();
        } else {
            $this->error('请保存你所访问的页面的上一页信息后在访问');
        }

    }

    // 保存info15页面的信息
    public function commitInfo15()
    {
        if ($_POST['mc'] != null && $_POST['cbs'] != null && $_POST['qksm'] != null &&
            $_POST['num'] !=null && is_numeric($_POST['num']) || $_POST['qk'] == '无'
        ) {
            $m = M('jc');
            $qkArr = $m->field('qk')->where('uid = '.$_SESSION['user_id'])->select();
            if ($_POST['qk'] == '无') {
                if ($qkArr) {
                    $this->error('对不起，不能在填写无了');
                    exit;
                } else {
                    $data['mc'] =$data['qk'] = $data['cbsj'] = $data['lb'] =
                    $data['cbs'] = $data['cdbf'] = $data['qksm'] = $data['num'] = '无';
                }
            } else {
				$data['mc'] = $_POST['mc'];
				$this->check_time($_POST['cbsjy'], $_POST['cbsjm'], 'cbs');
				$data['cbsj'] = $_POST['cbsjy'] . '.' . $_POST['cbsjm'];
				$data['num'] = $_POST['num'];
				$data['lb'] = $_POST['lb'];
				$data['cbs'] = $_POST['cbs'];
               if($_POST['cdbf'] == '其他'){
					$data['cdbf'] = '其他:'.$_POST['qita'];
			   }else{
					$data['cdbf'] = $_POST['cdbf'];
			   }
                $data['qksm'] = $_POST['qksm'];
                $data['qk'] = '有';
            }
            for ($i = 0; $i < count($qkArr); $i++) {
                if ($qkArr[$i]['qk'] == '无') {
                    $this->error('对不起，不能填写无了 ，请先删除无在填写');
                    exit;
                }
            }
            $data['uid'] = $_SESSION['user_id'];
            if ($_POST['hidden'] == null) {
                $st = $this->control_audit_user();
                if ($st == 0) {
                    $ary = $m->add($data);
                    if ($ary > 0) {
                        $this->success('保存成功', '__URL__/info15');
                    } else {
                        $this->error('保存失败');
                    }
                } else {
                    $this->error('不能添加信息');
                }
            } else {
                $data['id'] = $_POST['hidden'];
                $ary = $m->save($data);
                if ($ary > 0) {
                    $this->success('修改成功', '__URL__/info15');
                } else {
                    $this->error('修改失败');
                }
            }
        } else {
            $this->error('非法操作');
        }
    }

    // 删除info15页面的信息
    public function deleteInfo15()
    {
        $checkId['id'] = $data['cid'] = $id = $_GET['id'];
        $checkId['uid'] = $data['uid'] = $_SESSION['user_id'];
        $this->check_userId($checkId, 'jc');
        $jc = M('cp_jc');
        $num = $jc->where($data)->getField('jcqk');
        $st = $this->control_audit_user();
        if ($num == 2 || $st == 0) {
            $m = M('jc');
            $arr = $m->where('id=' . $id)->delete();
            if ($arr > 0) {
                $this->success('删除成功', '__URL__/info15');
            } else {
                $this->error('删除失败');
            }
        } else {
            $this->error('此信息已经通过或者未审核，不能删除');
        }
    }
    // 显示info16页面信息
    public function info16()
    {
        $this->readconfig();
        $jc = M('jc');
        $arr = $jc->where('uid=' . $_SESSION['user_id'])->select();
        if ($arr > 0) {
            $info = M('Info');
            $ary = $info->where('iid=' . $_SESSION['user_id'])->find();
            $this->assign('list', $ary);
            $user = M('cp_user');
            $userArr = $user->where('uid=' . $_SESSION['user_id'])->find();
            $this->assign('contl', $userArr);
            $this->display();
        } else {
            $this->error('请保存你所访问的页面的上一页信息后在访问');
        }
    }

    // 存储info16页面信息内容
    public function commit_info16()
    {
        if ($_POST['grzj'] != null && $_POST['rwgs'] != null && $_POST['hjzs'] != null && $_POST['gggz'] != null &&
            $_POST['zdyjs'] != null && $_POST['zdjstg'] != null && $_POST['sysgx'] != null && $_POST['wycd'] != null &&
            $_POST['jsjsp'] != null && $_POST['zpzs'] != null && $_POST['xmzs'] != null
        ) {
            $st = $this->control_audit_user();
            $wt = $this->selectAudit(user);
            $user = M('cp_user');
            $ary = $user->where('uid=' . $_SESSION['user_id'])->find();
            $info = M('Info');
            $iid = $_SESSION['user_id'];
            $data['id'] = $info->where('iid=' . $iid)->getField('id');
            if ($st == 0) {
                $data['brzj'] = $_POST['grzj'];
                $data['sj'] = date('Y-m-d');
                $data['rwgs'] = $_POST['rwgs'];
                $data['hjzs'] = $_POST['hjzs'];
                $data['gggz'] = $_POST['gggz'];
                $data['zdyjs'] = $_POST['zdyjs'];
                $data['zdjstg'] = $_POST['zdjstg'];
                $data['sysgx'] = $_POST['sysgx'];
                $data['wycd'] = $_POST['wycd'];
                $data['jsjsp'] = $_POST['jsjsp'];
                $data['zpzs'] = $_POST['zpzs'];
                $data['xmzs'] = $_POST['xmzs'];
                // $m = M('User');
                // $data1['id'] = $_SESSION['user_id'];
            /*     $data1['status'] = AUDIT_FIRST; */
                
            } else if ($wt == 0 || $st == 1) {
                $this->error('对不起，此时你不能修改');
            } else {
                foreach ($ary as $ky => $val) {
                    switch ($ky) {
                        case 'grzj':
                            if ($val == 2) {
                                $data['brzj'] = $_POST['grzj'];
                                $data['sj'] = date('Y-m-d');
                            }
                            break;
                        case 'jxrwzs':
                            if ($val == 2) {
                                $data['rwgs'] = $_POST['rwgs'];
                            }
                            break;
                        case 'hjzs':
                            if ($val == 2) {
                                $data['hjzs'] = $_POST['hjzs'];
                            }
                            break;
                        case 'jxggzs':
                            if ($val == 2) {
                                $data['gggz'] = $_POST['gggz'];
                            }
                            break;
                        case 'zdyjs':
                            if ($val == 2) {
                                $data['zdyjs'] = $_POST['zdyjs'];
                            }
                            break;
                        case 'zdjstg':
                            if ($val == 2) {
                                $data['zdjstg'] = $_POST['zdjstg'];
                            }
                            break;
                        case 'sysgx':
                            if ($val == 2) {
                                $data['sysgx'] = $_POST['sysgx'];
                            }
                            break;
                        case 'wycd':
                            if ($val == 2) {
                                $data['wycd'] = $_POST['wycd'];
                            }
                            break;
                        case 'jsjsp':
                            if ($val == 2) {
                                $data['jsjsp'] = $_POST['jsjsp'];
                            }
                            break;
                        case 'lwzzzs':
                            if ($val == 2) {
                                $data['zpzs'] = $_POST['zpzs'];
                            }
                            break;
                        case 'kyhjzs':
                            if ($val == 2) {
                                $data['xmzs'] = $_POST['xmzs'];
                            }
                            break;
                    }
                }
            }
            $ary = $info->save($data);
            if ($ary > 0) {
                $this->success('保存成功', '__APP__/Info/info16');
            } else {
                $this->error('保存失败');
            }
        } else {
            $this->error('非法操作');
        }
    }

    // 删除info16页面信息
    public function delete_info16()
    {
        $st = $this->control_audit_user();
        if ($st == 0) {
            $data['id'] = $_GET['id'];
            $data['brzj'] = "";
            $data['sj'] = "";
            $data['rwgs'] = "";
            $data['gggz'] = "";
            $data['hjzs'] = "";
            $data['zdyjs'] = "";
            $data['zdjstg'] = "";
            $data['sysgx'] = "";
            $data['wycd'] = "";
            $data['jsjsp'] = "";
            $data['zpzs'] = "";
            $data['xmzs'] = "";
            $info = M('Info');
            $arr = $info->save($data);
            if ($arr > 0) {
                $this->success('删除成功', '__URL__/info16');
            } else {
                $this->error('删除失败');
            }
        } else {
            $this->error('亲，你已经开始被审核，不能执行此操作');
        }
    }
    // 点击完成后进行提交信息进行审核
    /* public function commit_audit(){
		$m=M('Info');
		$arr=$m->where('iid='.$_SESSION['user_id'])->getField('wycd');
		if($arr){
			$user=M('User');
			$st=$this->control_audit_user();
			if($st==0){
				$data['id']=$_SESSION['user_id'];
				$data['status']=AUDIT_FIRST;
				$ary=$user->save($data);
				if($ary>0){
					$this->success('你的信息已进入审核阶段','__APP__/System/index');
				}else{
					$this->error('你已经进入审核了');
				}
			}else{
				$this->error('你已经进入审核了');
			}
		}else{
			$this->error('请将最后一个页面信息填写并保存');
		}
	} */
    // 显示选择信息的页面
    public function check()
    {
        $user = M('User');
        $i = 0;
        $data["id"] = $_SESSION['user_id'];
        $info = $user->where($data)->select();


        $this->assign('info', $info);
        $this->display();
    }
	
	//切换状态进行审核
	public function change_to_audit(){
		$data['id'] = $_SESSION['user_id'];
        $st = $this->control_audit_user();
        if ($st == 0) {
            $option['status'] = AUDIT_FIRST;
            $user = M('User');
            $info = $user->where($data)->save($option);
            if($info > 0){
                $this->success('成功提交，进入审核阶段','__APP__/System/index');
            }else{
                $this->success('你已经提交成功','__APP__/System/index');
            }
        } else {
            $this->error('对不起，你已经提交信息了');
        }


	}
}
