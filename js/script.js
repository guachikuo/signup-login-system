function toggle(){
	// toggle log in / sign up
	if($(".button > a").html()==="Log in!"){
		// change title
		$(".header > h3").text("Log in");
		
		// change css
		$(".block").css("height","270px");
		$(".login_block").css("height","250px")
		$(".header").css("height","52.5px");
		$(".username, .password").css("height","72.5px");
		$(".button").css("height","52.5px");
		$(".email").hide();
		$('.error').hide();

		$(".button > a").text("Sign up?");
		isError = 0;
		hasLengthen = 0;
	}
	else{
		// change title
		$(".header > h3").text("Sign up");

		// change css
		$(".email").show();
		$(".block").css("height","310px");
		$(".login_block").css("height","290px");
		$(".header").css("height","43.5px");
		$(".username, .password").css("height","72.5px");
		$(".button").css("height","43.5px");
		$('.error').hide();

		$(".button > a").text("Log in!");
		isError =  0;
		hasLengthen = 0;
	}
}

function showErrorMesg(errorMesg){
	$('.error').css("width",(errorMesg.length*2).toString()+"%");
	$('.error > h3').html(errorMesg);
	if(hasLengthen===0){
		$('.block').css("height",($('.block').height()+29).toString()+"px");
		$('.login_block').css("height",($('.login_block').height()+29).toString()+"px");
		$('.error').show();
		hasLengthen = 1
	}
	isError = 0;
}

let isError = 0;
let hasLengthen = 0;

$(function(){
	$('.submit').click(function(){
		const username = $("#username").val();
		const password = $("#password").val();
		const email = $("#email").val();
		var isSignup = ($(".header > h3").html()==="Sign up")? 1 : 0; 
		var errorMesg = "";

		// handle the invalid input 
		if(!username){
 			errorMesg = "Username is required !";
 			isError = 1;
 		} else if(username.length<7 || username.length>20){
 			errorMesg = "Username should be within 7 - 20 English characters !";
 			isError = 1;
 		} else if(!password){
 			errorMesg = "Password is required !";
 			isError = 1;
 		} else if(password.length<8 || username.length>21){
 			errorMesg = "Password should be within 8 - 21 English characters !";
 			isError = 1;
 		} else if(isSignup===1){
 			if(!email){
 				errorMesg = "Email is required !";
 				isError = 1;
 			} else if(email.search("@")===-1 || (email.search(".com")===-1 && email.search(".COM")===-1) || email.length<7){
 				errorMesg = "Invalid email-type";
 				isError = 1;
 			}
 		}

 		// show error message 
 		if(isError===1){
			showErrorMesg(errorMesg);
		}

		// all inputs are valid 
		else{
			if(hasLengthen===1){
				$('.block').css("height",($('.block').height()-29).toString()+"px");
				$('.login_block').css("height",($('.login_block').height()-29).toString()+"px");
				$('.error').hide();
				isError = 0;
				hasLengthen = 0;
			}

			// Assuming the code gets this far, we can start the ajax process
			$.ajax({
				method: "POST",
				url: "controller.php",
				data: {username: username, password: password, email: email, isSignup: isSignup},
				datatype: "json",
			  	success: function(data) {
			  		console.log(data);
			  		if(data.active===1)
			  			showErrorMesg(data.error_msg);
			  		if(data.redirect!==undefined)
			  			window.location=data.redirect
			  	},
			  	error: function(err){
			  	}
			});
		}
	});
});