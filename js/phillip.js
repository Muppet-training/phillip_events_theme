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

function contact_event() {
	const e_id = document.getElementById('e_id').innerHTML;
	const e_title = document.getElementById('e_title').innerHTML;
	const e_oname = document.getElementById('e_oname').innerHTML;
	const e_oemail = document.getElementById('e_oemail').innerHTML;
	const data =
		'e_id=' +
		e_id +
		'&e_title=' +
		e_title +
		'&e_oname=' +
		e_oname +
		'&e_oemail=' +
		e_oemail;

	var xhttp = new XMLHttpRequest();
	xhttp.open(
		'POST',
		// '/pit/wp-content/themes/phillip/contact.php',
		// 'https://muppettraining.com/wp-content/themes/phillip/contact.php',
		'https://phillipislandtime.com.au/wp-content/themes/phillip/contact.php',
		true
	);
	xhttp.setRequestHeader(
		'Content-type',
		'application/x-www-form-urlencoded'
	);
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			console.log(this.responseText);
			// document.getElementById(
			// 	'serverResponse'
			// ).innerHTML = this.responseText;
		}
	};

	xhttp.send(data);
}

function contact_business(id) {
	const c_id = document.getElementById('c_id_' + id).innerHTML;
	const c_title = document.getElementById('c_name_' + id).innerHTML;
	const c_oemail = document.getElementById('c_oemail_' + id)
		.innerHTML;

	const data =
		'c_id=' +
		c_id +
		'&c_title=' +
		c_title +
		'&c_oemail=' +
		c_oemail;

	var xhttp = new XMLHttpRequest();
	xhttp.open(
		'POST',
		// '/pit/wp-content/themes/phillip/contact-business.php',
		'https://phillipislandtime.com.au/wp-content/themes/phillip/contact-business.php',
		true
	);
	xhttp.setRequestHeader(
		'Content-type',
		'application/x-www-form-urlencoded'
	);
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			console.log(this.responseText);
			// document.getElementById(
			// 	'serverResponse'
			// ).innerHTML = this.responseText;
		}
	};

	xhttp.send(data);
}

function check_travel(id) {
	var check = document.getElementById('check_toggle_' + id);
	var contact = document.getElementById('contact_' + id);
	// console.log(check.style.display);
	if (check.style.display == 'block') {
		check.style.display = 'none';
	} else {
		check.style.display = 'block';
	}
}

function toggle_check(toggle, name, id) {
	var check = document.getElementById('check_toggle_' + id);
	// alert(class_c);
	switch (name) {
		case 'gf':
			if (
				check.style.display == 'block' &&
				check.classList.contains('gf')
			) {
				check.style.display = 'none';
			} else {
				check.style.display = 'block';
				check.classList = 'check_toggle gf';
			}
			if (toggle == 1) {
				check.innerHTML = 'Gluten Free Options Avalaible';
			} else {
				check.innerHTML = 'No Gluten Free Options';
			}
			break;
		case 'v':
			if (
				check.style.display == 'block' &&
				check.classList.contains('v')
			) {
				check.style.display = 'none';
			} else {
				check.style.display = 'block';
				check.classList = 'check_toggle v';
			}
			if (toggle == 1) {
				check.innerHTML = 'Vegan Options Avalaible';
			} else {
				check.innerHTML = 'No Vegan Options';
			}
			break;
		case 't':
			if (
				check.style.display == 'block' &&
				check.classList.contains('t')
			) {
				check.style.display = 'none';
			} else {
				check.style.display = 'block';
				check.classList = 'check_toggle t';
			}
			if (toggle == 1) {
				check.innerHTML = 'Takeaway Options Avalaible';
			} else {
				check.innerHTML = 'No Takeaway Options';
			}
			break;
		case 'a':
			if (
				check.style.display == 'block' &&
				check.classList.contains('a')
			) {
				check.style.display = 'none';
			} else {
				check.style.display = 'block';
				check.classList = 'check_toggle a';
			}
			if (toggle == 1) {
				check.innerHTML = 'Alcohol Avalaible';
			} else {
				check.innerHTML = 'No Alchol Avaliable';
			}
			break;
		case 'c':
			if (
				check.style.display == 'block' &&
				check.classList.contains('c')
			) {
				check.style.display = 'none';
			} else {
				check.style.display = 'block';
				check.classList = 'check_toggle c';
			}
			if (toggle == 1) {
				check.innerHTML = 'Food Travels To You';
			} else {
				check.innerHTML = 'You Travel To Food';
			}
			break;
	}
}

