<?php

if (isset($_GET["id"])) {
        $id = $_GET["id"];
        if ($id <= 10) {
            $id = "files/".$id.".txt";
        }
}
else {

    $id = "1.txt";

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
            <p>This scenario is completely vulnerable to Path Traversal, and depending on the environment where the application is running, the scenario will be vulnerable to Local File Inclusion and Remote File Inclusion.<br>
            Some versions of PHP and environmental configurations make system functions vulnerable. In this scenario, we have adapted to simulate a vulnerable environment.</p>
            <img class="ui centered large image" src="https://via.placeholder.com/800x400" alt="News Image">
            <p><?php include($id); ?> </p>
            <br>
<h1>Understanding Path Traversal Vulnerability</h1>
<br>
Path Traversal, also known as Directory Traversal or File Path Traversal, is a security flaw that occurs when an application allows a user to specify files or directories outside the intended directory. This can enable an attacker to access sensitive files on the filesystem that should not be accessible.
<br><br>
<h1>How It Works</h1>
<br>
Path Traversal attacks typically exploit how an application constructs or interprets file paths provided by the user. Attackers use sequences like `../` (to move up a directory) to navigate to directories above the initially allowed directory. For example, using `../../../etc/passwd`, the attacker aims to access the `/etc/passwd` file, which commonly stores user account information on Unix-like systems.
<br><br>
<h1>Practical Example</h1>
<br>
Imagine a web application that allows users to download files from a specific directory without properly validating the provided file paths. If the application simply concatenates the user-provided path with the server's root directory, an attacker can manipulate the path to navigate to higher directories.

For instance, if the application expects a path like `/var/www/uploads/file.txt` and the user provides `../../../etc/passwd`, the concatenated path becomes `/var/www/uploads/../../../etc/passwd`. Depending on the application's permissions and the operating system, this could allow the attacker to access the `/etc/passwd` file and potentially retrieve sensitive information such as encrypted passwords.
<br><br>
<h1>Impact</h1>
<br>
Path Traversal attacks can have various impacts depending on the application and system context:
<br>
<li>Reading Sensitive Files: An attacker can read files containing sensitive information such as passwords, private keys, or sensitive configurations.</li>
<li>Privilege Escalation: Accessing certain files may reveal information that helps the attacker compromise the system further, such as additional vulnerabilities or user credentials.</li>
<li>Arbitrary Code Execution: In some cases, if a retrieved file contains executable code, the attacker may exploit it to execute arbitrary code on the server.</li>

<h1>Mitigation</h1>
<br>
To prevent Path Traversal vulnerabilities, it's crucial to implement strong security practices:
<br>
<li>Input Validation: Always validate and sanitize user inputs, especially file or directory paths.</li>
<li>Use of Absolute Paths: Preferably use absolute paths instead of relative paths when dealing with filesystem operations.</li>
<li>Access Restriction: Limit application access to only the directories and files necessary for its operations.</li>
<li>Sandboxing: Run the application in a sandboxed environment to minimize the impact of a successful exploitation.</li>
<br><br>
In summary, Path Traversal vulnerability can be dangerous if not properly mitigated. Therefore, developers and system administrators must be aware of these vulnerabilities and implement appropriate security measures to protect their systems.
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
</body>
</html>
