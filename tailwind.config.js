import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',

    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    safelist: [
        {pattern: /bg|border-+/},
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            margin: {
                '66': '16.5rem',
                '68': '17rem',
                '70': '17.5rem',
            },
            padding: {
                '5.5': '1.3625rem',
                '6.5': '1.6125rem',
            },
            fontSize: {
                '2xs': '0.625rem'
            }
        },
    },

    plugins: [forms],
};
