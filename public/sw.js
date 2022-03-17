var workbox=function(){"use strict";try{self.workbox.v["workbox:sw:3.6.1"]=1}catch(t){}const t="https://storage.googleapis.com/workbox-cdn/releases/3.6.1",e={backgroundSync:"background-sync",broadcastUpdate:"broadcast-cache-update",cacheableResponse:"cacheable-response",core:"core",expiration:"cache-expiration",googleAnalytics:"google-analytics",navigationPreload:"navigation-preload",precaching:"precaching",rangeRequests:"range-requests",routing:"routing",strategies:"strategies",streams:"streams"};return new class{constructor(){return this.v={},this.t={debug:"localhost"===self.location.hostname,modulePathPrefix:null,modulePathCb:null},this.e=this.t.debug?"dev":"prod",this.s=!1,new Proxy(this,{get(t,s){if(t[s])return t[s];const o=e[s];return o&&t.loadModule(`workbox-${o}`),t[s]}})}setConfig(t={}){if(this.s)throw new Error("Config must be set before accessing workbox.* modules");Object.assign(this.t,t),this.e=this.t.debug?"dev":"prod"}skipWaiting(){self.addEventListener("install",()=>self.skipWaiting())}clientsClaim(){self.addEventListener("activate",()=>self.clients.claim())}loadModule(t){const e=this.o(t);try{importScripts(e),this.s=!0}catch(s){throw console.error(`Unable to import module '${t}' from '${e}'.`),s}}o(e){if(this.t.modulePathCb)return this.t.modulePathCb(e,this.t.debug);let s=[t];const o=`${e}.${this.e}.js`,r=this.t.modulePathPrefix;return r&&""===(s=r.split("/"))[s.length-1]&&s.splice(s.length-1,1),s.push(o),s.join("/")}}}();

//# sourceMappingURL=workbox-sw.js.map

workbox.routing.registerRoute(
  new RegExp('.*\.js'),
  workbox.strategies.staleWhileRevalidate()
);

workbox.routing.registerRoute(
  // Cache CSS files
  /.*\.css/,
  // Use cache but update in the background ASAP
  workbox.strategies.staleWhileRevalidate({
    // Use a custom cache name
    cacheName: 'css-cache',
  })
);

workbox.routing.registerRoute(
  // Cache image files
  /.*\.(?:png|jpg|jpeg|svg|gif)/,
  // Use the cache if it's available
  workbox.strategies.cacheFirst({
    // Use a custom cache name
    cacheName: 'image-cache',
    plugins: [
      new workbox.expiration.Plugin({
        maxEntries: 100,
        // Cache for a maximum of a month
        maxAgeSeconds: 30 * 24 * 60 * 60,
      })
    ],
  })
);

workbox.precaching.precacheAndRoute([
    { url: 'AA_places2022.json', revision: '383682' },
    { url: 'A1_jquery-3.3.1.min.js', revision: '383682' },
    { url: 'A1_markerclusterer.min.js', revision: '383682' },
    { url: 'A5_script.min.js', revision: '383683' },
    { url: 'A1_maptilerlayer.js', revision: '383682' },
    { url: 'A1_popper1.14.3.min.js', revision: '383682' },
    { url: 'A1_noty.min.js', revision: '383682' },
    { url: 'A1_noty.min.css', revision: '383682' },
    { url: 'A1_bootstrap4.1.1.min.js', revision: '383682' },
    { url: 'A1_bootstrap4.1.1.min.css', revision: '383682' },
    { url: 'A4_styles.min.css', revision: '383682' }
]);