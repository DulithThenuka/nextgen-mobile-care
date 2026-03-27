<?php require_once 'partials/header.php'; ?>

<section class="min-h-screen bg-black text-white py-20">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <p class="text-blue-400 uppercase tracking-[0.3em] text-xs md:text-sm mb-4">
                Contact Us
            </p>
            <h1 class="text-4xl md:text-6xl font-bold mb-6">
                Let’s talk about your device needs
            </h1>
            <p class="text-gray-400 text-lg max-w-2xl mx-auto">
                Reach out for repairs, product inquiries, or general support. We’re here to help you with premium device care and trusted electronics.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
            
            <!-- Contact Info -->
            <div class="bg-gradient-to-b from-gray-900 to-gray-950 border border-gray-800 rounded-3xl p-8 md:p-10">
                <h2 class="text-2xl md:text-3xl font-bold mb-8">Get in touch</h2>

                <div class="space-y-8">
                    <div>
                        <p class="text-blue-400 text-sm uppercase tracking-widest mb-2">Phone</p>
                        <p class="text-gray-300 text-lg">+94 77 123 4567</p>
                    </div>

                    <div>
                        <p class="text-blue-400 text-sm uppercase tracking-widest mb-2">WhatsApp</p>
                        <a href="https://wa.me/94771234567" target="_blank" class="text-gray-300 text-lg hover:text-green-400 transition">
                            Chat on WhatsApp
                        </a>
                    </div>

                    <div>
                        <p class="text-blue-400 text-sm uppercase tracking-widest mb-2">Location</p>
                        <p class="text-gray-300 text-lg">Home-based service, Sri Lanka</p>
                    </div>

                    <div>
                        <p class="text-blue-400 text-sm uppercase tracking-widest mb-2">Business Hours</p>
                        <p class="text-gray-300 text-lg">Monday – Saturday</p>
                        <p class="text-gray-400">9:00 AM – 7:00 PM</p>
                    </div>
                </div>

                <div class="mt-10 p-6 rounded-2xl bg-black/40 border border-gray-800">
                    <h3 class="text-xl font-semibold mb-3">Quick Support</h3>
                    <p class="text-gray-400 leading-relaxed mb-5">
                        Need a fast reply? The best way to reach us is through WhatsApp for repair bookings, price checks, and product availability.
                    </p>
                    <a href="https://wa.me/94771234567" target="_blank" class="inline-block bg-green-500 hover:bg-green-600 transition px-6 py-3 rounded-full font-semibold">
                        Message on WhatsApp
                    </a>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="bg-gradient-to-b from-gray-900 to-gray-950 border border-gray-800 rounded-3xl p-8 md:p-10">
                <h2 class="text-2xl md:text-3xl font-bold mb-8">Send a message</h2>

                <form class="space-y-6">
                    <div>
                        <label class="block mb-2 text-gray-300">Full Name</label>
                        <input type="text" class="w-full px-4 py-3 rounded-xl bg-gray-800 text-white border border-gray-700 focus:outline-none focus:border-blue-500" placeholder="Enter your name">
                    </div>

                    <div>
                        <label class="block mb-2 text-gray-300">Phone Number</label>
                        <input type="text" class="w-full px-4 py-3 rounded-xl bg-gray-800 text-white border border-gray-700 focus:outline-none focus:border-blue-500" placeholder="Enter your phone number">
                    </div>

                    <div>
                        <label class="block mb-2 text-gray-300">Subject</label>
                        <input type="text" class="w-full px-4 py-3 rounded-xl bg-gray-800 text-white border border-gray-700 focus:outline-none focus:border-blue-500" placeholder="Enter subject">
                    </div>

                    <div>
                        <label class="block mb-2 text-gray-300">Message</label>
                        <textarea rows="6" class="w-full px-4 py-3 rounded-xl bg-gray-800 text-white border border-gray-700 focus:outline-none focus:border-blue-500" placeholder="Write your message"></textarea>
                    </div>

                    <button type="button" class="w-full bg-blue-600 hover:bg-blue-700 transition px-6 py-3 rounded-xl font-semibold">
                        Send Message
                    </button>
                </form>

                <p class="text-gray-500 text-sm mt-4">
                    This form is currently for UI display. We can connect it to email or database next.
                </p>
            </div>
        </div>
    </div>
</section>


<?php require_once 'partials/footer.php'; ?>