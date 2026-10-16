{{--
  Zero Gravity Coffee (كوفي هاوس) - Anti-Gravity Splash Experience
  Production-Ready, Standalone Blade Partial (No Node/npm dependencies required)
--}}

<div id="zero-gravity-splash"
     role="dialog"
     aria-modal="true"
     aria-label="تجربة انعدام الجاذبية - كوفي هاوس | Zero Gravity Coffee Welcome"
     class="fixed inset-0 z-[100] flex flex-col items-center justify-between overflow-hidden bg-[#0A0705] text-amber-100 transition-all duration-700 ease-out select-none">

    <!-- Atmospheric Deep Cosmic & Amber Lighting Gradients -->
    <div class="pointer-events-none absolute inset-0 overflow-hidden">
        {{-- Central Amber Nebula Glow --}}
        <div class="absolute left-1/2 top-1/2 h-[550px] w-[550px] -translate-x-1/2 -translate-y-1/2 rounded-full bg-gradient-to-tr from-amber-600/20 via-amber-500/15 to-transparent blur-[120px] zg-nebula-pulse"></div>
        {{-- Top Warm Ambient Light Beam --}}
        <div class="absolute -top-32 left-1/2 h-80 w-[600px] -translate-x-1/2 rounded-full bg-amber-400/10 blur-[100px]"></div>
        {{-- Bottom Dark Roasted Coffee Ground Glow --}}
        <div class="absolute -bottom-40 left-1/2 h-80 w-[700px] -translate-x-1/2 rounded-full bg-amber-900/25 blur-[110px]"></div>
        {{-- Floating Micro-Particles / Stardust in Zero-G --}}
        <div class="zg-particle zg-p1"></div>
        <div class="zg-particle zg-p2"></div>
        <div class="zg-particle zg-p3"></div>
        <div class="zg-particle zg-p4"></div>
        <div class="zg-particle zg-p5"></div>
        <div class="zg-particle zg-p6"></div>
    </div>

    <!-- Top Status / Brand Sub-header -->
    <header class="relative z-10 flex w-full max-w-5xl items-center justify-between px-6 pt-6 sm:px-10">
        <div class="flex items-center gap-2.5">
            <span class="relative flex h-2.5 w-2.5">
                <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-amber-400 opacity-75"></span>
                <span class="relative inline-flex h-2.5 w-2.5 rounded-full bg-amber-500"></span>
            </span>
            <span class="text-xs font-medium tracking-widest text-amber-300/80 uppercase font-sans">
                ZERO-G SPECIALTY ROASTERY
            </span>
        </div>

        {{-- Direct Skip / Enter Link --}}
        <button type="button"
                onclick="window.dismissZeroGravitySplash(event)"
                class="group flex items-center gap-1.5 rounded-full border border-amber-500/20 bg-amber-950/30 px-3.5 py-1 text-xs text-amber-200/70 backdrop-blur-md transition-all duration-300 hover:border-amber-400/60 hover:bg-amber-900/40 hover:text-amber-100">
            <span>تخطي</span>
            <span class="text-amber-400/50">|</span>
            <span class="font-sans">Skip</span>
            <svg class="h-3.5 w-3.5 transition-transform duration-300 group-hover:translate-x-[-2px] rtl:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </button>
    </header>

    <!-- Center Stage: The Levitating Coffee Cup & Suspended Beans Artwork -->
    <main class="relative z-10 flex flex-1 flex-col items-center justify-center px-4 py-2 text-center">
        
        <!-- Interactive Levitating Visual Anchor -->
        <div class="relative flex items-center justify-center" onclick="window.dismissZeroGravitySplash(event)" role="button" title="انقر للدخول | Click to enter">
            
            <!-- Pure Scalable SVG Artwork: Zero Gravity Coffee -->
            <svg class="h-64 w-64 sm:h-80 sm:w-80 md:h-96 md:w-96 overflow-visible filter drop-shadow-[0_10px_35px_rgba(245,158,11,0.22)]"
                 viewBox="0 0 400 360" fill="none" xmlns="http://www.w3.org/2000/svg">
                
                <defs>
                    <!-- Ambient Glow Filter -->
                    <filter id="zgGlowFilter" x="-40%" y="-40%" width="180%" height="180%">
                        <feGaussianBlur in="SourceGraphic" stdDeviation="6" result="blur" />
                        <feComposite in="SourceGraphic" in2="blur" operator="over" />
                    </filter>
                    
                    <!-- Soft Shadow Blur Filter -->
                    <filter id="zgShadowFilter" x="-30%" y="-30%" width="160%" height="160%">
                        <feGaussianBlur stdDeviation="10" />
                    </filter>

                    <!-- Liquid Amber Droplet Glow Filter -->
                    <filter id="zgDropGlow" x="-50%" y="-50%" width="200%" height="200%">
                        <feGaussianBlur in="SourceGraphic" stdDeviation="3" result="glow" />
                        <feComposite in="SourceGraphic" in2="glow" operator="over" />
                    </filter>

                    <!-- Golden Rim Gradient -->
                    <linearGradient id="zgGoldGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" stop-color="#FEF3C7" />
                        <stop offset="30%" stop-color="#F59E0B" />
                        <stop offset="70%" stop-color="#D97706" />
                        <stop offset="100%" stop-color="#92400E" />
                    </linearGradient>

                    <!-- Luxury Cup Matte Charcoal Gradient -->
                    <linearGradient id="zgCupPorcelain" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" stop-color="#2E231D" />
                        <stop offset="50%" stop-color="#1B1410" />
                        <stop offset="100%" stop-color="#0F0A08" />
                    </linearGradient>

                    <!-- Rich Crema Coffee Gradient -->
                    <radialGradient id="zgCremaGradient" cx="50%" cy="50%" r="50%">
                        <stop offset="0%" stop-color="#F59E0B" />
                        <stop offset="35%" stop-color="#B45309" />
                        <stop offset="75%" stop-color="#78350F" />
                        <stop offset="100%" stop-color="#3B1705" />
                    </radialGradient>

                    <!-- Floating Roasted Coffee Bean Gradient -->
                    <linearGradient id="zgBeanGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" stop-color="#854D0E" />
                        <stop offset="40%" stop-color="#54280E" />
                        <stop offset="85%" stop-color="#2E1307" />
                        <stop offset="100%" stop-color="#180A04" />
                    </linearGradient>

                    <!-- Dynamic Ground Levitation Shadow Gradient -->
                    <radialGradient id="zgGroundShadow" cx="50%" cy="50%" r="50%">
                        <stop offset="0%" stop-color="#F59E0B" stop-opacity="0.35" />
                        <stop offset="25%" stop-color="#000000" stop-opacity="0.8" />
                        <stop offset="70%" stop-color="#000000" stop-opacity="0.3" />
                        <stop offset="100%" stop-color="#000000" stop-opacity="0" />
                    </radialGradient>

                    <!-- Liquid Droplet Amber Gradient -->
                    <linearGradient id="zgDropletAmber" x1="20%" y1="20%" x2="90%" y2="90%">
                        <stop offset="0%" stop-color="#FEF08A" />
                        <stop offset="40%" stop-color="#F59E0B" />
                        <stop offset="100%" stop-color="#B45309" />
                    </linearGradient>
                </defs>

                <!-- ================= 1. PEDESTAL & DYNAMIC ANTI-GRAVITY SHADOW ================= -->
                <!-- Acoustic / Magnetic Levitation Force Rings on Ground Plane -->
                <ellipse cx="200" cy="305" rx="95" ry="18" stroke="url(#zgGoldGradient)" stroke-width="1.2" opacity="0.3" class="zg-field-ring zg-ring-1" />
                <ellipse cx="200" cy="305" rx="65" ry="12" stroke="#F59E0B" stroke-width="1" stroke-dasharray="5 4" opacity="0.45" class="zg-field-ring zg-ring-2" />
                
                <!-- Dynamic Ground Shadow: Reacts Inversely to Cup Height (Expands/fades as cup ascends, contracts/sharpens as cup descends) -->
                <ellipse cx="200" cy="305" rx="80" ry="16" fill="url(#zgGroundShadow)" filter="url(#zgShadowFilter)" class="zg-dynamic-shadow" />

                <!-- ================= 2. SUSPENDED COFFEE BEANS IN ZERO-G ================= -->
                <!-- Bean 1: Top-Left Floating Bean -->
                <g class="zg-bean-float zg-bean-1" transform="translate(85, 115)">
                    <path d="M 0 -13 C 10 -13, 14 -4, 12 7 C 10 15, 2 17, -3 15 C -11 12, -13 0, -10 -7 C -8 -12, -4 -13, 0 -13 Z" fill="url(#zgBeanGradient)" stroke="#F59E0B" stroke-width="0.75" />
                    <!-- Center Roasted Crease -->
                    <path d="M -1 -11 Q 3 -1 -1 5 Q -4 10 0 13" stroke="#D97706" stroke-width="1.3" stroke-linecap="round" fill="none" />
                </g>

                <!-- Bean 2: Top-Right Floating Bean (Tilted Orbit) -->
                <g class="zg-bean-float zg-bean-2" transform="translate(315, 125)">
                    <path d="M 0 -12 C 11 -12, 13 -3, 11 8 C 9 14, 1 16, -4 14 C -11 11, -12 1, -9 -6 C -8 -11, -4 -12, 0 -12 Z" fill="url(#zgBeanGradient)" stroke="#F59E0B" stroke-width="0.75" />
                    <path d="M 0 -10 Q -3 0 1 6 Q 3 9 0 12" stroke="#FBBF24" stroke-width="1.2" stroke-linecap="round" fill="none" opacity="0.8" />
                </g>

                <!-- Bean 3: Mid-Right Floating Bean (Gentle Rotation) -->
                <g class="zg-bean-float zg-bean-3" transform="translate(305, 220)">
                    <path d="M 0 -10 C 9 -10, 12 -2, 10 6 C 8 12, 1 14, -3 12 C -9 10, -11 1, -8 -5 C -7 -9, -3 -10, 0 -10 Z" fill="url(#zgBeanGradient)" stroke="#D97706" stroke-width="0.6" />
                    <path d="M -1 -8 Q 2 -1 -1 4 Q -3 7 0 10" stroke="#F59E0B" stroke-width="1" stroke-linecap="round" fill="none" />
                </g>

                <!-- Bean 4: Bottom-Left Floating Bean -->
                <g class="zg-bean-float zg-bean-4" transform="translate(90, 235)">
                    <path d="M 0 -11 C 9 -11, 13 -3, 11 7 C 9 13, 1 15, -3 13 C -10 11, -12 1, -9 -5 C -7 -10, -3 -11, 0 -11 Z" fill="url(#zgBeanGradient)" stroke="#D97706" stroke-width="0.6" />
                    <path d="M 0 -9 Q -2 0 1 5 Q 3 8 0 11" stroke="#F59E0B" stroke-width="1.1" stroke-linecap="round" fill="none" />
                </g>

                <!-- ================= 3. DRIFTING LIQUID AMBER DROPLETS ================= -->
                <!-- Droplet 1: Main Levitation Droplet Suspended in Mid-Air Above Cup -->
                <g class="zg-droplet zg-drop-1">
                    <circle cx="200" cy="115" r="5" fill="url(#zgDropletAmber)" filter="url(#zgDropGlow)" />
                    <!-- Specular zero-g refraction dot -->
                    <circle cx="198.5" cy="113.5" r="1.5" fill="#FFFFFF" opacity="0.9" />
                </g>

                <!-- Droplet 2: Right Rim Satellite Droplet -->
                <g class="zg-droplet zg-drop-2">
                    <circle cx="265" cy="140" r="3.5" fill="url(#zgDropletAmber)" filter="url(#zgDropGlow)" />
                    <circle cx="264" cy="139" r="1" fill="#FFFFFF" opacity="0.85" />
                </g>

                <!-- Droplet 3: Left Escaped Micro-Droplet -->
                <g class="zg-droplet zg-drop-3">
                    <circle cx="132" cy="130" r="2.8" fill="url(#zgDropletAmber)" filter="url(#zgDropGlow)" />
                    <circle cx="131" cy="129" r="0.8" fill="#FFFFFF" opacity="0.8" />
                </g>

                <!-- Droplet 4: Saucer Orbit Droplet -->
                <g class="zg-droplet zg-drop-4">
                    <circle cx="160" cy="255" r="2.2" fill="url(#zgDropletAmber)" filter="url(#zgDropGlow)" />
                </g>

                <!-- ================= 4. THE LEVITATING CUP & SAUCER MASTER GROUP ================= -->
                <g class="zg-levitating-assembly">
                    
                    <!-- Atmospheric Aura Behind Cup -->
                    <circle cx="200" cy="190" r="75" fill="#F59E0B" opacity="0.12" filter="url(#zgGlowFilter)" />

                    <!-- Floating Saucer (Detached and Floating with Cup) -->
                    <g id="zg-saucer">
                        <!-- Saucer Outer Body -->
                        <ellipse cx="200" cy="235" rx="82" ry="17" fill="url(#zgCupPorcelain)" stroke="url(#zgGoldGradient)" stroke-width="1.8" />
                        <!-- Saucer Inner Rim Ring -->
                        <ellipse cx="200" cy="235" rx="52" ry="10" fill="#150E0A" stroke="#92400E" stroke-width="0.9" opacity="0.85" />
                        <!-- Saucer Center Well Highlight -->
                        <ellipse cx="200" cy="236" rx="34" ry="6.5" fill="#0D0906" stroke="url(#zgGoldGradient)" stroke-width="0.6" opacity="0.6" />
                    </g>

                    <!-- Cup Ergonomic Floating Handle (Right side) -->
                    <path d="M 252 178 C 285 180, 288 214, 248 218" 
                          stroke="url(#zgGoldGradient)" stroke-width="5.5" stroke-linecap="round" fill="none"
                          filter="url(#zgGlowFilter)" />
                    <path d="M 252 178 C 285 180, 288 214, 248 218" 
                          stroke="url(#zgGoldGradient)" stroke-width="4.5" stroke-linecap="round" fill="none" />

                    <!-- Luxury Cup Body (Deep Charcoal Curved Porcelain) -->
                    <path d="M 144 172 C 146 216, 172 232, 200 232 C 228 232, 254 216, 256 172 Z" 
                          fill="url(#zgCupPorcelain)" stroke="url(#zgGoldGradient)" stroke-width="1.5" />
                    
                    <!-- Cup Soft Specular Body Curve (Luxury Finish) -->
                    <path d="M 152 176 C 154 210, 172 225, 196 226" 
                          stroke="#FFFFFF" stroke-width="1.2" stroke-linecap="round" opacity="0.18" fill="none" />

                    <!-- Cup Gold Accent Waist Trim -->
                    <path d="M 160 215 Q 200 223 240 215" 
                          stroke="url(#zgGoldGradient)" stroke-width="1.2" fill="none" opacity="0.65" />

                    <!-- Cup Rim Golden Lip -->
                    <ellipse cx="200" cy="172" rx="57" ry="14" fill="#241811" stroke="url(#zgGoldGradient)" stroke-width="2.2" />

                    <!-- Rich Crema Coffee Liquid Surface -->
                    <ellipse cx="200" cy="172" rx="52" ry="12" fill="url(#zgCremaGradient)" />

                    <!-- Zero-G Latte Art Galaxy Swirl (Cosmic Coffee Crema) -->
                    <path d="M 185 171 C 190 166, 210 168, 206 174 C 202 178, 194 176, 198 172 C 201 170, 205 172, 202 174" 
                          stroke="#FEF3C7" stroke-width="1.4" stroke-linecap="round" fill="none" opacity="0.8" />
                    
                    <!-- Center Crema Heart/Star Micro Accent -->
                    <circle cx="201" cy="172.5" r="1.5" fill="#FEF3C7" opacity="0.9" />

                    <!-- Delicate Wisps of Zero-Gravity Coffee Steam Rising -->
                    <g class="zg-steam-group" opacity="0.75">
                        <path d="M 188 158 C 182 140, 194 125, 186 102" 
                              stroke="url(#zgGoldGradient)" stroke-width="1.6" stroke-linecap="round" fill="none" class="zg-steam zg-steam-1" />
                        <path d="M 200 156 C 207 136, 195 118, 204 94" 
                              stroke="#FEF3C7" stroke-width="2" stroke-linecap="round" fill="none" class="zg-steam zg-steam-2" />
                        <path d="M 212 158 C 219 140, 207 124, 216 104" 
                              stroke="url(#zgGoldGradient)" stroke-width="1.5" stroke-linecap="round" fill="none" class="zg-steam zg-steam-3" />
                    </g>

                </g> <!-- End Levitation Assembly -->

            </svg>
        </div>

        <!-- Bilingual Brand Typography & Glowing Tagline -->
        <div class="mt-4 flex flex-col items-center">
            
            <!-- Luxury Capsule Badge -->
            <div class="inline-flex items-center gap-2 rounded-full border border-amber-500/30 bg-amber-950/40 px-4 py-1.5 backdrop-blur-md shadow-[0_0_15px_rgba(245,158,11,0.15)]">
                <span class="text-amber-400 text-xs">✦</span>
                <span class="text-xs font-semibold tracking-wider text-amber-200">قهوة مختصة فوق المألوف</span>
                <span class="text-amber-400/50">•</span>
                <span class="text-xs font-medium tracking-widest text-amber-300/90 uppercase font-sans">Specialty Roast</span>
                <span class="text-amber-400 text-xs">✦</span>
            </div>

            <!-- Primary Arabic Cafe Name -->
            <h1 class="mt-3 text-4xl font-black tracking-tight sm:text-5xl md:text-6xl">
                <span class="bg-gradient-to-r from-amber-100 via-amber-300 to-amber-500 bg-clip-text text-transparent drop-shadow-[0_4px_16px_rgba(245,158,11,0.25)]">
                    كـوفـي هـاوس
                </span>
            </h1>

            <!-- English Brand Identity -->
            <h2 class="mt-1 font-sans text-sm font-semibold tracking-[0.35em] text-amber-200/80 uppercase sm:text-base">
                ZERO GRAVITY COFFEE
            </h2>

            <!-- Subtle Glowing Bilingual Tagline -->
            <p class="mt-3 max-w-md text-xs sm:text-sm font-medium text-amber-300/90 drop-shadow-[0_0_12px_rgba(245,158,11,0.45)] zg-tagline-glow">
                قهوة تتحدى الجاذبية • Anti-Gravity Experience
            </p>
        </div>

        <!-- Interactive Luxury Entry Button -->
        <div class="mt-7 flex flex-col items-center gap-3">
            <button type="button"
                    id="zg-enter-btn"
                    onclick="window.dismissZeroGravitySplash(event)"
                    class="group relative inline-flex items-center justify-center gap-3 overflow-hidden rounded-full border border-amber-400/50 bg-gradient-to-r from-amber-600/30 via-amber-500/20 to-amber-700/30 px-8 py-3.5 text-sm sm:text-base font-bold text-amber-100 shadow-[0_0_25px_rgba(245,158,11,0.25)] backdrop-blur-xl transition-all duration-300 hover:scale-105 hover:border-amber-300 hover:bg-amber-500/30 hover:shadow-[0_0_40px_rgba(245,158,11,0.5)] active:scale-95">
                
                {{-- Button Shimmer Hover Flare --}}
                <span class="absolute inset-0 -translate-x-full bg-gradient-to-r from-transparent via-amber-200/20 to-transparent transition-transform duration-1000 group-hover:translate-x-full"></span>
                
                {{-- Amber Coffee Cup Icon --}}
                <svg class="h-5 w-5 text-amber-400 transition-transform duration-300 group-hover:-translate-y-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2zM17 21v-8H7v8M7 3v5h8" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 8h3a2 2 0 012 2v2a2 2 0 01-2 2h-3" />
                </svg>

                {{-- Bilingual Text --}}
                <span class="font-bold">دخول المقهى</span>
                <span class="text-amber-400/60 font-light">/</span>
                <span class="font-sans font-semibold tracking-wide">Enter Cafe</span>

                {{-- Arrow / Entrance Icon --}}
                <svg class="h-4 w-4 text-amber-300 transition-transform duration-300 group-hover:translate-x-[-3px] rtl:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                </svg>
            </button>

            <!-- Keyboard & Interaction Hint -->
            <span class="text-[11px] tracking-wider text-amber-300/50">
                انقر في أي مكان أو اضغط <kbd class="rounded border border-amber-500/30 bg-amber-950/60 px-1.5 py-0.5 font-mono text-[10px] text-amber-300">ESC</kbd> للدخول الفوري
            </span>
        </div>

    </main>

    <!-- Bottom Progress Bar & Auto-Dismiss Countdown Indicator -->
    <footer class="relative z-10 w-full max-w-md px-6 pb-6 text-center">
        <div class="flex items-center justify-between text-[11px] text-amber-300/60 mb-2 font-mono">
            <span>جارِ تهيئة التجربة...</span>
            <span id="zg-timer-display" class="font-sans">2.5s</span>
        </div>
        
        <!-- Glowing Countdown Line -->
        <div class="h-1 w-full overflow-hidden rounded-full bg-amber-950/60 border border-amber-500/20">
            <div id="zg-progress-bar"
                 class="h-full w-full rounded-full bg-gradient-to-r from-amber-500 via-amber-300 to-amber-500 shadow-[0_0_12px_rgba(245,158,11,0.8)] zg-progress-animate"></div>
        </div>
    </footer>

