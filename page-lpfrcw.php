<?php
    
    /**
     * Template Name: French Communication Web Landing Page (dirty)
     */
    
    add_action('wp_head', function() {
        echo '<meta name="robots" content="noindex">';
    });

    add_action('wp_footer', function() {
        
    });

    get_header();
?>
    <section class="introduction">
        <div class="contents">
            <h1>Agence de communication web</h1>
            <h2>Nous concevons et exécutons des stratégies de communication intégrées pour des clients internationaux.</h2>
            <p>Notre double compétence en digital (SEO &amp; publicité payante) et en communication (création de contenus &amp; relations presse) nous permet de concevoir des campagnes qui non seulement renforcent votre image de marque mais aussi votre chiffre d’affaires. En plus de développer votre présence sur internet, notre travail vous apporte à nos clients un flot continu de trafic vers leur site internet en provenance des moteurs de recherches, blogs &amp; réseaux sociaux. Vous souhaitez la même chose pour votre entreprise&thinsp;? Alors contactez-nous dès aujourd’hui.</p>
        </div>
        <form id="contact" data-page="<?= get_permalink(); ?>">
            <input type="text" name="name" placeholder="Nom" required>
            <input type="tel" name="phone" placeholder="Téléphone" required>
            <input type="email" name="email" placeholder="Mail" required>
            <input type="text" name="company" placeholder="Entreprise" required>
            <input type="text" name="website" placeholder="Site Internet" required>
            <button type="submit" class="button submit" id="send">Nous contacter</button>
        </form>    
    </section>

    <section class="services-1">
        <div class="contents">
            <h2>La performance est au coeur de nos valeurs</h2>
            <div class="collab service">
                <h3>Une collaboration durable</h3>
                <p>Nous travaillons depuis plusieurs années avec la plupart de nos clients.</p>
            </div>    
            <div class="visibilite service">
                <h3>Plus de visibilité</h3>
                <p>Améliorer la visibilité de votre marque via un mix de web marketing et de RP est notre spécialité.</p>
            </div>
            <div class="revenus service">
                <h3>Plus de revenus</h3>
                <p>Nous vous aidons aussi à transformer cette visibilité en un flux continu de nouveaux clients.</p>
            </div>
        </div>
    </section>

    <section class="services-2">
        <div class="contents">
            <h2>Une approche intégrée de la communication</h2>
            <div class="conseille service">
                <h3>Conseiller</h3>
                <p>Nous vous aidons à comprendre les comportements de votre cible sur internet élaborer des opérations de communication efficaces.</p>
            </div>    
            <div class="contenu service">
                <h3>Créer du contenu</h3>
                <p>Votre message doit être transmis via un médium adapté au web et ses à règles pour retenir l’attention de votre cible.</p>
            </div>
            <div class="marque service">
                <h3>Promouvoir votre marque</h3>
                <p>Nous vous aidons à communiquer auprès des influenceurs et journalistes ainsi qu’à développer votre présence sur les réseaux sociaux.</p>
            </div>
        </div>
    </section>

    <section class="callout">
        <div class="text">Commençons à collaborer ensemble</div>
        <div class="cta">
            <a href="#contact">Nous contacter</a>
        </div>
    </section>

<?php
    get_footer();
