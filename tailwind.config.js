import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                pri: {
                  100: '#1D9BF0',
                },
                sec: {
                    100: '#1D9BE6',
                },
                tri: {
                  100: '#C4E7FF',
                },
                qaud: {
                  100: '#F7F9F9',
                },

            },
        },
    },

    plugins: [forms],
};
