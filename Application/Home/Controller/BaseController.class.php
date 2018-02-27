<?php
namespace Home\Controller;
use Think\Controller;
use Org\ThinkSDK\ThinkOauth;
class BaseController extends Controller {

    public function loginQq() {
        $sdk = ThinkOauth::getInstance('qq');
        redirect($sdk->getRequestCodeURL());
    }


    public function out() {
        session(null);
        $this->redirect('Index/index');
    }
	
	
	
    protected $_home = array();
    protected function _initialize(){
    	
        echo '禁止访问';die;
        if (!session('qqname')) {
            if ($_GET['code']) {
                $code = I('get.code');
                $sns = ThinkOauth::getInstance('QQ');
                $extend = null;
                $token = $sns->getAccessToken($code, $extend);
                $openid = $token['openid'];
                if (is_array($token)) {
                    $data = $sns->call('user/get_user_info');
                    if ($data['ret'] == 0) {
                        $userInfo['type'] = 'QQ';
                        $userInfo['name'] = $data['nickname'];
                        $userInfo['nick'] = $data['nickname'];
                        $userInfo['head'] = $data['figureurl_qq_2'];
                        $res = M('qquser')->where(array('qqimg' => $userInfo['head']))->getField('qqnum');
                        if ($res) {
                            $data = array('qqnum' => $res + 1,);
                            M('qquser')->where(array('qqimg' => $userInfo['head']))->save($data);
                        } else {
                            $data = array(
                                'qqname' => $userInfo['name'],
                                'qqimg' => $userInfo['head'],
                                'qqnum' => 1,
                            );
                            M('qquser')->add($data);
                        }
                        /* 最近访客存入系统 */
                        SESSION('qqname', $userInfo['name']);
                        SESSION('head', $userInfo['head']);
                        $this->redirect('Index/index');
                    }
                }
            }
        }
		
        $this->_home = session('home');
      	$this->Os = getOS();
		//我的标签
		$tag = M('article')->where("a_keyword != '' and a_views > 0")->field('a_keyword,a_id,create_time')->order('create_time desc')->limit(50)->select();
        for ($i = 1; $i < count($tag); $i++) {
            $tag[$i - 1][id] = $i;
        }
		$this->assign('tag', $tag);
		
		//首页轮播
		$adv = D('carousel_list')->where("img != '' and state > 0")->order('orderby')->select();
		$this->assign('adv', $adv);

        //菜单导航
        $cate = D('Article_cate')->select();
        $this->assign('cate', $cate);

		//链接
		$link = D('Link')->where("state = 1")->order('orderby')->select();
		$this->assign('link', $link);

		//最新留言
		$Liuyan = D('Liuyan')->order('add_time desc')->limit(4)->select();
		$this->assign('Liuyan', $Liuyan);
		// 随机文章3篇
        $arr = M('article')->where('a_views > 0')->getField('a_id', true);
        $rt = array_rand($arr, 3);
        // 随机文章
        $a_id1 = $arr[$rt[0]];
        $a_id2 = $arr[$rt[1]];
        $a_id3 = $arr[$rt[2]];
        $s_article[0] = M('article')->where(array('a_id' => $a_id1))->find();
        $s_article[1] = M('article')->where(array('a_id' => $a_id2))->find();
        $s_article[2] = M('article')->where(array('a_id' => $a_id3))->find();
        $this->assign('s_article', $s_article);
		
		
		$this->hits = M('article')->order('a_views desc')->where('a_views > 0')->limit(12)->field(true)->select();
        if (strtolower(CONTROLLER_NAME) != 'login' && strtolower(CONTROLLER_NAME) != 'public') { 
           
            $this->assign('admin',$this->_home);           
            $nownav['m']=strtolower(CONTROLLER_NAME );
            $nownav['a']=strtolower(ACTION_NAME);
            $this->assign('nownav',$nownav);

        }

		$this->qqname = session('qqname');

    }
    
  
    
    protected function checkFields($data = array(), $fields = array()) {
        foreach ($data as $k => $val) {
            if (!in_array($k, $fields)) {
                unset($data[$k]);
            }
        }
        return $data;
    }
   
}