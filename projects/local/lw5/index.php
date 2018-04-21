<?php
require_once "lib/vendor/autoload.php";

$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader, array(
	'cache'       => 'compilation_cache',
	'auto_reload' => true
));

const BOOKS = array(
	array("name" => "Чистый код", "author" => "Роберт Мартин", "imagePath" => "www/image/library/clear_code.jpg"),
	array("name" => "Идеальный программист", "author" => "Роберт Мартин", "imagePath" => "www/image/library/perfect_programmer.jpg"),
	array("name" => "Принципы, паттерны и методики гибкой разработки на языке C#", "author" => "Роберт Мартин",
		"imagePath" => "www/image/library/c_sharp.jpg"),
	array("name" => "The RSpec Book: Behaviour-Driven Development with Rspec, Cucumber, and Friends", "author" => "	David Chelimsky",
		"imagePath" => "www/image/library/rspec.jpg"),
	array("name" => "Быстрая разработка программ. Принципы, примеры, практика", "author" => "Роберт Мартин",
		"imagePath" => "www/image/library/fast_programming.jpg"),
	array("name" => "RibbonX: Customizing the Office 2007 Ribbon", "author" => "Роберт Мартин",
		"imagePath" => "www/image/library/ribbonx.jpg"),
);



echo $twig->render("index.twig", array('books' => BOOKS));