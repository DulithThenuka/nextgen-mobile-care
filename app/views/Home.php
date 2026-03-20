<?php require_once 'partials/header.php'; ?>

<!-- Hero Section -->
<section class="relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-blue-900/20 via-black to-black"></div>
    <div class="absolute top-[-120px] left-1/2 -translate-x-1/2 w-[500px] h-[500px] bg-blue-600/20 blur-3xl rounded-full"></div>

    <div class="relative max-w-7xl mx-auto px-6 py-24 md:py-32 text-center">
        <p class="text-blue-400 uppercase tracking-[0.3em] text-xs md:text-sm mb-5">
            Premium Device Care
        </p>

        <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold leading-tight max-w-5xl mx-auto">
            Repair Smarter. <br>
            Buy Better. <br>
            <span class="text-blue-500">Experience Next Generation Service.</span>
        </h1>

        <p class="text-gray-400 text-lg md:text-xl max-w-2xl mx-auto mt-8 leading-relaxed">
            NextGen Mobile Care offers premium phone repair services and trusted electronics,
            built for customers who want speed, quality, and reliability.
        </p>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mt-10">
            <a href="/nextgen-mobile-care/public/booking" class="bg-blue-600 hover:bg-blue-700 transition px-8 py-4 rounded-full font-semibold shadow-lg shadow-blue-600/20">
                Book a Repair
            </a>

            <a href="/nextgen-mobile-care/public/" class="border border-gray-700 hover:border-blue-500 hover:text-blue-400 transition px-8 py-4 rounded-full font-semibold">
                Explore Products
            </a>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="max-w-7xl mx-auto px-6 py-20">
    <div class="text-center mb-14">
        <p class="text-blue-400 uppercase tracking-[0.3em] text-xs md:text-sm mb-3">Our Services</p>
        <h2 class="text-3xl md:text-5xl font-bold">Built for modern device care</h2>
        <p class="text-gray-400 mt-4 max-w-2xl mx-auto">
            We combine high-quality repairs with carefully selected electronics to give customers a premium experience.
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-gradient-to-b from-gray-900 to-gray-950 border border-gray-800 rounded-3xl p-8 hover:border-blue-500/50 transition">
            <div class="text-blue-500 text-4xl mb-5">📱</div>
            <h3 class="text-2xl font-semibold mb-3">Phone Repairs</h3>
            <p class="text-gray-400 leading-relaxed">
                Screen replacements, battery issues, charging problems, camera faults, and advanced device troubleshooting.
            </p>
        </div>

        <div class="bg-gradient-to-b from-gray-900 to-gray-950 border border-gray-800 rounded-3xl p-8 hover:border-blue-500/50 transition">
            <div class="text-blue-500 text-4xl mb-5">⚡</div>
            <h3 class="text-2xl font-semibold mb-3">Fast Service</h3>
            <p class="text-gray-400 leading-relaxed">
                Quick diagnosis, reliable parts, and a customer-first repair process designed for speed and trust.
            </p>
        </div>

        <div class="bg-gradient-to-b from-gray-900 to-gray-950 border border-gray-800 rounded-3xl p-8 hover:border-blue-500/50 transition">
            <div class="text-blue-500 text-4xl mb-5">🛒</div>
            <h3 class="text-2xl font-semibold mb-3">Electronics Sales</h3>
            <p class="text-gray-400 leading-relaxed">
                Premium mobile devices and electronics with transparent pricing and a clean shopping experience.
            </p>
        </div>
    </div>
</section>

