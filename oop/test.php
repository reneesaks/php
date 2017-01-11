<?php
/**
 * Created by PhpStorm.
 * User: Renee
 * Date: 1/11/2017
 * Time: 21:59
 */
// require the object creating and using classes
require_once('text.php');
require_once 'ctext.php';
// create an object
$sentence = new text();
// control object output
echo '<pre>';
print_r($sentence);
echo '</pre>';
// set text
$sentence->setText('Hello text object!');
// control object output
echo '<pre>';
print_r($sentence);
echo '</pre>';
// show object output
$sentence->show();
echo '<hr/>';
// create an object
$sentence2 = new text('Hello text by construct!');
// control object output
echo '<pre>';
print_r($sentence2);
echo '</pre>';
// show object output
$sentence2->show();
echo '<hr/>';
// create an object
$sentence3 = new ctext('Hello color text by construct!');
// control object output
echo '<pre>';
print_r($sentence3);
echo '</pre>';
// show object output
$sentence3->show();
// set object color
$sentence3->setColor('#FF0000');
echo '<pre>';
print_r($sentence3);
echo '</pre>';
// show object output
$sentence3->show();
?>