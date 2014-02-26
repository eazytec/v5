<?php
/**
* ���¹���
* @author houdunwang.com
*/
class ArticleControl extends AuthControl{
	//ģ��
	private $_db;
	//��Ŀ����
	private $_category;
	//���캯��
	public function __init(){
		$this->_db= K('Article');
		//��Ŀ����
		$this->_category= F("category");
	}
	//��ʾ�����б�
	public function index(){
		$page = new Page($this->_db->count(),1,1);
		$this->page= $page->show(2);
		$this->article= $this->_db->limit($page->limit())->all();
		$this->display();
	}
	//�������
	public function add(){
		if(IS_POST){
			//ͨ��ģ��������µ����
			if($this->_db->add_article()){
				$this->success('��ӳɹ�','index');
			}else{
				$this->error('�������ʧ��',$this->_db->error);
			}
		}else{
			$this->category= $this->_category;
			$this->display();
		}
	}
}
















