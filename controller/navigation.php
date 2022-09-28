<?php
    class NavigationController {
        static public function template() {
            include ('view/template.php');
        }

        static public function linksPagesC() {
            if (isset($_GET["romanza"])) {
                $linksC = $_GET["romanza"];
            } else {
                $linksC = "index";
            }

            $reply = LinksPagesModel::linksPagesM($linksC);
            include $reply;
        }
    }
?>