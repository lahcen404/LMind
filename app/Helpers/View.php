<?php
namespace app\Helpers;

use eftec\bladeone\BladeOne;

class View {
    public static function render(string $view, array $data = []): void {
        $views = __DIR__ . '/../../resources/views';
        $cache = __DIR__ . '/../../cache'; 

        
        $blade = new BladeOne($views, $cache, BladeOne::MODE_AUTO);

        echo $blade->run($view, $data);
    }
}