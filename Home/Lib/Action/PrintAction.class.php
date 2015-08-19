<?php

class PrintAction extends CommonAction
{
    public $tishiinfo;

	/**
	 * 构造方法
	 */
	public function __construct(){
		parent::__construct();
		$this->check_user_request('普通用户');
	}
    /**
     * 检测修改密码
     */
    public function checkpasschange()
    {
        $data['id'] = $_SESSION['user_id'];
        $user = M('User');
        $info = $user->where($data)->select();
        if ($info['0']['password'] == '123456') {
            $this->error('请修改初始密码', '__APP__/System/changepass');
        }
    }

    /**
     * 去空数组公用函数
     */
    public function rm_null($data)
    {
        for ($i = 0; $i < count($data); $i++) {
            if ($data["$i"] != '') {
                $temp[] = $data["$i"];
            }
        }
        return $temp;
    }

    /**
     * 根据数组查询数据库
     */
    public function common_select($data, $flag)
    {
        return $temp_info_array;
    }

    /**
     * 初始化文件信息
     */
    public function initfile_jb()
    {
        $temp['id'] = $_SESSION['user_id'];
        $user = M('User');
        $userinfo = $user->where($temp)->select();
        $path = './Home/Rec/' . $temp['id'] . $userinfo['0']['username'] . 'jb';
		$path = iconv("UTF-8", "GBK", $path);
        return $path;
    }


    public function jdbinit()
    {
        $path = $this->initfile_jb();
        $file = fopen('./Public/Json/print/jb.data', 'r') or die("Unable to open file!");;
        while (!feof($file)) {
            $temp[] = fgets($file);
        }
        fclose($file);
        for ($i = 0; $i < count($temp); $i++) {
            $data[] = '';
        }
        for ($i = 0; $i < count($data); $i++) {
            if (is_file($path . $i . '.data')) {
                $sbdatatishi["$i"] = '<span style="color:green;">已选择</span>';
            } else {
                $sbdatatishi["$i"] = '<span style="color:red;">未选择</span>';
            }
        }
    //    dump($sbdatatishi);
        $this->assign('sbdatatishi',$sbdatatishi);
    }

