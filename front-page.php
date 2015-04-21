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
                <!-- <p class="unique-story">Every brand has its own unique story.<br />We tell it.</p> -->
            </div>
        </section>

        <section class="concept" id="concept">
            <div class="contents">
                <h2>concept &amp; idea.</h2>
                <p class="section-tagline">Wir liefern Ihnen klare Handlungsempfehlungen zur Optimierung Ihrer Online-Präsenz</p>
                <section class="relaunch">
                    <h3>Relaunch Concept</h3>
                    <p>Sie planen einen Re-/Launch? Wir beraten Sie gern und zeigen verdeckte Optimierungspotenziale auf. Zielbewusst nutzen wir unsere Expertise und erarbeiten ein zeitgemäßes Konzept, das individuelle Potenziale Ihres Projektes (von der ersten Besprechung bis zum Abschluss) voll ausschöpft.</p>
                </section>
                <section class="optimization">
                    <h3>Ranking &amp; Conversion Optimization</h3>
                    <p>Mit uns erzielen Sie einen Anstieg Ihrer Besucherzahlen sowie nachhaltig konvertierenden Traffic auf Ihrer Webseite. Unsere Maßnahmen sind an Ihren individuellen Zielen ausgerichtet und umfassen beispielsweise die Verbesserung Ihrer Webseiten-Struktur oder eine Layout- oder Warenkorb-Optimierung.</p>
                </section>
                <section class="analysis">
                    <h3>Data Acquisition &amp; Evaluation</h3>
                    <p>Detaillierte Konkurrenzanalysen sowie einmalige oder regelmäßige Onpage- und Offpage-Audits sind richtungsweisende Elemente unseres ganzheitlichen Beratungskonzepts. Wir schaffen auf Basis der erhobenen Daten eine individuell ausgerichtete Lösungsstrategie.</p>
                </section>
            </div>
        </section>

        <section class="growth" id="growth">
            <div class="contents">
                <h2>growth &amp; progress.</h2>
                <p class="section-tagline">Unser Outreach-Marketing entfacht Begeisterung für Ihre Marke</p>
                <section class="brand">
                    <h3>brand building</h3>
                    <p>Wir kommunizieren die Werte Ihrer Marke an relevante Zielgruppen und empfehlen Ihnen strategisch wirksame Einsatzgebiete. Effiziente Online-Kommunikation in Verbindung mit zielgruppengerechten Inhalten verhelfen Ihnen zu einer langfristigen organischen Sichtbarkeit sowie zu einer erhöhten Markenbekanntheit.</p>
                </section>
                <section class="content">
                    <h3>content marketing</h3>
                    <p>Unser Content-Outreach basiert auf dem Empfehlungsmarketing und schafft die Nähe zu Ihrer Zielgruppe. Erreichen Sie die richtigen Menschen zur richtigen Zeit und lassen Sie sich beim Erzählen Ihrer Geschichte unter die Arme greifen - professionell und überzeugend.</p>
                </section>
                <section class="social">
                    <h3>social seeding</h3>
                    <p>Wir entwickeln eine Social-Sharing Strategie für Sie, die Ihren Quality Content auf gut sichtbaren Internetplattformen wie Blogs und sozialen Netzwerken in der ganzen Welt verteilt. Profitieren Sie von unseren gut vernetzten Publishern und wecken Sie das Interesse an Ihrer Marke.</p>
                </section>
            </div>
        </section>

        <section class="trust" id="trust">
            <div class="contents">
                <h2>commitment &amp; trust.</h2>
                <p class="section-tagline">Wir arbeiten mit höchstem Einsatz und kompromissloser Orientierung an Ihren Bedürfnissen</p>
                <section class="commitment">
                    <h3>Commitment</h3>
                    <p>Wir arbeiten mit Hingabe und höchster Leistungsbereitschaft und legen dabei größten Wert auf transparente Kommunikation. Lernen Sie unsere qualifizierten Mitarbeiter kennen, gewinnen Sie Einblick in unsere Arbeitsweisen und behalten Sie jederzeit einen Überblick über die erbrachten Leistungen.</p>
                </section>
                <section class="direct">
                    <h3>Immediate &amp; Personal Contact</h3>
                    <p>Trotz der allgegenwärtigen digitalen Kommunikation begeistern wir uns weiterhin für das persönliche Gespräch. Mit einem persönlichen Anpsrechpartner für den gesamten Kooperationszeitraum schenken wir Ihnen individuelle Aufmerksamkeit und stehen Ihnen gern und jederzeit zur Verfügung. </p>
                </section>
                <section class="cost-benefit">
                    <h3>Cost-Benefit Awareness</h3>
                    <p>Unserer Leistungen werden stetig an die rasanten Entwicklungen im Onlinebereich angepasst. Damit garantieren wir Ihnen höchste Qualität und eine zeitgemäße Unterstützung bei Ihrer Webseiten-Optimierung zu einem sehr guten Preis-Leistungs-Verhältnis.</p>
                </section>
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
