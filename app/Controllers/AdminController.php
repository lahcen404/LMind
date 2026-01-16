<?php
namespace app\Controllers;

use app\Helpers\View;
use config\DBConnection;

class AdminController
{
    public function index()
    {
        
        // try {
        //     DBConnection::getInstance()->connectDB();
        //     $status = "Connected";
        // } catch (\Exception $e) {
        //     $status = "Connection Faiiiled: " . $e->getMessage();
        // }

        
        return View::render('admin.dashboard');
    }
}