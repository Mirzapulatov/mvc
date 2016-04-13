<?php
$result = DB::run()->query("SELECT * FROM portfolio ORDER BY id DESC LIMIT 100");