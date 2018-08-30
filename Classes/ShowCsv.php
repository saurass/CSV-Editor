<?php

include_once 'ActionCsv.php';

class ShowCsv
{
    private $actionCsv;
    private $file_name;

    public function __construct($f_name)
    {
        $this->file_name = $f_name;
        $this->actionCsv = new ActionCsv($f_name);
    }

    public function OpenCsv()
    {
        if (!$this->actionCsv->checkForExistingFile())
            return json_encode(["status" => "error", "message" => 'File Not Found']);

        if (!$handle = fopen("$this->file_name.csv", 'r'))
            return "Uable To Open File !";
        else
            return $this->readCsv($handle);
    }

    private function readCsv($handle)
    {
        while (!feof($handle)) {
            $rows[] = fgetcsv($handle);
        }
        return json_encode($rows);
    }
}