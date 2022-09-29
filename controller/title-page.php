<?php
    class TitleController {
        static public function titlePage() {
            if (isset($_GET["romanza"])) {
                $titlesC = $_GET["romanza"];
            } else {
                $titlesC = "index";
            }

            $reply = TitlePagesModel::titlesPagesM($titlesC);
            echo $reply;
        }
    }
?>