    /**
     * 这是一个公用方法
     */
    public function common_select_data()
    {
        $this->checkpasschange();
        $data['id'] = $_SESSION['user_id'];
	
		$user = M('User');
		$user_status = $user->where($data)->select();
	//	dump($user_status);
        //个人信息
        if($user_status['0']['status'] == 0 || $user_status['0']['status'] == 1){
			$user = M('User');
			$info = $user->where($data)->select();
			$this->assign('userinfo', $info);

			//部分个人信息
			$time = M('Info');
			$tx_time = $time->where('iid = ' . $data['id'])->select();
			$time_temp = explode('-', $tx_time['0']['sj']);
			$this->assign('data', $time_temp);
			$this->assign('info2', $tx_time);
			$xsttzw_temp = $tx_time['0']['rhzw'];
			$xstizw = explode('、',$xsttzw_temp);
			$this->assign('xstizw',$xstizw);
			$zyinfo = explode('-',$tx_time['0']['xrjszw']);
			$this->assign('zyinfo',$zyinfo);
			if(count($xstizw) >= 3){
				$xstizw_style['0'] = '<span style="font-size:12">';
				$xstizw_style['1'] = '</span>';
				$this->assign('xstizw_style',$xstizw_style);
			}
			$xl = M('Xl');
			$xlinfo = $xl->where('xlid = ' . $data['id'])->select();
			for ($i = 0; $i < count($xlinfo); $i++) {
				if ($xlinfo["$i"]['xl'] == '本科' && $xlinfo["$i"]['rzxx'] == '学习') {
					$bkxl = $xlinfo["$i"];
					continue;
				}
				if ($xlinfo["$i"]['xl'] != '本科' && $xlinfo["$i"]['rzxx'] == '学习') {
					$yjsxl[] = $xlinfo["$i"];
				}
				if ($xlinfo["$i"]['xl'] != '本科' && $xlinfo["$i"]['rzxx'] == '学习') {
					$yjsxls[] = $xlinfo["$i"];
				}
			}
			if(count($xlinfo) > 16){
			
			}else{
				$this->assign('xlinfo',$xlinfo);
				for($i = 0 ;$i < 16 - count($xlinfo);$i++){
					$xl_data_list[] = '';
				}
				$this->assign('xlinfo',$xlinfo);
			}
			
			$yjsxl_style['0'] = '<span style="font-size:12px;">';
			$yjsxl_style['1'] = '</span>';
			$this->assign('yjsxl_style',$yjsxl_style);
		
			if( strlen($tx_time['0']['brzj']) > 6000 ){
				$brzj1['0'] = mb_substr($tx_time['0']['brzj'],0,2888,'utf-8');
				$brzj2['0'] = mb_substr($tx_time['0']['brzj'],2888,strlen($tx_time['0']['brzj'])-2888,'utf-8');
				$style = 'style="text-align: right;position: absolute;line-height: 1.5em;top: 5300px;"';
				$this->assign('style',$style);
			}else{
				$style = 'style="text-align: right;position: absolute;line-height: 1.5em;top: 4210px;"';
				$this->assign('style',$style);
				$brzj2['0'] = $tx_time['0']['brzj'];
			}

			$this->assign('xl_data_list',$xl_data_list);
			$this->assign('brzj2',$brzj2);
			$this->assign('brzj1',$brzj1);
			$this->assign('bkxl', $bkxl);
		   
			$bkxltemp = explode('.', $bkxl['kssj']);
			$bkxltime['kssjyear'] = $bkxltemp['0'];
			$bkxltime['kssjmonth'] = $bkxltemp['1'];
			$bkxltemp = explode('.', $bkxl['jssj']);
			$bkxltime['jssjyear'] = $bkxltemp['0'];
			$bkxltime['jssjmonth'] = $bkxltemp['1'];
		
			for($i = 0;$i < count($yjsxls) ; $i++){
				$tempkssj = explode('.',$yjsxls["$i"]['kssj']);
				$tempjssj = explode('.',$yjsxls["$i"]['jssj']);
				$yjsxls["$i"]['kssjyear'] = $tempkssj['0'];
				$yjsxls["$i"]['kssjmonth'] = $tempkssj['1'];
				$yjsxls["$i"]['jssjyear'] = $tempjssj['0'];
				$yjsxls["$i"]['jssjmonth'] = $tempjssj['1'];
			}
			
			
			$this->assign('bkxltime', $bkxltime);
			$this->assign('yjsxls', $yjsxls);
			dump($yjsxl);
			die;
			//学位
			$xw = M('Xw');
			$xwinfo = $xw->where('xwid = ' . $data['id'])->select();
		//	dump($xwinfo);
			$this->assign('xw', $xwinfo);
			if(count($wxinfo) > 2){
				$xwinfo_style['0'] = '<span style="font-size:12px;">' ;
				$xwinfo_style['1'] = '</span>';
				$this->assign('xwinfo_style',$xwinfo_style);
			}

			//国内外进修
			$gnwjx = M('Gnwjx');
			$gnwjxinfo = $gnwjx->where('gid = ' . $data['id'])->select();
			
			if(count($gnwjxinfo) == 0 || count($gnwjxinfo) == 1 && $gnwjxinfo['0']['qk'] == '无'){
				
			}else{
				if(count($gnwjxinfo) > 3){
					$gnwjxinfo_style['0'] = '<span style="font-size:12px;">' ;
					$gnwjxinfo_style['1'] = '</span>';
					$this->assign('gnwjxinfo_style',$gnwjxinfo_style);
				}
				$this->assign('gnwjxinfo', $gnwjxinfo);
			}
		  

			//奖罚
			$jf = M('Jf');
			$jfinfo = $jf->where('jid = ' . $data['id'])->select();
			for ($i = 0; $i < count($jfinfo); $i++) {
				if ($jfinfo['0']['qk'] == '无'){
					break;
				}
				if ($jfinfo["$i"]["status"] == '荣誉') {
					$ryinfo[] = $jfinfo["$i"];
					continue;
				}
				if ($jfinfo["$i"]["status"] == '获奖') {
					$hjinfo[] = $jfinfo["$i"];
					continue;
				}
			}
			
			$this->assign('jlcssopen','<span style="font-size:12px;">');
			$this->assign('jlcssclose','</span>');
			
			$this->assign('hjinfo', $hjinfo);
			$this->assign('ccinfo', $ccinfo);
		}
		if($user_status['0']['status'] == 2){
			$user = M('User');
			$info = $user->where($data)->select();
			$this->assign('userinfo', $info);
			$time = M('Info');
			$tx_time = $time->where('iid = ' . $data['id'])->select();
			$time_temp = explode('-', $tx_time['0']['sj']);
			$this->assign('data', $time_temp);
			$this->assign('info2', $tx_time);
			$xsttzw_temp = $tx_time['0']['rhzw'];
			$xstizw = explode('、',$xsttzw_temp);
			$this->assign('xstizw',$xstizw);
			$zyinfo = explode('-',$tx_time['0']['xrjszw']);
			$this->assign('zyinfo',$zyinfo);
			if(count($xstizw) >= 3){
				$xstizw_style['0'] = '<span style="font-size:12">';
				$xstizw_style['1'] = '</span>';
				$this->assign('xstizw_style',$xstizw_style);
			}
			
			//学历
			$cp_xl = M('cp_xl');
			$cp_xldata['uid'] = $_SESSION['user_id'];
			$cp_xldata['xlqk'] = 1;
			$cp_xlinfo = $cp_xl->where($cp_xldata)->select();
		//	dump($cp_xlinfo);
			for($i = 0 ;$i < count($cp_xlinfo) ; $i++){
				$xldata["$i"]['cid'] = $cp_xlinfo["$i"]['cid'];
			}
		//	dump($xldata);
			$xl = M('Xl');
			for($i = 0 ; $i <count($xldata) ; $i++){
				$xltemp[] = $xl->where(' id = '.$xldata["$i"]['cid'])->select();
			}
			for($i = 0 ;$i < count($xltemp) ;$i++){
				$xlinfo[] = $xltemp["$i"]['0'];
			}
		//	dump($xlinfo);
			for ($i = 0; $i < count($xlinfo); $i++) {
				if ($xlinfo["$i"]['xl'] == '本科' && $xlinfo["$i"]['rzxx'] == '学习') {
					$bkxl = $xlinfo["$i"];
					continue;
				}
				if ($xlinfo["$i"]['xl'] != '本科' && $xlinfo["$i"]['rzxx'] == '学习') {
					$yjsxl[] = $xlinfo["$i"];
				}
				if ($xlinfo["$i"]['xl'] != '本科' && $xlinfo["$i"]['rzxx'] == '学习') {
					$yjsxls[] = $xlinfo["$i"];
				}
			}
			if(count($xlinfo) > 16){
			
			}else{
				$this->assign('xlinfo',$xlinfo);
				for($i = 0 ;$i < 16 - count($xlinfo);$i++){
					$xl_data_list[] = '';
				}
				$this->assign('xlinfo',$xlinfo);
			}
			
			$yjsxl_style['0'] = '<span style="font-size:12px;">';
			$yjsxl_style['1'] = '</span>';
			$this->assign('yjsxl_style',$yjsxl_style);
		
			if( strlen($tx_time['0']['brzj']) > 6000 ){
				$brzj1['0'] = mb_substr($tx_time['0']['brzj'],0,2888,'utf-8');
				$brzj2['0'] = mb_substr($tx_time['0']['brzj'],2888,strlen($tx_time['0']['brzj'])-2888,'utf-8');
				$style = 'style="text-align: right;position: absolute;line-height: 1.5em;top: 5300px;"';
				$this->assign('style',$style);
			}else{
				$style = 'style="text-align: right;position: absolute;line-height: 1.5em;top: 4210px;"';
				$this->assign('style',$style);
				$brzj2['0'] = $tx_time['0']['brzj'];
			}

			$this->assign('xl_data_list',$xl_data_list);
			$this->assign('brzj2',$brzj2);
			$this->assign('brzj1',$brzj1);
			$this->assign('bkxl', $bkxl);
		   
			$bkxltemp = explode('.', $bkxl['kssj']);
			$bkxltime['kssjyear'] = $bkxltemp['0'];
			$bkxltime['kssjmonth'] = $bkxltemp['1'];
			$bkxltemp = explode('.', $bkxl['jssj']);
			$bkxltime['jssjyear'] = $bkxltemp['0'];
			$bkxltime['jssjmonth'] = $bkxltemp['1'];
		
			for($i = 0;$i < count($yjsxls) ; $i++){
				$tempkssj = explode('.',$yjsxls["$i"]['kssj']);
				$tempjssj = explode('.',$yjsxls["$i"]['jssj']);
				$yjsxls["$i"]['kssjyear'] = $tempkssj['0'];
				$yjsxls["$i"]['kssjmonth'] = $tempkssj['1'];
				$yjsxls["$i"]['jssjyear'] = $tempjssj['0'];
				$yjsxls["$i"]['jssjmonth'] = $tempjssj['1'];
			}		
			
			$this->assign('bkxltime', $bkxltime);
			$this->assign('yjsxls', $yjsxls);
			
			
			//学位
			$cp_xw = M('cp_xw');
			$cp_xwdata['uid'] = $_SESSION['user_id'];
			$cp_xwdata['xwqk'] = 1;
			$cp_xwinfo = $cp_xw->where($cp_xwdata)->select();
		//	dump($cp_xwinfo);
			for($i = 0 ;$i <count($cp_xwinfo) ; $i++){
				$xwdata["$i"]['cid'] = $cp_xwinfo["$i"]["cid"];
			}
			$xw = M('Xw');
			for($i = 0 ;$i < count($xwdata) ; $i++){
				$xwtemp[] = $xw->where('id = ' . $xwdata["$i"]['cid'])->select();
			}
		//	dump($xwtemp);
			for($i = 0 ;$i < count($xwtemp) ;$i++){
				$xwinfo[] = $xwtemp["$i"]['0'];
			}
			$this->assign('xw', $xwinfo);
			if(count($wxinfo) > 2){
				$xwinfo_style['0'] = '<span style="font-size:12px;">' ;
				$xwinfo_style['1'] = '</span>';
				$this->assign('xwinfo_style',$xwinfo_style);
			}
			
			
			//国内外进修
			$cp_jx = M('cp_jx');
			$cp_jxdata['uid'] = $_SESSION['user_id'];
			$cp_jxdata['jxqk'] = 1;
			$cp_jxinfo = $cp_jx->where($cp_jxdata)->select();
		//	dump($cp_jxinfo);
			$gnwjx = M('Gnwjx');
			for($i = 0 ;$i < count($cp_jxinfo) ; $i++){
				$gnwjxtemp[] = $gnwjx->where('id = ' . $cp_jxinfo["$i"]['cid'])->select();
			}
		//	dump($gnwjxtemp);
			for($i = 0 ;$i < count($gnwjxtemp) ; $i++){
				$gnwjxinfo[] = $gnwjxtemp["$i"]['0'];
			}
			if(count($gnwjxinfo) == 0 || count($gnwjxinfo) == 1 && $gnwjxinfo['0']['qk'] == '无'){
				
			}else{
				if(count($gnwjxinfo) > 3){
					$gnwjxinfo_style['0'] = '<span style="font-size:12px;">' ;
					$gnwjxinfo_style['1'] = '</span>';
					$this->assign('gnwjxinfo_style',$gnwjxinfo_style);
				}
				$this->assign('gnwjxinfo', $gnwjxinfo);
			}
			
			//奖罚
			$cp_jf = M('cp_jf');
			$cp_jfdata['uid'] = $_SESSION['user_id'];
			$cp_jfdata['jfqk'] = 1;
			$cp_jfinfo = $cp_jf->where($cp_jfdata)->select();
		//	dump($cp_jfinfo);
			$jf = M('Jf');
			for($i = 0 ;$i < count($cp_jfinfo) ; $i++){
				$jftemp[] = $jf->where(' status != "无" and id = ' . $cp_jfinfo['cid'])->select();
			}
		//	dump($jftemp);
			for($i = 0 ;$i < count($jftemp) ; $i++){
				$jfinfo[] = $jftemp["$i"]['0'];
			}
		//	dump($jfinfo);
			for ($i = 0; $i < count($jfinfo); $i++) {
				if ($jfinfo['0']['qk'] == '无'){
					break;
				}
				if ($jfinfo["$i"]["status"] == '荣誉') {
					$ryinfo[] = $jfinfo["$i"];
					continue;
				}
				if ($jfinfo["$i"]["status"] == '获奖') {
					$hjinfo[] = $jfinfo["$i"];
					continue;
				}
			}
			
			$this->assign('jlcssopen','<span style="font-size:12px;">');
			$this->assign('jlcssclose','</span>');
			
			$this->assign('hjinfo', $hjinfo);
			$this->assign('ccinfo', $ccinfo);
		}


       /*  //任现职以来完成教学工作情况
        $xzwcgz = M('Xzwcgz');
        $xzwcgzinfo = $xzwcgz->where('xzid = ' . $data['id'])->select();
		if(count($xzwcgzinfo) < 15 ){
			
			$two[] = '';
			$this->assign('two', $two);
			/* for($i = 0 ;$i < count($xzwcgzinfo) ; $i++){
				if(strlen($xzwcgzinfo["$i"]['mcrw']) > 50){
					$xzwcgzinfo["$i"]['mcrw'] = '<span style="font-size:8px;-webkit-transform: scale(0.55);">'.$xzwcgzinfo["$i"]['mcrw'].'</span>';
				}
			}
			for($i = 0 ;$i < 15-count($xzwcgzinfo) ;$i++){
				$kong[] ='';
			}
			$this->assign('xzwcgzinfo16', $xzwcgzinfo);
			$this->assign('wxwcgzkong',$kong);
			//dump($xzwcgzinfo);
		}elseif(count($xzwcgzinfo) == 1 && $xzwcgzinfo['0']['qk'] == '无' || count($xzwcgzinfo) == 0 ){
			for($i = 0 ;$i < 16 ;$i++){
				$kong[] = '';
			}
			$this->assign('kong', $kong);
		}else{
			if( count($xzwcgzinfo)/16 >= 1 && count($xzwcgzinfo)/16 < 2){
				for($i = 0 ;$i < 16 ;$i++){
					$xzwcgzinfo1[] = $xzwcgzinfo["$i"];
				}
				$one[] = '';
				for($i = 16 ;$i < count($xzwcgzinfo) ;$i++){
					$xzwcgzinfo16[] = $xzwcgzinfo["$i"];
				}
				$two[] = '';
				for($i = 0 ;$i < 16-(count($xzwcgzinfo)-15) ;$i++){
					$kong[] ='';
				}
				$this->assign('one', $one);
				$this->assign('wxwcgzkong', $kong);
				$this->assign('two', $two);
				$this->assign('xzwcgzinfo1', $xzwcgzinfo1);
				$this->assign('xzwcgzinfo16', $xzwcgzinfo16);
			}		
		}
       
	   //著作
        $fblwl = M('Fblwl');
        $fblwlinfo = $fblwl->where('fid = ' . $data['id'] . ' and qk not like "无" ')->select();
        $zzl = M('Zzl');
        $zzlinfo = $zzl->where('zid = ' . $data['id'] . ' and qk not like "无" ')->select();

		$jc = M('Jc');
		$jcinfo = $jc->where('uid = ' . $data['id'] . ' and qk not like "无" ')->select();
		if( (count($jcinfo) + count($fblwlinfo) + count($zzlinfo)) <= 16 ){
			$zlone['0'] = '';
			$this->assign('zlone',$zlone);
			$this->assign('fblwlinfo',$fblwlinfo);
			$this->assign('zzlinfo',$zzlinfo);
			$this->assign('jcinfo',$jcinfo);
			for($i = 0 ;$i < 16 - (count($jcinfo) + count($fblwlinfo) + count($zzlinfo)) ;$i++){
				$zlonekong[] = '';
			}
			$this->assign('zlonekong',$zlonekong);
		}else if( (count($jcinfo) + count($fblwlinfo) + count($zzlinfo)) > 16 &&  (count($jcinfo) + count($fblwlinfo) + count($zzlinfo)) < 32 ) {
			
		}else{
			
		}
        
		

        //科研项目类
        $kyxm = M('Kyxm');
        $kyxminfo = $kyxm->where('kyid = ' . $data['id'])->select();
		$kyhj = M('Kyhj');
        $kyhjinfo = $kyhj->where('kjid = ' . $data['id'])->select();
        $fmzl = M('Fmzl');
        $fmzlinfo = $fmzl->where('fmid = ' . $data['id'])->select(); */
		 
    }

