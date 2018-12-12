function eventNavToggle(e) {
	e.preventDefault();
	var eventNav = document.getElementById('event_nav');
	if (eventNav.classList.contains('showmenu')) {
		// alert('yes');
		eventNav.classList.remove('showmenu');
	} else {
		// alert('no');
		eventNav.classList.add('showmenu');
		eventNav.classList.display = 'block';
	}
}

function menuCheck() {
	var eventNav = document.getElementById('event_nav');
	if (eventNav.classList.contains('showmenu')) {
		eventNav.classList.remove('showmenu');
	}
}
