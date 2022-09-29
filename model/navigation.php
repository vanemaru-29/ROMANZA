<?php
    class LinksPagesModel {
        static public function linksPagesM($links) {
            if ($links == "galery") {
                $module = "view/module/".$links.".html";
            } else if ($links == "login") {
                $module = "view/module/".$links.".php";
            } else if ($links = "index") {
                $module = "view/module/index.php";
            } else {
                $module = "view/module/index.php";
            }

            return $module;
        }
    }
?>