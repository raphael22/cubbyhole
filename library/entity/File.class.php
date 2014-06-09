<?php
class File
{
    private $fileUserId,$fileName,$fileSize,$fileDate,$fileIsFolder,$fileFolder,$filePaths;

    public function getFileUserId(){return $this->fileUserId;}
    public function getFileName(){return $this->fileName;}
    public function getFileSize(){return $this->fileSize;}
    public function getFileDate(){return $this->fileDate;}
    public function getFileIsFolder(){return $this->fileIsFolder;}
    public function getFileFolder(){return $this->fileFolder;}
    public function getFilePaths(){return $this->filePaths;}

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

    public function setFileIsFolder($fileIsFolder) {
        $this->fileIsFolder = $fileIsFolder;
    }

    public function setFileFolder($fileFolder) {
        $this->fileFolder = $fileFolder;
    }

    public function setFilePaths($filePaths) {
        $this->filePaths = $filePaths;
    }
}