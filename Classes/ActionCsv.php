<?php
include_once "ShowCsv.php";

class ActionCsv
{
    public $file_name;
    public $openFile;

    function __construct($f_name)
    {
        $this->file_name = $f_name;
    }

    public function checkForExistingFile()
    {
        return file_exists("$this->file_name.csv");
    }

    public function decideAction($id, $action)
    {
        if ($action == 'D')
            return $this->deleteEntry($id);
        if ($action == 'A')
            return $this->addEntry($id);
        if ($action == 'R')
            return $this->showTable();
    }

    public function deleteEntry($id)
    {
        $table = fopen('test.csv', 'r');
        $temp_table = fopen('test_temp.csv', 'w');

        while (($data = fgetcsv($table, 1000)) !== FALSE) {
            if (reset($data) == $id) {
                continue;
            }
            fputcsv($temp_table, $data);
        }
        fclose($table);
        fclose($temp_table);
        rename('test_temp.csv', 'test.csv');

    }

    public function addEntry($id)
    {
        $arr = explode('*', $id);
        $name = $arr[0];
        $color = $arr[1];
        $cc = $arr[2];
        $handle = fopen('test.csv', 'r');

        while (!feof($handle)) {
            $rows[] = fgetcsv($handle)[0];
        }
        $id = max($rows) + 1;
        fclose($handle);

        $handle = fopen('test.csv', 'a');
        fputcsv($handle, [$id, $name, $color, $cc]);
        fclose($handle);
    }

    public function showTable()
    {
        $showCsv = new ShowCsv('test');
        $results = json_decode($showCsv->OpenCsv());
        foreach ($results as $result) {
            if (trim($result[1]) != '') {

                echo "<tr>
                    <td>$result[1]</td>
                    <td>$result[2]</td>
                    <td>$result[3]</td>
                    <td>
                        <button class=\"btn-flat cyan-text tooltipped\" data-tooltip=\"Delete Entry\" data-delay=\"50\" data-position=\"right\"
                                onclick=\"deleteEntry('$result[0]','D')\">
                                    <i class=\"material-icons del\">delete</i>
                        </button>
                    </td>
                </tr>";
            }
        }
    }
}