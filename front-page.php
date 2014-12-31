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
                <p>Quan Digital started off with the idea of providing better online marketing through innovative technology, digital strategies and a passion for our customers.</p>
                <p class="unique-story">Every brand has its own unique story.<br />We tell it.</p>
            </div>
        </section>

        <section class="concept" id="concept">
            <div class="contents">
                <h2>concept &amp; idea.</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam repellendus ducimus, rem adipisci cum, pariatur perspiciatis odio assumenda?</p>
                <section class="relaunch">
                    <h3>Relaunch Concept</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime id incidunt, soluta quas odit suscipit! Ex eos placeat, eius atque delectus totam soluta in magni!</p>
                </section>
                <section class="optimization">
                    <h3>Ranking &amp; Conversion Optimization</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime id incidunt, soluta quas odit suscipit! Ex eos placeat, eius atque delectus totam soluta in magni!</p>
                </section>
                <section class="analysis">
                    <h3>Case-Based Data Acquisition and Evaluation</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime id incidunt, soluta quas odit suscipit! Ex eos placeat, eius atque delectus totam soluta in magni!</p>
                </section>
            </div>
        </section>

        <section class="growth" id="growth">
            <div class="contents">
                <h2>growth &amp; progress.</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi iusto incidunt quasi laborum expedita? Odio hic incidunt, obcaecati dolore nisi! Sed, aliquid!</p>
                <section class="brand">
                    <h3>Brand Building</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime id incidunt, soluta quas odit suscipit! Ex eos placeat, eius atque delectus totam soluta in magni!</p>
                </section>
                <section class="content">
                    <h3>Content Marketing</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime id incidunt, soluta quas odit suscipit! Ex eos placeat, eius atque delectus totam soluta in magni!</p>
                </section>
            </div>
        </section>

        <section class="trust" id="trust">
            <div class="contents">
                <h2>commitment &amp; trust.</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat minus, quis quae.</p>
                <section class="commitment">
                    <h3>Commitment</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime id incidunt, soluta quas odit suscipit! Ex eos placeat, eius atque delectus totam soluta in magni!</p>
                </section>
                <section class="direct">
                    <h3>Immediate &amp; Personal Contact</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime id incidunt, soluta quas odit suscipit! Ex eos placeat, eius atque delectus totam soluta in magni!</p>
                </section>
                <section class="cost-benefit">
                    <h3>Cost-Benefit Awareness</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime id incidunt, soluta quas odit suscipit! Ex eos placeat, eius atque delectus totam soluta in magni!</p>
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
