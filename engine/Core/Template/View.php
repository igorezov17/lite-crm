<?php

namespace Engine\Core\Template;

class View
{
    /**
     * @param string $name
     * @param array $data
     * 
     * @return void
     */
    public function render(string $name, array $data = []):void
    {
        $fileName = APP_DIR . "/resources/views/" . $name . ".php";
        if (!file_exists($fileName)) {
            throw new \Exception(sprintf("Файл с названием %d отсуствует", $fileName));

        } 
        
        extract($data);

        try {
            include_once $fileName;
        } catch (\Exception $e) {
            echo $e->getMessage(sprintf("Файл %d не удалось подключить", $fileName));
        }

    }
}