window.onload = function() {
	if (window.location.href.indexOf('/event/') > -1) {
		initMap();
	}

	if (window.location.href.indexOf('/category/') > -1) {
		initCat();
	}
};

function initMap() {
	var lat = document.getElementById('event_lat');
	var lng = document.getElementById('event_lng');

	// alert(parseFloat(lat), parseFloat(lng));
	if (lat != null && lng != null) {
		var location = {
			lat: parseFloat(lat.innerHTML),
			lng: parseFloat(lng.innerHTML)
		};
		// var location = { lat: '-38.450349', lng: '145.239308' };
		var map = new google.maps.Map(
			document.getElementById('map'),
			{
				zoom: 16,
				center: location,
				disableDefaultUI: true,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			}
		);
		var marker = new google.maps.Marker({
			position: location,
			map: map
		});
	}
}

function dir_menu(slug) {
	var list = document.getElementById('icon-list');
	var dir = document.getElementById('dir-listings');
	var cClasses = list.classList.length;

	if (
		list.classList.contains('open_menu') &&
		list.classList.contains(slug)
	) {
		if (cClasses == 3) {
			list.classList.remove('open_menu');
			list.classList.remove(slug);
			dir.classList.remove('remove_dir');
		} else {
			list.classList.remove(slug);
		}
	} else {
		if (
			list.classList.contains('open_menu') &&
			!list.classList.contains(slug)
		) {
			list.classList.add(slug);
		} else {
			list.classList.add('open_menu');
			list.classList.add(slug);
			dir.classList.add('remove_dir');
		}
	}

	var sub_menu = document.getElementById(slug);
	if (sub_menu.classList.contains('show_submenu')) {
		sub_menu.classList.remove('show_submenu');
	} else {
		sub_menu.classList.add('show_submenu');
	}

	// console.log('cClasses: ', cClasses);
	// console.log('classes', list.classList.value);
}

function initCat() {
	var parent_cat = document
		.getElementById('parent_cat_name')
		.innerHTML.toString()
		.toLowerCase();
	var cat = document.getElementById('cat_name').innerHTML;
	// .innerHTML.toString()
	// .toLowerCase();

	// console.log('Cat: ', cat);

	var clean_cat = cat
		.toLowerCase()
		.replace('&amp;', '')
		.replace(' ', '-')
		.replace(/[^A-Z0-9-]/gi, '');

	// Opens sub menu on load

	// document
	// 	.getElementById(clean_parent_cat)
	// 	.classList.add('active_parent_menu_item');
	// document.getElementById(cat).classList.remove('sub_menu_item');

	// console.log(parent_cat);
	// console.log('Clean: ', clean_cat);

	document
		.getElementById(clean_cat)
		.classList.add('active_sub_menu_item');

	// console.log('parent_', parent_cat);

	document.getElementById('parent_' + parent_cat).style.fill =
		'#07a5e4';
}

function search_now() {
	var search_icon = document.getElementById('screen_search_form');
	var exit_icon = document.getElementById('dashicons-search');

	if (search_icon.classList.contains('active_search')) {
		search_icon.classList.remove('active_search');
	} else {
		search_icon.classList.add('active_search');
	}

	if (exit_icon.classList.contains('dashicons-no')) {
		exit_icon.classList.remove('dashicons-no');
		exit_icon.classList.add('dashicons-search');
	} else {
		exit_icon.classList.remove('dashicons-search');
		exit_icon.classList.add('dashicons-no');
	}
}
