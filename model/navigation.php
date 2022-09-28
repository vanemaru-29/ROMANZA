<?php
    class LinksPagesModel {
        static public function linksPagesM($links) {
            if ($links = "index") { // borrar
                $module = "view/module/index.php";
            } else {
                $module = "view/module/index.php";
                    
            }
            
            // if () {

            // } else if ($links = "index") {
            //     $module = "view/module/index.php";
            // } else {
            //     $module = "view/module/index.php";
            // }

            return $module;
        }
    }
?>