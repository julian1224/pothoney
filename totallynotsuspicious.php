<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> BLACKBEAR </title>
  </head>
  <body>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
  <?php
  function breakLn() {
    echo "<br>";
  }
  if(isset($_POST['submit']) || !empty($_POST['submit'])) {
  $s = htmlspecialchars($_POST["search"]);
  htmlentities($s);


  $u = htmlspecialchars($_POST["user"]);
  htmlentities($u);


  $p = password_hash($_POST["pass"], PASSWORD_DEFAULT);
  $p2 = $_POST['passverify'];


  echo($s);
  breakLn();
  echo($u);
  breakLn();
  echo($p);
  breakLn();
  echo($p2);
  breakLn();
  if (password_verify($p2, $p) == true) {
    echo "passwords match!";
  } else {
    echo "passwords don't match";
  }
}

  require_once('functionlog.php');

  logEvent("pageLoad", "totallynotsuspicious.php");

 ?>
<br>
<input placeholder="Search." name="search"/> <br> <br>

<input  placeholder="Username123" name="user" maxlength="30"/> <br>
<input type="password" placeholder="BestboiPass456" name="pass" maxlength="30" password/> <br>
<input type="password" placeholder="BestboiPass456" name="passverify" maxlength="30" password/>
<input type="submit" name="submit" value="Submit!"/>


</body>
</html>

<!-- //  Protocol parameters:
//
//     T - time period
//     N - max number of authentication attempts allowed during T
//
// The sign ∎ hereafter states for end of algorithm.
//
//
// Entry point for authentication request
//
//     if the incoming request contains a device cookie:
//
//         a. validate device cookie
//         b. if the device cookie is valid and not in the lockout list
//
//             authenticate user∎
//
//     if authentication from untrusted clients is locked out for the specific user
//
//         reject authentication attempt∎
//
//     else
//
//         authenticate user∎
//
// Authenticate user
//
//     check user credentials
//     if credentials are valid
//
//         a. issue new device cookie to user’s client
//         b. proceed with authenticated user
//
//     else
//
//         a. register failed authentication attempt
//         b. finish with failed user’s authentication
//
// Register failed authentication attempt
//
//     register a failed authentication attempt with following information: { user, time, device cookie (if present) }.
//     depending on whether a valid device cookie is present in the request, count the number of failed authentication attempts within period T either for
//
//         a. all untrusted clients
//         or
//         b. a specific device cookie
//
//     if number of failed attempts within period T > N
//
//         a. if a valid device cookie is presented
//
//             put the device cookie into the lockout list for device cookies until now+T
//
//         b. else
//
//             lockout all authentication attempts for a specific user from all untrusted clients until now+T
//
// Issue new device cookie to user’s client Issue a browser cookie with a value like “LOGIN,NONCE,SIGNATURE”, where
//
//     LOGIN - user’s login name (or internal ID) corresponding to an authenticated user
//     NONCE - nonce of sufficient length or random value from CSRNG source
//     SIGNATURE - HMAC(secret-key, “LOGIN,NONCE”)
//     secret-key - server’s secret cryptographic key.
//
// Validate device cookie
//
//     Validate that the device cookie is formatted as described above
//     Validate that SIGNATURE == HMAC(secret-key, “LOGIN,NONCE”)
//     Validate that LOGIN represents the user who is actually trying to authenticate
-->