    /**
     * 显示详细信息的页面
     */
    public function index()
    {	
		$this->common_select_data();
        $this->display();
    }

    /**
     * 自填部分打印
     */
    public function printpdf()
    {
        $this->checkpasschange();
        $data['id'] = $_SESSION['user_id'];

        //个人信息
        $user = M('User');
        $userinfo = $user->where($data)->select();
        $this->display();
    }

    /**
     * 选取简表的打印信息
     */
    public function select_jb()
    {
		$this->jdbinit();
        $data['id'] = $_SESSION['user_id'];
	
		$user = M('User');
		$user_status = $user->where($data)->select();
	//	dump($user_status);
        //个人信息
        if($user_status['0']['status'] == 0 || $user_status['0']['status'] == 1){
			$xw = M('Xw');
			$xwinfo = $xw->where('xwid = ' . $data['id'])->select();
			$this->assign('xw', $xwinfo);
			$this->assign('xw2', $xwinfo);
		
			$info = M('Info');
			$xsttinfo = $info->where('iid = ' . $data['id'])->select();
			$xstt = explode('、',$xsttinfo['0']['cjxstt']);
			$ttzw = explode('、',$xsttinfo['0']['rhzw']);
			for($i = 0 ;$i < count($xstt) ; $i++){
				$xszw["$i"] = $xstt["$i"].$ttzw["$i"]; 
			}
		
			if($xstt['0'] == '无'){
			
			}else{
				$this->assign('xstt',$xstt);
				$this->assign('ttzw',$ttzw);
				$this->assign('xszw',$xszw);
			}
			
			$jf = M('Jf');
			$jfinfo = $jf->where('jid = ' . $data['id'] .' and qk = "有"')->select();
			if($jftemp['0']){
				for($i = 0 ;$i < count($jftemp) ; $i++){
					$jfinfo[] = $jftemp["$i"]['0'];
				}
				$this->assign('jfinfo',$jfinfo);
			}
			
			$xl = M('Xl');
			$xlinfo = $xl->where('xlid = ' . $data['id'])->select();
			$this->assign('xlinfo',$xlinfo);
			
			$gnwjx = M('gnwjx');
			$gnwjxinfo = $gnwjx->where('gid = ' . $data['id'])->select();
			$this->assign('jxinfo',$gnwjxinfo);
			
			$rk = M('Xzwcgz');
			$option['xzid'] = $data['id'];
			$option['lx'] = '讲授';
			$rkinfo = $rk->where($option)->select();
			$this->assign('rkinfo',$rkinfo);
			
			$byoption['mcrw'] = '毕业设计';
			$byoption['xzid'] = $data['id'];
			$bysjinfo = $rk->where($byoption)->select();
		//	dump($bysjinfo);
		//	die();
			$this->assign('bysjinfo',$bysjinfo);
			
			$jc = M('Jc');
			$jcdata['uid'] = $data['id'];
			$jcdata['qk'] = '有';
			$jcinfo = $jc->where($jcdata)->select();
			$this->assign('jcinfo',$jcinfo);
			
			$zzl = M('Zzl');
			$zzldata['zid'] = $data['id'];
			$zzldata['qk'] = '有';
			$zzlinfo = $zzl->where($zzldata)->select();
			$this->assign('zzlinfo',$zzlinfo);
			
			$fblwl = M('Fblwl');
			$fblwldata['fid'] = $data['id'];
			$fblwldata['qk'] = '有';
			$fblwlinfo = $fblwl->where($fblwldata)->select();
			$this->assign('fblwlinfo',$fblwlinfo);
			
			$kyxm = M('Kyxm');
			$kyxmdata['kyid'] = $data['id'];
			$kyxmdata['qk'] = '有';
			$kyxminfo = $kyxm->where($kyxmdata)->select();
			$this->assign('kyxminfo',$kyxminfo);
			
			$kyhj = M('Kyhj');
			$kyhjdata['kjid'] = $data['id'];
			$kyhjdata['qk'] = '有';
			$kyhjinfo = $kyhj->where($kyhjdata)->select();
			$this->assign('kyhjinfo',$kyhjinfo);
			
			$fmzl = M('Fmzl');
			$fmzldata['fmid'] = $data['id'];
			$fmzldata['qk'] = '有';
			$fmzlinfo = $fmzl->where($fmzldata)->select();
			$this->assign('fmzlinfo',$fmzlinfo);
		}
		if($user_status['0']['status'] == 2){
			
			//学位
			$cp_xw = M('cp_xw');
			$cp_xwdata['uid'] = $_SESSION['user_id'];
			$cp_xwdata['xwqk'] = 1;
			$cp_xwinfo = $cp_xw->where($cp_xwdata)->select();
		//	dump($cp_xwinfo);
			for($i = 0 ;$i <count($cp_xwinfo) ; $i++){
				$xwdata["$i"]['cid'] = $cp_xwinfo["$i"]["cid"];
			}
			$xw = M('Xw');
			for($i = 0 ;$i < count($xwdata) ; $i++){
				$xwtemp[] = $xw->where('id = ' . $xwdata["$i"]['cid'])->select();
			}
		//	dump($xwtemp);
			for($i = 0 ;$i < count($xwtemp) ;$i++){
				$xwinfo[] = $xwtemp["$i"]['0'];
			}
			$this->assign('xw', $xwinfo);
			$this->assign('xw2', $xwinfo);
			
			$info = M('Info');
			$xsttinfo = $info->where('iid = ' . $data['id'])->select();
			$xstt = explode('、',$xsttinfo['0']['cjxstt']);
			$ttzw = explode('、',$xsttinfo['0']['rhzw']);
			for($i = 0 ;$i < count($xstt) ; $i++){
				$xszw["$i"] = $xstt["$i"].$ttzw["$i"]; 
			}
			if($xstt['0'] == '无'){
			
			}else{
				$this->assign('xstt',$xstt);
				$this->assign('ttzw',$ttzw);
				$this->assign('xszw',$xszw);
			}
			
			//奖罚
			$cp_jf = M('cp_jf');
			$cp_jfdata['uid'] = $_SESSION['user_id'];
			$cp_jfdata['jfqk'] = 1;
			$cp_jfinfo = $cp_jf->where($cp_jfdata)->select();

			$jf = M('Jf');
			for($i = 0 ;$i < count($cp_jfinfo) ; $i++){
				$jftemp[] = $jf->where(' status = "有" and id = ' . $cp_jfinfo['cid'])->select();
			}

			if($jftemp['0']){
				for($i = 0 ;$i < count($jftemp) ; $i++){
					$jfinfo[] = $jftemp["$i"]['0'];
				}
				$this->assign('jfinfo',$jfinfo);
			}
			
			//学历
			$cp_xl = M('cp_xl');
			$cp_xldata['uid'] = $_SESSION['user_id'];
			$cp_xldata['xlqk'] = 1;
			$cp_xlinfo = $cp_xl->where($cp_xldata)->select();

			for($i = 0 ;$i < count($cp_xlinfo) ; $i++){
				$xldata["$i"]['cid'] = $cp_xlinfo["$i"]['cid'];
			}

			$xl = M('Xl');
			for($i = 0 ; $i <count($xldata) ; $i++){
				$xltemp[] = $xl->where(' id = '.$xldata["$i"]['cid'])->select();
			}
			for($i = 0 ;$i < count($xltemp) ;$i++){
				$xlinfo[] = $xltemp["$i"]['0'];
			}
			$this->assign('xlinfo',$xlinfo);
			
			//国内外进修
			$cp_jx = M('cp_jx');
			$cp_jxdata['uid'] = $_SESSION['user_id'];
			$cp_jxdata['jxqk'] = 1;
			$cp_jxinfo = $cp_jx->where($cp_jxdata)->select();

			$gnwjx = M('Gnwjx');
			for($i = 0 ;$i < count($cp_jxinfo) ; $i++){
				$gnwjxtemp[] = $gnwjx->where('id = ' . $cp_jxinfo["$i"]['cid'])->select();
			}

			for($i = 0 ;$i < count($gnwjxtemp) ; $i++){
				$gnwjxinfo[] = $gnwjxtemp["$i"]['0'];
			}
			$this->assign('jxinfo', $gnwjxinfo);
			
			$cp_jxgz = M('cp_jxgz');
			$cp_jxgzdata['uid'] = $_SESSION['user_id'];
			$cp_jxgzdata['jxgzqk'] = 1;
			$cp_jxgzinfo = $cp_jxgz->where($cp_jxgzdata)->select();

			$xzwcgz = M('Xzwcgz');
			for($i = 0 ;$i < count($cp_jxgzinfo) ; $i++){
				$xzwcgztemp[] = $xzwcgz->where(' id = '.$cp_jxgzinfo["$i"]['cid'])->select();
			}

			for($i = 0 ; $i < count($xzwcgztemp) ; $i++){
				$xzwcgzinfo[] = $xzwcgztemp["$i"]['0'];
			}

			for($i = 0 ;$i < count($xzwcgzinfo) ; $i++){
				if($xzwcgzinfo["$i"]['mcrw'] == '毕业设计'){
					$bysjinfo[] = $xzwcgzinfo["$i"];
				}
				if($xzwcgzinfo["$i"]['lx'] = '讲授'){
					$rkinfo[] = $xzwcgzinfo["$i"];
				}
			}
			$this->assign('rkinfo',$rkinfo);
			$this->assign('bysjinfo',$bysjinfo);
			
			$cp_fblw = M('cp_fblw');
			$cp_fblwdata['uid'] = $_SESSION['user_id'];
			$cp_fblwdata['fblwqk'] = 1;
			$cp_fblwinfo = $cp_fblw->where($cp_fblwdata)->select();

			$fblwl = M('Fblwl');
			for($i = 0 ; $i < count($cp_fblwinfo) ; $i++){
				$fblwltemp[] = $fblwl->where('qk = "有" and id = '.$cp_fblwinfo["$i"]['cid'])->select();
			}

			for($i = 0 ;$i < count($fblwltemp) ; $i++){
				$fblwlinfo[] = $fblwltemp["$i"]['0'];
			}
			
			
			$cp_jc = M('cp_jc');
			$cp_jcdata['uid'] = $_SESSION['user_id'];
			$cp_jcdata['jcqk'] = 1;
			$cp_jcinfo = $cp_jc->where($cp_jcdata)->select();

			$jc = M('Jc');
			for($i = 0 ; $i < count($cp_jcinfo) ; $i++){
				$jctemp[] = $jc->where('qk = "有" and id = '.$cp_jcinfo["$i"]['cid'])->select();
			}

			for($i = 0 ;$i < count($jctemp) ; $i++){
				$jcinfo[] = $jctemp["$i"]['0'];
			}
			
			$cp_zzl = M('cp_zzl');
			$cp_zzldata['uid'] = $_SESSION['user_id'];
			$cp_zzldata['zzlqk'] = 1;
			$cp_zzlinfo = $cp_zzl->where($cp_zzldata)->select();

			$zzl = M('Zzl');
			for($i = 0 ; $i < count($cp_zzlinfo) ; $i++){
				$zzltemp[] = $zzl->where('qk = "有" and id = '.$cp_zzlinfo["$i"]['cid'])->select();
			}

			for($i = 0 ;$i < count($zzltemp) ; $i++){
				$zzlinfo[] = $zzltemp["$i"]['0'];
			}
			if($jcinfo['0']){
				$this->assign('jcinfo',$jcinfo);
			}
			if($zzlinfo['0']){
				$this->assign('zzlinfo',$zzlinfo);
			}
			if($fblwlinfo['0']){
				$this->assign('fblwlinfo',$fblwlinfo);
			}
			
			
			$cp_kyxm = M('cp_kyxm');
			$cp_kyxmdata['uid'] = $_SESSION['user_id'];
			$cp_kyxmdata['kyxmqk'] = 1;
			$cp_kyxminfo = $cp_kyxm->where($cp_kyxmdata)->select();

			$kyxm = M('Kyxm');
			for($i = 0 ; $i < count($cp_kyxminfo) ; $i++){
				$kyxmtemp[] = $kyxm->where('qk = "有" and id = '.$cp_kyxminfo["$i"]['cid'])->select();
			}

			for($i = 0 ;$i < count($kyxmtemp) ; $i++){
				$kyxminfo[] = $kyxmtemp["$i"]['0'];
			}

			$cp_kyhj = M('cp_kyhj');
			$cp_kyhjdata['uid'] = $_SESSION['user_id'];
			$cp_kyhjdata['kyhjqk'] = 1;
			$cp_kyhjinfo = $cp_kyhj->where($cp_kyhjdata)->select();

			$kyhj = M('Kyhj');
			for($i = 0 ; $i < count($cp_kyhjinfo) ; $i++){
				$kyhjtemp[] = $kyhj->where('qk = "有" and id = '.$cp_kyhjinfo["$i"]['cid'])->select();
			}

			for($i = 0 ;$i < count($kyhjtemp) ; $i++){
				$kyhjinfo[] = $kyhjtemp["$i"]['0'];
			}
			
			$cp_fmzl = M('cp_fmzl');
			$cp_fmzldata['uid'] = $_SESSION['user_id'];
			$cp_fmzldata['fmzlqk'] = 1;
			$cp_fmzlinfo = $cp_fmzl->where($cp_fmzldata)->select();

			$fmzl = M('Fmzl');
			for($i = 0 ; $i < count($cp_fmzlinfo) ; $i++){
				$fmzltemp[] = $fmzl->where('qk = "有" and id = '.$cp_fmzlinfo["$i"]['cid'])->select();
			}

			for($i = 0 ;$i < count($fmzltemp) ; $i++){
				$fmzlinfo[] = $fmzltemp["$i"]['0'];
			}
			if($kyxminfo['0']){
				$this->assign('kyxminfo',$kyxminfo);
			}
			if($kyhjinfo['0']){
				$this->assign('kyhjinfo',$kyhjinfo);
			}
			if($fmzlinfo['0']){
				$this->assign('fmzlinfo',$fmzlinfo);
			}
		}
		$this->display();
    }


