<?php

if (isset($_GET["id"])) {
        $id = $_GET["id"];

        
        if ($id > 0 AND $id <= 10) {
            $id = "files/".$id.".txt";
        }
        else {
        $id = urlencode($id);
        $id = strtolower($id);

            if  (str_contains($id,"..%2f")) {
                $id = str_replace("%2f","/",$id);
            }
            elseif (str_contains($id,"..%c0%af")) {
                $id = str_replace("%c0%af","/",$id);
            }
            elseif (str_contains($id,"..%ef%bc%8f")) {
                $id = str_replace("%ef%bc%8f","/",$id);
            }
            else {

            }
        }
}
else {

    $id = "files/1.txt";

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>yrprey - Path Traversal - Basic</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <link rel="icon" href="img/favicon.svg" title="YRprey">
</head>
<body>
    <!-- Navbar -->
    <div class="ui inverted menu">
    <div class="header item"><a class="navbar-brand" href="index.php"><img src="img/logo-letter.svg" width="140px;"></a></div>
    </div>

    <!-- Main Container -->
    <div class="ui container" style="margin-top: 20px;">
        <div class="ui segment">
            <h2 class="ui header">Breaking News</h2>
            <p>This scenario has been adapted to simulate a Path Traversal technique called encode, because it uses characters %2f, %c0%af and %ef%bc%8f.<br> If you attempt to exploit the vulnerability according to the environment requirements, you will succeed in the exploitation. Depending on the environment and how it has been configured to support the application, you could exploit a Local File Inclusion vulnerability.<br>
            Some versions of PHP and environmental configurations make system functions vulnerable. In this scenario, we have adapted to simulate a vulnerable environment.</p>
            <img class="ui centered large image" src="https://via.placeholder.com/800x400" alt="News Image">
            <p><?php include($id); ?> </p>
            <br>

            <h1>Path Traversal Encode: `..%2f`, `..%c0%af`, `..%ef%bc%8f`</h1>

Path Traversal vulnerabilities can be exploited using encoded sequences that manipulate file paths beyond intended directories. Attackers leverage encoded characters to bypass input filters and security measures designed to prevent directory traversal.

<h1>Understanding Encoded Sequences:</h1>

1. </li>`..%2f` (URL Encoded Slash):</li>
<br><br>
   - `%2f` is the URL-encoded representation of the forward slash (`/`).<br>
   - `..%2f` is used to traverse directories upwards (`../`) in a file path.<br>
   - Example: `http://example.com/download?file=..%2f..%2fetc%2fpasswd`<br>
   <br><br>
2. </li>`..%c0%af` (UTF-8 Encoded Slash):</li>

   - `%c0%af` is the UTF-8 encoded representation of the slash (`/`).<br>
   - `..%c0%af` exploits systems that interpret UTF-8 encoded characters, potentially bypassing input filters.<br>
   - Example: `http://example.com/download?file=..%c0%af..%c0%afetc%c0%afpasswd`<br>
   <br><br>
3. </li>`..%ef%bc%8f` (Fullwidth Solidus):</li>

   - `%ef%bc%8f` represents the fullwidth solidus (`／`), a Unicode character used similarly to `/`.<br>
   - `..%ef%bc%8f` may bypass filters expecting traditional path traversal sequences.<br>
   - Example: `http://example.com/download?file=..%ef%bc%8f..%ef%bc%8fetc%ef%bc%8fpasswd`<br>

<h1>Exploitation Scenario:</h1>

<li>Vulnerable Application:</li> A web application allows users to download files based on a parameter passed via a URL, such as `http://example.com/download?file=user_input`.

<li>Encoded Sequences:</li> An attacker crafts malicious URLs using encoded sequences (`..%2f`, `..%c0%af`, `..%ef%bc%8f`) to traverse directories outside the intended scope.

<li>Impact:</li> By exploiting these encoded sequences, attackers can potentially access sensitive files (`/etc/passwd`, configuration files) that reside outside the application's intended directory structure. This can lead to unauthorized disclosure of confidential information and compromise system integrity.

<h1>Mitigation Strategies:</h1>

To mitigate Path Traversal vulnerabilities using encoded sequences:

<li>Input Validation:</li> Implement strict input validation and sanitize user inputs, especially file paths and parameters used for file operations.
  
<li>Encoding Handling:</li> Normalize or decode encoded characters in file paths to prevent manipulation through encoded sequences.
  
<li>Access Controls:</li> Use proper file system permissions and access controls to restrict the application's ability to read or execute files outside its designated directories.
  
<li>Security Awareness:</li> Educate developers and security teams about the risks associated with encoded path traversal techniques and encourage secure coding practices.

In conclusion, Path Traversal vulnerabilities leveraging encoded sequences such as `..%2f`, `..%c0%af`, and `..%ef%bc%8f` can circumvent security measures and pose significant risks to application security. By implementing robust security practices and staying vigilant, organizations can effectively mitigate these risks and protect their applications from exploitation.            
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
</body>
</html>
