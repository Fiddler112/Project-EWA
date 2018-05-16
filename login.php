<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-signin-client_id" content="307112913485-5kkslq098hfj65e6l3qngjo1916a7h4i.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer type="text/javascript">  </script>
	<title>Google Home - Login</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
    <link rel="icon" href="img/pic.png">
</head>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
                     <div class="g-signin2" data-onsuccess="onSignIn">   
                             </div>&nbsp;                      
				</div>
			</div>
		</div><!-- /.col--> 
	</div><!-- /.row -->	
	

   
     <script>
//         var name;
//         var email;
//         var gIdToken;
//         var expiry = 30;
    function onSignIn(googleUser) {
        var profile = googleUser.getBasicProfile();
        console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
        console.log('Name: ' + profile.getName());
        console.log('Full Name: ' + profile.getName());
        console.log('Given Name: ' + profile.getGivenName());
        console.log('Family Name: ' + profile.getFamilyName());
        console.log('Image URL: ' + profile.getImageUrl());
        console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
            
            
       // The ID token you need to pass to your backend:
            var id_token = googleUser.getAuthResponse().id_token;
            console.log("ID Token: " + id_token);
             var profileName = profile.getName();
             var email=profile.getEmail();
             var gIdToken = googleUser.getAuthResponse().id_token;
             var firstName = profile.getGivenName();
             var lastName = profile.getFamilyName();
             var imgURL = profile.getImageUrl();
            
          //Call create cookie script
             createCookie('profileName', profileName, 30, '/');
             createCookie('email', email, 30, '/');
             createCookie('gIdToken', gIdToken, 30, '/');
             createCookie('firstName', firstName, 30, '/');
             createCookie('lastName', lastName, 30, '/');
             createCookie('imgURL', imgURL, 30, '/');
             createCookie('amountOfEvents', '3', 30, '/');
        
    //redirect to database to create user profile
             window.location = "db_login_gUser.php?profileName=" + profileName + "&email=" + email + "&firstName=" + firstName + "&lastName=" + lastName + "&imgURL= " + imgURL + "&id_token=" + gIdToken;
        
      
       
      };
       function createCookie(name,value, days, path){
        var expires = "";
        if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + " path=" + path;
   
       }
    
    </script>
    
    
<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>