</div>

<!-- ================= EMBEDDED STANDALONE ANTI-GRAVITY CSS KEYFRAMES ================= -->
<style>
/* 1. Master Anti-Gravity Floating Cycle (Smooth Vertical Oscillation & Slight Tilt) */
@keyframes zgFloatCupAssembly {
    0%, 100% {
        transform: translateY(0px) rotate(0deg);
    }
    50% {
        transform: translateY(-22px) rotate(-1.5deg);
    }
}
.zg-levitating-assembly {
    animation: zgFloatCupAssembly 4.2s cubic-bezier(0.45, 0.05, 0.55, 0.95) infinite;
    transform-origin: 200px 200px;
}

/* 2. Dynamic Optical Shadow Physics (Inversely scales & blurs relative to cup height) */
@keyframes zgShadowDynamicPulse {
    0%, 100% {
        transform: scale(1);
        opacity: 0.65;
        filter: blur(8px);
    }
    50% {
        transform: scale(0.68);
        opacity: 0.22;
        filter: blur(16px);
    }
}
.zg-dynamic-shadow {
    animation: zgShadowDynamicPulse 4.2s cubic-bezier(0.45, 0.05, 0.55, 0.95) infinite;
    transform-origin: 200px 305px;
}

/* 3. Desynchronized Floating Coffee Beans (Natural Multi-Axis Organic Float) */
@keyframes zgBeanFloat1 {
    0%, 100% { transform: translate(0, 0) rotate(0deg); }
    50% { transform: translate(-10px, -24px) rotate(18deg); }
}
.zg-bean-1 {
    animation: zgBeanFloat1 3.4s ease-in-out infinite;
    transform-origin: center;
}

