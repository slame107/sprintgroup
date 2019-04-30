<?php
session_start();
require_once("template.php");
$page = new Template("Home");
$page->addHeadElement("<link href='page.css' rel='stylesheet'>");
$page->finalizeTopSection();
$page->finalizeBottomSection();
print $page->getTopSection();
require_once("sidebar.php");
print "<div class='header'>";
print "<h1>Home Page</h1>";
print "</div>";

print $page->getBottomSection();