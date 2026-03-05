"use strict";
(function(){const b=document.getElementById("cookie-banner");if(b&&!localStorage.getItem("cookies"))setTimeout(()=>b.style.display="flex",2000)})();
function acceptCookies(){localStorage.setItem("cookies","all");const b=document.getElementById("cookie-banner");if(b)b.style.display="none";}
window.addEventListener("scroll",()=>{const h=document.getElementById("site-header");if(h)h.style.boxShadow=window.scrollY>50?"0 4px 30px rgba(0,0,0,.5)":"none";});
const bar=document.createElement("div");bar.style.cssText="position:fixed;top:70px;left:0;height:3px;z-index:999;transition:width .1s ease;width:0%";
document.body.appendChild(bar);
document.addEventListener("scroll",()=>{const t=document.documentElement.scrollHeight-window.innerHeight;bar.style.width=Math.min(100,(window.scrollY/t)*100)+"%";});
const obs=new IntersectionObserver(e=>{e.forEach(i=>{if(i.isIntersecting){i.target.style.animation="fadeInUp .6s ease forwards";obs.unobserve(i.target);}});},{threshold:.1});
document.querySelectorAll(".article-card,.signal-card").forEach(el=>{el.style.opacity="0";obs.observe(el);});
document.querySelectorAll("a[href^="#"]").forEach(a=>a.addEventListener("click",e=>{e.preventDefault();const t=document.querySelector(a.getAttribute("href"));if(t)t.scrollIntoView({behavior:"smooth"});}));

// Live price ticker via CoinGecko FREE API
async function fetchPrices(){
  try{
    const ids="bitcoin,ethereum,hyperliquid,ondo-finance,ethena";
    const r=await fetch(`https://api.coingecko.com/api/v3/simple/price?ids=${ids}&vs_currencies=usd&include_24hr_change=true`);
    const d=await r.json();
    document.querySelectorAll(".ticker-item").forEach(el=>{
      const sym=el.dataset.sym;
      if(sym&&d[sym]){
        const ch=d[sym].usd_24h_change||0;
        const cls=ch>=0?"price-up":"price-down";
        el.innerHTML=el.dataset.name+" <span class="+cls+">$"+d[sym].usd.toFixed(2)+" ("+ch.toFixed(1)+"%)</span>";
      }
    });
  }catch(e){}
}
fetchPrices();
setInterval(fetchPrices,60000);
console.log("%c₿ Crypto Analisi v1.0","color:#F7931A;font-weight:900;font-size:14px");
