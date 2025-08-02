<x-layout>
    <x-slot:title>
        Projects
    </x-slot:title>

    <x-slot:description>
        Projects I've worked on
    </x-slot:description>

    <x-slot:resources>
        @vite('resources/css/projects.css')
    </x-slot:resources>

    <p class="centered-text">
        All projects are open source. If you'd like further motivating me to work on them consider
        <a href="https://ko-fi.com/campos02" target="_blank">donating!</a>
    </p>
    <div class="vertical-gaps centered-text projects">
        <x-project>
            <x-slot:title>Website Volume</x-slot:title>

            <x-slot:img>
                <img src="images/websitevolume.png" alt="Website Volume popup"/>
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
            <x-slot:title>R²M</x-slot:title>

            <x-slot:img>
                <img src="images/r2m.png" alt="R²M website"/>
            </x-slot:img>

            <p>
                A WIP MSNP11-12 server written in Rust. The project is currently in private testing and its website is available
                <a href="https://r2m.camposs.net/">here</a>.
            </p>
        </x-project>

        <x-project>
            <x-slot:title>msnp11-sdk</x-slot:title>

            <x-slot:img>
                <img src="images/msnp11-sdk.png" alt="msnp11-sdk on crates.io"/>
            </x-slot:img>

            <p>
                A Rust MSNP11 client SDK. It also uses UniFFI, which allows generating bindings for Kotlin or Swift.
                The project is available at <a href="https://crates.io/crates/msnp11-sdk">crates.io</a> too.
            </p>
        </x-project>

        <x-project>
            <x-slot:title>icedm</x-slot:title>

            <x-slot:img>
                <img src="images/icedm.png" alt="icedm contact list screen"/>
            </x-slot:img>

            <p>
                A cross-platform MSNP11 client written in Rust using the iced framework. It uses the SDK above for the protocol
                innerworkings and is available for Linux, macOS and Windows.
            </p>
        </x-project>

        <x-project>
            <x-slot:title>Wafrn</x-slot:title>

            <x-slot:img>
                <img src="images/wafrn.png" alt="Explore Wafrn page"/>
            </x-slot:img>

            <p>
                Not my project, but I have contributed to it. <a href="https://app.wafrn.net" target="_blank">Wafrn</a>
                is a Fediverse Tumblr-like website with native Bluesky integration, no bridges required or anything.
            </p>
        </x-project>

        <x-project>
            <x-slot:title>Artists API client</x-slot:title>

            <x-slot:img>
                <img src="images/artistsapiclient.png" alt="Artists API client main screen"/>
            </x-slot:img>

            <p>
                A web client to the private API that allows me to add or remove artists and their albums from the database.
            </p>
            <p>
                Made using Vue.js.
            </p>
        </x-project>
    </div>
</x-layout>