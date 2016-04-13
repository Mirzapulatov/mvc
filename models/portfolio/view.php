<?php
$result = DB::run()->query("SELECT * FROM portfolio WHERE id = $id");
$portfolio = $result->fetch();
$result = DB::run()->query("SELECT id FROM portfolio WHERE id = $id");

$previous = DB::run()->query("SELECT id FROM portfolio WHERE id<$id ORDER BY id DESC LIMIT 1")->fetch();
$next = DB::run()->query("SELECT id FROM portfolio WHERE id>$id ORDER BY id ASC LIMIT 1")->fetch();

$first = DB::run()->query("SELECT id FROM portfolio ORDER BY id DESC LIMIT 1")->fetch();
$last = DB::run()->query("SELECT id FROM portfolio ORDER BY id ASC LIMIT 1")->fetch();
