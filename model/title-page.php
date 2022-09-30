<?php
    class TitlePagesModel {
        static public function titlesPagesM($title) {
            if ($title == "galery") {
                $titlePage = "| Galeria";
            } else if ($title == "login") {
                $titlePage = "| Login";
            } else if ($title == "reserves") {
                $titlePage = "| Hacer Reserva";
            } else if ($title == "delivery") {
                $titlePage = "| Solicitar Pedido";
            } else if ($title == "menu") {
                $titlePage = "| Carta";
            } else if ($title = "index") {
                $titlePage = "";
            } else {
                $titlePage = "";
            }

            return $titlePage;
        }
    }
?>