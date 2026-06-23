 <style>
   
    :root {
      --orange:        #E8721A;   /* logo orange */
      --orange-light:  #F59340;   /* lighter tint */
      --orange-dim:    rgba(232,114,26,.10);
      --orange-glow:   rgba(232,114,26,.22);
 
      --charcoal:      #1A1A1C;   /* logo dark triangle */
      --surface:       #1F2023;
      --surface2:      #26272B;
      --border:        rgba(232,114,26,.14);
      --border-soft:   rgba(255,255,255,.07);
 
      --muted:         rgba(255,255,255,.42);
      --text:          rgba(255,255,255,.82);
      --white:         #ffffff;
 
      
    }
 
    /* ════════════════════════════════════════
       FOOTER WRAPPER
    ════════════════════════════════════════ */
    .site-footer {
      background: var(--charcoal);
      border-top: 1px solid var(--border);
      position: relative;
      overflow: hidden;
    }
 
    /* subtle top-left glow from logo color */
    .site-footer::before {
      content: '';
      position: absolute;
      top: -120px; left: -120px;
      width: 480px; height: 480px;
      border-radius: 50%;
      background: radial-gradient(circle, var(--orange-glow) 0%, transparent 65%);
      pointer-events: none;
    }
 
    /* ── TOP BAND: tagline ── */
    .footer-top {
      border-bottom: 1px solid var(--border-soft);
      padding: 48px 0;
    }
 
    .footer-top-inner {
      max-width: 1300px;
      margin: 0 auto;
      padding: 0 5vw;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 2rem;
      flex-wrap: wrap;
    }
 
    .footer-tagline {
      font-family: var(--display);
      font-size: clamp(1.5rem, 3vw, 2.2rem);
      font-weight: 600;
      color: var(--white);
      line-height: 1.2;
    }
 
    .footer-tagline em {
      font-style: italic;
      color: var(--orange);
    }
 
    .footer-cta {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      padding: 13px 28px;
      background: linear-gradient(135deg, var(--orange), var(--orange-light));
      color: var(--white);
      font-family: var(--body);
      font-weight: 600;
      font-size: .875rem;
      letter-spacing: .04em;
      border-radius: 8px;
      text-decoration: none;
      white-space: nowrap;
      transition: opacity .2s ease, transform .2s ease, box-shadow .2s ease;
    }
 
    .footer-cta:hover {
      opacity: .88;
      transform: translateY(-2px);
      box-shadow: 0 10px 24px rgba(232,114,26,.35);
    }
 
    /* ── MAIN GRID ── */
    .footer-main {
      max-width: 1300px;
      margin: 0 auto;
      padding: 56px 5vw 48px;
      display: grid;
      grid-template-columns: 2fr 1fr 1.6fr;
      gap: 3.5rem;
    }
 
    /* Brand col */
    .footer-brand-logo {
      display: flex;
      align-items: center;
      gap: 12px;
      text-decoration: none;
      margin-bottom: 1.25rem;
    }
 
    .footer-brand-logo img {
      height: 46px;
      width: auto;
      /* invert the dark parts slightly for dark bg */
      filter: drop-shadow(0 0 6px rgba(232,114,26,.3));
    }
 
    .brand-name {
      font-family: var(--display);
      font-size: 1.5rem;
      font-weight: 700;
      color: var(--white);
      letter-spacing: .04em;
      line-height: 1;
    }
 
    .brand-name span { color: var(--orange); }
 
    .brand-tagline-small {
      font-family: var(--mono);
      font-size: .65rem;
      letter-spacing: .14em;
      text-transform: uppercase;
      color: var(--orange);
      margin-top: 2px;
    }
 
    .footer-desc {
      font-size: .875rem;
      color: var(--muted);
      line-height: 1.8;
      margin-bottom: 1.75rem;
    }
 
    /* NABL badge */
    .nabl-badge {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 7px 16px;
      border: 1px solid var(--border);
      border-radius: 100px;
      background: var(--orange-dim);
    }
 
    .nabl-badge-dot {
      width: 7px; height: 7px;
      border-radius: 50%;
      background: var(--orange);
      animation: pulse-dot 2s ease-in-out infinite;
    }
 
    @keyframes pulse-dot {
      0%,100% { box-shadow: 0 0 0 0 rgba(232,114,26,.6); }
      50%      { box-shadow: 0 0 0 5px rgba(232,114,26,0); }
    }
 
    .nabl-badge span {
      font-family: var(--mono);
      font-size: .68rem;
      letter-spacing: .14em;
      text-transform: uppercase;
      color: var(--orange-light);
    }
 
    /* Column headers */
    .footer-col h6 {
      font-family: var(--mono);
      font-size: .7rem;
      letter-spacing: .2em;
      text-transform: uppercase;
      color: var(--orange);
      margin-bottom: 1.4rem;
      padding-bottom: .75rem;
      border-bottom: 1px solid var(--border-soft);
    }
 
    .footer-col ul {
      list-style: none;
      display: flex;
      flex-direction: column;
      gap: .8rem;
    }
 
    .footer-col a {
      display: inline-flex;
      align-items: center;
      gap: 7px;
      font-size: .875rem;
      color: var(--muted);
      text-decoration: none;
      transition: color .18s ease, gap .18s ease;
    }
 
    .footer-col a::before {
      content: '';
      width: 0;
      height: 1px;
      background: var(--orange);
      transition: width .18s ease;
      flex-shrink: 0;
    }
 
    .footer-col a:hover {
      color: var(--white);
      gap: 10px;
    }
 
    .footer-col a:hover::before {
      width: 12px;
    }
 
    /* Contact col */
    .contact-item {
      display: flex;
      align-items: flex-start;
      gap: 12px;
      font-size: .875rem;
      color: var(--muted);
      line-height: 1.6;
    }
 
    .contact-icon {
      width: 32px; height: 32px;
      border-radius: 8px;
      background: var(--orange-dim);
      border: 1px solid var(--border);
      display: grid;
      place-items: center;
      color: var(--orange);
      font-size: .75rem;
      flex-shrink: 0;
      margin-top: 1px;
      transition: background .18s ease, color .18s ease;
    }
 
    .contact-item:hover .contact-icon {
      background: var(--orange);
      color: var(--white);
    }
 
    .contact-item:hover .contact-text {
      color: var(--text);
    }
 
    .contact-text { transition: color .18s ease; }
 
    /* ── BOTTOM BAR ── */
    .footer-bottom {
      border-top: 1px solid var(--border-soft);
    }
 
    .footer-bottom-inner {
      max-width: 1140px;
      margin: 0 auto;
      padding: 22px 5vw;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 1rem;
      flex-wrap: wrap;
    }
 
    .footer-copy {
      font-size: .78rem;
      color: var(--muted);
    }
 
    .footer-meta {
      display: flex;
      align-items: center;
      gap: 1.5rem;
    }
 
    .footer-meta a {
      font-size: .78rem;
      color: var(--muted);
      text-decoration: none;
      transition: color .18s ease;
    }
 
    .footer-meta a:hover { color: var(--orange); }
 
    .footer-meta-dot {
      width: 3px; height: 3px;
      border-radius: 50%;
      background: var(--border-soft);
    }
 
    /* ── RESPONSIVE ── */
    @media (max-width: 960px) {
      .footer-main {
        grid-template-columns: 1fr 1fr;
        gap: 2.5rem;
      }
      .footer-main > div:first-child {
        grid-column: 1 / -1;
      }
    }
 
    @media (max-width: 560px) {
      .footer-main { grid-template-columns: 1fr; }
      .footer-top-inner { flex-direction: column; align-items: flex-start; }
      .footer-bottom-inner { flex-direction: column; align-items: flex-start; }
      .footer-meta { flex-wrap: wrap; gap: 1rem; }
    }
  </style>
 <footer class="site-footer">
 
  <!-- Top tagline band -->
  <div class="footer-top">
    <div class="footer-top-inner">
      <h2 class="footer-tagline">
        Accurate results.<br><em>Every single time.</em>
      </h2>
      <a href="contact.php" class="footer-cta">
        Start a Test Request <i class="fa-solid fa-arrow-right"></i>
      </a>
    </div>
  </div>
 
  <!-- Main grid -->
  <div class="footer-main">
 
    <!-- Brand column -->
    <div>
      <a class="footer-brand-logo" href="index.php">
        <img src="images/Accura_Gold-Logo.png" alt="Accura Gold Logo" />
        <div>
          <div class="brand-name">ACCURA <span>GOLD</span></div>
          <div class="brand-tagline-small">Minerals Testing Labs</div>
        </div>
      </a>
      <p class="footer-desc">
        Accura Gold Minerals Testing Labs Private Limited provides the highest standard of analytical testing for the mining and minerals trade industry — trusted by clients across India and beyond.
      </p>
      <div class="nabl-badge">
        <div class="nabl-badge-dot"></div>
        <span>NABL Accredited · ISO/IEC 17025</span>
      </div>
    </div>
 
    <!-- Quick Links -->
    <div class="footer-col">
      <h6>Quick Links</h6>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="contact.php">Contact Us</a></li>
        <li><a href="results.php">Results</a></li>
        <li><a href="login.php">Login</a></li>
      </ul>
    </div>
 
    <!-- Services -->
    <!-- <div class="footer-col">
      <h6>Services</h6>
      <ul>
        <li><a href="about.php">Chemical Analysis</a></li>
        <li><a href="about.php">Fire Assay</a></li>
        <li><a href="about.php">XRF Spectrometry</a></li>
        <li><a href="about.php">Trade Certification</a></li>
      </ul>
    </div> -->
 
    <!-- Contact -->
    <div class="footer-col">
      <h6>Contact</h6>
      <ul style="gap:1.1rem">
        <li>
          <div class="contact-item">
            <div class="contact-icon"><i class="fa-solid fa-envelope"></i></div>
            <span class="contact-text">accuratestinglabs@gmail.com</span>
          </div>
        </li>
        <li>
          <div class="contact-item">
            <div class="contact-icon"><i class="fa-solid fa-phone"></i></div>
            <span class="contact-text">+91 800 123 4567</span>
          </div>
        </li>
        <li>
          <div class="contact-item">
            <div class="contact-icon"><i class="fa-solid fa-location-dot"></i></div>
            <span class="contact-text">773-A, Sri Selvalakshmi Complex,<br>
    Ponnagar, Salem Road,<br>
    Namakkal - 637001,<br>
    Namakkal District, Tamil Nadu, India</span>
          </div>
        </li>
      </ul>
    </div>
 
  </div>
 
  <!-- Bottom bar -->
  <div class="footer-bottom">
    <div class="footer-bottom-inner">
      <p class="footer-copy">
        &copy; 2026 Accura Gold Minerals Testing Labs Pvt Ltd. All rights reserved.
      </p>
      <div class="footer-meta">
        <a href="#">Privacy Policy</a>
        <div class="footer-meta-dot"></div>
        <a href="#">Terms of Use</a>
        <div class="footer-meta-dot"></div>
        <a href="#">Sitemap</a>
      </div>
    </div>
  </div>
 
</footer>