    /**
     * 简表选取处理页面
     */


    /**
     * 打印申报表
     */
    public function print_pdf()
    {
        $this->display();
    }
	
	/**
	 * 打印简表
	 */
	public function print_jbpdf(){
		$this->display();
	}

    /**
     * 简表，申报表选择界面
     */
    public function select_sb_jb()
    {
        $this->checkpasschange();
        if ($_GET['page'] == 'index') {
            $page['url'] = 'index';
            $page['info'] = '申报表';

        } elseif ($_GET['page'] == 'index_jb') {
            $page['url'] = 'index_jb';
            $page['info'] = '简表';
            //  $this->error('测试中，请稍后', '__APP__/System/index');
        } else {
            $this->error('测试中，请稍后', '__APP__/System/index');
        }
        $this->assign('page', $page);
        $this->display();
    }

    /**
     * 简表信息预览
     */
    public function index_jb()
    {
        $data['id'] = $_SESSION['user_id'];
		$info = M('Info');
		$user = M('User');
		
		//最高学历
		$path = $this->initfile_jb();
		if(is_file($path.'0.data')){
			$file = fopen($path.'0.data','r');
			while(!feof($file)){
				$zgxl[] = fgets($file);
			}
			$this->assign('zgxl',$zgxl);
		}
		
		//下一级学历
		if(is_file($path.'1.data')){
			$file = fopen($path.'1.data','r');
			while(!feof($file)){
				$xyjxl[] = fgets($file);
			}
			$this->assign('xyjxl',$xyjxl);
		}
		
		//学术团体
		if(is_file($path.'2.data')){
			$file = fopen($path.'2.data','r');
			while(!feof($file)){
				$xstt[] = fgets($file);
			}
			$this->assign('xstt',$xstt);
		}
		
		//荣誉称号
		if(is_file($path.'3.data')){
			$file = fopen($path.'3.data','r');
			while(!feof($file)){
				$rych[] = fgets($file);
			}
			$this->assign('rych',$rych);
		}
		
		//学历经历
		if(is_file($path.'4.data')){
			$file = fopen($path.'4.data','r');
			while(!feof($file)){
				$xl_temp[] = fgets($file);
			}
			if($xl_temp['0'] === false ){
			
			}else{
			
				$xl = M('Xl');
				for($i = 0 ; $i < count($xl_temp) ; $i++){
					$xltemp[] = $xl->where('id = '.$xl_temp["$i"])->select();
				}
			
				for($i = 0 ; $i < count($xltemp) ; $i++){
					$xlinfo[] = $xltemp["$i"]['0'];
				}
				$this->assign('xljl',$xlinfo);
			}
		}
		
		//进修
		if(is_file($path.'5.data')){
			$file = fopen($path.'5.data','r');
			while(!feof($file)){
				$gnwjx_temp[] = fgets($file);
			}
			if($gnwjx_temp['0'] === false){
			
			}else{
			//	dump($jx_temp);
				$gnwjx = M('Gnwjx');
				for($i = 0 ; $i < count($gnwjx_temp) ; $i++){
					$gnwjxtemp[] = $gnwjx->where('id = '.$gnwjx_temp["$i"])->select();
				}
			//	dump($jxtemp);
				for($i = 0 ; $i < count($gnwjxtemp) ; $i++){
					$jxinfo[] = $gnwjxtemp["$i"]['0'];
				}
			//	dump($jxinfo);
				$this->assign('gnwjxinfo',$jxinfo);
			}
		}
		
		
		
		//任课12门
		if(is_file($path.'6.data')){
			$file = fopen($path.'6.data','r');
			$rktitle['0'] = '';
			$this->assign('rktitle',$rktitle);
			while(!feof($file)){
				$rk_temp[] = fgets($file);
			}
			if($rk_temp['0'] === false){
			
			}else{
			//	dump($jx_temp);
				$xzwcgz = M('Xzwcgz');
				for($i = 0 ; $i < count($rk_temp) ; $i++){
					$rktemp[] = $xzwcgz->where('id = '.$rk_temp["$i"])->select();
				}
			//	dump($jxtemp);
				for($i = 0 ; $i < count($rktemp) ; $i++){
					$rkinfo[] = $rktemp["$i"]['0'];
				}
			//	dump($jxinfo);
				if(count($rkinfo) > 6){
					for($i = 0 ;$i < 6;$i++){
						$rkinfo1[] = $rkinfo["$i"];
						
					}
					$rkone['0'] = ''; 
					$this->assign('rkinfo1',$rkinfo1);
					$this->assign('onerk',$rkone);
					for($i;$i < 12 ; $i++){
						$rkinfo2[] = $rkinfo["$i"];
						
					}
					$this->assign('rkinfo2',$rkinfo2);
				}else{
					$this->assign('rkinfo',$rkinfo);
				}
				
			}
		}
		
		//毕业设计
		if(is_file($path.'7.data')){
			$bydata['mcrw'] = '毕业设计';
			$bysjtitle['0'] = '';
			$this->assign('bysjtitle',$bysjtitle);
			$bydata['xzid'] = $data['id'];
			$file = fopen($path.'7.data','r');
			while(!feof($file)){
				$by_temp[] = fgets($file);
			}
			if($by_temp['0'] === false){
			
			}else{
			//	dump($jx_temp);
				$xzwcgz = M('Xzwcgz');
				for($i = 0 ; $i < count($by_temp) ; $i++){
					$bytemp[] = $xzwcgz->where($bydata)->select();
				}
			//	dump($jxtemp);
				for($i = 0 ; $i < count($bytemp) ; $i++){
					$byinfo[] = $bytemp["$i"]['0'];
				}
				$this->assign('bysjinfo',$byinfo);
				
			}
		}
		
		//主要教材
		if(is_file($path.'8.data')){
			$file = fopen($path.'8.data','r');
			while(!feof($file)){
				$jc_temp[] = fgets($file);
			}
			if($jc_temp['0'] === false){

			}else{
				$jc = M('Jc');
				for($i = 0 ; $i < count($jc_temp); $i++){
					$jctemp[] = $jc->where(' id = '.$jc_temp["$i"] )->select();
				}
				for($i = 0 ; $i < count($jctemp) ; $i++){
					$jcinfo[] = $jctemp["$i"]['0'];
				}
				for($i = 0 ; $i < count($jcinfo) ; $i++){
					$jcinfo["$i"]['id'] = $i + 1;
				}
				$this->assign('jcinfo',$jcinfo);
			}
		}
		
		//论著
		if(is_file($path.'9.data')){
			$file = fopen($path.'9.data','r');
			while(!feof($file)){
				$zzl_temp[] = fgets($file);
			}
			if($zzl_temp['0'] === false){
				
			}else{
				$zzl = M('Zzl');
				for($i = 0 ;$i < count($zzl_temp) ; $i++){
					$zzltemp[] = $zzl->where(' id = '.$zzl_temp["$i"] )->select();
				}
				for($i = 0 ; $i <count($zzltemp) ; $i++){
					$zzlinfo[] = $zzltemp["$i"]['0'];
				}
				for($i = 0 ; $i <count($zzlinfo) ; $i++){
					$zzlinfo["$i"]['id'] = $i + 1;
				}
				$this->assign('zzlinfo',$zzlinfo);
			}
		}
		
		//论文
		if(is_file($path.'10.data')){
			$file = fopen($path.'10.data','r');
			while(!feof($file)){
				$lw_temp[] = fgets($file);
			}
			if($lw_temp['0'] === false){
				
			}else{
				$fblwl = M('Fblwl');
				for($i = 0 ;$i < count($lw_temp) ; $i++){
					$lwtemp[] = $fblwl->where(' id = '.$lw_temp["$i"] )->select();
				}
				for($i = 0 ; $i <count($lwtemp) ; $i++){
					$lwinfo[] = $lwtemp["$i"]['0'];
				}
				for($i = 0 ; $i <count($lwinfo) ; $i++){
					$lwinfo["$i"]['id'] = $i + 1;
				}
				$this->assign('lwinfo',$lwinfo);
			}
		}
		
		//科研项目
		if(is_file($path.'11.data')){
			$file = fopen($path.'11.data','r');
			while(!feof($file)){
				$kyxm_temp[] = fgets($file);
			}
			if($kyxm_temp['0'] === false){
				
			}else{
				$kyxm = M('Kyxm');
				for($i = 0 ;$i < count($kyxm_temp) ; $i++){
					$kyxmtemp[] = $kyxm->where(' id = '.$kyxm_temp["$i"] )->select();
				}
				for($i = 0 ; $i <count($kyxmtemp) ; $i++){
					$kyxminfo[] = $kyxmtemp["$i"]['0'];
				}
				for($i = 0 ; $i <count($kyxminfo) ; $i++){
					$kyxminfo["$i"]['id'] = $i + 1;
				}
				$this->assign('kyxminfo',$kyxminfo);
			}
		}
		
		//科研获奖
		if(is_file($path.'12.data')){
			$file = fopen($path.'12.data','r');
			while(!feof($file)){
				$kyhj_temp[] = fgets($file);
			}
			if($kyhj_temp['0'] === false){
				
			}else{
				$kyhj = M('Kyhj');
				for($i = 0 ;$i < count($kyhj_temp) ; $i++){
					$kyhjtemp[] = $kyhj->where(' id = '.$kyhj_temp["$i"] )->select();
				}
				for($i = 0 ; $i <count($kyhjtemp) ; $i++){
					$kyhjinfo[] = $kyhjtemp["$i"]['0'];
				}
				for($i = 0 ; $i <count($kyhjinfo) ; $i++){
					$kyhjinfo["$i"]['id'] = $i + 1;
				}
				$this->assign('kyhjinfo',$kyhjinfo);
			}
		}
		
		//发明专利
		if(is_file($path.'13.data')){
			$file = fopen($path.'13.data','r');
			while(!feof($file)){
				$fmzl_temp[] = fgets($file);
			}
			if($fmzl_temp['0'] === false){
				
			}else{
				$fmzl = M('Fmzl');
				for($i = 0 ;$i < count($fmzl_temp) ; $i++){
					$fmzltemp[] = $fmzl->where(' id = '.$fmzl_temp["$i"] )->select();
				}
				for($i = 0 ; $i <count($fmzltemp) ; $i++){
					$fmzlinfo[] = $fmzltemp["$i"]['0'];
				}
				for($i = 0 ; $i <count($fmzlinfo) ; $i++){
					$fmzlinfo["$i"]['id'] = $i + 1;
				}
				$this->assign('fmzlinfo',$fmzlinfo);
			}
		}
		
		$userinfo = $user->where($data)->select();
		$this->assign('userinfo',$userinfo);
		
		$infoinfo = $info->where('iid = '.$data['id'])->select();
		$this->assign('infoinfo',$infoinfo);
		
		//教学任务概述
		$jxrwinfo = $infoinfo['0']['rwgs'];
		if($jxrwinfo == '无'){
			$jxrwinfo = '';
		}else{
			$jxrwinfo = '&nbsp;&nbsp;&nbsp;&nbsp;'.$jxrwinfo.'<br/>';
		}
		$this->assign('jxrwinfo',$jxrwinfo);
		
		//教改任务综述
		$jgrwzs = $infoinfo['0']['gggz'];
		if($jgrwzs == '无'){
			$jgrwzs = '';
		}else{
			$jgrwzs = '&nbsp;&nbsp;&nbsp;&nbsp;'.$jgrwzs.'<br/>';
		}
		$this->assign('jgrwzs',$jgrwzs);
		
		//教学获奖综述
		$jxhjzs = $infoinfo['0']['hjzs'];
		if($jxhjzs == '无'){
			$jxhjzs = '';
		}else{
			$jxhjzs = '&nbsp;&nbsp;&nbsp;&nbsp;'.$jxhjzs.'<br/>';
		}
		$this->assign('jxhjzs',$jxhjzs);
		
		//论文著作综述
		$lwzzzs = $info->where(' iid = '.$data['id'])->select();
		$this->assign('lwzzzs',$lwzzzs['0']['zpzs']);
		
		//科研获奖综述
		$kyhjzs = $info->where(' iid = '.$data['id'])->select();
		$this->assign('kyhjzs',$kyhjzs['0']['xmzs']);
		
		//外语考试综述
		$ks = M('Ks');
		$ksdata['kid'] = $data['id'];
		$ksinfo = $ks->where($ksdata)->select();
		$this->assign('ksinfo',$ksinfo);
		
		$this->display();
    }

