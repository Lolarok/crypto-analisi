<?php
// Crypto Analisi Italia Theme - Functions v1.0.0
function crypto_setup(){
  load_theme_textdomain("crypto-italia",get_template_directory()."/languages");
  add_theme_support("automatic-feed-links");
  add_theme_support("title-tag");
  add_theme_support("post-thumbnails");
  register_nav_menus(["primary"=>"Menu Principale","footer"=>"Footer"]);
  set_post_thumbnail_size(1200,630,true);
  add_image_size("card-thumb",400,250,true);
}
add_action("after_setup_theme","crypto_setup");
function crypto_scripts(){
  wp_enqueue_style("gfonts","https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@400;700&family=Space+Grotesk:wght@600;800&display=swap",[],null);
  wp_enqueue_style("crypto-style",get_stylesheet_uri(),[],"1.0.0");
  wp_enqueue_script("crypto-main",get_template_directory_uri()."/js/main.js",["jquery"],"1.0.0",true);
}
add_action("wp_enqueue_scripts","crypto_scripts");
function crypto_price_cpt(){
  register_post_type("crypto_signal",["labels"=>["name"=>"Segnali Crypto"],"public"=>true,"show_in_rest"=>true,"supports"=>["title","editor","thumbnail"],"menu_icon"=>"dashicons-chart-line","rewrite"=>["slug"=>"segnali"]]);
}
add_action("init","crypto_price_cpt");
function crypto_seo(){
  if(!is_single()&&!is_page())return;
  $d=wp_trim_words(get_the_excerpt(),25);
  echo "<meta name=description content=".esc_attr($d).">
";
  echo "<meta name=twitter:card content=summary_large_image>
";
  echo "<meta name=robots content=index,follow>
";
}
add_action("wp_head","crypto_seo",5);
add_filter("excerpt_length",fn()=>25,999);
// DISCLAIMER
add_action("wp_footer",function(){
  echo "<!-- AI-generated crypto analysis is NOT financial advice -->";
});
