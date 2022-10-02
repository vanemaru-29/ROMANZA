<?php
    class LinksPagesModel {
        static public function linksPagesM($links) {
            if ($links == "gallery" || $links == "menu") {
                $module = "view/module/".$links.".html";
            } else if ($links == "blog" || $links == "reserves" || $links == "delivery" || $links == "login") {
                $module = "view/module/".$links.".php";
            } else if ($links == "index") {
                $module = "view/module/index.html";
            } else {
                $module = "view/module/index.html";
            }

            return $module;
        }
    }
?>