<?php
    
    /**
     * Template Name: French AdWords Landing Page (dirty)
     */
    
    add_action('wp_head', function() {
        echo '<meta name="robots" content="noindex">';
    });

    add_action('wp_footer', function() {
        echo '<!-- Google Code for Contact Form FR LP Conversion Page --> <script type="text/javascript">
            /* <![CDATA[ */
            var google_conversion_id = 945914834;
            var google_conversion_language = "en";
            var google_conversion_format = "3";
            var google_conversion_color = "ffffff";
            var google_conversion_label = "vzgUCMbizV8Q0oeGwwM"; var google_remarketing_only = false;
            /* ]]> */
            </script>
            <script type="text/javascript"  
            src="//www.googleadservices.com/pagead/conversion.js">
            </script>
            <noscript>
            <div style="display:inline;">
            <img height="1" width="1" style="border-style:none;" alt=""  
            src="//www.googleadservices.com/pagead/conversion/945914834/?label=vzgUCMbizV8Q0oeGwwM&amp;guid=ON&amp;script=0"/>
            </div>
            </noscript>';
    });

    get_header();
?>
    <section class="introduction">
        <div class="contents">
            <h1>E-commerce Paris 2015 : besoin de plus de trafic pour votre e-commerce ?</h1>
            <h2>Rencontrons-nous au salon de l’e-commerce et discutons-en</h2>
            <p>Notre équipe internationale est déterminée à débloquer votre potentiel sur internet. Demandez dès maintenant un RDV avec un expert en web marketing de notre équipe en précisant  l’URL de votre site. Nous prendrons soin de l’analyser et de vous proposer un RDV le 21, 22 ou 23 Septembre à Paris Expo afin de vous livrer les opportunités de trafic non exploitées autour d’un café.</p>
        </div>
        <form id="contact">
            <input type="text" name="name" placeholder="Nom" required>
            <input type="tel" name="phone" placeholder="Téléphone" required>
            <input type="email" name="email" placeholder="Mail" required>
            <input type="text" name="company" placeholder="Entreprise" required>
            <input type="text" name="website" placeholder="Site Internet" required>
            <button type="submit" class="button submit" id="send">Demander un RDV</button>
        </form>    
    </section>

    <section class="services-1">
        <div class="contents">
            <h2>La performance est au coeur de nos valeurs</h2>
            <div class="collab service">
                <h3>Une collaboration durable</h3>
                <p>Nous travaillons depuis plusieurs années avec la plupart de nos clients. Développer le trafic d'un site internet de manière durable est un travail de longue haleine.</p>
            </div>    
            <div class="trafic service">
                <h3>Plus de trafic</h3>
                <p>Générer du trafic vers un site internet est notre spécialité. Nous vous aidons à développer une stratégie pour augmenter votre trafic de manière continue.</p>
            </div>
            <div class="revenus service">
                <h3>Plus de revenus</h3>
                <p>Le trafic n'a d'intérêt que s'il apporte des conversions. Nous nous concentrons sur génération de trafic qualifié afin de booster aussi vos revenus.</p>
            </div>
        </div>
    </section>

    <section class="services-2">
        <div class="contents">
            <h2>Une approche intégrée du marketing en ligne</h2>
            <div class="analyse service">
                <h3>Analyser</h3>
                <p>Comprendre le comportement de vos clients sur internet est primordial pour exécuter une campagne efficace. S'assurer que votre site répond aux meilleures pratiques d'usabilité et d'indexabilité est la base du succès.</p>
            </div>    
            <div class="contenu service">
                <h3>Créer du contenu</h3>
                <p>Le contenu d'un site est primordial au sein d'une stratégie de marketing en ligne pertinente et durable, que ce soit pour booster votre SEO ou vos conversions.</p>
            </div>
            <div class="marque service">
                <h3>Promouvoir votre marque</h3>
                <p>Nous vous aidons à communiquer auprès des influenceurs et journalistes. Obtenir des backlinks et mentions sur des sites influents est une condition nécessaire pour booster votre SEO et votre image de marque.</p>
            </div>
        </div>
    </section>

    <section class="callout">
        <div class="text">Rencontrons-nous au salon de l’e-commerce !</div>
        <div class="cta">
            <a href="#contact">Demander un RDV</a>
        </div>
    </section>

<?php
    get_footer();
