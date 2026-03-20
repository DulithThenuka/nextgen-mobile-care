<?php require_once 'partials/header.php'; ?>

<section class="min-h-screen bg-black text-white py-20">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">

            <!-- Product Image -->
            <div class="bg-gradient-to-b from-gray-900 to-gray-950 border border-gray-800 rounded-3xl overflow-hidden">
                <img 
                    src="/nextgen-mobile-care/public/assets/images/<?php echo $data['product']->image; ?>" 
                    alt="<?php echo $data['product']->name; ?>"
                    class="w-full h-[500px] object-cover"
                >
            </div>

            <!-- Product Details -->
            <div class="pt-4">
                <p class="text-blue-400 uppercase tracking-[0.3em] text-xs md:text-sm mb-4">
                    Product Details
                </p>

                <h1 class="text-4xl md:text-5xl font-bold mb-6">
                    <?php echo $data['product']->name; ?>
                </h1>

                <p class="text-gray-400 text-lg leading-relaxed mb-8">
                    <?php echo $data['product']->description; ?>
                </p>

                <div class="mb-10">
                    <span class="text-3xl md:text-4xl font-bold text-blue-400">
                        Rs. <?php echo $data['product']->price; ?>
                    </span>
                </div>

                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="https://wa.me/94771234567?text=I%20am%20interested%20in%20<?php echo urlencode($data['product']->name); ?>%20priced%20at%20Rs.%20<?php echo $data['product']->price; ?>" 
                       target="_blank"
                       class="bg-green-500 hover:bg-green-600 transition px-8 py-4 rounded-full font-semibold text-center">
                        Buy via WhatsApp
                    </a>

                    <a href="/nextgen-mobile-care/public/" 
                       class="border border-gray-700 hover:border-blue-500 hover:text-blue-400 transition px-8 py-4 rounded-full font-semibold text-center">
                        Back to Home
                    </a>
                </div>

                <div class="mt-12 grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div class="bg-gray-900 border border-gray-800 rounded-2xl p-5">
                        <h3 class="text-lg font-semibold mb-2">Trusted Quality</h3>
                        <p class="text-gray-400 text-sm">Carefully selected products for reliability and performance.</p>
                    </div>

                    <div class="bg-gray-900 border border-gray-800 rounded-2xl p-5">
                        <h3 class="text-lg font-semibold mb-2">Fast Support</h3>
                        <p class="text-gray-400 text-sm">Quick responses for availability, pricing, and device support.</p>
                    </div>

                    <div class="bg-gray-900 border border-gray-800 rounded-2xl p-5">
                        <h3 class="text-lg font-semibold mb-2">Secure Purchase</h3>
                        <p class="text-gray-400 text-sm">Direct communication through WhatsApp for easy confirmation.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<?php require_once 'partials/footer.php'; ?>