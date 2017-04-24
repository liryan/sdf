<?php
Logic("IndexModule")
	->when('/')->invoke('index')->show()
	->when('/fetch')->invoke('fetchword')->json()
	->when('/try')->invoke('guess')->json()
	->when('/add')->invoke('add')->show();

