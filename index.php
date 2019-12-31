<!DOCTYPE html>
<html lang="de">

<head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Scripts | Links -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <script src="https://kit.fontawesome.com/0aa0d93f20.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="js/app.js"></script>

    <title>MG-Media</title>
</head>

<body>
    <nav>
        <a href="#home">Home</a>
        <a href="#portfolio">Portfolio</a>
        <a href="#aboutme">About Me</a>
        <a href="#contact">Contact</a>
    </nav>
    <section class="workplace" id="home">
        <img src="img/Tisch.svg" alt="Schreibtisch">
        <div class="ground"></div>
    </section>
    <section class="portfolio" id="portfolio">
        <div class="cards">
            <div class="card pcard1">
                <div class="iconBox"><i class="fas fa-graduation-cap fa-6x"></i></div>
                <div class="layer layer1"></div>
                <div class="layer layer2"></div>
                <div class="contentBox">
                    <h2>AGS-Erfurt International</h2>
                    <p>This project was created in school.
                        The task was to develop a website that offers the
                        opportunity to document contributions to school
                        exchange projects.</p>
                    <a href="https://international.ags-erfurt.de/" target="_blank" rel="noopener">Visit Page</a>
                </div>
            </div>
            <div class="card pcard2">
                <div class="iconBox"><i class="fas fa-fire-extinguisher fa-6x"></i></div>
                <div class="layer layer1"></div>
                <div class="layer layer2"></div>
                <div class="contentBox">
                    <h2>Fire Department Neudietendorf</h2>
                    <p>A project which is close to my heart.
                        As a member of our local volunteer fire brigade,
                        I have made it my task to improve our web presence
                        to a modern standard.</p>
                    <a href="https://feuerwehr-neudietendorf.de/" target="_blank" rel="noopener">Visit Page</a>
                </div>
            </div>
            <div class="card pcard3">
                <div class="iconBox"><i class="fas fa-clipboard-list fa-6x"></i></div>
                <div class="layer layer1"></div>
                <div class="layer layer2"></div>
                <div class="contentBox">
                    <h2>Einsatzverwaltung</h2>
                    <p>Current Project. It should become a web platform for
                        the organisation of emergency statistics for
                        fire brigades.</p>
                    <a href="https://github.com/Squizzi3/einsatzverwaltung" target="_blank" rel="noopener">Visit
                        Github</a>
                </div>
            </div>
            <div class="card action">
                <a href="#contact"><p>Yours next?</p></a>
            </div>
        </div>
    </section>
    <section class="aboutme" id="aboutme">
        <div class="sp-container">
            <div class="box person">
                <div class="hexagon">
                    <div class="hexTop"></div>
                    <div class="hexBottom"></div>
                </div>
                <h3>MARTIN GNODTKE</h3>
                <p>I am a 21 year old IT Specialist from Germany. In my job as a quality assurance engineer
                    I work on the test automation of various applications. Currently I am developing a new
                    tool for performance testing using image recognition. In my spare time I like to spend
                    my time with web development. I like to create new websites, also you can be creative.
                    If I'm not in front of the PC, I'm usually in the fire department and do the most exciting voluntary
                    work.
                </p>
            </div>
            <div class="box bars">
                <h3>HTML</h3>
                <div class="bar html"></div>
                <h3>CSS</h3>
                <div class="bar css"></div>
                <h3>PHP</h3>
                <div class="bar php"></div>
                <h3>MySQL</h3>
                <div class="bar mysql"></div>
                <h3>Wordpress</h3>
                <div class="bar wp"></div>
                <h3>JavaScript</h3>
                <div class="bar js"></div>
                <h3>Java</h3>
                <div class="bar java"></div>
                <h3>Adobe XD</h3>
                <div class="bar xd"></div>
            </div>
        </div>
    </section>
    <section class="contact" id="contact">
        <div>
        <?php
            // define variables and set to empty values
            $nameErr = $emailErr = $subjectErr = $messageErr = "";
            $name = $email = $subject = $message = $success = "";

            if (isset($_POST['submit'])) {
                if (empty($_POST["fname"])) {
                    $nameErr = "Name is required";
                } else {
                    $name = test_input($_POST["fname"]);

                    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                        $nameErr = "Only letters and white space allowed";
                    }
                }

                if (empty($_POST["email"])) {
                    $emailErr = "E-Mail is required";
                } else {
                    $email = test_input($_POST["email"]);

                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $emailErr = "Invalid E-Mail format";
                    }
                }

                if (empty($_POST["subject"])) {
                    $subjectErr = "Subject is required";
                } else {
                    $subject = test_input($_POST["subject"]);
                }

                if (empty($_POST["message"])) {
                    $messageErr = "Message is required";
                } else {
                    $message = test_input($_POST["message"]);
                }

                if(empty($nameErr) && empty($emailErr) && empty($subjectErr) && empty($messageErr)) {
                    sendMail($name, $email, $subject, $message);
                    $success = "E-Mail send successfully!";
                }	
            }

            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            function sendMail($subject, $email, $fname, $message) {
                $mailTo = "kontakt@martin-gnodtke.de";
                $headers = "From: " . $email;
                $txt = "Diese E-Mail kommt von " . $fname . ".\n\n".$message;

                mail($mailTo, $subject, $txt, $headers);
            }
        ?>
            <form action="index.php#contact" method="post">
                <label for="fname">Full Name</label>
                <span class="error"><?php if(!empty($nameErr)) { echo '* ' . $nameErr; }?></span>
                <input type="text" id="fname" name="fname" placeholder="Your Name" value="<?php if(empty($success)) { echo $name; }?>" >

                <label for="email">E-Mail</label>
                <span class="error"><?php if(!empty($emailErr)) { echo '* ' . $emailErr; }?></span>
                <input type="text" id="email" name="email" placeholder="Your E-Mail" value="<?php if(empty($success)) { echo $email; }?>" >

                <label for="subject">Subject</label>
                <span class="error"><?php if(!empty($subjectErr)) { echo '* ' . $subjectErr; }?></span>
                <input type="text" id="subject" name="subject" placeholder="Subject" value="<?php if(empty($success)) { echo $subject; }?>" >

                <label for="message">Message | Idea | Problem</label>
                <span class="error"><?php if(!empty($messageErr)) { echo '* ' . $messageErr; }?></span>
                <textarea id="message" name="message" placeholder="Your Text" style="height:200px"><?php if(empty($success)) { echo $message; }?></textarea>

                <input type="submit" name="submit" value="Submit">
                <span class="success"><?php if(!empty($success)) { echo $success; }?></span>
            </form>
        </div>
    </section>
</body>
<footer>
    <div id="footer-div">
        <div id="footer-socials" class="menu-footermenue-container">
            <ul id="menu-footermenue">
                <li><a href="https://www.facebook.com/martin.gnodtke"><i class="fab fa-facebook-square fa-2x"></i></a></li>
                <li><a href="https://github.com/Squizzi3"><i class="fab fa-github fa-2x"></i></a></li>
                <li><a href="https://www.instagram.com/_martin_travels_"><i class="fab fa-instagram fa-2x"></i></a></li>
            </ul>
        </div>
        <div id="footer-infos" class="menu-footermenue-container">
            <ul id="menu-footermenue">
                <li><a href="https://feuerwehr-neudietendorf.de/datenschutz/">Datenschutz</a></li>
                <li><a href="https://feuerwehr-neudietendorf.de/impressum/">Impressum</a></li>
            </ul>
        </div>
        <div id="footer-copyright">
            <p>Made with <i class="fas fa-heart"></i> and <i class="fas fa-coffee"></i> by Martin Gnodtke</p>
        </div>
    </div>
</footer>
</html>