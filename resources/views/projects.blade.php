<x-layout>
    <x-slot:title>
        Projects
    </x-slot:title>

    <div class="projects">
        <p>
            Some of the programming projects I've done. Their repositories can be found at my
            <a class="underlined-link" href="https://github.com/campos02" target="_blank">GitHub</a> profile, if they're not private.
            The source code for this website can also be found there.
        </p>

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
                <a class="underlined-link" href="https://crosstalk.hiden.cc" target="_blank">CrossTalk</a> that
                implement those MSNP versions and more, thus reviving official clients and working with old and new third-party
                ones.
            </p>
            <p>
                This project was made with C# and Avalonia, and is available for Windows, Linux and MacOS
                <a class="underlined-link" href="https://github.com/campos02/AvaMSN" target="_blank">here</a>.
            </p>
        </x-project>

        <x-project>
            <x-slot:title>Website Volume</x-slot:title>

            <x-slot:img>
                <img src="images/websitevolume.png" alt="Website Volume popup"/>
            </x-slot:img>

            <p>
                This is an extension that allows changing the volume of websites. It remembers the latest set value
                even after closing the browser. Volume is stored in a per website basis, so multiple tabs in the same website have the same
                volume.
            </p>
            <p>
                Due to limitations in the APIs it uses though, a user needs to either click the extension icon or press Alt+Shift+S when
                reopening the browser or opening a new tab with the same website.
            </p>
            <p>
                It is currently Chromium-only (couldn't find a way to properly do what it does on Firefox), open source and available
                <a class="underlined-link" href="https://chromewebstore.google.com/detail/website-volume/iapmlepgbakoijdigljffaehkgpffemi" target="_blank">at the Chrome Web Store</a>.
            </p>
        </x-project>

        <x-project>
            <x-slot:title>VerificarMudancasNoQ</x-slot:title>

            <x-slot:img>
                <img src="images/verificarqconfig.png" alt="VerificarMudancasNoQ config screen"/>
            </x-slot:img>

            <p>
                Basically a webscraper and page monitor. A sound is played every time changes are 
                detected in a page. It sits in the system tray and can be configured by 
                editing its .config file or by using its configuration screen, which can be seen 
                in the image above.
            </p>
            <p>
                It was very useful to know when the teachers posted any grade in my school's 
                website, which is where it was designed to scrape pages from. The site isn't used 
                anymore by the school though, it was replaced by a more advanced one, so this project 
                doesn't have much use nowadays.
            </p>
            <p>
                This version was made in C# using WPF for its graphical interface.
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
                The app requires a login and is available at a subdomain. As can be seen in the image it is themed similarly to the 
                main website.
            </p>
            <p>
                Made using Vue.js.
            </p>
        </x-project>
    </div>
</x-layout>