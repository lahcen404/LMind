<?php
namespace app\Controllers;

use app\Helpers\View;
use config\DBConnection;

class AdminController
{
    public function testBlade()
    {
        
        try {
            DBConnection::getInstance()->connectDB();
            $status = "Connected";
        } catch (\Exception $e) {
            $status = "Connection Faiiiled: " . $e->getMessage();
        }

        
        return View::render('test', [
            'name' => 'Lahcen',
            'db_status' => $status
        ]);
    }
}