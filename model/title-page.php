<?php
    class TitlePagesModel {
        static public function titlesPagesM($title) {
            if ($title == "galery") {
                $titlePage = "| Galeria";
            } else if ($title == "login") {
                $titlePage = "| Login";
            } else if ($title = "index") {
                $titlePage = "";
            } else {
                $titlePage = "";
            }

            return $titlePage;
        }
    }
?>