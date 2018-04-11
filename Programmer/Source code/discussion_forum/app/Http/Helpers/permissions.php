<?php

function checkPermission($permissions){
	$userAcess = getMyRole(auth()->user()->user_role);
	foreach($permissions as $key => $value) {
		if($value == $userAcess){
			return true;
		}
	}
	return false;
}

function getMyRole($id){
	switch($id) {
		case 1:
		return 'admin';
		break;

		case 2:
		return 'qam';
		break;

		case 3:
		return 'qac';
		break;

		case 4:
		return 'staff';
		break;

		default:
		return 'student';
		break;

	}
}