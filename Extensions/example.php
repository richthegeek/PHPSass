<?php
function loadCallback($file, $parser)
{
    $extensionName = explode('/', str_replace('@import "', '', $parser->source));
    $extensionName = $extensionName[0];
    $namespace = ucwords(preg_replace('/[^0-9a-z]+/', '_', strtolower($extensionName)));
    $extensionPath = './' . $namespace . '/' . $namespace . '.php';
    if (file_exists($extensionPath)) {
        require_once($extensionPath);
        $hook = $namespace . '::resolveExtensionPath';
        $paths = call_user_func($hook, $file, $parser);
        return (array)$paths;
    }

}


function getFunctions($extensions = array())
{
    $output = array();
    if (!empty($extensions)) {
        foreach ($extensions as $extension) {
            $name = explode('/', $extension, 2);
            $namespace = ucwords(preg_replace('/[^0-9a-z]+/', '_', strtolower(array_shift($name))));
            $extensionPath = './' . $namespace . '/' . $namespace . '.php';
            if (file_exists(
                $extensionPath
            )
            ) {
                require_once($extensionPath);
                $namespace = $namespace . '::';
                $function = 'getFunctions';
                $output = array_merge($output, call_user_func($namespace . $function, $namespace));
            }
        }
    }

    return $output;
}


$file = 'example.scss';
$path = '..';
$library = $path . '/SassParser.php';
$compass = './Compass/Compass.php';

if ($path && file_exists($library)) {


    try {
        require_once ($library);

        $options = array(
            'style' => 'expanded',
            'cache' => false,
            'syntax' => 'scss',
            'debug' => false,
            'debug_info' => false,
            'load_path_functions' => array('loadCallback'),
            'load_paths' => array(dirname($file)),
            'functions' => getFunctions(array('Compass')),
        );
        // Execute the compiler.
        $parser = new SassParser($options);
        print $parser->toCss($file);
    } catch (Exception $e) {
        print "body::before {
          display: block;
          padding: 5px;
          white-space: pre;
          font-family: monospace;
          font-size: 8pt;
          line-height: 17px;
          overflow: hidden;
          content: '" . $e->getMessage() . "';
        }";
    }
} else {
    echo 'Path or library are wrong';
}

