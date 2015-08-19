<?php

class SystemAction extends CommonAction
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 检测修改密码
     */
    public function checkpasschange()
    {
        $this->check_user_request('all');
		$data['id'] = $_SESSION['user_id'];
        $user = M('User');
        $info = $user->where($data)->select();
        $this->assign('info', $info);
        if ($info['0']['password'] == '123456') {
            $this->error('请修改初始密码', '__URL__/changepass');
        }
    }
	
	/**
	 * 对用户进行操作
	 */
	/*public function changchmod(){
		$this->check_user_request('add');
		$this->checkpasschange();
        $user = M('User');
		$data['id'] = $_SESSION['user_id'];
		$info = $user->where($data)->select();
		if($info['0']['qx'] == 'admin'){
			$may['qx'] = '管理员';
		}else if($info['0']['qx'] == '管理员'){
			$may['qx'] = '普通用户';
			$may['bm'] = $info['0']['bm'];
		}else{
			$this->error('非法操作','__APP__/Index/index');
		}
        import('ORG.Util.Page'); // 导入分页类
        $str = 'admin';
       
        $count = $user->where($may)->count(); // 查询满足要求的总记录数
        $Page = new Page($count, 5); // 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show(); // 分页显示输出
        $info = $user->where($may)->limit($Page->firstRow . ',' . $Page->listRows)->select();
        $this->assign('info', $info);
        $this->assign('page', $show);
        $this->assign('range', $str);
        $this->display();
	}*/
	public function changchmod_by_id(){
		$this->check_user_request('add');
		$this->checkpasschange();
		$data['id'] = $_GET['id'];
		$option = $_GET['option'];
		$user = M('User');
		$info = $user->where($data)->select();
		if($option == 'delete'){
			$user->where($data)->delete();
			$this->success('删除成功','__URL__/select_user');
		}else if($option == 'changemod'){
			if($info['0']['qx'] == '三审管理员'){
				$qx['qx'] = '普通用户';
				$user->where($data)->save($qx);
			}
			if($info['0']['qx'] == '普通用户'){
				$qx['qx'] = '三审管理员';
				$user->where($data)->save($qx);
				dump($qx);
			}
			$this->success('修改成功','__URL__/select_user');
		}else{
		//	$this->error('操作失败','__URL__/select_user');
		}
	//	dump($data['id']);
	}
    /**
     * 显示填写示例
     */
    public function example(){
		$this->check_user_request('普通用户');
		$this->checkpasschange();
        $this->display('example_sb');
    }
	
	/**
     * 显示填写示例:申报表
     */
    public function example_sb(){
        $this->check_user_request('普通用户');
		$this->checkpasschange();
		$this->display();
    }

    /**
     * 查询并相应的审核未通过原因
     */
    public function select_unaudit_reason($option){
        $this->check_user_request('普通用户');
        $user = M('User');
        $data['id'] = $_SESSION['user_id'];
        $username = $user->where($data)->getField('username');
        $path = './Public/Js/result/reasondata'.$username.$option.'.js';
        $reason_temp = $user->where($data)->getField($option);
        $reason_temp_array = explode('#',$reason_temp);

        for( $i = 0 ; $i < count($reason_temp_array) ; $i++ ) {
            if( trim($reason_temp_array["$i"]) != '' ) {
                $reason_array[] = trim($reason_temp_array["$i"]);
            }
        }
        //	dump($reason_array);
        for( $i = 0 ; $i < count($reason_array) ; $i++ ) {
            $temp_before[] = explode('*',$reason_array["$i"]);
            if($temp_before["$i"]['0'] == 'xw' || $temp_before["$i"]['0'] == 'xl' || $temp_before["$i"]['0'] == 'zzl' || $temp_before["$i"]['0'] == 'xzwcgz' || $temp_before["$i"]['0'] == 'kyxm' || $temp_before["$i"]['0'] == 'kyhj' || $temp_before["$i"]['0'] == 'fmzl' || $temp_before["$i"]['0'] == 'jc' || $temp_before["$i"]['0'] == 'jf' || $temp_before["$i"]['0'] == 'jgxm' || $temp_before["$i"]['0'] == 'gnwjx' ||$temp_before["$i"]['0'] == 'fblwl' || $temp_before["$i"]['0'] == 'ks'){
                $mu_temp[] = $temp_before["$i"];
            }else{
                $temp[] = $temp_before["$i"];
            }
        }
        $reason = '';
        for($i = 0 ;$i < count($temp) ; $i++){
            if($i == 0){
                $reason_list = $temp["$i"]['0'].$temp["$i"]['1'].$temp["$i"]['2'].':"'.$temp["$i"]['3'].'"';
            }else{
                $reason_list = $reason_list.','.$temp["$i"]['0'].$temp["$i"]['1'].$temp["$i"]['2'].':"'.$temp["$i"]['3'].'"';
            }
        }
        for($i = 0 ;$i < count($mu_temp) ; $i++){
            $mu_reason_list = $mu_reason_list.','.$mu_temp["$i"]['0'].$mu_temp["$i"]['1'].':"'.$mu_temp["$i"]['3'].'"';
        }
        $reason = "<script> reason = {".$reason_list.$mu_reason_list."} </script>";
        $this->assign('reason',$reason);
    }

    /**
     * 查看审核结果
     */
    public function audit_result(){
        $this->check_user_request('普通用户');
        $this->checkpasschange();
        $this->readconfig();
        $this->select_unaudit_reason('yy');
        $user = M('User');
        $data['id'] = $_SESSION['user_id'];
        $info = $user->where($data)->select();
        if($info['0']['status'] == '0'){
            $this->error('还未提交审核，无法查看。');
        }else{
            $this->view_auditing($_SESSION['user_id']);
            $this->assign('userid',$data['id']);
            $info = M('Info');
            $infoid = $info->where(' iid = '.$data['id'])->getField('id');
            $this->assign('infoid',$infoid);
            $this->display();
        }
    }

    /**
     * 修改用户状态
     */
    public function chmod_user()
    {
        $this->check_user_request('管理员');
		$this->checkpasschange();
		$data['id'] = $_SESSION['user_id'];
        $user = M('User');
        $info = $user->where($data)->select();
        $option['bm'] = $info['0']['bm'];
        $option['bryy'] = 'no';
        $deal_user = $user->where($option)->select();
        $this->assign('deal_user',$deal_user);
        $this->display();
    }

    /**
     * 重置用户填写
     */
    public function init_user(){
		$this->check_user_request('管理员');
		$this->checkpasschange();
        $data['id'] = $_GET['id'];
        $user = M('User');
        $info = $user->where($data)->select();
        if($info['0']['bryy'] == 'no'){
            $ary['bryy'] = 'yes';
            $ary['status'] = 0;
            $userinfo = $user->where($data)->save($ary);
            if($userinfo > 0){
                $this->deleteAllTable($data['id']);
                $this->success('重置成功','__URL__/chmod_user');
            }else{
                $this->error('重置失败','__URL__/chmod_user');
            }
        }else{
            $this->error('恶意操作','__URL__/chmod_user');
        }
    }

    /**
     * 要是重置成功就根据id删除所有的审核数据.
     *
     * @param integer $id 用户的id.
     */
    public function deleteAllTable($id)
    {
        $ary = array('user', 'jf', 'fblw', 'fmzl', 'jgxm', 'jx', 'jxgz', 'ks', 'kyhj', 'kyxm', 'xl', 'xw', 'zzl','jc');
        foreach ($ary as $val) {
            $m = M('cp_' . $val);
            $m->where('uid=' . $id)->delete();
        }
    }

    /**
     * 处理用户申请重置
     */
    public function up_init(){
		$this->check_user_request('普通用户');
		$this->checkpasschange();
        $data['id'] = $_SESSION['user_id'];
        $user = M('User');
        $option['bryy'] = 'no';
        $info = $user->where($data)->save($option);
        if($info > 0){
            $this->success('申请成功，等待处理','__URL__/up_user');
        }else{
            $this->error('已经申请，等待处理','__URL__/up_user');
        }
    }

    /**
     * 用户申请重置
     */
    public function up_user(){
		$this->check_user_request('普通用户');
		$this->checkpasschange();
        $this->display();
    }

    //显示首页
    public function index()
    {
        $this->check_user_request('all');
		$data['id'] = $_SESSION['user_id'];
        $user = M('User');
        $info = $user->where($data)->select();
        $this->assign('info', $info);
        $this->checkpasschange();
        if ($info['0']['status'] == '3' && $info['0']['qx'] == '普通用户') {
            $status = '已通过审核';
        } else if ($info['0']['status'] != '3' && $info['0']['status'] != '0' && $info['0']['qx'] == '普通用户') {
            $status = '正在审核中';
        } else if ($info['0']['status'] == '0' && $info['0']['qx'] == '普通用户') {
            $status = '未进行审核';
			$change_to_audit = '<button id="change_to_audit" class="btn">申请进行审核</button>';
			$this->assign('change_to_audit', $change_to_audit);
        } else if(  $info['0']['qx'] == '管理员' ){
            $all_user = M('User');
            $option['bryy'] = 'no';
			$option['bm'] = $info['0']['bm'];
            $all_user_info = $user->where($option)->select();
            if(count($all_user_info) > 0){
                $status = '<a href="__URL__/chmod_user"><span style="color:red;">有用户申请重新填写，请及时处理</span></a>';
            }else{
                $status = '无通知';
            }
        }else{
            $status = '无通知';
        }
        $this->assign('status', $status);
        $this->display();
    }

    public function userexit()
    {
        $this->check_user_request('all');
		unset($_SESSION['user_id']);
        if ($_SESSION['user_id'] == '') {
            $this->success('注销成功', '__APP__/Index/index');
        } else {
            $this->error('注销失败');
        }
    }

    //显示添加普通用户界面
    public function add()
    {
        $this->check_user_request('add');
		$this->checkpasschange();
        $this->readconfig();
        $user = M('User');
        $data['id'] = $_SESSION['user_id'];
        $info = $user->where($data)->select();
        $bminfo = $info['0']['bm'];
        if ($info['0']['bm'] == 'system') {
            $this->bm = $this->data['bm'];
            //	dump($info);
        } else {
            $bm['0'] = "<option value='$bminfo'>" . $bminfo . "</option>";
            $this->bm = $bm;
            //	dump($bm);
        }
        $this->display();
    }

    //添加普通用户
    public function add_user()
    {
        $this->check_user_request('add');
		$this->checkpasschange();
        $user = M('User');
        $data['username'] = $_POST['username'];
        $data['password'] = $_POST['password'];
        //	$data['name'] = '';
        //	$data['sex'] = '';
        $data['qx'] = $_POST['qx'];
        $data['bm'] = $_POST['bm'];
        //	$data['csny'] = '';
        //	$data['mz'] = '';
        //	$data['jg'] = '';
        //	$data['zplj'] = '';
        if ($data['username'] == '' || $data['password'] == '' || $data['qx'] == '' || $data['bm'] == '') {
            $this->error("信息填写不完整", '__URL__/add');
        } else /* (preg_match(' ^ [A - Za - z] + $',$data['username'])) */ {
            $info = $user->add($data);
            //	dump($info);
            if ($info > 1) {
                $this->success('添加成功', '__URL__/add');
            } else {
                $this->error('已存在该用户', '__URL__/add');
            }
        }
        /* else{
                //	dump($data);
                //	$this->error('用户名请使用字母','__URL__ / add');
                } */
    }

    //显示添加管理员界面
    public function add_admin()
    {
        $this->check_user_request('admin');
		$this->checkpasschange();
        $this->readconfig();
        $this->bm = $this->data['bm'];
        $this->display();
    }

    //添加管理员
    public function add_admin_user()
    {
        $this->check_user_request('add');
		$this->checkpasschange();
        $user = M('User');
        $data['username'] = $_POST['username'];
        $data['password'] = $_POST['password'];
        $data['qx'] = $_POST['qx'];
        $data['bm'] = $_POST['bm'];
        if ($data['username'] == '' || $data['password'] == '' || $data['qx'] == '' || $data['bm'] == '') {
            $this->error("信息填写不完整", '__URL__/add');
        } else /*  if(preg_match(' ^ [A - Za - z] + $',$data['username'])) */ {
            //	dump($data);
            $info = $user->add($data);
            //	dump($info);
            if ($info > 1) {
                $this->success('添加成功', '__URL__/add_admin');
            } else {
                $this->error('已存在该用户', '__URL__/add_admin');
            }
        }
        /* else{
                    $this->error('用户名请使用字母','__URL__/add');
                } */
    }

    //显示选择信息的页面
    public function check()
    {
        // $this->checkpasschange();
        $this->check_user_request('普通用户');
		$data['id'] = $_SESSION['user_id'];
        $user = M('User');
        $info = $user->where($data)->select();
        $this->checkpasschange();
        $this->display();
    }

    /**
     * 显示打印信息的界面
     */
    public function printpdf()
    {
        $this->check_user_request('普通用户');
		$data['id'] = $_SESSION['user_id'];
        $user = M('User');
        $info = $user->where($data)->select();
        //	$this->assign('info',$info);
        $this->checkpasschange();
		$this->display();
    }

    /**
     * 下载非自填部分的pdf
     */
    public function downloadforfeizitianpdf()
    {
        $this->check_user_request('普通用户');
		$this->checkpasschange();
		$file_name = 'feizitianbufen.pdf'; //下载文件名
        $file_dir = "./ChromeDown/"; //下载文件存放目录
        //检查文件是否存在
        if (!file_exists($file_dir . $file_name)) {
            echo "文件不存在";
            exit ();
        } else {
            //打开文件
            header('Content-Description: File Transfer');
            header('Content-Type:application/octet-stream');
            header('Content-Disposition: attachment;filename = ' . $file_name);
            header('Content-Transfer-Encoding:binary');
            header('Expires:0');
            header('Cache-Control:must-revalidate,post-check=0, pre-check=0');
            header('Pragma:public');
            header('Content-Length:' . filesize($file_dir . $file_name));
            ob_clean();
            flush();
            readfile($file_dir . $file_name);
            exit;
        }
    }

    //显示修改密码
    public function changepass()
    {
        $this->check_user_request('all');
		$user = M('User');
        $i = 0;
        $data["id"] = $_SESSION['user_id'];
        $info = $user->where($data)->select();
        $this->assign('info', $info);
        $this->display();
    }

    //修改密码
    public function change_pass()
    {
        $this->check_user_request('all');
		$user = M('User');
        $data['id'] = $_SESSION['user_id'];
        $data['username'] = $_POST['username'];
        $data['password'] = $_POST['oldpassword'];
        $newpassword = $_POST['newpassword'];
		$newpasswordagain = $_POST['newpasswordagain'];
        $info = $user->where($data)->select();
        //	dump($info);
        if ($info == null || $data['username'] == '' || $data['password'] == '' || $newpassword == '' || $newpasswordagain == '' || $newpasswordagain != $newpassword ) {
            $this->error('您输入的信息不正确', '__URL__/changepass');
        } else if ($newpassword != '123456') {
            $info['0']['password'] = $newpassword;
            //	dump($data);
            $change = $user->where($data)->save($info['0']);
            if ($change == 1) {
                $this->success('修改成功', '__URL__/changepass');
            } else {
                $this->error('修改失败', '__URL__/changepass');
            }
        } else {
            $this->error('修改失败,请不要使用初始密码', '__URL__/changepass');
        }
    }
	
	//重置用户密码
	public function reset_pass(){
		$pass = $_POST['pass'];
		$pass2 = $_POST['passl'];
		$pass_array['password'] = $pass2;
		$data['id'] = $_POST['id'];
		if($data['id'] == ''){
			$this->error('系统错误','__URL__/select_user');
		}
		if( $pass != '' && $pass2 != '' && $pass == $pass2 ){
			$user = M('User');
			$user->where($data)->save($pass_array);
			$this->success('重置成功','__URL__/select_user');
		}else{
			$this->error('输入信息有误','__URL__/select_user');
		}
	}

    //查看用户
    public function select_user()
    {
        $this->check_user_request('add');
		$this->checkpasschange();
        $user = M('User');
        import('ORG.Util.Page'); // 导入分页类
        $data['id'] = $_SESSION['user_id'];
        $range = $user->where($data)->select();
        if ($range['0']['qx'] == 'admin') {
            $str = '全部';
            $may['qx'] = array('eq', '三审管理员');
			$status = '<a href="#" id="qx"><span>修改用户权限</span></a><br/><br/><a id="reset" href="#"><span>重置用户密码</span></a><br/><br/><a id="delete" href="#"><span>删除用户</span></a>';
        } else if ($range[0]['qx'] == '三审管理员') {
            $str = $range[0]['bm'];
            $may['bm'] = array('eq', $str);
            $may['qx'] = array('neq', $range[0]['qx']);
			$status = '<a id="reset" href="#"><span>重置用户密码</span></a><br/><br/><a id="delete" href="#"><span>删除用户</span></a>';
        }
        $count = $user->where($may)->count(); // 查询满足要求的总记录数
        $Page = new Page($count, 5); // 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show(); // 分页显示输出
        $info = $user->where($may)->limit($Page->firstRow . ',' . $Page->listRows)->select();
        $this->assign('info', $info);
        $this->assign('page', $show);
        $this->assign('range', $str);
		$this->assign('status',$status);
        $this->display();
    }

    //用户全部通过后修改其状态
   /* public function update_user_status($id)
    {

        $this->check_user_request('管理员');
		$info = new InfoAction();
        $st = $info->audit_all_table($id);
        if ($st == 1) {
            $data['id'] = $id;
            $data['status'] = AUDIT_END;
            $user = M('user');
            $user->save($data);
        }
    }*/
    private function  getAuditYy($id){
        $m = M('User');
        $arrYY = $m->where('id=' . $id)->getField('yy');
        $reason_arr = explode('#',$arrYY);
        //	dump($reason_arr);
        /**
         *  $_POST
         *  $reson_arr
         */
        $keys = array_values(array_filter(array_keys($_POST),function($e){
            return strpos($e,"*");
        }));

        $keys2 = array();
        foreach($keys as $k){
            $keys2[$k] = $_POST[$k];
        }
        //	var_dump($keys2);
        $split = array_map(function($e){
            $pos = strrpos($e, "*");
            $first = substr($e, 0, $pos);
            $last  = substr($e, $pos+1);
            return array($first, $last);
        }, $reason_arr);
        $split2 = array();
        foreach($split as $s){
            $split2[$s[0]] = $s[1];
        }
        //	var_dump($split2);

        $result = array_merge($keys2,$split2);

        //	var_dump($result);
        $data['yy'] = "";
        foreach($result as $k => $v){
            if( $k && $v){
                $data['yy'] .= "#" . $k . "*" . $v;
            }
        }
        $data['yy'] = substr($data['yy'],1);
        //	var_dump($data);
        //	die;
        $m->where('id=' . $id)->save($data);
    }

    //显示一审的用户管理界面
    public function audit_user()
    {
        $this->check_user_request('管理员');
		$this->checkpasschange();
        import('ORG.Util.Page'); // 导入分页类
        $id = $_SESSION['user_id'];
        $user = M('user');
        $bmArr = $user->field('bm,qx')->where('id = ' . $id)->find();
        $status = AUDIT_FIRST;
        if ($bmArr['bm'] == '组织人事处' && $bmArr['qx'] == '一审管理员')
        {
            $data['status'] = $status;
        } else {
            $this->error('对不起，你没有该权限');
        }
        $count = $user->where($data)->count();
        $Page = new Page($count, 5);
        $show = $Page->show(); // 分页显示输出
        $arr = $user->where($data)->limit($Page->firstRow . ',' . $Page->listRows)->select();
        $this->assign('info', $arr);
        $this->assign('page', $show);
        $this->assign('range', $count);
        $this->display();
    }

    /**
     * 显示一审用户的信息界面
     */
    public function viewOne()
    {
        $this->check_user_request('管理员');
        $this->checkpasschange();
        $this->readconfig();
        $id = $_SESSION['user_id'];
        $m = M('user');
        $str = $m->where('id=' . $id)->getField('bm');
        if ($str == '组织人事处') {
            $slt = $this->data['qk'];
            $userId = $_GET['id'];
            $info = M('Info');
            $arr = $info->field('xrjszw, id, iid')->where('iid=' . $userId)->find();
            // dump($arr);exit;
            if ($arr['xrjszw']) {
                $this->assign('id', $arr['iid']);
                $ary = explode('、',$arr['xrjszw']);
                $this->assign('ary', $ary);
                $this->assign('list', $slt);
                $this->display();
            } else {
                $this->error('该用户的职务为空');
            }
        } else {
            $this->error('对不起，你没有此权限');
        }
    }

    /**
     * 接收一审的信息
     */
    public function auditOne()
    {
        $this->check_user_request('管理员');
        $this->checkpasschange();
        $id = $_SESSION['user_id'];
        $m = M('user');
        $str = $m->field('bm,qx')->where('id=' . $id)->find();
        if ($str['bm'] == '组织人事处' && $str['qx'] == '一审管理员') {
            $data['uid'] = $_POST['hidden'];
            $data['zwhsj'] = $_POST['zzsj'];
            $user = M('cp_user');
            $sta = $user->where('uid=' . $data['uid'])->getField('id');
            if ($sta > 0) {
                $data['id'] = $sta;
                $arr = $user->save($data);
            } else {
                if ($data['zwhsj'] == 2) {

                } else {
                    $arr = $user->add($data);
                }
            }
            if ($arr > 0 || $data['zwhsj'] == 2) {
                // $info = M('Info');
                // $iid = $info->where('iid=' . $data['uid'])->getField('id');
                if ($data['zwhsj'] == 2) {
                    $data1['status'] = 0;
                } elseif ($data['zwhsj'] == 1) {
                    $data1['status'] = AUDIT_THEN;
                }
                $data1['id'] = $data['uid'];
               /* dump($data1);
                exit;*/
                $m->save($data1);
                $this->success('审核成功', '__URL__/audit_user');
            } else {
                $this->error('审核失败');
            }
        } else {
            $this->error('非人事处人员不能审核');
        }
    }
    /**
     * @param $user_id
     */
    //显示审核页面的信息
    public function view_auditing($user_id)
    {
        $this->readconfig();
		$slt = $this->data['qk'];
        $info1 = $this->selectUser($user_id);
        // dump($info1);
        $this->assign('info1', $info1);
        $info2 = $this->selectInfo($user_id);
        $this->assign('info2', $info2);
        /* $info3 = $this->selectXl($data['id']);
         for ($i = 0; $i < count($info3); $i++) {
             if ($info3[$i]['xl'] == '本科') {
                 $xlArr['dx'] = $info3[$i]['kssj'] . '至' . $info3[$i]['jssj'] . '毕业于' . $info3[$i]['hd'] . $info3[$i]['bm'] . $info3[$i]['zy'] . '专业(修业' . $info3[$i]['xynx'] . '年)';
             } else if ($info3[$i]['xl'] == '研究生') {
                 $xlArr['yjs'] = $info3[$i]['kssj'] . '至' . $info3[$i]['jssj'] . '毕业于' . $info3[$i]['hd'] . $info3[$i]['bm'] . $info3[$i]['zy'] . '专业(修业' . $info3[$i]['xynx'] . '年)';
             }
         }
         $this->assign('info3', $xlArr);
         */
        // 学位
        $info4 = $this->selectXw($user_id);
        $xw = M('cp_xw');
        $xArr = $xw->field('cp_xw.xwqk,xw.id,xw.swsj,xw.byxx,xw.xwlx,xw.xw')->join('xw on cp_xw.cid = xw.id')->where('uid = ' . $user_id)->select();
        if ($xArr > 0) {
            //控制学位审核显示情况
            $xArr = $this->audit_view_data($xArr, $slt, 'xw');
            $this->assign('info4', $xArr);
        } else {
            $this->assign('info4', $info4);
            $this->assign('list4', $slt);
        }
        // dump($info4);
        // 国内外进修
        $info5 = $this->selectGnw($user_id);
        $gnw = M('cp_jx');
        $jxArr = $gnw->join('gnwjx on cp_jx.cid = gnwjx.id')->where('uid = ' . $user_id)->select();
        if ($jxArr > 0) {
            //控制进修审核显示情况
            $jxArr = $this->audit_view_data($jxArr, $slt, 'jx');
            $this->assign('info5', $jxArr);
        } else {
            $this->assign('info5', $info5);
            $this->assign('list5', $slt);
        }
        // 奖罚
        $info6 = $this->selectJf($user_id);
        $jf = M('cp_jf');
        $jfAry = $jf->join('jf on cp_jf.cid = jf.id')->where('uid = ' . $user_id)->select();
        if ($jfAry > 0) {
            //控制奖罚显示情况
            $jfAry = $this->audit_view_data($jfAry, $slt, 'jf');
            $this->assign('info6', $jfAry);
        } else {
            $this->assign('info6', $info6);
            $this->assign('list6', $slt);
            //dump($jlArr);
        }
        //学历以及经历
        $info8 = $this->selectXl($user_id);
        $xl = M('cp_xl');
        $xlArr = $xl->join('xl on cp_xl.cid = xl.id')->where('uid = ' . $user_id)->select();
        if ($xlArr > 0) {
            //控制学历和经历情况
            $xlArr = $this->audit_view_data($xlArr, $slt, 'xl');
            $this->assign('info8', $xlArr);
        } else {
            $this->assign('info8', $info8);
            $this->assign('list8', $slt);
        }
        //教学工作
        $info9 = $this->selectGz($user_id);
        $gz = M('cp_jxgz');
        $gzArr = $gz->join('xzwcgz on cp_jxgz.cid = xzwcgz.id')->where('uid = ' . $user_id)->select();
        if ($gzArr > 0) {
            //控制教学工作情况
            $gzArr = $this->audit_view_data($gzArr, $slt, 'jxgz');
            $this->assign('info9', $gzArr);
            $n = M('xzwcgz');
            $gzData = $gz->field('cid')->where('uid = ' . $user_id)->select();
            foreach ($gzData as $val) {
                foreach ($val as $vl) {
                    $gData[] = $vl;
                }
            }
            $data2['id'] = array('not in', $gData);
            $data2['xzid'] = $user_id;
            $gzArry = $n->where($data2)->select();
            if ($gzArry) {
                $this->assign('info9a', $gzArry);
                $this->assign('list9a', $slt);
            }
        } else {
            $this->assign('info9', $info9);
            $this->assign('list9', $slt);
        }
        //发表论文
        $info10 = $this->selectFblw($user_id);
        $lw = M('cp_fblw');
        $lwArr = $lw->join('fblwl on cp_fblw.cid = fblwl.id')->where('uid = ' . $user_id)->select();
        if ($lwArr > 0) {
            //控制发表论文类
            $lwArr = $this->audit_view_data($lwArr, $slt, 'fblw');
            $this->assign('info10', $lwArr);
        } else {
            $this->assign('info10', $info10);
            $this->assign('list10', $slt);
        }
        //专著类
        $info11 = $this->selectZzl($user_id);
        $zz = M('cp_zzl');
        $zzArr = $zz->join('zzl on cp_zzl.cid = zzl.id')->where('uid = ' .$user_id)->select();
        if ($zzArr > 0) {
            //控制专著类
            $zzArr = $this->audit_view_data($zzArr, $slt, 'zzl');
            $this->assign('info11', $zzArr);
        } else {
            $this->assign('info11', $info11);
            $this->assign('list11', $slt);
        }
        //科研项目
        $info12 = $this->selectKyxm($user_id);
        $ky = M('cp_kyxm');
        $kyArr = $ky->join('kyxm on cp_kyxm.cid = kyxm.id')->where('uid = ' . $user_id)->select();
        if ($kyArr > 0) {
            //控制科研项目
            $kyArr = $this->audit_view_data($kyArr, $slt, 'kyxm');
            $this->assign('info12', $kyArr);
        } else {
            $this->assign('info12', $info12);
            $this->assign('list12', $slt);
        }
        //教改项目情况
        $info13 = $this->selectJgxm($user_id);
        $jgxm = M('cp_jgxm');
        $jgArr = $jgxm->join('jgxm on cp_jgxm.cid = jgxm.id')->where('uid = ' . $user_id)->select();
        if ($jgArr > 0) {
            //控制教改项目
            $jgArr = $this->audit_view_data($jgArr, $slt, 'jgxm');
            $this->assign('info13', $jgArr);
        } else {
            $this->assign('info13', $info13);
            $this->assign('list13', $slt);
        }
        //考试情况
        $info14 = $this->selectKs($user_id);
        $ks = M('cp_ks');
        $ksArr = $ks->join('ks on cp_ks.cid = ks.id')->where('uid = ' . $user_id)->select();
        if ($ksArr > 0) {
            //控制考试情况
            $ksArr = $this->audit_view_data($ksArr, $slt, 'ks');
            $this->assign('info14', $ksArr);
        } else {
            $this->assign('info14', $info14);
            $this->assign('list14', $slt);
        }
        //科研获奖
        $info15 = $this->selectKyhj($user_id);
        $kyhj = M('cp_kyhj');
        $kyhjArr = $kyhj->join('kyhj on cp_kyhj.cid = kyhj . id')->where('uid = ' . $user_id)->select();
        if ($kyhjArr > 0) {
            //控制科研获奖
            $kyhjArr = $this->audit_view_data($kyhjArr, $slt, 'kyhj');
            $this->assign('info15', $kyhjArr);
        } else {
            $this->assign('info15', $info15);
            $this->assign('list15', $slt);
        }
        //发明专利
        $info16 = $this->selectFmzl($user_id);
        $fmzl = M('cp_fmzl');
        $fmzlArr = $fmzl->join('fmzl on cp_fmzl.cid = fmzl . id')->where('uid = ' . $user_id)->select();
        if ($fmzlArr > 0) {
            //控制发明专利
            $fmzlArr = $this->audit_view_data($fmzlArr, $slt, 'fmzl');
            $this->assign('info16', $fmzlArr);
        } else {
            $this->assign('info16', $info16);
            $this->assign('list16', $slt);
        }
        //教材
        $info17 = $this->selectJc($user_id);
        $jc = M('cp_jc');
        $jcArr = $jc->join('jc on cp_jc.cid = jc . id')->where('cp_jc.uid = ' . $user_id)->select();
        if ($jcArr > 0) {
            //控制教材
            $jcArr = $this->audit_view_data($jcArr, $slt, 'jc');
            $this->assign('info17', $jcArr);
        } else {
            $this->assign('info17', $info17);
            $this->assign('list17', $slt);
        }
        $user = M('cp_user');
        $ary = $user->where('uid = ' . $user_id)->find();
        if ($ary > 0) {
            foreach ($ary as $key => $value) {
                if ($value != null) {
                    for ($i = 0; $i < count($slt); $i++) {
                        if (strpos($slt[$i], $value)) {
                            $va[$i] = str_replace("value", ' selected = "true" value', $slt[$i]);
                            continue;
                        }
                        $va[$i] = $slt[$i];
                    }
                    $this->assign($key, $va);
                }
                //dump($vArr[1]);
            }
        } else {
             $this->assign('list', $slt);
        }
    }
    //根据用户的id显示用户的需要被审核的信息.
    public function auditing()
    {
        $this->check_user_request('管理员');
		$this->checkpasschange();
		$this->readconfig();
        // $slt = $this->data['qk'];
        $admin_id = $_SESSION['user_id'];
        $m = M('User');
        $dataArr = $m->field('qx,bm')->where('id = ' . $admin_id)->find();
        $data['id'] = $_GET['id'];
        // $data['bm'] = $dataArr['bm'];
        // $data['status']=AUDIT_FIRST;
        // $arr = $m->where($data)->select();
        if ($dataArr['qx'] == '三审管理员') {
            $bt = $this->viewZwTime($data['id']);
            $this->assign('bt', $bt);
            $this->view_auditing($data['id']);
        } else {
            $this->error('对不起，你没有该权限');
        }
        $this->display();
    }

    //控制多条数据的审核显示情况
    public function audit_view_data($dataArr, $slt, $bz)
    {
        $this->check_user_request('all');
		for ($j = 0; $j < count($dataArr); $j++) {
            for ($i = 0; $i < count($slt); $i++) {
                if (strpos($slt[$i], $dataArr[$j][$bz . 'qk'])) {
                    $vc[$i] = str_replace("value", ' selected = "true" value', $slt[$i]);
                    continue;
                }
                $vc[$i] = $slt[$i];
            }
            $dataArr[$j]['cp_' . $bz . 'qk'] = $vc;
        }
        return $dataArr;
    }

    //查询user表
    public function selectUser($id)
    {
        $this->check_user_request('all');
		$m = M('User');
        $arr = $m->where('id = ' . $id)->select();
        $ary = explode(' . ', $arr[0]['jg']);
        $arr[0]['jg_pro'] = $ary[0];
        $arr[0]['jg_city'] = $ary[1];
        $n = M('cp_user');
        $ayy = $n->where('uid = ' . $id)->select();
        foreach ($ayy as $va) {
            foreach ($va as $key => $value) {
                $arr[0]['cp_' . $key] = $value;
                //dump($qg[1]);
            }
        }
        // dump($arr);
        return $arr;
    }

    //查询info表
    public function selectInfo($id)
    {
        $this->check_user_request('all');
		$m = M('Info');
        $arr = $m->where('iid = ' . $id)->select();
        $arry = explode(':', $arr[0]['pwhsp']);
        if ($arry[0] == '其他') {
            $arr[0]['pwhsp'] = $arry[1];
        }
        return $arr;
    }

    //查询学历表
    public function selectXl($id)
    {
        $this->check_user_request('all');
		$m = M('Xl');
        $arr = $m->where('xlid = ' . $id)->select();
        return $arr;
    }

    //查询学位表
    public function selectXw($id)
    {
        $this->check_user_request('all');
		$m = M('Xw');
        $arr = $m->where('xwid = ' . $id)->select();
        return $arr;
    }

    //查询国内外进修的情况
    public function selectGnw($id)
    {
        $this->check_user_request('all');
		$m = M('Gnwjx');
        $arr = $m->where('gid = ' . $id)->select();
        if ($arr[0]['qk'] == '无') {
            $arr = '无';
        }
        return $arr;
    }

    //查询奖罚的情况
    public function selectJf($id)
    {
        $this->check_user_request('all');
		$m = M('Jf');
        $arr = $m->where('jid = ' . $id)->select();
        return $arr;
    }

    //查询教学工作的情况
    public function selectGz($id)
    {
        $this->check_user_request('all');
		$m = M('Xzwcgz');
        $arr = $m->where('xzid = ' . $id)->select();
        return $arr;
    }

    //查询发表的论文
    public function selectFblw($id)
    {
        $this->check_user_request('all');
		$m = M('Fblwl');
        $arr = $m->where('fid = ' . $id)->select();
        for ($i = 0; $i < count($arr); $i++) {
            $ary = explode(':', $arr[$i]['pm']);
            if ($ary[0] == '其他') {
                $arr[$i]['pm'] = $ary[1];
            }
        }
        return $arr;
    }

    //查询专著类
    public function selectZzl($id)
    {
        $this->check_user_request('all');
		$m = M('Zzl');
        $arr = $m->where('zid = ' . $id)->select();
        return $arr;
    }

    //查询科研项目
    public function selectKyxm($id)
    {
        $this->check_user_request('all');
		$m = M('Kyxm');
        $arr = $m->where('kyid = ' . $id)->select();
        for ($i = 0; $i < count($arr); $i++) {
            $ary = explode(':', $arr[$i]['pm']);
            if ($ary[0] == '其他') {
                $arr[$i]['pm'] = $ary[1];
            }
        }
        return $arr;
    }

    //查询教改项目
    public function selectJgxm($id)
    {
        $this->check_user_request('all');
		$m = M('Jgxm');
        $arr = $m->where('jgid = ' . $id)->select();
        for ($i = 0; $i < count($arr); $i++) {
            $ary = explode(':', $arr[$i]['pm']);
            if ($ary[0] == '其他') {
                $arr[$i]['pm'] = $ary[1];
            }
        }
        return $arr;
    }

    //查询考试情况
    public function selectKs($id)
    {
        $this->check_user_request('all');
		$m = M('Ks');
        $arr = $m->where('kid = ' . $id)->select();
        return $arr;
    }

    //查询科研获奖
    public function selectKyhj($id)
    {
        $this->check_user_request('all');
		$m = M('Kyhj');
        $arr = $m->where('kjid = ' . $id)->select();
        for ($i = 0; $i < count($arr); $i++) {
            $ary = explode(':', $arr[$i]['pm']);
            if ($ary[0] == '其他') {
                $arr[$i]['pm'] = $ary[1];
            }
        }
        return $arr;
    }

    //查询发明专利
    public function selectFmzl($id)
    {
        $this->check_user_request('all');
		$m = M('Fmzl');
        $arr = $m->where('fmid = ' . $id)->select();
        return $arr;
    }

    //查询教材信息
    public function selectJc($id)
    {
        $this->check_user_request('all');
        $m = M('jc');
        $arr = $m->where('uid = ' . $id)->select();
        return $arr;
    }

   /* private function  getAuditYy($id){
        $m = M('User');
        $arrYY = $m->where('id=' . $id)->getField('yy');
        $reason_arr = explode('#',$arrYY);
        dump($reason_arr);
        //'xzwcgz*4*jxgz4*信息不正确fds  jf*1*jf1*信息不正确gfd xzwcgz*1*jxgz1*信息不正确'
        foreach($_POST as $k=>$v){
            if(!strpos($k,"*")){
               if($v==1){
                  $reason_arr = array_filter($reason_arr,function($e)use($k){
                        if(strpos($e,$k)){
                            return false;
                        }
                      return true;
                  });

               }elseif($v==2||$v==0){
                   echo "fuck";
                   dump($k);
                   dump($v);
                   $reason_arr = array_filter($reason_arr,function($e)use($k){
                       if(strpos($e,$k)){
                           return false;
                       }
                       return true;
                   });
                   dump($reason_arr);
                   echo "your";
                   dump($_POST);
                   $key_arr = array_values(array_filter(array_keys($_POST),function($e)use($k){
                       if(strpos($e,$k)){
                           return true;
                       }
                       return false;
                   }));
                   var_dump('here:',$key_arr);
                   if($v&&!empty($key_arr[0]))
                      $reason_arr[]=$key_arr[0].'*'.$_POST[$key_arr[0]];
               }
           }
        }
        //$fuck = implode('#',$reason_arr);
        $data1['yy'] = $reason_arr[0];
        for($index = 1;$index < count($reason_arr) ; $index++){
            if(!$reason_arr[$index]) continue;
            $data1['yy'] .= "#".$reason_arr[$index];
        }
        if($data1['yy'][0] == "#"){
            $data1['yy'] = substr($data1['yy'],1);
        }
        dump($data1);
        die;
        $m->where('id=' . $id)->save($data1);

    }*/
    //接收三审提交的信息
    public function audit_info()
    {
        //dump($_POST['ckb']);
        $this->check_user_request('管理员');
        $id = $_POST['hidden'];
        // $userAry = array('name','sex','csny','zplj','mz','jg');
        // $infoAry = array('pwhsp','hscjdp','jkzk','zwhsj',
          //  'xl','nozw','cjgzsj','sfzh','zyzw','xsttzw','dzzw','shjz','xkz','xk');
        // dump($_POST);
        $this->getAuditYy($id);
        $userArr['name'] = $_POST['name'];
        $userArr['sex'] = $_POST['sex'];
        $userArr['csny'] = $_POST['csny'];
        $userArr['zplj'] = $_POST['zplj'];
        $userArr['mz'] = $_POST['mz'];
        $userArr['jg'] = $_POST['jg'];
        $userArr['pwhsp'] = $_POST['pwhsp'];
        //$userArr['gz']=$_POST['gz'];
        $userArr['hscjdp'] = $_POST['hscjdp'];
        $userArr['jkzk'] = $_POST['jkzk'];
        $userArr['zwhsj'] = $_POST['zwhsj'];
        $userArr['xl'] = $_POST['xl'];
        $userArr['npzw'] = $_POST['npzw'];
        $userArr['cjgzsj'] = $_POST['cjgzsj'];
        $userArr['sfzh'] = $_POST['sfzh'];
        // $userArr['dx'] = $_POST['dx'];
        // $userArr['yjs'] = $_POST['yjs'];
        $userArr['zyzc'] = $_POST['zyzc'];
        $userArr['xsttzw'] = $_POST['xsttzw'];
        $userArr['dzzw'] = $_POST['dzzw'];
        $userArr['shjz'] = $_POST['shjz'];
        $userArr['xkz'] = $_POST['xkz'];
        $userArr['xk'] = $_POST['xk'];
        $userArr['grzj'] = $_POST['grzj'];
        $userArr['zdyjs'] = $_POST['zdyjs'];
        $userArr['zdjs'] = $_POST['zdjs'];
        $userArr['sysgx'] = $_POST['sysgx'];
        $userArr['wycd'] = $_POST['wycd'];
        $userArr['jsjsp'] = $_POST['jsjsp'];
        $userArr['jxrwzs'] = $_POST['jxrwzs'];
        $userArr['jxggzs'] = $_POST['jxggzs'];
        $userArr['lwzzzs'] = $_POST['lwzzzs'];
        $userArr['kyhjzs'] = $_POST['kyhjzs'];
        $userArr['hjzs'] = $_POST['hjzs'];
        //dump($userArr);
        //对学位限制
        $xwArr = $this->selectXw($id);
        for ($i = 0; $i < count($xwArr); $i++) {
            $xwData[$xwArr[$i]['id']] = $_POST['xw' . $xwArr[$i]['id']];
        }
        $this->audit_data($xwData, $id, 'xw');
        //接收进修数据
        $jxArr = $this->selectGnw($id);
        for ($i = 0; $i < count($jxArr); $i++) {
            $jxData[$jxArr[$i]['id']] = $_POST['gnw' . $jxArr[$i]['id']];
        }
        $this->audit_data($jxData, $id, 'jx');
        //接收奖罚表数据
        $jfArr = $this->selectJf($id);
        for ($i = 0; $i < count($jfArr); $i++) {
            $jfData[$jfArr[$i]['id']] = $_POST['jf' . $jfArr[$i]['id']];
        }
        $this->audit_data($jfData, $id, 'jf');
        //接收学历和经历
        $xlArr = $this->selectXl($id);
        for ($i = 0; $i < count($xlArr); $i++) {
            $xlData[$xlArr[$i]['id']] = $_POST['xl' . $xlArr[$i]['id']];
        }
        $this->audit_data($xlData, $id, 'xl');
        //接收教学工作审核
        $gzArr = $this->selectGz($id);
        for ($i = 0; $i < count($gzArr); $i++) {
            $gzData[$gzArr[$i]['id']] = $_POST['jxgz' . $gzArr[$i]['id']];
        }
        $this->audit_data($gzData, $id, 'jxgz', true);
        //接收发表论文审核
        $lwArr = $this->selectFblw($id);
        for ($i = 0; $i < count($lwArr); $i++) {
            $lwData[$lwArr[$i]['id']] = $_POST['fblw' . $lwArr[$i]['id']];
        }
        $this->audit_data($lwData, $id, 'fblw');
        //接收专著类审核
        $zzArr = $this->selectZzl($id);
        for ($i = 0; $i < count($zzArr); $i++) {
            $zzData[$zzArr[$i]['id']] = $_POST['zzl' . $zzArr[$i]['id']];
        }
        $this->audit_data($zzData, $id, 'zzl');
        //接收科研项目审核
        $kyArr = $this->selectKyxm($id);
        for ($i = 0; $i < count($kyArr); $i++) {
            $kyData[$kyArr[$i]['id']] = $_POST['kyxm' . $kyArr[$i]['id']];
        }
        $this->audit_data($kyData, $id, 'kyxm');
        //接收教改项目审核
        $jgArr = $this->selectJgxm($id);
        for ($i = 0; $i < count($jgArr); $i++) {
            $jgData[$jgArr[$i]['id']] = $_POST['jgxm' . $jgArr[$i]['id']];
        }
        $this->audit_data($jgData, $id, 'jgxm');
        //接收考试情况的审核
        $ksArr = $this->selectKs($id);
        for ($i = 0; $i < count($ksArr); $i++) {
            $ksData[$ksArr[$i]['id']] = $_POST['ks' . $ksArr[$i]['id']];
        }
        $this->audit_data($ksData, $id, 'ks');
        //接收科研获奖
        $kyhjArr = $this->selectKyhj($id);
        for ($i = 0; $i < count($kyhjArr); $i++) {
            $kyhjData[$kyhjArr[$i]['id']] = $_POST['kyhj' . $kyhjArr[$i]['id']];
        }
        $this->audit_data($kyhjData, $id, 'kyhj');
        //接收发明专利审核的数据
        $fmzlArr = $this->selectFmzl($id);
        for ($i = 0; $i < count($fmzlArr); $i++) {
            $fmzlData[$fmzlArr[$i]['id']] = $_POST['fmzl' . $fmzlArr[$i]['id']];
        }
        $this->audit_data($fmzlData, $id, 'fmzl');
        //接收教材的数据信息
        $jcArr = $this->selectJc($id);
        for ($i = 0; $i < count($jcArr); $i++) {
            $jcData[$jcArr[$i]['id']] = $_POST['jc' . $jcArr[$i]['id']];
        }
       /* dump($jcData);
        exit;*/
        $this->audit_data($jcData, $id, 'jc');
        $user = M('cp_user');
        $arr = $user->where('uid = ' . $id)->select();
        if ($arr > 0) {
            $data1['id'] = $arr[0]['id'];
            foreach ($userArr as $key => $value) {
                //dump('fd');
                $data1[$key] = $value;
            }
            $user->save($data1);
            //dump($userArr);
        } else {
            $data1['uid'] = $id;
            foreach ($userArr as $key => $value) {
                $data1[$key] = $value;
            }
            $user->add($data1);
        }
        //dump($userArr);
        //die;
        $m = M('User');
        $username = $m->where('id = ' . $_SESSION['user_id'])->getField('username');
        $status['user'] = $data1;
        $status['xw'] = $xwData;
        $status['jx'] = $jxData;
        $status['jf'] = $jfData;
        $status['xl'] = $xlData;
        $status['jxgz'] = $gzData;
        $status['fblw'] = $lwData;
        $status['zzl'] = $zzData;
        $status['kyxm'] = $kyData;
        $status['jgxm'] = $jgData;
        $status['ksqk'] = $ksData;
        $status['kyhj'] = $kyhjData;
        $status['fmzl'] = $fmzlData;
        $status['jc'] = $jcData;
        parent::logOP($username, '审核', json_encode($status));
        // $this->update_user_status($id);
        $this->success('审核成功', '__URL__/auditThreeUser');
    }

    //针对多条数据的情况审核
    public function audit_data($dataArr, $id, $bz,  $cid)
    {
        $this->check_user_request('管理员');
		$m = M('cp_' . $bz);
        // dump($dataArr);
        $arr = $m->where('uid = ' . $id)->select();
        if ($cid == true) {
            foreach ($dataArr as $ky => $val) {
                $data['uid'] = $id;
                $data['cid'] = $ky;
                $mcArr = $m->where($data)->find();
                if (!$mcArr) {
                    $data[$bz . 'qk'] = $val;
                    $m->add($data);
                } else {
                    $data1['id'] = $mcArr['id'];
                    $data1[$bz . 'qk'] = $val;
                    $m->save($data1);
                }
            }
        } elseif ($arr > 0) {
            for ($i = 0; $i < count($arr); $i++) {
                foreach ($dataArr as $key => $value) {
                    if ($arr[$i]['cid'] == $key) {
                        $data['id'] = $arr[$i]['id'];
                        $data[$bz . 'qk'] = $value;
                        // dump($data);
                        $m->save($data);
                    }
                }
            }
        } else {
            foreach ($dataArr as $ky => $val) {
                $data['uid'] = $id;
                $data['cid'] = $ky;
                $data[$bz . 'qk'] = $val;
                $m->add($data);
            }
        }
    }
    /* //根据不同对象操作不同表
    public function allTable($ay,$data,$id){
        $m=M('cp_'.$ay[0]);
        $arr=$m->where('uid = '.$id)->select();
        if($arr>0){
            $data['id']=$arr[0]['id'];
            $m->save($data);
        }else{
            $data['uid']=$id;
            $m->add($data);
        }
    } */
    //预览信息
    public function preview()
    {
        $this->check_user_request('普通用户');
		$data['id'] = $_SESSION['user_id'];
        $user = M('User');
        $info = $user->where($data)->select();
        $this->assign('info', $info);
        $this->checkpasschange();
		$this->display();
    }
    //
    //显示二审的用户
    public function audit_two_user()
    {
        $this->check_user_request('管理员');
		$this->checkpasschange();
        import('ORG.Util.Page');
        $id = $_SESSION['user_id'];
        $user = M('User');
        $dataArr = $user->field('bm, username, qx')->where('id = ' . $id)->find();
        $bm = $dataArr['bm'];
        if ($bm == '教务处' && $dataArr['qx'] == '二审管理员') {
            $jwArr = array('jck', 'sjk', 'jyk');
            foreach ($jwArr as $vl) {
                if ($dataArr['username'] == $vl) {
                    $str = 'jwc';
                    $jwcs = $dataArr['username'];
                }
            }
            if (empty($str)) {
                $this->error('对不起，你没有该权限');
            }
        } else if ($bm == '研究生处' && $dataArr['qx'] == '二审管理员') {
            $str = 'yjs';
            $table = 'user';
        } else if ($bm == '科技处' && $dataArr['qx'] == '二审管理员') {
            $str = 'kjc';
            $table = 'zzl';
        } else {
            $this->error('对不起，你没有该权限');
            exit;
        }
        switch ($jwcs) {
            case 'jyk':
                $table = 'user';
                break;
            case 'jck':
                $table = 'jc';
                break;
            case 'sjk':
                $table = 'jxgz';
                break;
        }
        $data['status'] = AUDIT_THEN;
        $count = $user->where($data)->count();
        $Page = new Page($count, 5); // 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show();
        $list = $user->where($data)->limit($Page->firstRow . ',' . $Page->listRows)->select();
        /*dump($list);
        echo '<hr>';
        dump($table);
        echo '<hr>';
        dump($str);
        echo '<hr>';*/
        $liArr = $this->auditUserColor($list, $table, $jwcs);
        for ($i = 0; $i < count($liArr); $i++) {
            $liArr[$i]['result'] = $str;
            $liArr[$i]['jwcs'] = $jwcs;
        }
       /* dump($liArr);
        exit;*/
        $this->assign('info', $liArr);
        $this->assign('page', $show);
        $this->assign('range', $count);
        $this->display();
    }

    /**
     * 显示最早的现任技术职务和时间.
     *
     * @param integer $id 被审核的用户的id.
     *
     * @return array|boolean
     */
    public function viewZwTime($id)
    {
        $m = M('Info');
        $str = $m->where('iid=' . $id)->getField('xrjszw');
        if ($str) {
            $strArr = explode('、', $str);
            for ($i = 0; $i < count($strArr); $i++) {
                $strArry[$i] = explode('-', $strArr[$i]);
                $trAry[$i] = explode('.', $strArry[$i][1]);
                $trAry[$i][] = $strArry[$i][0];
            }
            for ($i = 0; $i < count($trAry); $i++) {
                if (!$min) {
                    $min = $trAry[$i];
                    continue;
                }
                if ($min[0] > $trAry[$i][0]) {
                    $min = $trAry[$i];
                } elseif ($min[0] == $trAry[$i][0]) {
                    if ($min[1] > $trAry[$i][1]) {
                        $min = $trAry[$i];
                    }
                }
            }
            return $min;
        }
        return false;
    }

    /**
     * 显示教务处-教研科.
     */
    public function audited_jwcjyk()
    {
        $this->check_user_request('管理员');
        $this->checkpasschange();
        $this->readconfig();
        $slt = $this->data['qk'];
        $data['uid'] = $_GET['id'];
        $user = M('user');
        $num = $user->where('id = ' . $data['uid'])->getField('status');
        if ($num == AUDIT_THEN) {
            $bt = $this->viewZwTime($data['uid']);
            $this->assign('bt', $bt);
            $info1 = $this->selectUser($data['uid']);
            $this->assign('info1', $info1);
            $info2 = $this->selectInfo($data['uid']);
            $this->assign('info2', $info2);
            $n = M('cp_user');
            $ary = $n->where('uid = ' . $data['uid'])->find();
            if (count($ary) > 0) {
                foreach ($ary as $key => $value) {
                    if ($value != null) {
                        for ($i = 0; $i < count($slt); $i++) {
                            if (strpos($slt[$i], $value)) {
                                $va[$i] = str_replace("value", ' selected = "true" value', $slt[$i]);
                                continue;
                            }
                            $va[$i] = $slt[$i];
                        }
                        $this->assign($key, $va);
                    }
                    //dump($vArr[1]);
                }
            } else {
                // $this->assign('list', $slt);
            }
            //教学工作
            $info3 = $this->selectGz($data['uid']);
            for ($i = 0; $i < count($info3); $i++)
            {
                if ($info3[$i]['bz'] == '本科') {
                    $info9[$i] = $info3[$i];
                }
            }
            $gz = M('cp_jxgz');
            // $jxArr = array($ary['uid'] = array('eq', $data['uid']), $ary['mcrw'] = array('neq', '毕业设计'));
            $gzArr = $gz->join('xzwcgz on cp_jxgz.cid = xzwcgz.id')->where('cp_jxgz.uid='
                . $data['uid'] . ' AND bz=\'本科\'')->select();
            if ($gzArr > 0) {
                $gzArr = $this->audit_view_data($gzArr, $slt, 'jxgz');
                $this->assign('info9', $gzArr);
                $user = M('cp_user');
                $ary = $user->where('uid = ' . $data['uid'])->find();
                foreach ($ary as $key => $value) {
                    if ($value != null) {
                        for ($i = 0; $i < count($slt); $i++) {
                            if (strpos($slt[$i], $value)) {
                                $va[$i] = str_replace("value", ' selected = "true" value', $slt[$i]);
                                continue;
                            }
                            $va[$i] = $slt[$i];
                        }
                        $this->assign($key, $va);
                    }
                    //dump($vArr[1]);
                }
            } else {
                $this->assign('info9', $info9);
                $this->assign('list', $slt);
            }
            // dump('fd');
            // 教改项目
           /* $info13 = $this->selectJgxm($data['uid']);
            $jgxm = M('cp_jgxm');
            $jgArr = $jgxm->join('jgxm on cp_jgxm.cid = jgxm.id')->where('uid = ' . $data['uid'])->select();
            if ($jgArr > 0) {
                $jgArr = $this->audit_view_data($jgArr, $slt, 'jgxm');
                $this->assign('info13', $jgArr);
            } else {
                $this->assign('info13', $info13);
            }
            // 奖罚
            $info6 = $this->selectJf($data['uid']);
            $jf = M('cp_jf');
            $jfAry = $jf->join('jf on cp_jf.cid = jf.id')->where('uid = ' . $data['uid'])->select();
            if ($jfAry > 0) {
                $jfArr = $this->audit_view_data($jfAry, $slt, 'jf');
                $this->assign('info6', $jfArr);
            } else {
                $this->assign('info6', $info6);
                //dump($jlArr);
            }*/
        } else {
            $this->error('没有找到该用户');
        }
        $this->display();

    }
   /* //显示教务处二审界面
    public function audited_jwc()
    {
        $this->check_user_request('管理员');
		$this->checkpasschange();
		$this->readconfig();
        $slt = $this->data['qk'];
        $data['uid'] = $_GET['id'];
        $user = M('user');
        $num = $user->where('id = ' . $data['uid'])->getField('status');
        if ($num == AUDIT_THEN) {
            $info1 = $this->selectUser($data['uid']);
            $this->assign('info1', $info1);
            $info2 = $this->selectInfo($data['uid']);
            $this->assign('info2', $info2);
            //教学工作
            $info9 = $this->selectGz($data['uid']);
            for ($i = 0; $i < count($info9); $i++) {
                $dataHj['zrs'] += $info9[$i]['xsrs'];
                $dataHj['zzs'] += $info9[$i]['zhxss'];
                $dataHj['zxs'] += $info9[$i]['zxss'];
            }
            $this->assign('hj', $dataHj);
            $gz = M('cp_jxgz');
            $gzArr = $gz->join('xzwcgz on cp_jxgz.cid = xzwcgz.id')->where('uid = ' . $data['uid'])->select();
            if ($gzArr > 0) {
                $gzArr = $this->audit_view_data($gzArr, $slt, 'jxgz');
                $this->assign('info9', $gzArr);
                $user = M('cp_user');
                $ary = $user->where('uid = ' . $data['uid'])->find();
                foreach ($ary as $key => $value) {
                    if ($value != null) {
                        for ($i = 0; $i < count($slt); $i++) {
                            if (strpos($slt[$i], $value)) {
                                $va[$i] = str_replace("value", ' selected = "true" value', $slt[$i]);
                                continue;
                            }
                            $va[$i] = $slt[$i];
                        }
                        $this->assign($key, $va);
                    }
                    //dump($vArr[1]);
                }
            } else {
                $this->assign('info9', $info9);
                $this->assign('list', $slt);
            }
            $info13 = $this->selectJgxm($data['uid']);
            $jgxm = M('cp_jgxm');
            $jgArr = $jgxm->join('jgxm on cp_jgxm.cid = jgxm.id')->where('uid = ' . $data['uid'])->select();
            if ($jgArr > 0) {
                $jgArr = $this->audit_view_data($jgArr, $slt, 'jgxm');
                $this->assign('info13', $jgArr);
            } else {
                $this->assign('info13', $info13);
            }
        } else {
            $this->error('没有找到该用户');
        }
        $this->display();
		
    }*/

    /**
     * 接收教务处-教研科.
     */
    public function auditTwoJyk()
    {
        $this->check_user_request('管理员');
		$this->checkpasschange();
		$id = $_POST['hidden'];
        $this->getAuditYy($id);
        $userArr['jxrwzs'] = $_POST['jxrwzs'];
        $userArr['jxggzs'] = $_POST['jxggzs'];
        $userArr['hjzs'] = $_POST['hjzs'];
        //接收教学工作审核
        $gzArr = $this->selectGz($id);
        // dump($gzArr);
        for ($i = 0; $i < count($gzArr); $i++) {
            // dump($_POST['jxgz' . $gzArr[$i]['id']]);
            if ($_POST['jxgz' . $gzArr[$i]['id']] != null) {
                $gzData[$gzArr[$i]['id']] = $_POST['jxgz' . $gzArr[$i]['id']];
            }
        }
        // dump($gzData);exit;
        $this->audit_data($gzData, $id, 'jxgz', true);
        //接收教改项目审核
       /* $jgArr = $this->selectJgxm($id);
        for ($i = 0; $i < count($jgArr); $i++) {
            $jgData[$jgArr[$i]['id']] = $_POST['jgxm' . $jgArr[$i]['id']];
        }
        $this->audit_data($jgData, $id, 'jgxm');*/
        //接收教学奖罚
        /*$jfArr = $this->selectJf($id);
        for ($i = 0; $i < count($jfArr); $i++) {
            $jfData[$jfArr[$i]['id']] = $_POST['jf' . $jfArr[$i]['id']];
        }
        $this->audit_data($jfData, $id, 'jf');*/
        $user = M('cp_user');
        $arrId = $user->where('uid = ' . $id)->getField('id');
        if ($arrId > 0) {
            $data1['id'] = $arrId;
            foreach ($userArr as $key => $value) {
                //dump('fd');
                $data1[$key] = $value;
            }
            $user->save($data1);
            //dump($userArr);
        } else {
            $data1['uid'] = $id;
            foreach ($userArr as $key => $value) {
                $data1[$key] = $value;
            }
            $user->add($data1);
        }
        $m = M('User');
        $username = $m->where('id = ' . $_SESSION['user_id'])->getField('username');
        $status['user'] = $data1;
        $status['jxgz'] = $gzData;
        // $status['jgxm'] = $jgData;
        // $status['jf'] = $jfData;
        parent::logOP($username, '审核', json_encode($status));
        // $this->check_two_audit($id);
        $this->success('审核成功', '__URL__/audit_two_user');

    }

    /**
     * 显示教务处-教材科.
     */
    public function audited_jwcjck()
    {
        $this->check_user_request('管理员');
        $this->checkpasschange();
        $this->readconfig();
        $slt = $this->data['qk'];
        $data['uid'] = $_GET['id'];
        $user = M('user');
        $num = $user->where('id = ' . $data['uid'])->getField('status');
        if ($num == AUDIT_THEN) {
            $bt = $this->viewZwTime($data['uid']);
            $this->assign('bt', $bt);
            //教材
            $info17 = $this->selectJc($data['uid']);
            $this->assign('id', $data['uid']);
            $jc = M('cp_jc');
            $jcArr = $jc->join('jc on cp_jc.cid = jc . id')->where('cp_jc.uid = ' . $data['uid'])->select();
            if ($jcArr > 0) {
                $jcArr = $this->audit_view_data($jcArr, $slt, 'jc');
                $this->assign('info17', $jcArr);
            } else {
                // dump($info17);exit;
                $this->assign('info17', $info17);
                $this->assign('list', $slt);
            }
        } else {
            $this->error('没有找到该用户');
        }
        $this->display();
    }

    /**
     * 接收教务处-教材科.
     */
    public function auditTwoJck()
    {
        $this->check_user_request('管理员');
        $this->checkpasschange();
        $id = $_POST['hidden'];
        $this->getAuditYy($id);
        // 接收教材的数据信息
        $jcArr = $this->selectJc($id);
        for ($i = 0; $i < count($jcArr); $i++) {
            $jcData[$jcArr[$i]['id']] = $_POST['jc' . $jcArr[$i]['id']];
        }
        $this->audit_data($jcData, $id, 'jc');
        // dump($jcArr);exit;
        $m = M('User');
        $username = $m->where('id = ' . $_SESSION['user_id'])->getField('username');
        $status['jc'] = $jcData;
        parent::logOP($username, '审核', json_encode($status));
        // $this->update_user_status($id);
        $this->success('审核成功', '__URL__/audit_two_user');
    }

    /**
     * 显示教务处-实践科.
     */
    public function audited_jwcsjk()
    {
        $this->check_user_request('管理员');
        $this->checkpasschange();
        $this->readconfig();
        $slt = $this->data['qk'];
        $data['uid'] = $_GET['id'];
        $user = M('user');
        $num = $user->where('id = ' . $data['uid'])->getField('status');
        if ($num == AUDIT_THEN) {
            $bt = $this->viewZwTime($data['uid']);
            $this->assign('bt', $bt);
            $this->assign('idUser', $data['uid']);
            //教学工作
            $info3 = $this->selectGz($data['uid']);
            for ($i = 0; $i < count($info3); $i++)
            {
                if ($info3[$i]['mcrw'] == '毕业设计') {
                    $info9[$i] = $info3[$i];
                }
            }
            $gz = M('cp_jxgz');
            $gzArr = $gz->join('xzwcgz on cp_jxgz.cid = xzwcgz.id')->where('cp_jxgz.uid=' . $data['uid'] . ' AND mcrw=\'毕业设计\'')->select();
            if ($gzArr > 0) {
                $gzArr = $this->audit_view_data($gzArr, $slt, 'jxgz');
                $this->assign('info9', $gzArr);
                $user = M('cp_user');
                $ary = $user->where('uid = ' . $data['uid'])->find();
                foreach ($ary as $key => $value) {
                    if ($value != null) {
                        for ($i = 0; $i < count($slt); $i++) {
                            if (strpos($slt[$i], $value)) {
                                $va[$i] = str_replace("value", ' selected = "true" value', $slt[$i]);
                                continue;
                            }
                            $va[$i] = $slt[$i];
                        }
                        $this->assign($key, $va);
                    }
                    //dump($vArr[1]);
                }
            } else {
                if (!$info9) {
                    $this->error('此用户没有相应的信息');
                }
                $this->assign('info9', $info9);
                $this->assign('list', $slt);
            }
        } else {
            $this->error('没有找到该用户');
        }
        $this->display();
    }

    /**
     * 接收教务处-实践科.
     */
    public function auditTwoSjk()
    {
        $this->check_user_request('管理员');
        $this->checkpasschange();
        $id = $_POST['hidden'];
        $this->getAuditYy($id);
        //接收教学工作审核
        $gzArr = $this->selectGz($id);
        for ($i = 0; $i < count($gzArr); $i++) {
            if ($_POST['jxgz' . $gzArr[$i]['id']] != null) {
                $gzData[$gzArr[$i]['id']] = $_POST['jxgz' . $gzArr[$i]['id']];
            }
        }
        $bool = true;
        $this->audit_data($gzData, $id, 'jxgz', $bool);
        // dump($gzArr);exit;

        $m = M('User');
        $username = $m->where('id = ' . $_SESSION['user_id'])->getField('username');
        $status['jxgz'] = $gzData;
        parent::logOP($username, '审核', json_encode($status));
        // $this->check_two_audit($id);
        $this->success('审核成功', '__URL__/audit_two_user');
    }

    //显示研究生处二审界面
    public function audited_yjs()
    {
        $this->check_user_request('管理员');
		$this->checkpasschange();
		$this->readconfig();
        $slt = $this->data['qk'];
        $data['uid'] = $_GET['id'];
        $user = M('user');
        $num = $user->where('id = ' . $data['uid'])->getField('status');
        if ($num == AUDIT_THEN) {
            $bt = $this->viewZwTime($data['uid']);
            $this->assign('bt', $bt);
            $this->assign('idUser', $data['uid']);
            $info2 = $this->selectInfo($data['uid']);
            $this->assign('info2', $info2);
            $user = M('cp_user');
            $zdyjs = $user->where('uid = ' . $data['uid'])->getField('zdyjs');
            // dump($zdyjs);exit;
            $this->assign('zdyjsId', $zdyjs);
            if ($zdyjs > 0) {
                $ary = $user->where('uid = ' . $data['uid'])->find();
                foreach ($ary as $key => $value) {
                    if ($value != null) {
                        for ($i = 0; $i < count($slt); $i++) {
                            if (strpos($slt[$i], $value)) {
                                $va[$i] = str_replace("value", ' selected = "true" value', $slt[$i]);
                                continue;
                            }
                            $va[$i] = $slt[$i];
                        }
                        $this->assign($key, $va);
                    }
                    //dump($vArr[1]);
                }
            } else {
                // $this->assign('list', $slt);
            }
            // 教学工作-备注是研究生
            $info3 = $this->selectGz($data['uid']);
            for ($i = 0; $i < count($info3); $i++)
            {
                if ($info3[$i]['bz'] == '研究生') {
                    $info9[$i] = $info3[$i];
                }
            }
            $gz = M('cp_jxgz');
            // $jxArr = array($ary['uid'] = array('eq', $data['uid']), $ary['mcrw'] = array('neq', '毕业设计'));
            $gzArr = $gz->join('xzwcgz on cp_jxgz.cid = xzwcgz.id')->where('cp_jxgz.uid='
                . $data['uid'] . ' AND xzwcgz.bz=\'研究生\'')->select();

            if ($gzArr > 0) {
                $gzArr = $this->audit_view_data($gzArr, $slt, 'jxgz');
                $this->assign('info9', $gzArr);
                $user = M('cp_user');
                $ary = $user->where('uid = ' . $data['uid'])->find();
                foreach ($ary as $key => $value) {
                    if ($value != null) {
                        for ($i = 0; $i < count($slt); $i++) {
                            if (strpos($slt[$i], $value)) {
                                $va[$i] = str_replace("value", ' selected = "true" value', $slt[$i]);
                                continue;
                            }
                            $va[$i] = $slt[$i];
                        }
                        $this->assign($key, $va);
                    }
                    //dump($vArr[1]);
                }
            } else {
                $this->assign('info9', $info9);
                $this->assign('list', $slt);
            }
        } else {
            $this->error('没有找到该用户');
        }
        $this->display();
    }

    //接收研究生二审情况
    public function get_yjs()
    {
        $this->check_user_request('管理员');
		$this->checkpasschange();
		$id = $_POST['hidden'];
        $this->getAuditYy($id);
        $userArr['zdyjs'] = $_POST['zdyjs'];
        $user = M('cp_user');
        $arr = $user->where('uid = ' . $id)->select();
        if ($arr > 0) {
            $data1['id'] = $arr[0]['id'];
            foreach ($userArr as $key => $value) {
                //dump('fd');
                $data1[$key] = $value;
            }
            $user->save($data1);
            //dump($userArr);
        } else {
            $data1['uid'] = $id;
            foreach ($userArr as $key => $value) {
                $data1[$key] = $value;
            }
            $user->add($data1);
        }
        //接收教学工作审核
        $gzArr = $this->selectGz($id);
        // dump($gzArr);
        for ($i = 0; $i < count($gzArr); $i++) {
            // dump($_POST['jxgz' . $gzArr[$i]['id']]);
            if ($_POST['jxgz' . $gzArr[$i]['id']] != null) {
                $gzData[$gzArr[$i]['id']] = $_POST['jxgz' . $gzArr[$i]['id']];
            }
        }
        // dump($gzData);exit;
        $this->audit_data($gzData, $id, 'jxgz', true);
        $m = M('User');
        $username = $m->where('id = ' . $_SESSION['user_id'])->getField('username');
        $status['user'] = $data1;
        $status['jxgz'] = $gzData;
        $status['jgxm'] = $jgData;
        parent::logOP($username, '审核', json_encode($status));
        // $this->check_two_audit($id);
        $this->success('审核成功', '__URL__/audit_two_user');
    }

    //显示科技处二审界面
    public function audited_kjc()
    {
        $this->check_user_request('管理员');
		$this->checkpasschange();
		$this->readconfig();
        $slt = $this->data['qk'];
        $data['uid'] = $_GET['id'];
        $user = M('user');
        $num = $user->where('id = ' . $data['uid'])->getField('status');
        if ($num == AUDIT_THEN) {
            $bt = $this->viewZwTime($data['uid']);
            $this->assign('bt', $bt);
            $this->assign('idUser', $data['uid']);
            $info1 = $this->selectUser($data['uid']);
            $this->assign('info1', $info1);
            $info2 = $this->selectInfo($data['uid']);
            $this->assign('info2', $info2);
            //发表论文
            $info10 = $this->selectFblw($data['uid']);
            $lw = M('cp_fblw');
            $lwArr = $lw->join('fblwl on cp_fblw.cid = fblwl.id')->where('uid = ' . $data['uid'])->select();
            if ($lwArr > 0) {
                $lwArr = $this->audit_view_data($lwArr, $slt, 'fblw');
                $this->assign('info10', $lwArr);
                $user = M('cp_user');
                $ary = $user->where('uid = ' . $data['uid'])->find();
                foreach ($ary as $key => $value) {
                    if ($value != null) {
                        for ($i = 0; $i < count($slt); $i++) {
                            if (strpos($slt[$i], $value)) {
                                $va[$i] = str_replace("value", ' selected = "true" value', $slt[$i]);
                                continue;
                            }
                            $va[$i] = $slt[$i];
                        }
                        $this->assign($key, $va);
                    }
                }
            } else {
                $this->assign('info10', $info10);
                // dump($slt);
                $this->assign('list', $slt);
            }
            //dump($info10);
            //专著类
            $info11 = $this->selectZzl($data['uid']);
            $zz = M('cp_zzl');
            $zzArr = $zz->join('zzl on cp_zzl.cid = zzl.id')->where('uid = ' . $data['uid'])->select();
            if ($zzArr > 0) {
                $zzArr = $this->audit_view_data($zzArr, $slt, 'zzl');
                $this->assign('info11', $zzArr);
            } else {
                $this->assign('info11', $info11);
            }
            //科研项目
            $info12 = $this->selectKyxm($data['uid']);
            $ky = M('cp_kyxm');
            $kyArr = $ky->join('kyxm on cp_kyxm.cid = kyxm.id')->where('uid = ' . $data['uid'])->select();
            if ($kyArr > 0) {
                $kyArr = $this->audit_view_data($kyArr, $slt, 'kyxm');
                $this->assign('info12', $kyArr);
            } else {
                $this->assign('info12', $info12);
            }
            //科研获奖
            $info15 = $this->selectKyhj($data['uid']);
            $kyhj = M('cp_kyhj');
            $kyhjArr = $kyhj->join('kyhj on cp_kyhj.cid = kyhj.id')->where('uid = ' . $data['uid'])->select();
            if ($kyhjArr > 0) {
                $kyhjArr = $this->audit_view_data($kyhjArr, $slt, 'kyhj');
                $this->assign('info15', $kyhjArr);
            } else {
                $this->assign('info15', $info15);
            }
            //发明专利
            $info16 = $this->selectFmzl($data['uid']);
            $fmzl = M('cp_fmzl');
            $fmzlArr = $fmzl->join('fmzl on cp_fmzl.cid = fmzl.id')->where('uid = ' . $data['uid'])->select();
            if ($fmzlArr > 0) {
                $fmzlArr = $this->audit_view_data($fmzlArr, $slt, 'fmzl');
                $this->assign('info16', $fmzlArr);
            } else {
                $this->assign('info16', $info16);
            }
        } else {
            $this->error('没有找到该用户');
        }
        $this->display();
    }

    //接收科技处二审的数据
    public function get_kjc()
    {
        $this->check_user_request('管理员');
		$this->checkpasschange();
		$id = $_POST['hidden'];
        $this->getAuditYy($id);
        $userArr['lwzzzs'] = $_POST['lwzzzs'];
        $userArr['kyhjzs'] = $_POST['kyhjzs'];
        //接收发表论文审核
        $lwArr = $this->selectFblw($id);
        for ($i = 0; $i < count($lwArr); $i++) {
            $lwData[$lwArr[$i]['id']] = $_POST['fblw' . $lwArr[$i]['id']];
        }
        $this->audit_data($lwData, $id, 'fblw');
        //接收专著类审核
        $zzArr = $this->selectZzl($id);
        for ($i = 0; $i < count($zzArr); $i++) {
            $zzData[$zzArr[$i]['id']] = $_POST['zzl' . $zzArr[$i]['id']];
        }
        $this->audit_data($zzData, $id, 'zzl');
        //接收科研项目审核
        $kyArr = $this->selectKyxm($id);
        for ($i = 0; $i < count($kyArr); $i++) {
            $kyData[$kyArr[$i]['id']] = $_POST['kyxm' . $kyArr[$i]['id']];
        }
        $this->audit_data($kyData, $id, 'kyxm');
        //接收科研获奖
        $kyhjArr = $this->selectKyhj($id);
        for ($i = 0; $i < count($kyhjArr); $i++) {
            $kyhjData[$kyhjArr[$i]['id']] = $_POST['kyhj' . $kyhjArr[$i]['id']];
        }
        $this->audit_data($kyhjData, $id, 'kyhj');
        $fmzlArr = $this->selectFmzl($id);
        //接收发明专利审核的数据
        for ($i = 0; $i < count($fmzlArr); $i++) {
            $fmzlData[$fmzlArr[$i]['id']] = $_POST['fmzl' . $fmzlArr[$i]['id']];
        }
        $this->audit_data($fmzlData, $id, 'fmzl');
        $user = M('cp_user');
        $arr = $user->where('uid = ' . $id)->select();
        if ($arr > 0) {
            $data1['id'] = $arr[0]['id'];
            foreach ($userArr as $key => $value) {
                //dump('fd');
                $data1[$key] = $value;
            }
            $user->save($data1);
            //dump($userArr);
        } else {
            $data1['uid'] = $id;
            foreach ($userArr as $key => $value) {
                $data1[$key] = $value;
            }
            $user->add($data1);
        }
        //dump($userArr);
        //die;
        $m = M('User');
        $username = $m->where('id = ' . $_SESSION['user_id'])->getField('username');
        $status['fblw'] = $lwData;
        $status['zzl'] = $zzData;
        $status['kyxm'] = $kyData;
        $status['kyhj'] = $kyhjData;
        $status['fmzl'] = $fmzlData;
        /* dump($status['jl']);
        implode($status);
        dump(implode(' - ',$status));
        exit; */
        parent::logOP($username, '审核', json_encode($status));
        // $this->check_two_audit($id);
        $this->success('审核成功', '__URL__/audit_two_user');
    }

    /**
     * 控制审核的用户颜色问题.
     *
     * @param array $data 查询用户的一个数组.
     * @param string $table 查询的表名.
     * @param string $str 特殊字符窜.
     *
     * @return array
     */
    public function auditUserColor($data, $table, $str)
    {
        for ($i = 0; $i < count($data); $i++) {
            $daArr[$i] = $data[$i]['id'];
        }
        $m = M('cp_' . $table);
        switch ($str) {
            case 'jyk':
                foreach ($daArr as $val) {
                    $arr = $m->where('uid=' . $val)->getField('jxrwzs');
                    if ($arr > 0) {
                        $ary[] = 1;
                    } else {
                        $ary[] = '';
                    }
                }
                break;
            case 'jck':
                foreach ($daArr as $val) {
                    $arr = $m->where('uid=' . $val)->count();
                    if ($arr > 0) {
                        $ary[] = 1;
                    } else {
                        $ary[] = '';
                    }
                }
                break;
            case 'sjk':
                foreach ($daArr as $val) {
                    $arr = $m->join('xzwcgz on cp_jxgz.cid=xzwcgz.id')->where('cp_jxgz.uid=' .
                        $val . ' and xzwcgz.mcrw="毕业设计"')->select();
                    if ($arr) {
                        $ary[] = 1;
                    } else {
                        $ary[] = '';
                    }
                }
                break;
            case 'kjc':
                foreach ($daArr as $val) {
                    $arr = $m->where('uid=' . $val)->count();
                    if ($arr > 0) {
                        $ary[] = 1;
                    } else {
                        $ary[] = '';
                    }
                }
                break;
            case 'yjs':
                foreach ($daArr as $val) {
                    $arr = $m->where('uid=' . $val)->getField('zdyjs');
                    if ($arr > 0) {
                        $ary[] = 1;
                    } else {
                        $ary[] = '';
                    }
                }
                break;
            case 'pt':
                foreach ($daArr as $val) {
                    $arr = $m->where('uid=' . $val)->count();
                    if ($arr > 0) {
                        $ary[] = 1;
                    } else {
                        $ary[] = '';
                    }
                }
                break;
        }
        for ($i = 0; $i < count($ary); $i++) {
            $data[$i]['qk'] = $ary[$i];
        }
       return $data;
    }
    // 显示三审的用户
    public function auditThreeUser()
    {
        $this->check_user_request('管理员');
        $this->checkpasschange();
        import('ORG.Util.Page');
        $id = $_SESSION['user_id'];
        $user = M('User');
        $dataArr = $user->field('qx, bm')->where('id = ' . $id)->find();
        if ($dataArr['qx'] == '三审管理员') {
            $data['bm'] = $dataArr['bm'];
            $data['status'] = AUDIT_THEN;
            $count = $user->where($data)->count();
            $Page = new Page($count, 5); // 实例化分页类 传入总记录数和每页显示的记录数
            $show = $Page->show();
            $list = $user->where($data)->limit($Page->firstRow . ',' . $Page->listRows)->select();
            $liArr = $this->auditUserColor($list, 'jf' ,'pt');
            for ($i = 0; $i < count($list); $i++) {
                $list[$i]['result'] = $str;
                $list[$i]['jwcs'] = $jwcs;
            }
            // $this->assign('jwcs', $jwcs);
            $this->assign('info', $liArr);
            $this->assign('page', $show);
            $this->assign('range', $count);
            $this->display();
        } else {
            $this->error('对不起，你没有该权限');
        }
    }
    // 检查三审是否全部通过
    /* 全部通过状态是1，没有通过是-1 */
   /* public function check_two_audit($id)
    {
        $this->check_user_request('管理员');
		$user = M('cp_user');
        $arr = $user->field('jxrwzs,jxggzs,lwzzzs,kyhjzs,zdyjs')->where('uid = ' . $id)->find();
        if ($arr > 0) {
            foreach ($arr as $val) {
                if ($val != 1) {
                    return -1;
                }
            }
            $ary = array('fblw', 'fmzl', 'jc', 'jgxm', 'jxgz', 'kyhj', 'kyxm', 'zzl');
            foreach ($ary as $vl) {
                $m = M('cp_' . $vl);
                $data = $m->where('uid = ' . $id)->select();
                if ($data > 0) {
                    for ($i = 0; $i < count($data); $i++) {
                        if ($data[$i][$vl . 'qk'] != 1) {
                            return -1;
                        }
                    }
                }
            }
            $n = M('user');
            $data1['id'] = $id;
            $data1['status'] = AUDIT_END;
            $num = $n->save($data1);
            if ($num > 0) {
                return 1;
            }
        }
    }*/

    /**
     * 显示控制用户登陆时间的权限.
     *
     */
    public function viewLoginTime()
    {
        $this->check_user_request('admin');
        $this->checkpasschange();
        $this->readconfig();
        $pty = $gly = $this->data['year'];
        $ptm = $glm = $this->data['month'];
        $ptd = $gld = $this->data['day'];
        $time = $this::getLimitTime();
        if ($time) {
            // 管理员时间的显示
            for ($i = 0; $i < count($gly); $i++) {
                if (strpos($gly[$i], $time['gl'][0])) {
                    $gly[$i] = '<option selected="true" value="' . $time['gl'][0] . '">' . $time['gl'][0] . '</option>';
                }
            }
            for ($i = 0; $i < count($glm); $i++) {
                if (strpos($glm[$i], $time['gl'][1])) {
                    $glm[$i] = '<option selected="true" value="' . $time['gl'][1] . '">' . $time['gl'][1] . '</option>';
                }
            }
            for ($i = 0; $i < count($gld); $i++) {
                if (strpos($gld[$i], $time['gl'][2])) {
                    $gld[$i] = '<option selected="true" value="' . $time['gl'][2] . '">' . $time['gl'][2] . '</option>';
                }
            }
            // 普通用户的时间显示
            for ($i = 0; $i < count($pty); $i++) {
                if (strpos($pty[$i], $time['pt'][0])) {
                    $pty[$i] = '<option selected="true" value="' . $time['pt'][0] . '">' . $time['pt'][0] . '</option>';
                }
            }for ($i = 0; $i < count($ptm); $i++) {
                if (strpos($ptm[$i], $time['pt'][1])) {
                    $ptm[$i] = '<option selected="true" value="' . $time['pt'][1] . '">' . $time['pt'][1] . '</option>';
                }
            }for ($i = 0; $i < count($ptd); $i++) {
                if (strpos($ptd[$i], $time['pt'][2])) {
                    $ptd[$i] = '<option selected="true" value="' . $time['pt'][2] . '">' . $time['pt'][2] . '</option>';
                }
            }
            $this->assign('gly', $gly);
            $this->assign('glm' , $glm);
            $this->assign('gld', $gld);
            $this->assign('pty', $pty);
            $this->assign('ptm' , $ptm);
            $this->assign('ptd', $ptd);
        } else {
            $this->assign('gly', $gly);
            $this->assign('glm' , $glm);
            $this->assign('gld', $gld);
            $this->assign('pty', $pty);
            $this->assign('ptm' , $ptm);
            $this->assign('ptd', $ptd);
        }
        $this->display();
    }

    /**
     * 获取用户登陆时间权限(如：登陆).
     *
     * @param string $str 提示信息.
     */
    public function setLoginTime()
    {
        $this->check_user_request('admin');
        $this->checkpasschange();
        $gl = $_POST['gly'] . '-' . $_POST['glm'] . '-' . $_POST['gld'];
        $pt = $_POST['pty'] . '-' . $_POST['ptm'] . '-' . $_POST['ptd'];
        $str = $gl . '#' . $pt;
        $path = './Log/userLoginTime.txt';
        $file = fopen($path, 'w+');
        if (fwrite($file, $str)) {
            fclose($file);
            $this->success('设置时间成功', __URL__/viewLoginTime);
        } else {
            $this->error('设置时间失败');
        }
    }

    /**
     * 获取时间.
     *
     * @return array|boolean
     */
    public static function getLimitTime()
    {
        $file = file("./Log/userLoginTime.txt");
        fclose($file);
        if (!empty($file)) {
            $arr = explode('#', $file[0]);
            $ary['gl'] = explode('-', $arr[0]);
            $ary['pt'] = explode('-', $arr[1]);
            return $ary;
        }
        return false;
    }

}
