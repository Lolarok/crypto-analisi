<?php get_header();?>
<div class="price-ticker">
<div class="ticker-wrap">
<?php $watchlist=[["BTC","Bitcoin"],["ETH","Ethereum"],["HYPE","Hyperliquid"],["ONDO","Ondo"],["ENA","Ethena"],["SUI","Sui"],["TAO","Bittensor"],["SOL","Solana"]];
foreach($watchlist as $w){
  echo "<span class=ticker-item>".esc_html($w[0])." (".esc_html($w[1]).") <span class=price-up>Loading...</span></span>";
}?></div></div>
<main class="container">
<section style="margin:2rem 0">
<div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:2rem;padding-bottom:1rem;border-bottom:1px solid #1A1A2E">
<h2 style="font-size:1.4rem;font-weight:800">🎯 Watchlist Segnali — Marzo 2026</h2>
<span class="badge-live">● LIVE</span></div>
<div class="grid-4">
<?php $signals=[["HYPE","Hyperliquid",82,"🔥","Perp DEX L1 dominante"],["ONDO","Ondo Finance",75,"🔥","RWA leader globale"],["ENA","Ethena",68,"📈","Stablecoin sintetica"],["RNDR","Render Network",65,"📈","AI + GPU computing"],["SUI","Sui Network",63,"📈","Layer1 veloce"],["TAO","Bittensor",62,"📈","AI decentralizzata"],["PENDLE","Pendle",58,"➡️","Yield tokenization"],["JUP","Jupiter",55,"➡️","DEX Solana"]];
foreach($signals as $s){
  $cls=$s[2]>=75?"bullish":$s[2]>=60?"":$s[2]<45?"bearish":"";
  echo "<div class=signal-card> $cls>";
  echo "<div class=signal-score style=color:".($s[2]>=75?"#00E676":$s[2]>=60?"#FFD700":"#FF1744").">".$s[2]."</div>";
  echo "<div style=font-weight:800;font-size:1rem>".$s[0]."</div>";
  echo "<div style=font-size:.8rem;color:#90A0B0>".$s[1]."</div>";
  echo "<div style=font-size:1.4rem>".$s[3]."</div>";
  echo "<div style=font-size:.8rem;color:#90A0B0>".$s[4]."</div>";
  echo "</div>";
}?>
</div></section>
<section style="margin:3rem 0">
<div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:2rem;padding-bottom:1rem;border-bottom:1px solid #1A1A2E">
<h2 style="font-size:1.4rem;font-weight:800">📰 Ultime Notizie Crypto</h2>
<a href="<?php echo home_url("/notizie");?>" style="color:#00E5FF;font-size:.85rem">Tutte →</a></div>
<div class="grid-3">
<?php $news=new WP_Query(["posts_per_page"=>6]);
while($news->have_posts()):$news->the_post();?>
<article class="article-card">
<div class="card-image"><?php if(has_post_thumbnail()):the_post_thumbnail("card-thumb");else:echo "<div style=background:linear-gradient(135deg,#F7931A,#FFD700);height:100%;display:flex;align-items:center;justify-content:center;font-size:3rem>₿</div>";endif;?></div>
<div class="card-content">
<div style="font-size:.75rem;color:#505070;margin-bottom:.5rem;font-family:monospace"><?php echo get_the_date("d M Y");?></div>
<h3 style="font-size:.95rem;font-weight:700;margin-bottom:.5rem"><a href="<?php the_permalink();?>" style="color:#F0F8FF"><?php the_title();?></a></h3>
<a href="<?php the_permalink();?>" style="color:#00E5FF;font-size:.8rem">Leggi →</a></div></article>
<?php endwhile;wp_reset_postdata();?>
</div></section>
<section class="newsletter-section">
<h2 style="color:#000">📊 Newsletter Crypto Italia</h2>
<p style="color:rgba(0,0,0,.75)">Analisi settimanale e segnali di mercato.</p>
<form class="newsletter-form" method="post">
<input type="email" name="email" placeholder="Email..." required>
<button type="submit">Iscriviti</button></form>
</section>
</main>
<?php get_footer();?>