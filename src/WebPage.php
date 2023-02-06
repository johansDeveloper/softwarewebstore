
<?php

require_once("../src/WebPage.php");

class WebPage {

    const TEMPLATE = 'src/template.html';

    public string $store_name;
    public string $title;
    public int $world_length;
    public Date $lst_update;
    public Date $crrnt_date;
    public string $content;
    protected string $metadata;
    public int $day;
    public int $month;
    public int $year;

    function __construct() {

        $this->__set_word_length(
                $this->load_web_content(
                        self::TEMPLATE));
    }

    protected function __set_title(): void {

        $this->title = str_replace("#title#", "", $this->load_web_content(
                        self::TEMPLATE));
    }

    protected function __set_word_length(string $str): void {
        $this->world_length = strlen($str);
    }

    public function __get_metadata(): string {

        $this->set_metadata();
        return $this->metadata;
    }

    protected function set_metadata(): void {

        $data = $this->load_web_content("src/template.html");

        $world_length = strlen($data);

        $this->metadata = "world length: " . $world_length;
    }

    protected function check_web_content($str = array()): bool {



        $success = false;
        //TODO: Implements validation format's

        if (strlen($str) > 2000) {
            $success = true;
        }


        return $success;
    }

    public function load_web_content(String $path): string {

        $template = null;

        $lst = $path;
        $tmp = __DIR__;
        $dir = str_replace("\\", "/", $tmp);
        $dir . "/template.html";

        if (!file_get_contents($path)) {

            try {

                $template = file_get_contents($dir);
                $lst = explode("/", $lst);

                $dir = explode("/", $dir);

                for ($index = 0; $index < count($dir); $index++) {

                    if ($dir[$index] == $lst[$index]) {

                        echo $lst[$index];
                        echo $dir[$index];
                    }
                }
            } catch (Exception $ex) {
                $template = $this->load_web_content($dir);
            }
        }

        return $template;
    }

    public function setVisible(): string {


        $page = "";

        $page = $this->web_page = $this->load_web_content("src/template.html");

        $enable = $this->check_web_content($page);

        if ($enable) {


            $form = file_get_contents("src/loginForm.php");
            $page = str_replace("#formlogin#", $form, $page);

            $form = file_get_contents("src/panel_suggestion.php");
            $page = str_replace("#formsuggestion#", $form, $page);
        }


        return $page;
    }

}
