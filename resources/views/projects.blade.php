<x-layout>
    <x-slot:title>
        Projects
    </x-slot:title>

    <x-slot:description>
        Projects other than this website that I've worked on
    </x-slot:description>

    <x-slot:resources>
        @vite('resources/css/projects.css')
    </x-slot:resources>

    <p class="centered-text">
        All projects (including this website) are open source. If you'd like further motivating me to work on them consider
        <a href="https://ko-fi.com/campos02" target="_blank">donating!</a>
    </p>
    <div class="vertical-gaps centered-text projects">
        <x-project>
            <x-slot:title>Website Volume</x-slot:title>

            <x-slot:img>
                <img src="images/website-volume.png" alt="Website Volume popup"/>
            </x-slot:img>

            <p>
                This is an extension that allows changing the volume of websites. It remembers the latest set value
                even after the browser is closed. Volume is stored in a per website basis, so multiple tabs in the same website have the same
                volume.
            </p>
            <p>
                Due to limitations in the APIs it uses though, a user needs to either click the extension icon or press Alt+Shift+S when
                reopening the browser or opening a new tab with the same website.
            </p>
            <p>
                It is currently Chromium-only (couldn't find a way to properly do what it does on Firefox) and<br> available
                <a href="https://chromewebstore.google.com/detail/website-volume/iapmlepgbakoijdigljffaehkgpffemi" target="_blank">in the Chrome Web Store</a>.
            </p>
        </x-project>

        <x-project>
            <x-slot:title>Wafrn</x-slot:title>

            <x-slot:img>
                <img src="images/wafrn.png" alt="Explore Wafrn page"/>
            </x-slot:img>

            <p>
                Not my project, but I have contributed to it. <a href="https://join.wafrn.net" target="_blank">Wafrn</a>
                is a Tumblr-like Fediverse software with native Bluesky integration, no bridges required or anything.
            </p>

            <p>
                I worked on many things but the most notorious one was probably implementing the
                <a href="https://wedistribute.org/2025/10/wafrn-chaotic-good/#bites" target="_blank">bite activity</a>.
                Bite is a silly poke-like feature based on a specification supported by other software like Iceshrimp.NET.
                Later on a different Wafrn dev expanded it by creating an Atproto version.
            </p>
        </x-project>

        <x-project>
            <x-slot:title>meowsn</x-slot:title>

            <x-slot:img>
                <img src="images/meowsn.png" alt="meowsn contact list screen"/>
            </x-slot:img>

            <p>
                A cross platform MSNP11 client written in Rust using egui for its GUI. For the MSNP backend it uses
                the <a href="https://crates.io/crates/msnp11-sdk">msnp11-sdk</a> crate.
            </p>
        </x-project>

        <x-project>
            <x-slot:title>R²M</x-slot:title>

            <x-slot:img>
                <img src="images/r2m.png" alt="R²M website"/>
            </x-slot:img>

            <p>
                An MSNP8-12 server written in Rust.
            </p>
        </x-project>
    </div>
</x-layout>