@keyframes zgBeanFloat2 {
    0%, 100% { transform: translate(0, 0) rotate(0deg); }
    50% { transform: translate(12px, -28px) rotate(-22deg); }
}
.zg-bean-2 {
    animation: zgBeanFloat2 4.6s ease-in-out infinite 0.3s;
    transform-origin: center;
}

@keyframes zgBeanFloat3 {
    0%, 100% { transform: translate(0, 0) rotate(0deg); }
    50% { transform: translate(-8px, -18px) rotate(14deg); }
}
.zg-bean-3 {
    animation: zgBeanFloat3 5.1s ease-in-out infinite 0.8s;
    transform-origin: center;
}

@keyframes zgBeanFloat4 {
    0%, 100% { transform: translate(0, 0) rotate(0deg); }
    50% { transform: translate(9px, -20px) rotate(-16deg); }
}
.zg-bean-4 {
    animation: zgBeanFloat4 3.9s ease-in-out infinite 1.2s;
    transform-origin: center;
}

/* 4. Drifting Liquid Coffee Droplets */
@keyframes zgDropDrift1 {
    0%, 100% { transform: translateY(0px) scale(1); opacity: 0.85; }
    50% { transform: translateY(-30px) scale(1.15); opacity: 1; }
}
.zg-drop-1 {
    animation: zgDropDrift1 2.9s ease-in-out infinite;
    transform-origin: 200px 115px;
}

