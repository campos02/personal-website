<x-layout>
    <x-slot:title>
        Projects
    </x-slot:title>

    <div class="space-y-14 text-center">
        <p>
            Some of the programming projects I've done. Their repositories can be found at my
            <a class="underline" href="https://github.com/campos02" target="_blank">GitHub</a> profile, if they're not private.
            The source code for this website can also be found there.
        </p>
        <x-project>
            <x-slot:title>UWPMessengerClient</x-slot:title>

            <x-slot:img>
                <img class="md:w-7/12 rounded-xl" src="images/loginscreen.jpg" alt="UWPMessengerClient login screen"/>
            </x-slot:img>

            <p>
                A UWP MSNP client. As stated in the README it's possible to choose between MSNP12 
                and MSNP15. Managing your contact list and chatting are implemented in both versions, 
                as well as features like nudges(no window shaking, just a notification) and ink.
            </p>
            <p>
                MSNP was the procotol used by MSN Messenger, protocol versions mentioned above 
                being used by versions 7.5 and 8.5 of the program, respectively.
                Though Messenger has been dead for years now, there's a server called Escargot that
                implements those MSNP versions and more, thus reviving both official and
                third-party clients, e.g. this one.
            </p>
            <p>
                This was an MSNP and UWP learning project, as I was interested in 
                both at the time. It is Windows-only, so the only compatible OS that doesn't have a 
                better-functioning official client already is Windows for ARM, but even that is used by
                very few people.
            </p>
            <p>
                The project was made in C#.
            </p>
        </x-project>
        <x-project>
            <x-slot:title>VerificarMudancasNoQ</x-slot:title>

            <x-slot:img>
                <img class="md:w-1/2 rounded-xl" src="images/verificarqconfig.png" alt="VerificarMudancasNoQ config screen"/>
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
                <img class="md:w-1/2 rounded-xl" src="images/artistsapiclient.png" alt="Artists API client main screen"/>
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
                Made using Vue.js because Vue is awesome.
            </p>
        </x-project>
    </div>
</x-layout>