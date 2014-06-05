<?php
class File
{
    private $fileUserId,$fileName,$fileSize,$fileDate;

    public function getFileUserId(){return $this->fileUserId;}
    public function getFileName(){return $this->fileName;}
    public function getFileSize(){return $this->fileSize;}
    public function getFileDate(){return $this->fileDate;}

    public function setFileUserId($fileUserId) {
        $this->fileUserId = $fileUserId;
    }

    public function setFileName($fileName) {
        $this->fileName = $fileName;
    }

    public function setFileSize($fileSize) {
        $this->fileSize = $fileSize;
    }

    public function setFileDate($fileDate) {
        $this->fileDate = $fileDate;
    }
}