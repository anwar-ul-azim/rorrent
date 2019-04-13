<html>
<head>
  <script>
    window.fbAsyncInit = function() {
      FB.init({
        appId            : '1724053800952772',
        autoLogAppEvents : true,
        xfbml            : true,
        version          : 'v2.11'
      });
    };

    (function(d, s, id){
       var js, fjs = d.getElementsByTagName(s)[0];
       if (d.getElementById(id)) {return;}
       js = d.createElement(s); js.id = id;
       js.src = "https://connect.facebook.net/en_US/sdk.js";
       fjs.parentNode.insertBefore(js, fjs);
     }(document, 'script', 'facebook-jssdk'));

function checkLoginState(){
  FB.getLoginStatus(function(response){
    statusChangeCallback(response);
  });
}
function statusChangeCallback(response){
  FB.api('/me?fields=first_name,last_name,email', function(response){

    document.getElementById('name').innerHTML =
    response.first_name + ' ' + response.last_name ;
    document.getElementById('email').innerHTML = response.email;
    document.getElementById('loginBtn').style.display = "none";
    document.getElementById('name').style.display = "block";
    document.getElementById('email').style.display = "block";
    document.getElementById('logoutBtn').style.display = "block";
  });
}
function fbLogoutUser() {
    FB.getLoginStatus(function(response) {
  document.getElementById('loginBtn').style.display = "block";
  document.getElementById('name').style.display = "none";
  document.getElementById('email').style.display = "none";
  document.getElementById('logoutBtn').style.display = "none";
});
}

  </script>

</head>

<body>

<div id="loginBtn"><fb:login-button scope="public_profile,email"
  onlogin="checkLoginState();"></fb:login-button>
</div>
  <div id="name"></div>
  <div id="email"></div>
  <br><div id="logoutBtn" onclick="logout();" style="display:none;">LOGOUT</div>
</body>
</html>
