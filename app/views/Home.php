<?php require_once 'partials/header.php'; ?>

<section class="text-center py-12">
    <h1 class="text-5xl font-bold mb-6">Premium Device Care</h1>
    <h2 class="text-3xl text-blue-500 mb-6">Next Generation Service</h2>
    <p class="text-gray-400 max-w-xl mx-auto mb-10">
        Professional mobile repair and premium electronics sales. Fast. Reliable. Trusted.
    </p>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
        <?php if(!empty($data['products'])): ?>
            <?php foreach($data['products'] as $product): ?>
                <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                    <img src="/nextgen-mobile-care/public/assets/images/<?php echo $product->image; ?>" alt="<?php echo $product->name; ?>" class="w-full h-48 object-cover rounded-md mb-4">
                    <h3 class="text-xl font-semibold mb-2"><?php echo $product->name; ?></h3>
                    <p class="text-gray-400 mb-4"><?php echo $product->description; ?></p>
                    <p class="text-blue-500 font-bold mb-4">Rs. <?php echo $product->price; ?></p>
                    <a href="#" class="bg-blue-600 px-6 py-2 rounded hover:bg-blue-700 transition">Buy Now</a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-gray-400 col-span-3">No products available yet.</p>
        <?php endif; ?>
    </div>
</section>

<?php require_once 'partials/footer.php'; ?>