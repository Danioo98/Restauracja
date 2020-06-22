<?php

$twojemail = "moj-adres-email"; 
$blad=0;

if (isset($_POST['submit'])) {

            
            $temat = "Formularz kontaktowy"; 
            $name = htmlspecialchars(stripslashes(strip_tags(trim($_POST["name"]))), ENT_QUOTES);
            $email = htmlspecialchars(stripslashes(strip_tags(trim($_POST["email"]))), ENT_QUOTES);
            $message = htmlspecialchars(stripslashes(strip_tags(trim($_POST["message"]))), ENT_QUOTES);
            $subject = htmlspecialchars(stripslashes(strip_tags(trim($_POST["subject"]))), ENT_QUOTES);
            $tel = htmlspecialchars(stripslashes(strip_tags(trim($_POST["tel"]))), ENT_QUOTES);

            
            if (!$name) {
                $blad++;
                echo '<p class="blad">Proszę wpisać swoje imię.</p>';
            }
            if (!$email) {
                $blad++;
                echo '<p class="blad">Proszę wpisać swój adres e-mail.</p>';
            }
            if (!$message) {
                $blad++;
                echo '<p class="blad">Proszę wpisać treść wiadomości.</p>';
            }
            
            if ($blad == 0) {

               
                $naglowki = "MIME-Version: 1.0" . "\r\n";
                $naglowki .= "Content-type:text/html;charset=utf-8" . "\r\n";

                
                $naglowki .= 'From: <'.$email.'>' . "\r\n";
                $naglowki .= 'Cc: <'.$twojemail.'>' . "\r\n";

                
                $message = nl2br($message);
                $wiadomosc = <<< KONIEC
                <html>
                    <p><strong>Imię i nazwisko:</strong> $name</p>
                    <p><strong>Telefon:</strong><br /> $tel</p>
                    <p><strong>E-mail:</strong> $email</p>
                    <p><strong>Wybrany temat:</strong><br /> $subject</p>
                    <p><strong>Wiadomość:</strong><br /> $message</p>
                </html>
KONIEC;
                
                $wynik = mail('<'.$twojemail.'>', $temat, $wiadomosc, $naglowki);

                
                if ($wynik) {
                    echo '

                    <div class="section-title">
                        <p></p>
                        <p></p>
                        <h2>Dziękujemy</h2>
                        <p><Strong>Wiadomość została wysłana</strong></p>
                        <p>Za chwilę nastąpi przekierowanie na stronę startową.</p>
                    </div>';
                } else {
                    echo '
                    <div class="section-title">
                        <h2>blad</h2>
                    </div>';
                }
            }

        }
?>
