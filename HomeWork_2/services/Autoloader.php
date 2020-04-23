<?php
//namespace App\Serices;

class Autoloader
{
    private $dirs = [
        'models', 'services'
    ];

    public function loadClass($className)
    {
        $mark = strripos($className, '\\');
        if ($mark) {
            $baseClNa = substr($className, $mark + 1);
        } else {
            $baseClNa = $className;
        }
        foreach ($this->dirs as $dir) {
            
            $file = dirname(__DIR__) . '/' . $dir . '/' . $baseClNa . '.php';
            //echo $file . '<br><br>';
            if (file_exists($file)) {
                include $file;
                break;
            }
        }
    }
}

