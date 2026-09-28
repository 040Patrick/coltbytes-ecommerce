<footer class="py-6 text-center text-gray-500 bg-gray-950 p-10 text-white">
    <p class=" py-3 mb-3">&copy; {{ date('Y') }} | ColtBytes. Crafted with thoughts, code and creativity. All rights reserved.</p>

    <!-- Links -->
    <div class="flex justify-center gap-20">
        <nav class="flex flex-col">
            <a href="{{ route('home') }}" class="text-1xl text-white text-center py-1 hover:underline">Home</a>
            <a href="" class="text-1xl text-white text-center py-1 hover:underline">Shop</a>
            <a href="{{ route('contact.index') }}" class="text-1xl text-white text-center py-1 hover:underline">Contact</a>
            <a href="{{ route('about.index') }}" class="text-1xl text-white text-center py-1 hover:underline">About</a>
        </nav>
        <!-- Social midias Links -->
        <nav class="flex flex-col">
            <a href="https://www.linkedin.com/in/patrick-rescarolli-594b46238/" class="text-1xl text-white text-center py-1 hover:underline">Linkedin</a>
            <a href="https://github.com/040Patrick" class="text-1xl text-white text-center py-1 hover:underline">Github</a>
        </nav>
    </div>
</footer>