<!-- Featured Products -->
<section class="max-w-7xl mx-auto px-6 py-20">
    <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 mb-12">
        <div>
            <p class="text-blue-400 uppercase tracking-[0.3em] text-xs md:text-sm mb-3">Featured Products</p>
            <h2 class="text-3xl md:text-5xl font-bold">Premium devices, curated for you</h2>
        </div>
        <a href="/nextgen-mobile-care/public/" class="text-blue-400 hover:text-blue-300 transition font-medium">
            View all products →
        </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php if(!empty($data['products'])): ?>
            <?php foreach($data['products'] as $product): ?>
                <div class="group bg-gradient-to-b from-gray-900 to-gray-950 border border-gray-800 rounded-3xl overflow-hidden hover:border-blue-500/40 transition hover:-translate-y-1 duration-300">
                    <div class="overflow-hidden">
                        <img 
                            src="/nextgen-mobile-care/public/assets/images/<?php echo $product->image; ?>" 
                            alt="<?php echo $product->name; ?>" 
                            class="w-full h-72 object-cover group-hover:scale-105 transition duration-500"
                        >
                    </div>

                    <div class="p-6">
                        <h3 class="text-2xl font-semibold mb-2"><?php echo $product->name; ?></h3>
                        <p class="text-gray-400 mb-5 line-clamp-3">
                            <?php echo $product->description; ?>
                        </p>

                        <div class="flex items-center justify-between gap-3">
                        <span class="text-blue-400 text-xl font-bold">
                         Rs. <?php echo $product->price; ?>
                            </span>

                        <div class="flex gap-2">
                    <a href="/nextgen-mobile-care/public/home/product/<?php echo $product->id; ?>" 
                            class="bg-blue-600 hover:bg-blue-700 transition px-4 py-2 rounded-full text-sm font-semibold">
                            Details
                            </a>

                    <a href="https://wa.me/94771234567?text=I%20am%20interested%20in%20<?php echo urlencode($product->name); ?>" 
                        target="_blank"
                    class="bg-green-500 hover:bg-green-600 transition px-4 py-2 rounded-full text-sm font-semibold">
                 WhatsApp
                                </a>
                        </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-span-full bg-gray-900 border border-gray-800 rounded-3xl p-10 text-center">
                <p class="text-gray-400 text-lg">No products available yet.</p>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Why Choose Us -->
<section class="max-w-7xl mx-auto px-6 py-20">
    <div class="bg-gradient-to-r from-gray-900 to-gray-950 border border-gray-800 rounded-3xl p-10 md:p-14">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
            <div>
                <p class="text-blue-400 uppercase tracking-[0.3em] text-xs md:text-sm mb-3">Why Choose Us</p>
                <h2 class="text-3xl md:text-5xl font-bold leading-tight mb-6">
                    Premium care for the devices you depend on.
                </h2>
                <p class="text-gray-400 text-lg leading-relaxed">
                    We focus on trust, quality, and customer satisfaction. From repairs to electronics sales,
                    every service is designed to feel modern, premium, and dependable.
                </p>
            </div>

            <div class="grid grid-cols-2 gap-6">
                <div class="bg-black/40 border border-gray-800 rounded-2xl p-6">
                    <h3 class="text-3xl font-bold text-blue-400 mb-2">Fast</h3>
                    <p class="text-gray-400">Quick turnaround for common repairs.</p>
                </div>
                <div class="bg-black/40 border border-gray-800 rounded-2xl p-6">
                    <h3 class="text-3xl font-bold text-blue-400 mb-2">Trusted</h3>
                    <p class="text-gray-400">Reliable service with clear communication.</p>
                </div>
                <div class="bg-black/40 border border-gray-800 rounded-2xl p-6">
                    <h3 class="text-3xl font-bold text-blue-400 mb-2">Premium</h3>
                    <p class="text-gray-400">Luxury-inspired design and experience.</p>
                </div>
                <div class="bg-black/40 border border-gray-800 rounded-2xl p-6">
                    <h3 class="text-3xl font-bold text-blue-400 mb-2">Modern</h3>
                    <p class="text-gray-400">Built for today’s mobile-first customers.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Final CTA -->
<section class="max-w-7xl mx-auto px-6 pb-24">
    <div class="text-center bg-gradient-to-r from-blue-700/20 to-gray-900 border border-blue-500/20 rounded-3xl p-10 md:p-16">
        <h2 class="text-3xl md:text-5xl font-bold mb-4">Ready to repair or upgrade your device?</h2>
        <p class="text-gray-400 text-lg max-w-2xl mx-auto mb-8">
            Book a repair, browse our latest products, or contact us directly through WhatsApp.
        </p>

        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="/nextgen-mobile-care/public/booking" class="bg-blue-600 hover:bg-blue-700 transition px-8 py-4 rounded-full font-semibold">
                Book Repair Now
            </a>
            <a href="https://wa.me/94771234567" target="_blank" class="border border-gray-700 hover:border-green-500 hover:text-green-400 transition px-8 py-4 rounded-full font-semibold">
                    Contact on WhatsApp
                </a>
        </div>
    </div>
</section>

<?php require_once 'partials/footer.php'; ?>