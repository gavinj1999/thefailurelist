import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Rubik', ...defaultTheme.fontFamily.sans],
                serif: ['"Roboto Mono"', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    daisyui: {
        themes: [
            {
                mytheme: {

                    "primary": "#4d00ff",

                    "secondary": "#00f1ff",

                    "accent": "#00baff",

                    "neutral": "#262021",

                    "base-100": "#101717",

                    "info": "#0088be",

                    "success": "#00b81d",

                    "warning": "#ffb800",

                    "error": "#ff899c",
                },
            },
        ],
    },

    plugins: [forms, typography, require('daisyui'),require("@tailwindcss/typography")],
};