@keyframes zgDropDrift2 {
    0%, 100% { transform: translateY(0px) scale(1); opacity: 0.75; }
    50% { transform: translateY(-22px) scale(1.1); opacity: 0.95; }
}
.zg-drop-2 {
    animation: zgDropDrift2 3.7s ease-in-out infinite 0.5s;
    transform-origin: 265px 140px;
}

@keyframes zgDropDrift3 {
    0%, 100% { transform: translateY(0px) scale(1); opacity: 0.65; }
    50% { transform: translateY(-26px) scale(1.2); opacity: 0.9; }
}
.zg-drop-3 {
    animation: zgDropDrift3 4.3s ease-in-out infinite 1s;
    transform-origin: 132px 130px;
}

@keyframes zgDropDrift4 {
    0%, 100% { transform: translateY(0px); opacity: 0.5; }
    50% { transform: translateY(-16px); opacity: 0.8; }
}
.zg-drop-4 {
    animation: zgDropDrift4 3.3s ease-in-out infinite 0.7s;
    transform-origin: 160px 255px;
}

/* 5. Delicate Rising Zero-Gravity Steam */
@keyframes zgSteamAscend1 {
    0% { transform: translateY(0px) scaleX(1); opacity: 0; }
    40% { opacity: 0.75; }
    100% { transform: translateY(-36px) scaleX(1.3); opacity: 0; }
}
.zg-steam-1 {
    animation: zgSteamAscend1 3.8s ease-in-out infinite;
    transform-origin: center;
}

