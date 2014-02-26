<?php
class ArticleModel extends Model{
	//���²�����
	public $table ='article';
	//�Զ���ɣ����ֶθ�ֵ��
	public $auto=array(
		//���·���ʱ���ֶδ���ֻ���������ʱ����
		array('addtime','time','function',2,1),
		//������µķ����߹���ԱID
		array('admin_id','get_adminid','method',2,3),
		//������µķ���������
		array('author','get_author','method',2,3),
	);
	//������µķ����߹���ԱID
	public function get_adminid(){
		return session('aid');
	}
	//������µķ���������
	public function get_author(){
		return empty($_POST['author'])?session('username'):$_POST['author'];
	}
	//�������
	public function add_article(){
		if($this->create()){
			//������ϴ���ͼƬ����ʱ�Ž�������ͼ�ϴ�����
			if(!empty($_FILES['thumb']['name'])){
				//��������ͼ�ϴ�����
				$upload = new Upload('upload/article/'.date("Y/m/d"));
				$file = $upload->upload();
				$this->data['thumb']=$file[0]['path'];
			}
			return $this->add();
		}
	}
}