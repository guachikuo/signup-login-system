function toggle(){
	/*toggle log in / sihn up*/
	if($(".button > a").html()==="Log in!"){
		/*change title*/
		$(".header > h3").text("Log in");
		
		/*change css*/
		$(".block").css("height","270px");
		$(".login_block").css("height","250px")
		$(".header").css("height","52.5px");
		$(".username, .password").css("height","72.5px");
		$(".button").css("height","52.5px");
		$(".email").hide();
		$('.error').hide();

		$(".button > a").text("Sign up?");
		flag = 0;
	}
	else{
		/*change title*/
		$(".header > h3").text("Sign up");

		/*change css*/
		$(".email").show();
		$(".block").css("height","310px");
		$(".login_block").css("height","290px");
		$(".header").css("height","43.5px");
		$(".username, .password").css("height","72.5px");
		$(".button").css("height","43.5px");
		$('.error').hide();

		$(".button > a").text("Log in!");
		flag =  0;
	}
}

let flag = 0;
$(function(){
	$('.submit').click(function(){
		const username = $("#username").val();
		const password = $("#password").val();
		const email = $("#email").val();
		$.ajax({
			method: "POST",
			url: "controller.php",
			data: {username: username, password: password, email: email},
			datatype: "json",
		  	success: function(data) {
		  		$('.error').css("width",(data.length*1.8).toString()+"%");
		  		$('.error > h3').html(data);
		  		if(flag===0){
		  			$('.block').css("height",($('.block').height()+29).toString()+"px");
		  			$('.login_block').css("height",($('.login_block').height()+29).toString()+"px");
		  			flag = 1;
		  		}
		  		$('.error').show();
		  	},
		  	error: function(err){
		  	}
		});
	});
});