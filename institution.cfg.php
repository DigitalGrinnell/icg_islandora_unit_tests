<?php

	# ---------------------------
	# configuration settings file
	# ---------------------------

	# Set these configuration settings!
	define('APP_PREFIX', 'http://'); // choose either: 'http://' OR 'https://'
	define('APP_DOMAIN', 'isle-dev.grinnell.edu'); // exclude prefix (http:// or https://); exclude trailing slash
	define('APP_PORT', ''); // optional: port value (i.e. ":8888")
	define('APP_FOLDER', ''); // optional: subdirectory path (i.e. "/islandora"); exclude trailing slash

	define('FEDORA_PREFIX', 'http://'); // choose either: 'http://' OR 'https://'
	define('FEDORA_DOMAIN', 'isle-dev.grinnell.edu'); // exclude prefix (http:// or https://); exclude trailing slash
	define('FEDORA_PORT', ':8080'); // optional: port value (i.e. ":8888")
	define('FEDORA_FOLDER', '/fedora'); // optional: subdirectory path (i.e. "/fedora"); exclude trailing slash

	# Test User credentials
	define('APP_TEST_USER', 'islandora_docker_admin');
	define('APP_TEST_PASS', 'islandoradockeradminpw2017');


	#############################################################
	# No need to change anything below this line
	#############################################################

	# Generated Full Paths
	define('FULL_APP_URL', APP_PREFIX . APP_DOMAIN . APP_PORT . APP_FOLDER);
	define('FULL_FEDORA_URL', FEDORA_PREFIX . FEDORA_DOMAIN . FEDORA_PORT . FEDORA_FOLDER);

