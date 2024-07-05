<?php

if (isset($_GET["id"])) {

        $id = $_GET["id"];

        
        if ($id > 0 AND $id <= 10) {
            $id = "files/".$id.".txt";
        }
        else {
    
            $id = preg_replace('/%00.*$/', '', $id);
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
            <p>This scenario has been adapted to simulate a Path Traversal technique called Null Termination, Because it uses characters at the end of the URL: %00.
                <br> If you attempt to exploit the vulnerability according to the environment requirements, you will succeed in the exploitation. Depending on the environment and how it has been configured to support the application, you could exploit a Local File Inclusion vulnerability.<br>
                Some versions of PHP and environmental configurations make system functions vulnerable. In this scenario, we have adapted to simulate a vulnerable environment.</p>
            <img class="ui centered large image" src="https://via.placeholder.com/800x400" alt="News Image">
            <p><?php include($id); ?> </p>
            <br>
            
<h1> File Path Traversal with Null Termination</h1>

File Path Traversal, also known as Directory Traversal, is a vulnerability that arises when an application improperly handles file paths provided by users. Null termination, or the use of `%00` (null byte), can exacerbate this vulnerability by allowing an attacker to manipulate file paths beyond intended boundaries.

<h1> Understanding Null Termination:</h1>

Null termination (`%00`) is a character used in some programming languages and file systems to denote the end of a string. When an application processes file paths without properly sanitizing user input, an attacker can append `%00` to truncate the path and bypass security measures.

<h1> Exploitation Scenario:</h1>

1. </li>Vulnerable Application:</li> Suppose a web application dynamically includes files based on user-supplied input, such as `http://example.com/view.php?file=user_input`.
<br>
2. </li>Manipulation with Null Byte:</li> An attacker can exploit this by appending `%00` to the file path, such as `http://example.com/view.php?file=../../../../etc/passwd%00`.
<br>
3. </li>Impact:</li> If the application fails to properly handle the null byte, it may interpret the file path as `../../../../etc/passwd` followed by `%00`. In languages like C and PHP, `%00` marks the end of a string, effectively nullifying everything after it in the context of file operations.
<br>
<h1> Resulting Security Issue:</h1>

The use of null termination in File Path Traversal allows attackers to bypass directory restrictions and access sensitive files outside the intended directory structure. This can lead to unauthorized disclosure of sensitive information, such as password files (`/etc/passwd`), configuration files, or even executable code on the server.

<h1> Mitigation Strategies:</h1>

To mitigate File Path Traversal with null termination:

<li>Input Validation:</li> Always validate and sanitize user inputs, especially file paths and parameters used for file operations.
  
<li>Filtering and Whitelisting:</li> Implement filters and whitelists to restrict user input to allowed characters and directories.
  
<li>Encoding and Decoding:</li> Properly encode and decode user inputs to handle special characters like `%00` correctly.
  
<li>Security Awareness:</li> Educate developers about the risks of null termination and other input manipulation techniques used in File Path Traversal attacks.

In conclusion, File Path Traversal vulnerabilities compounded with null termination pose significant risks to application security. By implementing robust input validation and security practices, developers can mitigate these risks and protect their applications from exploitation.            
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
</body>
</html>
