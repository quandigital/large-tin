<?php 
	
	/* Front Page Template */

	get_header( 'front' );	
?>
    <div class="intro-layout">
        <div class="dark-corner"></div>
        <div class="light-corner-1"></div>
        <div class="light-corner-2"></div>
        <div class="background-corner"></div>
    </div>

    <article class="frontpage-text" id="frontpage">

        <section class="intro" id="intro">
            <div class="home-logo">
                <?php require_once __DIR__ . '/images/QuanDigital.svg'; ?>
            </div>
            
            <div class="contents">
                <p>Quan Digital ging aus dem Gedanken hervor, besseres Online Marketing durch innovative Technik, hohen menschlichen Anspruch und Begeisterung für unsere Kunden anzubieten.</p>
            </div>
        </section>

        <section class="concept" id="concept">
            <div class="contents">
                <h2>concept &amp; idea.</h2>
                <p class="section-tagline">Wir liefern klare Handlungsempfehlungen zur Optimierung Ihrer Online-Präsenz</p>
                <section class="relaunch">
                    <h3>relaunch concept</h3>
                    <p>Wir begleiten Sie bei der Planung und Umsetzung Ihrer neuen Webseite. Zielbewusst nutzen wir unsere Expertise und erarbeiten ein zeitgemäßes Konzept, das Fehlerquellen eliminiert und individuelle Potenziale Ihres Projektes voll ausschöpft.</p>
                </section>
                <section class="optimization">
                    <h3>ranking &amp; conversion optimization</h3>
                    <p>Mit uns erzielen Sie einen Anstieg Ihrer Besucher&shy;zahlen sowie nachhaltig konvertierenden Traffic auf Ihrer Webseite. Unsere Maßnahmen sind an Ihren individuellen Zielen ausgerichtet und umfassen beispielsweise die Verbesserung der Struktur oder des Layouts Ihrer Webseite.</p>
                </section>
                <section class="analysis">
                    <h3>data acquisition &amp; evaluation</h3>
                    <p>Detaillierte Konkurrenz&shy;analysen sowie einmalige oder regelmäßige Onpage- und Offpage-Audits sind richtungs&shy;weisende Elemente unseres ganzheitlichen Beratungskonzepts. Wir schaffen auf Basis der erhobenen Daten eine individuell ausgerichtete Lösungsstrategie.</p>
                </section>
                <div class="cta-container">
                    <div class="cta">
                        <div class="button">Work with us</div>
                    </div>
                </div>
            </div>
        </section>

        <section class="growth" id="growth">
            <div class="contents">
                <h2>growth &amp; progress.</h2>
                <p class="section-tagline">Unser Outreach-Marketing entfacht Begeisterung für Ihre Marke</p>
                <section class="brand">
                    <h3>brand building</h3>
                    <p>Wir kommunizieren die Werte Ihrer Marke an relevante Zielgruppen und empfehlen Ihnen strategisch wirksame Einsatzgebiete. Effiziente Online-Kommunikation in Verbindung mit ziel&shy;gruppengerechten Inhalten verhelfen Ihnen zu einer langfristigen organischen Sichtbarkeit sowie zu einer erhöhten Markenbekanntheit.</p>
                </section>
                <section class="content">
                    <h3>content marketing</h3>
                    <p>Unser Content-Outreach basiert auf dem Emp&shy;fehlungsmarketing und schafft die Nähe zu Ihrer Zielgruppe. Erreichen Sie die richtigen Menschen zur richtigen Zeit und lassen Sie sich beim Erzählen Ihrer Geschichte unter die Arme greifen &ndash; professionell und überzeugend.</p>
                </section>
                <section class="social">
                    <h3>social seeding</h3>
                    <p>Wir entwickeln eine Social-Sharing Strategie für Sie, die Ihren Quality Content auf gut sicht&shy;baren Internetplatt&shy;formen wie Blogs und sozialen Netzwerken in der ganzen Welt verteilt. Profitieren Sie von unseren gut vernetzten Publishern und wecken Sie das Interesse an Ihrer Marke.</p>
                </section>
                <div class="cta-container">
                    <div class="cta">
                        <div class="button">Work with us</div>
                    </div>
                </div>
            </div>
        </section>

        <section class="trust" id="trust">
            <div class="contents">
                <h2>commitment &amp; trust.</h2>
                <p class="section-tagline">Wir arbeiten mit höchstem Einsatz und kompromissloser Orientierung an Ihrer Marke</p>
                <section class="commitment">
                    <h3>commitment</h3>
                    <p>Mit großer Hingabe erfüllen wir die höchsten Ansprüche und legen dabei großen Wert auf transparente Kommu&shy;nikation. Lernen Sie unsere qualifizierten Mitarbeiter kennen, gewinnen Sie Einblick in unsere Arbeitsweisen und behalten Sie jederzeit einen Überblick über die erbrachten Leistungen.</p>
                </section>
                <section class="direct">
                    <h3>immediate &amp; personal contact</h3>
                    <p>Trotz der allgegenwär&shy;tigen digitalen Kommu&shy;nikation begeistern wir uns weiterhin für das persönliche Gespräch. Mit einem persönlichen Ansprechpartner für den gesamten Kooperations&shy;zeitraum schenken wir Ihnen individuelle Aufmerksamkeit und stehen Ihnen gern und jederzeit zur Verfügung. </p>
                </section>
                <section class="cost-benefit">
                    <h3>cost-benefit awareness</h3>
                    <p>Unsere Leistungen werden stetig an die rasanten Entwicklungen im Onlinebereich ange&shy;passt. Damit garantieren wir Ihnen höchste Quali&shy;tät und eine zeitgemäße Unterstützung bei Ihrer Webseiten-Optimierung zu einem sehr guten Preis-Leistungs-Verhältnis.</p>
                </section>
                <div class="cta-container">
                    <div class="cta">
                        <div class="button">Work with us</div>
                    </div>
                </div>
            </div>
        </section>
    </article>

    <div class="front-navigation">
        <div class="frontnav-item nav-intro">
            <a href="#intro"></a>
        </div>
        <div class="frontnav-item nav-concept">
            <a href="#concept"></a>
        </div>
        <div class="frontnav-item nav-growth">
            <a href="#growth"></a>
        </div>
        <div class="frontnav-item nav-trust">
            <a href="#trust"></a>
        </div>
    </div>
<?php
    get_footer();
