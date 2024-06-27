<?php
	define('__APP__', TRUE);
	session_start();
	require_once 'db.php';
	require_once 'constants.php';
	require_once 'header.php';
	require_once 'footer.php';

	$head = <<<EOT
	<!doctype html>
	<html lang="en">
	<head>
		<title>%s</title>
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="style.css">


		<!-- meta elements -->
		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
		<meta name="description" content="Pregled vijesti Rimskih legija">
		<meta name="keywords" content="vijesti, novosti, legija, news">
			
		<!-- Schema.org markup for Google+ -->
		<meta itemprop="name" content="Legija">
		<meta itemprop="description" content="Rimska legija">
		<meta itemprop="image" content="Your URL"> 
			
		<!-- Open Graph data -->
		<meta property="og:title" content="Hello Example">
		<meta property="og:type" content="article">
		<meta property="og:url" content="Your URL">
		<meta property="og:image" content="Your URL">
		<meta property="og:description" content="Some description">
		<meta property="article:tag" content="keyword 1, keyword 2, keyword 3, keyword 4, ...">
			
		<meta name="author" content="Ana Peterlic">	
		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet"> 
		<!-- End Google Fonts -->
	</head>
	<body>
EOT;

// inject title into '%s'
$head = sprintf($head, APP_NAME);
