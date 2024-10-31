<?php
class File{
    private $file;
    private $fileName;

    public function __construct(string $fileName, array $arrTypes){
        $this->file = $_FILES[$fileName];
        $this->fileName = '';

        if(!isset($this->file)){

        }
        if($this->file['error'] !==  UPLOAD_ERR_OK){
            switch($this->file['error']){
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FROM_SIZE:{

                    break;
                }
                case UPLOAD_ERR_PARTIAL:{
                    break;
                }
                default:{
                    break;
                }
            }
        }
        if(in_array($this->file['type'], $arrTypes)===false){

        }
    }
    public function getFileName(){
        return $this->fileName;
    }
}

?>