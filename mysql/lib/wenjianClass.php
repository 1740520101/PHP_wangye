<?php
class wenjianClass{
    private $filename;
    public function upload($file,$filedir='uploads/',$exts = array('.jpg','.png','.gif','.jepg'),$maxsize = 10*1024*1024*8){
        if($file['error']!=0){
            return array('code'=>0,'msg'=>'参数错误:code:'.$file['error']);
        }
        $this->filename = $file['name'];
        $ext = $this->getExt();
        if(!in_array(strtolower($ext),$exts)){//strtolower转换成小写
            return array('code'=>0,'msg'=>'参数错误:code:文件类型不能上传');
        }
        if($file['size']>$maxsize){
            return array('code'=>0,'msg'=>'参数错误:code:上传文件过大');
        }
        
        $newfileName = rand(1000,9999).$ext;
        $newFileDir = $filedir.date('Y/m');
        $newfileName = $newFileDir.'/'.$newfileName;
        $this->mkdirs($newFileDir);//创建目录

        if(move_uploaded_file($file['tmp_name'],$newfileName)){
            return array('code'=>1,'msg'=>'code:文件上传成功','url'=>$newfileName);
        }else{ 
            return array('code'=>0,'msg'=>'参数错误:code:文件上传失败');
        }
    }

    private function getExt(){
        return substr($this->filename,
        strrpos($this->filename,'.'));//获取文件后缀名
    }

    private function mkdirs($dir){//创建目录
        $dirs = explode('/',trim($dir));
        $tmp = '';
        foreach($dirs as $v){
            $tmp.=$v.'/';
            if(!is_dir($tmp)){
                mkdir($tmp);
            }
        } 
    }
}