    /**
     * 申报表部分下载
     */
    public function print_pdf_sb()
    {
        $this->display();
    }

    public function print_pdf_jb()
    {
        $this->display();
    }
	
	/**
	 * 处理简表的信息(最高学历)
	 */
	public function zgxl(){
		$zgxl = $_POST['zgxl'];
		if($zgxl == null){
			$this->error('请选择信息','__URL__/select_jb');
		}else{
			$path = $this->initfile_jb();
			$path = $path.'0.data';
			$file = fopen($path,'w+');
			fwrite($file,$zgxl);
			fclose($file);
			$this->success('选择成功','__URL__/select_jb');
		}
	}
	public function cjxl(){
		$xyjxl = $_POST['xyjxl'];
		if($xyjxl == null){
			$this->error('请选择信息','__URL__/select_jb');
		}else{
			$path = $this->initfile_jb();
			$path = $path.'1.data';
			$file = fopen($path,'w+');
			fwrite($file,$xyjxl);
			fclose($file);
			$this->success('选择成功','__URL__/select_jb');
		}
	}
	public function xstt(){
		$xstt = $_POST['xstt'];
		if($xstt == null){
			$this->error('请选择信息','__URL__/select_jb');
		}else{
			$path = $this->initfile_jb();
			$path = $path.'2.data';
			$file = fopen($path,'w+');
			for($i = 0 ;$i < count($xstt) ; $i++){
				if($i == 0){
					fwrite($file,$xstt["$i"]);
				}
				if($i > 0){
					fwrite($file,"\n".$xstt["$i"]);
				}
			} 
			fclose($file);
			$this->success('选择成功','__URL__/select_jb');
		}
	}
	public function rych(){
		$rych = $_POST['rych'];
		if($rych == null){
			$this->error('请选择信息','__URL__/select_jb');
		}else{
			$path = $this->initfile_jb();
			$path = $path.'3.data';
			$file = fopen($path,'w+');
			for($i = 0 ;$i < count($rych) ; $i++){
				if($i == 0){
					fwrite($file,$rych["$i"]);
				}
				if($i > 0){
					fwrite($file,"\n".$rych["$i"]);
				}
			} 
			fclose($file);
			$this->success('选择成功','__URL__/select_jb');
		}
	}
	public function gzjljx(){
		$gzjljx = $_POST['gzjljx'];
		$jxinfo = $_POST['jxinfo'];
		if($gzjljx == null && $jxinfo == null){
			$this->error('请选择信息','__URL__/select_jb');
		}else{
			$path = $this->initfile_jb();
			$path = $path.'4.data';
			$file = fopen($path,'w+');
			for($i = 0 ;$i < count($gzjljx) ; $i++){
				if($i == 0){
					fwrite($file,$gzjljx["$i"]);
				}
				if($i > 0){
					fwrite($file,"\n".$gzjljx["$i"]);
				}
			} 
			fclose($file);
			
			$path = $this->initfile_jb();
			$path = $path.'5.data';
			$file = fopen($path,'w+');
			for($i = 0 ;$i < count($jxinfo) ; $i++){
				if($i == 0){
					fwrite($file,$jxinfo["$i"]);
				}
				if($i > 0){
					fwrite($file,"\n".$jxinfo["$i"]);
				}
			} 
			fclose($file);
			$this->success('选择成功','__URL__/select_jb');
		}
	}
	public function rkxx(){
		$rkxx = $_POST['rkxx'];
		if($rkxx == null){
			$this->error('请选择信息','__URL__/select_jb');
		}else{
			$path = $this->initfile_jb();
			$path = $path.'6.data';
			$file = fopen($path,'w+');
			for($i = 0 ;$i < count($rkxx) ; $i++){
				if($i == 0){
					fwrite($file,$rkxx["$i"]);
				}
				if($i > 0){
					fwrite($file,"\n".$rkxx["$i"]);
				}
			} 
			fclose($file);
			$this->success('选择成功','__URL__/select_jb');
		}
	}
	public function byll(){
		$byll = $_POST['byll'];
		if($byll == null){
			$this->error('请选择信息','__URL__/select_jb');
		}else{
			$path = $this->initfile_jb();
			$path = $path.'7.data';
			$file = fopen($path,'w+');
			for($i = 0 ;$i < count($byll) ; $i++){
				if($i == 0){
					fwrite($file,$byll["$i"]);
				}
				if($i > 0){
					fwrite($file,"\n".$byll["$i"]);
				}
			} 
			fclose($file);
			$this->success('选择成功','__URL__/select_jb');
		}
	}
	public function jclz(){
		$jc = $_POST['jc'];
		$lz = $_POST['lz'];
		if($jc == null && $lz == null){
			$this->error('请选择信息','__URL__/select_jb');
		}else{
			$path = $this->initfile_jb();
			$path = $path.'8.data';
			$file = fopen($path,'w+');
			for($i = 0 ;$i < count($jc) ; $i++){
				if($i == 0){
					fwrite($file,$jc["$i"]);
				}
				if($i > 0){
					fwrite($file,"\n".$jc["$i"]);
				}
			} 
			fclose($file);
			
			$path = $this->initfile_jb();
			$path = $path.'9.data';
			$file = fopen($path,'w+');
			for($i = 0 ;$i < count($lz) ; $i++){
				if($i == 0){
					fwrite($file,$lz["$i"]);
				}
				if($i > 0){
					fwrite($file,"\n".$lz["$i"]);
				}
			} 
			fclose($file);
			$this->success('选择成功','__URL__/select_jb');
		}
	}
	public function lw(){
		$lw = $_POST['lw'];
		if($lw == null){
			$this->error('请选择信息','__URL__/select_jb');
		}else{
			$path = $this->initfile_jb();
			$path = $path.'10.data';
			$file = fopen($path,'w+');
			for($i = 0 ;$i < count($lw) ; $i++){
				if($i == 0){
					fwrite($file,$lw["$i"]);
				}
				if($i > 0){
					fwrite($file,"\n".$lw["$i"]);
				}
			} 
			fclose($file);
			$this->success('选择成功','__URL__/select_jb');
		}
	}
	public function xmhjzl(){
		$kyxm = $_POST['kyxm'];
		$kyhj = $_POST['kyhj'];
		$fmzl = $_POST['fmzl'];
		if($kyxm == null && $kyhj == null && $fmzl == null){
			$this->error('请选择信息','__URL__/select_jb');
		}else{
			$path = $this->initfile_jb();
			$path = $path.'11.data';
			$file = fopen($path,'w+');
			for($i = 0 ;$i < count($kyxm) ; $i++){
				if($i == 0){
					fwrite($file,$kyxm["$i"]);
				}
				if($i > 0){
					fwrite($file,"\n".$kyxm["$i"]);
				}
			} 
			fclose($file);
			
			$path = $this->initfile_jb();
			$path = $path.'12.data';
			$file = fopen($path,'w+');
			for($i = 0 ;$i < count($kyhj) ; $i++){
				if($i == 0){
					fwrite($file,$kyhj["$i"]);
				}
				if($i > 0){
					fwrite($file,"\n".$kyhj["$i"]);
				}
			} 
			fclose($file);
			
			$path = $this->initfile_jb();
			$path = $path.'13.data';
			$file = fopen($path,'w+');
			for($i = 0 ;$i < count($fmzl) ; $i++){
				if($i == 0){
					fwrite($file,$fmzl["$i"]);
				}
				if($i > 0){
					fwrite($file,"\n".$fmzl["$i"]);
				}
			} 
			fclose($file);
			$this->success('选择成功','__URL__/select_jb');
		}
	}
}