@keyframes zgSteamAscend2 {
    0% { transform: translateY(0px) scaleX(1); opacity: 0; }
    40% { opacity: 0.85; }
    100% { transform: translateY(-44px) scaleX(1.4); opacity: 0; }
}
.zg-steam-2 {
    animation: zgSteamAscend2 4.5s ease-in-out infinite 0.6s;
    transform-origin: center;
}

@keyframes zgSteamAscend3 {
    0% { transform: translateY(0px) scaleX(1); opacity: 0; }
    40% { opacity: 0.7; }
    100% { transform: translateY(-38px) scaleX(1.25); opacity: 0; }
}
.zg-steam-3 {
    animation: zgSteamAscend3 4.1s ease-in-out infinite 1.1s;
    transform-origin: center;
}

/* 6. Ground Levitation Rings Pulse */
@keyframes zgRingPulse {
    0%, 100% { opacity: 0.25; transform: scale(1); }
    50% { opacity: 0.5; transform: scale(1.04); }
}
.zg-ring-1 {
    animation: zgRingPulse 4.2s ease-in-out infinite;
    transform-origin: 200px 305px;
}
.zg-ring-2 {
    animation: zgRingPulse 4.2s ease-in-out infinite 0.4s;
    transform-origin: 200px 305px;
}

