

function slideMenu(){
	var elLeftMenu = document.getElementById('site-menu');
	var elRotate = document.getElementById('hover-menu');
	var hover = document.getElementsByClassName('hover');
	var linkBox = document.getElementsByClassName('link-box');
	var close = document.getElementById('close');
	var logout = document.getElementById('logout');


	
	

	for (var i = 0; i < linkBox.length; i++) {
		
		linkBox[i].style.display = 'block';

		}

	for (var i = 0; i < hover.length; i++) {
		
		hover[i].style.display = 'none';

		}

	logout.style.display = 'flex';
	
	elLeftMenu.style.width = '250px';
	
	if(window.innerWidth < 1000){
		elLeftMenu.style.width = '800px';

	}

	close.style.transform = 'translatex(0%)';
	elRotate.style.transform = 'translatex(-500%)';
	elRotate.style.transition = '500ms';

	document.body.style.height = '100vh';
	document.body.style.overflow = 'hidden';
}



function hideMenu(){
	var elLeftMenu = document.getElementById('site-menu');
	var elRotate = document.getElementById('hover-menu');
	var hover = document.getElementsByClassName('hover');
	var linkBox = document.getElementsByClassName('link-box');
	var close = document.getElementById('close');
	var logout = document.getElementById('logout');

	for (var i = 0; i < linkBox.length; i++) {
		
		linkBox[i].style.display = 'none';

		}


	for (var i = 0; i < hover.length; i++) {
		
		hover[i].style.display = '';

		}

	logout.style.display = 'none';	

	//elLeftMenu.removeAttribute('class');
	elLeftMenu.style.width = '60px';

	if(window.innerWidth < 1000){

		elLeftMenu.style.width = '150px';

	}
	
	close.style.transform = 'translatex(-100%)';
	elRotate.style.transform = 'translateX(0)';
	document.body.style.height = 'auto';
	
	document.body.style.overflow = 'visible';
}

var elMenu = document.getElementById('hover-menu');
elMenu.addEventListener('click', slideMenu, false);

var elHidding = document.getElementById('close');
elHidding.addEventListener('click', hideMenu, false);


function openEl(){


	if(this.className != 'worker'){
		this.className = 'worker';
	}
	else{
		this.className = 'worker-info';
	}

}


var elMore = document.getElementsByClassName('worker');
for (var i = 0; i < elMore.length; i++) {

	elMore[i].addEventListener('click', openEl, true);

}

