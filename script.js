$('.close-modal').click(function(){
	$('.form_msg_modal').toggleClass('unhide');
})

$(document).ready(function(){
	$('.evnt').on('change',function(){
		// console.log(e);
		var e = $(this).val();
		if(e == 'Code Novice' || e == 'Code Virtuso' || e == 'Web O Mania')
			$('#amount').val(60);
		else if(e == 'Coding Combo')
			$('#amount').val(160);
		else if(e == 'Prisoner of Azkaban' || e == 'Knights Watch' || e == 'El Clasico')
			$('#amount').val(70);
		else if(e == 'Robotics Combo')
			$('#amount').val(200);
		else if(e == 'Electro Battleground')
			$('#amount').val(50);
		else if(e == 'NFS' || e == 'FIFA 11')
			$('#amount').val(60);
		else if(e == 'PUBG MOBILE (Classic)')
			$('#amount').val(240);
		else if(e == 'CS 1.6')
			$('#amount').val(250);
		else if(e == 'Gaming Combo')
			$('#amount').val(100);
		else if(e == 'Setu Bandhan')
			$('#amount').val(100);
		else if(e == 'Track O Treasure')
			$('#amount').val(90);
		else if(e == 'Mega Arch')
			$('#amount').val(180);
		else if(e == 'Civil Combo')
			$('#amount').val(170);
		else if(e == 'Carrom' || e == 'Photography' || e == 'Videography' || e == 'B-Plan')			
			$('#amount').val(50);
		else if(e == 'Chess')
			$('#amount').val(40);
		else if(e == 'Table Tennis')
			$('#amount').val(70);
		else if(e == 'Darts')
			$('#amount').val(20);
		else if(e == 'Innovation Challenge')
			$('#amount').val(30);
		else if(e == 'General Combo')
			$('#amount').val(80);
	});



	//RD Dependend Picklist
	
	
});


	function numbersonly(e){
	    var unicode=e.charCode? e.charCode : e.keyCode;
	    if (unicode!=8){ //if the key isn't the backspace key (which we should allow)
	        if (unicode<48||unicode>57) //if not a number
	            return false; //disable key press
	    }
	}
	function phValidate(e,obj,length)
	{
		var unicode=e.charCode? e.charCode : e.keyCode;
	    if (unicode!=8){ //if the key isn't the backspace key (which we should allow)
	       if (unicode<48||unicode>57) //if not a number
	    	    return false; //disable key press
	    }

	    var maxlength = length;
	    if(obj.value.length >= maxlength)
	    	return false;		
	}
		function validateEmail(){     
			var email = $('#pemail').val();
			console.log(email); 
	   		var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
	   		return emailPattern.test(elementValue); 
		}
	
	// $(document).ready(function(){
	// 	$('#save-btn').click(function(){
	// 		var email = $('#pemail').val();
	// 		if(email)
	// 		{
	// 			var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
	// 			if(!emailPattern.test(email))
	// 				alert("Invalid Email Id");
	// 		}
	// 	});
	// }); 




	/* Contact Form Controller*/

	var form = document.getElementById("contact-form");
    
    async function handleSubmit(event) {
      event.preventDefault();
      var status = document.getElementById("status");
      var data = new FormData(event.target);
      fetch(event.target.action, {
        method: form.method,
        body: data,
        headers: {
            'Accept': 'application/json'
        }
      }).then(response => {
        status.innerHTML = "Success! We have received your enquiry. An event volunteer will contact your shortly.";
		status.classList.remove('error');
		status.classList.add('success');
        form[2].value = ''
      }).catch(error => {
        status.innerHTML = "Oops! There was a problem submitting your form"
		status.classList.remove('success');
		status.classList.add('error');
      });
    }
    form.addEventListener("submit", handleSubmit)