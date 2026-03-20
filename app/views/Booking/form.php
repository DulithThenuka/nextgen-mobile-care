<?php require_once '../app/views/partials/header.php'; ?>

<section class="min-h-screen bg-black text-white py-16 px-6">
    <div class="max-w-3xl mx-auto">
        <div class="text-center mb-10">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Repair Booking</h1>
            <p class="text-gray-400 text-lg">
                Book your device repair with NextGen Mobile Care.
            </p>
        </div>

        <div class="bg-gray-900 rounded-2xl shadow-xl p-8 border border-gray-800">
            <?php if(isset($data['success'])): ?>
                <div class="bg-green-600 text-white px-4 py-3 rounded mb-6">
                     <?php echo $data['success']; ?>
                    </div>

                    <a href="https://wa.me/94771234567?text=I%20just%20booked%20a%20repair%20service" 
                 target="_blank"
                class="block text-center bg-green-500 hover:bg-green-600 px-6 py-3 rounded-lg font-semibold">
                        Confirm via WhatsApp
                    </a>
            <?php endif; ?>

            <?php if(isset($data['error'])): ?>
                <div class="bg-red-600 text-white px-4 py-3 rounded mb-6">
                    <?php echo $data['error']; ?>
                </div>
            <?php endif; ?>

            <form action="/nextgen-mobile-care/public/booking/store" method="POST" class="space-y-6">
                <div>
                    <label class="block mb-2 text-gray-300">Customer Name</label>
                    <input type="text" name="customer_name" class="w-full px-4 py-3 rounded-lg bg-gray-800 text-white border border-gray-700 focus:outline-none focus:border-blue-500" required>
                </div>

                <div>
                    <label class="block mb-2 text-gray-300">Phone Number</label>
                    <input type="text" name="phone" class="w-full px-4 py-3 rounded-lg bg-gray-800 text-white border border-gray-700 focus:outline-none focus:border-blue-500" required>
                </div>

                <div>
                    <label class="block mb-2 text-gray-300">Device Type</label>
                    <input type="text" name="device_type" placeholder="e.g. iPhone 13, Samsung A54" class="w-full px-4 py-3 rounded-lg bg-gray-800 text-white border border-gray-700 focus:outline-none focus:border-blue-500" required>
                </div>

                <div>
                    <label class="block mb-2 text-gray-300">Issue Description</label>
                    <textarea name="issue" rows="5" class="w-full px-4 py-3 rounded-lg bg-gray-800 text-white border border-gray-700 focus:outline-none focus:border-blue-500" required></textarea>
                </div>

                <div>
                    <label class="block mb-2 text-gray-300">Preferred Booking Date</label>
                    <input type="date" name="booking_date" class="w-full px-4 py-3 rounded-lg bg-gray-800 text-white border border-gray-700 focus:outline-none focus:border-blue-500" required>
                </div>

                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 transition px-6 py-3 rounded-lg font-semibold">
                    Submit Booking
                </button>
            </form>
        </div>
    </div>
</section>

<?php require_once '../app/views/partials/footer.php'; ?>