<!DOCTYPE html>
<html>
    <head>
        <title>PHP Data Structures & Algorithms</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style type="text/css">
            body {
                font-family: "acumin-pro", "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
            }

            #main {
                height: 600px;
                width: 100%;
                background-color: #ccc;
            }
        </style>
    </head>
    <body>
        <div id="main">
            <h1>Stack</h1>
            <p>
                <a href="../index.php">&laquo; Back</a>
            </p>
            <div>
                <?php

                use PDSA\Stack;

                require_once(__DIR__.'/../lib/data-structures/class-stack.php');

                $stack = new Stack(100);

                try{
                    for($i = 0; $i < 8; $i++){
                        $stack->push($i);
                    }

                    while(!$stack->isEmpty()){
                        echo '<pre>'.var_export($stack->pop(), false).'</pre>';
                    }
                }
                catch(Exception $ex) {
                    echo "Error ($i): {$ex->getMessage()} <br>";
                    echo '<pre>'.var_export($stack, false).'</pre>';
                }

                ?>
            </div>
        </div>
    </body>
</html>
