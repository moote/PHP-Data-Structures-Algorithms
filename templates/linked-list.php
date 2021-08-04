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
            <h1>Linked List</h1>
            <p>
                <a href="../index.php">&laquo; Back</a>
            </p>
            <div>
                <?php

                use PDSA\LinkedList;

                require_once(__DIR__.'/../lib/data-structures/class-linked-list.php');

                $list = new LinkedList();

                $list->insertAtBeginning(1);
                $list->insertAtBeginning(2);
                $list->insertAtEnd(3);
                $list->insertAfter($list->getHead()->getNext(), 4);
                // $list->deleteNodeAt(2);

                echo '<pre>'.var_export($list->search(4), false).'</pre>';
                echo '<pre>'.var_export($list->search(7), false).'</pre>';

                $list->sort();

                ?>
            </div>
        </div>
    </body>
</html>