/* 7. Tagline & Nebula Ambient Glows */
@keyframes zgTaglinePulse {
    0%, 100% { opacity: 0.85; filter: drop-shadow(0 0 10px rgba(245, 158, 11, 0.4)); }
    50% { opacity: 1; filter: drop-shadow(0 0 20px rgba(245, 158, 11, 0.8)); }
}
.zg-tagline-glow {
    animation: zgTaglinePulse 3s ease-in-out infinite;
}

@keyframes zgNebulaBreath {
    0%, 100% { transform: translate(-50%, -50%) scale(0.92); opacity: 0.7; }
    50% { transform: translate(-50%, -50%) scale(1.08); opacity: 1; }
}
.zg-nebula-pulse {
    animation: zgNebulaBreath 6s ease-in-out infinite;
}

/* 8. Ambient Micro-Stardust Particles */
.zg-particle {
    position: absolute;
    border-radius: 9999px;
    background-color: #FDE68A;
    pointer-events: none;
}
.zg-p1 { width: 3px; height: 3px; top: 22%; left: 18%; animation: zgParticleFloat 7s ease-in-out infinite; }
.zg-p2 { width: 2px; height: 2px; top: 35%; right: 22%; animation: zgParticleFloat 8.5s ease-in-out infinite 1.2s; }
.zg-p3 { width: 4px; height: 4px; bottom: 28%; left: 25%; animation: zgParticleFloat 6.2s ease-in-out infinite 0.7s; }
.zg-p4 { width: 2px; height: 2px; bottom: 32%; right: 18%; animation: zgParticleFloat 9s ease-in-out infinite 2s; }
.zg-p5 { width: 3px; height: 3px; top: 15%; right: 35%; animation: zgParticleFloat 7.5s ease-in-out infinite 1.8s; }
.zg-p6 { width: 2px; height: 2px; top: 65%; left: 12%; animation: zgParticleFloat 8s ease-in-out infinite 0.4s; }

