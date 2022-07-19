<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library("tugas");
    }
    function index()
    {
        $this->load->view("hello_codeigniter");
    }
    function latihan()
    {
        echo "phi = 3.14</br>Jari-jari 5 <br> Tinggi 3 <br><br>";

        $this->tugas->rumus(5, 3);
    }
}
