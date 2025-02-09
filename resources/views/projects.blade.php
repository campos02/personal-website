<x-layout>
    <x-slot:title>
        Projects
    </x-slot:title>

    <x-slot:resources>
        @vite('resources/css/projects.css')
    </x-slot:resources>

    <p class="centered-text">
        All projects are open source. If you'd like to further motivate me to work on them consider
        <a href="https://ko-fi.com/campos02" target="_blank">donating!</a>
    </p>
    <div class="vertical-gaps centered-text projects">
        <x-project>
            <x-slot:title>AvaMSN</x-slot:title>

            <x-slot:img>
                <img src="images/avamsn.png" alt="AvaMSN login screen"/>
            </x-slot:img>

            <p>
                A cross-platform MSNP client. Still a work in progress, but it has a decent set of features.
            </p>
            <p>
                MSNP was the protocol used by MSN Messenger, with this client using version 15 of the protocol.
                Though Messenger has been dead for years now, there are third-party servers such as
                <a href="https://crosstalk.hiden.cc" target="_blank">CrossTalk</a> that
                implement those MSNP versions and more, thus reviving official clients and working with old and new third-party
                ones.
            </p>
            <p>
                This project was made with C# and Avalonia, and is available for Windows, Linux and MacOS
                <a href="https://github.com/campos02/AvaMSN" target="_blank">here</a>.
            </p>
        </x-project>

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
                It is currently Chromium-only (couldn't find a way to properly do what it does on Firefox), open source and<br> available
                <a href="https://chromewebstore.google.com/detail/website-volume/iapmlepgbakoijdigljffaehkgpffemi" target="_blank">in the Chrome Web Store</a>.
            </p>
        </x-project>

        <x-project>
            <x-slot:title>Wafrn</x-slot:title>

            <x-slot:img>
                <img src="images/wafrn.png" alt="Explore Wafrn page"/>
            </x-slot:img>

            <p>
                Not my project, but I've been contributing to it. <a href="https://app.wafrn.net" target="_blank">Wafrn</a>
                is a Fediverse Tumblr clone with Bluesky integration.
            </p>
        </x-project>

        <x-project>
            <x-slot:title>Artists API client</x-slot:title>

            <x-slot:img>
                <img src="images/artistsapiclient.png" alt="Artists API client main screen"/>
            </x-slot:img>

            <p>
                How I manage the favorite artists page. It is a web client to the private API that allows me to add or remove
                artists and their albums from the database. Way better than adding records or making requests manually, like I used to.
            </p>
            <p>
                The app requires a login and is available at a subdomain. As the image shows it is themed similarly to the main website.
            </p>
            <p>
                Made using Vue.js.
            </p>
        </x-project>
    </div>
</x-layout>