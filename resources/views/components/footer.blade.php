<footer class="w-full mt-auto border-t-4 border-emerald-500 px-5 py-10 mb-10 flex flex-col md:flex-row gap-8">
    <div class="md:w-1/3 w-full flex flex-col gap-5">
        <x-logo />
        <div class="flex flex-col mt-auto ">
            <h3 class="font-semibold mb-2">Our Socials</h3>
            <div class="flex gap-5">
                <x-nav-link info="Facebook">

                    <x-selfhst-facebook class="w-8 h-8 " />
                </x-nav-link>
                <x-nav-link info="Instagram">
                    <x-selfhst-instagram class="w-8 h-8 " />
                </x-nav-link>
                <x-nav-link info="LinkedIn">
                    <x-selfhst-linkedin class="w-8 h-8 " />
                </x-nav-link>
                <x-nav-link info="Whatsapp">
                    <x-selfhst-whatsapp class="w-8 h-8 " />
                </x-nav-link>

            </div>
        </div>
    </div>


    <div class="md:w-1/3 w-full grid grid-cols-2  gap-6 text-left">

        <div>
            <h3 class="font-semibold mb-2">Our Company</h3>
            <div class="flex flex-col gap-1 items-start">
                <x-nav-link href="about-us" info="About Us" />
                <x-nav-link href="careers" info="Careers" />
                <x-nav-link href="our-team" info="Our Team" />
                <x-nav-link href="locations" info="Locations" />
                <x-nav-link href="testimonials" info="Testimonials" />
            </div>
        </div>

        <div>
            <h3 class="font-semibold mb-2">Legal</h3>
            <div class="flex flex-col gap-1 items-start">
                <x-nav-link href="privacy-policy" info="Privacy Policy" />
                <x-nav-link href="terms-and-conditions" info="Terms and Conditions" />
                <x-nav-link href="refund-policy" info="Refund Policy" />
                <x-nav-link href="return-policy" info="Return Policy" />
                <x-nav-link href="warranty-policy" info="Warranty Policy" />
                <x-nav-link href="ai-policy" info="AI / Data Usage Policy" />
            </div>
        </div>


        <div>
            <h3 class="font-semibold mb-2 text-nowrap">Customer Support</h3>
            <div class="flex flex-col gap-1 items-start">
                <x-nav-link href="faqs" info="FAQs" />
                <x-nav-link href="order-tracking" info="Order Tracking" />
                <x-nav-link href="payment-methods" info="Payment Methods Info" />
                <x-nav-link href="shipping-policy" info="Shipping Policy" />
            </div>
        </div>


        <div>
            <h3 class="font-semibold mb-2">Business</h3>
            <div class="flex flex-col gap-1 items-start">
                <x-nav-link href="become-seller" info="Become a Seller" />
            </div>
        </div>

    </div>
    <div class="md:w-1/3 w-full">
        @php
            $user = auth()->user();
        @endphp

        <x-form action="/contact/send">
            <h3 class="font-semibold mb-2">Message Administration</h3>

            @auth
                <input type="hidden" name="email" value="{{ $user->email }}">
                <x-form-input type="text" name="subject" placeholder="Subject" />

                <textarea name="message" placeholder="Your message" required
                    class="p-3 rounded-lg bg-white mb-5 outline outline-emerald-300"></textarea>

                <x-form-btn>
                    Send
                </x-form-btn>
            @else
                <div class="flex gap-4 justify-center items-center">
                    <p>Please login to send a message</p>
                    <x-nav-link href="/login" info="Login">
                        <x-heroicon-o-arrow-right-on-rectangle class="text-emerald-700 hover:text-emerald-400 w-8 h-8 " />
                    </x-nav-link>
                </div>
            @endauth
        </x-form>

    </div>

</footer>