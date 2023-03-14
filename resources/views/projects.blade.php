<x-layout>
    <x-slot:title>
        Projects
    </x-slot:title>

    <div class="space-y-14 text-center">
        <p >Some projects I've done over time. Their repositories can be found at my
        <a class="underline" href="https://github.com/campos02" target="_blank">GitHub</a> profile.</p>
        <div class="space-y-5">
            <div class="grid space-y-1 place-items-center">
                <h4 class="text-xl font-bold">UWPMessengerClient</h4>
                <img class="md:w-7/12 rounded-xl" src="images/loginscreen.jpg" alt="UWPMessengerClient login screen"/>
            </div>
            <div class="dark:text-zinc-300 space-y-5">
                <p>
                    A UWP MSNP client. As stated in the README it's possible to choose between MSNP12 
                    and MSNP15. Managing your contact list and chatting are implemented in both versions, 
                    as well as features like nudges(no window shaking, just a notification) and ink.
                </p>
                <p>
                    MSNP was the procotol used by MSN Messenger, protocol versions mentioned above 
                    being used by versions 7.5 and 8.5 of the program, respectfully. 
                    Though Messenger has been dead for years now, there is a server called Escargot that
                    implements those MSNP versions and more, thus reviving both official and
                    third-party clients, e.g. this one.
                </p>
                <p>
                    This was more of an MSNP and UWP learning project, as I was interested in learning 
                    both at the time. There is no great practical use to it due to the fact that it's 
                    Windows-only and the only compatible version that doesn't have a better-functioning 
                    official client already is Windows for ARM, but even that is used by very few people.
                </p>
                <p>
                    The project was made in C#.
                </p>
            </div>
        </div>
        <div class="space-y-5">
            <div class="grid space-y-1 place-items-center">
                <h4 class="text-xl font-bold">VerificarMudancasNoQ</h4>
                <img class="md:w-1/2 rounded-xl" src="images/verificarqconfig.png" alt="VerificarMudancasNoQ config screen"/>
            </div>
            <div class="dark:text-zinc-300 space-y-5">
                <p>
                    Basically a webscraper and page monitor. A sound is played every time changes are 
                    detected in a page. It sits in the system tray and can be configured by 
                    editing its .config file or by using its configuration screen, which can be seen 
                    in the image above.
                </p>
                <p>
                    It was pretty useful to know when the teachers posted some grade in my school's 
                    website, which was where it was designed to scrape pages from. The site isn't used 
                    anymore by the school, having been replaced by a more advanced one, so this project 
                    doesn't have much use now.
                </p>
                <p>
                    This version was made in C# using WPF for its graphical interface.
                </p>
            </div>
        </div>
    </div>
</x-layout>