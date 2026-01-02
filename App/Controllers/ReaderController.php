<?php

namespace App\Controllers;
use Core\Controller;

class ReaderController extends Controller{
    public function index(){
        $this->render('Reader/home','readerLayout',[]);
    }  
}