@keyframes zgParticleFloat {
    0%, 100% { transform: translateY(0px) translateX(0px); opacity: 0.3; }
    50% { transform: translateY(-25px) translateX(12px); opacity: 0.85; }
}

/* 9. Countdown Progress Bar Animation (Exact 2.5s duration) */
.zg-progress-animate {
    animation: zgProgressDrain 2.5s linear forwards;
    transform-origin: right center; /* RTL friendly */
}
@keyframes zgProgressDrain {
    0% { transform: scaleX(1); }
    100% { transform: scaleX(0); }
}

/* Reduced motion preference accessibility */
@media (prefers-reduced-motion: reduce) {
    .zg-levitating-assembly,
    .zg-dynamic-shadow,
    .zg-bean-1, .zg-bean-2, .zg-bean-3, .zg-bean-4,
    .zg-drop-1, .zg-drop-2, .zg-drop-3, .zg-drop-4,
    .zg-steam-1, .zg-steam-2, .zg-steam-3,
    .zg-ring-1, .zg-ring-2,
    .zg-nebula-pulse,
    .zg-particle {
        animation: none !important;
    }
}
</style>

<!-- ================= SCRIPT: AUTO-DISMISS & INTERACTION LOGIC ================= -->
<script>
(function() {
    'use strict';

    const SPLASH_ID = 'zero-gravity-splash';
    const AUTO_DISMISS_MS = 2500; // 2.5 seconds
    let isDismissed = false;
    let dismissTimeout = null;
    let timerInterval = null;

    // Check if session storage prevents spamming on every internal page navigation
    // (Can be bypassed anytime with ?welcome=1 in URL or by clicking replay)
    const urlParams = new URLSearchParams(window.location.search);
    const forceShow = urlParams.has('welcome') || urlParams.has('splash');
    const hasSeenWelcome = sessionStorage.getItem('zg_welcome_shown');

    const splashEl = document.getElementById(SPLASH_ID);
    if (!splashEl) return;

    if (hasSeenWelcome && !forceShow) {
        // Fast hide for subpages in the same session
        splashEl.style.display = 'none';
        return;
    }

    // Gentle Ambient Audio Chime (Zero-dependency Web Audio API oscillator)
    function playZeroGravityWhoosh() {
        try {
            const AudioCtx = window.AudioContext || window.webkitAudioContext;
            if (!AudioCtx) return;
            const ctx = new AudioCtx();
            const osc = ctx.createOscillator();
            const gain = ctx.createGain();

            osc.type = 'sine';
            // Ambient deep harmonic sweep (160Hz -> 432Hz)
            osc.frequency.setValueAtTime(180, ctx.currentTime);
            osc.frequency.exponentialRampToValueAtTime(432, ctx.currentTime + 0.4);

            gain.gain.setValueAtTime(0.04, ctx.currentTime);
            gain.gain.exponentialRampToValueAtTime(0.001, ctx.currentTime + 0.5);

            osc.connect(gain);
            gain.connect(ctx.destination);

            osc.start();
            osc.stop(ctx.currentTime + 0.5);
        } catch (e) {
            // Audio policy / mute fallback (silent fail)
        }
    }

    // Dismissal Handler
    window.dismissZeroGravitySplash = function(e) {
        if (e && e.stopPropagation) e.stopPropagation();
        if (isDismissed) return;
        isDismissed = true;

        if (dismissTimeout) clearTimeout(dismissTimeout);
        if (timerInterval) clearInterval(timerInterval);

        playZeroGravityWhoosh();

        // Mark in sessionStorage so future page visits in this session are immediate
        try {
            sessionStorage.setItem('zg_welcome_shown', 'true');
        } catch (err) {}

        // Ultra-smooth CSS fade & zoom out
        splashEl.classList.add('opacity-0', 'scale-105', 'pointer-events-none');

        setTimeout(function() {
            splashEl.style.display = 'none';
            splashEl.setAttribute('aria-hidden', 'true');
        }, 700);
    };

    // Global Reopen Function (for menu/footer "Replay Experience" triggers)
    window.replayZeroGravitySplash = function() {
        isDismissed = false;
        splashEl.style.display = 'flex';
        splashEl.removeAttribute('aria-hidden');
        splashEl.classList.remove('opacity-0', 'scale-105', 'pointer-events-none');
        
        // Reset progress bar animation
        const bar = document.getElementById('zg-progress-bar');
        if (bar) {
            bar.classList.remove('zg-progress-animate');
            void bar.offsetWidth; // Trigger reflow
            bar.classList.add('zg-progress-animate');
        }

        // Restart timer
        startCountdown();
    };

    function startCountdown() {
        const startTime = Date.now();
        const display = document.getElementById('zg-timer-display');

        if (timerInterval) clearInterval(timerInterval);
        timerInterval = setInterval(function() {
            const elapsed = Date.now() - startTime;
            const remaining = Math.max(0, (AUTO_DISMISS_MS - elapsed) / 1000);
            if (display) {
                display.textContent = remaining.toFixed(1) + 's';
            }
            if (remaining <= 0) {
                clearInterval(timerInterval);
            }
        }, 100);

        dismissTimeout = setTimeout(function() {
            window.dismissZeroGravitySplash();
        }, AUTO_DISMISS_MS);
    }

    // Start timer on initial load
    startCountdown();

    // Keyboard dismissal on ESC or Space
    document.addEventListener('keydown', function(event) {
        if (!isDismissed && (event.key === 'Escape' || event.key === 'Enter')) {
            window.dismissZeroGravitySplash();
        }
    });

})();
</script>
