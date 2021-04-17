<?php


class defaultController extends Controller
{

    function index() {
        header("Location: " . BASE_URL . "/default/index");
    }

}