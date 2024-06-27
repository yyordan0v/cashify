<div class="text-center">
    <div class="flex flex-col justify-center space-y-2 mb-6">
        <!-- Google Sign Up Button -->
        <a href="{{ route('socialite.redirect', 'google') }}" hx-boost="false"
           class="flex items-center justify-center px-4 py-2.5 border border-neutral-400/50 dark:border-neutral-600/50 rounded-lg text-sm bg-transparent hover:bg-gray-200 dark:hover:bg-gray-700 text-black dark:text-white focus:border-gray-500 focus:ring-gray-500 transition-colors duration-200">
            <svg width="20" height="20" class="h-5 w-5 mr-2" viewBox="0 0 118 120" version="1.1"
                 xmlns="http://www.w3.org/2000/svg"
            >
                <!-- Generator: Sketch 3.6 (26304) - http://www.bohemiancoding.com/sketch -->
                <title>google_buttn</title>
                <desc>Created with Sketch.</desc>
                <defs></defs>
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Artboard-1" transform="translate(-332.000000, -639.000000)">
                        <g id="google_buttn" transform="translate(332.000000, 639.000000)">
                            <g id="logo_googleg_48dp">
                                <path
                                    d="M117.6,61.3636364 C117.6,57.1090909 117.218182,53.0181818 116.509091,49.0909091 L60,49.0909091 L60,72.3 L92.2909091,72.3 C90.9,79.8 86.6727273,86.1545455 80.3181818,90.4090909 L80.3181818,105.463636 L99.7090909,105.463636 C111.054545,95.0181818 117.6,79.6363636 117.6,61.3636364 L117.6,61.3636364 Z"
                                    id="Shape" fill="#4285F4"></path>
                                <path
                                    d="M60,120 C76.2,120 89.7818182,114.627273 99.7090909,105.463636 L80.3181818,90.4090909 C74.9454545,94.0090909 68.0727273,96.1363636 60,96.1363636 C44.3727273,96.1363636 31.1454545,85.5818182 26.4272727,71.4 L6.38181818,71.4 L6.38181818,86.9454545 C16.2545455,106.554545 36.5454545,120 60,120 L60,120 Z"
                                    id="Shape" fill="#34A853"></path>
                                <path
                                    d="M26.4272727,71.4 C25.2272727,67.8 24.5454545,63.9545455 24.5454545,60 C24.5454545,56.0454545 25.2272727,52.2 26.4272727,48.6 L26.4272727,33.0545455 L6.38181818,33.0545455 C2.31818182,41.1545455 0,50.3181818 0,60 C0,69.6818182 2.31818182,78.8454545 6.38181818,86.9454545 L26.4272727,71.4 L26.4272727,71.4 Z"
                                    id="Shape" fill="#FBBC05"></path>
                                <path
                                    d="M60,23.8636364 C68.8090909,23.8636364 76.7181818,26.8909091 82.9363636,32.8363636 L100.145455,15.6272727 C89.7545455,5.94545455 76.1727273,0 60,0 C36.5454545,0 16.2545455,13.4454545 6.38181818,33.0545455 L26.4272727,48.6 C31.1454545,34.4181818 44.3727273,23.8636364 60,23.8636364 L60,23.8636364 Z"
                                    id="Shape" fill="#EA4335"></path>
                                <path d="M0,0 L120,0 L120,120 L0,120 L0,0 Z" id="Shape"></path>
                            </g>
                        </g>
                    </g>
                </g>
            </svg>
            Continue with Google
        </a>

        <!-- Facebook Sign Up Button -->
        <a href="{{ route('socialite.redirect', 'github') }}" hx-boost="false"
           class="flex items-center justify-center px-4 py-2.5 border border-black rounded-lg text-sm text-white dark:text-black bg-black dark:bg-white hover:bg-neutral-900 dark:hover:bg-neutral-200 focus:outline-none active:bg-neutral-800 dark:active:bg-gray-300 transition-colors duration-200">

            <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path fill-rule="evenodd"
                      d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                      clip-rule="evenodd"/>
            </svg>
            Continue with GitHub
        </a>
    </div>

    <x-forms.session-error/>

    <!-- Separator -->
    <div class="flex items-center mb-6">
        <div class="flex-grow border-t border-neutral-400/50 dark:border-neutral-600/50"></div>
        <span class="px-2 text-gray-500 dark:text-gray-400">or</span>
        <div class="flex-grow border-t border-neutral-400/50 dark:border-neutral-600/50"></div>
    </div>
</div>
