<?php
/**
* Template Name: Homepage
*
*/

get_header();
?>

<main class="sections sections-homepage">
	<section class="section section-welcome">
		<div class="section-container">
			<div class="section-title">
				<div class="headline">
					<p class="headline-catch" data-context>Let's keep it simple</p>
					<h1 class="headline-title headline-scaled">
						<p data-context>Heya,</p>
						<br>
						<span data-context>I'm</span>
						<p data-context>Martin Spatovaliyski</p>
					</h1>
					<h3 class="headline-subtitle" data-context>web developer / WordPress enthusiast, core contributor</h3>
				</div>

				<div class="copy animation-reveal">
					<p data-context>I'm a Front-end developer who does theme building, plugin development, end-to-end website development with and without WordPress for just over 5 years.</p>
				</div>
			</div>

			<aside class="section-aside">
				<svg id="visual" viewBox="0 0 900 600" width="900" height="600" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"><rect x="0" y="0" width="900" height="600" fill="#16161d"></rect><g transform="translate(460.31834684697725 305.99920918265997)"><path d="M90.7 -165.1C117.8 -141.5 140.1 -117.6 162.5 -90.1C184.9 -62.5 207.5 -31.3 215.3 4.5C223.2 40.3 216.4 80.7 194.1 108.4C171.7 136.1 133.9 151.2 98.9 169C64 186.9 32 207.4 -7.3 220.1C-46.7 232.8 -93.3 237.7 -125.7 218.3C-158 199 -176 155.5 -196.2 115.1C-216.3 74.7 -238.7 37.3 -239.1 -0.2C-239.5 -37.8 -218.1 -75.7 -199.6 -119C-181.1 -162.3 -165.5 -211 -132.8 -231.3C-100 -251.5 -50 -243.3 -9.1 -227.5C31.8 -211.8 63.7 -188.6 90.7 -165.1" fill="#1b1b24"></path></g></svg>
			</aside>
		</div>
	</section>

	<section id="experience" class="section section-experience">
		<div class="section-container">
			<div class="section-title">
				<div class="headline">
					<p class="headline-catch">Who am I?</p>
					<h2 class="headline-title headline-scaled">Why am I <span>worth</span>&nbsp;your time?</h2>
				</div>

				<div class="copy">
					<?php echo the_content(); ?>	
				</div>
			</div>

			<aside class="section-aside">
				<div class="skills-table">
					<h3>Skills I possess</h3>
					<ul class="skills-tab">
						<li class="skill highlight">HTML5</li>
						<li class="skill highlight">SCSS/CSS</li>
						<li class="skill highlight">Git</li>
						<li class="skill highlight">jQuery</li>
						<li class="skill highlight">JSON</li>
						<li class="skill highlight">Ajax</li>
						<li class="skill highlight">ACF</li>
						<li class="skill highlight">Gulp</li>
						<li class="skill highlight">PHP</li>
						<li class="skill highlight">LAMP</li>
						<li class="skill highlight">WordPress</li>
						<li class="skill highlight">Foundation 5</li>
						<li class="skill highlight">E2E Development</li>
						<li class="skill highlight">Project Leadership</li>
					</ul>

					<h3>What I've picked from time to time (on a need basis)</h3>
					<ul class="skills-tab">
						<li class="skill">Bootstrap</li>
						<li class="skill">GSAP</li>
						<li class="skill">Locomotive</li>
						<li class="skill">XML</li>
						<li class="skill">WooCommerce</li>
						<li class="skill">DB management</li>
						<li class="skill">Figma</li>
						<li class="skill">Adobe Suite</li>
					</ul>

					<h3>I've dabbled with (&nbsp;<span>and wish to expand!</span>&nbsp;)</h3>
					<ul class="skills-tab">
						<li class="skill highlight">React</li>
						<li class="skill">Vue</li>
						<li class="skill">Three.js</li>
						<li class="skill">Laravel</li>
						<li class="skill">Python</li>
					</ul>
				</div>
			</aside>
		</div>
	</section>

	<section id="work" class="section section-projects">
		<div class="section-container">
			<div class="section-title">
				<div class="headline">
					<p class="headline-catch">What's my background?</p>
					<h2 class="headline-title headline-scaled">Let's take a look at some old&nbsp;<span>work</span></h2>
				</div>
			</div>

			<aside class="section-aside">
				<div class="portfolio-tabs">
					<div class="portfolio-item">
						<picture class="portfolio-thumbnail">
							<img src="https://spatovaliyski.com/wp-content/uploads/2022/10/chrome_9IAdHpKTiN.jpg" alt="">
						</picture>

						<div class="portfolio-item-info">
							<h2 class="portfolio-title"><a target=_blank href="https://cilect.org" class="portfolio-item-link">CILECT</a></h2>
							<div class="portfolio-description">
								<p>Ongoing</p>
								<p>This is a project I'm currently working on. It involves a full website redesign, rework, database rework and funcionality upgrade from its old 2006-2021 version. <br>There is <b>no</b> source code.</p>
							</div>
						</div>
						<div class="portfolio-meta">
							<ul class="portfolio-stack-list">
								<li>SCSS</li>
								<li>PHP</li>
								<li>jQuery</li>
								<li>Gulp</li>
								<li>Headroom.js</li>
								<li>GSAP</li>
								<li>Locomotive</li>
								<li>WordPress</li>
							</ul>

							<ul class="portfolio-source-links">
								<!-- <li><a target=_blank href="https://cilect.org"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor"><path d="M288 32c-17.7 0-32 14.3-32 32s14.3 32 32 32h50.7L169.4 265.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L384 141.3V192c0 17.7 14.3 32 32 32s32-14.3 32-32V64c0-17.7-14.3-32-32-32H288zM80 64C35.8 64 0 99.8 0 144V400c0 44.2 35.8 80 80 80H336c44.2 0 80-35.8 80-80V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v80c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V144c0-8.8 7.2-16 16-16h80c17.7 0 32-14.3 32-32s-14.3-32-32-32H80z"/></svg></a></li> -->
							</ul>
						</div>
					</div>

					<div class="portfolio-item">
						<picture class="portfolio-thumbnail">
							<img src="https://spatovaliyski.com/wp-content/uploads/2022/10/chrome_oKHPxdr4zL.png" alt="">
						</picture>

						<div class="portfolio-item-info">
							<h2 class="portfolio-title"><a target=_blank href="https://github.com/Spatovaliyski/portfolio" class="portfolio-item-link">Portfolio v1.0</a></h2>
							<div class="portfolio-description">
								<p>2022</p>
								<p>My own portfolio is open source! The repository contains a wp-content folder, which has its theme there.</p>
							</div>
						</div>
						<div class="portfolio-meta">
							<ul class="portfolio-stack-list">
								<li>SCSS</li>
								<li>PHP</li>
								<li>jQuery</li>
								<li>Gulp</li>
								<li>Headroom.js</li>
								<li>WordPress</li>
							</ul>

							<ul class="portfolio-source-links">
								<li><a target=_blank href="https://github.com/Spatovaliyski/portfolio"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512" fill="currentColor"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3.3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5.3-6.2 2.3zm44.2-1.7c-2.9.7-4.9 2.6-4.6 4.9.3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3.7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3.3 2.9 2.3 3.9 1.6 1 3.6.7 4.3-.7.7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3.7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3.7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z"/></svg></a></li>
							</ul>
						</div>
					</div>

					<div class="portfolio-item">
						<picture class="portfolio-thumbnail">
							<img src="https://spatovaliyski.com/wp-content/uploads/2022/10/CaqWzGe.png" alt="">
						</picture>

						<div class="portfolio-item-info">
							<h2 class="portfolio-title"><a target=_blank href="https://ldjam.com/events/ludum-dare/48/granny-goes-deep" class="portfolio-item-link">"Granny Goes Deep"</a></h2>
							<div class="portfolio-description">
								<p>2021</p>
								<p>A noteworthy <b>playable</b> project to say the least! This was a team Game Jam to create a game in under 5 days. I took part in Interface Development, Tooltips, End screen messages, and more! </p>
							</div>
						</div>
						<div class="portfolio-meta">
							<ul class="portfolio-stack-list">
								<li>Unity</li>
								<li>UI / UX</li>
								<li>C#</li>
								<li>Photoshop</li>
							</ul>

							<ul class="portfolio-source-links">
								<li><a target=_blank href="https://universeflow.itch.io/granny-goes-deep"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" fill="currentColor"><path d="M192 64C86 64 0 150 0 256S86 448 192 448H448c106 0 192-86 192-192s-86-192-192-192H192zM496 248c-22.1 0-40-17.9-40-40s17.9-40 40-40s40 17.9 40 40s-17.9 40-40 40zm-24 56c0 22.1-17.9 40-40 40s-40-17.9-40-40s17.9-40 40-40s40 17.9 40 40zM168 200c0-13.3 10.7-24 24-24s24 10.7 24 24v32h32c13.3 0 24 10.7 24 24s-10.7 24-24 24H216v32c0 13.3-10.7 24-24 24s-24-10.7-24-24V280H136c-13.3 0-24-10.7-24-24s10.7-24 24-24h32V200z"/></svg></a></li>
								<li><a target=_blank href="https://ldjam.com/events/ludum-dare/48/granny-goes-deep"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor"><path d="M288 32c-17.7 0-32 14.3-32 32s14.3 32 32 32h50.7L169.4 265.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L384 141.3V192c0 17.7 14.3 32 32 32s32-14.3 32-32V64c0-17.7-14.3-32-32-32H288zM80 64C35.8 64 0 99.8 0 144V400c0 44.2 35.8 80 80 80H336c44.2 0 80-35.8 80-80V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v80c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V144c0-8.8 7.2-16 16-16h80c17.7 0 32-14.3 32-32s-14.3-32-32-32H80z"/></svg></a></li>
							</ul>
						</div>
					</div>

					<div class="portfolio-item">
						<picture class="portfolio-thumbnail">
							<img src="https://spatovaliyski.com/wp-content/uploads/2022/10/chrome_hC77g9HnVT.png" alt="">
						</picture>

						<div class="portfolio-item-info">
							<h2 class="portfolio-title"><a target=_blank href="https://github.com/Spatovaliyski/sc2-webui" class="portfolio-item-link">SCII Panel</a></h2>
							<div class="portfolio-description">
								<p>2020</p>
								<p>This panel was created as a small doodle. The intention here was to keep very close approach to the game Starcraft II's awards tab. </p>
							</div>
						</div>
						<div class="portfolio-meta">
							<ul class="portfolio-stack-list">
								<li>SCSS</li>
								<li>PHP</li>
								<li>jQuery</li>
								<li>Gulp</li>
							</ul>

							<ul class="portfolio-source-links">
								<li><a target=_blank href="https://github.com/Spatovaliyski/sc2-webui"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512" fill="currentColor"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3.3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5.3-6.2 2.3zm44.2-1.7c-2.9.7-4.9 2.6-4.6 4.9.3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3.7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3.3 2.9 2.3 3.9 1.6 1 3.6.7 4.3-.7.7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3.7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3.7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z"/></svg></a></li>
							</ul>
						</div>
					</div>

					<div class="portfolio-item">
						<picture class="portfolio-thumbnail">
							<img src="https://spatovaliyski.com/wp-content/uploads/2022/10/chrome_qEbCacuGel.png" alt="">
						</picture>

						<div class="portfolio-item-info">
							<h2 class="portfolio-title"><a target=_blank href="https://github.com/Spatovaliyski/LeagueWeb" class="portfolio-item-link">League of Legends - Beta launcher prototype</a></h2>
							<div class="portfolio-description">
								<p>2019</p>
								<p>League of Legends was about to update its launcher so I decided to create a mockup web version of their prototype image <a href="https://preview.redd.it/zbx2br77bea31.png?width=1276&format=png&auto=webp&s=2a8d1d2413e697b120382ef0c6b9d3af01969b2c">source</a></p>
							</div>
						</div>
						<div class="portfolio-meta">
							<ul class="portfolio-stack-list">
								<li>SCSS</li>
								<li>jQuery</li>
								<li>Gulp</li>
							</ul>

							<ul class="portfolio-source-links">
								<li><a target=_blank href="https://github.com/Spatovaliyski/LeagueWeb"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512" fill="currentColor"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3.3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5.3-6.2 2.3zm44.2-1.7c-2.9.7-4.9 2.6-4.6 4.9.3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3.7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3.3 2.9 2.3 3.9 1.6 1 3.6.7 4.3-.7.7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3.7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3.7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z"/></svg></a></li>
							</ul>
						</div>
					</div>
				</div>
			</aside>
		</div>
	</section>

	<section id="contact" class="section section-contact">
		<div class="section-container">
			<div class="section-title">
				<div class="headline">
					<p class="headline-catch">Let's talk</p>
					<h2 class="headline-title headline-scaled">Get in touch</h2>
					
					<div class="copy">
						<p>I'm currently looking for new oportunities! The button below should open an email client with my Email address auto-filled.</p>
					</div>

					<div class="contact-group">
						<a href="mailto:martinspatovaliyski@gmail.com" rel="noopener noreferrer" target=_blank class="button button-primary">Let's chat</a>
						<span class="contact-copy">
							<a id="copy-chat-clipboard" href="martinspatovaliyski@gmail.com">Copy email to clipboard instead</a>
							<span class="copy-chat-popup">Copied!</span>
						</span>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();